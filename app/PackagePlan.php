<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackagePlan extends Model
{
    protected $fillable = [
        'name', 'price', 'periods','created_by','updated_by'];

    public function companies()
    {
      return $this->belongsToMany('App\Company')->withPivot('created_by','updated_by','start_date','end_date','is_active','approve')->orderBy('end_date', 'DESC');
    }

     public function currency_unit()
    {
        return $this->belongsTo('App\CurrencyUnit','currency_unit_id')->where('currency_units.is_active','1');
    }
}
