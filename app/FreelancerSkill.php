<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreelancerSkill extends Model
{
    protected $fillable = [
          'freelancer_id','skill_id'
   	 ];

        public function SkillForFreelancer()
    {
        return $this->hasMany('App\skill_id');
    }

}
