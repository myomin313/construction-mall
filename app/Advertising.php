<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Advertising extends Model
{
    protected $fillable = [
        'advertising_plan_id', 'user_id','photo',
        'link','start_date','end_date','is_active','email','priority',
        'created_by','updated_by','company_name','address','phone']; 


        public static function getPageListAdvertising(){

        	  $current_date = date('Y-m-d');
         $advertisings= DB::table('advertisings')
                   ->where('end_date','>=',$current_date)
                   ->where('advertising_plan_id','=',2)
                   ->where('is_active','=','1')
                   ->orderBy('priority', 'desc')
                   ->inRandomOrder()
                   ->limit(7)
                   ->get();
                   
                  
                   return  $advertisings;

        } 
         public static function getPageDetailAdvertising(){

        	  $current_date = date('Y-m-d');
         $advertisings= DB::table('advertisings')
                   ->where('end_date','>=',$current_date)
                   ->where('advertising_plan_id','=',3)
                   ->where('is_active','=','1')
                   ->orderBy('priority', 'desc')
                   ->inRandomOrder()
                   ->limit(2)
                   ->get();

                   return  $advertisings;

        }  
   
}
