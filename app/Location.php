<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $fillable = [
        'name', 'parent_id', 'is_active','created_by','updated_by'];

     public function parent()
    {
        return $this->hasOne('App\Location', 'id','parent_id');
    }
    public function children()
    {
        return $this->hasMany('App\Location', 'parent_id','id');
    }
}
