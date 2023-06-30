<?php

use Illuminate\Database\Seeder;
use App\ProjectPhoto;

class ProjectPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         ProjectPhoto::create([
            'company_project_id'=>1,
            'photo' =>'1598588107.png',
            'image_title' =>'Project Photo 1',
            'created_by' =>2,
            'updated_by' =>2,
        ]);
        ProjectPhoto::create([
            'company_project_id'=>1,
            'photo' =>'1598588107.png',
            'image_title' =>'Project Photo 2',
            'created_by' =>2,
            'updated_by' =>2,
        ]);
         ProjectPhoto::create([
            'company_project_id'=>1,
            'photo' =>'1598588107.png',
            'image_title' =>'Project Photo 2',
            'created_by' =>2,
            'updated_by' =>2,
        ]);
    }
}
