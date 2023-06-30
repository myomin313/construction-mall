<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreelancerStatus extends Model
{
    //
    protected $table='freelancer_statuses';
    protected $fillable = ['freelancer_status_name','is_active'];
}
