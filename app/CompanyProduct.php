<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class CompanyProduct extends Model
{
    protected $fillable = [
          'product_name','company_id','product_description',
          'price','photo','created_by','updated_by','created_at','updated_at'
          ];
    public function company()
    {
        return $this->belongsTo('App\Company','company_id');
    }
    public static function getCompanyProduct($id){

    	 $productdetails=DB::table('company_products')
               ->where('company_products.company_id','=',$id)
               ->select('company_products.*')
               ->get();
               return $productdetails;

    }
}
