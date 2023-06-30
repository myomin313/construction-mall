<?php

use Illuminate\Database\Seeder;
use App\FreelancerRate;

class FreelancerRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FreelancerRate::create([
        	'user_id'=>1,
        	'rate'=>3,
        	'freelancer_id'=>1,
        ]);
        FreelancerRate::create([
            'user_id'=>2,
            'rate'=>3,
            'freelancer_id'=>1,
        ]);
        FreelancerRate::create([
            'user_id'=>2,
            'rate'=>3,
            'freelancer_id'=>1,
        ]);
        FreelancerRate::create([
            'user_id'=>2,
            'rate'=>4,
            'freelancer_id'=>1,
        ]);
		FreelancerRate::create([
            'user_id'=>5,
            'rate'=>5,
            'freelancer_id'=>1,
        ]);
     
    }
}
