<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreelancerRate extends Model
{
    protected $fillable = [
        'freelancer_id','rate','user_id'
      ];
}
