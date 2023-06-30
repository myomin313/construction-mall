<?php

use Illuminate\Database\Seeder;
use App\Range;

class RangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Range::create([
        	'minimum_price'=>25000,
        	'maximum_price' =>30000,
        	'is_active' =>'1',
        	'created_by'=>5,
        	'updated_by' =>5
        ]);
        Range::create([
        	'minimum_price'=>25000,
        	'maximum_price' =>30000,
        	'is_active' =>'1',
        	'created_by'=>5,
        	'updated_by' =>5
        ]);
        Range::create([
        	'minimum_price'=>28000,
        	'maximum_price' =>30000,
        	'is_active' =>'1',
        	'created_by'=>5,
        	'updated_by' =>5
        ]);
        Range::create([
        	'minimum_price'=>45000,
        	'maximum_price' =>30000,
        	'is_active' =>'1',
        	'created_by'=>5,
        	'updated_by' =>5
        ]);
        Range::create([
        	'minimum_price'=>25000,
        	'maximum_price' =>34000,
        	'is_active' =>'1',
        	'created_by'=>5,
        	'updated_by' =>5
        ]);
    }
}
