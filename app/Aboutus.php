<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{ 
	protected $table='about_us';
    protected $fillable = ['title','image','btn_text','description','type'];
   
}
