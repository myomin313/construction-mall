<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    //
    protected $fillable = [
        'category_name','is_active','category_url'];
    
}
