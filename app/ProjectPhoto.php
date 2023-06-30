<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectPhoto extends Model
{
    protected $fillable = [
        'company_project_id', 'photo', 'image_title','created_by','updated_by','created_at','updated_at'];
}
