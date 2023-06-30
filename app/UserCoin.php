<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCoin extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='coin_plan_user';
    protected $fillable = [
        'user_id', 'coin_plan_id','status',
        'created_by','updated_by','created_at','updated_at'];


        
}
