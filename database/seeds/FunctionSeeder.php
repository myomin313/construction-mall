<?php

use Illuminate\Database\Seeder;
use App\Functions;

class FunctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Functions::create([
        	'name'=>'Company Management',
        	'created_by'=>76,
        	'updated_by'=>76
        ]);
        Functions::create([
        	'name'=>'Freelancer Management',
        	'created_by'=>76,
        	'updated_by'=>76
        ]);
        Functions::create([
        	'name'=>'Member Management',
        	'created_by'=>76,
        	'updated_by'=>76
        ]);
        Functions::create([
        	'name'=>'Advertising Management',
        	'created_by'=>76,
        	'updated_by'=>76
        ]);
        Functions::create([
        	'name'=>'Blog Management',
        	'created_by'=>76,
        	'updated_by'=>76
        ]);
        Functions::create([
        	'name'=>'Setting Management',
        	'created_by'=>76,
        	'updated_by'=>76
        ]);
        Functions::create([
        	'name'=>'Daily Product Price Management',
        	'created_by'=>76,
        	'updated_by'=>76
        ]);
        Functions::create([
        	'name'=>'Myanboxtube Management',
        	'created_by'=>76,
        	'updated_by'=>76
        ]);
    }
}
