<?php

use Illuminate\Database\Seeder;
use App\CoinPlan;

class CoinPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CoinPlan::create([
        	'coin_count'=>'1000',
        	'price' =>'10000',
            'is_active' =>'1',
            'created_by' =>5,
            'updated_by' =>5
        ]);
        CoinPlan::create([
        	'coin_count'=>'2000',
        	'price' =>'20000',
            'is_active' =>'1',
            'created_by' =>5,
            'updated_by' =>5 
        ]);
        CoinPlan::create([
        	'coin_count'=>'3000',
        	'price' =>'30000',
            'is_active' =>'1',
            'created_by' =>5,
            'updated_by' =>5
        ]);
        CoinPlan::create([
        	'coin_count'=>'4000',
        	'price' =>'40000',
            'is_active' =>'1',
            'created_by' =>5,
            'updated_by' =>5
        ]);
        CoinPlan::create([
        	'coin_count'=>'5000',
        	'price' =>'50000',
            'is_active' =>'1',
            'created_by' =>5,
            'updated_by' =>5
        ]);
        CoinPlan::create([
        	'coin_count'=>'6000',
        	'price' =>'60000',
            'is_active' =>'1',
            'created_by' =>5,
            'updated_by' =>5
        ]);
    }
}
