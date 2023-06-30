<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\PackagePlan;
use App\Location;
use App\Category;
use App\FreelancerStatus;
use App\SkillForFreelancer;
use App\BlogCategory;
use App\Range;
use App\CategoryFreelancer;
use App\Userfunctions;
use App\ProjectSetting;
use App\CompanyAdvertisingPlan;
use App\Advertising;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
         Schema::defaultStringLength(191);
        //  starrt user function
        // end user function
         $package_plans = PackagePlan::all();
         $cities = Location::where('parent_id',0)->where('is_active','=','1')->orderBy('name','asc')->get();
         $townships = Location::where('parent_id','<>',0)->where('is_active','=','1')->orderBy('name','asc')->get();
         $categories = Category::where('parent_id',0)->where('is_active','=','1')->orderBy('name','asc')->get();
         $freelancer_statuses = FreelancerStatus::where('is_active','=','1')->orderBy('freelancer_status_name','asc')->get();
         $skill_for_freelancers = SkillForFreelancer::all();
         $blog_categories =BlogCategory::where('is_active','=','1')->orderBy('category_name','asc')->get();
         $servicecategories=Category::where('parent_id',1)->where('is_active','=','1')->orderBy('name','asc')->get();
         $supplierCategories=Category::where('parent_id',2)->where('is_active','=','1')->orderBy('name','asc')->get();
         $renobusinessCategories=Category::where('parent_id',3)->where('is_active','=','1')->orderBy('name','asc')->get();
         $freelancercategories=Category::where('parent_id',4)->where('is_active','=','1')->orderBy('name','asc')->get();
         $skillforfreelancerlists = SkillForFreelancer::pluck('skill_name', 'id');
         $freelancer = Category::where('name','Freelancer')->first();
         $freelancercategorieslist = Category::where('parent_id',4)->where('is_active','=','1')->get();
         $projectsetting =ProjectSetting::where('id',1)->first();
         view()->composer('*', function($view) {
         if(Auth::check()){
            $userfunctions=   Userfunctions::where('user_id',auth()->user()->id)->get();
            $view->with('userfunctions',  $userfunctions);
              }else{
                $userfunctions = null;
               $view->with('userfunctions',  $userfunctions);    
              }
        });
         $ranges = Range::where('is_active','1')->get(); 
         $sub_category=Category::where('parent_id',1)->get();
         
        //  start
          $logo_slider_companies = CompanyAdvertisingPlan::with(['companies','companies.parent_categories','companies.user'=>function($q){
            $q->where('logo','!=','')->get();
        }])->where('id','=',5)->first();
        
        $advertisings = Advertising::getPageListAdvertising();
        // end
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
         View::share('skillforfreelancerlists',$skillforfreelancerlists);
         View::share('freelancercategorieslist',$freelancercategorieslist);
         View::share('projectsetting',$projectsetting);
         View::share('sub_category',$sub_category); 
         
          View::share('logo_slider_companies',$logo_slider_companies);
          View::share('advertisings',$advertisings);
        
          
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
