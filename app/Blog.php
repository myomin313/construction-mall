<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Blog extends Model
{
    protected $fillable = [
          'post_user_id','approved_user_id','is_active','title','image','video'
   	 ];

      public static function getBlogList($request,$user_id){
         $title = $request->title;
         $is_active = $request->is_active;
       $blogs=DB::table('blogs')
             ->leftjoin('users','users.id','=','blogs.approved_user_id')
             ->where('blogs.post_user_id','=',$user_id)
             ->where(function ($query) use ($title) {
                   $query->where('blogs.title','like','%'.$title.'%');
                 })
              ->where(function($query)use($is_active){
                 if($is_active != null)
                   $query->where('blogs.is_active','=',$is_active);
                })
             ->select('blogs.*')
             ->orderBy('created_at','DESC')
             ->paginate(10);
             return $blogs;
     }
     
     public static function getBlogListForAdmin($request){
           
           $title = $request->title;
           $is_active = $request->is_active;
           $posted_user = $request->posted_user;
           
         $blogs=DB::table('blogs')
              ->leftjoin('users as approved','approved.id','=','blogs.approved_user_id')
              ->leftjoin('users as posted','posted.id','=','blogs.post_user_id')
               ->where(function ($query) use ($title) {
                   $query->where('blogs.title','like','%'.$title.'%');
                 })
                ->where(function($query)use($is_active){
                 if($is_active != null)
                   $query->where('blogs.is_active','=',$is_active);
                })
               ->where(function ($query) use ($posted_user) {
                   $query->where('posted.name','like','%'.$posted_user.'%');
                 })
             ->select('blogs.*','approved.name as approved_by',
              'posted.name as posted_by')
             ->orderBy('created_at','DESC')
             ->paginate(10);

             return $blogs;
     }
    
}
