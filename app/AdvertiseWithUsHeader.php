<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertiseWithUsHeader extends Model
{ 
	protected $table='main_advertise_with_us';
    protected $fillable = ['header_image','text_header','breadcrump','why_myanbox','myanbox_dec','analyse_customer_data_header','analyse_description','btn_text','images','advertise_with_us','call_now '];
   
}