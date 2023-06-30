<?php

use Illuminate\Database\Seeder;
use App\SkillForFreelancer;
class SkillForFreelancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SkillForFreelancer::create([
        	'skill_name'=>'Interier Design',
        ]);
        SkillForFreelancer::create([
        	'skill_name'=>'Construction Management',
        ]);
        SkillForFreelancer::create([
        	'skill_name'=>'Project Management',
        ]);
        SkillForFreelancer::create([
        	'skill_name'=>'Decoration',
        ]);
    }
}
