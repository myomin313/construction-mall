<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class CompanyService extends Model
{
    protected $fillable = [
          'service_name','service_detail','image_name','company_id'
          ];

    public function company()
    {
        return $this->belongsTo('App\Company','company_id');
    }
    
}
