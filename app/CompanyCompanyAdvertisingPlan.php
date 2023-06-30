<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyCompanyAdvertisingPlan extends Model
{
    //
     protected $table='company_company_advertising_plan';
     protected $fillable = [
        'company_id','company_advertising_plan_id','is_active','start_date','end_date'];
}
