<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessDay extends Model
{
    protected $guarded = [];

    public function companies()
    {
      return $this->belongsToMany('App\Company','company_business_days','business_day_id','company_id')->withPivot('opening_hour','closing_hour','created_by','updated_by');
    } 
}
