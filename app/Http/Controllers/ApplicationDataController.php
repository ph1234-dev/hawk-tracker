<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationDataController extends Controller
{
    //
    public function init(Request $request){
        $user_id = $request->session()->get("user_id");


        // $records = DB::select("select id, food, calories, pieces, comment,date from food_records 
        //     where user_id =? and date=CURDATE()",[$user_id]);
        // $records = var_dump($records);

        $food_record_result_set_summary = DB::select(
                        "select 
                        sum(f.calories) as total_calories ,
                        count(f.food) as total_food
                        from food_records f where f.user_id=? and f.date::date=now()::date" ,[$user_id]);
        
        $user_account_info = DB::select("select target_calories from accounts where id=?",[$user_id]);

        // dd or var_dump
        // to show data
        $food_record_info = $food_record_result_set_summary[0];
        // $calorie_decoded = var_dump($calories);

        $user_info = $user_account_info[0];

        // $records = DB::table("food_records")
        //     ->where('user_id',$user_id)
        //     ->whereRaw('date = current_date')->get();

        $records = DB::select(
            "
                select * 
                from food_records 
                where user_id=? 
                and date::date=now()::date
            ",[$user_id]);
        
        $status = "good";
        if ( $food_record_info->total_calories > $user_info->target_calories ){
            $status = "you are eating too mucn";
        }else{
            $status = "Good you can still eat more";
        }
        // dd diedump to stop page from rendering
        // dd($records);

        return view("index",[
            'data' => 'testing',
            'records' => $records,
            'total_calories' => number_format($food_record_info->total_calories),
            'total_food' =>number_format( $food_record_info->total_food),
            'target_calories' => number_format($user_info->target_calories),
            'status' => $status
        ]);

    }

    // public function show_entire_food_record(Request $request){
        
    //     $user_id = $request->session()->get("user_id");
    //     // $records = DB::select("select food, calories, pieces, comment,date from food_record 
    //     //     where user_id =?",[$user_id])->paginate(4);
        
    //     $food_record_result_set_summary = DB::select(
    //                     "select sum(f.calories) as 'total_calories' ,
    //                      count(f.food) as 'total_food'
    //                     from food_records f where f.user_id=? " ,[$user_id]);
        
    //     $user_account_info = DB::select("select target_calories from accounts where id=?",[$user_id]);

    //     // dd or var_dump
    //     // to show data
    //     $food_record_info = $food_record_result_set_summary[0];
    //     // $calorie_decoded = var_dump($calories);

    //     $user_info = $user_account_info[0];

    //     $records = DB::table("food_records")->where('user_id',$user_id)->paginate(5);
        
    //     $status = "good";
    //     if ( $food_record_info->total_calories > $user_info->target_calories ){
    //         $status = "you are eating too mucn";
    //     }else{
    //         $status = "Good you can still eat more";
    //     }


    //     return view("index",[
    //         'data' => 'testing',
    //         'records' => $records,
    //         'total_calories' => $food_record_info->total_calories,
    //         'total_food' => $food_record_info->total_food ,
    //         'target_calories' => $user_info->target_calories,
    //         'status' => $status
    //     ]);
    // }
}
