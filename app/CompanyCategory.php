<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class CompanyCategory extends Model
{
    protected $table ='category_company';
    protected $fillable = [
          'category_id','company_id','created_by','updated_by'
          ];

    public static function getCompanyCategories($id){

         $companycategories=  DB::table('category_company')
             ->leftjoin('categories','categories.id','=','category_company.category_id')
             ->where('category_company.company_id',$id)
             ->select('categories.name as category_name','categories.parent_id','category_company.category_id','category_company.company_id')
             ->get();
        
          return $companycategories;

     }
     public static function getRelatedCompanies($category_id){

     	return DB::table('category_company')
                        ->leftjoin('companies','companies.id','=','category_company.company_id')
                        ->leftjoin('users','users.id','=','companies.user_id')
                        ->where('category_company.category_id','=',$category_id)
                        ->select('category_company.company_id','users.name as company_name','users.logo as company_logo','companies.company_url')
                        ->groupBy('category_company.company_id')
                        ->get();

     }
     public static function relatedCategory($company_id){

     	 $related= DB::table('category_company')
                     ->leftjoin('categories','categories.id','=','category_company.category_id')
                     ->where('category_company.company_id',$company_id)
                     ->select('categories.name as category_name','categories.parent_id','category_company.company_id')
                     ->get();

                     return  $related;

     }
  
}
