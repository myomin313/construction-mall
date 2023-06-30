<?php

namespace App\Http\Controllers\Admin;
use App\Helper\AndCharacterChanger;
use App\Helper\AllHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\PackagePlan;
use App\Location;
use App\Company;
use App\User;
use App\Category;
use App\CompanyProduct;
use App\CompanyProject;
use App\CompanyService;
use App\CompanyCategory;
use App\Quotation;
use App\UserCoin;
use App\BusinessDay;
use App\CompanyPackagePlan;
use App\Imports\UsersImport;
use Auth;
use Hash;
use Session;
use DB;
use Excel;
use Carbon\Carbon;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
   
   public function  Dashboard(){
           $url = URL :: previous();
           $route = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
           if(($route == 'company.send_quotation_form' || $route =='send_quotation_detail_form') && Session::has('quotation_data')) {
               Session::forget('quotation_data');
           }
           $user_id = Auth::user()->id;
           $user = User::where('id',$user_id)->first();
            $company = Company::Where('user_id',$user_id)->with('parent_categories','user','packageplan','package_plan')->first();
             $this->sessionStore($company);
            $project_count = CompanyProject::where('company_id',$company->id)->count();
            $product_count = CompanyProduct::where('company_id',$company->id)->count();
            $service_count = CompanyService::where('company_id',$company->id)->count();
            $companypackageplan=$company->package_plan()->where('approve','Success')->count();
            $count_arr = array();
            $requested_quotation_count = Quotation::with(['user'])->where('quotations.send_user_id',Auth::user()->id)->count();
            
            $recent_request_quote = Quotation::with(['user','category','range'])->where('quotations.send_user_id',Auth::user()->id)->orderBy('id','desc')->limit(5)->get();

            $received_quotation_pending = Company::with(['received_quotation'=>function($q){
                $q->where('quotation_received_companys.received_status','Pending')->limit(5)->orderBy('id','desc')->get();
             },'received_quotation.category','received_quotation.range','received_quotation.send_user'])->where('id',$company->id)->first();
             
            $received_quotation_success = Company::with(['received_quotation'=>function($q){
                $q->where('quotation_received_companys.received_status','Received')->limit(5)->orderBy('id','desc')->get();
             },'received_quotation.category','received_quotation.range','received_quotation.send_user'])->where('id',$company->id)->first();
             
            $received_quotation = Company::with(['received_quotation'])->where('id',$company->id)->first();
            $active_plan="";
           
            // if(Session::get('package_end_date')> date('Y-m-d')){
            //     $active_plan = $company->packageplan->name;
            // }
            // else{
            //     $active_plan = "Free";
            // }
            array_push($count_arr, array('project_count'=>$project_count,'product_count'=>$product_count,'service_count'=>$service_count,
                'company_package_plan_count'=>$companypackageplan,'requested_quotation_count'=>$requested_quotation_count,
                'received_quotation_success'=>$received_quotation_success->received_quotation->count(),
                'received_quotation_pending'=>$received_quotation_pending->received_quotation->count(),
                'received_quotation'=>$received_quotation->received_quotation->count(),'left_coin'=>$user->left_coin,'view_count'=>$company->view_count,
                'active_plan_name'=>$active_plan));
                
            return view('backend.company.dashboard',compact('count_arr','received_quotation_success','received_quotation_pending','recent_request_quote','company'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function companyCoverCrop(Request $request){
       $image = $request->image;
       $id =$request->id;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
        $image_store_path = $request->path;
        $path  = storage_path('app/public/'.$image_store_path.'/'.$image_name);

        file_put_contents($path, $image);
        // $image_name = explode('images/upload/', $path);
      $data=Company::where('id',$id)
           ->update(['cover_photo'=>$image_name]);
        return response()->json(['status'=>true,'image_name'=>$image_name]);

    }
    public function index()
    {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Respons
     */
    public function profile()
    {
        
        $id = Session::get('login_company_id');
        $user_id = Auth::user()->id;
        
        $company=Company::where('id',$id)->where('is_active','1')->with(['user','user.coin_plan','location','categories','parent_categories','child_categories','packageplan','businessDay'])->first();

        $business_day_list = [];
        $business_opening_hour = [];
        $business_closing_hour = [];
        foreach($company->businessDay as $business_day){
            array_push($business_day_list,$business_day->id);
            $business_opening_hour['opening_hour'.$business_day->id] = $business_day->pivot->opening_hour;
            $business_closing_hour['closing_hour'.$business_day->id] = $business_day->pivot->closing_hour;
        }
        $business_days = BusinessDay::select('id','name')->get();
          $this->sessionStore($company);
        $used_coin = Company::request_quotation($user_id);
        if(!empty($company->location->parent_id)){
        $city = Location::where('id',$company->location->parent_id)->first();
        }else{
        $city = null;
        }// start
        
        //  if(Session::get('package_end_date')> date('Y-m-d')){
        //         $active_plan = $company->packageplan->name;
        //     }
        //     else{
        //         $active_plan = "Free";
        //     }
         foreach($company->parent_categories as $parentcate){
            
            $parent_category_id =  $parentcate->id;
             $categories = Category::where('parent_id','=',$parentcate->id)->where('is_active','1')->get();
        }
        $category_arr =[];
        foreach ($company->categories as $category) {
            array_push($category_arr, $category->id);
        }
        
        if(!empty($company->location->parent_id)){
          $company_city =  Location::where('id',$company->location->parent_id)->first();
        }else{
          $company_city = null;  
        }
        
         $company_products=CompanyProduct::where('company_id',$id)->orderBy('product_name','desc')->get();
        //  $company_projects=CompanyProject::where('company_id',$id)->orderBy('project_name','desc')->with('range','projectType')->get();
         
         $company_projects = CompanyProject::leftjoin('project_photos','project_photos.company_project_id','=','company_projects.id')->where('company_id',$id)->select('company_projects.*','project_photos.photo')->groupBy('company_projects.id')->orderBy('project_name','desc')->get();
             
          $company_services=CompanyService::where('company_id',$id)->orderBy('service_name','desc')->get();
        // end
        
        return view('backend.company.profile',compact('company','business_days','city','used_coin','company_products','company_projects','company_services','category_arr','company_city','categories','business_day_list','business_opening_hour','business_closing_hour'));    
    }
    
    
    public function viewcompanyprofilebyadmin($id,$pageno){ 
         $id = \Crypt::decrypt($id);
        $pageno = \Crypt::decrypt($pageno);
        
         if(is_numeric($id))
         {
             Session::put('page',$pageno);
        
         $company=Company::where('id',$id)->with(['user','user.coin_plan',
          'location','parent_categories','categories','child_categories','packageplan'])->first();
        $used_coin = Company::request_quotation($id);
        if(!empty($company->location->parent_id)){
        $city = Location::where('id',$company->location->parent_id)->first();
        }else{
        $city = null;
        }
        foreach ($company->parent_categories as $parent) {
                Session::put('parent_category_id',$parent->id);
            }
          $selected_company = User::select('name','coin','left_coin')->where('id',$company->user_id)->first();
          return view('admin.admin.company.profile',compact('company','city','used_coin','selected_company','id','pageno'));
         }
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $company=Company::where('user_id',Auth::user()->id)->with('user','location.parent','categories','child_categories','parent_categories','businessDay')->first();
         $business_day_list = [];
        $business_opening_hour = [];
        $business_closing_hour = [];
        foreach($company->businessDay as $business_day){
            array_push($business_day_list,$business_day->id);
            $business_opening_hour['opening_hour'.$business_day->id] = $business_day->pivot->opening_hour;
            $business_closing_hour['closing_hour'.$business_day->id] = $business_day->pivot->closing_hour;
        }
        $business_days = BusinessDay::select('id','name')->get();


         $this->sessionStore($company);
         foreach($company->parent_categories as $parentcate){
            
            $parent_category_id =  $parentcate->id;
             $categories = Category::where('parent_id','=',$parentcate->id)->where('is_active','1')->get();
        }
        $category_arr =[];
        foreach ($company->categories as $category) {
            array_push($category_arr, $category->id);
        }
        
        if(!empty($company->location->parent_id)){
          $company_city =  Location::where('id',$company->location->parent_id)->first();
        }else{
          $company_city = null;  
        }
        return view("backend.company.edit",compact('company','business_days','company_city','categories','category_arr','parent_category_id','business_day_list','business_opening_hour','business_closing_hour'));
    }
    
    private function sessionStore($company)
    {
         if(strtotime(Carbon::now()) > strtotime($company->package_plan->max('pivot.end_date'))){
            $company->active_package_plan_id = 1;
            $company->save();
        }
         foreach ($company->package_plan as $packageplan) {
           if($packageplan->pivot->package_plan_id == $company->active_package_plan_id &&
               !empty($packageplan->pivot->end_date) && !empty($packageplan->pivot->start_date))
           {
            Session::put('package_start_date',$packageplan->pivot->start_date);
            Session::put('package_end_date',$packageplan->pivot->end_date);
            }
        }
        //myo min start
        if(Session::get('package_end_date')> date('Y-m-d')){
              //  $active_plan = $company->packageplan->name;
              Session::put('active_package_plan_id',$company->active_package_plan_id);
              Session::put('active_package_plan_name',$company->packageplan->name);
         }else{
              Session::put('active_package_plan_id',1);
              Session::put('active_package_plan_name','Free');
               // $active_plan = "Free";
         }
        //myo min end
        Session::put('login_company_id',$company->id);
        Session::put('facebook',$company->facebook);
        Session::put('googleplus',$company->googleplus);
        Session::put('twitter',$company->twitter);
        Session::put('linkedin',$company->linkedin);
        foreach ($company->parent_categories as $parent) {
            Session::put('parent_category_id',$parent->id);
        }
        
    }
     public function editcompanybyadmin($id)
    {   
        $id = \Crypt::decrypt($id);
       

         if(is_numeric($id))
         {
            // $id = Session::get('login_company_id');
        //$parent_category_id = Session::get('parent_category_id');
        // dd($parent_category_id);exit();
        // $categories = Category::where('parent_id','=',$parent_category_id)->where('is_active','1')->get();
        $company=Company::where('id',$id)->where('is_active','1')->with('user','location','categories','child_categories','parent_categories','businessDay')->first();
        $business_day_list = [];
        $business_opening_hour = [];
        $business_closing_hour = [];
        foreach($company->businessDay as $business_day){
            array_push($business_day_list,$business_day->id);
            $business_opening_hour['opening_hour'.$business_day->id] = $business_day->pivot->opening_hour;
            $business_closing_hour['closing_hour'.$business_day->id] = $business_day->pivot->closing_hour;
        }
        $business_days = BusinessDay::select('id','name')->get();

       
        foreach($company->parent_categories as $parentcate){
            
            $parent_category_id =  $parentcate->id;
             $categories = Category::where('parent_id','=',$parentcate->id)->where('is_active','1')->get();
        }
        $category_arr =[];
        foreach ($company->categories as $category) {
            array_push($category_arr, $category->id);
        }
        
        if(!empty($company->location->parent_id)){
          $company_city =  Location::where('id',$company->location->parent_id)->first();
        }else{
          $company_city = null;  
        }
        return view("admin.admin.company.edit",compact('company','company_city','categories','category_arr','parent_category_id','business_days','business_day_list','business_opening_hour','business_closing_hour'));

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
             
        switch ($request->information_type) {
            case 'basic':
                $messages=$this->changeCompanyBasicInformation($request,$id);
                return response()->json($messages);
             break;
            case 'cover_photo';
                $messages=$this->changeCoverPhoto($request,$id);
                return response()->json($messages);
            case 'account':
                $messages = $this->changePassword($request,$id);
                return response()->json($messages);
                break;
            case 'social':
                $messages = $this->changeCompanySocialInformation($request,$id);
                return response()->json($messages);
                break;
            default:
                echo 'There is no nothing to change';
                break;
        }  
    }
    public function changeCompanyBasicInformation($request,$id)
    {
        $status = $this->validation($request);
        if($status->fails())
        {
            /* $errors =array('errors'=>$status->errors()->all());
            return $errors;  */
            
                 $errors =array('errors'=>$status->messages());
                  return $errors;     
              
        }
        else{  
            
           
            $company = Company::where('id',$id)->where('is_active','1')->with('user')->first();
            $company->email = $request->email;
            $company->phone  = $request->phone;
            $company->location_id = $request->township;
            $company->address = $request->address;
            // $company->business_opening_hours = $request->business_opening_hours;
            // $company->business_closing_hours = $request->business_closing_hours;
            // $company->business_days = $request->business_days;
            $company->website = $request->website;
            $company->description = $request->description;
            $vission = AndCharacterChanger::replaceChar($request->vission);
            $company->vission = $vission;
            $service = AndCharacterChanger::replaceChar($request->service);
            $company->service = $service;
            $mission = AndCharacterChanger::replaceChar($request->mission);
            $company->mission = $mission;
            /* Edit Company name */
             $name=$request->name;
             if($company->save())
            {
                $company->user()->update(['name'=>$name]);
                $this->changeCompanyCategory($request,$id);
                
                Session::flash('success', 'Successfully updated company basic information!');
                $success = array('success'=>"Successfully changes!");
                return $success;
            }else
            {
                $errors = array('errors'=>"Something wrong!");
                return $errors;
            }
        }  
    }
    
    public function profile_update(Request $request, $id)
    {
         
        $errors = $this->businessDayValidation($request);
        $status = $this->profile_validation($request);
        if ($status->fails()) {
            $input_errors['input_errors'] =array('errors'=>$status->messages());
            $errors = array_merge($errors, $input_errors);
        }
        if ($errors) {
            return response()->json($errors);
        }
            
           
            $company = Company::where('id',$id)->where('is_active','1')->with('user')->first();
            $company->email = htmlspecialchars($request->email);
            $company->phone  = htmlspecialchars($request->phone);
            $company->location_id = htmlspecialchars($request->township);
            $company->address = htmlspecialchars($request->address);
            $company->business_opening_hours = htmlspecialchars($request->business_opening_hours);
            $company->business_closing_hours = htmlspecialchars($request->business_closing_hours);
            $company->business_days = htmlspecialchars($request->business_days);
            $company->website = htmlspecialchars($request->website);
            $company->description = $request->description;
            $vission = AndCharacterChanger::replaceChar($request->vission);
            $company->vission = $vission;
            $service = AndCharacterChanger::replaceChar($request->service);
            $company->service = $service;
            $mission = AndCharacterChanger::replaceChar($request->mission);
            $company->mission = $mission;
            $company->facebook   = htmlspecialchars($request->facebook);
            $company->googleplus = htmlspecialchars($request->googleplus);
            $company->twitter  = htmlspecialchars($request->twitter);
            $company->linkedin = htmlspecialchars($request->linkedin);
            /* Edit Company name */
             $name=$request->name;
             if($company->save())
            {
                $company->user()->update(['name'=>$name]);
                $this->changeCompanyCategory($request,$id);
                $this->checkBusinessDay($request,$company);

                $id = \Crypt::encrypt($company->id);
                $pageno = \Crypt::encrypt(Session::get('pageno'));
                Session::flash('success', 'Updated successfully!');
                $success = array('success'=>"Updated successfully!",
                    'company_id'=>$id,'pageno'=>$pageno);
                return $success;
            }else
            {
                $errors = array('errors'=>"Something wrong!");
                return $errors;
            }
    }
   
   public function changeCoverPhoto(Request $request, $id)
    {

         $company = Company::where('id',$id)->where('is_active','1')->with('user')->first();
         $company->cover_photo = $request->cover_photo;
          if($company->save())
            {   
                 
                $company->user()->update(['logo'=>$request->logo]);
                if($request->cover_photo != $request->old_cover_photo){
                 if(Storage::disk('public')->exists('/company_coverphoto/'.$request->old_cover_photo))
                  unlink(storage_path('app/public/company_coverphoto/'.$request->old_cover_photo));
                }
                if($request->logo != $request->old_logo){ 
                    if(Storage::disk('public')->exists('/company_logo/'.$request->old_logo))
                  unlink(storage_path('app/public/company_logo/'.$request->old_logo));
                }
                $success = array('success'=>"Successfully changed cover photo!");
                return $success;
            }else
            {
                $errors = array('errors'=>"Something wrong");
                return $errors;
            }
            
    }
    public function changePassword(Request $request,$id)
    {
        $status = $this->validation($request);
        if($status->fails())
        {
            /*$errors =array('errors'=>$status->errors()->all());
            return $errors;   */
            
             $errors =array('errors'=>$status->messages());
                  return $errors; 
         }
        else{
            $old_password = $request->old_password;
            $new_password = $request->new_password;
          //  $current= Auth::user()->password;
          //  if(Hash::check($old_password,$current))
          //  {
                $user_id =Auth::user()->id;
                $change_pwd_user=User::find($user_id);
                $change_pwd_user->password = Hash::make($new_password);
                $change_pwd_user->save();
                 Session::flash('success', 'Successfully updated!');
                $success = array('success'=>"Successfully updated!");
                return $success;             
           //}
             //  else
           // {
              //  $errors = array('errors'=>"Old password is wrong!");
             //   return $errors;            
          //  }       
        }
    }
    public function changeCompanySocialInformation($request,$id)
    {
        $status = $this->validation($request);
        if($status->fails())
        {   
           /*$errors =array('errors'=>$status->errors()->all());
            return $errors;   */
            
              $errors =array('errors'=>$status->messages());
                  return $errors; 
        }
        else{
            $company = Company::where('id',$id)->where('is_active','1')->first();
            $company->facebook   = $request->facebook;
            $company->googleplus = $request->googleplus;
            $company->twitter  = $request->twitter;
            $company->linkedin = $request->linkedin;
            if($company->save())
            {
                 Session::flash('success', 'Successfully updated social information!'); 
                $success = array('success'=>"Successfully changes!");
                return $success;
            }else
            {
                $errors = array('errors'=>"Something wrong!");
                return $errors;
            }

        }
    }
     public function changeCompanyCategory($request,$company_id)
    {

        DB::table('category_company')->where('company_id',$company_id)->whereNotIn('category_id', [1,2,3])->delete(); 
        $rows = [];
        //if no meta input found
        if(empty($request->category)) return false;
        foreach($request->category as $value)
        {
            if(empty($value)) continue;
            $rows[] = ['category_id' => $value , 'company_id' =>$company_id,
            'created_by' =>Session::get('login_company_id'),'updated_by'=>Session::get('login_company_id'),
            'created_at'=>date("Y-m-d H:m:i"),'updated_at'=>date("Y-m-d H:m:i")];
        }
        //if no meta data to insert
        if(empty($rows)) return false;
        DB::table('category_company')->insert($rows);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function imageCrop(Request $request){
        $image = $request->image;
        $image_store_path = $request->path;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
        $path  = storage_path('app/public/'.$image_store_path.'/'.$image_name);
        file_put_contents($path, $image);
        $image_name = explode('app/public/'.$image_store_path.'/', $path);
        return response()->json(['status'=>true,'image_name'=>$image_name[1],'path'=>$path]);
    }
    private function checkBusinessDay($request,$company){
        //if no meta input found
        if(empty($request->business_days)) return false;
        $business_days = (json_decode($request->business_days));         
        foreach($business_days as $business_day)
        {
            if(empty($business_day->opening_hour) || empty($business_day->closing_hour)) continue;
            $business_day_array[$business_day->business_day_id] = ['opening_hour' => $business_day->opening_hour,'closing_hour'=>$business_day->closing_hour,'created_by'=>Auth::user()->id,'updated_by'=>Auth::user()->id];              
        }
        $company->businessDay()->sync($business_day_array, true);// delete old entries = true
    }
    private function businessDayValidation($request){
        $errors = [];
        $business_day_errors = [];
        if(empty($request->business_day)){
           $business_day_errors['day_errors'][1] =array('errors'=> [
                'business_day' => 'Business day is required',
            ]);
            $errors = array_merge($errors, $business_day_errors);
            return $errors; 
        }
        else{
            if(empty($request->business_days)){
                $business_day_errors['day_errors'][1] =array('errors'=> [
                    'business_days.required' => 'Business Hour is required',
                ]);
                $errors = array_merge($errors, $business_day_errors);
                return $errors;
            }else{
                $business_days = (json_decode($request->business_days));
                foreach ($business_days as $key=>$business_day) {
                    if(in_array($business_day->business_day_id, $request->business_day)){
                         $column = array('opening_hour' => $business_day->opening_hour,'closing_hour'=>$business_day->closing_hour);
                        $rule = array('opening_hour' => 'required','closing_hour'=>'required');
                        $messages = [
                            'opening_hour.required' => 'From is required',
                            'closing_hour.required'=>'To is required'
                        ];
                        $validator = Validator::make($column, $rule, $messages);
                        if ($validator->fails()) {
                            $business_day_errors['day_errors'][$business_day->business_day_id] =array('errors'=>$validator->messages());
                        }
                        $errors = array_merge($errors, $business_day_errors);
                        }
                        else{
                            continue;
                        }
                }
                    
                return $errors;
            }
        }
    }
    private function validation($request)
    {
       
        switch ($request->information_type) {
           case 'social':
                $messages = [
                    'facebook.url'=>'Facebook link format is not correct',
                    'twitter.url'=>'Twitter link format is not correct',
                    'linkedin.url'=>'Linkedin link format is not correct',
                    'googleplus.url'=>'Googleplus link format is not correct'
                ];
                $validator = Validator::make($request->all(),[
                    'facebook'=>'nullable|url',
                    'twitter'=>'nullable|url',
                    'linkedin'=>'nullable|url',
                    'googleplus'=>'nullable|url'
                ],$messages);
                return $validator;   
                break;
            case 'account':
                $messages = [
                  //  'old_password.required|min:6|same'.Auth::user()->password => 'Old Password is required|Old Password must be minimum 6|old password is not valid',
                    'new_password.required|min:6'=>'New Password is required|New Password must be minimum 6',
                    'confirm_password.same:new_password|required|min:6'=>'Confirm Pasword must be same with New Password|Confirm Password is required|Confirm Password must be minimum 6'
                ];
                $validator = Validator::make($request->all(),[
                   // 'old_password' =>'required|min:6|same:'.Auth::user()->password,
                     'old_password' => [
                     'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                $fail('Old Password didn\'t match');
                   }
                },
                     ],
                    'new_password' =>'required|min:6',
                    'confirm_password' => 'same:new_password|required|min:6'
                ],$messages);
                 return $validator;
                break;
            case 'basic':
                $messages = [
                     'description.required' => 'About Us is required',
                    'township.required' => 'Township is required',
                    'email.required' =>' Email is required',
                    'name.required' => 'Name is required',
                    'business_days.required' => 'Business Days is required',
                    'city.required' =>' City is required',
                    'business_opening_hours.required' => 'Opening Hour is required',
                    'business_closing_hours.required' => 'Closing Hour is required'
                ];
                $validator = Validator::make($request->all(),[
                     'description'=>'required',
                    'township'=>'required',
                    'email' =>'required',
                     'name'=>'required',
                    'business_days' =>'required',
                    'city'=>'required',
                    'business_opening_hours' =>'required',
                     'business_closing_hours' =>'required'
                ],$messages);
                 return $validator;
                break;
            default:
                echo 'There is no validation';
                break;
        }
       
    }
    public function profile_validation($request){
         
          $messages = [
                     'description.required' => 'About Us Information is required',
                    'township.required' => 'Township is required',
                    'email.required' =>' Email is required',
                    'name.required' => 'Name is required',
                    'city.required' =>' City is required',
                    'website.url'=>'Website link format is not correct',
                    'facebook.url'=>'Facebook link format is not correct',
                    'twitter.url'=>'Twitter link format is not correct',
                    'linkedin.url'=>'Linkedin link format is not correct',
                    'googleplus.url'=>'Googleplus link format is not correct'
                ];
                $validator = Validator::make($request->all(),[
                     'description'=>'required',
                    'township'=>'required',
                    'email' =>'required',
                    'name'=>'required',
                    'city'=>'required',
                    'website'=>'nullable|url',
                    'facebook'=>'nullable|url',
                    'twitter'=>'nullable|url',
                    'linkedin'=>'nullable|url',
                    'googleplus'=>'nullable|url'
                ],$messages);
                 return $validator;
        
    }

    public function companiesForAdmin(Request $request){
        
         $data=$request->all();
         $name=$request->name;
         $phone=$request->phone;
         $is_active=$request->is_active;
        $search_query = Company::with('parent_categories');
        $search_result=$search_query
            ->where(function ($query) use ($name) {
                 $query->whereHas('user', function ($query) use ($name) {
                     $query->where('users.name','like','%'.$name.'%');
                 });
             })
            ->where(function($query)use($phone){
                if(!empty($phone) )                
                $query->where('companies.phone','like','%'.$phone.'%');
                $query->orWhereHas('user', function ($query) use ($phone) {
                     $query->where('users.phone','like','%'.$phone.'%');
                 });
             })
            ->where(function($query)use($is_active){
                if($is_active != null)
                  $query->whereHas('user', function ($query) use ($is_active) {
                   $query->where('users.is_active','=',$is_active);
                  });
             })->paginate(10);
             foreach($search_result as $result){
             $result->productcount=CompanyProduct::where('company_id',$result->id)->count();
             $result->projectcount=CompanyProject::where('company_id',$result->id)->count();
             $result->servicecount=CompanyService::where('company_id',$result->id)->count();
            }
             
        return view('admin.admin.company.companies',compact('search_result','data','name','phone','is_active'));
         //var_dump("hi admin");exit();
    }

    public function companyDashboardByAdmin($id,$pageno){
         $id = \Crypt::decrypt($id);
        $pageno = \Crypt::decrypt($pageno);
         if(is_numeric($id))
         {
             Session::put('page',$pageno);
        $category=CompanyCategory::WhereIn('category_id',[1,2,3])->where('company_id',$id)->select('category_id')->first();

           $company=Company::where('id',$id)->with('user')->first();
            $category_id=$category->category_id;
            $productcount=CompanyProduct::where('company_id',$id)->count();
            $projectcount=CompanyProject::where('company_id',$id)->count();
            $servicecount=CompanyService::where('company_id',$id)->count();
            $packagecount=CompanyPackagePlan::where('company_id',$id)->with('companies')->count();
             $company_package_plans = Company::where('id',$id)->with('package_plan')->first();
            $user=Company::where('id',$id)->select('user_id')->first();
            $user_id=$user->user_id;           
            $requestquotationcount=Quotation::where('send_user_id',$user_id)->count();
            
             $receivedquotationcount = Quotation::with('received_company')->whereHas('received_company', function($q) use ($id){
                     $q->where('quotation_received_companys.company_id', $id);
                 })->count(); 
                
                // $receivedquotationcount = Quotation::with('range','category','send_user','quotation_created_user','quotation_updated_user','received_company')->whereHas('received_company', function($q) use ($id){
                //     $q->where('quotation_received_companys.company_id',$id);
                // })->count();
            // $receivedquotationcount=Quotation::where('received_user_id',$user_id)->count();
            // $receivedquotationcount = 0 ;
            $usercoincount=UserCoin::where('user_id',$user_id)->count();
            return view('admin.admin.company.company_dashboard',compact('productcount','projectcount','servicecount','requestquotationcount','receivedquotationcount','usercoincount','packagecount','user_id','id','category_id','company'));

         }
        
          
    }
    public function updateActiveQuotation(Request $request){
          $company=Company::find($request->company_id);
          $company->active_quotation = $request->active_quotation;
           $company->save();
          if($company->save())
             {
                 $success = array('success'=>"Successfully save changes.");
                 return $success;
             }else
             {
                 $errors = array('errors'=>"Something wrong");
                 return $errors;
             }
        
    }
    public function profileCropForCompany(Request $request){

       $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
        // $path  = storage_path('app/public/user/'. $image_name);
        $image_store_path = $request->path;
        $path  = storage_path('app/public/'.$image_store_path.'/'.$image_name);
         //Storage::disk('local')->put('freelancer/'.$image_name, 'Contents');

        file_put_contents($path, $image);
        // $image_name = explode('images/upload/', $path);
      
         $data=User::where('id',$request->id)
            ->update(['logo'=>$image_name]);
        
        return response()->json(['status'=>true,'image_name'=>$image_name]);


    }
    public function admincompanyUpdateStatus(Request $request){
        
         try{  
            $data['is_active']=$request->is_active;
            $data['updated_at']=date('Y-m-d H:i:s');
            $com=Company::where('id','=',$request->id)->select('user_id')->first();
            User::where('id','=',$com->user_id)
                ->update($data);
            Company::where('id','=',$request->id)
                ->update($data);
                Session::flash('success', 'Updated successfully!');
             $success = array('success'=>"Successfully saved Changes!");
             $url = URL :: previous();
           // return response()->json($success); 
             Session::put('url',$url);
             return response()->json(['success'=>$success,'url'=>$url]);
          // return response()->json(['success'=>$success,'url'=>$url]);
        }catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        } 
        
    }
   public function importExcel(Request $request)
    {
        
        
        // $messages = [
        //             'import_file.required|mimes:csv' => 'Upload CSV File first|must be file|You must upload CSV File First'
        //             ];
                    
        // $status= Validator::make($request->all(),[
        //                 'import_file' =>'required|mimes:csv'
        //             ],$messages);
        
        // if($status->fails())
        // {
        //   Session::flash('error',"You need to upload CSV File!");
        //   return back();
        // }else{            
          
          $file=$request->file('import_file')->store('import');
          $import=new UsersImport;
          $import->import($file);
        
          if($import->failures()->isNotEmpty()){
             return back()->withFailures($import->failures());
          }
         
          Session::flash('message',"Successfully Excel Imported Company Data!");
         return back()->withStatus('Excel file imported successfully');
        }
        
    // }
           

}
