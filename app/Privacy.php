<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privacy extends Model
{ 
	protected $table='privacy';
    protected $fillable = [
        'privacy_header', 'privacy'];
   
}
