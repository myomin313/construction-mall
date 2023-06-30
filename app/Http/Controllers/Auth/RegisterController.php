<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Company;
use App\Freelancer;
use App\CategoryCompany;
use App\ProjectSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerify;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;
use Response;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    { 
         
        if($data['role'] == 2){
         return Validator::make($data, [
            'name' => 'required|max:50',
            //'email'=>'required|email|max:50|exists:users,2,role',
            'email'=>'required|email|max:50|unique:users,email,NULL,id,role,2',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'phone'=>'required|max:50',
            'role'=>'required',
            'category_id'=>'required',
        ]);
       }else if($data['role'] == 1){
           return Validator::make($data, [
            'name' => 'required|max:50',
            //'email' => 'required|email|max:50|unique:users,email,role,1',
            'email'=>'required|email|max:50|unique:users,email,NULL,id,role,1',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'phone'=>'required|max:50',
            'role'=>'required',
        ]);
       }else if($data['role'] == 3){
           return Validator::make($data, [
            'name' => 'required|max:50',
            'email'=>'required|email|max:50|unique:users,email,NULL,id,role,3',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'phone'=>'required|max:50',
            'role'=>'required',
        ]);
       }
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['role'] == 1){
           $setting=ProjectSetting::select('user_register_coin')->first();
           $coin =$setting->user_register_coin;
        }else if( $data['role'] == 2){
           $setting=ProjectSetting::select('company_register_coin')->first();
           $coin =$setting->company_register_coin;
        }else if( $data['role'] == 3){
           $coin =null;
        }
          $last_login_date=date('Y-m-d');

          $user = new User;
          $user->name= $data['name'];
          $user->email=$data['email'];
          $user->password=Hash::make($data['password']);
          $user->coin=$coin;
          $user->left_coin=$coin;
          $user->last_login_date=$last_login_date;
          $user->role=$data['role'];
          $user->phone=$data['phone'];
          $user->save();

          return $user;


    }
    public function register(Request $request){
         if(Auth::check()){
            return response(['logged_in' => true,'message' => 'Please logout currently loggedin account']);
       }
       
          $validation = $this->validator($request->all());
        if ($validation->fails())  {
          return response(['success'=>false,'errors'=>$validation->errors()->toArray()]);      
        }else{
          $login=$this->create($request->all());
          $user_id=$login->id;
           $userUrl = strtolower(self::makeUrl(trim($login->name)));
           
           if($login->role == 3){
                 $freelancer = new Freelancer;
                 $freelancer->user_id=$login->id;
                 $freelancer->freelancer_url=$userUrl;
                 $freelancer->save();
             }else if($login->role == 2){
                 $company = new Company;
                 $company->user_id=$login->id;
                 $company->company_url=$userUrl;
                 $company->created_by=$login->id;
                 $company->updated_by=$login->id;
                 $company->active_package_plan_id=1;
                 $company->save();
                 // $CompanyCategory=new CategoryCompany;
                 $insert['company_id'] = $company->id;
                 $insert['category_id']= $request['category_id'];
                 $insert['created_by'] = $login->id;
                 $insert['updated_by'] = $login->id;
                 DB::table('category_company')->insert($insert);
             }
            
            // Auth::login($login);
            // if(Auth::user()){
            //  $role=Auth::user()->role;
            //   return response(['success' => true,'role'=>$role]);
              
               $user = User::where('id', $user_id)->first();
                if ($user) {
                    $token = null;
                    //delete if verify token record exist
                    DB::table('verify_user')->where('user_id', $user->id)->delete();
                    //insert new token record
                    $token = str_random(40);
                    DB::table('verify_user')->insert(
                        [
                            'user_id' => $user->id,
                            'token' => $token,
                            'created_at' => \Carbon\Carbon::now()
                        ]
                    );
                    Mail::to($user->email)->send(new EmailVerify($user,$token));
                    return response(['success' => true]);
    
                }
           else{
            return response(['success' => true,'errors'=>'errors in login']);
            }
        }
    }
     public function verify(Request $request)
    {
        
        
        $token = $request->token;
        $ticket = DB::table('verify_user')->where('token',$token)->first();
        if($ticket){
            $user = User::withoutGlobalScope('visible')->findOrFail($ticket->user_id);
            $user->email_verified_flag = 1;
            $user->save();
            $request->session()->flash('process_success','Your account is verified.Login here.');
            
             //start myo min for register success
         Mail::send('custom.register-success', ['token' => $token,'role'=> $user->role,'name'=>$user->name], function($message) use($user){
          $message->to($user->email);
          $message->subject('Congratulations! You have successfully registered to myanbox.com.mm');
         });
        //end myo min for register success
        
            return redirect()->route('home');
        }
       
        $request->session()->flash('process_success','Token is not valid');
        return redirect()->route('home');
    }
    
     public static function makeUrl( $string ) 
    {
          $stripArr = array( '(', ')','{','}','[',']','','  ','_',
                          '!','-','&','<','>','<','\\','/',
                          '|','+','-',':',',','`','@','#','$',
                          '%','^','&','+','*','.','=','-','~','"','\''
          );
          $result = str_replace($stripArr,' ', $string); 
          return preg_replace('/\s+/', '', trim($result));
    }
    
}