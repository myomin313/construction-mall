<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisewithus extends Model
{ 
	protected $table='advertise_with_us';
    protected $fillable = ['title','img','description','btn_text','type'];
   
}
