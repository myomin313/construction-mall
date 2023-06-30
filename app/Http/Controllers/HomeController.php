<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use DB;
use App\SkillForFreelancer;
use App\FreelancerStatus;
use App\Location;
use App\Company;
use App\Category;
use App\CompanyService;
use App\CompanyProject;
use App\CompanyProduct;
use App\ProjectType;
use App\CompanyCategory;
use App\FreelancerComment;
use App\Advertising;
use App\Quotation;
use App\CompanyAdvertisingPlan;
use App\CompanyCompanyAdvertisingPlan;
use App\Freelancer;
use App\FreelancerSkill;
use App\DailyProductPrice;
use App\FreelancerRate;
use App\Myanboxtube;
use App\ProjectPhoto;
use App\Advertisewithus;
use App\AdvertiseWithUsHeader;
use App\Aboutusheader;
use App\Aboutus;
use App\Privacy;
use App\TermsOfService;
use App\User;
use App\News;
use App\CompanyPackagePlan;
use App\BlogCategory;
use Auth;
use Session;
use Carbon\Carbon;

class HomeController extends Controller
{
    
  

     public function index()
    {
    
       
        
        $url = URL :: previous();
       $route = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
       if(($route == 'company.send_quotation_form' || $route =='send_quotation_detail_form') && Session::has('quotation_data')) {
           Session::forget('quotation_data');
       }
        $news = News::limit(3)->get();
        $current_date = date('Y-m-d');
        $top_companies = CompanyAdvertisingPlan::with(['companies','companies.parent_categories','companies.user'=>function($q){
                      $q->where('logo','!=','')->get();
        }])->where('id','=',2)->first();
        $advertisingplans = CompanyAdvertisingPlan::with('companies','companies.user','companies.parent_categories','companies.child_categories')->where('id','=',3)->first();

        $service_companies = [];
        $supplier_companies =[];
        $reno_companies =[];
        foreach($advertisingplans->companies as $company)
        {
            if($company->parent_categories[0]->id == 1)
            {
             array_push($service_companies, $company);
            }
            elseif ($company->parent_categories[0]->id == 2) {
               array_push($supplier_companies, $company);
            }
            else{
              array_push($reno_companies, $company);
            }
        }
        /* Company Count */
        $categories=Category::select('id')->WhereIn('name',['Service','Supplier','Reno Business'])->get();
        $companies_count=[] ;
        foreach($categories as $category)
        {
            $company_count=Company::with(['parent_categories'=>function($q) use ($category){
                   $q->where('category_company.category_id',$category->id);
                  }])->whereHas('parent_categories', function ($q) use($category) {
                      $q->where('category_company.category_id', $category->id);
                   })->count();
            array_push($companies_count, $company_count);
        }
        /* Quotation Count */
        $quotation_count = Quotation::count();
        $project_count = CompanyProject::count();

        // $left_logo_advertising = CompanyAdvertisingPlan::with('companies','companies.user')->where('id','=',4)->first();

        $left_logo_advertising = CompanyAdvertisingPlan::with(['companies','companies.parent_categories','companies.user'=>function($q){
            $q->where('logo','!=','')->get();
        }])->where('id','=',4)->first();

       // $left_logo_advertising = CompanyAdvertisingPlan::

        $freelancers = Freelancer::with('user','skillForFreelancer')->orderBy('freelancers.id','Desc')->limit(15)->get();
        /* Blog Youtube */
        $latest_youtube = Myanboxtube::select(['title','link','image'])->orderBy('id','desc')->where('is_active','=','1')->first();

        $logo_slider_companies=$this->logo_slider();
        /*Daily Product Price */
        $daily_product_prices = DailyProductPrice::with('currency_unit')->limit(5)->orderby('id','desc')->get();

        //  about us 22.3.2021
        $aboutus = Aboutusheader::where('id',1)->first();
        $targets = Aboutus::where('type','=','target')->get();
        $home_sliders=Advertising::where('advertising_plan_id','=',1)->where('is_active','=','1')->get();


        return view('frontend.index',compact('advertisingplans','freelancers','top_companies','logo_slider_companies','left_logo_advertising','service_companies','supplier_companies','reno_companies','companies_count','quotation_count','project_count','latest_youtube','daily_product_prices','news','aboutus','targets','home_sliders'));
    }
     public function about_us(){
         /* Blog Youtube */
        $latest_youtube = Myanboxtube::select(['title','link','image'])->orderBy('id','Desc')->first();
        return $latest_youtube;
    }
     public function logo_slider()
    {
        $logo_slider_companies = CompanyAdvertisingPlan::with(['companies','companies.parent_categories','companies.user'=>function($q){
            $q->where('logo','!=','')->get();
        }])->where('id','=',5)->first();
        return $logo_slider_companies;
    }
      //home page  search function
    //  public function advanced_search(Request $request)
    // {

    //       $category= Category::where('id','=',$request->category)->first();
    //       $category_name = $category->name;
    //       $category_url = $category->category_url;
    //       $id = $category->id;
    //     //  $topfreelancers = Freelancer::with(['user'=>function($q){
    //     //             $q->select('id','logo','name')->get();
    //     //           }])->orderBy('freelancers.created_at','desc')->limit(10)->get();

    //               $topfreelancers=Freelancer::join('users','users.id','=','freelancers.user_id')
    //                           ->where('users.logo','!=',null)
    //                           ->where('users.logo','!=','undefined')
    //                           ->select('freelancers.*','users.logo','users.id','users.name')
    //                           ->orderBy('freelancers.created_at','desc')
    //                           ->limit(10)
    //                           ->get();

    //      $category=Category::where('name','Freelancer')->first();
    //      // $relatedcategories=Category::where('parent_id','=',$request->category)->get();
    //      if($category->id == $request->category)
    //      {

    //          $search_query = Freelancer::with('skillForFreelancer','location','freelancerstatus');
    //          if (!empty($request->keyword)) {
    //          $search_query->where(function ($query) use ($request) {
    //              $query->whereHas('user', function ($query) use ($request) {
    //                  $query->where('users.name','like','%'.$request->keyword.'%');
    //             })->orWhereHas('skillForFreelancer', function ($query) use ($request) {
    //               $query->where('skill_name','like','%'.$request->keyword.'%');
    //           });
    //       });
    //       }
    //   }
    //   else
    //  {
    //      $search_query = Company::with('child_categories')->where('is_active','1');
    //       if (!empty($request->keyword)) {
    //          $search_query->where(function ($query) use ($request) {
    //              $query->whereHas('user', function ($query) use ($request) {
    //                  $query->where('users.name','like','%'.$request->keyword.'%');
    //              });
    //          });
    //      }
    //  }
    //  if (!empty($request->location_id)) {
    //      $search_query->where(function ($query) use ($request) {
    //          $query->whereHas('location', function ($query) use ($request) {
    //              $query->where('locations.parent_id',$request->location_id);
    //          });
    //      });
    //  }
    //      if($request->has('category') && $category->id == $request->category)
    //         $search_category = 'categories.id';
    //      else
    //         $search_category = 'category_company.category_id';
    //       $request->search_category = $search_category;
    //       if (!empty($request->category)) {
    //              $search_query->where(function ($query) use ($request,$search_category) {
    //                  $query->whereHas('parent_categories', function ($query) use ($request) {
    //                  $query->where($request->search_category,$request->category);
    //                  });
    //              });
    //          }

    //      if($request->category == 4){
    //       $search_result=$search_query->paginate(15);
    //      }else{
    //       $search_result=$search_query->paginate(10);
    //      }
    //      $category_id = (!empty($request->category)?$request->category:'');
    //      $keyword     = (!empty($request->keyword)?$request->keyword:'');
    //      $location    = (!empty($request->location_id)?$request->location_id:'');
    //      $default_category_id  = (!empty($request->default_category_id)?$request->default_category_id:'');

    //      $search_result->appends(['keyword' => $keyword,'default_category_id'=>$default_category_id,'category'=>$category_id,'location'=>$location]);

    //      $logo_slider_companies=$this->logo_slider();
    //      $advertisings = Advertising::getPageListAdvertising();
    //      if($request->has('category') && $category->id == $request->category){
    //          $freelancers =$search_result;

    //           $freelancersrates=DB::table('freelancers')
    //         ->leftjoin('freelancer_rates','freelancer_rates.freelancer_id','=','freelancers.id')
    //         ->select('freelancers.*','freelancer_rates.freelancer_id', DB::raw('SUM(freelancer_rates.rate) as ratingtotal,COUNT(freelancer_rates.user_id) as usercount,SUM(freelancer_rates.rate) / COUNT(freelancer_rates.user_id) as rate'))
    //         ->groupBy('freelancer_rates.freelancer_id','freelancers.id')
    //         ->get();

    //          $skillforfreelancerlists = SkillForFreelancer::pluck('skill_name', 'id');
    //       $freelancerskilllists=DB::table('freelancer_skills')
    //         ->join('skill_for_freelancers','skill_for_freelancers.id','=','freelancer_skills.skill_id')
    //         ->get();
    //         $statusforfreelancerlists = FreelancerStatus::where('is_active','=',1)->get();
    //         $categorylists = DB::table('categories')->where('parent_id',4)->get();

    //          return view('frontend.freelancers',compact('freelancers','topfreelancers','logo_slider_companies','statusforfreelancerlists','advertisings','freelancersrates','freelancersrates','skillforfreelancerlists','freelancerskilllists','categorylists','advertisings','category_name','category_url','request','id'));
    //     }else if($request->has('category') && $request->category == 1){
    //          return view('frontend.service-companies',compact('search_result','logo_slider_companies','advertisings','category_name','category_url','request','id'));
    //       }else if($request->has('category') && $request->category == 2){
    //          return view('frontend.supplier-companies',compact('search_result','logo_slider_companies','advertisings','category_name','category_url','request','id'));
    //       }else if($request->has('category') && $request->category == 3){
    //          return view('frontend.renobusiness-companies',compact('search_result','logo_slider_companies','advertisings','category_name','category_url','request','id'));
    //       }

    //  }


       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       // freelancer search
     public function freelancers(Request $request)
    {
        
        try {
             $category=Category::where('name','Freelancer')->first();
             $category_name='professionals';
              $category_url='professionals';

             $search_query = Freelancer::with('skillForFreelancer','location','freelancerstatus','user','category')->where('freelancers.location_id','!=',null);
             
             $search_query->where(function ($query) {
                $query->whereHas('user', function ($query)  {
                    $query->where('users.email_verified_flag','=','1');
                });
            });
            
             if (!empty($request->keyword)) {
             $search_query->where(function ($query) use ($request) {
                 $query->whereHas('user', function ($query) use ($request) {
                     $query->where('users.name','like','%'.$request->keyword.'%');
                });
          });
          }

           if (!empty($request->location_id)) {
         $search_query->where(function ($query) use ($request) {
             $query->whereHas('location', function ($query) use ($request) {
                 $query->where('locations.parent_id',$request->location_id);
             });
         });
     }
       if (!empty($request->selectstatus)) {
         $search_query->where(function ($query) use ($request) {
             $query->whereHas('freelancerstatus', function ($query) use ($request) {
                 $query->where('freelancer_statuses.id',$request->selectstatus);
             });
         });
     }
     if (!empty($request->selectskill)) {
         $search_query->where(function ($query) use ($request) {
             $query->whereHas('skillForFreelancer', function ($query) use ($request) {
                 $query->where('freelancer_skills.skill_id',$request->selectskill);
             });
         });
     }
         if (!empty($request->category)) {
                 $search_query->where(function ($query) use ($request) {
                     $query->whereHas('child_categories', function ($query) use ($request) {
                     $query->where('categories',$request->category);
                     });
                 });
             }
          $freelancers=$search_query->paginate(15);
            //  $topfreelancers = Freelancer::with(['user'=>function($q){
            //         $q->select('id','logo','name')->get();
            //       }])->orderBy('freelancers.created_at','desc')->limit(10)->get();

               $topfreelancers=Freelancer::join('users','users.id','=','freelancers.user_id')
                              ->where('users.logo','!=',null)
                               ->where('users.logo','!=','undefined')
                               ->where('users.is_active','=','1')
                              ->select('freelancers.*','users.logo','users.id','users.name')
                              ->orderBy('freelancers.created_at','desc')
                              ->limit(10)
                              ->get();


            $freelancersrates=DB::table('freelancers')
            ->leftjoin('freelancer_rates','freelancer_rates.freelancer_id','=','freelancers.id')
            ->select('freelancers.*','freelancer_rates.freelancer_id', DB::raw('SUM(freelancer_rates.rate) as ratingtotal,COUNT(freelancer_rates.user_id) as usercount,SUM(freelancer_rates.rate) / COUNT(freelancer_rates.user_id) as rate'))
            ->groupBy('freelancer_rates.freelancer_id','freelancers.id')
            ->get();

           $skillforfreelancerlists = SkillForFreelancer::pluck('skill_name', 'id');
           $freelancerskilllists=DB::table('freelancer_skills')
            ->join('skill_for_freelancers','skill_for_freelancers.id','=','freelancer_skills.skill_id')
            ->get();

            $logo_slider_companies=$this->logo_slider();
            $advertisings = Advertising::getPageListAdvertising();

           $statusforfreelancerlists = FreelancerStatus::where('is_active','=',1)->get();
        //   $categorylists = DB::table('categories')->where('parent_id',4)->where('is_active','=','1')->get();
        
        $categorylists = DB::table('categories')->where('parent_id',4)->get();
        
           return view('frontend.freelancers',compact('freelancerskilllists','freelancersrates','freelancers','categorylists','skillforfreelancerlists','statusforfreelancerlists','topfreelancers','advertisings','logo_slider_companies','category_name','category_url','request'));
        } catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }

    }
    
    //start
     public function list_search(Request $request)
    {
        if(!empty($request->category) && $request->category == 4) 
        {
            return $this->freelancer_search($request);
        }
        if(!empty($request->category)){
            if($request->category == 1 || $request->category == 2 || $request->category == 3){
                $category= Category::where('id','=',$request->category)->first();
                $parent_url = '';
                $parent_id = $category->id;
            }
            else
            {
                $category= Category::with('parent:id,category_url')->where('id','=',$request->category)->first();
                $parent_url= $category->parent->category_url;
                $parent_id = $category->parent_id;
            }
            $category_name = $category->name;
            $category_url = $category->category_url;
            $id = $request->category;
        }else{
            $category= Category::where('id','=',$request->default_category_id)->first();
            $id = $request->default_category_id;
            $parent_id = $id;
            $category_url =$category->category_url;
            $category_name = $category->name;
            $parent_url = Null;
        }
       
       $search_result = $this->companyList($request->category,$category_url,$parent_url,$parent_id,$id,$category,$request->default_category_id,$request->keyword,$request->location_id);
       
       
        $logo_slider_companies=$this->logo_slider();
        $advertisings = Advertising::getPageListAdvertising();

        $categories = Category::where('parent_id',$parent_id)->where('is_active','=','1')->get();
         if(empty($parent_url)) {
            $parent_url = $category_url;
        }
        return view('frontend.company-list',compact('search_result','logo_slider_companies','request',
            'advertisings','category_name','category_url','id','categories','parent_url'));
    }
     public function freelancer_search($request)
    {
        $category= Category::where('id','=',$request->category)->first();
        $category_name = $category->name;
        $category_url = $category->category_url;
        $id = $category->id;
        $topfreelancers=Freelancer::join('users','users.id','=','freelancers.user_id')
            ->where('users.logo','!=',null)
            ->where('users.logo','!=','undefined')
            ->select('freelancers.*','users.logo','users.id','users.name')
            ->orderBy('freelancers.created_at','desc')
            ->limit(10)
            ->get();



        $search_query = Freelancer::with('skillForFreelancer','location','freelancerstatus');
          
           $search_query->where(function ($query) use ($request) {
                $query->whereHas('user', function ($query) use ($request) {
                    $query->where('users.email_verified_flag','=','1');
                });
            });
            
        if (!empty($request->keyword)) {
            $search_query->where(function ($query) use ($request) {
                $query->whereHas('user', function ($query) use ($request) {
                    $query->where('users.name','like','%'.$request->keyword.'%');
                })->orWhereHas('skillForFreelancer', function ($query) use ($request) {
                    $query->where('skill_name','like','%'.$request->keyword.'%');
                });
            });
        }
        if (!empty($request->location_id)) {
            $search_query->where(function ($query) use ($request) {
                $query->whereHas('location', function ($query) use ($request) {
                    $query->where('locations.parent_id',$request->location_id);
                });
            });
        }
        $search_result=$search_query->paginate(15);

        $logo_slider_companies=$this->logo_slider();
        $advertisings = Advertising::getPageListAdvertising();
        if($request->has('category') && $category->id == $request->category) {
            $freelancers = $search_result;
            $freelancersrates = DB::table('freelancers')
                ->leftjoin('freelancer_rates', 'freelancer_rates.freelancer_id', '=', 'freelancers.id')
                ->select('freelancers.*', 'freelancer_rates.freelancer_id', DB::raw('SUM(freelancer_rates.rate) as ratingtotal,COUNT(freelancer_rates.user_id) as usercount,SUM(freelancer_rates.rate) / COUNT(freelancer_rates.user_id) as rate'))
                ->groupBy('freelancer_rates.freelancer_id', 'freelancers.id')
                ->get();

            $skillforfreelancerlists = SkillForFreelancer::pluck('skill_name', 'id');
            $freelancerskilllists = DB::table('freelancer_skills')
                ->join('skill_for_freelancers', 'skill_for_freelancers.id', '=', 'freelancer_skills.skill_id')
                ->get();
            $statusforfreelancerlists = FreelancerStatus::where('is_active', '=', 1)->get();
            // $categorylists = DB::table('categories')->where('parent_id', 4)->where('is_active','=','1')->get();
            
            $categorylists = DB::table('categories')->where('parent_id',4)->get();
            
            return view('frontend.freelancers', compact('freelancers', 'topfreelancers', 'logo_slider_companies', 'statusforfreelancerlists', 'advertisings', 'freelancersrates', 'freelancersrates', 'skillforfreelancerlists', 'freelancerskilllists', 'categorylists', 'advertisings', 'category_name', 'category_url', 'request', 'id'));
        }

    }
    private function companyList($category_id,$category_url,$parent_url,$parent_id,$id,$category,$default_category=1,$keyword=NULL,$location_id=NULL){
        $request = [];
        $request['keyword'] = $keyword;
        $request['category_id'] = $category_id;
        $request['location_id'] = $location_id;
        
         $search_query = Company::with('user','child_categories','location.parent')->where('is_active','1');
             $search_query->where(function ($query) use ($request) {
                $query->whereHas('user', function ($query) use ($request) {
                    $query->where('users.email_verified_flag','=','1');
                });
            });
                     
        if (!empty($keyword)) {
            $search_query->where(function ($query) use ($request) {
                $query->whereHas('user', function ($query) use ($request) {
                    $query->where('users.name','like','%'.$request['keyword'].'%');
                });
            });
        }
         if (!empty($location_id)) {
            $search_query->where(function ($query) use ($request) {
                $query->whereHas('location', function ($query) use ($request) {
                    $query->where('locations.parent_id',$request['location_id']);
                });
            });
        }
      
        if(!empty($category_id) && $category->id == $category_id)
            $search_category = 'categories.id';
        else
            $search_category = 'category_company.category_id';

        if(empty($parent_url)) {
            $eloquent_category = 'parent_categories';
            $parent_url = $category_url;
        }
        else
            $eloquent_category = 'child_categories';
        
        
        $request['search_category'] = $search_category;
        $request['eloquent_category'] = $eloquent_category;
        
        if (!empty($category_id)) {
            $search_query->where(function ($query) use ($request,$search_category) {
                $query->whereHas($request['eloquent_category'], function ($query) use ($request) {
                     $query->where($request['search_category'],$request['category_id']);
                });
            });
        }
                
         $request['parent_category'] = $parent_id;

        if($id == $parent_id){
            $search_query->where(function ($query) use ($request) {
                $query->whereHas('parent_categories', function ($query) use ($request) {
                    $query->where('categories.id',$request['parent_category']);
                });
            });
        }
        $search_query->where(function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('users.id','<>','');
            });
        });
         $search_result=$search_query->paginate(10);
         return $search_result;
    }
    public function servicecompany($parent_url,$category_url=Null)
    {
        if($category_url == Null || empty($category_url)){
            $category= Category::where('category_url','=',$parent_url)->first();
            $id= $category->id;
            $category_name = $category->name;
        }else{
            $category= Category::where('category_url','=',$category_url)->first();
            $id= $category->id; 
            $category_name = $category->name;
        }    

        $logo_slider_companies=$this->logo_slider();
        $advertisings = Advertising::getPageListAdvertising();
        $parent_id = Category::select('id')->where('category_url',$parent_url)->first();
        //$category_url = $parent_url;

       if(empty($category_url)){
            $search_result = $this->companyList($id,$parent_url,Null,$parent_id->id,$id,$category);
        }else{
            $search_result = $this->companyList($id,$category_url,$parent_url,$parent_id->id,$id,$category);
        }

       $categories = Category::where('parent_id',$parent_id->id)->where('is_active','=','1')->get();
       

        return view('frontend.company-list',compact('search_result','logo_slider_companies',
            'advertisings','category_name','category_url','id','categories','parent_url'));
    }
  
    // search freelancer by category
     public function freelancersbycategory($category_url)
    {
        try {
            $category= Category::where('category_url','=',$category_url)->first();
            $id= $category->id;
            $category_name =  $category->name;

            $category=Category::where('name','Freelancer')->first();
             $search_query = Freelancer::with('skillForFreelancer','location','freelancerstatus','user','category');
             
              $search_query->where(function ($query) {
                $query->whereHas('user', function ($query)  {
                    $query->where('users.email_verified_flag','=','1');
                });
            });
            

         if (!empty($id)) {
                 $search_query->where(function ($query) use ($id) {
                     $query->whereHas('child_categories', function ($query) use ($id) {
                     $query->where('categories.id',$id);
                     });
                 });
             }

          $freelancers=$search_query->paginate(15);

          $topfreelancers=Freelancer::join('users','users.id','=','freelancers.user_id')
                              ->where('users.logo','!=',null)
                              ->where('users.logo','!=','undefined')
                              ->where('users.is_active','=','1')
                              ->select('freelancers.*','users.logo','users.id','users.name')
                              ->orderBy('freelancers.created_at','desc')
                              ->limit(10)
                              ->get();
            // $topfreelancers = Freelancer::with(['user'=>function($q){
            //         $q->select('id','logo','name')->get();
            //       }])->orderBy('freelancers.created_at','desc')->limit(10)->get();

            $freelancersrates=DB::table('freelancers')
            ->leftjoin('freelancer_rates','freelancer_rates.freelancer_id','=','freelancers.id')
            ->select('freelancers.*','freelancer_rates.freelancer_id', DB::raw('SUM(freelancer_rates.rate) as ratingtotal,COUNT(freelancer_rates.user_id) as usercount,SUM(freelancer_rates.rate) / COUNT(freelancer_rates.user_id) as rate'))
            ->groupBy('freelancer_rates.freelancer_id','freelancers.id')
            ->get();

           $skillforfreelancerlists = SkillForFreelancer::pluck('skill_name', 'id');
           $freelancerskilllists=DB::table('freelancer_skills')
            ->join('skill_for_freelancers','skill_for_freelancers.id','=','freelancer_skills.skill_id')
            ->get();


        $logo_slider_companies=$this->logo_slider();
        $advertisings = Advertising::getPageListAdvertising();
         $statusforfreelancerlists = FreelancerStatus::where('is_active','=',1)->get();

        //   $categorylists = DB::table('categories')->where('parent_id',4)->where('is_active','=','1')->get();
           $categorylists = DB::table('categories')->where('parent_id',4)->get();
           
           return view('frontend.freelancers',compact('freelancerskilllists','freelancersrates','freelancers','categorylists','skillforfreelancerlists','statusforfreelancerlists','topfreelancers','advertisings','logo_slider_companies','category_name','category_url'));
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }

    }
    public function freelancerdetails($freelancer_url)
    {
           $freelancer=DB::table('freelancers')
        ->join('users','users.id','=','freelancers.user_id')
        ->leftjoin('locations','locations.id','=','freelancers.location_id')
        ->leftjoin('freelancer_statuses','freelancer_statuses.id','=','freelancers.freelancer_status_id')
        ->leftjoin('categories','categories.id','=','freelancers.category_id')
        ->where('freelancers.freelancer_url','=',$freelancer_url )
        ->select('freelancers.*','users.name','users.phone','freelancers.id','locations.name as location_name','freelancer_statuses.freelancer_status_name','users.logo','categories.name as category_name','category_url','locations.parent_id as location_parent_id')
        ->first();
        
        if(!empty($freelancer->location_parent_id)){
            $freelancer_city =  Location::where('id',$freelancer->location_parent_id)->first();
        }else{
          $freelancer_city = null;  
        }
       

         $id=$freelancer->id;
        $freelancerskills=DB::table('freelancer_skills')
        ->join('skill_for_freelancers','skill_for_freelancers.id','=','freelancer_skills.skill_id')
        ->where('freelancer_skills.freelancer_id','=',$id)
        ->select('skill_for_freelancers.*')
        ->get();

        $freelancereducations=DB::table('freelancer_educations')
        ->where('freelancer_educations.freelancer_id','=',$id)
        ->select('freelancer_educations.*')
        ->get();

        $freelancerexperiences=DB::table('freelancer_experiences')
        ->where('freelancer_experiences.freelancer_id','=',$id)
        ->select('freelancer_experiences.*')
        ->get();

        $freelancerprojects=DB::table('freelancer_projects')
        ->where('freelancer_projects.freelancer_id','=',$id)
        ->select('freelancer_projects.*')
        ->get();


        $freelancerlist = DB::table('freelancers')->find($id);

        $freelancersimilars=DB::table('freelancers')
        ->join('categories','categories.id','=','freelancers.category_id')
        ->join('users','users.id','=','freelancers.user_id')
        ->join('freelancer_statuses','freelancer_statuses.id','=','freelancers.freelancer_status_id')
        ->leftjoin('freelancer_skills','freelancer_skills.freelancer_id','=','freelancers.id')
        ->leftjoin('skill_for_freelancers','skill_for_freelancers.id','=','freelancer_skills.skill_id')
        ->leftjoin('locations','locations.id','=','freelancers.location_id')
        ->where('freelancers.category_id','=',$freelancerlist->category_id)
        ->where('freelancers.freelancer_url','!=',$freelancer_url)
        ->where('users.is_active','=','1')
        ->select('freelancers.*','users.name','freelancer_statuses.freelancer_status_name','skill_for_freelancers.skill_name','locations.name as locationName','users.logo','categories.name as category_name')
        ->orderBy('freelancers.id', 'DESC')
        ->groupBy('freelancers.id')
        ->limit(4)
        ->get();

        $freelancersrates=DB::table('freelancers')
        ->leftjoin('freelancer_rates','freelancer_rates.freelancer_id','=','freelancers.id')
        ->select('freelancers.*','freelancer_rates.freelancer_id', DB::raw('SUM(freelancer_rates.rate) as ratingtotal,COUNT(freelancer_rates.user_id) as usercount,SUM(freelancer_rates.rate) / COUNT(freelancer_rates.user_id) as rate'))
        ->where('freelancers.Id','=',$id)
        ->groupBy('freelancer_rates.freelancer_id','freelancers.id')
        ->get();

        $freelancersratesforsimillar=DB::table('freelancers')
        ->leftjoin('freelancer_rates','freelancer_rates.freelancer_id','=','freelancers.id')
        ->select('freelancers.*','freelancer_rates.freelancer_id', DB::raw('SUM(freelancer_rates.rate) as ratingtotal,COUNT(freelancer_rates.user_id) as usercount,SUM(freelancer_rates.rate) / COUNT(freelancer_rates.user_id) as rate'))
        ->groupBy('freelancer_rates.freelancer_id','freelancers.id')
        ->get();

        $categorylists = DB::table('categories')->where('parent_id',4)->get();

            $freelancercomments=DB::table('freelancer_comments')
            ->join('users','users.id','=','freelancer_comments.user_id')
            ->leftjoin('companies','companies.user_id','=','users.id')
            ->leftjoin('category_company', function ($join) {
                $join->on('category_company.company_id', '=', 'companies.id')
              ->whereIn('category_company.category_id', [1, 2, 3]);
             })
            ->where('freelancer_comments.freelancer_id','=',$id)
            ->where('freelancer_comments.is_active','=','1')
            ->groupBy('freelancer_comments.id')
            ->select('freelancer_comments.*','users.name','users.logo','users.role','category_company.category_id')
            ->get();

            $userrating = DB::table('freelancer_rates')
            ->where('freelancer_rates.freelancer_id','=',$id)
            ->select('freelancer_rates.rate')
            ->first();

             $advertisings = Advertising::getPageDetailAdvertising();
             $logo_slider_companies=$this->logo_slider();

            return view('frontend.freelancer-detail',compact('freelancer','freelancerskills','freelancereducations','freelancerexperiences',
            'freelancerprojects','userrating','freelancersimilars','categorylists','freelancersrates','freelancersratesforsimillar','freelancercomments','advertisings','logo_slider_companies','freelancer_city'));

   }
   public function freelancerrating(Request $request,$id)
    {
       try{

        $freelancerrate = new FreelancerRate();
        $freelancerrate->freelancer_id = $id;
        $freelancerrate->user_id =Auth::user()->id;
        $freelancerrate->rate = $request->radioValue;

        $list = DB::table('freelancer_rates')
        ->where('freelancer_rates.freelancer_id', '=', $id)
        ->where('freelancer_rates.user_id', '=', $freelancerrate->user_id)
        ->get();

        if ($list ->isNotEmpty())
           {
            $freelancerrate=  DB::table('freelancer_rates')
            ->where('freelancer_rates.freelancer_id', '=', $id)
            ->where('freelancer_rates.user_id', '=', $freelancerrate->user_id)
            ->update(['freelancer_rates.rate' =>  $freelancerrate->rate]);
                   Session::flash('success','Successfully Update Rating!');
                $success = array('success'=>"Successfully Update Rating!");
                return response()->json($success);
        }
        else{
            if($freelancerrate->save())
            {    
               
                  Session::flash('success', 'Rated Successfully!'); 
                $success = array('success'=>"Thanks for rating!");
                return response()->json($success);
            }else
            {
                $errors = array('errors'=>"Something wrong!");
                return response()->json($errors);
            }
        }

       }catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }

    public function freelancercomments_add(Request $request,$id)
    {
        try{
            if($request->comments != null){
                $freelancercmt = new FreelancerComment();
                $freelancercmt->freelancer_id = $id;
                $freelancercmt->user_id =Auth::user()->id;
                $freelancercmt->comment = $request->comments;
            }
           else{
               return redirect()->back()->with('message','Fill with comment!');

           // return redirect()->back() ->with('alert', 'Fill with comment!');
           }

        if($freelancercmt->save())
            {
                return redirect()->back()->with('messageComment','Thanks for comment! Please wait for admin approves');
              //  return redirect()->back() ->with('alert', 'Thanks for comment!');
            }else
            {
                $errors = array('errors'=>"Something wrong!");
                return response()->json($errors);
            }
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }

    public function freelancercomments_edit(Request $request)
    {
        try{

            if($request->comment == null || $request->comment_id == null )
            {
                return redirect()->back()->with('alert', 'Fill with comment!');
            }
            else
            {
                //  dd ($request);exit();
                $freelancercmt = new FreelancerComment();
                $freelancercmt->id =  $request->comment_id;
                $freelancercmt->comment = $request->comment;

                $freelancercmt_update=  DB::table('freelancer_comments')
                ->where('freelancer_comments.id', '=', $freelancercmt->id)
                ->update(['freelancer_comments.comment' => $freelancercmt->comment]);
                return redirect()->back() ->with('alert', 'Thanks for update comment!');
            }
        }
        catch (\Illuminate\Database\QueryException $ex) {
            // var_dump("data");exit();
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }

    public function freelancercomments_delete($id)
    {
        try
        {
            if($id != null){
                $FreelancerComment = FreelancerComment::find($id);
                $FreelancerComment->delete();
                return redirect()->back() ->with('alert', 'Delete Successfully!');
            }
          else{
            return redirect()->back() ->with('alert', 'Something Wrong!');
          }
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }


   // public function searchServicecompanies(Request $request){
   //     $servicecompanies =Company::searchCompanies($request);
   //     $advertisings = Advertising::getAdvertising();
   //     return view('frontend.service-companies',compact('servicecompanies','advertisings'));
   // }
   // public function searchSuppliercompanies(Request $request){
   //     $suppliercompanies =Company::searchCompanies($request);
   //     $advertisings = Advertising::getAdvertising();
   //     return view('frontend.supplier-companies',compact('suppliercompanies','advertisings'));
   // }

   // public function searchRenobusinesscompanies(Request $request){
   //     $renobusinesscompanies =Company::searchCompanies($request);
   //     $advertisings = Advertising::getAdvertising();
   //     return view('frontend.renobusiness-companies',compact('renobusinesscompanies','advertisings'));
   // }

  public function servicecompanydetail($category_url,$company_url)
  {

    $servicecompanydetail=Company::companyDetail($company_url);
     $activepackage = $this->activeplan($servicecompanydetail);

    $id=$servicecompanydetail->id;
    $category= Category::where('category_url',$category_url)->first();
     $company_category_name = $category->name;
     $main_category_url ="";
    $main_category= Category::where('id',$category->parent_id)->first();
    if(!empty($main_category))
        $main_category_url = $main_category->category_url;
    $servicedetails = CompanyService::where('company_id',$id)->get();
    $projectdetails =CompanyProject::getCompanyProjects($id);
    $projecttypedetails = ProjectType::getCompanyProjectTypes($id);
    $companycategories = CompanyCategory::getCompanyCategories($id);
    $advertisings = Advertising::getPageDetailAdvertising();

        foreach($companycategories as $companycategory){
            if($companycategory->parent_id == 0){
            $relatedcompanies =CompanyCategory::getRelatedCompanies($companycategory->category_id);
                 foreach ($relatedcompanies as $related) {
                  $related->categories=CompanyCategory::relatedCategory($related->company_id);
                  }
                 }
             }

              $logo_slider_companies=$this->logo_slider();
      return view('frontend.service-company-detail',compact('servicecompanydetail','servicedetails','projectdetails','companycategories','relatedcompanies','projecttypedetails','advertisings','logo_slider_companies','company_category_name','category_url','main_category_url','activepackage'));
  }

//   public function servicecompanydetail($category_url,$company_url)
//   {

//     $companydetail=Company::companyDetail($company_url);
//      $activepackage = $this->activeplan($companydetail);

//     $id=$companydetail->id;
//     $category= Category::where('category_url',$category_url)->first();
//      $company_category_name = $category->name;
//      $main_category_url ="";
//     $main_category= Category::where('id',$category->parent_id)->first();
//     if(!empty($main_category))
//         $main_category_url = $main_category->category_url;
//         $main_category_id  = $main_category->id;
//     $servicedetails = CompanyService::where('company_id',$id)->get();
//     $projectdetails =CompanyProject::getCompanyProjects($id);
//     $projecttypedetails = ProjectType::getCompanyProjectTypes($id);
//     $companycategories = CompanyCategory::getCompanyCategories($id);
//     $advertisings = Advertising::getPageDetailAdvertising();
//     // added
//      $productdetails =CompanyProduct::getCompanyProduct($id);
//     //added end

//         foreach($companycategories as $companycategory){
//             if($companycategory->parent_id == 0){
//             $relatedcompanies =CompanyCategory::getRelatedCompanies($companycategory->category_id);
//                  foreach ($relatedcompanies as $related) {
//                   $related->categories=CompanyCategory::relatedCategory($related->company_id);
//                   }
//                  }
//              }

//               $logo_slider_companies=$this->logo_slider();
//       return view('frontend.company-detail',compact('companydetail','servicedetails','projectdetails','companycategories','relatedcompanies','projecttypedetails','advertisings','logo_slider_companies','company_category_name','category_url','main_category_url','activepackage','main_category_id','productdetails'));
//   }
//       public function suppliercompanydetail($category_url,$company_url)
//   {
//          $companydetail=Company::companyDetail($company_url);

//          $activepackage = $this->activeplan($companydetail);

//          $id=$companydetail->id;
//          $category= Category::where('category_url',$category_url)->first();
//          $company_category_name = $category->name;
//           $main_category_url ="";
//          $main_category= Category::where('id',$category->parent_id)->first();
//         if(!empty($main_category))
//             $main_category_url = $main_category->category_url;
//             $main_category_id  = $main_category->id;
//          $projectdetails =CompanyProject::getCompanyProjects($id);
//          $productdetails =CompanyProduct::getCompanyProduct($id);
//           $companycategories = CompanyCategory::getCompanyCategories($id);
//          $projectdetails =CompanyProject::getCompanyProjects($id);
//          $projecttypedetails = ProjectType::getCompanyProjectTypes($id);

//               foreach($companycategories as $companycategory){
//             if($companycategory->parent_id == 0){
//             $relatedcompanies =CompanyCategory::getRelatedCompanies($companycategory->category_id);
//                  foreach ($relatedcompanies as $related) {
//                   $related->categories=CompanyCategory::relatedCategory($related->company_id);
//                   }
//                  }
//              }
//          $advertisings = Advertising::getPageDetailAdvertising();
//           $logo_slider_companies=$this->logo_slider();
//       return view('frontend.company-detail',compact('companydetail','projectdetails','productdetails','companycategories',
//       'projecttypedetails','relatedcompanies','advertisings','logo_slider_companies','company_category_name','category_url','main_category_url','activepackage','main_category_id'));
//   }
//   public function renobusinessdetail($category_url,$company_url)
//   {
//       $companydetail=Company::companyDetail($company_url);
//       $activepackage = $this->activeplan($companydetail);
//       $id= $companydetail->id;
//       $category= Category::where('category_url',$category_url)->first();
//       $company_category_name = $category->name;
//       $main_category_url ="";
//       $main_category= Category::where('id',$category->parent_id)->first();
//         if(!empty($main_category))
//             $main_category_url = $main_category->category_url;
//              $main_category_id  = $main_category->id;
//       $companycategories = CompanyCategory::getCompanyCategories($id);
//                 foreach($companycategories as $companycategory){
//             if($companycategory->parent_id == 0){
//             $relatedcompanies =CompanyCategory::getRelatedCompanies($companycategory->category_id);
//                  foreach ($relatedcompanies as $related) {
//                   $related->categories=CompanyCategory::relatedCategory($related->company_id);
//                   }
//                  }
//              }

//       $advertisings = Advertising::getPageDetailAdvertising();
//          $logo_slider_companies=$this->logo_slider();
//       return view('frontend.company-detail',compact('companydetail','companycategories','relatedcompanies','advertisings','logo_slider_companies',
//       'company_category_name','category_url','main_category_url','activepackage','main_category_id'));
//   }

     public function companydetail($company_url){

     $companydetail=Company::companyDetail($company_url);
     $activepackage = $this->activeplan($companydetail);
    $id=$companydetail->id;
    
    $cat=DB::table('companies')
        ->join('category_company','category_company.company_id','=','companies.id')
        ->join('categories','categories.id','=','category_company.category_id')
        ->where('categories.parent_id','=',0)
        ->where('companies.id','=',$id)
        ->select('categories.category_url as category_url','categories.id as category_id','categories.name as category_name')
        ->first();
        
        
         $main_category_url = $cat->category_url;
        $main_category_id  = $cat->category_id;
        $category_url      = $cat->category_url;
        $category_id       = $cat->category_id;
        $company_category_name = $cat->category_name;
        
        
    
    
//     $category= Category::where('category_url',$category_url)->first();
//   $category_id =$category->id;

//      $company_category_name = $category->name;
//      $main_category_url ="";
//     $main_category= Category::where('id',$category->parent_id)->first();
//     if(!empty($main_category)){
//         $main_category_url = $main_category->category_url;
//         $main_category_id  = $main_category->id;
//     }else{
//         $main_category_url = $category->category_url;
//         $main_category_id  = $category->id;
//     }

    $servicedetails = CompanyService::where('company_id',$id)->get();
    $projectdetails =CompanyProject::getCompanyProjects($id);
    $projecttypedetails = ProjectType::getCompanyProjectTypes($id);
    $companycategories = CompanyCategory::getCompanyCategories($id);
    $advertisings = Advertising::getPageDetailAdvertising();
    // added
     $productdetails =CompanyProduct::getCompanyProduct($id);
    //added end

        // foreach($companycategories as $companycategory){
        //     if($companycategory->parent_id == 0){
        //     $relatedcompanies =CompanyCategory::getRelatedCompanies($companycategory->category_id);
        //          foreach ($relatedcompanies as $related) {
        //           $related->categories=CompanyCategory::relatedCategory($related->company_id);
        //           }
        //          }
        //      }
        
        $company_category_arr = [];
        foreach($companycategories as $company_category){
            array_push($company_category_arr,$company_category->category_id);
        }
        $related_companies = Company::with(['user:id,name,logo','categories'])->where(function ($query) use ($company_category_arr) {
                    
                $query->whereHas('categories', function ($query) use ($company_category_arr) {
                    $query->select('categories.id','categories.name')->whereNotNull('categories.id')->whereIn('category_company.category_id',$company_category_arr);
                });
                    
                })->where('id','<>', $companydetail->id)->inRandomOrder()->limit(20)->get();

              $logo_slider_companies=$this->logo_slider();
       return view('frontend.company-detail',compact('companydetail','servicedetails','projectdetails','companycategories','related_companies','projecttypedetails','advertisings','logo_slider_companies','company_category_name','category_url','main_category_url','activepackage','main_category_id','productdetails','category_id'));

     }

  public function suppliercompanydetail($category_url,$company_url)
  {
         $suppliercompanydetail=Company::companyDetail($company_url);

         $activepackage = $this->activeplan($suppliercompanydetail);

         $id=$suppliercompanydetail->id;
         $category= Category::where('category_url',$category_url)->first();
         $company_category_name = $category->name;
          $main_category_url ="";
         $main_category= Category::where('id',$category->parent_id)->first();
        if(!empty($main_category))
            $main_category_url = $main_category->category_url;

         $supplierprojectdetails =CompanyProject::getCompanyProjects($id);
         $productdetails =CompanyProduct::getCompanyProduct($id);
          $companycategories = CompanyCategory::getCompanyCategories($id);
         $projectdetails =CompanyProject::getCompanyProjects($id);
         $projecttypedetails = ProjectType::getCompanyProjectTypes($id);

              foreach($companycategories as $companycategory){
            if($companycategory->parent_id == 0){
            $relatedcompanies =CompanyCategory::getRelatedCompanies($companycategory->category_id);
                 foreach ($relatedcompanies as $related) {
                  $related->categories=CompanyCategory::relatedCategory($related->company_id);
                  }
                 }
             }
         $advertisings = Advertising::getPageDetailAdvertising();
          $logo_slider_companies=$this->logo_slider();
      return view('frontend.supplier-company-detail',compact('suppliercompanydetail','supplierprojectdetails','productdetails','companycategories','projectdetails',
      'projecttypedetails','relatedcompanies','advertisings','logo_slider_companies','company_category_name','category_url','main_category_url','activepackage'));
  }
  public function renobusinessdetail($category_url,$company_url)
  {
      $renobusinessdetail=Company::companyDetail($company_url);
      $activepackage = $this->activeplan($renobusinessdetail);
      $id= $renobusinessdetail->id;
      $category= Category::where('category_url',$category_url)->first();
      $company_category_name = $category->name;
      $main_category_url ="";
      $main_category= Category::where('id',$category->parent_id)->first();
        if(!empty($main_category))
            $main_category_url = $main_category->category_url;

      $companycategories = CompanyCategory::getCompanyCategories($id);
                foreach($companycategories as $companycategory){
            if($companycategory->parent_id == 0){
            $relatedcompanies =CompanyCategory::getRelatedCompanies($companycategory->category_id);
                 foreach ($relatedcompanies as $related) {
                  $related->categories=CompanyCategory::relatedCategory($related->company_id);
                  }
                 }
             }

      $advertisings = Advertising::getPageDetailAdvertising();
         $logo_slider_companies=$this->logo_slider();
      return view('frontend.renobusiness-company-detail',compact('renobusinessdetail','companycategories','relatedcompanies','advertisings','logo_slider_companies',
      'company_category_name','category_url','main_category_url','activepackage'));

  }

   public function uploadQuotationfile($file){
        // $path  = storage_path('app/public/quotation_files/'. $file->getClientOriginalName());
        // file_put_contents($path,$file->getClientOriginalName());
        // return $file->getClientOriginalName();
        $file->move(storage_path('app/public/quotation_files/'),$file->getClientOriginalName);

       // return response()->json(['status'=>true,'image_name'=>$file_name]);

    }
    public function blogssearch($category_url)
    {
        try
        {  
            $search_blog=BlogCategory::where('category_url','=',$category_url)->select('id')->first();
            
            $blogcategorylists = DB::table('blog_categories')->where('is_active','=','1')->get();

                $blogstopfive= $recentlists =DB::table('blogs')
                ->join('users','users.id','=','blogs.post_user_id')
                //->join('blog_categories','blog_categories.id','=','blogs.blog_category_id')
                ->where('blogs.is_active','=','1')
                ->select('blogs.*','users.name')
                ->orderBy('blogs.id', 'desc')
                ->limit(5)
                ->get();
                
                foreach($blogstopfive as $blog){
                     $categories= explode (",", $blog->blog_category_id);
                      $blog->category_arr = [];
                      foreach($categories as $category){
                     $cate=BlogCategory::where('id','=',$category)
                          ->select('category_name')->first();
                         array_push($blog->category_arr, $cate->category_name);  
                      }
                      
                     $blog->description =$this->setImageSrc($blog->description);
                     
                     
                 }
                 
                $ids = array();
               foreach($blogstopfive as $blogtop) {
                  $ids[] = $blogtop->id;
                  }
                  
                $bloglistall=DB::table('blogs')
                ->join('blog_categories','blog_categories.id','=','blogs.blog_category_id')
                ->join('users','users.id','=','blogs.post_user_id')
                //->where('blog_categories.category_url','=',$category_url)
                ->where('blogs.is_active','=','1')
                ->whereNotIn('blogs.id', $ids)
                ->whereRaw('FIND_IN_SET('."$search_blog->id".',blogs.blog_category_id)')
                ->select('blogs.*','users.name')
                ->orderBy('blogs.id', 'desc')
                ->paginate(17);
                
                foreach($bloglistall as $blog){
                     $categories= explode (",", $blog->blog_category_id);
                      $blog->category_arr = [];
                      foreach($categories as $category){
                     $cate=BlogCategory::where('id','=',$category)
                          ->select('category_name')->first();
                         array_push($blog->category_arr, $cate->category_name);  
                      }
                     $blog->description =$this->setImageSrc($blog->description);
                      
                 }
                 
            // }
           $recentlists =DB::table('blogs')
                ->join('users','users.id','=','blogs.post_user_id')
                //->join('blog_categories','blog_categories.id','=','blogs.blog_category_id')
                ->where('blogs.is_active','=','1')
                ->whereNotIn('blogs.id', $ids)
                ->select('blogs.*','users.name')
                ->orderBy('blogs.id', 'desc')
                ->limit(7)
                ->get();
                
                
                
                foreach($recentlists as $blog){
                     $categories= explode (",", $blog->blog_category_id);
                      $blog->category_arr = [];
                      foreach($categories as $category){
                     $cate=BlogCategory::where('id','=',$category)
                          ->select('category_name')->first();
                         array_push($blog->category_arr, $cate->category_name); 
                      }
                      
                     $blog->description =$this->setImageSrc($blog->description);
                 }
                 


                 $logo_slider_companies=$this->logo_slider();

            return view('frontend.blogs',compact('blogcategorylists','bloglistall','recentlists','logo_slider_companies','blogstopfive'));
            // dd($bloglistsall);exit();
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }

    }
     public function bloglist(Request $request)
    {
        try{
            $keyword = $request->keyword;
            $date = Carbon::now();// will get you the current date, time

            $blogcategorylists = DB::table('blog_categories')->where('is_active','=','1')->get();


            $blogstopfive= $recentlists =DB::table('blogs')
                ->join('users','users.id','=','blogs.post_user_id')
                //->join('blog_categories','blog_categories.id','=','blogs.blog_category_id')
                ->where('blogs.is_active','=','1')
                ->select('blogs.*','users.name')
                ->orderBy('blogs.id', 'desc')
                ->limit(5)
                ->get();
                
                
                foreach($blogstopfive as $blog){
                     $categories= explode (",", $blog->blog_category_id);
                      $blog->category_arr = [];
                      foreach($categories as $category){
                     $cate=BlogCategory::where('id','=',$category)
                          ->select('category_name')->first();
                         array_push($blog->category_arr, $cate->category_name);  
                      }
                      
                      
                       $blog->description =$this->setImageSrc($blog->description);
                     
                 }

                $ids = array();
               foreach($blogstopfive as $blogtop) {
                  $ids[] = $blogtop->id;
                  }


             if($keyword == null){

                 $bloglistall = DB::table('blogs')
                 ->join('users','users.id','=','blogs.post_user_id')
                 ->where('blogs.is_active','=','1')
                 ->whereNotIn('blogs.id', $ids)
                 ->select('blogs.*','users.name')
                 ->orderBy('blogs.id', 'desc')
                 ->paginate(17);
                 
                   foreach($bloglistall as $blog){
                     $categories= explode (",", $blog->blog_category_id);
                      $blog->category_arr = [];
                      foreach($categories as $category){
                     $cate=BlogCategory::where('id','=',$category)
                          ->select('category_name')->first();
                         array_push($blog->category_arr, $cate->category_name);  
                      }
                      
                     $blog->description =$this->setImageSrc($blog->description);
                     
                     
                 }

             }else{

                $bloglistall=DB::table('blogs')
                ->join('blog_categories','blog_categories.id','=','blogs.blog_category_id')
                ->join('users','users.id','=','blogs.post_user_id')
                ->where('blogs.is_active','=','1')
                ->whereNotIn('blogs.id', $ids)
                ->where(function ($query) use ($keyword) {
                    $query->where("blogs.title", "LIKE","%$keyword%")
                          ->orWhere("blog_categories.category_name", "LIKE", "%$keyword%");
                          //->orWhere("blogs.description", "LIKE", "%$keyword%");
                    //  $query->where('blogs.title','like','%'.$keyword.'%')
                    //  ->orWhere('blog_categories.category_name','like','%'.$keyword.'%')
                    //  ->orWhere('blogs.description','like','%'.$keyword.'%');
                })
                ->select('blogs.*','users.name','blog_categories.category_name')
                ->orderBy('blogs.id','desc')
                ->paginate(17);
                
                foreach($bloglistall as $blog){
                     $categories= explode (",", $blog->blog_category_id);
                      $blog->category_arr = [];
                      foreach($categories as $category){
                     $cate=BlogCategory::where('id','=',$category)
                          ->select('category_name')->first();
                         array_push($blog->category_arr, $cate->category_name);  
                      }
                  $blog->description =$this->setImageSrc($blog->description);
                     
                 }
             }



             $recentlists =DB::table('blogs')
                ->join('users','users.id','=','blogs.post_user_id')
                ->join('blog_categories','blog_categories.id','=','blogs.blog_category_id')
                ->where('blogs.is_active','=','1')
                ->whereNotIn('blogs.id', $ids)
                ->select('blogs.*','users.name','blog_categories.category_name')
                ->orderBy('blogs.id', 'desc')
                ->limit(7)
                ->get();
                
                
                foreach($recentlists as $blog){
                     $categories= explode (",", $blog->blog_category_id);
                      $blog->category_arr = [];
                      foreach($categories as $category){
                     $cate=BlogCategory::where('id','=',$category)
                          ->select('category_name')->first();
                         array_push($blog->category_arr, $cate->category_name);  
                      }
                      
                     $blog->description =$this->setImageSrc($blog->description);
                     
                     
                 }




                 $logo_slider_companies=$this->logo_slider();

            return view('frontend.blogs',compact('blogcategorylists','bloglistall','recentlists','logo_slider_companies','blogstopfive','keyword'));
            
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
    public function projectDetail($main_company_url,$category_url,$company_url,$project_url){


        $companyproject=CompanyProject::leftjoin('project_types','project_types.id','=','company_projects.project_type_id')
                        ->leftjoin('ranges','ranges.id','=','company_projects.range_id')
                        ->leftjoin('companies','companies.id','=','company_projects.company_id')
                        ->leftjoin('users','users.id','=','companies.user_id')
                        ->where('company_projects.project_url','=',$project_url)
                        ->select('company_projects.*','ranges.minimum_price','ranges.maximum_price','project_types.project_type_name','companies.company_url','users.name as company_name')
                        ->first();
            $id=$companyproject->id;
        $projectphotos=ProjectPhoto::where('company_project_id',$id)->select('*')->get();
        $logo_slider_companies=$this->logo_slider();
        return view('frontend.project-detail',compact('companyproject','projectphotos','logo_slider_companies','category_url','main_company_url','company_url'));
        
    }
      public function searchServicecompanies(Request $request){
        $servicecompanies =Company::searchCompanies($request);
        $advertisings = Advertising::getPageListAdvertising();
        return view('frontend.service-companies',compact('servicecompanies','advertisings'));
    }
    public function searchSuppliercompanies(Request $request){
        $suppliercompanies =Company::searchCompanies($request);
        $advertisings = Advertising::getPageListAdvertising();
        return view('frontend.supplier-companies',compact('suppliercompanies','advertisings'));
    }

    public function searchRenobusinesscompanies(Request $request){
        $renobusinesscompanies =Company::searchCompanies($request);
        $advertisings = Advertising::getPageListAdvertising();
        return view('frontend.renobusiness-companies',compact('renobusinesscompanies','advertisings'));
    }
    public function blogsdetail($blog_url)
    {
        try{
            if($blog_url != null)
            {
                $bloglist = DB::table('blogs')
                ->join('users','users.id','=','blogs.post_user_id')
                //->join('blog_categories','blog_categories.id','=','blogs.blog_category_id')
                ->where('blogs.blog_url', '=',$blog_url)
                ->select('blogs.*','users.name')
                ->first();
                
                   $bloglist->description =$this->setImageSrc($bloglist->description);
                  
                 
                
                $blog_detail_category=explode(",",$bloglist->blog_category_id);
                
                 $bloglist->category_arr = [];
                      foreach($blog_detail_category as $category){
                     $cate=BlogCategory::where('id','=',$category)
                          ->select('category_name')->first();
                         array_push($bloglist->category_arr, $cate->category_name);  
                      }
                      
                      

                $bloglistsall = DB::table('blogs')
                ->join('users','users.id','=','blogs.post_user_id')
                //->join('blog_categories','blog_categories.id','=','blogs.blog_category_id')
                ->where('blogs.is_active','=','1')
                ->where('blogs.blog_url', '!=',$blog_url)
                ->select('blogs.*','users.name')
                ->orderBy('blogs.created_at', 'desc')
                ->limit(6)
                ->get();
                
                 foreach($bloglistsall as $blog){
                     $categories= explode (",", $blog->blog_category_id);
                      $blog->category_arr = [];
                      foreach($categories as $category){
                     $cate=BlogCategory::where('id','=',$category)
                          ->select('category_name')->first();
                         array_push($blog->category_arr, $cate->category_name);  
                      }
                      
                     $blog->description =$this->setImageSrc($blog->description);
                     
                     
                 }

                 $recentlists =DB::table('blogs')
                ->join('users','users.id','=','blogs.post_user_id')
               // ->join('blog_categories','blog_categories.id','=','blogs.blog_category_id')
                ->where('blogs.is_active','=','1')
                ->where('blogs.blog_url', '!=',$blog_url)
                ->select('blogs.*','users.name')
                ->orderBy('blogs.updated_at', 'desc')
                ->limit(7)
                ->get();
                
                foreach($recentlists as $blog){
                     $categories= explode (",", $blog->blog_category_id);
                      $blog->category_arr = [];
                      foreach($categories as $category){
                     $cate=BlogCategory::where('id','=',$category)
                          ->select('category_name')->first();
                         array_push($blog->category_arr, $cate->category_name);  
                      }
                      
                     $blog->description =$this->setImageSrc($blog->description);
                     
                }
                    

                $blogcategorylists = DB::table('blog_categories')->where('is_active','=','1')->get();
                 $logo_slider_companies=$this->logo_slider();

                return view('frontend.blog-detail',compact('blogcategorylists','bloglist','bloglistsall','recentlists','logo_slider_companies'));
            }
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
     public function sendQuotationData(Request $request){
     if(isset($request)){
        $status = $this->validation($request);
        if($status->fails()) {
            $errors =array('errors'=>$status->errors()->toArray());
           return response()->json($errors);
        }else{
            $data=array();
            $filearr =array();
             if(htmlspecialchars($request->quotation_file)) {
                $file = $request->quotation_file;
                  $filename=time().'_'.$file->getClientOriginalName();
                  array_push($filearr, $filename);
                 $file->move(storage_path('app/public/quotation/'),$filename);
              }
               if(htmlspecialchars($request->quotation_file1)) {
                $file1 = $request->quotation_file1;
                  $filename=time().'_'.$file1->getClientOriginalName();
                  array_push($filearr, $filename);
              }
               if(htmlspecialchars($request->quotation_file2)) {
                $file2 = $request->quotation_file2;
                  $filename=time().'_'.$file2->getClientOriginalName();
                  array_push($filearr, $filename);
              }

        $data['category_id'] = htmlspecialchars($request->category_id);
        $data['subcategory_id'] =serialize($request->subcategory_id);
        $data['building_type']  = htmlspecialchars($request->building_type);
        $data['city'] = htmlspecialchars($request->city);
        $data['township'] = htmlspecialchars($request->township);
        $data['address']  = htmlspecialchars($request->address);
        $data['project_information'] = htmlspecialchars($request->project_information);
        $data['contact_name'] = htmlspecialchars($request->contact_name);
        $data['contact_email']= (htmlspecialchars($request->email)!=',')?htmlspecialchars($request->email):'';
        $data['contact_phone']= (htmlspecialchars($request->phone)!=',')?htmlspecialchars($request->phone):'';
        $data['project_expected_start_date'] = htmlspecialchars($request->project_expected_start_date);
        $data['budget'] =htmlspecialchars($request->budget);
        $data['file'] = serialize($filearr);
        $data['contact_allow'] = $request->contact_allow;
        if(isset($request->company_id)){
            $data['company_id'] = $request->company_id;
        }else{
            $data['company_id'] = "";
        }
        $data['prefer_contact_way'] = serialize($request->prefer_contact_way);
        $data['best_contact_time']  = serialize($request->best_contact_time);
        $data['type'] = htmlspecialchars($request->type);
        Session::put('quotation_data', $data);
        $success = array('success'=>"Data was added to Session!",'type'=>htmlspecialchars($request->type));
        return response()->json($success);

        }
     }
     else{
         $errors = array('errors'=>"Something wrong!");
         return response()->json($errors);
     }

    }
    private function CheckCompanyPackageWithChildCategory($package_id,$subcategory_id){
         if(Session::has('login_company_id')){
             $plan_companies=Company::with(['user','parent_categories','child_categories'=>function($q) use ($subcategory_id){
               $q->WhereIn('category_company.category_id',$subcategory_id);
              }])->whereHas('child_categories', function ($q) use($subcategory_id) {
              $q->WhereIn('category_company.category_id', $subcategory_id);
            })->where('active_package_plan_id','=',$package_id)->where('id','<>',Session::get('login_company_id'))->inRandomOrder()->has('user')->get()->toArray();
         }else{
             $plan_companies=Company::with(['user','parent_categories','child_categories'=>function($q) use ($subcategory_id){
               $q->WhereIn('category_company.category_id',$subcategory_id);
              }])->whereHas('child_categories', function ($q) use($subcategory_id) {
              $q->WhereIn('category_company.category_id', $subcategory_id);
            })->where('active_package_plan_id','=',$package_id)->inRandomOrder()->has('user')->get()->toArray();
         } 
            
       
        
        $plan_companies;
        
        return $plan_companies;
    }
    private function CheckCompanyPackageWithParentCategory($package_id,$category_id){
        if(Session::has('login_company_id')){
          $plan_companies=Company::with(['user','child_categories','parent_categories'=>function($q) use ($category_id){
               $q->where('category_company.category_id',$category_id);
              }])->whereHas('parent_categories', function ($q) use($category_id) {
                  $q->where('category_company.category_id', $category_id);
               })->where('active_package_plan_id','=',$package_id)->where('id','<>',Session::get('login_company_id'))->inRandomOrder()->has('user')->get()->toArray(); 
        }else{
            $plan_companies=Company::with(['user','child_categories','parent_categories'=>function($q) use ($category_id){
                   $q->where('category_company.category_id',$category_id);
                  }])->whereHas('parent_categories', function ($q) use($category_id) {
                      $q->where('category_company.category_id', $category_id);
                   })->where('active_package_plan_id','=',$package_id)->inRandomOrder()->has('user')->get()->toArray();
        }
        return $plan_companies;
    }
    private function CheckCompany($package_id,$company_name,$subcategory_id,$category_id){
            if(!empty($subcategory_id)){
                $search_companies=Company::with(['user','parent_categories','child_categories'=>function($q) use ($subcategory_id){
                   $q->WhereIn('category_company.category_id',$subcategory_id);
                  }])->whereHas('child_categories', function ($q) use($subcategory_id) {
                  $q->WhereIn('category_company.category_id', $subcategory_id);
                })->whereHas('user', function ($query) use ($company_name) {
                  if(!empty($company_name)){
                   $query->where('users.name','like','%'.$company_name.'%');
                  }
                  })->where('active_package_plan_id','=',$package_id)->orderBy('active_package_plan_id','desc')->get()->toArray();
            }else{
                $search_companies=Company::with(['user','child_categories','parent_categories'=>function($q) use ($category_id){
                       $q->where('category_company.category_id',$category_id);
                      }])
                      ->whereHas('parent_categories', function ($q) use($category_id) {
                          $q->where('category_company.category_id', $category_id);
                       })
                       ->whereHas('user', function ($query) use ($company_name) {
                        if(!empty($company_name)){
                          $query->where('users.name','like','%'.$company_name.'%');
                        }
                    })->where('active_package_plan_id','=',$package_id)->orderBy('active_package_plan_id','desc')->get()->toArray();
            }
        
        
        return $search_companies;
    }
    public function sendQuotationDetailForm(Request $request){
        if(Session::get('quotation_data')['company_id']){
            $selectedCompany = Company::with('user','categories')->where('id',Session::get('quotation_data')['company_id'])->first();
            $logo_slider_companies=$this->logo_slider();
            $latest_youtube = $this->about_us();
            return view('frontend.send-quotation',compact('logo_slider_companies','latest_youtube','selectedCompany'));
        }
    }
    public function sendQuotationForm(Request $request){
         if(!Session::get('quotation_data')){
             return redirect('/');
         }
        
          if(!empty(unserialize(Session::get('quotation_data')['subcategory_id']))){
            $subcategory_id = unserialize(Session::get('quotation_data')['subcategory_id']);
            $third_plan_companies =  $this->CheckCompanyPackageWithChildCategory(3,$subcategory_id);
            $second_plan_companies=  $this->CheckCompanyPackageWithChildCategory(2,$subcategory_id);
            $first_plan_companies =  $this->CheckCompanyPackageWithChildCategory(1,$subcategory_id);
        }else{
            $category_id = Session::get('quotation_data')['category_id'];
            $third_plan_companies=$this->CheckCompanyPackageWithParentCategory(3,$category_id);
            $second_plan_companies=$this->CheckCompanyPackageWithParentCategory(2,$category_id);
            $first_plan_companies=$this->CheckCompanyPackageWithParentCategory(1,$category_id);
        }
        //  $plan_companies=Company::with(['user','child_categories','parent_categories'=>function($q) use ($category_id){
        //       $q->where('category_company.category_id',$category_id);
        //       }])->whereHas('parent_categories', function ($q) use($category_id) {
        //           $q->where('category_company.category_id', $category_id);
        //       })->where('active_package_plan_id','=',1)->where('id','<>',Session::get('login_company_id'))->inRandomOrder()->has('user')->get()->toArray(); 
               
        // // dd(Session::get('login_company_id'));
        //  dd($plan_companies);
        $parent_category="";
        $child_category ="";
        $category_array = array();
        $city ="";
        $township ="";
        $address ="";
        $location_array = array();
        $subcategory_id="";
        $category_id="";

        //Searching
        if(!empty($request->company_name) && (!empty(unserialize(Session::get('quotation_data')['subcategory_id'])))){
            $subcategory_id = unserialize(Session::get('quotation_data')['subcategory_id']);
            $third_plan_companies = $this->CheckCompany(3,$request->company_name,$subcategory_id,'');
            $second_plan_companies = $this->CheckCompany(2,$request->company_name,$subcategory_id,'');
            $first_plan_companies = $this->CheckCompany(1,$request->company_name,$subcategory_id,'');
          }
          elseif(!empty($request->company_name) && (!empty(Session::get('quotation_data')['category_id']))){
            $category_id= Session::get('quotation_data')['category_id'];
            $third_plan_companies = $this->CheckCompany(3,$request->company_name,'',$category_id);
            $second_plan_companies = $this->CheckCompany(2,$request->company_name,'',$category_id);
            $first_plan_companies = $this->CheckCompany(1,$request->company_name,'',$category_id);
          }

        if(!empty(Session::get('quotation_data')['category_id'])){
            $parent_category=Category::select(['id','name'])->where('id',Session::get('quotation_data')['category_id'])->first();
        }
        if(!empty(unserialize(Session::get('quotation_data')['subcategory_id']))){
            $subcategory=unserialize(Session::get('quotation_data')['subcategory_id']);
            $child_category=Category::select(['id','name'])->WhereIn('id',$subcategory)->get();
        }
        if(!empty(Session::get('quotation_data')['city'])){
            $city = Location::select(['id','name'])->where('id',Session::get('quotation_data')['city'])->first();
        }
        if(!empty(Session::get('quotation_data')['township'])){
            $township = Location::select(['id','name'])->where('id',Session::get('quotation_data')['township'])->first();
        }
        $location_array['city']=$city;
        $location_array['township']=$township;
        $location_array['address'] = Session::get('quotation_data')['address'];
        $category_array['parent']=$parent_category;
        $category_array['child'] = $child_category;
        Session::put('category_array',$category_array);
        Session::put('location_array',$location_array);
        $logo_slider_companies=$this->logo_slider();
        $latest_youtube = $this->about_us();
        
    
        return view('frontend.send-quotation',compact('logo_slider_companies','latest_youtube'))->with('first_plan_companies',$first_plan_companies)->with('second_plan_companies',$second_plan_companies)->with('third_plan_companies',$third_plan_companies);
    }

   public function sendQuotation(Request $request){
          $data_arr = $request->data;
          $company_count =sizeof($data_arr);
     if(!empty(Auth::user())){
        $settings=DB::table('project_settings')->select('quotation_coin')->first();
       if(Auth()->user()->left_coin >= $settings->quotation_coin){
            $quotation = new Quotation;
             if(!empty(Session::get('subcategory_id')))
                $category_id = Session::get('quotation_data')['subcategory_id'];
             else
                $category_id = Session::get('quotation_data')['category_id'];

             $quotation->category_id = $category_id;
             $quotation->project_expected_start_date = Session::get('quotation_data')['project_expected_start_date'];
             $quotation->project_information = Session::get('quotation_data')['project_information'];
             $quotation->range_id       = Session::get('quotation_data')['budget'];
             $quotation->building_type =Session::get('quotation_data')['building_type'];
             $quotation->location_id   =Session::get('quotation_data')['township'];
             $quotation->address       =Session::get('quotation_data')['address'];
             $quotation->contact_email =Session::get('quotation_data')['contact_email'];
             $quotation->contact_phone = Session::get('quotation_data')['contact_phone'];
             $quotation->contact_person_name = Session::get('quotation_data')['contact_name'];
             $quotation->prefer_contact_way = Session::get('quotation_data')['prefer_contact_way'];
             $quotation->best_contact_time = Session::get('quotation_data')['best_contact_time'];
             $quotation->contact_allow = Session::get('quotation_data')['contact_allow'];
             $quotation->contact_person_name = Session::get('quotation_data')['contact_name'];
             $quotation->send_user_id = Auth::user()->id;
             $quotation->used_coin    = ($settings->quotation_coin* $company_count);
             $quotation->file         =Session::get('quotation_data')['file'];
             $quotation->created_by =Auth()->user()->id;
             $quotation->updated_by =Auth()->user()->id;
             $quotation->created_at = date("Y-m-d H:m:i");
             $quotation->updated_at = date("Y-m-d H:m:i");
             if($quotation->save())
             {
                    $quotation->received_company()->attach($data_arr, ['received_status'=>'pending','created_at'=>date("Y-m-d H:m:i"),'updated_at'=>date("Y-m-d H:m:i")]);
                    $success = array('success'=>"Congratulation!!! You had been successfully requested quotation. Quotation received company will send quotation by email. You can check quotation status on your dashboard. Success status mean that quotation had already sent.");
                    $login_user= User::where('id',Auth::user()->id)->first();
                    $login_user->left_coin = Auth()->user()->left_coin -($settings->quotation_coin* $company_count);
                    $login_user->save();
                    return response()->json($success);
             }
             else{
                 $errors = array('errors'=>"Something Wrong.Please try again.");
                return response()->json($errors);
             }

        }
        else{
             $errors = array('errors'=>"You need to have more Coin.");
             return response()->json($errors);
         }
        }else{
            $errors = array('errors'=>"Please Login");
             return response()->json($errors);
        }
    }

//       public function sendQuotation(Request $request){
//              if(!empty(Auth()->user()->id)){
//                 if(Auth()->user()->role == 1){
//                   $status = $this->validation($request);
//                   if($status->fails()) {
//                     $errors =array('errors'=>$status->errors()->all());
//                     return response()->json($errors);
//                   }else{
//                       $settings=DB::table('project_settings')->select('quotation_coin')->first();
//                       if(Auth()->user()->left_coin >= $settings->quotation_coin){
//                             $filearr=array();
//                             if($request->hasFile('quotation_file')) {
//                                 $files=$request->file(('quotation_file'));
//                                 foreach ($files as $file) {
//                                   $filename=time().'_'.$file->getClientOriginalName();
//                                   array_push($filearr,$filename);
//                                 }
//                               }

//                             //$file = $this->uploadQuotationfile($request->file('quotation_file'));
//                              $quotation = new Quotation;
//                              $quotation->range_id = $request->range_id;
//                              $quotation->category_id = $request->category_id;
//                              $quotation->project_expected_start_date = $request->project_expected_start_date;
//                              $quotation->project_current_situation = $request->project_current_situation;
//                              $quotation->summary = $request->summary;
//                              $quotation->file    =serialize($filearr);
//                              $quotation->policy = $request->policy;
//                              $quotation->send_user_id =Auth()->user()->id;
//                              $quotation->used_coin = $settings->quotation_coin;
//                              $quotation->requested_status = "pending";
//                              $quotation->created_by =Auth()->user()->id;
//                              $quotation->updated_by =Auth()->user()->id;
//                              $quotation->created_at = date("Y-m-d H:m:i");
//                              $quotation->updated_at = date("Y-m-d H:m:i");
//                              if($quotation->save())
//                              {
//                                 if($request->hasFile('quotation_file')) {
//                                     $files=$request->file(('quotation_file'));
//                                     foreach ($files as $file) {
//                                       $filename=time().'_'.$file->getClientOriginalName();
//                                       $file->move(storage_path('app/public/quotation/'),$filename);
//                                     }
//                                   }
//                                     $quotation->received_user()->attach($request->received_company, ['received_status'=>'pending','created_at'=>date("Y-m-d H:m:i"),'updated_at'=>date("Y-m-d H:m:i")]);
//                                     $success = array('success'=>"Successfully send Quotation.");
//                                     $login_user= User::find(Auth::user()->id)->first();
//                                     $login_user->left_coin = Auth()->user()->left_coin -($settings->quotation_coin* sizeof($request->received_company));
//                                     $login_user->save();
//                                 return response()->json($success);
//                              }
//                              else{
//                                  $errors = array('error'=>"Something Wrong.Please try again.");
//                                 return response()->json($errors);
//                              }

//                      }else{
//                          $errors = array('errors'=>"You need to have more Coin.");
//                          return response()->json($errors);
//                      }
//                   }
//                 }
//                 else{
//                     $errors = array('errors'=>'You need have permission to send quotation');
//                      return response()->json($errors);
//                 }

//              }else{
//                 $errors = array('errors'=>'You need to login first');
//                  return response()->json($errors);
//              }
//   }
//   private function validation($request)
//     {
//         $messages = [
//             'category_id.required' => 'Project Category is required',
//             'project_current_situation.required' => 'Current Project Situtation is required',
//             'summary.required' => 'Summary Inforation is required',
//             'quotation_file.required|mines:pdf,docx|max:2048' => 'Quotation file is required|File must be pdf or microsoft word file(docx)|File size must be less than 2G.',
//         ];

//         $validator = Validator::make($request->all(), [
//                 'category_id' => "required",
//                 'project_current_situation'=>"required",
//                 'summary'=>"required",
//                 'quotation_file'=>"required"
//             ], $messages);
//         return $validator;
//     }
      public function getCompany(Request $request)
    {
         $result ="";
         if(isset($request->company_name) && $request->company_name != NULL)
         {
            $company_name  = $request->company_name;
            if(!empty(unserialize(Session::get('quotation_data')['subcategory_id']))){
                $subcategory_id =unserialize(Session::get('quotation_data')['subcategory_id']);
              $third_plan_companies = $this->CheckCompany(3,$request->company_name,$subcategory_id,'');
              $second_plan_companies = $this->CheckCompany(2,$request->company_name,$subcategory_id,'');
              $first_plan_companies = $this->CheckCompany(1,$request->company_name,$subcategory_id,'');
            }
         else{
            $category_id =Session::get('quotation_data')['category_id'];
            $third_plan_companies = $this->CheckCompany(3,$request->company_name,'',$category_id);
            $second_plan_companies = $this->CheckCompany(2,$request->company_name,'',$category_id);
            $first_plan_companies = $this->CheckCompany(1,$request->company_name,'',$category_id);
         }
        }
        else{
          if(!empty(unserialize(Session::get('quotation_data')['subcategory_id']))){
                $subcategory_id =unserialize(Session::get('quotation_data')['subcategory_id']);
                $third_plan_companies = $this->CheckCompany(3,'',$subcategory_id,'');
                $second_plan_companies = $this->CheckCompany(2,'',$subcategory_id,'');
                $first_plan_companies = $this->CheckCompany(1,'',$subcategory_id,'');
            }
         else{
            $category_id =Session::get('quotation_data')['category_id'];
            $third_plan_companies = $this->CheckCompany(3,'','',$category_id);
            $second_plan_companies = $this->CheckCompany(2,'','',$category_id);
            $first_plan_companies = $this->CheckCompany(1,'','',$category_id);
         }
        }
        if(!empty($third_plan_companies) || !empty($second_plan_companies) || !empty($first_plan_companies)){
        $result =' <div class="list-group">';
                              $third_plan = sizeof($third_plan_companies);
                              $second_plan = sizeof($second_plan_companies);
                              $first_plan  = sizeof($first_plan_companies);
                              $max = max(sizeof($first_plan_companies),sizeof($second_plan_companies),sizeof($third_plan_companies));
                             
                            
                            for($i=0; $i<=($max-1); $i++){
                                //Third Plan
                               if(Session::has('login_company_id') && !empty($third_plan_companies[$i])){
                                    if(Session::get('login_company_id') == $third_plan_companies[$i]['id']){          continue;
                                    }elseif(Session::get('login_company_id') != $third_plan_companies[$i]['id']){
                                         $result .= $this->companyQuotationList($third_plan_companies[$i],3);
                                    }
                                }elseif(!Session::has('login_company_id') && !empty($third_plan_companies[$i])){
                                    $result .= $this->companyQuotationList($third_plan_companies[$i],3);
                                }
                                
                                 //Second Plan
                                 if(Session::has('login_company_id') && !empty($second_plan_companies[$i])){
                                    if(Session::get('login_company_id') == $second_plan_companies[$i]['id']){          continue;
                                    }elseif(Session::get('login_company_id') != $second_plan_companies[$i]['id']){
                                         $result .= $this->companyQuotationList($second_plan_companies[$i],3);
                                    }
                                }elseif(!Session::has('login_company_id') && !empty($second_plan_companies[$i])){
                                    $result .= $this->companyQuotationList($second_plan_companies[$i],3);
                                }
                                
                                //First Plan
                                 if(Session::has('login_company_id') && !empty($first_plan_companies[$i])){
                                    if(Session::get('login_company_id') == $first_plan_companies[$i]['id']){          continue;
                                    }elseif(Session::get('login_company_id') != $first_plan_companies[$i]['id']){
                                         $result .= $this->companyQuotationList($first_plan_companies[$i],3);
                                    }
                                }elseif(!Session::has('login_company_id') && !empty($first_plan_companies[$i])){
                                    $result .= $this->companyQuotationList($first_plan_companies[$i],3);
                                }
                            
                           

                          }
                $result .='</div>';
              }
        return response()->json($result);
    }
    private function companyQuotationList($datas,$type){
        $project_settings=DB::table('project_settings')->select(['service_default_logo','supplier_default_logo','reno_default_logo'])->first();

        $result ='<div  class="list-group-item">
                     <div class="row">
                        <div class="col-md-1 col-sm-1 col-xs-1">
                          <input type="checkbox" name="company_id[]" value="'.$datas['id'].'" id="company_id'.$datas['id'].'" class="company_id">
                        </div>
                        <div class="col-md-11 col-sm-11 col-xs-11">
                            <label  for="company_id'.$datas['id'].'">
                            <div class = "row">
                                <div class="col-md-3 col-sm-4 col-xs-3 nopadding">
                                    <img src="';
                                     if($datas['user']['logo'] != NULL && $datas['user']['logo'] !='undefined')
                                        $result .= asset('storage/company_logo/'.$datas['user']['logo']);
                                    else{
                                        if($type == 1)
                                            $result .= asset('storage/company_logo/'.$project_settings->service_default_logo);
                                        else if($type == 2)
                                            $result .= asset('storage/company_logo/'.$project_settings->supplier_default_logo);
                                        else
                                            $result .= asset('storage/company_logo/'.$project_settings->reno_default_logo);
                                    }


                                $result .='" class="img-responsive">

                                    </div>
                                    <div class="col-md-9 col-sm-8 col-xs-9 nopadding">
                                       <h2>'. $datas['user']['name'] .'</h2>
                                       <span>';
                                       $count =1;
                                       $category="";
                                               if(!empty($datas['child_categories']))
                                               {
                                                foreach($datas['child_categories'] as $child_category){
                                                      if(sizeof($datas['child_categories'])==$count){
                                                          $category .= $child_category['name'];
                                                        }
                                                      else{
                                                          $category .=$child_category['name'].", ";
                                                        }
                                                  $count++;
                                                 }
                                                 $result .= (strlen($category) > 80)?substr($category, 0,80)."...":$category;
                                                }
                                      $result .='</span>
                                       </div>
                                    </div>
                                    </div>
                      </div>
                    </div>
                    </div> ';
        return $result;

     }

     private function validation($request)
    {
        $messages = [
            'category_id.required' => 'Project Type is required',
            'building_type.required' => 'Building Type is required',
            'city.required' => 'City is required',
            'township.required' => 'Township is required',
            'contact_phone.required'=>'Phone number is required',
            'address.required'  => 'Address is required',
            'project_information.required' => 'Project Information is required',
            'budget.required' =>'Budget is required',
            'contact_allow.required'=>'Please check allow company to contact checkbox',
            'prefer_contact_way.required'=>'Please choose at least one way',
            'best_contact_time.required'=>'Please choose at least one of your best time to contact.'
        ];

        $validator = Validator::make($request->all(), [
                'category_id' => "required",
                'building_type'=>"required",
                'city'=>"required",
                'township' =>'required',
                'contact_phone'=>'required',
                'budget' =>'required',
                'address'=>'required',
                'project_information'=>'required',
                'contact_allow'=>'required',
                'prefer_contact_way'=>'required',
                'best_contact_time'=>'required'
            ], $messages);
        return $validator;
    }
    public function servicesendQuotation(Request $request){

             if(!empty(Auth()->user()->id)){
                  if(Auth()->user()->role == 1){
                    $status = $this->validation($request);
                    if($status->fails()) {
                       $errors =array('errors'=>$status->errors()->all());
                       return response()->json($errors);
                    }else{
                      $settings=DB::table('project_settings')->select('quotation_coin')->first();
                       if(Auth()->user()->left_coin >= $settings->quotation_coin){
                            if($request->hasFile('quotation_file')) {
                                $files=$request->file(('quotation_file'));
                                $filearr=array();
                                foreach ($files as $file) {
                                  $filename=time().'_'.$file->getClientOriginalName();
                                  array_push($filearr,$filename);
                                }
                              }
                            //$file = $this->uploadQuotationfile($request->file('quotation_file'));
                             $quotation = new Quotation;
                             $quotation->range_id = $request->range_id;
                             $quotation->category_id = $request->category_id;
                             $quotation->project_expected_start_date = $request->project_expected_start_date;
                             $quotation->project_current_situation = $request->project_current_situation;
                             $quotation->summary = $request->summary;
                             $quotation->file    =serialize($filearr);
                             $quotation->policy = $request->policy;
                             $quotation->send_user_id =Auth()->user()->id;
                             $quotation->used_coin = $settings->quotation_coin;
                             $quotation->created_by =Auth()->user()->id;
                             $quotation->updated_by =Auth()->user()->id;
                             if($quotation->save())
                             {
                                if($request->hasFile('quotation_file')) {
                                    $files=$request->file(('quotation_file'));
                                    foreach ($files as $file) {
                                      $filename=time().'_'.$file->getClientOriginalName();
                                      $file->move(storage_path('app/public/quotation/'),$filename);
                                    }
                                  }
                                foreach($request->received_company as $received)
                                    $quotation->received_user()->insert(['user_id'=>$received,'quotation_id'=>$quotation->id,'created_at'=>date("Y-m-d H:m:i"),'updated_at'=>date("Y-m-d H:m:i")]);

                                 $success = array('success'=>"Successfully send Quotation.");
                                return response()->json($success);
                             }
                             else{
                                 $errors = array('error'=>"Something Wrong.Please try again.");
                                return response()->json($errors);
                             }

                     }else{
                         $errors = array('errors'=>"You need to have more Coin.");
                         return response()->json($errors);
                     }
                   }
                 }else{
                    $errors = array('errors'=>'You need have permission to send quotation');
                     return response()->json($errors);
                }

             }else{
                  $errors = array('errors'=>'You need to login first');
                  return response()->json($errors);
             }
   }

    public function getChildCategory(Request $request){

         if ($request->type == 'category_id') {
            $category = $request->id;
            $sub_category=Category::where('parent_id',$category)->get();

            $company=Company::with(['user','parent_categories'=>function($q) use ($category){
                   $q->where('category_company.category_id',$category);
                  }])->whereHas('parent_categories', function ($q) use($category) {
                      $q->where('category_company.category_id', $category);
                   })->get();
            $data = array();
            array_push($data, ['sub_category'=>$sub_category,'company'=>$company]);
            return response()->json($data);
        }
        if($request->type =='subcategory_id'){
            $company=Company::with(['user','child_categories'=>function($q) use ($request){
                       $q->where('category_company.category_id',$request->id);
                      }])->whereHas('child_categories', function ($q) use($request) {
                      $q->where('category_company.category_id', $request->id);
                    })->select('id','user_id')->orderBy('active_package_plan_id','desc')->get();
            $data = array();
            array_push($data, ['sub_category'=>'','company'=>$company]);
            return response()->json($data);
        }

    }
    public function privacy(){
         $privacy=Privacy::where('id',1)->first();
         $logo_slider_companies=$this->logo_slider();
        return view('frontend.privacy',compact('logo_slider_companies','privacy'));
    }
    public function termsandservice(){
        $termsofservice=TermsOfService::where('id',1)->first();
         $logo_slider_companies=$this->logo_slider();
        return view('frontend.terms-and-service',compact('logo_slider_companies','termsofservice'));
    }
    public function advertiseWithUs(){
         $logo_slider_companies=$this->logo_slider();
      $sponsors = Advertisewithus::where('type','=','sponsor')->get();
      $benefits = Advertisewithus::where('type','=','benefit')->get();
      $advertisewithus =AdvertiseWithUsHeader::where('id',1)->first();
        return view('frontend.advertise-with-us',compact('logo_slider_companies','sponsors','advertisewithus','benefits'));
    }
     public function aboutUs(){
         $aboutus = Aboutusheader::where('id',1)->first();
         $joins = Aboutus::where('type','=','join')->get();
         $targets = Aboutus::where('type','=','target')->get();
         $logo_slider_companies=$this->logo_slider();
        return view('frontend.about-us',compact('logo_slider_companies','aboutus','joins','targets'));
    }
    public function Myanboxtube(){
         $myanboxtubes=Myanboxtube::where('is_active','=','1')->select('*')->paginate(15);
        $logo_slider_companies=$this->logo_slider();
        return view('frontend.myanboxtubes',compact('logo_slider_companies','myanboxtubes'));
    }
    public function activeplan($companydetail){

       return  CompanyPackagePlan::where('package_plan_id','=',$companydetail->active_package_plan_id)
                                ->where('company_id','=',$companydetail->id)
                                ->where('is_active','=','1')
                                ->select('*')
                                ->first();
    }
    //start for summernote image  src
     public function setImageSrc($description){
    //   $dom = new \DomDocument();
    //   $dom->loadHTML($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
       
       //start
       $dom = new \DomDocument();   
     $searchPage = mb_convert_encoding($description, 'HTML-ENTITIES', "UTF-8");
      @$dom->loadHTML($searchPage);
       
       //end
       $images = $dom->getElementsByTagName('img');
       foreach($images as $k => $img){
           $data = $img->getAttribute('src');
             $pathinfo = pathinfo( $data);
           $img->removeAttribute('src');
           $img->setAttribute('src', URL::to('/').'/storage/blog/'.$pathinfo['filename'].'.'.$pathinfo['extension']);
        }
       $description = $dom->saveHTML();
        return $description;
        
    }


}
