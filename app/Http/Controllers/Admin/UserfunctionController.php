<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Userfunctions;
use App\Functions;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\User;
use DB;
use Response;  
use App\UserCoin; 
use App\Quotation;
use Hash;
use Session;

class UserfunctionController extends Controller
{

	public function editUserFunctionsbyadmin($id,$pageno)
	{
	    $id = \Crypt::decrypt($id);
        /*$pageno = \Crypt::decrypt($pageno);*/

         if(is_numeric($id))
         {
             Session::put('pageno',$pageno);
             $user = User::where('id',$id)->first();
        	 $functions =Functions::where('is_active','=',1)->select('*')->get();
        	 $functionsforusers=Userfunctions::where('user_id','=',$id)->select('*')->get();
              $user_function = array();
        	 foreach($functionsforusers as $userfunctions) {
                  $user_function[] =$userfunctions->function_id;
                };
               $user_functions=implode(',',$user_function);
        	return view('admin.user.userfunctions',compact('functions','user_functions','id','user'));
                 }
        	 

	}


	public function updateUserFunctionsbyadmin(Request $request,$id){
	    
	        dd("hi");exit();
	    $user =User::where('id',$id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->updated_at = date("Y-m-d H:m:i");
            $user->save();
               
        if(count($request['function_id']) >= 1){
            Userfunctions::where('user_id',$id)->delete();
         foreach ($request['function_id'] as $function_id) {
           $preferedplacedata['function_id'] =  $function_id;
           $preferedplacedata['user_id']     = $id;
           $preferedplacedata['created_by']  = Auth::user()->id;
           $preferedplacedata['updated_by']  = Auth::user()->id;
            Userfunctions::insert($preferedplacedata);
         }
        }
       // return back();
    //   admin/admin_list/1?page=2
        return redirect('admin/admin_list?page='.Session::get('pageno'));
     //return redirect()->route('users.adminlist',1);

	}

   /*  public function editAdmin($id)
    { 
        $user = User::where('id',$id)->first();
        return view('admin.user.editadmin',compact('user'));
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAdmin(Request $request,$id)
    {   
         
        $status = $this->validation($request);
        if($status->fails())
        {
            $errors =array('errors'=>$status->errors()->all());
            return $errors;          
        }
        else{ 


            $user =User::where('id', $request->id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->logo = $request->image_name;
            $user->role  = 5;
            $user->is_active = 1;
            $user->updated_at = date("Y-m-d H:m:i");
           if($user->save())
            { 
                $success = array('success'=>"Successfully saved.");
                return response()->json($success);            
            }else
            {
                $errors = array('errors'=>"Something wrong");
                return response()->json($errors);
            }
        }

       

    }


}