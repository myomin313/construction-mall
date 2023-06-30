<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoinPlan extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'coin_count', 'price', 'is_active',
        'created_by','updated_by','created_at','updated_at'];
     
    public function user()
    {
      return $this->belongsToMany('App\User')->withPivot('status','created_by','updated_by','created_at','updated_at')->orderBy('updated_at', 'DESC');
    }
     public function currency_unit()
    {
        return $this->belongsTo('App\CurrencyUnit','currency_unit_id')->where('currency_units.is_active','1');
    }

}
