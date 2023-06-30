<?php
namespace App\Http\Controllers\Admin;
use App\Helper\AndCharacterChanger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Freelancer;
use App\FreelancerEducation;
use App\FreelancerExperience;
use App\FreelancerProject;
use App\FreelancerSkill;
use App\Location;
use App\FreelancerStatus;
use App\Company;
use CompanyController;
use App\Category;
use App\Advertising;
use App\SkillForFreelancer;
use App\User;
use Auth;
use Response;
use Session;

class FreelancerController extends Controller
{
    //
    // public function  Dashboard(){
    //      $user_id =Auth::user()->id; 
    //   $freelancer=Freelancer::where('user_id',$user_id)->with('user','location')->first();
    //   return view('admin.freelancer.dashboard',compact('freelancer'));
    // }}
    public function edit(){  
          $user_id =Auth::user()->id; 
       $freelancer_id = session()->get('freelancer_id');
       $freelancer= Freelancer::where('user_id',$user_id)->with('user','location','freelancerstatus','company','category')->first();
     $companies =Company::leftjoin('users','users.id','=','companies.user_id')->where('companies.is_active','1')->select('users.name','companies.id')->get();
       $freelancer_educations=FreelancerEducation::where('freelancer_id',$freelancer_id)->get();
       $freelancer_experiences=FreelancerExperience::where('freelancer_id',$freelancer_id)->get();
       $freelancer_projects=FreelancerProject::where('freelancer_id',$freelancer_id)->get();       
      $freelancer_skills=FreelancerSkill::join('skill_for_freelancers','skill_for_freelancers.id','=','freelancer_skills.skill_id')->where('freelancer_skills.freelancer_id',$freelancer_id)->select('skill_for_freelancers.skill_name','freelancer_skills.id')->get();
      if(!empty($freelancer->location->parent_id))
        $freelancer_city = Location::where('id',$freelancer->location->parent_id)->first();
      else 
           $freelancer_city = Location::where('id',1)->first();
       return view('admin.freelancer.edit',compact('freelancer','freelancer_educations','freelancer_experiences','freelancer_projects','freelancer_skills','freelancer_city','companies'));
    }
    public function update(Request $request){
     $user_id=Auth()->user()->id;
     $freelancer=Freelancer::where('user_id','=',$user_id)->select('id')->first();
     $freelancer_id=$freelancer->id;    
      switch ($request->information_type) {
            case 'basic':
                $messages=$this->changeFreelancerBasicInformation($request,$freelancer_id);
                return response()->json($messages);
             break;
            case 'profile_photo';
                $messages=$this->changeProfilePhoto($request);
                return response()->json($messages);
            case 'account':
               $messages = app('App\Http\Controllers\Admin\CompanyController')->changePassword($request,$user_id);
                return response()->json($messages);
                break;
            case 'education':
                $messages = $this->changeEducationInformation($request,$freelancer_id);
                return response()->json($messages);
                break;
            case 'experience':
                $messages = $this->changeExperienceInformation($request,$freelancer_id);
                return response()->json($messages);
                break;
            case 'project':
                $messages = $this->changeProjectInformation($request,$freelancer_id);
                return response()->json($messages);
                break;
            case 'skill':
                $messages = $this->changeSkillInformation($request,$freelancer_id);
                return response()->json($messages);
                break;
            default:
                echo 'There is no nothing to change';
                break;
        } 

    }
    public function changeFreelancerBasicInformation($request,$id){
          
         $status = $this->validation($request);
        if($status->fails())
        {
              $errors =array('errors'=>$status->messages());
              return $errors;   
        }
        else{ 
            $freelancer =Freelancer::where('id',$id)->with('user')->first();
            $freelancer->email = $request->email;            
            $freelancer->nrc = $request->nrc;
            $freelancer->date_of_birth =$request->date_of_birth;
            $freelancer->location_id = $request->township_id;
            $freelancer->total_experiences = $request->total_experiences;
            $freelancer->address = $request->address;
            $freelancer->current_work_status = $request->current_work_status;
            $freelancer->freelancer_status_id = $request->freelancer_status_id;
            $freelancer->website = $request->website;
            $freelancer->facebook = $request->facebook;
            $freelancer->googleplus = $request->googleplus;
            $freelancer->twitter = $request->twitter;
            $freelancer->linkedin = $request->linkedin;
            $description = AndCharacterChanger::replaceChar($request->description);
            $freelancer->description = $description;
            $freelancer->category_id = $request->freelancer_category_id;
            $freelancer->company_id = $request->company_id;
            $freelancer->freelancer_company = $request->freelancer_company;
             $name  =$request->name;
             $phone =$request->phone;
             if($freelancer->save())
            {

              $freelancer->user()->update(['name'=>$name,'phone'=>$phone]);
              Session::flash('success', 'Updated successfully!');
             $success = array('success'=>"Updated successfully!");
                return $success;
            }else
            {
                $errors = array('errors'=>"Something wrong!");
                return $errors;
            }
        }  
        return $request;

    }
     public function imagefreelancerCrop(Request $request){

        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
        $path  = storage_path('app/public/freelancer/'. $image_name);
        file_put_contents($path, $image);

        $data=User::where('id',Auth::user()->id)
           ->update(['logo'=>$image_name]);
           
        return response()->json(['status'=>true,'image_name'=>$image_name]);


    }
    public function changeEducationInformation($request,$id){
          
         $status = $this->validation($request);
        if($status->fails())
        {
              $errors =array('errors'=>$status->messages());
              return $errors;    
            
              //  $errors =array('errors'=>$status->messages()); 
              //  return response()->json($errors);
        }
        else{ 
            $freelancer_id = $request->session()->get('freelancer_id');
            $freelancereducation =new FreelancerEducation;
            $freelancereducation->name = $request->name;            
            $freelancereducation->education_level = $request->education_level;
            $freelancereducation->from_date = $request->from_date;
            $freelancereducation->to_date = $request->to_date;
            $freelancereducation->university = $request->university;
            $freelancereducation->country = $request->country;
            $freelancereducation->freelancer_id = $freelancer_id;
             if($freelancereducation->save())
            {
                Session::flash('success', 'Created successfully!!');
                $success = array('success'=>"Successfully save");
                return $success;
            }else
            {
                $errors = array('errors'=>"Something wrong");
                return $errors;
            }
        }  
        return $request;

    }
    public function changeExperienceInformation($request,$id){
         

         $status = $this->validation($request);
        if($status->fails())
        {
            $errors =array('errors'=>$status->messages());
            return $errors;          
        }
        else{ 
            $freelancer_id = $request->session()->get('freelancer_id');
            $freelancerexperience =new FreelancerExperience;
            $freelancerexperience->position = $request->position;            
            $freelancerexperience->company = $request->company;
            $freelancerexperience->from_date = $request->from_date;
            $freelancerexperience->to_date = $request->to_date;
            $freelancerexperience->freelancer_id = $freelancer_id;
            $description = AndCharacterChanger::replaceChar($request->description);
            $freelancerexperience->description = $description;
             if($freelancerexperience->save())
            {
                 Session::flash('success', 'Created successfully!');
                $success = array('success'=>"Successfully save");
                return $success;
            }else
            {
                $errors = array('errors'=>"Something wrong");
                return $errors;
            }
        }  
        return $request;

    }     
     public function changeSkillInformation($request,$id){         
             
         $status = $this->validation($request);
        if($status->fails())
        {
             $errors =array('errors'=>$status->messages());
            return $errors;          
        }
        else{
            $skill_id = $this->checkSkill($request);
            $freelancer_id = $request->session()->get('freelancer_id');
            $freelancerskill =new FreelancerSkill;
            $freelancerskill->skill_id = $skill_id;
            $freelancerskill->freelancer_id = $freelancer_id;
             if($freelancerskill->save())
            {
                Session::flash('success', 'Created successfully!');
                $success = array('success'=>"Successfully save");
                return $success;
            }else
            {
                $errors = array('errors'=>"Something wrong");
                return $errors;
            }
        }  
        return $request;

    } 
    public function changeProjectInformation($request,$id){
         
             
         $status = $this->validation($request);
        if($status->fails())
        {
             $errors =array('errors'=>$status->messages());
            return $errors;          
        }
        else{
           
            $freelancer_id = $request->session()->get('freelancer_id');
            $freelancerproject =new FreelancerProject;
            $freelancerproject->project_name = $request->project_name;            
            $freelancerproject->company_name = $request->company_name;
            $project_detail = AndCharacterChanger::replaceChar($request->project_detail);
            $freelancerproject->project_detail = $project_detail;
            $freelancerproject->project_start_date = $request->project_start_date;
            $freelancerproject->project_end_date = $request->project_end_date;
            $freelancerproject->project_link = $request->project_link;
            $freelancerproject->freelancer_id = $freelancer_id;
             if($freelancerproject->save())
            {
                Session::flash('success', 'Created successfully!');
                $success = array('success'=>"Successfully save");
                return $success;
            }else
            {
                $errors = array('errors'=>"Something wrong");
                return $errors;
            }
        }  
        return $request;

    }
    private function validation($request)
    {
        switch ($request->information_type) {
            case 'social':
                $messages = [
                    'facebook.required' => 'Facebook url is required'
                ];
                $validator = Validator::make($request->all(),[
                    'facebook'=>'required|nullable|url',
                ],$messages);
                return $validator;   
                break;
            case 'account':
                $messages = [
                    'old_password.required|min:3' => 'Old Password is required|Old Password must be minimum 3',
                    'new_password.required|min:3'=>'New Password is required|New Password must be minimum 3',
                    'confirm_password.same:new_password|required|min:3'=>'Confirm Pasword must be same with New Password|Confirm Password is required|Confirm Password must be minimum 3'
                ];
                $validator = Validator::make($request->all(),[
                    'old_password' =>'required|min:3',
                    'new_password' =>'required|min:3',
                    'confirm_password' => 'same:new_password|required|min:3'
                ],$messages);
                 return $validator;
                break;
            case 'basic':
                $messages = [
                    'freelancer_category_id'=>'Category is Required',
                    'township_id.required' => 'Township is required',
                    'name.required' =>' Name is required',
                   /*   'facebook.url' => 'Facebook url is required',
                      'twitter.url' => 'Twitter url is required',
                      'linkedin.url' => 'Linkedin url is required',
                       'googleplus.url' => 'Google Plus url is required',*/
                   //  'current_work_status.required' =>' Current Work Status is required',
                      'freelancer_status_id.required' =>'Freelancer Status is required',
                       'phone.required' =>'Phone is required',
                    
                ];
                $validator = Validator::make($request->all(),[
                    'township_id'=>'required',
                    'name' =>'required',
                    'freelancer_category_id'=>'required',
                  //  'current_work_status'=>'required',
                   'facebook'=>'nullable|url',
                   'twitter'=>'nullable|url',
                    'linkedin'=>'nullable|url',
                    'googleplus'=>'nullable|url',
                    'website'=>'nullable|url',
                    'freelancer_status_id'=>'required',
                     'phone'=>'required'
                ],$messages);
                 return $validator;
                break;
            case 'education':
                $messages = [
                    'name.required' =>'Subject Name is required',
                    'education_level.required' =>'Education Level is required',
                    'university.required' =>'University is required',
                    'country.required' =>'Country is required',
                    'from_date.required' =>'From is required',
                    'to_date.required' =>'To is required'
                ];
                $validator = Validator::make($request->all(),[
                    'name'=>'required',
                    'education_level' =>'required',
                    'university'=>'required',
                    'country' =>'required',
                    'from_date' =>'required',
                    'to_date' =>'required'
                ],$messages);
              return $validator;
                break;   
            case 'experience':
                $messages = [
                    'position.required' =>'Position is required',
                    'company.required' =>'Company Name is required',
                    'from_date.required' =>'From is required',
                    'to_date.required' =>'To is required'
                ];
                $validator = Validator::make($request->all(),[
                    'position'=>'required',
                    'company' =>'required',
                    'from_date' =>'required',
                    'to_date' =>'required'
                ],$messages);
                 return $validator;
                break; 
            case 'project':
                $messages = [
                    'project_link.url' => 'The project link format is invalid',
                    'project_name.required' =>'Project Name is required',
                    'company_name.required' =>'Company Name is required',
                    'project_detail.required' =>'Description is required',
                    'project_start_date.required' =>'Project start date is required',
                    'project_end_date.required' =>'Project end date is required',
                ];
                $validator = Validator::make($request->all(),[
                    'project_name'=>'required',
                    'company_name' =>'required',
                    'project_detail'=>'required',
                    'project_start_date' =>'required',
                    'project_end_date' =>'required',
                    'project_link' => 'nullable|url',
                ],$messages);
              return $validator;
                break;
            case 'skill':
                $messages = [
                  'skill_name.required' =>'Skill Name is required',
                ];
                $validator = Validator::make($request->all(),[
                  'skill_name'=>'required',
                ],$messages);
              return $validator;
                break; 
            default:
                echo 'There is no validation';
                break;
        }       
        
    }
    public function commons(){
       $data['cities']=Location::where('parent_id','=',0)->where('is_active','=',1)->get();
       $data['townships']=Location::where('parent_id','!=',0)->where('is_active','=',1)->get();
       $data['freelancer_statuses']=FreelancerStatus::where('is_active','=',1)->get();
       return $data;
    }
    public function changeProfilePhoto(Request $request)
    {
          $user_id =Auth()->user()->id;
         $user =User::where('id',$user_id)->first();
         $user->logo = $request->profile_photo;

          if($user->save())
            {
                if($request->profile_photo != $request->old_profile_photo){
                if(Storage::disk('public')->exists('/freelancer/'.$requet->old_profile_photo)){
                  unlink(storage_path('app/public/freelancer/'.$requet->old_profile_photo));
                 }
                }
                Session::flash('success', 'Updated successfully!!');
                $success = array('success'=>"Successfully save changes.");
                return $success;
            }else
            {
                $errors = array('errors'=>"Something wrong");
                return $errors;
            }
            
    }
    public function imageCrop(Request $request){

        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
        $path  = storage_path('app/public/freelancer/'. $image_name);
        file_put_contents($path, $image);
        return response()->json(['status'=>true,'image_name'=>$image_name]);


    }
    public function getExperienceToUpdate(Request $request){
          $id=$request['id'];
        $experience =FreelancerExperience::where('id',$id)->first();        
        return response()->json(['status'=>true,'experience'=>$experience]);
    }    
    public function getEducationToUpdate(Request $request){
          $id=$request['education_id'];
        $education =FreelancerEducation::where('id',$id)->first();        
        return response()->json(['status'=>true,'education'=>$education]);
    }    
    public function getProjectToUpdate(Request $request){
          $id=$request['project_id'];
        $project =FreelancerProject::where('id',$id)->first();        
        return response()->json(['status'=>true,'project'=>$project]);
    }
    public function getSkillToUpdate(Request $request){
        $skill_id=$request['skill_id'];
        $skill =FreelancerSkill::where('id',$skill_id)->first();        
        return response()->json(['status'=>true,'skill'=>$skill]); 
    }
    public function getskill(Request $request){
        if(isset($request->skill))
         {
            $skill =SkillForFreelancer::where('skill_name','like','%'.$request->skill.'%')->get();
            return response()->json($skill);   
         }  
        
    }
    //  public function getProjectType(Request $request)
    // {
    
    //      if(isset($request->project))
    //      {
    //         $project_type =ProjectType::where('project_type_name','like','%'.$request->project.'%')->get();
    //         return response()->json($project_type);   
    //      }       
    // }
    public function updateExperience(Request $request){ 
         $status = $this->validation($request);
        if($status->fails())
        {
            $errors =array('errors'=>$status->messages());
            return $errors;       
            
              //  $errors =array('errors'=>$status->messages()); 
              //  return response()->json($errors);
        }
        else{ 
             $freelancerexperience =FreelancerExperience::where('id',$request->experience_id)->first();
            $freelancerexperience->position = $request->position;            
            $freelancerexperience->company =  $request->company;
            $freelancerexperience->from_date = $request->from_date;
            $freelancerexperience->to_date = $request->to_date;
            $description = AndCharacterChanger::replaceChar($request->description);
            $freelancerexperience->description = $description;
             if($freelancerexperience->save())
            {
                 Session::flash('success', 'Updated successfully!');
                $success = array('success'=>"Successfully save");
                return $success;
            }else
            {
                $errors = array('errors'=>"Something wrong");
                return $errors;
            }
        }
    }
     public function updateSkill(Request $request){

  $status = $this->validation($request);
        if($status->fails())
        {
            $errors =array('errors'=>$status->messages());
            return $errors;       
            
              //  $errors =array('errors'=>$status->messages()); 
              //  return response()->json($errors);
        }
        else{ 
            $skill_id = $this->checkSkill($request);
            $freelancerskill =FreelancerSkill::where('id',$request->freelancerskill_id)->first();
            $freelancerskill->skill_id = $skill_id; 
            if($freelancerskill->save())
            {
                Session::flash('success', 'Updated successfully!');
                $success = array('success'=>"Successfully save changes!");
                return $success;
            }else
            {
                $errors = array('errors'=>"Something wrong!");
                return $errors;
            }
}
    }
    public function deleteExperience($id){
         FreelancerExperience::where('id',$id)->delete();
         Session::flash('success', 'Deleted successfully!');
         return redirect('/freelancer/profile');
    }
    public function deleteProject($id){
         FreelancerProject::where('id',$id)->delete();
        Session::flash('success', 'Deleted successfully!');
         return redirect('/freelancer/profile');
    }
    public function account(){
        
         $user_id =Auth::user()->id;
       $freelancer= Freelancer::where('user_id',$user_id)->with('user','location','freelancerstatus','company','category')->first();
       $advertisings = Advertising::getPageDetailAdvertising();
        return view('admin.freelancer.account',compact('freelancer','advertisings'));
    }
    public function profile(Request $request){
            
         
           //var_dump("hi");exit();
          if(Auth::user()->role == 4 || Auth::user()->role == 5){
            $id = \Crypt::decrypt($request->id);
            $user_id = $id;
          }else{ 
              $user_id =Auth::user()->id; 
          }
          
       $freelancer= Freelancer::where('user_id',$user_id)->with('user','location','freelancerstatus','company','category')->first();
       $freelancer_id=$freelancer->id;       
        session()->put('freelancer_id', $freelancer_id);
       //$freelancer_city = Location::where('id',$freelancer->location->parent_id)->first();
        if(!empty($freelancer->location->parent_id)){
            $freelancer_city =  Location::where('id',$freelancer->location->parent_id)->first();
        }else{
          $freelancer_city = null;  
        }
       
       $freelancer_educations=FreelancerEducation::where('freelancer_id',$freelancer_id)->get();
       $freelancer_experiences=FreelancerExperience::where('freelancer_id',$freelancer_id)->get();
       $freelancer_projects=FreelancerProject::where('freelancer_id',$freelancer_id)->get();
      $freelancer_skills=FreelancerSkill::join('skill_for_freelancers','skill_for_freelancers.id','=','freelancer_skills.skill_id')->where('freelancer_skills.freelancer_id',$freelancer_id)->select('skill_for_freelancers.skill_name','freelancer_skills.id')->get();
         $companies =Company::leftjoin('users','users.id','=','companies.user_id')->where('companies.is_active','1')->select('users.name','companies.id')->get();
         $advertisings = Advertising::getPageDetailAdvertising();     
         //return view('admin.freelancer.profile');
         
          
            
          return view('admin.freelancer.profile',compact('freelancer','freelancer_educations','freelancer_experiences','freelancer_projects','freelancer_skills','advertisings','companies','freelancer_city'));
    }    
    public function deleteSkill($id){
        FreelancerSkill::where('id',$id)->delete();
        Session::flash('success', 'Deleted successfully!');
         return redirect('/freelancer/profile'); 
    }    
    public function deleteEducation($id){        
        FreelancerEducation::where('id',$id)->delete();
        Session::flash('success', 'Deleted successfully!');
         return redirect('/freelancer/profile');
    }
    public function updateEducation(Request $request){
          $status = $this->validation($request);
        if($status->fails())
        {
            $errors =array('errors'=>$status->messages());
            return $errors;       
            
              //  $errors =array('errors'=>$status->messages()); 
              //  return response()->json($errors);
        }
        else{ 
            $freelancereducation =FreelancerEducation::where('id',$request->education_id)->first();
            $freelancereducation->name = $request->name;            
            $freelancereducation->education_level = $request->education_level;
            $freelancereducation->from_date =$request->from_date;
            $freelancereducation->to_date = $request->to_date;
            $freelancereducation->country = $request->country;
            $freelancereducation->university = $request->university;
            $freelancereducation->save();

            if($freelancereducation->save())
            {
                Session::flash('success', 'Updated successfully!');
                $success = array('success'=>"Successfully save changes!");
                return $success;
            }else
            {
                $errors = array('errors'=>"Something wrong!");
                return $errors;
            }
        }  

            /*$freelancereducation =FreelancerEducation::where('id',$request->education_id)->first();
            $freelancereducation->name = $request->name;            
            $freelancereducation->education_level = $request->education_level;
            $freelancereducation->from_date =$request->from_date;
            $freelancereducation->to_date = $request->to_date;
            $freelancereducation->country = $request->country;
            $freelancereducation->university = $request->university;
            $freelancereducation->save();

            if($freelancereducation->save())
            {
                $success = array('success'=>"Successfully save changes!");
                return $success;
            }else
            {
                $errors = array('errors'=>"Something wrong!");
                return $errors;
            }*/

    }    
     public function updateProject(Request $request){

    $status = $this->validation($request);
        if($status->fails())
        {
            $errors =array('errors'=>$status->messages());
            return $errors;       
            
              //  $errors =array('errors'=>$status->messages()); 
              //  return response()->json($errors);
        }
        else{ 
            $freelancerproject =FreelancerProject::where('id',$request->project_id)->first();
            $freelancerproject->project_name = $request->project_name;            
            $freelancerproject->company_name = $request->company_name;
            $freelancerproject->project_start_date =$request->project_start_date;
            $freelancerproject->project_end_date = $request->project_end_date;
            $freelancerproject->project_link = $request->project_link;
           // $freelancerproject->project_detail = $request->project_detail;
            $project_detail = AndCharacterChanger::replaceChar($request->project_detail);
            $freelancerproject->project_detail = $project_detail;
            $freelancerproject->save();

            if($freelancerproject->save())
            {
                Session::flash('success', 'Updated successfully!!');
                $success = array('success'=>"Successfully save changes!");
                return $success;
            }else
            {
                $errors = array('errors'=>"Something wrong!");
                return $errors;
            }
        }   
    }
    //start
     private function checkSkill($request)
    { 
        
         if(!empty($request->skill_name))
            {
                $skill_sql=SkillForFreelancer::select('id')->where('skill_name',$request->skill_name)->first();
                if(isset($skill_sql))
                {
                    $skill_id = $skill_sql->id;
                }
                else{
                    $skill = new SkillForFreelancer();
                    $skill->skill_name = $request->skill_name;
                    $skill->created_at = date("Y-m-d H:m:i");
                    $skill->updated_at = date("Y-m-d H:m:i");
                    $skill->save();
                    $skill_id = $skill->id;
                }
            }
        return $skill_id;
    }
    
    public function profile_by_admin(Request $request){
        
           //var_dump("hi");exit();
          if(Auth::user()->role == 4 || Auth::user()->role == 5){
            $id = \Crypt::decrypt($request->id);
            $user_id = $id;
          }else{ 
              $user_id =Auth::user()->id; 
          }
       $freelancer= Freelancer::where('user_id',$user_id)->with('user','location','freelancerstatus','company','category')->first();
       $freelancer_id=$freelancer->id;       
        session()->put('freelancer_id', $freelancer_id);
       //$freelancer_city = Location::where('id',$freelancer->location->parent_id)->first();
        if(!empty($freelancer->location->parent_id)){
            $freelancer_city =  Location::where('id',$freelancer->location->parent_id)->first();
        }else{
          $freelancer_city = null;  
        }
       
       $freelancer_educations=FreelancerEducation::where('freelancer_id',$freelancer_id)->get();
       $freelancer_experiences=FreelancerExperience::where('freelancer_id',$freelancer_id)->get();
       $freelancer_projects=FreelancerProject::where('freelancer_id',$freelancer_id)->get();
      $freelancer_skills=FreelancerSkill::join('skill_for_freelancers','skill_for_freelancers.id','=','freelancer_skills.skill_id')->where('freelancer_skills.freelancer_id',$freelancer_id)->select('skill_for_freelancers.skill_name','freelancer_skills.id')->get();
         $companies =Company::leftjoin('users','users.id','=','companies.user_id')->where('companies.is_active','1')->select('users.name','companies.id')->get();
         $advertisings = Advertising::getPageDetailAdvertising();     
         //return view('admin.freelancer.profile');
          return view('admin.freelancer.profile_by_admin',compact('freelancer','freelancer_educations','freelancer_experiences','freelancer_projects','freelancer_skills','advertisings','companies','freelancer_city'));
    } 
   
}
