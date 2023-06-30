<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\location;
use App\Helper\AllHelper;
use DB;
use Session;
class LocationController extends Controller
{
   
    public function getTownShip(Request $request){
        if($request->city_id){
                $townships = Location::where('parent_id',$request->city_id)->orderBy('name','asc')->get();
               
                return response()->json($townships);
        }
    }
    public function adminlocationindex(Request $request){
           
            $data = $request->all(); 
             $name=$request->name;
             $is_active=$request->is_active; 
             
                   $locations = DB::table('locations')
                              ->leftjoin('locations as parent','parent.id','=','locations.parent_id')
                              ->where(function($query)use($name){
                                   if(!empty($name) )                
                                 $query->where('locations.name','like', "%".$name."%");
                              })
                              ->where(function($query)use($is_active){
                                 if($is_active != null)
                                     $query->where('locations.is_active',$is_active);
                               })
                              ->select('locations.*','parent.name as parent_name')
                              ->orderBy('name','asc')
                              ->paginate(10);
                 
           return view('admin.admin.location.list',compact('locations','data','name','is_active'));

    }
    //  public function search(Request $request){
        
    //          $data = $request->all(); 
    //          $name=$request->name;
    //          $is_active=$request->is_active; 
                              
    //          $locations = DB::table('locations')
    //           ->leftjoin('locations as parent','parent.id','=','locations.parent_id')
    //         ->where(function($query)use($name){
    //             if(!empty($name) )                
    //             $query->where('locations.name','like', "%".$name."%");
    //          })
    //         ->where(function($query)use($is_active){
    //             if($is_active != null)
    //              $query->where('locations.is_active',$is_active);
    //          })
    //           ->select('locations.*','parent.name as parent_name')
    //         ->orderBy('name','asc') 
    //         ->paginate(10);
            
    //     return view('admin.admin.location.list',compact('locations','data'));
        
    // }
     public function edit($id,$page)
    {   
        $id = \Crypt::decrypt($id);
        $page = \Crypt::decrypt($page);

         if(is_numeric($id)){
              Session::put('pageno',$page);
        $location= Location::find($id);
        $locations=Location::where('parent_id','=',0)->get();
        return view('admin.admin.location.edit',compact('location','locations'));
         }
        
    }
     public function update(Request $request, $id)
    {
         $request->validate([
            'name' => 'required',
        ]);
        $data['is_active']=$request->is_active;

        $location= Location::find($id); 
        $location->parent_id=$request->parent_id;
        $location->name=$request->name;
        $location->created_by = Auth()->user()->id;
        $location->updated_by = Auth()->user()->id;
          
         if($location->save())
            {
                //$success = array('success'=>"Successfully save changes.");
                return redirect('admin/location?page='.Session::get('pageno'))
                        ->with('success','Updated successfully!');
                // return redirect()->route('admin.location.index')
                //         ->with('success','updated successfully');
            }else
            {
                $errors = array('errors'=>"Something wrong");
                return $errors;
            }
  
        
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function updatestatus(Request $request)
    {
       $result = AllHelper::updateStatusWithUpdater($request,'App\Location');
       return response()->json($result);
    } 
    
 
}
