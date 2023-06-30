<?php

use Illuminate\Database\Seeder;
use App\CompanyProject;

class CompanyProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          //
        CompanyProject::create([
            'project_type_id'=>1,
            'project_name'=>'Construction & Decoration',
            'company_id' =>1,
            'project_description' =>'Project Description is a formally written declaration of the project and its idea and context to explain the goals and objectives to be reached, the business need and problem to be addressed, potentials pitfalls and challenges, approaches and execution methods, resource estimates, people and organizations involved, and other relevant information that explains the need for project startup and aims to describe the amount of work planned for implementation.',
            'range_id' =>1,
            'created_by' =>5,
            'updated_by'=>5
           
            
        ]);
        CompanyProject::create([
            'project_type_id'=>1,
            'project_name'=>'Building Construction',
            'company_id' =>1,
            'project_description' =>'Project Description is a formally written declaration of the project and its idea and context to explain the goals and objectives to be reached, the business need and problem to be addressed, potentials pitfalls and challenges, approaches and execution methods, resource estimates, people and organizations involved, and other relevant information that explains the need for project startup and aims to describe the amount of work planned for implementation.',
            'range_id' =>1,
            'created_by' =>5,
            'updated_by'=>5
           
            
        ]);
        CompanyProject::create([
            'project_type_id'=>1,
            'project_name'=>'School Construction',
            'company_id' =>1,
            'project_description' =>'Project Description is a formally written declaration of the project and its idea and context to explain the goals and objectives to be reached, the business need and problem to be addressed, potentials pitfalls and challenges, approaches and execution methods, resource estimates, people and organizations involved, and other relevant information that explains the need for project startup and aims to describe the amount of work planned for implementation.',
            'range_id' =>1,
            'created_by' =>5,
            'updated_by'=>5
           
            
        ]);
        CompanyProject::create([
            'project_type_id'=>1,
            'project_name'=>'Industry Construction',
            'company_id' =>1,
            'project_description' =>'Project Description is a formally written declaration of the project and its idea and context to explain the goals and objectives to be reached, the business need and problem to be addressed, potentials pitfalls and challenges, approaches and execution methods, resource estimates, people and organizations involved, and other relevant information that explains the need for project startup and aims to describe the amount of work planned for implementation.',
            'range_id' =>1,
            'created_by' =>5,
            'updated_by'=>5
           
            
        ]);
        CompanyProject::create([
            'project_type_id'=>2,
            'project_name'=>'Decoration',
            'company_id' =>2,
            'project_description' =>'The focus of the project description is put on creating a clear and correct understanding of the project in minds of the people and organizations involved in the planning and development process. The project team (which is supposed to do the project) uses the document to get a general idea of what amount of work and under what requirements is planned for completion. The senior management team regards the project description as the key source of preliminary information necessary for strategic planning and development.',
            'range_id' =>3,
            'created_by' =>5,
            'updated_by'=>5
            
        ]);
        CompanyProject::create([
            'project_type_id'=>3,
            'project_name'=>'Decoration',
            'company_id' =>2,
            'project_description' =>'The focus of the project description is put on creating a clear and correct understanding of the project in minds of the people and organizations involved in the planning and development process. The project team (which is supposed to do the project) uses the document to get a general idea of what amount of work and under what requirements is planned for completion. The senior management team regards the project description as the key source of preliminary information necessary for strategic planning and development.',
            'range_id' =>2,
            'created_by' =>5,
            'updated_by'=>5
            
        ]);
        CompanyProject::create([
            'project_type_id'=>3,
            'project_name'=>'Decoration',
            'company_id' =>2,
            'project_description' =>'The focus of the project description is put on creating a clear and correct understanding of the project in minds of the people and organizations involved in the planning and development process. The project team (which is supposed to do the project) uses the document to get a general idea of what amount of work and under what requirements is planned for completion. The senior management team regards the project description as the key source of preliminary information necessary for strategic planning and development.',
            'range_id' =>2,
            'created_by' =>5,
            'updated_by'=>5
        ]);
        CompanyProject::create([
            'project_type_id'=>4,
            'project_name'=>'Construction',
            'company_id' =>2,
            'project_description' =>'The focus of the project description is put on creating a clear and correct understanding of the project in minds of the people and organizations involved in the planning and development process. The project team (which is supposed to do the project) uses the document to get a general idea of what amount of work and under what requirements is planned for completion. The senior management team regards the project description as the key source of preliminary information necessary for strategic planning and development.',
            'range_id' =>3,
            'created_by' =>5,
            'updated_by'=>5
        ]);
        CompanyProject::create([
            'project_type_id'=>5,
            'project_name'=>'Implemenataion & Maintenance',
            'company_id' =>3,
            'project_description' =>'The focus of the project description is put on creating a clear and correct understanding of the project in minds of the people and organizations involved in the planning and development process. The project team (which is supposed to do the project) uses the document to get a general idea of what amount of work and under what requirements is planned for completion. The senior management team regards the project description as the key source of preliminary information necessary for strategic planning and development.',
            'range_id' =>3,
            'created_by' =>5,
            'updated_by'=>5
        ]);
        CompanyProject::create([
            'project_type_id'=>6,
            'project_name'=>'Maintenance',
            'company_id' =>4,
            'project_description' =>'The focus of the project description is put on creating a clear and correct understanding of the project in minds of the people and organizations involved in the planning and development process. The project team (which is supposed to do the project) uses the document to get a general idea of what amount of work and under what requirements is planned for completion. The senior management team regards the project description as the key source of preliminary information necessary for strategic planning and development.',
            'range_id' =>4,
            'created_by' =>5,
            'updated_by'=>5
        ]);
        CompanyProject::create([
            'project_type_id'=>7,
            'project_name'=>'Swimming Decoration',
            'company_id' =>4,
            'project_description' =>'The focus of the project description is put on creating a clear and correct understanding of the project in minds of the people and organizations involved in the planning and development process. The project team (which is supposed to do the project) uses the document to get a general idea of what amount of work and under what requirements is planned for completion. The senior management team regards the project description as the key source of preliminary information necessary for strategic planning and development.',
            'range_id' =>4,
            'created_by' =>5,
            'updated_by'=>5
        ]);
        CompanyProject::create([
            'project_type_id'=>7,
            'project_name'=>'Building Decoration',
            'company_id' =>4,
            'project_description' =>'The focus of the project description is put on creating a clear and correct understanding of the project in minds of the people and organizations involved in the planning and development process. The project team (which is supposed to do the project) uses the document to get a general idea of what amount of work and under what requirements is planned for completion. The senior management team regards the project description as the key source of preliminary information necessary for strategic planning and development.',
            'range_id' =>4,
            'created_by' =>5,
            'updated_by'=>5
        ]);
    }
}
