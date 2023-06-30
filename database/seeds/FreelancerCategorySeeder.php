<?php

use Illuminate\Database\Seeder;
use App\CategoryFreelancer;

class FreelancerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CategoryFreelancer::create([
            'category_name'=>'Websites,IT & Software'
        ]);
        CategoryFreelancer::create([
            'category_name'=>'Mobile Phone & Computing'
        ]);
        CategoryFreelancer::create([
            'category_name'=>'Writing & Content'
        ]);
        CategoryFreelancer::create([
             'category_name'=>'Design,Media & Architecture'
        ]);
         CategoryFreelancer::create([
             'category_name'=>'Data Entry & Admin'
        ]); CategoryFreelancer::create([
            'category_name'=>'Engineering & Science'
        ]); CategoryFreelancer::create([
             'category_name'=>'Product Sourccing & Manufacturing'
        ]);
        CategoryFreelancer::create([
             'category_name'=>'Sales & Marketing'
        ]);
         CategoryFreelancer::create([
             'category_name'=>'Freight, Shipping & Transportation'
        ]);
         CategoryFreelancer::create([
             'category_name'=>'Business, Accounting,Human Resource & Legal'
        ]);
         CategoryFreelancer::create([
             'category_name'=>'Translation & Languages'
        ]);
         CategoryFreelancer::create([
             'category_name'=>'Local Jobs & Services'
        ]);
          CategoryFreelancer::create([
             'category_name'=>'Other'
        ]);
    }
}
