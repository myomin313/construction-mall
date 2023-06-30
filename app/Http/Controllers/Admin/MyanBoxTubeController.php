<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Myanboxtube;
use App\Helper\AllHelper;
use Illuminate\Support\Facades\Validator;
use Session;

class MyanBoxTubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
             $data = $request->all(); 
             $name=$request->name;
             $is_active=$request->is_active;
          
       $myanboxtubes = Myanboxtube::where(function($query)use($name){
                if(!empty($name) )                
                $query->where('title','like', "%".$name."%");
             })
                ->where(function($query)use($is_active){
                if($is_active != null)
                 $query->where('is_active',$is_active);
             })
             ->orderBy('title','desc')->paginate(10);
  
        return view('admin.myanboxtube.index',compact('myanboxtubes','data','name','is_active'));
    }
    
    // public function search(Request $request){
        
    //          $data = $request->all(); 
    //          $name=$request->name;
    //          $is_active=$request->is_active; 
        
    //                           $myanboxtubes = Myanboxtube::where(function($query)use($name){
    //             if(!empty($name) )                
    //             $query->where('title','like', "%".$name."%");
    //          })
    //             ->where(function($query)use($is_active){
    //             if($is_active != null)
    //              $query->where('is_active',$is_active);
    //          })
                 
    //                           ->orderBy('title', 'desc')->paginate(10);
                     
            
    //     return view('admin.myanboxtube.index',compact('myanboxtubes','data'));
        
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.myanboxtube.create');
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
        
      /*     $request->validate([
           'title' => 'required',
            'link'=>'required'
      ]);
  
          try{
           $myanboxtube = new Myanboxtube();
           $myanboxtube->title=$request->title;
          $myanboxtube->link=$request->link;
            $myanboxtube->image=$request->image;

            if($myanboxtube->save())
             {
                 $success = array('success'=>"Successfully save changes.");
                
               return redirect()->route('myanboxtube.index')
                         ->with('success','Created successfully!');
             }else
             {
                 $errors = array('errors'=>"Something wrong");
                 return $errors;
             }
          }
      catch (\Illuminate\Database\QueryException $ex) {
             $res['status'] = false;
             $res['message'] = $ex->getMessage();
             return response($res, 500);
         } */

      
         $status = $this->validation($request);
        if($status->fails())
        {
             $errors =array('errors'=>$status->messages());
             return response()->json($errors); 
        }
        else{
                $myanboxtube = new Myanboxtube();
                $myanboxtube->title=$request->title;
                $myanboxtube->link=$request->link;
                $myanboxtube->image=$request->image_name;
               if($myanboxtube->save())
                {
                     Session::flash('success', 'Created successfully!'); 
                    $success = array('success'=>"Created success!");
                    return response()->json($success);            
                }else
                {
                    $errors = array('errors'=>"Something wrong!");
                    return response()->json($errors);
                }
            }  
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$pageno)
    {   
        $id = \Crypt::decrypt($id);
        $pageno = \Crypt::decrypt($pageno);

         if(is_numeric($id))
         {
             Session::put('pageno',$pageno);
            $myanboxtube= Myanboxtube::find($id); 
            return view('admin.myanboxtube.edit',compact('myanboxtube'));
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
           $myanboxtube= Myanboxtube::find($id);
           $myanboxtube->title = $request->title;
           $myanboxtube->link  = $request->link;
           $myanboxtube->image = $request->image_name;
           $myanboxtube->updated_at = date('Y-m-d H:i:s');

           if($myanboxtube->save())
            {
                
                if( $request->image_name != $request->old_image){
                 if(Storage::disk('public')->exists('/myanboxtube/'.$request->old_image)){
                   unlink(storage_path('app/public/myanboxtube/'.$request->old_image));
                 }
                }
                 Session::flash('success', 'Updated Successfully!'); 
                $success = array('success'=>"Successfully update changes!");
                return response()->json($success);            
            }else
            {
                $errors = array('errors'=>"Something wrong!");
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
    public function destroy($id)
    {
        $myanboxtube= Myanboxtube::find($id);  
        $myanboxtube->delete();
  
        return back()->with('success','Deleted successfully!');
    }
    
     private function validation($request)
    {
      $messages = [
            'title.required' => 'Title is required',
            'link.required' => 'Link  is required', 
            'image_name.required' => "Image is required",
        ];

        $validator = Validator::make($request->all(), [
            'title' => "required|max:58", 
            'image_name' => "required",
             'link'=>'required|nullable|url',
            ], $messages);
            
        
        return $validator; 

    }    
     public function updatestatus(Request $request){

       $result = AllHelper::updateStatus($request,'App\Myanboxtube');
       return response()->json($result);

    }
    public function storesession(Request $request){
        //dd($request->id);exit();
          Session::put('myanboxcheck',$request->ids);
        
    }
    public function deleteall(Request $request){
       $result = AllHelper::deleteAll($request,'App\Myanboxtube');
       return response()->json($result);          
    }
}
