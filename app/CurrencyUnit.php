<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrencyUnit extends Model
{
    protected $guarded = [];

    public function creater()
    {
        return $this->hasOne('App\User', 'id','created_by');
    } 
    public function updater()
    {
        return $this->hasOne('App\User', 'id','updated_by');
    } 

    public function company_advertising_plan()
    {
      return $this->belongsToMany('App\CompanyAdvertisingPlan')->withPivot('created_by','updated_by');
    }

    public function package_plan()
    {
      return $this->belongsToMany('App\PackagePlan')->withPivot('created_by','updated_by');
    }

    public function advertising_plan()
    {
      return $this->belongsToMany('App\AdvertisingPlan')->withPivot('created_by','updated_by');
    }

    public function range()
    {
      return $this->belongsToMany('App\Range')->withPivot('created_by','updated_by');
    }

    public function daily_product_price()
    {
      return $this->belongsToMany('App\DailyProductPrice')->withPivot('created_by','updated_by');
    }

}
