<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Auth;
use Response;
use Session;
use App\Company;
use App\Freelancer;
use App\ProjectSetting;
use Socialite;
use App\User;
//use Redirect;
//use Illuminate\Http\RedirectResponse;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**log
     * Where to redirect users after login.
     *
     * @var string
     */
     protected $redirectTo = '/';
     protected $domain = "";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function adminLoginForm(){
        return view('auth.login');
    }
    public function login(Request $request)
    {  
      if(Auth::check()){
            return response(['logged_in' => true,'message' => 'Please logout currently loggedin account']);
       }else{

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'),'role' => $request->input('role'),'is_active' =>'1']))
         {
           
              if((int)Auth::user()->email_verified_flag != 1){
                 Auth::logout();
                 return response(['success' => false,'message' => 'Sorry! You need to verify mail.']);
             }
             
       if(Auth::user()->role == 1){
           $setting=ProjectSetting::select('user_login_coin')->first();
           $coin =$setting->user_login_coin;
           $path = "";
        }else if( Auth::user()->role == 2){
           $setting=ProjectSetting::select('company_login_coin')->first();
           $coin =$setting->company_login_coin;
           $company = Company::select('business_days')->where('user_id',Auth::user()->id)->first();
           if(empty($company->business_days))
               $path = "/company/edit";
           else
               $path = "";
        }else if(Auth::user()->role == 3){
           $coin =null;
           $freelancer = Freelancer::select('category_id')->where('user_id',Auth::user()->id)->first();
           if(empty($freelancer->category_id))
               $path = "/freelancer/update";
           else
               $path = "";
        }
        $usercoins=User::where('id',Auth::user()->id)->select('coin','left_coin','last_login_date')->first();
          
          if($usercoins->last_login_date < date('Y-m-d')){
           
             $data['coin']=$usercoins->coin+$coin;
             $data['left_coin']=$usercoins->left_coin+$coin;
             $data['last_login_date']=date('Y-m-d');
             User::where('id',Auth::user()->id)->update($data);
          }
            $role= Auth()->user()->role;
           return response(['success' => true,'message'=>'successfully Logined','role'=>$role,'path'=>$path]);
         } else {
           return response(['success' => false,'message' => 'Email and Password does not match!'
            ]);
        }
       }
    }
    public function adminLogin(Request $request)
    { 

       if(Auth::check()){
            return response(['logged_in' => true,'message' => 'Please logout currently loggedin account']);
       }
       // var_dump("hi");exit();
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'),'is_active' =>'1']))
         {
              if((int)Auth::user()->email_verified_flag != 1){
                 Auth::logout();
                 return view('auth.login')->with('error','Sorry! You need to verify mail.');
             }else{
            $id = Auth::user()->id;
            $id = \Crypt::encrypt($id);
            return redirect('admin/edit_admin/'.$id);
             }
         } else {
           // return response(['success' => false,'message' => 'Email and Password does not match!'
           //  ]);
            return view('auth.login')->with('error','Email and Password does not match!');
        }
    }
   
    //Facebook Login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    //Facebook Callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $this->registerOrLoginUser($user);

        //Redirect to home after login
        return  redirect()->to('/freelancer/update');
    }
    
     //Linkedin Login
    public function redirectToLinkedIn()
    {
       return Socialite::driver('linkedin')->stateless()->redirect();
    }

    //Linked Callback
    public function handleLinkedInCallback()
    {
        $user = Socialite::driver('linkedin')->stateless()->user();

        $this->registerOrLoginUser($user);

        //Redirect to freelancer update after login
        return  redirect()->to('/freelancer/update');
    }
    
    //Google Login
    public function redirectToGoogle()
    {
       return Socialite::driver('google')->stateless()->redirect();
    }

    //Google Callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $this->registerOrLoginUser($user);

        //Redirect to freelancer update after login
        return  redirect()->to('/freelancer/update');
    }
    

    protected function registerOrLoginUser($social_user){
         if(!$social_user->email){
             return Session::flash('message',"Registration with Facebook failed as your account have no email or email premission denied.Please  try again or sign up using your email");
         }
         $loginUserEmail =User::where('email',$social_user->email)->where('role',3)->first();
         if(!$loginUserEmail){
              $last_login_date=date('Y-m-d');
                $loginUserEmail = new User;
                $loginUserEmail->name=$social_user->name;
                $loginUserEmail->email=$social_user->email;
                $loginUserEmail->coin=null;
                $loginUserEmail->left_coin=null;
                $loginUserEmail->last_login_date=$last_login_date;
                $loginUserEmail->role=3;
                $loginUserEmail->email_verified_flag=1;
                $loginUserEmail->save();
                
                $userUrl = strtolower(self::makeUrl(trim($loginUserEmail->name))).'-'.date('mdY').$loginUserEmail->id.'.htm';
                
                 $freelancer = new Freelancer;
                 $freelancer->user_id=$loginUserEmail->id;
                 $freelancer->freelancer_url=$userUrl;
                 $freelancer->save();
                 
                 //start myo min for register success
                 Mail::send('custom.register-success', ['name'=>$social_user->name], function($message) use($social_user){
                  $message->to($social_user->email);
                  $message->subject('Congratulations! You have successfully registered to myanbox.com.mm');
                 });
                 //end myo min for register success
         }
        //  else if(!empty($loginUserEmail) && $loginUserEmail->role != 3){
        //         $this->storeFreelancer($loginUserEmail,$social_user);
        //  }
        Auth::login($loginUserEmail);
         
    }
    private function storeFreelancer($loginUserEmail,$social_user){
        $last_login_date=date('Y-m-d');
        $loginUserEmail = new User;
        $loginUserEmail->name=$social_user->name;
        $loginUserEmail->email=$social_user->email;
        $loginUserEmail->coin=null;
        $loginUserEmail->left_coin=null;
        $loginUserEmail->last_login_date=$last_login_date;
        $loginUserEmail->role=3;
        $loginUserEmail->email_verified_flag=1;
        $loginUserEmail->save();
        
        $userUrl = strtolower(self::makeUrl(trim($loginUserEmail->name))).'-'.date('mdY').$loginUserEmail->id.'.htm';
        
         $freelancer = new Freelancer;
         $freelancer->user_id=$loginUserEmail->id;
         $freelancer->freelancer_url=$userUrl;
         $freelancer->save();
         
         //start myo min for register success
         Mail::send('custom.register-success', ['name'=>$social_user->name], function($message) use($social_user){
          $message->to($social_user->email);
          $message->subject('Congratulations! You have successfully registered to myanbox.com.mm');
         });
         //end myo min for register success
    }
     public static function makeUrl( $string ) 
    {
          $stripArr = array( '(', ')','{','}','[',']','','  ','_',
                          '!','-','&','<','>','<','\\','/',
                          '|','+','-',':',',','`','@','#','$',
                          '%','^','&','+','*','.','=','-','~','"','\''
          );
          $result = str_replace($stripArr,' ', $string); 
          return preg_replace('# {1,}#', '-', trim($result));
    }

   

  
}
