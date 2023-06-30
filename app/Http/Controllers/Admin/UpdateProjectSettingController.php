<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\ProjectSetting;
use App\User;
use Auth;
use Session;

class UpdateProjectSettingController extends Controller
{
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
         
        $setting=ProjectSetting::where('id','=',1)->select('*')->first();
      
        return view('admin.projectsetting.edit',compact('setting'));
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

        $validator = Validator::make($request->all(), [
         'home_nav_first_background'=> 'required',
         'home_nav_second_background'=> 'required',
         'home_nav_font_color'=> 'required',
         'supplier_nav_first_background_and_icon'=> 'required',
         'supplier_nav_second_background'=> 'required',
         'supplier_nav_font_color'=> 'required',
         'service_nav_first_background_and_icon'=> 'required',
         'service_nav_second_background'=> 'required',
         'service_nav_font_color'=> 'required',
         'reno_nav_first_background_and_icon'=> 'required',
         'reno_nav_second_background'=> 'required',
         'reno_nav_font_color'=> 'required',
        'freelancer_nav_first_background_and_icon'=> 'required',
         'freelancer_nav_second'=> 'required',
         'freelancer_nav_font_color'=> 'required',
         'copyright_background'=> 'required',
         'copyright_font_color'=> 'required',
         'facebook_link'=> 'required',
         'instagram_link'=> 'required',
         'youtube_link'=> 'required',
         'pinterest_link'=> 'required',
         'linkedin_link'=> 'required',
         'website_mail'=> 'required',
         'website_name'=> 'required',
         'other_mail'=> 'required',
         'phone'=> 'required',
         'address'=> 'required',
         'user_login_coin'=> 'required',
         'user_register_coin'=> 'required',
         'company_register_coin'=> 'required',
         'quotation_coin'=> 'required',
         'company_login_coin'=> 'required',
        ]);

        if ($validator->fails()) {

            $errors =array('errors'=>$validator->errors()->all());
            return response()->json($errors);
        }else{

        $setting= ProjectSetting::find(1);
        $setting->home_nav_first_background  =$request->home_nav_first_background;
        $setting->home_nav_second_background =$request->home_nav_second_background;
        $setting->home_nav_font_color   =$request->home_nav_font_color;
        $setting->supplier_nav_first_background_and_icon   =$request->supplier_nav_first_background_and_icon;
        $setting->supplier_nav_second_background      =$request->supplier_nav_second_background;
        $setting->supplier_nav_font_color=$request->supplier_nav_font_color;

        $setting->service_nav_first_background_and_icon=$request->service_nav_first_background_and_icon;
        $setting->service_nav_second_background=$request->service_nav_second_background;
        $setting->service_nav_font_color =$request->service_nav_font_color;

        $setting->reno_nav_first_background_and_icon        =$request->reno_nav_first_background_and_icon;
        $setting->reno_nav_second_background     =$request->reno_nav_second_background;
        $setting->reno_nav_font_color     =$request->reno_nav_font_color;

        $setting->freelancer_nav_first_background_and_icon            =$request->freelancer_nav_first_background_and_icon;
        $setting->freelancer_nav_second           =$request->freelancer_nav_second;
        $setting->freelancer_nav_font_color             =$request->freelancer_nav_font_color;
        // $setting->footer_background           =$request->footer_background;
        // $setting->footer_font_color            =$request->footer_font_color;
        $setting->copyright_background           =$request->opyright_background;
        $setting->copyright_font_color             =$request->copyright_font_color;
        $setting->facebook_link               =$request->facebook_link;
        $setting->instagram_link               =$request->instagram_link;
        $setting->youtube_link           =$request->youtube_link;
        $setting->pinterest_link          =$request->pinterest_link;
        $setting->linkedin_link       =$request->linkedin_link;
        $setting->website_mail    =$request->website_mail;
        $setting->website_name           =$request->website_name;
        $setting->other_mail       =$request->other_mail;
        $setting->phone                    =$request->phone;
        $setting->address       =$request->address;
        $setting->user_login_coin    =$request->user_login_coin;
        $setting->user_register_coin           =$request->user_register_coin;
        $setting->company_register_coin       =$request->company_register_coin;
        $setting->quotation_coin       =$request->quotation_coin;
        $setting->company_login_coin                    =$request->company_login_coin;
        $setting->updated_at               =date('Y-m-d H:i:s');
        $setting->member_default_logo        =$request->member_default_logo;
        $setting->freelancer_default_logo     =$request->freelancer_default_logo;
        $setting->service_default_logo        =$request->service_default_logo;
        $setting->supplier_default_logo         =$request->supplier_default_logo;
        $setting->reno_default_logo      =$request->reno_default_logo;
        $setting->service_default_background_image         =$request->service_default_background_image;
        $setting->freelancer_detail_image          =$request->freelancer_detail_image;
        $setting->supplier_default_background_image       =$request->supplier_default_background_image;
        $setting->reno_default_background_image          =$request->reno_default_background_image;
        $setting->service_list_image         =$request->service_list_image;
        $setting->supplier_list_image         =$request->supplier_list_image;
        $setting->reno_list_image        =$request->reno_list_image;
        $setting->freelancer_list_image  =$request->freelancer_list_image;
        $setting->blog_list_image          =$request->blog_list_image ;
         $setting->blog_nav_first_background_and_icon          =$request->blog_nav_first_background_and_icon;
        $setting->blog_nav_second_background          =$request->blog_nav_second_background;
        $setting->blog_nav_font_color          =$request->blog_nav_font_color;
        $setting->admin_default_logo          =$request->admin_default_logo;
        $setting->myanboxtube_list_image      =$request->myanboxtube_list_image;
        $setting->myanboxtube_default_image  = $request->myanboxtube_default_image;
        $setting->member_background_image  = $request->member_background_image;
         if($setting->save())
            {
                Session::flash('success', 'Updated successfully!');
              $success =array('success'=>"Successfully save changes.");
                return response()->json($success);
            }else{
                $errors = array('errors'=>"Something wrong");
                return response()->json($errors);
            }
       }

    }

  
}
