<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertisingPlans extends Model
{
    //
    protected $fillable = [
        'price','plan_name','is_active','periods','created_by','update_by','created_at','updated_at'];
        
    public function currency_unit()
    {
        return $this->belongsTo('App\CurrencyUnit','currency_unit_id')->where('currency_units.is_active','1');
    }
}
