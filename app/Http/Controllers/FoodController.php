<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FoodController extends Controller
{

    public function getRecordToday(Request $request){
        $user_id = $request->session()->get("user_id");
        $date = Carbon::now()->format('F d, Y');

        $food_record_result_set_summary = DB::select(
                        "select 
                        sum(f.calories) as total_calories ,
                        count(f.food) as total_food
                        from food_records f where f.user_id=? and f.date::date=now()::date" ,[$user_id]);
        
        $user_account_info = DB::select("select target_calories from accounts where id=?",[$user_id]);

        // to show data
        $food_record_info = $food_record_result_set_summary[0];

        $user_info = $user_account_info[0];

        $records = DB::select(
            "
                select * 
                from food_records 
                where user_id=? 
                and date::date=now()::date
                order by date desc
            ",[$user_id]);
        
        $status = "good";
        if ( $food_record_info->total_calories > $user_info->target_calories ){
            $status = "you are eating too mucn";
        }else{
            $status = "Good you can still eat more";
        }
        // dd diedump to stop page from rendering
        // dd($records);

        return view("components/todays_record",[
            'progress' => ($food_record_info->total_calories/$user_info->target_calories)*100,
            'date' => $date,
            'records' => $records,
            'total_calories' => number_format($food_record_info->total_calories),
            'total_food' =>number_format( $food_record_info->total_food),
            'target_calories' => number_format($user_info->target_calories),
        ]);

    }


    //
    public function storeInformation(Request $request){

        $request->validate([
            'food'=>'required',
            'calories'=>'required',
            'pieces'=>'required'
        ]);
        // automatically return to calling page when error is detected

        $food = $request->input("food");
        $calories =  $request->input("calories");
        $comment =  $request->input("comment");
        $pieces =  $request->input("pieces");

        $user_id = $request->session()->get('user_id');
        $target_calories = $request->session()->get('target_calories');
        $status = DB::insert("insert into food_records(user_id,food,calories,comment,pieces) values(?,?,?,?,?)",[
            $user_id,
            $food,
            $calories,
            $comment,
            $pieces,
        ]);

        $result_set = DB::select("select sum(calories) as total_calories from food_records 
            where user_id = ? and date=CURRENT_DATE",[$user_id]);
        $result=$result_set[0];

        // dd($result->total_calories);

        // https://laracasts.com/discuss/channels/laravel/laravel-prevent-form-resubmission-on-page-refresh
        // NEVER return a view from a post request.
        // ONLY return a redirect or json response.

        // problem is multiple form resubmittion
        // $wtf = "wtf";
        
        return view("food/store",[
            'food' => $food,
            'calories' => $calories,
            'pieces' => $pieces,
            'status' => true,
            'total_calories' => $result->total_calories
        ]);
    }

    public function delete($data){

        DB::table('food_records')->where('id', $data)->delete();

        // return "Post delete data about to delete ".$data;
        return redirect()->route('home');
        // return 
    }

    public function getFoodInformation($id){
        $resultset = DB::select("
                    select 
                        food, 
                        calories, 
                        pieces, 
                        comment 
                    from food_records
                        where id=?",[$id]);
        
        $result = $resultset[0];

        return view('food/update',[
            'food_id' => $id,
            'food' =>$result->food,
            'calories' =>$result->calories,
            'pieces' => $result->pieces,
            'comment' => $result->comment
        ]);
    }

    public function updateFoodInformation(Request $request, $id){

        $request->validate([
            'food'=>'sometimes',
            'calories'=>'sometimes',
            'comment'=>'sometimes',
            'pieces'=>'sometimes'
        ]);
        
        $food = $request->input('food');
        $calories = $request->input('calories');
        $pieces = $request->input('pieces');
        $comment = $request->input('comment');

        DB::update("update food_records set food=? ,calories=?, pieces=?, comment=? where id=?",[
            $food,
            $calories,
            $pieces,
            $comment,
            $id // passed from the form
        ]);


        return redirect()->route('home');
    }


    public function getWeeklySummary(Request $request){
        $user_id = $request->session()->get("user_id");

        $result_set = DB::select(
                "select
                count(f.food) as food_count,
                sum(f.calories) as total_calories_eaten_that_week,
                    concat(
                    to_char(date_trunc('week', f.date)::date, 'Month DD, YYYY')  , ' to ' ,
                    to_char(date_trunc('week',  f.date::date + interval '1 week')::date, 'Month DD, YYYY') ) 
                    as week
                from food_records f
                inner join accounts a
                on f.user_id=a.id
                where a.id=?
                group by week,a.username,f.user_id order by week desc",                   
                    [$user_id]);
        

        return view('components/weekly_record', [
            'records' => $result_set
        ]);
    }

}
