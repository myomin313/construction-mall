<?php

use Illuminate\Database\Seeder;
use App\FreelancerExperience;
class FreelancerExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FreelancerExperience::create([
        	'position'=>'Project Manager',
        	'company'=>'Findix Myanmar',
        	'freelancer_id'=>1,
        	'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus.',
        	'from_date'=>'2019-01-01',
        	'to_date'=>'2019-07-01'
        ]);

        FreelancerExperience::create([
        	'position'=>'Programmer',
        	'company'=>'AAA Myanmar',
        	'freelancer_id'=>2,
        	'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus.',
        	'from_date'=>'2018-01-01',
        	'to_date'=>'2019-01-01'
        ]);

        FreelancerExperience::create([
        	'position'=>'System Engineer',
        	'company'=>'Findix Myanmar',
        	'freelancer_id'=>3,
        	'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus.',
        	'from_date'=>'2019-01-01',
        	'to_date'=>'2019-07-01'
        ]);

        FreelancerExperience::create([
        	'position'=>'Programmer',
        	'company'=>'BBB Myanmar',
        	'freelancer_id'=>4,
        	'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus.',
        	'from_date'=>'2018-01-01',
        	'to_date'=>'2019-01-01'
		]);
		FreelancerExperience::create([
        	'position'=>'Project Manager',
        	'company'=>'Findix Myanmar',
        	'freelancer_id'=>5,
        	'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus.',
        	'from_date'=>'2019-01-01',
        	'to_date'=>'2019-07-01'
        ]);

       
    }
}
