<?php

use Illuminate\Database\Seeder;
use DB as DBS;
class CoinPlanUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DBS::table('coin_plan_user')->insert([
            'user_id' => 1,
            'coin_plan_id' =>1,
            'status' =>'Pending',
            'created_by' =>2,
            'updated_by' =>2
        ]);
    }
}
