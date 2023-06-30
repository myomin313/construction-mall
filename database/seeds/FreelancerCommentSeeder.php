<?php

use Illuminate\Database\Seeder;
use App\FreelancerComment;

class FreelancerCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FreelancerComment::create([
        	'user_id'=>1,
        	'comment'=>'This is first comment',
        	'freelancer_id'=>1,
        ]);
        FreelancerComment::create([
            'user_id'=>2,
            'comment'=>'This is second comment',
            'freelancer_id'=>1,
        ]);
        FreelancerComment::create([
            'user_id'=>2,
            'comment'=>'This is third comment',
            'freelancer_id'=>1,
        ]);
        FreelancerComment::create([
            'user_id'=>2,
            'comment'=>'This is four comment',
            'freelancer_id'=>1,
        ]);
		FreelancerComment::create([
            'user_id'=>5,
            'comment'=>'This is firth comment',
            'freelancer_id'=>1,
        ]);
     
    }
}
