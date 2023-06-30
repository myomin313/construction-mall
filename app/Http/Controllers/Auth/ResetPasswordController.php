<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Hash;
use DB;
use Validator;
use Carbon\Carbon;
use Mail;
use App\User;
use Auth;
use Session;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
    public function resetView($rol){
         $role=\Crypt::decrypt($rol);
         return view('custom.passwords.email',compact('role'));
    }
    //myomin started
    public function postReset(Request $request){
        if($request->role == 1){
      $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email,role,1',
        ]);
        }else if($request->role == 2){
         $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email,role,2',
         ]);
        }else if($request->role == 3){
          $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email,role,3',
          ]);   
        }
        
      if ($validator->fails()) {
          $role=\Crypt::encrypt($request->role);
            return redirect('/reset/mail/'.$role)
                        ->withErrors($validator)
                        ->withInput();
      }
    $token = str_random(64);
      DB::table('password_resets')->insert(
          ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
      );
      
      $user = User::where('email', $request->email)->where('role',$request->role)->select('*')->first();
      
      Mail::send('custom.verify', ['token' => $token,'role'=> $request->role,'name'=>$user->name], function($message) use($request){
          $message->to($request->email);
          $message->subject('Reset Password Notification');
      });
       Session::flash('success','We have e-mailed your password reset link!');
      return back()->with('success', 'We have e-mailed your password reset link!');

    }
          /**

       * Write code on Method

       *

       * @return response()

       */

      public function showResetPasswordForm($token,$role) {
        return view('custom.forgetpasswordlink', ['token' => $token,'role'=>$role]);

      }

  

      /**

       * Write code on Method

       *

       * @return response()

       */

      public function submitResetPasswordForm(Request $request)
      {
            if($request->role == 1){
      $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email,role,1',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|same:password'
        ]);
        }else if($request->role == 2){
         $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email,role,2',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|same:password'
         ]);
        }else if($request->role == 3){
          $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email,role,3',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|same:password'
          ]);   
        }
        
        if ($validator->fails()) {
            return redirect('/reset-password/'.$request->token.'/'.$request->role)
                        ->withErrors($validator)
                        ->withInput();
       }

          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();

          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
          $user = User::where('email', $request->email)->where('role',$request->role)
                ->update(['password' => Hash::make($request->password)]);

          DB::table('password_resets')->where(['email'=> $request->email])->delete();
          
           Session::flash('success','Successfully updated your password');
           
          return redirect('/')->with('message', 'Your password has been changed!');

      }
}
