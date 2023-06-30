<?php
namespace App\Http\Controllers\Admin;
use App\Helper\AndCharacterChanger;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Company;
use App\CompanyService;
use Auth;
use Session;
use Redirect;
use URL;
class CompanyServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id=null)
    {  
         if(auth()->user()->role == 2){
           $id=Session::get('login_company_id');
           $page=12;
         }else{
           $id = \Crypt::decrypt($id);
           $page=10;
         }
        $data = $request->all(); 
        $name=$request->name;
        $company_services=CompanyService::where(function($query)use($name){
                if(!empty($name) )                
                $query->where('service_name','like', "%".$name."%");
             })->where('company_id',$id)->orderBy('service_name','desc')->paginate($page);
             if(auth()->user()->role == 2){
             //  myo min added
            $company = Company::Where('id',$id)->with('parent_categories','user','packageplan','package_plan')->first();
            // myo min added end
             return view('backend.company.service.list',compact('company_services','data','name','company'));
             }else{
                  $company=Company::where('id',$id)->with('user')->first();
                 return view('admin.admin.company.service-list',compact('company_services','id','company','data','name')); 
             }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          //  myo min added
            $company = Company::Where('user_id',Auth()->user()->id)->with('parent_categories','user','packageplan','package_plan')->first();
                  
             session()->put('redirect_url', url()->previous());
            // myo min added end
        return view('backend.company.service.add',compact('company'));
    }
    public function createcompanyservicebyadmin($id){
        $id = \Crypt::decrypt($id);
      

         if(is_numeric($id))
         {  
             $company_service = CompanyService::where('id',$id)->first();
            // $company=Company::where('id',$id)->with('user')->first();
             
             $company = Company::Where('id',$id)->with('parent_categories','user','packageplan','package_plan')->first();
             return view('admin.admin.company.new-service',compact('id','company_service','company'));
         }
          
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
         if ($request->image_name == "undefined")
        {
            $request['image_name'] = null;
        }
        else
        {
            $request['image_name'] = $request->image_name;
        }
        
        $status = $this->validation($request);
        if($status->fails())
        {
              $errors =array('errors'=>$status->messages());
             return response()->json($errors); 
        }else{
            
            if(!empty(Session::get('login_company_id'))){
             $company_id= Session::get('login_company_id'); 
            }else{
             $company_id=  $request->company_id;
            }
             
            $service = new CompanyService();
            $service->service_name = $request->name;
            $request_detail = AndCharacterChanger::replaceChar($request->detail);    
            $service->service_detail = $request_detail;
            $service->company_id =  $company_id;
            $service->image_name = $request->image_name;
           if($service->save())
            {  
                 
                 Session::flash('success', 'Created successfully!'); 
                $success = array('success'=>"Created successfully!");
                if(!empty(Session::get('redirect_url'))){
                 $url =Session::get('redirect_url');
                  return response()->json(['url'=>$url,'success'=>$success]);
                } else{
                 $url = url('/admin/company-service/'.$service->company_id);
                  return response()->json(['url'=>$url,'success'=>$success]);
                }
               
               // return response()->json($success);            
            }else{
                $errors = array('errors'=>"Something wrong !");
                return response()->json($errors);
            }
        }
    } 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$page)
    {   
        
        $id = \Crypt::decrypt($id);
        $page = \Crypt::decrypt($page);
       
            if(is_numeric($id))
            {
              Session::put('pageno',$page);
              session::put('edit_redirect_url', url()->previous());
              $company_service = CompanyService::where('id',$id)->first();
              if(auth()->user()->role == 2){
                //  myo min added
                $company = Company::Where('user_id',Auth()->user()->id)->with('parent_categories','user','packageplan','package_plan')->first();
                // myo min added end
               return view('backend.company.service.edit',compact('company_service','company'));
              }else{
                   //  myo min added
                 $company = Company::Where('id',$company_service->company_id)->with('parent_categories','user','packageplan','package_plan')->first();
                // myo min added end
               return view('admin.admin.company.service-edit',compact('company_service','company'));   
              }
            }
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
         if ($request->image_name == "undefined")
        {
            $request['image_name'] = null;
        }
        else
        {
            $request['image_name'] = $request->image_name;
        }
        $status = $this->validation($request);
        if($status->fails())
        {
             $errors =array('errors'=>$status->messages());
             return response()->json($errors); 
        }
        else{
            
            $old_image = $request->old_image; 
            $service = CompanyService::where('id',$id)->first();
            $service->service_name = $request->name;
            
            $request_detail = AndCharacterChanger::replaceChar($request->detail);    
            $service->service_detail = $request_detail;
            $service->image_name = $request->image_name;
           if($service->save())
            {
                 if( $request->image_name != $request->old_image){
                  if(Storage::disk('public')->exists('/service/'.$old_image))
                  unlink(storage_path('app/public/service/'.$old_image));
                 }
                  Session::flash('success', 'Updated Successfully!'); 
                $success = array('success'=>"Updated Successfully!");
                 if(auth()->user()->role == 2){
                   $url =Session::get('edit_redirect_url');
                  return response()->json(['url'=>$url,'success'=>$success]);  
                 }else{
                   return response()->json($success);  
                 }
                 
            }else
            {
                $errors = array('errors'=>"Something wrong !");
                return response()->json($errors);
            }
        }    
    } 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $service = CompanyService::findOrFail($id);
          if($service->image_name != null){
          if(Storage::disk('public')->exists('/service/'.$service->image_name)){
             unlink(storage_path('app/public/service/'.$service->image_name));
           }
          }
        if($service->delete())
            $request->session()->flash('process_success', 'Deleting Process Successfully completed.');
        else
            $request->session()->flash('process_fail', 'Deleting Process Fail.');
         return Redirect::back();
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminservicedestroy(Request $request,$id,$company_id)
    {
        $service = CompanyService::findOrFail($id);
         if($service->image_name != null){
        if(Storage::disk('public')->exists('/service/'.$service->image_name))
            unlink(storage_path('app/public/service/'.$service->image_name));
         }
        if($service->delete())
            $request->session()->flash('process_success', 'Deleting Process Successfully completed!');
        else
            $request->session()->flash('process_fail', 'Deleting Process Fail!');
        return Redirect::back();
    }
    /**
     * Validate the resource of storage.
     *
     * @return validator whether correct or fail.
     */
     
    private function validation($request)
    {
        $messages = [
            'name.required' => 'Service Title is required',
            'image_name.required' => 'Service Photo is required',
        ];

        $validator = Validator::make($request->all(), [
            'image_name' => 'required',
                'name' => "required"
            ], $messages);
        return $validator;  
    }
    
     public function storesession(Request $request){
        //dd($request->id);exit();
          Session::put('servicecheck',$request->ids);
        
    }
    public function deleteall(Request $request){
        $ids = $request->ids;
        foreach( $ids as $id){
           CompanyService::where('id','=',$id)->delete();
        }
         Session::flash('success', 'Deleted successfully!');
        $success = array('success'=>"Successfully delete!");
                return response()->json($success);  
        
    }

}
