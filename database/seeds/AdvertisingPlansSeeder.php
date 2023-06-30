<?php

use Illuminate\Database\Seeder;
use App\AdvertisingPlans;

class AdvertisingPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdvertisingPlans::create([
        'price'=>100000,
        'plan_name'=>'Home Slider',
        'periods'=>30,
        'created_by'=>1,
        'update_by'=>1
        ]);
        AdvertisingPlans::create([
        'price'=>80000,
        'plan_name'=>'Top Company Slider',
        'periods'=>30,
        'created_by'=>1,
        'update_by'=>1        
        ]);
        AdvertisingPlans::create([
        'price'=>50000,
        'plan_name'=>'Top Company & Freelancer',
        'periods'=>30,
        'created_by'=>1,
        'update_by'=>1
        ]);
        AdvertisingPlans::create([
        'price'=>30000,
        'plan_name'=>'Logo Advertising',
        'periods'=>30,
        'created_by'=>1,
        'update_by'=>1
        ]);
        AdvertisingPlans::create([
        'price'=>30000,
        'plan_name'=>'Company Logo Slider',
        'periods'=>30,
        'created_by'=>1,
        'update_by'=>1
        ]);
    }
}
