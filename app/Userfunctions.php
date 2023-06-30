<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Userfunctions extends Model
{
    protected  $table = 'user_functions';
    protected  $fillable = ['user_id', 'function_id','created_by','updated_by'];
}
