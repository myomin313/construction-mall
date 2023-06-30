<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Functions extends Model
{
    protected  $table = 'functions';
    protected  $fillable = ['name', 'is_active','created_by','updated_by'];
}
