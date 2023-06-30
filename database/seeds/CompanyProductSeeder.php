<?php

use Illuminate\Database\Seeder;
use App\CompanyProduct;

class CompanyProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
         CompanyProduct::create([
            'product_name'=>'Light House',
            'company_id'=>1,
            'photo' =>'maxresdefault.jpg',
            'product_description' =>'The focus of the project description is put on creating a clear and correct understanding of the project in minds of the people and organizations involved in the planning and development process. The project team (which is supposed to do the project) uses the document to get a general idea of what amount of work and under what requirements is planned for completion. The senior management team regards the project description as the key source of preliminary information necessary for strategic planning and development.',
            'price' =>'90000',
            'code' =>'001',
            'size' =>'3inches',
            'current_stock'=>'Instock',
            'created_by' =>1,
            'updated_by'=>1
        ]);

        CompanyProduct::create([
            'product_name'=>'Chair',
            'company_id'=>2,
            'photo' =>'images.jpg',
            'product_description' =>'The focus of the project description is put on creating a clear and correct understanding of the project in minds of the people and organizations involved in the planning and development process. The project team (which is supposed to do the project) uses the document to get a general idea of what amount of work and under what requirements is planned for completion. The senior management team regards the project description as the key source of preliminary information necessary for strategic planning and development.',
            'price' =>'90000',
            'code' =>'002',
            'size' =>'7inches',
            'current_stock'=>'Instock',
            'created_by' =>1,
            'updated_by'=>1
        ]);

        CompanyProduct::create([
            'product_name'=>'Light House',
            'company_id'=>3,
            'photo' =>'maxresdefault.jpg',
            'product_description' =>'The focus of the project description is put on creating a clear and correct understanding of the project in minds of the people and organizations involved in the planning and development process. The project team (which is supposed to do the project) uses the document to get a general idea of what amount of work and under what requirements is planned for completion. The senior management team regards the project description as the key source of preliminary information necessary for strategic planning and development.',
            'price' =>'90000',
            'code' =>'001',
            'size' =>'3inches',
            'current_stock'=>'Instock',
            'created_by' =>1,
            'updated_by'=>1
        ]);

        CompanyProduct::create([
            'product_name'=>'Chair',
            'company_id'=>1,
            'photo' =>'images.jpg',
            'product_description' =>'The focus of the project description is put on creating a clear and correct understanding of the project in minds of the people and organizations involved in the planning and development process. The project team (which is supposed to do the project) uses the document to get a general idea of what amount of work and under what requirements is planned for completion. The senior management team regards the project description as the key source of preliminary information necessary for strategic planning and development.',
            'price' =>'90000',
            'code' =>'002',
            'size' =>'7inches',
            'current_stock'=>'Instock',
            'created_by' =>1,
            'updated_by'=>1
        ]);
        CompanyProduct::create([
            'product_name'=>'Chair With black',
            'company_id'=>1,
            'photo' =>'chair300x300.pnng.jpg',
            'product_description' =>'The focus of the project description is put on creating a clear and correct understanding of the project in minds of the people and organizations involved in the planning and development process. The project team (which is supposed to do the project) uses the document to get a general idea of what amount of work and under what requirements is planned for completion. The senior management team regards the project description as the key source of preliminary information necessary for strategic planning and development.',
            'price' =>'90000',
            'code' =>'003',
            'size' =>'5inches',
            'current_stock'=>'Out Of Stock',
            'created_by' =>1,
            'updated_by'=>1
        ]);
        CompanyProduct::create([
            'product_name'=>'Chair With black',
            'company_id'=>2,
            'photo' =>'chair300x300.pnng.jpg',
            'product_description' =>'The focus of the project description is put on creating a clear and correct understanding of the project in minds of the people and organizations involved in the planning and development process. The project team (which is supposed to do the project) uses the document to get a general idea of what amount of work and under what requirements is planned for completion. The senior management team regards the project description as the key source of preliminary information necessary for strategic planning and development.',
            'price' =>'90000',
            'code' =>'003',
            'size' =>'5inches',
            'current_stock'=>'Pre Order',
            'created_by' =>1,
            'updated_by'=>1
        ]);
        CompanyProduct::create([
            'product_name'=>'Chair With black',
            'company_id'=>3,
            'photo' =>'chair300x300.pnng.jpg',
            'product_description' =>'The focus of the project description is put on creating a clear and correct understanding of the project in minds of the people and organizations involved in the planning and development process. The project team (which is supposed to do the project) uses the document to get a general idea of what amount of work and under what requirements is planned for completion. The senior management team regards the project description as the key source of preliminary information necessary for strategic planning and development.',
            'price' =>'90000',
            'code' =>'005',
            'size' =>'5inches',
            'current_stock'=>'Instock',
            'created_by' =>1,
            'updated_by'=>1
        ]);
        CompanyProduct::create([
            'product_name'=>'Lighting Table',
            'company_id'=>4,
            'photo' =>'3f2d9017918863.562c0eb097ab4.jpg',
            'product_description' =>'The focus of the project description is put on creating a clear and correct understanding of the project in minds of the people and organizations involved in the planning and development process. The project team (which is supposed to do the project) uses the document to get a general idea of what amount of work and under what requirements is planned for completion. The senior management team regards the project description as the key source of preliminary information necessary for strategic planning and development.',
            'price' =>'12000',
            'code' =>'004',
            'size' =>'5 inches',
            'current_stock'=>'Instock',
            'created_by' =>1,
            'updated_by'=>1
        ]);
        
    }
}
