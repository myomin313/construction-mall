<?php

namespace App\Http\Controllers\Admin;
use App\Helper\AndCharacterChanger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Aboutus;
use App\Aboutusheader;
use Session;
use DB;
use Auth;

class AboutusController extends Controller
{
  
   public function getAboutUs(){
         $aboutus = Aboutusheader::where('id',1)->first();
         $joins = Aboutus::where('type','=','join')->get();
         $targets = Aboutus::where('type','=','target')->get();
     return view('admin.about-us.about-us',compact('joins','targets','aboutus'));  
   }
    
    public function editAboutusByAdmin(){
        $aboutusheader=DB::table('main_about_us')->where('id',1)->first();
         $joins = Aboutus::where('type','=','join')->get();
         $targets = Aboutus::where('type','=','target')->get();
         return view('admin.about-us.edit-aboutus',compact('aboutusheader','joins','targets'));
    }
    
      public function updateAboutUs(Request $request){
               $status = $this->validation($request);
        if($status->fails())
        {
             $errors =array('errors'=>$status->messages());
             return response()->json($errors);  
        }
        else{
             $this->addJoinPhoto($request);
        $this->addtargetPhoto($request);
        $aboutus =Aboutusheader::where('id',1)->first();
        $aboutus->header=$request->header;
        $aboutus->header_description = $request->header_description;
        $aboutus->video = $request->video;
        $aboutus->header_background_color = $request->header_background_color;
        $aboutus->header_font_color = $request->header_font_color;
        $aboutus->ready_to_get_start=$request->ready_to_get_start;
        $aboutus->sign_up_today = $request->sign_up_today;
        $aboutus->footer_background_color = $request->footer_background_color;
        $aboutus->footer_font_color = $request->footer_font_color;
        $aboutus->updated_at  = date('Y-m-d H:i:s');
        if($aboutus->save())
        {                
              Session::flash('success', 'Updated successfully!'); 
            $success = array('success'=>"Successfully saved Changes!");
            return response()->json($success);            
        }else{
            $errors = array('errors'=>"Something wrong!");
            return response()->json($errors);
        }
        }
        
      }
      
    //   start
       
    private function addJoinPhoto($request)
    { 
        if(empty($request->join_photo_arr)) return false;
        $join_photo_arr = (json_decode($request->join_photo_arr)); 
        foreach($join_photo_arr as $key => $value)
        {
             if(empty($value)) continue;
              $aboutus =Aboutus::where('id',$value->join_id)->first();
              $description = AndCharacterChanger::replaceChar($value->description);
              $aboutus->description=$description;
              $aboutus->title = $value->title;
              $aboutus->btn_text = $value->btn_text;
              $aboutus->image = $value->image;
              $aboutus->updated_at  = date('Y-m-d H:i:s');
              $aboutus->save();
        }

    }
    private function addtargetPhoto($request)
    { 
        if(empty($request->target_photo_arr)) return false;
        $target_photo_arr = (json_decode($request->target_photo_arr));
        foreach($target_photo_arr as $key => $value)
        {
           if(empty($value)) continue;
             $aboutus = Aboutus::where('id',$value->target_id)->first();
              $aboutus->description=$value->description;
              $aboutus->title = $value->title;
              $aboutus->image = $value->image;
              $aboutus->updated_at  = date('Y-m-d H:i:s');
              $aboutus->save();
        }

    }
      public function uploadAboutUsPhoto(Request $request){

        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';  
        $path  = storage_path('app/public/setting/'.$image_name);
        file_put_contents($path, $image);

      return response()->json(['status'=>true,'image_name'=>$image_name]);

    }
     public function uploadAboutVideoPhoto(Request $request){
        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
        // $path  = storage_path('app/public/user/'. $image_name);
        $image_store_path = $request->path;
       
        $path  = storage_path('app/public/setting/'.$image_name);
         //Storage::disk('local')->put('freelancer/'.$image_name, 'Contents');

        file_put_contents($path, $image);
        // $image_name = explode('images/upload/', $path);
       
         $data=Aboutusheader::where('id',1)
            ->update(['about_us_image'=>$image_name]);
       
        return response()->json(['status'=>true,'image_name'=>$image_name]);
    }
    
    private function validation($request)
    {
        $messages = [
            'header.required' => 'Header is required',
            'header_description.required' => 'Header Description is required', 
        ];

        $validator = Validator::make($request->all(), [
                'header' => "required",
                'header_description'=>"required", 
            ], $messages);
        return $validator;  
    }
}
