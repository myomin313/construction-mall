<?php

use Illuminate\Database\Seeder;
use App\PackagePlan;
class PackagePlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         PackagePlan::create([
            'name'=>'Free',
            'price' =>0,
            'periods' =>0,
            'created_by' =>5,
            'updated_by' =>5,
        ]);
        PackagePlan::create([
            'name'=>'Gold',
            'price' =>100000,
            'periods' =>90,
            'created_by' =>5,
            'updated_by' =>5,
        ]);
        PackagePlan::create([
            'name'=>'Platinum',
            'price' =>200000,
            'periods' =>90,
            'created_by' =>5,
            'updated_by' =>5
        ]);
    }
}
