<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\AllHelper;
use App\FreelancerStatus;
use Session;

class FreelancerStatusListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = FreelancerStatus::latest()->orderBy('freelancer_status_name')->paginate(10);
  
        return view('admin.freelancerstatus.index',compact('statuses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
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
    public function edit($id)
    {
        
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
    public function updatefreelancerStatus(Request $request)
    {
        $result = AllHelper::updateStatus($request,'App\FreelancerStatus');
        return response()->json($result);
    // try{  
    //         $data['is_active']=$request->is_active;
    //         $data['updated_at'] = date('Y-m-d H:i:s');
    //        FreelancerStatus::where('id','=',$request->id)
    //         ->update($data);
    //         Session::flash('success', 'Successfully Change Status!'); 
    //         $success = array('success'=>"Successfully saved Changes!");
    //         return response()->json($success);  
    //     }catch (\Illuminate\Database\QueryException $ex) {
    //         $res['status'] = false;
    //         $res['message'] = $ex->getMessage();
    //         return response($res, 500);
    //     } 
    } 

}
