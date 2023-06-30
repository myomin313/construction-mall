<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class QuotationReceivedUser extends Model
{
    // 
     protected $table = 'quotation_received_users';
     protected $fillable = [
        'quotation_id','received_status','user_id','updated_by','updated_at'];

}
