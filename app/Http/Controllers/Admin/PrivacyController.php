<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Privacy;
use Session;
use DB;
use Auth;

class PrivacyController extends Controller
{
  
   public function privacyViewByAdmin(){     
      $privacy = Privacy::where('id',1)->first();  
       return view('admin.privacy.privacy',compact('privacy'));
   }
   public function editPrivacyByAdmin(Request $request){

       // Privacy::where('id',1)
       //         ->update(['privacy']);
        
       $privacy = Privacy::where('id',1)->first();
       return view('admin.privacy.edit',compact('privacy'));
   }
   public function updatePrivacy(Request $request){
       
 $request->validate([
            'privacy_header' => 'required'
        ]);
     $privacy = Privacy::where('id',1)->first();
     $privacy->privacy=$request->privacy;
     $privacy->privacy_header = $request->privacy_header;
     $privacy->save();

     return redirect('privacy/edit')->with('success','Updated Successfully!');
   }
   public function uploadPrivacyPhoto(Request $request){
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
       
         $data=Privacy::where('id',1)
            ->update(['header_image'=>$image_name]);
       
        return response()->json(['status'=>true,'image_name'=>$image_name]);
    }
}
