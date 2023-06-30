<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Category::create([
            'name' => "Service",
            'parent_id' =>0,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
        Category::create([
            'name' => "Supplier",
            'parent_id' =>0,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
        Category::create([
            'name' => "Reno Business",
            'parent_id' =>0,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
          Category::create([
            'name' => "Freelancer",
            'parent_id' =>0,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
        Category::create([
            'name' => "Developers",
            'parent_id' =>1,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
         Category::create([
            'name' => "Constructions",
            'parent_id' =>1,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
         Category::create([
            'name' => "Interior Decoration",
            'parent_id' =>1,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
          Category::create([
            'name' => "Architecture Design",
            'parent_id' =>1,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
         Category::create([
            'name' => "Interior Design",
            'parent_id' =>1,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
          Category::create([
            'name' => "Engineering",
            'parent_id' =>1,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
        Category::create([
            'name' => "Plumbing",
            'parent_id' =>1,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]); 
        Category::create([
            'name' => "Air-con Services",
            'parent_id' =>1,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]); 
        Category::create([
            'name' => "Research Labs",
            'parent_id' =>1,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);  
          Category::create([
            'name' => "Flooring",
            'parent_id' =>2,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
        Category::create([
            'name' => "Glass",
            'parent_id' =>2,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
        Category::create([
            'name' => "Stone",
            'parent_id' =>2,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
        Category::create([
            'name' => "Aluminium/Iron/Steel",
            'parent_id' =>2,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
        Category::create([
            'name' => "Hardwood/Engineered Wood",
            'parent_id' =>2,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
        Category::create([
            'name' => "Eco-Friendly Materials",
            'parent_id' =>2,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
        Category::create([
            'name' => "Furnitures",
            'parent_id' =>2,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
        Category::create([
            'name' => "Decorative Accessories",
            'parent_id' =>2,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
        Category::create([
            'name' => "Plastics",
            'parent_id' =>2,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
        Category::create([
            'name' => "Lighting",
            'parent_id' =>2,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
        Category::create([
            'name' => "Plumbing Fixtures",
            'parent_id' =>2,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
        Category::create([
            'name' => "Safetly & Security",
            'parent_id' =>2,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
         Category::create([
            'name' => "Sub Contractors",
            'parent_id' =>3,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
         Category::create([
            'name' => "Real Estate",
            'parent_id' =>3,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
          Category::create([
            'name' => "Printing & Advertising",
            'parent_id' =>3,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
         Category::create([
            'name' => "Banking & Insurance",
            'parent_id' =>3,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
         Category::create([
            'name' => "Laws Firms",
            'parent_id' =>3,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
          Category::create([
            'name' => "Rental Services",
            'parent_id' =>3,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
         Category::create([
            'name' => "Training & Courses",
            'parent_id' =>3,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
         Category::create([
            'name' => "Government Offices",
            'parent_id' =>3,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
        Category::create([
            'name' => "Engineer",
            'parent_id' =>4,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
         Category::create([
            'name' => "Designer",
            'parent_id' =>4,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
          Category::create([
            'name' => "Business Analyst",
            'parent_id' =>4,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
          Category::create([
            'name' => "DB Administrator",
            'parent_id' =>4,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
        Category::create([
            'name' => "Accountant",
            'parent_id' =>4,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
          Category::create([
            'name' => "IT Technician",
            'parent_id' =>4,
            'is_active'=>"1",
            'created_by'=>5,
            'updated_by'=> 5
        ]);
       
    }
}
