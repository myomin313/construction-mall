<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyAdvertisingPlan extends Model
{
     protected $fillable = [
        'plan_name','is_active','periods','price'];

     public function companies()
    {
      $current_date = date('Y-m-d');
      return $this->belongsToMany('App\Company')->withPivot('is_active','start_date','end_date')->where('company_company_advertising_plan.is_active','<>','0')->where('start_date','<=',$current_date)->where('end_date','>=',$current_date)->inRandomOrder();
    }  

    public function currency_unit()
    {
        return $this->belongsTo('App\CurrencyUnit','currency_unit_id')->where('currency_units.is_active','1');
    } 
}
