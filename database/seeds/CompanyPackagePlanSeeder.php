<?php

use Illuminate\Database\Seeder;
use App\CompanyPackagePlan;
use DB as DBS;

class CompanyPackagePlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DBS::table('company_package_plan')->insert([
            'company_id' =>1,
            'package_plan_id'=>1,
            'is_active' =>'0',
            'created_by'=>1,
            'updated_by'=>1,
            'start_date'=>'2019-10-01',
            'end_date' =>'2019-12-31',
        ]);
         DBS::table('company_package_plan')->insert([
            'company_id' =>1,
            'package_plan_id'=>1,
            'is_active' =>'0',
            'created_by'=>1,
            'updated_by'=>1,
            'start_date'=>'2019-10-01',
            'end_date' =>'2019-12-31'
        ]);
         DBS::table('company_package_plan')->insert([
            'company_id' =>1,
            'package_plan_id'=>2,
            'is_active' =>'0',
            'created_by'=>1,
            'updated_by'=>1,
            'start_date'=>'2020-01-01',
            'end_date' =>'2020-06-30'
        ]);
         DBS::table('company_package_plan')->insert([
            'company_id' =>1,
            'package_plan_id'=>2,
            'is_active' =>'1',
            'created_by'=>1,
            'updated_by'=>1,
            'start_date'=>'2020-07-01',
            'end_date' =>'2020-09-30'
        ]);
           DBS::table('company_package_plan')->insert([
            'company_id' =>2,
            'package_plan_id'=>2,
            'is_active' =>'1',
            'created_by'=>2,
            'updated_by'=>2,
            'start_date'=>'2020-07-01',
            'end_date' =>'2020-09-30'
        ]);
             DBS::table('company_package_plan')->insert([
            'company_id' =>3,
            'package_plan_id'=>3,
            'is_active' =>'1',
            'created_by'=>3,
            'updated_by'=>3,
            'start_date'=>'2020-07-01',
            'end_date' =>'2020-09-30'
        ]);
    }
}
