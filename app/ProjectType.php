<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProjectType extends Model
{
    //
    protected $fillable = ['project_type_name'];

     public function projects()
    {
      return $this->hasMany('App\CompanyProject');
    } 

    public static function getCompanyProjectTypes($id){

    	$projecttypedetails=DB::table('company_projects')
                           ->join('project_types','project_types.id','=','company_projects.project_type_id')
                           ->where('company_projects.company_id','=',$id)
                           ->select('project_types.project_type_name','project_types.id')
                           ->groupBy('project_types.id')
                           ->get();

             return $projecttypedetails;

    }

    
}
