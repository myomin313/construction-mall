<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Advertisewithus;
use App\AdvertiseWithUsHeader;
use Session;
use DB;
use Auth;

class AdvertisewithusController extends Controller
{
  
   public function advertisewithusViewByAdmin(){
      $sponsors = Advertisewithus::where('type','=','sponsor')->get();
      $benefits = Advertisewithus::where('type','=','benefit')->get();
      $advertisewithus =AdvertiseWithUsHeader::where('id',1)->first();
       return view('admin.advertise-with-us.advertise-with-us',compact('sponsors','benefits','advertisewithus'));
   }
    public function editAdvertiseWithUsByAdmin(Request $request){
        
        $sponsors = Advertisewithus::where('type','=','sponsor')->get();
        $benefits = Advertisewithus::where('type','=','benefit')->get();
        $advertisewithus = AdvertiseWithUsHeader::where('id',1)->first();
        return view('admin.advertise-with-us.edit-advertisewithus',compact('advertisewithus','sponsors','benefits'));
    }
      public function updateAdvertiseWithUsfooterByAdmin(Request $request){
        
       $advertisewithusfooter =AdvertiseWithUsHeader::where('id',1)->first();
       $advertisewithusfooter->analyse_customer_data_header =$request->analyse_customer_data_header;
       $advertisewithusfooter->analyse_description  = $request->analyse_description ;
       $advertisewithusfooter->btn_text  = $request->btn_text;
       $advertisewithusfooter->advertise_with_us  = $request->advertise_with_us;
       $advertisewithusfooter->call_now  = $request->call_now;
       $advertisewithusfooter->call_now_phone  = $request->call_now_phone;
       $advertisewithusfooter->call_now_background_color  = $request->call_now_background_color;
       $advertisewithusfooter->call_now_font_color  = $request->call_now_font_color;
       $advertisewithusfooter->updated_at  = date('Y-m-d H:i:s');
       $advertisewithusfooter->save();
       
       return redirect()->back();
         
     }
     public function updateAdvertiseWithUsmiddleByAdmin(Request $request){
        
       $advertisewithus =AdvertiseWithUsHeader::where('id',1)->first();
       $advertisewithus->benefit_header =$request->benefit_header;
       $advertisewithus->benefit_bradcrumb  = $request->benefit_bradcrumb;
       $advertisewithus->updated_at  = date('Y-m-d H:i:s');
       $advertisewithus->save();
       
       return redirect()->back();
         
     }
    
    public function editAdvertiseWithUsBenefitByAdmin(Request $request){

        $advertisewithus = Advertisewithus::where('id',$request->id)->first();
        return view('admin.advertise-with-us.edit-benefit',compact('advertisewithus'));
    }
   public function advertisewithusSponsorViewByAdmin(Request $request){

       $sponsors = Advertisewithus::where('type','=','sponsor')->get();
        return view('admin.advertise-with-us.sponsor',compact('sponsors'));
    }
    public function advertisewithusBenefitsViewByAdmin(){
       $benefits = Advertisewithus::where('type','=','benefit')->get();
        return view('admin.advertise-with-us.benefits',compact('benefits'));
    }
    
     
     public function updateAdvertiseWithUsByAdmin(Request $request){
       
            $status = $this->validation($request);
        if($status->fails())
        {
             $errors =array('errors'=>$status->messages());
             return response()->json($errors);  
        }
        else{
              $advertisewithus =AdvertiseWithUsHeader::where('id',1)->first();
       $advertisewithus->header_image =$request->header_image;
       $advertisewithus->analyse_image =$request->analyse_image;
       $advertisewithus->text_header =$request->text_header;
       $advertisewithus->breadcrump = $request->breadcrump;
       $advertisewithus->why_myanbox = $request->why_myanbox;
       $advertisewithus->myanbox_dec  = $request->myanbox_dec;
       $advertisewithus->analyse_customer_data_header =$request->analyse_customer_data_header;
       $advertisewithus->analyse_description  = $request->analyse_description ;
       $advertisewithus->btn_text  = $request->btn_text;
       $advertisewithus->advertise_with_us  = $request->advertise_with_us;
       $advertisewithus->call_now  = $request->call_now;
       $advertisewithus->call_now_phone  = $request->call_now_phone;
       $advertisewithus->call_now_background_color  = $request->call_now_background_color;
       $advertisewithus->call_now_font_color  = $request->call_now_font_color;
       $advertisewithus->benefit_header =$request->benefit_header;
       $advertisewithus->benefit_breadcrumb  = $request->benefit_breadcrumb;
       $advertisewithus->updated_at  = date('Y-m-d H:i:s');
       $advertisewithus->save();
        $this->addSponsorPhoto($request);
        $this->addBenefitPhoto($request);
            Session::flash('success', 'Updated successfully!'); 
                    $success = array('success'=>"Updated success!");
                    return response()->json($success); 
        }
     
          
     } 
    //  start
     private function addSponsorPhoto($request)
    {     
        if(empty($request->sponsor_photo_arr)) return false;
        $sponsor_photo_arr = (json_decode($request->sponsor_photo_arr));           
        foreach($sponsor_photo_arr as $key => $value)
        {
            if(empty($value)) continue;
           $advertisewithus=Advertisewithus::where('id',$value->sponsor_id)->first();
           $advertisewithus->img =$value->img;
           $advertisewithus->title =$value->title;
           $advertisewithus->description =$value->description;
           $advertisewithus->btn_text = $value->btn_text;
           $advertisewithus->type = 'sponsor';
           $advertisewithus->save();
           
        }
    }
    private function addBenefitPhoto($request)
    { 
        $rows = [];
        if(empty($request->benefit_photo_arr)) return false;
        $benefit_photo_arr = (json_decode($request->benefit_photo_arr));           
        foreach($benefit_photo_arr as $key => $value)
        {
           if(empty($value)) continue;
           $advertisewithus=Advertisewithus::where('id',$value->benefit_id)->first();;
           $advertisewithus->img =$value->img;
           $advertisewithus->title =$value->title;
           $advertisewithus->description =$value->description;
           $advertisewithus->type = 'benefit';
           $advertisewithus->save();
        }

    }
     public function updateAdvertiseWithUsBenefit(Request $request,$id){
       $advertise = Advertisewithus::where('id',$id)->first();
       $advertise->description=$request->description;
       $advertise->title = $request->title;
       $advertise->img = $request->img;
          if($advertise->save())
            {                
                $success = array('success'=>"Successfully saved Changes.");
                return response()->json(['success'=>$success,'type'=>$advertise->type]);            
            }else
            {
                $errors = array('errors'=>"Something wrong");
                return response()->json($errors);
            }
     }
      public function uploadAdvertiseWithUsPhoto(Request $request){

        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';   
        $path  = storage_path('app/public/setting/'.$image_name);
        file_put_contents($path, $image);
        return response()->json(['status'=>true,'image_name'=>$image_name]);
    }
      public function uploadAdvertiseHeaderPhoto(Request $request){
        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
        $image_store_path = $request->path;
       
        $path  = storage_path('app/public/setting/'.$image_name);

        file_put_contents($path, $image);
       
         $data=AdvertiseWithUsHeader::where('id',1)
            ->update(['header_image'=>$image_name]);
       
        return response()->json(['status'=>true,'image_name'=>$image_name]);
    }
     public function uploadAdvertiseWithUsAnalysePhoto(Request $request){
        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
        $image_store_path = $request->path;
       
        $path  = storage_path('app/public/setting/'.$image_name);

        file_put_contents($path, $image);
       
         $data=AdvertiseWithUsHeader::where('id',1)
            ->update(['analyse_image'=>$image_name]);
       
        return response()->json(['status'=>true,'image_name'=>$image_name]);
    }
    
     private function validation($request)
    {
        $messages = [
            'text_header.required' => 'Text Header is required',
            'breadcrump.required' => 'Bread Crump is required', 
            'why_myanbox.required' => 'Why myanbox is required', 
             'myanbox_dec.required' => 'myanbox description is required', 
        ];

        $validator = Validator::make($request->all(), [
                'text_header' => "required",
                'breadcrump'=>"required", 
                 'why_myanbox'=>"required",
                 'myanbox_dec'=>"required",
            ], $messages);
        return $validator;  
    }
   
}
