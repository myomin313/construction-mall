<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CompanyCompanyAdvertisingPlan;
use App\CompanyAdvertisingPlan;
use App\Company;
use App\User;
use App\Helper\AllHelper;
use Session;
use DB;


class CompanyAdvertisingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
         $data = $request->all();
         $start_date = $request->start_date;
         $end_date = $request->end_date;
        $is_active   = $request->is_active;
        $company_name =$request->company_name;
        $plan_id = $request->plan_id;
        $advertising_plans=CompanyAdvertisingPlan::all();
       
        $advertising_lists = DB::table('company_company_advertising_plan')
        ->leftjoin('companies', 'companies.id', '=', 'company_company_advertising_plan.company_id')
        ->leftjoin('users', 'users.id', '=', 'companies.user_id')
        ->leftjoin('company_advertising_plans', 'company_advertising_plans.id', '=', 'company_company_advertising_plan.company_advertising_plan_id')
         ->where(function($query)use($company_name){
                if(!empty($company_name) )                
                $query->where('users.name','like', "%".$company_name."%");
             })
        ->where(function($query)use($plan_id){
                if(!empty($plan_id) )                
            $query->where('company_company_advertising_plan.company_advertising_plan_id','=',$plan_id);
             })
        ->where(function($query)use($start_date){
                if(!empty($start_date) )                
            $query->where('company_company_advertising_plan.start_date','=',$start_date);
             })
        ->where(function($query)use($end_date){
                if(!empty($end_date) )                
            $query->where('company_company_advertising_plan.end_date','=',$end_date);
             })
        ->where(function($query)use($is_active){
                if($is_active != null)
                 $query->where('company_company_advertising_plan.is_active',$is_active);
             })
        ->select('users.name','company_advertising_plans.plan_name','company_company_advertising_plan.start_date','company_company_advertising_plan.end_date','company_company_advertising_plan.is_active',
            'company_company_advertising_plan.created_at','company_company_advertising_plan.updated_at','company_company_advertising_plan.id')     
            //->orderBy('users.name','desc')
            ->orderBy('company_company_advertising_plan.created_at','desc')
            ->orderBy('users.name','asc')
            ->paginate(10);
            
        return view('admin.company-advertising.index',compact('advertising_lists','data','advertising_plans','request'));
          //  ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
         $companies=Company::with('user')->get();
         $advertising_plans=CompanyAdvertisingPlan::all();
        return view('admin.company-advertising.new',compact('companies','advertising_plans'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'start_date' => 'required',
         ]);
  
        try{
            
              $plan=  CompanyAdvertisingPlan::where('id','=',$request->plan_id)->select('periods')->first();
      $end_date= date('Y-m-d',strtotime('+'.$plan->periods.'days',strtotime($request->start_date)));
      
        // $start= CompanyCompanyAdvertisingPlan::where('company_id','=',$request->company_id)->where('company_advertising_plan_id','=',$request->plan_id)->whereDate('end_date','>',$request->start_date)->select('id')->first();
        
       
        //   if(isset($start->id)){
        //     $id= $start->id; 
        //   }else{
        //     $id=""; 
        //   }
        //  if(empty($id)){
            $advertising = new CompanyCompanyAdvertisingPlan;
            $advertising->company_id = $request->company_id;
            $advertising->company_advertising_plan_id = $request->plan_id;
            $advertising->start_date = $request->start_date;
            $advertising->end_date = $end_date;
            //$blog->save();
            if ($advertising->save())
            {
                  $success = array('success'=>"Successfully save changes.");                
                return redirect()->route('companyadvertisinglist.index')
                        ->with('success','updated successfully');
            }
            else
            {
                $errors = array('errors'=>"Something wrong");
                return $errors;
            }
        //   }else{
              
        //         return back()->with('process_fail','You have already advertised this  plan name with this date!Please choose another date or another plan name');
                        
        //   }
        }catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
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
     public function updateAdvertisingStatus(Request $request)
    {
        $result = AllHelper::updateStatus($request,'App\CompanyCompanyAdvertisingPlan');
       return response()->json($result);

      // try{  
      //       $data['is_active']=$request->is_active;
      //      DB::table('company_company_advertising_plan')->where('id','=',$request->id)
      //       ->update($data);
      //        Session::flash('success', 'Successfully Change Status!'); 
      //       $success = array('success'=>"Successfully saved Changes.");
      //       return response()->json($success);  
      //   }catch (\Illuminate\Database\QueryException $ex) {
      //       $res['status'] = false;
      //       $res['message'] = $ex->getMessage();
      //       return response($res, 500);
      //   } 
        
        
    }
    
    
}
