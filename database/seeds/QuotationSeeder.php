<?php

use Illuminate\Database\Seeder;
use App\Quotation;
class QuotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quotation::create([
        	'range_id'=>1,
            'category_id' =>1,
            'project_expected_start_date' => '2020-04-04',
            'project_current_situation' => 'Not finished',
            'summary' => 'Project Deadline is not complete yet!',
            'file'=> 'Complete File',
            'policy' => 'There are many policy in this database.',
            'send_user_id'=> 1,
            'used_coin'=> 700,
            'received_user_id' => 2,
            'received_status'=>'Pending',
            'requested_status'=>'Success',
            'created_by' =>5,
            'updated_by' =>5
        ]);
        Quotation::create([
        	'range_id'=>1,
            'category_id' =>1,
            'project_expected_start_date' => '2020-04-04',
            'project_current_situation' => 'Not finished',
            'summary' => 'Project Deadline is not complete yet!',
            'file'=> 'Complete File',
            'policy' => 'There are many policy in this database.',
            'send_user_id'=> 1,
            'used_coin'=> 100,
            'received_user_id' => 2,
            'received_status'=>'Success',
            'requested_status'=>'Success',
            'created_by' =>5,
            'updated_by' =>5
        ]);
        Quotation::create([
        	'range_id'=>2,
            'category_id' =>2,
            'project_expected_start_date' => '2020-04-04',
            'project_current_situation' => 'Not finished',
            'summary' => 'Project Deadline is not complete yet!',
            'file'=> 'Complete File',
            'policy' => 'There are many policy in this database.',
            'send_user_id'=> 1,
            'used_coin'=> 750,
            'received_user_id' => 2,
            'received_status'=>'Success',
            'requested_status'=>'Pending',
            'created_by' =>5,
            'updated_by' =>5
        ]);
         Quotation::create([
            'range_id'=>2,
            'category_id' =>2,
            'project_expected_start_date' => '2020-04-04',
            'project_current_situation' => 'Not finished',
            'summary' => 'Request from company2 Project Deadline is not complete yet!',
            'file'=> 'Complete File',
            'policy' => 'There are many policy in this database.',
            'send_user_id'=> 2,
            'used_coin'=> 750,
            'received_user_id' => 5,
            'received_status'=>'Success',
            'requested_status'=>'Pending',
            'created_by' =>5,
            'updated_by' =>5
        ]);
       
    }
}
