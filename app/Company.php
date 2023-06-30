<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Company extends Model
{
    protected $fillable = [
          'user_id','location_id','facebook','email','website','googleplus',
          'twitter','linkedin','description','vission','address',
          'phone','cover_photo','is_active','view_count','created_by','updated_by','active_package_plan_id','business_opening_hours','business_closing_hours','active_quotation','company_url'
   	 ];
   	 public function user()
    {
        return $this->belongsTo('App\User','user_id')->where('users.email_verified_flag',1);
    } 
    public function location()
    {
        return $this->belongsTo('App\location','location_id');
    } 
     public function packageplan()
    {
        return $this->belongsTo('App\Packageplan','active_package_plan_id');
    } 
    public function received_quotation()
    {
        return $this->belongsToMany('App\Quotation','quotation_received_companys','company_id','quotation_id')->withPivot('received_status','requested_status','created_at','updated_at');  
    }
     public static function request_quotation($sender_id){
      return DB::table('quotations')
          ->leftjoin('quotation_received_companys','quotations.id','=','quotation_received_companys.quotation_id')
          ->where('quotations.send_user_id','=',$sender_id)
          ->sum('quotations.used_coin');
    }
    public function companyservice()
    {
      return $this->hasMany('App\CompanyService');
    }
     public function companyproduct()
    {
      return $this->hasMany('App\CompanyProduct');
    }
     public function parent()
    {
        return $this->hasOne('App\Category', 'id','parent_id');
    }
    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id','id');
    }

     public function parent_categories()
    {
      return $this->belongsToMany('App\Category')->where('categories.parent_id',0)->where('categories.is_active','1')->withPivot('created_by','updated_by');
    }
    public function child_categories()
    {
      return $this->belongsToMany('App\Category')->where('categories.parent_id','<>',0)->where('categories.is_active','1')->withPivot('created_by','updated_by');
    }
    public function categories()
    {
      return $this->belongsToMany('App\Category')->where('categories.is_active','1')->withPivot('created_by','updated_by');
    }
     public function package_plan()
    {
      return $this->belongsToMany('App\PackagePlan')->withPivot('id','created_by','updated_by','start_date','end_date','is_active','approve')->orderBy('end_date', 'DESC');
    }
      public function approve_package_plan()
    {
      return $this->belongsToMany('App\PackagePlan')->withPivot('created_by','updated_by','start_date','end_date','is_active','approve')->where('approve','success');
    }
     public function advertisingPlan()
    {
      return $this->belongsToMany('App\CompanyAdvertisingPlan')->withPivot('is_active','start_date','end_date');
    }

     public function businessDay()
    {
      return $this->belongsToMany('App\BusinessDay','company_business_days','company_id','business_day_id')->withPivot('opening_hour','closing_hour','created_by','updated_by');
    } 

    public static function getcompanies($id){

        $category_id     =$id;       
        $companies=DB::table('companies')
        ->leftjoin('locations','locations.id','=','companies.location_id')
        ->leftjoin('category_company','category_company.company_id','=','companies.id')
        ->join('users','users.id','=','companies.user_id')
        ->where('users.role','=',2)
        ->where('users.email_verified_flag','=','1')
        ->where('category_company.category_id','=',$category_id)
        ->orderBy('companies.created_at', 'desc')
        ->select('companies.*','users.name','users.logo','users.id as user_id','locations.name as location_name')
        ->paginate(15);

        foreach($companies as $company){
         $company->categories= DB::table('category_company')
           ->leftjoin('categories','categories.id','=','category_company.category_id')
           ->where('category_company.company_id',$company->id)
           ->select('categories.name as category_name','categories.parent_id')
           ->get();
       }

        return $companies;

     }
    // public static function searchCompanies($request){

    //      $location_id     =$request['location_id'];
    //    $keyword         =$request['keyword'];
    //    if(!empty($request['category_id'])){
    //      $category_id  =$request['category_id'];
    //    }else{
    //       $category_id = $request['default_category_id'];
    //    }
    //    $companies=DB::table('companies')
    //    ->leftjoin('locations','locations.id','=','companies.location_id')
    //    ->leftjoin('category_company','category_company.company_id','=','companies.id')
    //    ->join('users','users.id','=','companies.user_id')
    //     ->where(function($query)use($location_id){
    //              if(!empty($location_id))
    //              $query->where('companies.location_id','=',$location_id);
    //      })
    //     ->where(function($query)use($keyword){
    //              if(!empty($keyword))
    //               $query->where('users.name','=',$keyword);
    //      })
    //    ->where('users.role','=',2)
    //    ->where('category_company.category_id','=',$category_id)
    //    ->orderBy('companies.created_at', 'desc')
    //    ->select('companies.*','users.name','users.logo','users.id as user_id','locations.name as location_name')
    //    ->paginate(15);
    //    foreach($companies as $company){
    //     $company->categories= DB::table('category_company')
    //     ->leftjoin('categories','categories.id','=','category_company.category_id')
    //     ->where('category_company.company_id',$company->id)
    //     ->select('categories.name as category_name','categories.parent_id')
    //     ->get();
    //    }

    //    return $companies;

    // }
    public static function companyDetail($company_url){
      $companydetail=DB::table('companies')      
        ->leftjoin('locations','locations.id','=','companies.location_id')
        ->join('users','users.id','=','companies.user_id')
        ->where('companies.company_url','=',$company_url)
        ->select('companies.*','users.name','users.email as user_email','users.phone as user_phone','users.id as user_id','users.logo','locations.name as location_name')
        ->first();
        
      

        return $companydetail;
    }
 
     public static function searchCompanies($request){

         $location_id     =$request['location_id'];
       $keyword         =$request['keyword'];
       if(!empty($request['category_id'])){
         $category_id  =$request['category_id'];
       }else{
          $category_id = $request['default_category_id'];
       }
       $companies=DB::table('companies')
       ->leftjoin('locations','locations.id','=','companies.location_id')
       ->leftjoin('category_company','category_company.company_id','=','companies.id')
       ->join('users','users.id','=','companies.user_id')
        ->where(function($query)use($location_id){
                 if(!empty($location_id))
                 $query->where('companies.location_id','=',$location_id);
         })
        ->where(function($query)use($keyword){
                 if(!empty($keyword))
                  $query->where('users.name','=',$keyword);
         })
       ->where('users.role','=',2)
       ->where('users.email_verified_flag','=','1')
       ->where('category_company.category_id','=',$category_id)
       ->orderBy('companies.created_at', 'desc')
       ->select('companies.*','users.name','users.logo','users.id as user_id','locations.name as location_name')
       ->paginate(15);
       foreach($companies as $company){
        $company->categories= DB::table('category_company')
        ->leftjoin('categories','categories.id','=','category_company.category_id')
        ->where('category_company.company_id',$company->id)
        ->select('categories.name as category_name','categories.parent_id')
        ->get();
       }

       return $companies;

    }
   	 

}
