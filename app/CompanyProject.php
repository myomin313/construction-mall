<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class CompanyProject extends Model
{
    protected $fillable = [
          'project_type_id','project_name','company_id','project_description','range_id','created_by','updated_by','project_url'
    ];

    public function range()
    {
        return $this->belongsTo('App\Range','range_id');
    } 
    public function projectphoto()
    {
      return $this->hasMany('App\ProjectPhoto');
    }
     public function projectType()
    {
        return $this->belongsTo('App\ProjectType','project_type_id');
    }
    public function company()
    {
        return $this->belongsTo('App\Company','company_id');
    } 
    public static function getCompanyProjects($id){

         $projectdetails=DB::table('company_projects')
             ->leftjoin('project_photos','project_photos.company_project_id','=','company_projects.id')
             ->leftjoin('companies','companies.id','=','company_projects.company_id')
             ->where('company_projects.company_id','=',$id)
             ->select('company_projects.*','project_photos.id as project_photo_id','project_photos.photo','project_photos.image_title','project_photos.company_project_id','companies.company_url')
             ->groupBy('company_projects.id')
             ->get();
             
             return $projectdetails;
    }
}
