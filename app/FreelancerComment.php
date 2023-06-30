<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreelancerComment extends Model
{
    protected $fillable = [
        'freelancer_id','comments','user_id','is_active'
      ];
}
