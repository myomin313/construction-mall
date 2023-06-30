<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryCompany extends Model
{
    
    protected $fillable = [
          'category_id','company_id',
          'created_by','updated_by','created_at','updated_at'
          ];
    
}
