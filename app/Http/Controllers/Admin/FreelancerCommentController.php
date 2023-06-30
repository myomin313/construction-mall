<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use Storage;
use App\BlogCategory;
use App\Freelancer;
use App\BLog;
use App\FreelancerComment;
use App\FreelancerRate;
use App\Advertising;
use App\Helper\AllHelper;
use Session;
use DB;

class FreelancerCommentController extends Controller
{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function feedbackList(Request $request){
          
        $user_id = Auth()->user()->id;
        $data = $request->all();
          $name=$request->name;
             $is_active=$request->is_active;
              $commenter=$request->commenter;
        $freelancer_arr = array();
        
         $advertisings = Advertising::getPageDetailAdvertising();
         
         
        if(Auth::user()->role == 3)
        {
             $commenter=$request->commenter;
          $freelancer= Freelancer::where('user_id',$user_id)->with('user')->first();
          
          $freelancer_comments=FreelancerComment::leftjoin('users','users.id','=','freelancer_comments.user_id')
          ->leftjoin('freelancers','freelancers.id','=','freelancer_comments.freelancer_id')
          ->leftjoin('users as free','free.id','=','freelancers.user_id')
          ->where(function ($query) use ($commenter) {
              if(!empty($commenter))
              $query->where('users.name','like','%'.$commenter.'%');
             })
          ->where('freelancer_id',$freelancer->id)
          ->select('freelancer_comments.*','users.name','free.name as freelancer_name')
          ->orderBy('freelancer_comments.created_at','DESC')
          ->paginate(10);
          
          $freelancer_array = null;
          
           return view('admin.freelancer.freelancer_reviews',compact('freelancer_comments','data','freelancer','name','is_active','commenter','advertisings'));
           
        }else if (Auth::user()->role == 4 || Auth::user()->role == 5) {
             $is_active=$request->is_active;
             $commenter=$request->commenter;
             $name=$request->name;
          $freelancer_comments=FreelancerComment::leftjoin('users','users.id','=','freelancer_comments.user_id')
           ->leftjoin('freelancers','freelancers.id','=','freelancer_comments.freelancer_id')
           ->leftjoin('users as free','free.id','=','freelancers.user_id')
           ->where(function ($query) use ($commenter) {
                if(!empty($commenter))
                 $query->where('users.name','like','%'.$commenter.'%');
             })
            ->where(function($query)use($is_active){
                if($is_active != null)
                $query->where('freelancer_comments.is_active','=',$is_active);
             })
             ->where(function($query)use($name){
                if($name != null)
                $query->where('free.name','=',$name);
             })
          ->select('freelancer_comments.*','users.name','free.name as freelancer_name')
          ->orderBy('freelancer_comments.created_at','DESC')->paginate(10);
          
          foreach ($freelancer_comments as $freelancer_comment) {
            array_push($freelancer_arr, $freelancer_comment->freelancer_id);
          }
          
           $freelancer= Freelancer::with('user:id,name')->whereIn('id',$freelancer_arr)->get();
           
            return view('admin.freelancer.reviews',compact('freelancer_comments','data','freelancer','name','is_active','commenter','advertisings'));
        //   $freelancer_array = array();
        //   foreach ($freelancer as $freelancer) {
        //       array_push( $freelancer_array ,array('id'=>$freelancer->id, 'name'=>$freelancer->user->name));
        //   }
        }
        
           
        
    }
    //  public function feedbackListSearch(Request $request){
         
    //      $is_active=$request->is_active;
    //      $commenter=$request->commenter;
    //      $name=$request->name;
    //      $user_id = Auth()->user()->id;
    //     $freelancer_arr = array();
    //       $freelancer_comments=FreelancerComment::leftjoin('users','users.id','=','freelancer_comments.user_id')
    //       ->where(function ($query) use ($commenter) {
    //             if(!empty($commenter))
    //              $query->where('users.name','like','%'.$commenter.'%');
    //          })
    //         ->where(function($query)use($is_active){
    //             if($is_active != null)
    //             $query->where('freelancer_comments.is_active','=',$is_active);
    //          })
    //       ->select('freelancer_comments.*','users.name')
    //       ->orderBy('freelancer_comments.created_at','DESC')->paginate(10);
    //       foreach ($freelancer_comments as $freelancer_comment) {
    //         array_push($freelancer_arr, $freelancer_comment->freelancer_id);
    //       }
    //       $freelancer= Freelancer::with('user:id,name')->whereIn('id',$freelancer_arr)->get();
    //       $freelancer_array = array();
    //       foreach ($freelancer as $freelancer) {
    //           array_push( $freelancer_array ,array('id'=>$freelancer->id, 'name'=>$freelancer->user->name));
    //       }
        
           
    //      return view('admin.freelancer.reviews',compact('freelancer','freelancer_comments','freelancer_array'));
         
    //  }
     function array_push_assoc($array, $key, $value){
       $array[$key] = $value;
       return $array;
    }
   // public function 
    public function RateList(Request $request){

           $user_id = Auth()->user()->id;
        $freelancer= Freelancer::where('user_id',$user_id)->with('user')->first();
        $freelancer_rates=FreelancerRate::leftjoin('users','users.id','=','freelancer_rates.user_id')->where('freelancer_id',$freelancer->id)->get();
        // $freelancer_rates=FreelancerRate::where('freelancer_id',$freelancer->id)->get();
         $advertisings = Advertising::getPageDetailAdvertising();

         return view('admin.freelancer.rates',compact('freelancer','freelancer_rates','advertisings'));
        //return view('');

    }
    
     public function adminfreelancerUpdateStatus(Request $request){
        $result = AllHelper::updateStatus($request,'App\FreelancerComment');
        return response()->json($result);
    }

}
