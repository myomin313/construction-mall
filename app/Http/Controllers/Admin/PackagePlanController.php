<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Company;
use App\PackagePlan;
use App\CurrencyUnit;
use Session;
use DB;
use Auth;
use App\User;

class PackagePlanController extends Controller
{
    // Start Company Panel
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $login_company_id=Session::get('login_company_id');
        $company = Company::Where('id',$login_company_id)->with('parent_categories','user','packageplan','package_plan')->first();
        $package_plans = PackagePlan::with('currency_unit:id,unit')->orderBy('id','desc')->get();

        return view('backend.company.package.buy_package',compact('package_plans','company'));
    }
    public function history()
   {
     $id = Session::get('login_company_id');        
         $company_package_plans = Company::join('company_package_plan','company_package_plan.company_id','=','companies.id')
                      ->join('package_plans','package_plans.id','=','company_package_plan.package_plan_id')
                      ->join('currency_units','currency_units.id','=',
                        'package_plans.currency_unit_id')
                      ->join('users','users.id','=','companies.user_id')
                      ->where('companies.id','=',$id)
                      ->select('users.name as company_name','users.name as name','users.email as email','users.phone as phone','package_plans.name as packageplan_name',
                         'package_plans.price as price','company_package_plan.is_active',
                        'package_plans.price as price','company_package_plan.approve as approve','company_package_plan.start_date','company_package_plan.end_date','company_package_plan.created_at','company_package_plan.id','company_package_plan.company_id','company_package_plan.package_plan_id','currency_units.unit as unit')
                      ->orderBy('company_package_plan.is_active','desc')
                      ->orderBy('company_package_plan.created_at','desc')
                      ->paginate(10);
        //end
       
        $package_plans = PackagePlan::all();
        $company=Company::where('id',$id)->with('user')->first();
        return view('backend.company.package.package_plan_history',compact('company_package_plans','package_plans','company'));
   }
   //End Company Panel

    public function buypackages($id){
       
        $id = \Crypt::decrypt($id);
        if(is_numeric($id))
        {
         $package_plans = PackagePlan::orderBy('id','desc')->get();
         $company = Company::select('id','user_id')->where('id',$id)->with('user:id,name')->first();
        return view('admin.admin.company.buy-package',compact('package_plans','company','id'));
        }
         
    }
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function packageplanlistbyadmin()
    {
        $package_plans = PackagePlan::join('users as creater','creater.id','=','package_plans.created_by')
                              ->join('users as updater','updater.id','=','package_plans.updated_by')
                              ->join('currency_units','currency_units.id','=','package_plans.currency_unit_id')
                              ->select('package_plans.*','creater.name as creator','updater.name as updator','currency_units.unit as unit')
                              ->orderBy('name')
                              ->orderBy('created_at','DESC')->paginate(4);
                              
  
        return view('admin.packageplan.admin-packageplan-list',compact('package_plans'))
           ;
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result =DB::table('company_package_plan')->insert([
        'company_id' =>Session::get('login_company_id'),
        'package_plan_id'=>$request->id,
        'is_active' =>'0',
        'created_by'=>Session::get('login_company_id'),
        'updated_by'=>Session::get('login_company_id'),
        'created_at'=>date("Y-m-d H:m:i"),
        'approve' =>'Pending'
        ]);
        if($result)
        {
            $success = array('success'=>"Successfully Requested. Please wait for admin approval");
            return response()->json($success);            
        }else
        {
            $errors = array('errors'=>"Something wrong");
            return response()->json($errors);
        }

    }
    
    public function adminpackagestoreforCompany(Request $request)
    {
         
        $result =DB::table('company_package_plan')->insert([
        'company_id' =>$request->company_id,
        'package_plan_id'=>$request->id,
        'is_active' =>'0',
        'created_by'=>$request->company_id,
        'updated_by'=>$request->company_id,
        'created_at'=>date("Y-m-d H:m:i"),
        'approve' =>'Pending'
        ]);
        if($result)
        {
            $success = array('success'=>"Successfully requested.");
            return response()->json($success);            
        }else
        {
            $errors = array('errors'=>"Something wrong");
            return response()->json($errors);
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
        if(is_numeric($id))
        {
            $package_plan= PackagePlan::find($id); 
            $currency_units = CurrencyUnit::select(['id','currency_name','unit'])->where('is_active','1')->get();

        return view('admin.packageplan.edit',compact('package_plan','currency_units'));
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
        //
        $request->validate([
            'price'=> 'required',
            'name'=> 'required',
            'periods'=> 'required',
            

        ]);
        
        $package_plan= PackagePlan::find($id);
        $package_plan->price=$request->price;
        $package_plan->currency_unit_id = $request->currency;
        $package_plan->name=$request->name;
        $package_plan->periods=$request->periods;
        $package_plan->updated_at=date('Y-m-d H:i:s');
        $package_plan->updated_by=Auth::user()->id;
        
         if($package_plan->save())
            {
                $success = array('success'=>"Successfully save changes.");
                
                return redirect()->route('packageplans.index')
                        ->with('success','Updated successfully');
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
    public function destroy($id)
    {
        $package_plan= PackagePlan::find($id);  
        $package_plan->delete();
  
        return redirect()->route('packageplans.index')
                        ->with('success','Product deleted successfully');
    }
   public function updateapprove(Request $request){
        try{  
            $package=PackagePlan::find($request->active_package_plan_id); 
            
            if($request->approve =='Success'){
                $data['is_active']='1';
                $start_date=date('Y-m-d');
            $no_days = $package->periods;
            $adate = strtotime("+".$no_days." days", strtotime($start_date));
            $data['end_date']=date("Y-m-d", $adate);
            $data['start_date']=date('Y-m-d');
            $data['approve']=$request->approve;
            $data['updated_by'] = Auth()->user()->id;
            $data['updated_at'] = date('Y-m-d H:i:s');
            
             DB::table('company_package_plan')->where('id','=',$request->id)
            ->update($data);
            
             DB::table('company_package_plan')->where('id','!=',$request->id)
              ->where('company_id','=',$request->company_id)
              ->update(['is_active'=>'0']);

            }else{
                $data['end_date']=null;
                $data['start_date']=null;
                $data['is_active']='0';
                $data['approve']=$request->approve;
                $data['updated_by'] = Auth()->user()->id;
               $data['updated_at'] = date('Y-m-d H:i:s');
               
                DB::table('company_package_plan')->where('id','=',$request->id)
            ->update($data);
            }
            // $data['approve']=$request->approve;
            // $data['updated_by'] = Auth()->user()->id;
            // $data['updated_at'] = date('Y-m-d h:i:s'); 
            
            if($request->approve == 'Success'){
               $company=Company::find($request->company_id);
               $company->active_package_plan_id=$request->active_package_plan_id;
               $company->save();
            }
             Session::flash('success', 'Successfully Change Status!'); 
            $success = array('success'=>"Successfully Status Changes!");
            return response()->json($success);  
        }catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        } 
       
   }
  
   public function packageListsOfcompanyByAdmin($id)
   {
       
      $id = \Crypt::decrypt($id);
      $company_package_plans = Company::where('id',$id)->with('package_plan')->first();
      $package_plans = PackagePlan::paginate(10);
      //$user=User::where('id',$id)->first();
      $company=Company::where('id',$id)->with('user')->first();
     return view('admin.admin.company.company_packageplans',compact('company_package_plans','package_plans','company'));
   }
    public function admincompanyPackage(Request $request)
   {
         $data = $request->all(); 
         $company_name=$request->company_name;
         $is_active=$request->is_active;
         $start_date=$request->start_date;
         $end_date=$request->end_date;
         
         
           
    // $id = Session::get('login_company_id');
        //$company_package_plans = Company::with('package_plan')->get();
        //$package_plans = PackagePlan::all();
         $company_package_plans = Company::join('company_package_plan','company_package_plan.company_id','=','companies.id')
                      ->join('package_plans','package_plans.id','=','company_package_plan.package_plan_id')
                      ->join('users','users.id','=','companies.user_id')
                      ->where(function($query)use($company_name) {
                            $query->where('users.name','like','%'.$company_name.'%');
                         })
                      ->where(function($query)use($is_active){
                            if($is_active != null && $is_active != '3' && $is_active != '1'){
                             $query->where('company_package_plan.is_active','=',$is_active);
                            }else if($is_active != null &&  $is_active == '3'){
                             $query->where('company_package_plan.end_date','<',date('Y-m-d'));
                               $query->where('company_package_plan.is_active','=','1');
                            }else if($is_active != null &&  $is_active == '1'){
                              $query->where('company_package_plan.end_date','>',date('Y-m-d'));
                               $query->where('company_package_plan.is_active','=','1');   
                            }
                         })
                      ->where(function($query)use($start_date){
                            if(!empty($start_date))
                            $query->whereDate('company_package_plan.start_date', '=', $start_date);
                         })
                      ->where(function($query)use($end_date){
                            if(!empty($end_date))
                            $query->whereDate('company_package_plan.end_date', '=', $end_date);
                         })
                       ->select('users.name as company_name','users.email as email','users.phone as phone','package_plans.name as packageplan_name','company_package_plan.is_active',
                        'package_plans.price as price','company_package_plan.approve as approve','company_package_plan.start_date','company_package_plan.end_date','company_package_plan.created_at','company_package_plan.id','company_package_plan.company_id','company_package_plan.package_plan_id')
                      ->orderBy('company_package_plan.created_at','desc')
                      ->orderBy('company_package_plan.is_active','desc')
                      ->paginate(10);
                      
                      
                      $package_plans = PackagePlan::all();
        return view('admin.admin.company-package.history',compact('company_package_plans','package_plans','is_active','start_date','end_date','data'));
   }

}
