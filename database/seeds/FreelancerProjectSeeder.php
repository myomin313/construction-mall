<?php

use Illuminate\Database\Seeder;
use App\FreelancerProject;
class FreelancerProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FreelancerProject::create([
        	'freelancer_id'=>1,
        	'project_name'=>'SAS Timecard System',
        	'company_name'=>'Findix Myanmar',
        	'project_detail'=>'Trough our intelligent user interface, your company details can be easily set up. Also, our system enables you to add all you employees as well as your payroll history information.',
        	'project_start_date'=>'2019-01-01',
        	'project_end_date'=>'2019-06-01',
        	'project_link'=>'https://findixmyanmar.com/'
        ]);
        FreelancerProject::create([
        	'freelancer_id'=>2,
        	'project_name'=>'Stock System',
        	'company_name'=>'Msquare Myanmar',
        	'project_detail'=>'We offer optimal solution for our customers by understanding their business nature, going beyond the boundaries of any markers and products.We are heading to enhance customers’ businesses and to become their best partner',
        	'project_end_date'=>'2019-06-01',
        	'project_link'=>'https://findixmyanmar.com/'
        ]);
        FreelancerProject::create([
        	'freelancer_id'=>3,
        	'project_name'=>'SAS Timecard System',
        	'company_name'=>'Findix Myanmar',
        	'project_detail'=>'Trough our intelligent user interface, your company details can be easily set up. Also, our system enables you to add all you employees as well as your payroll history information.',
        	'project_start_date'=>'2019-01-01',
        	'project_end_date'=>'2019-06-01',
        	'project_link'=>'https://findixmyanmar.com/'
        ]);
        FreelancerProject::create([
        	'freelancer_id'=>4,
        	'project_name'=>'Stock System',
        	'company_name'=>'Msquare Myanmar',
        	'project_detail'=>'We offer optimal solution for our customers by understanding their business nature, going beyond the boundaries of any markers and products.We are heading to enhance customers’ businesses and to become their best partner',
        	'project_end_date'=>'2019-06-01',
        	'project_link'=>'https://findixmyanmar.com/'
		]);
		FreelancerProject::create([
        	'freelancer_id'=>5,
        	'project_name'=>'Stock System',
        	'company_name'=>'Msquare Myanmar',
        	'project_detail'=>'We offer optimal solution for our customers by understanding their business nature, going beyond the boundaries of any markers and products.We are heading to enhance customers’ businesses and to become their best partner',
        	'project_end_date'=>'2019-06-01',
        	'project_link'=>'https://findixmyanmar.com/'
        ]);
        
    }
}
