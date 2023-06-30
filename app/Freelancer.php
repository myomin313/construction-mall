<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    protected $fillable = [
          'user_id','facebook','email','website','googleplus',
          'twitter','linkedin','date_of_birth','nrc','address',
          'location_id','currenct_work_status','discription','total_experiences','freelancer_status_id','created_by','updated_by','freelancer_url','company_id','category_id','freelancer_company'
   	 ];
       public function user()
    {
        return $this->belongsTo('App\User','user_id');
    } 
    public function location()
    {
        return $this->belongsTo('App\location','location_id');
    } 
      public function freelancerstatus()
    {
        return $this->belongsTo('App\FreelancerStatus','freelancer_status_id');
    }
    public function company()
    {
        return $this->belongsTo('App\Company','company_id');
    }
     public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    } 
     public function skillForFreelancer()
    {
        return $this->belongsToMany('App\SkillForFreelancer', 'freelancer_skills', 'freelancer_id', 'skill_id');
    }
      public function UserComment()
    {
        return $this->belongsToMany('App\User', 'freelancer_comments', 'freelancer_id','user_id')->withPivot('comment','created_at','updated_at');
    }
    public function parent_categories()
    {
      return $this->belongsTo('App\Category','category_id')->where('parent_id',0)->where('categories.is_active','1');
    }
     public function child_categories()
    {
      return $this->belongsTo('App\Category','category_id')->where('parent_id','<>',0);
    }

        // public function freelancer_skills()
        // {
        //     return $this->hasMany('App\skill_id');
        // }
        // public function freelancer_statuses()
        // {
        //     return $this->hasOne('App\freelancer_status_id');
        // } 
        //  public function locations()
        // {
        //     return $this->hasOne('App\location_id');
        // }
}
