<?php

use Illuminate\Database\Seeder;
use App\FreelancerSkill;

class FreelancerSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FreelancerSkill::create([
            'freelancer_id'=>1,
            'skill_id'=>1
        ]);
        FreelancerSkill::create([
            'freelancer_id'=>2,
            'skill_id'=>2
        ]);
        FreelancerSkill::create([
            'freelancer_id'=>3,
            'skill_id'=>3
        ]);

        FreelancerSkill::create([
            'freelancer_id'=>4,
            'skill_id'=>3
        ]);
        FreelancerSkill::create([
            'freelancer_id'=>5,
            'skill_id'=>3
        ]);
        FreelancerSkill::create([
            'freelancer_id'=>6,
            'skill_id'=>1
        ]);
        FreelancerSkill::create([
            'freelancer_id'=>6,
            'skill_id'=>4
        ]);
        FreelancerSkill::create([
            'freelancer_id'=>7,
            'skill_id'=>3
        ]);

        FreelancerSkill::create([
            'freelancer_id'=>8,
            'skill_id'=>1
        ]);
        FreelancerSkill::create([
            'freelancer_id'=>9,
            'skill_id'=>2
        ]);
        FreelancerSkill::create([
            'freelancer_id'=>9,
            'skill_id'=>4
        ]);
        FreelancerSkill::create([
            'freelancer_id'=>10,
            'skill_id'=>4
        ]);
        FreelancerSkill::create([
            'freelancer_id'=>11,
            'skill_id'=>1
        ]);
        FreelancerSkill::create([
            'freelancer_id'=>11,
            'skill_id'=>2
        ]);
         FreelancerSkill::create([
            'freelancer_id'=>12,
            'skill_id'=>1
        ]);
        FreelancerSkill::create([
            'freelancer_id'=>13,
            'skill_id'=>2
        ]);
         FreelancerSkill::create([
            'freelancer_id'=>14,
            'skill_id'=>3
        ]);
        FreelancerSkill::create([
            'freelancer_id'=>15,
            'skill_id'=>4
        ]);
        
    }
}
