<?php

use Illuminate\Database\Seeder;
use App\FreelancerEducation;

class FreelancerEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FreelancerEducation::create([
        	'name'=>'Electronic',
        	'education_level'=>'BE',
        	'from_date'=>'2010-10-01',
        	'to_date'=>'2015-10-01',
        	'university'=>'Technological University',
        	'freelancer_id'=>1,
        	'country'=>'Japan'
        ]);
        FreelancerEducation::create([
        	'name'=>'English',
        	'education_level'=>'BA(English)',
        	'from_date'=>'2015-10-01',
        	'to_date'=>'2016-10-01',
        	'university'=>'YUFL',
        	'freelancer_id'=>2,
        	'country'=>'Myanmar'
        ]);

        FreelancerEducation::create([
        	'name'=>'IT',
        	'education_level'=>'ME',
        	'from_date'=>'2010-10-01',
        	'to_date'=>'2015-10-01',
        	'university'=>'Technological University',
        	'freelancer_id'=>3,
        	'country'=>'Thailand'
        ]);
        FreelancerEducation::create([
        	'name'=>'Japanese',
        	'education_level'=>'Diploma',
        	'from_date'=>'2016-10-01',
        	'to_date'=>'2018-10-01',
        	'university'=>'Tokyo University',
        	'freelancer_id'=>4,
        	'country'=>'Japan'
		]);
		FreelancerEducation::create([
        	'name'=>'Electronic',
        	'education_level'=>'BE',
        	'from_date'=>'2010-10-01',
        	'to_date'=>'2015-10-01',
        	'university'=>'Technological University',
        	'freelancer_id'=>5,
        	'country'=>'Japan'
        ]);
     
    }
}
