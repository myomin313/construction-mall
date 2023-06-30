<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\User;
use App\Company;
use DB;
use Auth;
use Response;  
use App\UserCoin; 
use App\Userfunctions;
use App\Quotation;
use App\Functions;
use App\Helper\AllHelper;
use Hash;
use Log;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('admin.user.index');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $id=Auth::user()->id;
       $userData = DB::table('users')->where('id','=',$id)->first();  

        $usercoin_lists = DB::table('coin_plan_user')
        ->join('coin_plans', 'coin_plans.id', '=', 'coin_plan_user.coin_plan_id')
        ->join('users', 'users.id', '=', 'coin_plan_user.user_id')
        ->select('users.name', 'coin_plan_user.coin_plan_id', 'coin_plan_user.status', 'coin_plan_user.id', 'coin_plan_user.user_id'
        , 'coin_plans.coin_count', 'coin_plans.price')
        ->where('coin_plan_user.user_id', '=',  $id)
        ->get();

         $usercoin_received = DB::table('coin_plan_user')
        ->join('coin_plans', 'coin_plans.id', '=', 'coin_plan_user.coin_plan_id')
        ->join('users', 'users.id', '=', 'coin_plan_user.user_id')
        ->where('coin_plan_user.user_id', '=',  $id)
        ->where('coin_plan_user.status', '=', 'approved')
        ->count();
     
        // $quotations_request = Quotation::where('send_user_id',$id)->where('requested_status','success')->with('range','category','send_user','quotation_created_user','quotation_updated_user')->get();
        // $quotations_pending = Quotation::where('send_user_id',$id)->where('requested_status','pending')->with('range','category','send_user','quotation_created_user','quotation_updated_user')->get();
        // $quotations_received = Quotation::where('send_user_id',$id)->with('range','category','send_user','quotation_created_user','quotation_updated_user')->get();

        //   $quotations_request_count = $quotations_request->count();
        // $quotations_received_count = $quotations_received->count();
        $count= Quotation::where('send_user_id',$id)->count();
        $quotations_success="";
        $quotations_pending="";
        $quotations_request="";
        $quotations_success_count=0;
        $quotations_request_count=0;
        if($count >0){
         $quotations_success = Quotation::where('send_user_id',$id)->with(['range','category','received_company'=>function($q){
                $q->where('quotation_received_companys.requested_status','success')->get();
             },'send_user','quotation_created_user','quotation_updated_user'])->get();
             
        $quotations_pending = Quotation::where('send_user_id',$id)->with(['range','category','send_user','quotation_created_user','quotation_updated_user','received_company'=>function($q){
                $q->where('quotation_received_companys.requested_status','pending')->get();
             }])->get();
             
        $quotations_request = Quotation::where('send_user_id',$id)->with('range','category','send_user','quotation_created_user','quotation_updated_user')->get();
         $quotations_success_count = $quotations_success->first()->received_company->count();
        $quotations_request_count = $quotations_request->count(); 
       }
       $usercoin_lists_count = $usercoin_lists->count();
        $quotation_statuses = Quotation::getEnum('quotation_received_companys','received_status'); 
        return view('admin.user.dashboard',compact('usercoin_lists','quotation_statuses','quotations_request','quotations_pending','quotations_received','userData','quotations_request_count','quotations_success_count','usercoin_lists_count','usercoin_received'));
        // $usercoin_lists_count = $usercoin_lists->count();
               
        // $quotation_statuses = Quotation::getEnum('quotation_received_users','received_status'); 

        // return view('admin.user.dashboard',compact('usercoin_lists','quotation_statuses','quotations_request','quotations_pending','quotations_received','userData',
        // 'quotations_request_count','quotations_received_count','usercoin_lists_count','usercoin_received'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_changepassword()
    {  
        
        try{
           // $id=Auth::user()->id;
           // $userData = DB::table('users')->where('id','=',$id)->first();   
            return view('admin.user.changepassword'); 
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user_index_changepassword()
    {  
        
        try{
           // $id=Auth::user()->id;
           // $userData = DB::table('users')->where('id','=',$id)->first();
        //   start
        //start
        $id=Auth::user()->id;
        $userData = DB::table('users')->where('id','=',$id)->first();  

        $usercoin_lists = DB::table('coin_plan_user')
        ->join('coin_plans', 'coin_plans.id', '=', 'coin_plan_user.coin_plan_id')
        ->join('users', 'users.id', '=', 'coin_plan_user.user_id')
        ->select('users.name', 'coin_plan_user.coin_plan_id', 'coin_plan_user.status', 'coin_plan_user.id', 'coin_plan_user.user_id'
        , 'coin_plans.coin_count', 'coin_plans.price')
        ->where('coin_plan_user.user_id', '=',  $id)
        ->get();

         $usercoin_received = DB::table('coin_plan_user')
        ->join('coin_plans', 'coin_plans.id', '=', 'coin_plan_user.coin_plan_id')
        ->join('users', 'users.id', '=', 'coin_plan_user.user_id')
        ->where('coin_plan_user.user_id', '=',  $id)
        ->where('coin_plan_user.status', '=', 'approved')
        ->count();
        $count= Quotation::where('send_user_id',$id)->count();
        $quotations_success="";
        $quotations_pending="";
        $quotations_request="";
        $quotations_success_count=0;
        $quotations_request_count=0;
        if($count >0){
         $quotations_success = Quotation::where('send_user_id',$id)->with(['range','category','received_company'=>function($q){
                $q->where('quotation_received_companys.requested_status','received')->get();
             },'send_user','quotation_created_user','quotation_updated_user'])->get();
             
        $quotations_pending = Quotation::where('send_user_id',$id)->with(['range','category','send_user','quotation_created_user','quotation_updated_user','received_company'=>function($q){
                $q->where('quotation_received_companys.requested_status','pending')->get();
             }])->get();
             
        $quotations_request = Quotation::where('send_user_id',$id)->with('range','category','send_user','quotation_created_user','quotation_updated_user')->get();
         $quotations_success_count = $quotations_success->first()->received_company->count();
        $quotations_request_count = $quotations_request->count(); 
       }
       $usercoin_lists_count = $usercoin_lists->count();
        $quotation_statuses = Quotation::getEnum('quotation_received_companys','received_status');
            //end
        // end
             
            return view('backend.user.change_password',compact('userData','quotation_statuses','usercoin_lists_count','quotations_request_count','quotations_success_count','quotations_request','quotations_pending','quotations_success','usercoin_received','usercoin_lists'));
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
    public function company_changepassword()
    {  
        
        try{
           // $id=Auth::user()->id;
           // $userData = DB::table('users')->where('id','=',$id)->first();
           //  myo min added
            $company = Company::Where('user_id',Auth()->user()->id)->with('parent_categories','user','packageplan','package_plan')->first();
            // myo min added end
           
            return view('backend.company.change_password',compact('company')); 
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }

    public function changepassword(Request $request)
    {    
        try
         {   
            $status = $this->validation($request);
            if($status->fails())
            {
               /* $errors =array('errors'=>$status->messages());
                return response()->json($errors);    */
                
                 /*$errors =array('errors'=>$status->errors()->all());
            return $errors;   */
            
                    $errors =array('errors'=>$status->messages());
                  return $errors; 
             }
            else{
                $old_password = $request->old_password;
                $new_password = $request->new_password;
                $current= Auth::user()->password;
                if(Hash::check($old_password,$current))
                {
                    $user_id =Auth::user()->id;
                    $change_pwd_user=User::find($user_id);
                    $change_pwd_user->password = Hash::make($new_password);
                    $change_pwd_user->save();
                    $success = array('success'=>"Successfully save changes.");
                    return $success;             
                }
                else
                {
                    $errors = array('errors'=>"Old password is wrong");
                    return $errors;            
                }       
            }
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
 
    }

    private function validation($request)
    {
        try 
        {
            switch ($request->user_information) { 
                case '_changepass':
                    $messages = [
                        'old_password.required|min:6' => 'Old Password is required|Old Password must be minimum 3',
                        'new_password.required|min:6'=>'New Password is required|New Password must be minimum 3',
                        'confirm_password.same:new_password|required|min:3'=>'Confirm Pasword must be same with New Password|Confirm Password is required|Confirm Password must be minimum 3'
                    ];
                    
                    $validator = Validator::make($request->all(),[
                        'old_password' =>'required|min:6',
                        'new_password' =>'required|min:6',
                        'confirm_password' => 'same:new_password|required|min:3'
                    ],$messages);
                     return $validator;
                     
                    break;

                    case '_userinfo':
                        $messages = [
                            'name.required' => 'name is required',
                            'phone.required' => 'phone is required'
                        ];
                        $validator = Validator::make($request->all(),[
                            'name' =>'required', 'phone' => 'required'
                        ],$messages);
                        return $validator;   
                        break;

                    case 'admin_add':
                          $messages = [
                        'name.required|min:3' =>'Name is required|Name must be minimum 3',
                        'email.required|email|unique:users|min:5'=>'Email is required|Email is not valid|Email must be unique|Email must be minimum 5',
                        'password.required|min:6' => 'Password is required| Password must be minimum 6',
                        'confirmPassword.same:password|required|min:6'=>'Confirm Pasword must be same with Password|Confirm Password is required|Confirm Password must be minimum 6',
                        'phone.required'=>'The phone field is required'
                    ];
                    $validator = Validator::make($request->all(),[
                        'name' =>'required|min:3',
                        'email' =>'required|email|unique:users|min:5',
                        'password' =>'required|min:6',
                        'confirmPassword' => 'same:password|required|min:6',
                        'phone' =>'required',
                    ],$messages);
                    return $validator;
                    break; 
                    case 'admin_edit':
                          $messages = [
                        'name.required|min:3' =>'Name is required|Name must be minimum 3',
                        'email.required|min:5'=>'Email is required|email is not valid|Email must be minimum 5',
                        'phone.required'=>'Phone is required'
                    ]; 
                     $validator = Validator::make($request->all(),[
                        'name' =>'required|min:3',
                        'email' =>'required|email|min:5',
                        'phone' =>'required',
                    ],$messages);
                    return $validator; 
                    break;
                default:
                    echo 'There is no validation';
                    break;
            }
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $functions =Functions::where('is_active','=',1)->select('*')->get();
        return view('admin.user.createadmin',compact('functions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
       $status = $this->validation($request);  
        if($status->fails())
        { 
             $errors =array('errors'=>$status->messages());
             return response()->json($errors); 
           // return $errors; 
        }
        else{ 
             if($request->image_name == 'undefined'){
                $logo=null;
             }else{
                $logo=$request->image_name;
             }
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =Hash::make($request->password);
            $user->phone = $request->phone;
            $user->logo = $logo;
            $user->role  = 4;
            $user->is_active = 1;
            $user->email_verified_flag=1;
            $user->created_at = date("Y-m-d H:m:i");
            $user->updated_at = date("Y-m-d H:m:i");
            
          
           if($user->save())
            { 
                    if(!empty($request['function_id'])){
         foreach ($request['function_id'] as $function_id) {
           $preferedplacedata['function_id'] =  $function_id;
           $preferedplacedata['user_id']     = $user->id;
           $preferedplacedata['created_by']  = Auth::user()->id;
           $preferedplacedata['updated_by']  = Auth::user()->id;
            Userfunctions::insert($preferedplacedata);
         }
        }
                 Session::flash('success', 'Created successfully!');
                $success = array('success'=>"Created successfully!");
                return response()->json($success);            
            }else
            {
                $errors = array('errors'=>"Something wrong!");
                return response()->json($errors);
            }
        }  

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit ()
    { 
       $url = URL :: previous();
       $route = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
       if(($route == 'company.send_quotation_form' || $route =='send_quotation_detail_form') && Session::has('quotation_data')) {
           Session::forget('quotation_data');
       }
        try{
            $id=Auth()->user()->id;
            //start
             $userData = DB::table('users')->where('id','=',$id)->first();  

        $usercoin_lists = DB::table('coin_plan_user')
        ->join('coin_plans', 'coin_plans.id', '=', 'coin_plan_user.coin_plan_id')
        ->join('users', 'users.id', '=', 'coin_plan_user.user_id')
        ->select('users.name', 'coin_plan_user.coin_plan_id', 'coin_plan_user.status', 'coin_plan_user.id', 'coin_plan_user.user_id'
        , 'coin_plans.coin_count', 'coin_plans.price')
        ->where('coin_plan_user.user_id', '=',  $id)
        ->get();

         $usercoin_received = DB::table('coin_plan_user')
        ->join('coin_plans', 'coin_plans.id', '=', 'coin_plan_user.coin_plan_id')
        ->join('users', 'users.id', '=', 'coin_plan_user.user_id')
        ->where('coin_plan_user.user_id', '=',  $id)
        ->where('coin_plan_user.status', '=', 'approved')
        ->count();
        $count= Quotation::where('send_user_id',$id)->count();
        $quotations_success="";
        $quotations_pending="";
        $quotations_request="";
        $quotations_success_count=0;
        $quotations_request_count=0;
        if($count >0){
         $quotations_success = Quotation::where('send_user_id',$id)->with(['range','category','received_company'=>function($q){
                $q->where('quotation_received_companys.requested_status','received')->get();
             },'send_user','quotation_created_user','quotation_updated_user'])->get();
             
        $quotations_pending = Quotation::where('send_user_id',$id)->with(['range','category','send_user','quotation_created_user','quotation_updated_user','received_company'=>function($q){
                $q->where('quotation_received_companys.requested_status','pending')->get();
             }])->get();
             
        $quotations_request = Quotation::where('send_user_id',$id)->with('range','category','send_user','quotation_created_user','quotation_updated_user')->get();
         $quotations_success_count = $quotations_success->first()->received_company->count();
        $quotations_request_count = $quotations_request->count(); 
       }
       $usercoin_lists_count = $usercoin_lists->count();
        $quotation_statuses = Quotation::getEnum('quotation_received_companys','received_status');
            //end
        return view('backend.user.edit',compact('userData','quotation_statuses','usercoin_lists_count','quotations_request_count','quotations_success_count','quotations_request','quotations_pending','quotations_success','usercoin_received','usercoin_lists'));
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        try 
        {  
            $status = $this->validation($request);
            if($status->fails())
            {
                $errors =array('errors'=>$status->messages());
             return response()->json($errors); 
             }
             else 
             {
            
             $id =Auth::user()->id;        
            $user =User::find($id);
            $user->name =$request->name;
            $user->phone =$request->phone;
            $user->updated_at = date('Y-m-d H:i:s'); 
            $user->save();
            if($user->save())
            {
                Session::flash('success', 'Updated successfully !'); 
                $success = array('success'=>"Updated successfully!");
                return $success;
            }else
            {
                $errors = array('errors'=>"Something wrong!");
                return $errors;
            }
             }
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
     public function profileCrop(Request $request){

       $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
        // $path  = storage_path('app/public/user/'. $image_name);
        $image_store_path = $request->path;
       
        $path  = storage_path('app/public/'.$image_store_path.'/'.$image_name);
         //Storage::disk('local')->put('freelancer/'.$image_name, 'Contents');

        file_put_contents($path, $image);
        // $image_name = explode('images/upload/', $path);
        if(!($request->id)){
         $data=User::where('id',Auth::user()->id)
            ->update(['logo'=>$image_name]);
        }else{
             
            if($image_store_path == "company_coverphoto"){
             $data=Company::where('id',$request->id)
                ->update(['cover_photo'=>$image_name]); 
            }else{
             $data=User::where('id',$request->id)
                 ->update(['logo'=>$image_name]);   
            }
        }
        return response()->json(['status'=>true,'image_name'=>$image_name]);


    }
    public function adminprofileCrop(Request $request){

        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
        $path  = storage_path('app/public/admin_logo/'. $image_name);
         //Storage::disk('local')->put('freelancer/'.$image_name, 'Contents');

        file_put_contents($path, $image);
        // $image_name = explode('images/upload/', $path);
      $data=User::where('id',Auth::user()->id)
           ->update(['logo'=>$image_name]);
        return response()->json(['status'=>true,'image_name'=>$image_name]);


    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userTypeList(Request $request)
    {
        $data = $request->all();
        $path_name =\Request::route()->getName();
        $name=$request->name;
        $phone=$request->phone;
        $email=$request->email;
        $is_active=$request->is_active;
        if($path_name == "users.adminlist")
        {
            $role = 4;
            $user = "Admin";  
           // $status = $request->active; 
        }
        elseif ($path_name == "users.freelancerlist") {
            $role = 3;
            $user = "Freelancer";
           // $status = $request->active;
        }
        elseif ($path_name == "users.memberlist" ) {
            $role = 1;
            $user = "Member";
           // $status = $request->active;
        }
        $lists = User::where('role',$role)
          ->where(function ($query) use ($name) {
                 $query->where('users.name','like','%'.$name.'%');
              })
          ->where(function ($query) use ($phone) {
                 $query->where('users.phone','like','%'.$phone.'%');
              })
          ->where(function($query)use($email){
                if(!empty($email))
                 $query->where('users.email','=',$email);
            })
            ->where(function($query)use($is_active){
                if($is_active != null)
                $query->where('users.is_active','=',$is_active);
             })
          ->orderBy('created_at','DESC')->paginate(10);
          
        return view('admin.user.list',compact('lists','data','user','path_name','name','phone','email','is_active'));
    }
      //update User(Admin/Freelancer) 
     //update User(Admin/Freelancer) status record
    public function updatestatus(Request $request)
    { 
        $result = AllHelper::updateStatus($request,'App\User');
        return response()->json($result); 
        // try{  
        //     DB::table('users')
        //     ->where('id', '=',$request->get('id'))
        //     ->update(['is_active' => $request->get('selectedvalue')]);
        //      Session::flash('success', 'Successfully Change Status!');
        //     $success = array('success'=>"Successfully Status Changes!");
        //     return response()->json($success);  
        // }
        // catch (\Illuminate\Database\QueryException $ex) {
        //     $res['status'] = false;
        //     $res['message'] = $ex->getMessage();
        //     return response($res, 500);
        // }  

    }
      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAdmin($id)
    { 
        $id = \Crypt::decrypt($id);
        if(is_numeric($id)){
            if((Auth::user()->id == $id and Auth::user()->role ==4) or Auth::user()->role == 5)
            {
                $user = User::where('id',$id)->first(); 
            }
            else{
                $user = User::where('id',Auth::user()->id)->first();   
            }
            return view('admin.user.editadmin',compact('user'));  
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAdmin(Request $request)
    {   
        $status = $this->validation($request);
        if($status->fails())
        {
             $errors =array('errors'=>$status->messages());
             return response()->json($errors);         
        }
        else{ 
            if(!empty($request['function_id'])){ 
            if(count($request['function_id']) >= 1){
            Userfunctions::where('user_id',$request->id)->delete();
          foreach ($request['function_id'] as $function_id) {
           $preferedplacedata['function_id'] =  $function_id;
           $preferedplacedata['user_id']     = $request->id;
           $preferedplacedata['created_by']  = Auth::user()->id;
           $preferedplacedata['updated_by']  = Auth::user()->id;
            Userfunctions::insert($preferedplacedata);
           }
          }
        }
        
            $user =User::where('id', $request->id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->logo = $request->image_name;
            // $user->role  = 5;
            $user->is_active = 1;
            $user->updated_at = date("Y-m-d H:m:i");
            if($user->save())
            {
                Session::flash('success', 'Updated successfully!'); 
                $success = array('success'=>"Updated successfully!");
                return response()->json($success);            
            }else{
                $errors = array('errors'=>"Something wrong!");
                return response()->json($errors);
            }
        }

    }
      public function account()
    {  
        try{
            return view('admin.user.changepassword'); 
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
    public function updateAccount(Request $request){
        $messages = app('App\Http\Controllers\Admin\CompanyController')->changePassword($request,Auth::user()->id);
             
           Session::flash('success', 'Updated successfully!');   
       return response()->json($messages);    
    }


}
