<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\TermsOfService;
use Session;
use DB;
use Auth;

class TermsServiceController extends Controller
{
  
   public function termOfServiceViewByAdmin(){     
      $termsofservice = TermsOfService::where('id',1)->first();  
       return view('admin.termsofservice.termsofservice',compact('termsofservice'));
   }
    public function editTermOfServiceByAdmin(Request $request){

        $termsofservice = TermsOfService::where('id',1)->first();
        return view('admin.termsofservice.edit',compact('termsofservice'));
    }
     public function updateTermsOfService(Request $request){
          
          $request->validate([
            'header' => 'required'
        ]);
        
       $termsofservice = TermsOfService::where('id',1)->first();
       $termsofservice->termsOfService=$request->termsOfService;
       $termsofservice->header = $request->header;
       $termsofservice->save();
       
         return redirect('terms-of-service/edit')
                        ->with('success','Updated Successfully!');
       
     }
       public function uploadtermsofservicePhoto(Request $request){
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
       
         $data=TermsOfService::where('id',1)
            ->update(['header_image'=>$image_name]);
       
        return response()->json(['status'=>true,'image_name'=>$image_name]);
    }
}
