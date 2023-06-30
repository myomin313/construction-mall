<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillForFreelancer extends Model
{
    protected $fillable = [
          'skill_name'
   	 ];
   	  public function freelancers()
    {
      return $this->belongsToMany('App\Freelancer');
    }

}
