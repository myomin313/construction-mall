<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyProductPrice extends Model
{
    protected $fillable = [
          'product_name','price','currency'
   	 ];
    
    public function currency_unit()
    {
        return $this->belongsTo('App\CurrencyUnit','currency_unit_id')->where('currency_units.is_active','1');
    }
}
