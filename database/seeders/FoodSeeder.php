<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sample = array("spicy chicken","sandwhich","rice","squash salad","congee");
        
        for ($x = 0 ; $x < 10; $x+= 1){
            DB::table('food_record')->insert([
                'food' => $sample[rand(0,count($sample))],
                'calories'=> rand(50,300),
                'comment'=> "none",
                'pieces' => 'unspecified',
                'user_id' => '12'
            ]);
        }
    }
}
