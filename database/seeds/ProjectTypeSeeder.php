<?php

use Illuminate\Database\Seeder;
use App\ProjectType;
class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          ProjectType::create([
            'project_type_name'=>'Residential Architecture & Interior Design',
            'created_at' =>date("Y-m-d H:m:i"),
            'updated_at' =>date("Y-m-d H:m:i")
        ]);
          ProjectType::create([
            'project_type_name'=>'Interior Renovation & Decoration',
            'created_at' =>date("Y-m-d H:m:i"),
            'updated_at' =>date("Y-m-d H:m:i")
        ]);
           ProjectType::create([
            'project_type_name'=>'Mental Hospital Conceptual Design',
            'created_at' =>date("Y-m-d H:m:i"),
            'updated_at' =>date("Y-m-d H:m:i")
        ]);
             ProjectType::create([
            'project_type_name'=>'Gold Exchange Commercial Buidling',
            'created_at' =>date("Y-m-d H:m:i"),
            'updated_at' =>date("Y-m-d H:m:i")
        ]);
                ProjectType::create([
            'project_type_name'=>'Condo Interior Design',
            'created_at' =>date("Y-m-d H:m:i"),
            'updated_at' =>date("Y-m-d H:m:i")
        ]);
    }
}
