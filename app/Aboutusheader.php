<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aboutusheader extends Model
{ 
	protected $table='main_about_us';
    protected $fillable = ['header','header_description','video','ready_to_get_start?','sign_up_today','header_background_color','header_font_color','footer_background_color','footer_font_color'];
   
}