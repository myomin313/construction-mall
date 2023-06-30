<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreelancerEducation extends Model
{
    protected $fillable = [
          'name','education_level','from_date','to_date','university',
          'freelancer_id','country'
   	 ];
   	 public function freelancer()
    {
        return $this->belongsTo('App\Freelancer','freelancer_id');
    } 
    
}
