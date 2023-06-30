<?php

use Illuminate\Database\Seeder;
use App\CompanyAdvertisingPlan;

class CompanyAdvertisingPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyAdvertisingPlan::create([
        'price'=>100000,
        'plan_name'=>'Home Slider',
        'periods'=>30
        ]);
        CompanyAdvertisingPlan::create([
        'price'=>80000,
        'plan_name'=>'Top Company Slider',
        'periods'=>30        
        ]);
        CompanyAdvertisingPlan::create([
        'price'=>50000,
        'plan_name'=>'Top Company & Freelancer',
        'periods'=>30
        ]);
        CompanyAdvertisingPlan::create([
        'price'=>30000,
        'plan_name'=>'Logo Advertising',
        'periods'=>30
        ]);
        CompanyAdvertisingPlan::create([
        'price'=>30000,
        'plan_name'=>'Company Logo Slider',
        'periods'=>30
        ]);
    }
}