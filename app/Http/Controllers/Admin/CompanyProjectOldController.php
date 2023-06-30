<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\CompanyProject;
use App\ProjectPhoto;
use App\Company;
use App\Range;
use App\User;
use App\ProjectType;
use Redirect;
use DB;
use Session;
use Auth;
class CompanyProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
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
        /*$company_projects=CompanyProject::where('company_id',$login_company_id)->with('range','projectType')->paginate(10);*/
        $data = $request->all(); 
         $name=$request->name;
        // $company_projects = CompanyProject::where(function($query)use($name){
        //         if(!empty($name) )                
        //         $query->where('project_name','like', "%".$name."%");
        //      })->where('company_id',$login_company_id)->orderBy('project_name','desc')->paginate(10);
             //start
             $company_projects = CompanyProject::leftjoin('project_photos','project_photos.company_project_id','=','company_projects.id')->where(function($query)use($name){
                if(!empty($name) )                
                $query->where('company_projects.project_name','like', "%".$name."%");
             })->where('company_id',$id)->select('company_projects.*','project_photos.photo')->groupBy('company_projects.id')->orderBy('project_name','desc')->paginate($page);
             //end
             //  myo min added
            $company = Company::Where('id',$id)->with('parent_categories','user','packageplan','package_plan')->first();
            // myo min added end
             if(auth()->user()->role == 2){
            return view('admin.project.list',compact('company_projects','data','name','company'));
             }else{
            return view('admin.admin.company.project-list',compact('company_projects','id','company','data','name'));
             }
    }
    // by company
    // public function viewcompanyprojectbyadmin(Request $request,$id){
       
    //       $id = \Crypt::decrypt($id);
    //           $data = $request->all(); 
    //             $name=$request->name;
             
          
    //       if(is_numeric($id))
    //       {
    //         // $company=Company::where('id',$id)->with('user')->first();
    //           $company_projects=CompanyProject::where(function($query)use($name){
    //             if(!empty($name) )                
    //             $query->where('project_name','like', "%".$name."%");
    //          })->where('company_id',$id)->orderBy('project_name','desc')->with('range','projectType')->paginate(10);
    //       //  myo min added
    //         $company = Company::Where('id',$id)->with('parent_categories','user','packageplan','package_plan')->first();
    //         // myo min added end
            
    //         return view('admin.admin.company.project-list',compact('company_projects','id','company','data','name'));
    //       }
        
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
       
        session()->put('redirect_url', url()->previous());
        $ranges = Range::all();
        $project_types = ProjectType::select('id','project_type_name')->get();
        //  myo min added
            $company = Company::Where('user_id',Auth()->user()->id)->with('parent_categories','user','packageplan','package_plan')->first();
            // myo min added end
        return view('admin.project.add',compact('ranges','project_types','company'));
    }
    
    public function createcompanyprojectbyadmin($id)
    {   
        $id = \Crypt::decrypt($id);
        
        
         if(is_numeric($id))
         {
             
            $ranges = Range::all();
            $project_types = ProjectType::select('id','project_type_name')->get();
            //$company_project = CompanyProject::where('id',$id)->with('range','projectphoto')->first();
            return view('admin.admin.company.new-project',compact('ranges','project_types','id'));
        
         }
       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function storeprojectbyadmin(Request $request)
    // {    
        
    //     if(empty($request->photo_arr)){
     
    //   }
    //     $status = $this->validation($request);
    //     if($status->fails())
    //     {
    //       $errors =array('errors'=>$status->messages());
    //          return response()->json($errors); 
    //     }
    //     else{
     
    //         $project_url = strtolower(self::makeUrl(trim($request->name)));
    //         $project_type = $this->checkProjectType($request);
    //         $project = new CompanyProject();
    //         $project->project_name = $request->name;
    //         $project->project_url=$project_url;
    //         $project->project_description = $request->description;
    //         $project->company_id   = $request->company_id;
    //         $project->range_id     = $request->range;
    //         $project->project_type_id= $project_type;
    //         $project->created_by = Auth::user()->id;
    //         $project->updated_by = Auth::user()->id;
    //         $project->created_at = date("Y-m-d H:m:i");
    //         $project->updated_at = date("Y-m-d H:m:i");
    //       if($project->save())
    //         {
    //              $id = $project->id;
    //              $this->addProjectPhoto($request,$id); 
    //              Session::flash('success', 'Successfully Saved !'); 
    //              $success = array('success'=>"Successfully saved !");
    //                 return response()->json($success);  
    //           // return response()->json(['url'=>url('/admin/company-project/'.$request->company_id)]);
                          
    //         }else
    //         {
    //             $errors = array('errors'=>"Something wrong !");
    //             return response()->json($errors);
    //         }
    //     }
        
       
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
         // if(empty($request->photo_arr)) return false;
            
          
        $status = $this->validation($request);
        if($status->fails())
        {
           $errors =array('errors'=>$status->messages());
             return response()->json($errors); 
        }
        else{
            //start
            if(!empty(Session::get('login_company_id'))){
             $company_id= Session::get('login_company_id'); 
            }else{
             $company_id=  $request->company_id;
            }
            //end
            $project_url = strtolower(self::makeUrl(trim($request->name)));
            $project_type = $this->checkProjectType($request);
            $project = new CompanyProject();
            $project->project_name = $request->name;
            $project->project_url=$project_url;
            $project->project_description = $request->description;
            $project->company_id   = $company_id;
            $project->range_id     = $request->range;
            $project->project_type_id= $project_type;
            $project->created_by = Auth::user()->id;
            $project->updated_by = Auth::user()->id;
            $project->created_at = date("Y-m-d H:m:i");
            $project->updated_at = date("Y-m-d H:m:i");
           if($project->save())
            {
                 Session::flash('success', 'Successfully Saved !'); 
                $success = array('success'=>"Successfully saved !");
                
                    $id = $project->id;
                $this->addProjectPhoto($request,$id);
                 if(!empty(Session::get('redirect_url'))){
                 $url =Session::get('redirect_url');
                  return response()->json(['url'=>$url,'success'=>$success]);
                } else{
                  return response()->json($success); 
                }
                //return response()->json(['url'=>$url,'success'=>$success]);
               // return response()->json($success);            
            }else
            {
                $errors = array('errors'=>"Something wrong !");
                return response()->json($errors);
            }
        }
        
       
    }
    
    private function addProjectPhoto($request,$project_id)
    { 
        if(empty($request->photo_arr)) return false;
        $photo_array = (json_decode($request->photo_arr)); 
        $image_list = [];
        foreach($photo_array as $photo_arr)
        {
            array_push($image_list, $photo_arr->image);
        }

        $photos = DB::table('project_photos')->select('photo')->where('company_project_id',$project_id)->get();
        if(!empty($photos))
        {
          foreach ($photos as $photo) {
                if(!in_array($photo->photo,$image_list))
                    unlink(storage_path('app/public/project/'.$photo->photo));  
            }   
        }
        DB::table('project_photos')->where('company_project_id',$project_id)->delete(); 

        $rows = [];
        //if no meta input found
        if(empty($request->photo_arr)) return false;
        $photo_arr = (json_decode($request->photo_arr));           
        foreach($photo_arr as $key => $value)
        {
            if(empty($value)) continue;
            $rows[] = ['company_project_id' => $project_id , 'photo' =>$value->image, 'image_title' => $value->name, 'created_by' => Auth::user()->id,'updated_by'=>Auth::user()->id,'created_at'=>date("Y-m-d H:m:i"),'updated_at'=>date("Y-m-d H:m:i")];
        }
        //if no meta data to insert
        if(empty($rows)) return false;
        DB::table('project_photos')->insert($rows);
        

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$status)
    {   
        
        $id = \Crypt::decrypt($id);
        $status = \Crypt::decrypt($status);

         if(is_numeric($id)){
             
             session::put('edit_redirect_url', url()->previous());
             Session::put('pageno',$status);
        $company_project = CompanyProject::where('id',$id)->with('range','projectphoto','projectType')->first();
        $created_user = User::select('id','name')->where('id',$company_project->created_by)->first();
        $updated_user = User::select('id','name')->where('id',$company_project->updated_by)->first();
         $login_company_id=Session::get('login_company_id');
        
          //  myo min added
            $company = Company::Where('id',$login_company_id)->with('parent_categories','user','packageplan','package_plan')->first();
            // myo min added end
            
        return view('admin.project.show',compact('company_project','created_user','updated_user','company')); 
         }
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminprojectshow($id,$page)
    {
         $id = \Crypt::decrypt($id);
        $page = \Crypt::decrypt($page);

         if(is_numeric($id)){
             Session::put('pageno',$page);
        $company_project = CompanyProject::where('id',$id)->with('range','projectphoto')->first();
        $created_user = User::select('id','name')->where('id',$company_project->created_by)->first();
        $updated_user = User::select('id','name')->where('id',$company_project->updated_by)->first();
        return view('admin.admin.company.project-show',compact('company_project','created_user','updated_user')); 
         }
          
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $id = \Crypt::decrypt($id);
        
        if(is_numeric($id)){
            
            $company_project = CompanyProject::where('id',$id)->with('range','projectphoto','projectType')->first();
        $ranges = Range::all();
        $project_types = ProjectType::select('id','project_type_name')->get();
          if(auth()->user()->role == 2){
         //  myo min added
             $company = Company::Where('user_id',Auth()->user()->id)->with('parent_categories','user','packageplan','package_plan')->first();
            // myo min added end
          return view('admin.project.edit',compact('company_project','ranges','project_types','company'));
          }else{
            return view('admin.admin.company.project-edit',compact('company_project','ranges','project_types'));  
          }
        }
        
    }
    
    // public function editprojectbyadmin($id){
        
    //     $id = \Crypt::decrypt($id);
 
    //     if(is_numeric($id))
    //     {
    //         $company_project = CompanyProject::where('id',$id)->with('range','projectphoto','projectType')->first();
    //     $ranges = Range::all();
    //     $project_types = ProjectType::select('id','project_type_name')->get();
    //     return view('admin.admin.company.project-edit',compact('company_project','ranges','project_types'));
    //     }
        
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $photo_arr = (json_decode($request->photo_arr));  
        $old_photo_arr = ProjectPhoto::where('company_project_id',$id)->get()->toArray();
       
        $status = $this->validation($request);
        if($status->fails())
        {
            
           /* $errors =array('errors'=>$status->messages());
             return response()->json($errors); */
               $errors =array('errors'=>$status->messages());
                  return $errors; 
        }
        else{
            $project_url = strtolower(self::makeUrl(trim($request->name)));
            $project_type = $this->checkProjectType($request);
            $project = CompanyProject::where('id',$id)->first();
            $project->project_name = $request->name;
            $project->project_url = $project_url;
            $project->project_description = $request->description;
            $project->range_id     = $request->range;
            $project->project_type_id= $project_type;
            $project->updated_by = Auth::user()->id;
            $project->updated_at = date("Y-m-d H:m:i");
           if($project->save())
            {
                Session::flash('success', 'Successfully Updated !'); 
                $success = array('success'=>"Successfully Updated !");
                $this->addProjectPhoto($request,$id);
                if(auth()->user()->role==2){
                 $url =Session::get('edit_redirect_url');
                return response()->json(['url'=>$url,'success'=>$success]);
                }else{
                  return response()->json($success);   
                }
            }
            else
            {
                $errors = array('errors'=>"Something wrong !");
                return response()->json($errors);
            }
        }
    }
    
    // public function updateprojectbyadmin(Request $request, $id)
    // {
    //     $photo_arr = (json_decode($request->photo_arr));  
    //     $old_photo_arr = ProjectPhoto::where('company_project_id',$id)->get()->toArray();
       
    //     $status = $this->validation($request);
    //     if($status->fails())
    //     {
    //       $errors =array('errors'=>$status->messages());
    //          return response()->json($errors); 
    //     }
    //     else{
    //         $project_url = strtolower(self::makeUrl(trim($request->name)));
    //         $project_type = $this->checkProjectType($request);
    //         $project = CompanyProject::where('id',$id)->first();
    //         $project->project_name = $request->name;
    //         $project->project_url =$project_url;
    //         $project->project_description = $request->description;
    //         $project->range_id     = $request->range;
    //         $project->project_type_id= $project_type;
    //         $project->updated_by = Auth::user()->id;
    //         $project->updated_at = date("Y-m-d H:m:i");
    //       if($project->save())
    //         {
    //             Session::flash('success', 'Successfully Updated !'); 
    //             $success = array('success'=>"Successfully Updated !");
    //             $this->addProjectPhoto($request,$id);
    //             //return response()->json(['url'=>url('/admin/company-project/'.$project->company_id)]);
    //             return response()->json($success);            
    //         }
    //         else
    //         {
    //             $errors = array('errors'=>"Something wrong !");
    //             return response()->json($errors);
    //         }
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request,$id)
    {
        $product = CompanyProject::findOrFail($id);
        $this->deleteProjectPhoto($request,$id);
        if($product->delete())
        {
            $request->session()->flash('process_success', 'Deleting Process Successfully completed !');
        }
        else
            $request->session()->flash('process_fail', 'Deleting Process Fail !');
          return Redirect::back();
        //return redirect(route('project.index'));
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function adminprojectdestroy(Request $request,$id,$company_id)
    {
         
        $product = CompanyProject::findOrFail($id);
        $this->deleteProjectPhoto($request,$id);
        if($product->delete())
        {
            $request->session()->flash('process_success', 'Deleting Process Successfully completed !');
        }
        else
            $request->session()->flash('process_fail', 'Deleting Process Fail !');
       //return redirect('admin/company-project/'.$company_id);
      // return redirect->back();
       return Redirect::back();
       //return redirect(route('admin.company.project',['id'=>$company_id]));
    }
     /**
     * Remove the specified photo from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function deleteProjectPhoto(Request $request,$id)
    {
        
       
    }

    private function validation($request)
    {
        $messages = [
            'name.required' => 'Project name is required',
            'project_type.required'=>'Project Type is required'
        ];

        $validator = Validator::make($request->all(), [
                'name' => "required",
                'project_type'=>"required"
            ], $messages);
        
        return $validator; 

    }
    private function checkProjectType($request)
    {
        if(!empty($request->project_type))
            {
                $project_type_sql=ProjectType::select('id')->where('project_type_name',$request->project_type)->first();
                if(isset($project_type_sql))
                {
                    $project_type = $project_type_sql->id;
                }
                else{
                    $add_new_project_type = new ProjectType();
                    $add_new_project_type->project_type_name = $request->project_type;
                    $add_new_project_type->created_at = date("Y-m-d H:m:i");
                    $add_new_project_type->updated_at = date("Y-m-d H:m:i");
                    $add_new_project_type->save();
                    $project_type = $add_new_project_type->id;
                }
            }
        return $project_type;
    }
    public function getProjectType(Request $request)
    {
    
         if(isset($request->project))
         {
            $project_type =ProjectType::where('project_type_name','like','%'.$request->project.'%')->get();
            return response()->json($project_type);   
         }       
    }
     public static function makeUrl( $string ) 
    {
          $stripArr = array( '(', ')','{','}','[',']','','  ','_',
                          '!','-','&','<','>','<','\\','/',
                          '|','+','-',':',',','`','@','#','$',
                          '%','^','&','+','*','.','=','-','~','"','\''
          );
          $result = str_replace($stripArr,' ', $string); 
          return preg_replace('# {1,}#', '-', trim($result));
    }
    
     public function storesession(Request $request){
        //dd($request->id);exit();
          Session::put('projectcheck',$request->ids);
        
    }
    public function deleteall(Request $request){
        $ids = $request->ids;
        foreach( $ids as $id){
           CompanyProject::where('id','=',$id)->delete();
        }
        $success = array('success'=>"Successfully delete !");
                return response()->json($success);  
        
    }
}
