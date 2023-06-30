<?php

use Illuminate\Database\Seeder;
use App\CompanyService;

class CompanyServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         CompanyService::create([
            'service_name' => "decoration",
            'company_id' =>1,
            'service_detail'=>'service detail data',
            'image_name'=>'1598588380.png'
        ]);
        CompanyService::create([
            'service_name' => "Design",
            'company_id' =>1,
            'service_detail'=>'service detail data',
            'image_name'=>'1598602596.png'
        ]);
        CompanyService::create([
            'service_name' => "Construction",
            'company_id' =>1,
            'service_detail'=>'construction detail data',
            'image_name'=>'1598837850.png'
        ]);
        CompanyService::create([
            'service_name' => "Construction",
            'company_id' =>1,
            'service_detail'=>'construction detail data',
            'image_name'=>'1598837850.png'
        ]);
    }
}
