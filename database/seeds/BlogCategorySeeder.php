<?php

use Illuminate\Database\Seeder;
use App\BlogCategory;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        //
         BlogCategory::create([
        	'category_name'=>'aaa'
        ]);
        BlogCategory::create([
        	'category_name'=>'bbb'
        ]); 
        BlogCategory::create([
        	'category_name'=>'ccc'
        ]);
        BlogCategory::create([
        	'category_name'=>'ddd'
        ]);
    }

}
