<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermsOfService extends Model
{ 
	protected $table='termsofservice';
    protected $fillable = [
        'header', 'termOfService'];
   
}
