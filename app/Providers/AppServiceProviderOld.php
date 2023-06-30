A<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\PackagePlan;
use App\Location;
use App\Category;
use App\FreelancerStatus;
use App\SkillForFreelancer;
use App\BlogCategory;
use App\Range;
use App\CategoryFreelancer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);
         $package_plans = PackagePlan::all();
         $cities = Location::where('parent_id',0)->get();
         $townships = Location::where('parent_id','<>',0)->get();
         $categories = Category::where('parent_id',0)->get();
         $freelancer_statuses = FreelancerStatus::all();
         $skill_for_freelancers = SkillForFreelancer::all();
         $blog_categories =BlogCategory::get();
         $servicecategories=Category::where('parent_id',1)->get();
         $supplierCategories=Category::where('parent_id',2)->get();
         $renobusinessCategories=Category::where('parent_id',3)->get();
         // $freelancercategories=CategoryFreelancer::all();
         $freelancercategories=Category::where('parent_id',4)->get();
         $ranges = Range::where('is_active','1')->get(); 
         View::share('package_plans',$package_plans);
         View::share('freelancer_statuses',$freelancer_statuses);
         View::share('categories',$categories);
         View::share('skill_for_freelancers',$skill_for_freelancers);
         View::share('blog_categories',$blog_categories); 
         View::share('package_plans',$package_plans);
         View::share('cities',$cities);
         View::share('serviceCategories',$servicecategories);
         View::share('supplierCategories',$supplierCategories);
         View::share('renobusinessCategories',$renobusinessCategories);
         View::share('ranges',$ranges);
         View::share('freelancercategories',$freelancercategories);
         View::share('townships',$townships);

        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
