<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Myanboxtube extends Model
{
    protected $fillable = [
        'title', 'link','is_active',
        'created_at','updated_at'];

}
