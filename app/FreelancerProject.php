<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreelancerProject extends Model
{
    protected $fillable = [
          'freelancer_id','project_name','company_name','project_detail','project_start_date','project_end_date','project_link'
   	 ];

}
