<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 
        'password','phone','role',
        'is_active','logo','coin',
        'left_coin','remember_token','created_at','updated_at',' email_verified_flag'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
        
    public function company()
    {
        return $this->hasMany('App\Company');
    } 
     public function Freelancer(){
         return  $this->hasMany('App\Freelancer');
     }
     public function FreelancerComment()
    {
        return $this->belongsToMany('App\Freelancer', 'freelancer_comments', 'user_id', 'freelancer_id')->withPivot('comment','created_at','updated_at');
    }
    public function coin_plan()
    {
      return $this->belongsToMany('App\CoinPlan')->withPivot('status','created_by','updated_by','created_at','updated_at');
    }
    public function received_quotation()
    {
        return $this->belongsToMany('App\Quotation','quotation_received_users','user_id','quotation_id')->withPivot('received_status','created_at','updated_at');  
    }
    public function quotation()
    { 
        return $this->hasMany('App\Quotation','send_user_id');
    } 
      public function approve_quotation()
    { 
        return $this->hasMany('App\Quotation','send_user_id')->where('requested_status','success');
    } 
    public function category()
    {
        return $this->hasManyThrough('App\Category','App\Company','id','category_id');
    }
}
