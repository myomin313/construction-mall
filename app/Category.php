<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'parent_id','is_active','category_url',
        'created_by','updated_by',
        'created_at','updated_at'];
        
    public function companies()
    {
      return $this->belongsToMany('App\Company')->withPivot('created_by','updated_by');
    }
     public function parent()
    {
        return $this->hasOne('App\Category', 'id','parent_id');
    }
    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id','id');
    }
}
