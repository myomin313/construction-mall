<?php

use Illuminate\Database\Seeder;
use App\FreelancerStatus;
class FreelancerStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FreelancerStatus::create([
        	'freelancer_status_name'=>'Working',
        ]);
        FreelancerStatus::create([
        	'freelancer_status_name'=>'Finding Full Time Job',
        ]);
         FreelancerStatus::create([
        	'freelancer_status_name'=>'Finding Part Time Job',
        ]);
         FreelancerStatus::create([
        	'freelancer_status_name'=>'Internship Available',
        ]);
         FreelancerStatus::create([
        	'freelancer_status_name'=>'Finding Project',
        ]);
    }
}
