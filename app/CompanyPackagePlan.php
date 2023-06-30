<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyPackagePlan extends Model
{
	protected $table='company_package_plan';
    protected $fillable = [
          'company_id','package_plan_id','is_active',
          'created_by','updated_by','start_date','end_date','created_at','updated_at'
          ];

    public function currency_unit()
    {
        return $this->belongsTo('App\CurrencyUnit','currency_unit_id')->where('currency_units.is_active','1');
    }
}
