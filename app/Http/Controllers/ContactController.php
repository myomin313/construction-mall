<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\contactUs;
use App\ProjectSetting;
use App\CompanyAdvertisingPlan;
use DB;
class ContactController extends Controller
{

	public function contactUs(){
		$projectsetting=ProjectSetting::find(1);
    //  $logo_slider_companies = CompanyAdvertisingPlan::with('companies','companies.user')->where('id','=',5)->first();
     
     $logo_slider_companies = app('App\Http\Controllers\HomeController')->logo_slider();
        return view('frontend.contact-us',compact('projectsetting','logo_slider_companies'));

    }
    public function sendcontactUs(Request $request){

        
        $validator = Validator::make($request->all(), [
         'name'=> 'required',
         'email'=> 'required|email',
         'phone'=> 'required',
         'title'=> 'required',
         'description'=> 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/contact')
                        ->withErrors($validator)
                        ->withInput();
        }

        $contact=new contactUs;
        $contact->name          =$request->name;
        $contact->email         =$request->email;
        $contact->phone         =$request->phone;
        $contact->description   =$request->description;
        $contact->title         =$request->title;
         if($contact->save())
            {
            	  $this->contactByCustomerForContactFeedback($request);
                return redirect("/contact-us");
            }else
            {
                $errors = array('errors'=>"Something wrong");
                return $errors;
            }
  

    }
     private  function contactByCustomerForContactFeedback($data=  []){
          $projectsetting = ProjectSetting::find(1);
           $mail          = $projectsetting->website_mail;
          \Mail::send('mail.contact-data',['data' =>$data],function($message) use($data,$mail){
              $message->from($data['email'],$data['name']);
              $message->to($mail);
              $message->subject($data['message']);
          });

    }
}