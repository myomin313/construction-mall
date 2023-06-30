<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    protected $fillable = [
        'minimum_price', 'maximum_price','is_active',
        'created_by','updated_by',
        'created_at','updated_at'];

    public function currency_unit()
    {
        return $this->belongsTo('App\CurrencyUnit','currency_unit_id')->where('currency_units.is_active','1');
    }    
}
