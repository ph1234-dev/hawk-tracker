<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function getDailySummary(Request $request){

        $user_id = $request->session()->get('user_id');

         
        $data = DB::select(
                "select 
                    date::date, 
                    to_char(date::date, 'Month DD, YYYY') as formatted_date,
                    sum(calories) as total_calories, 
                    count(food) as total_foods
                from food_records 
                where user_id=? 
                group by date::date
                order by date::date asc limit 7",
                    [$user_id]);
        // dd(collect($data)->paginate(3));

        // dd($data);
        return view(
            'reports/daily',[
            'data'=>$data
        ]);   
    }

    public function getSpecificDateRecord(Request $request, $date){
        
        $user_id = $request->session()->get("user_id");
        $data = DB::select(
            " select * from food_records where user_id=? and date::date=?",
            [$user_id,$date]
        );

        $summary = DB::select(
            "select sum(calories) as total_calories, 
                count(food) as total_foods
            from food_records 
            where user_id=? and date::date=?",
                [$user_id,$date]);

        $summary = $summary[0];
        // dd($data);
        
        return view("reports/daily_list",[
            'data' => $data,
            'calories' => $summary->total_calories
        ]);
    }

    public function getDailyPaginatedRecords(Request $request,$offset, $increment){

        $user_id = $request->session()->get("user_id");

        $data = DB::select(
            "
            select 
            date::date, 
            to_char(date::date, 'Month DD, YYYY') as formatted_date,
            sum(calories) as total_calories, 
            count(food) as total_foods
            from food_records 
            where user_id=?
            group by date::date order by date::date desc 
            OFFSET ? ROWS FETCH FIRST ? ROW ONLY
            ",[$user_id,$offset,$increment]
        );
        
        // dd($data);

        return response()->json($data,200);
        // return ['posts' => 1,'comment' => 2];
    }

    public function getMonthlyDailyCalendarSummary(Request $request,$month){
        $user_id = $request->session()->get("user_id");
        $data = DB::select(
            "select 
            extract(day from date::date)  as date,
            sum(calories) as calories
            from food_records 
            where user_id = ? and extract(month from date::date)=?
            group by date::date",
            [$user_id,$month]
        );


        // lets return this as json
        return response()->json($data,200);
        // return "wtf";
    }
}
