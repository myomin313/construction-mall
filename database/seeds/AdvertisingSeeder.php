<?php

use Illuminate\Database\Seeder;
use App\Advertising;

class AdvertisingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Advertising::create([
            'advertising_plan_id' => 1,
            'user_id' =>1,
            'photo'=>"1598588107.png",
            'link'=>'http://msquare.findixmyanmar.com/companyservice-detail.html',
            'start_date'=> '2020-02-01',
            'end_date'=> '2020-10-01',
            'is_active'=> 1,
            'created_by'=>1,
            'updated_by'=> 1,
            'company_name'=> 'M square',
            'address'=> 'no.1234,Yangon',
            'phone'=> '09484464',
            'email'=> 'msquare@gmail.com',
            'priority'=> 1,
        ]);
        Advertising::create([
            'advertising_plan_id' => 1,
            'user_id' =>1,
            'photo'=>"1598837850.png",
            'link'=>'http://msquare.findixmyanmar.com/companyservice-detail.html',
            'start_date'=> '2020-02-01',
            'end_date'=> '2020-10-01',
            'is_active'=> 1,
            'created_by'=>1,
            'updated_by'=> 1,
            'company_name'=> 'Findix Myanmar',
            'address'=> 'no.1234,Yangon',
            'phone'=> '09484464',
            'email'=> 'findix@gmail.com',
            'priority'=> 2,
        ]);
        Advertising::create([
            'advertising_plan_id' => 1,
            'user_id' =>1,
            'photo'=>"1598602796.png",
            'link'=>'http://msquare.findixmyanmar.com/companyservice-detail.html',
            'start_date'=> '2020-02-01',
            'end_date'=> '2020-10-01',
            'is_active'=> 1,
            'created_by'=> 1,
            'updated_by'=> 1,
            'company_name'=> 'Han Thi Myanmar',
            'address'=> 'no.1234,Yangon',
            'phone'=> '09484464',
            'email'=> 'hanthi@gmail.com',
            'priority'=> 3,
        ]);

    }
}
