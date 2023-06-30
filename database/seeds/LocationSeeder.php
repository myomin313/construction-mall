<?php

use Illuminate\Database\Seeder;
use App\Location;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Location::create([
        	'name'=>'Yangon',
        	'parent_id' =>0,
        	'created_by' => 5,
        	'updated_by' =>5
        ]);
        Location::create([
        	'name'=>'Mandalay',
        	'parent_id' =>0,
        	'created_by' => 5,
        	'updated_by' =>5
        ]); 
        Location::create([
        	'name'=>'Ahlon',
        	'parent_id' =>1,
        	'created_by' => 5,
        	'updated_by' =>5
        ]);
        Location::create([
        	'name'=>'Bahan',
        	'parent_id' =>1,
        	'created_by' => 5,
        	'updated_by' =>5
        ]);
        Location::create([
        	'name'=>'Dagon',
        	'parent_id' =>1,
        	'created_by' => 5,
        	'updated_by' =>5
        ]);

    }
}
