<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\UserCoin;
use Auth;
use App\User;
use App\CoinPlan;
use App\CoinPlanUser;
use Session;
use App\Company;
use App\Quotation;
use App\CurrencyUnit;
class CoinPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{ 

            $coinplan_lists = DB::table('coin_plans')->where('is_active','=','1')->get();
            
            return view('admin.coinplan.index',compact('coinplan_lists'));
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admincoinplanindex()
    {
        try{ 

            $coinplan_lists = DB::table('coin_plans')
                              ->join('users as creater','creater.id','=','coin_plans.created_by')
                              ->join('users as updater','updater.id','=','coin_plans.updated_by')
                              ->join('currency_units','currency_units.id','=','coin_plans.currency_unit_id')
                              ->select('coin_plans.*','creater.name as creator','updater.name as updator','currency_units.unit as unit')
                              ->orderBy('created_at','DESC')
                              ->paginate(10);
                             
            return view('admin.admin.coinplan.list',compact('coinplan_lists'));
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        try{

            //$id = (int)$id;//string to int
            $usercoin = new UserCoin();
            $usercoin->coin_plan_id= $id;
            $usercoin->user_id=Auth::user()->id;
            $usercoin->created_by = $usercoin->user_id;
            $usercoin->updated_by = $usercoin->user_id;
        
            $usercoin->save();
 
            if($usercoin->save())
            {
                $success = array('success'=>"Successfully save changes.");
                $coinplan_lists = DB::table('coin_plans')->get();
                return view('admin.coinplan.index',compact('coinplan_lists'));
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
        //
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
            $coin_plan= CoinPlan::find($id); 
            $currency_units = CurrencyUnit::select(['id','currency_name','unit'])->where('is_active','1')->get();
            return view('admin.admin.coinplan.edit',compact('coin_plan','currency_units'));
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
         $request->validate([
            'coin_count'=> 'required',
            'price'=> 'required',
           
        ]);
        
        $coin_plan= CoinPlan::find($id);
        $coin_plan->coin_count=$request->coin_count;
        $coin_plan->currency_unit_id=$request->currency;
        $coin_plan->price=$request->price;
        $coin_plan->updated_by=Auth::user()->id;
        $coin_plan->updated_at=date('Y-m-d H:i:s');
        
         if($coin_plan->save())
            {
                //$success = array('success'=>"Successfully save changes.");
                
                return redirect('admin/coinplan?page='.Session::get('pageno'))
                        ->with('success','updated successfully');
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
        //
    }
     public function buyCoin(Request $request)
    {
        $result =DB::table('coin_plan_user')->insert([
        'coin_plan_id' =>$request->id,
        'user_id'=>Auth::user()->id,
        'created_by'=>Auth::user()->id,
        'updated_by'=>Auth::user()->id,
        'created_at'=>date("Y-m-d H:m:i"),
        'updated_at'=>date("Y-m-d H:m:i")
        ]);
        if($result)
        {
            $success = array('success'=>"Your coin request is Success! Please wait for admin to approve your request");
            return response()->json($success);            
        }else
        {
            $errors = array('errors'=>"Something wrong");
            return response()->json($errors);
        } 
    }
    public function buyCoinhistory(Request $request)
    {
        $id = Auth::user()->id;
        $coin_histories = User::where('id',$id)->with('coin_plan')->first();
        return view('admin.coinplan.history',compact('coin_histories'));
    }
    public function buyCompanyCoinhistory(Request $request){
        
         $id = Auth::user()->id;
         
        // $coin_histories = User::where('id',$id)->with('coin_plan')->first();
         $coin_histories=User::join('coin_plan_user',
            'coin_plan_user.user_id','=','users.id')
             ->join('coin_plans','coin_plans.id','=','coin_plan_user.coin_plan_id')
             ->join('currency_units','currency_units.id','=',
                'coin_plans.currency_unit_id')
             ->where('coin_plan_user.user_id','=',$id)
             ->select('coin_plan_user.user_id','users.name as name','coin_plan_user.status','coin_plans.coin_count','coin_plans.price','coin_plan_user.id','coin_plan_user.created_at','currency_units.unit as unit')
             ->orderBy('coin_plan_user.id','desc')
             ->paginate(10);
             
               $company=Company::where('user_id',$id)->where('is_active','1')->with(['user','user.coin_plan','location','categories','parent_categories','child_categories','packageplan'])->first();
        
        
        return view('backend.company.coin.coin_plan_history',compact('coin_histories','company'));
        
    }
     public function buyUserCoinhistory(Request $request)
    {
        $id = Auth::user()->id;

        $coin = User::with(['coin_plan' => function($query){
           },'coin_plan.currency_unit:id,unit'])->where('id',$id)->first();
        $coin_histories = $coin->coin_plan()->orderBy('coin_plan_user.id','desc')->paginate(10);
         
            //end
        
       // $coin_histories = User::where('id',$id)->with(['coin_plan'=>function(query){$query->first()}])->paginate(10);
       
            // start
            //start
        $userData = DB::table('users')->where('id','=',$id)->first();  

        $usercoin_lists = DB::table('coin_plan_user')
        ->join('coin_plans', 'coin_plans.id', '=', 'coin_plan_user.coin_plan_id')
        ->join('users', 'users.id', '=', 'coin_plan_user.user_id')
        ->select('users.name', 'coin_plan_user.coin_plan_id', 'coin_plan_user.status', 'coin_plan_user.id', 'coin_plan_user.user_id'
        , 'coin_plans.coin_count', 'coin_plans.price')
        ->where('coin_plan_user.user_id', '=',  $id)
        ->get();

         $usercoin_received = DB::table('coin_plan_user')
        ->join('coin_plans', 'coin_plans.id', '=', 'coin_plan_user.coin_plan_id')
        ->join('users', 'users.id', '=', 'coin_plan_user.user_id')
        ->where('coin_plan_user.user_id', '=',  $id)
        ->where('coin_plan_user.status', '=', 'approved')
        ->count();
        $count= Quotation::where('send_user_id',$id)->count();
        $quotations_success="";
        $quotations_pending="";
        $quotations_request="";
        $quotations_success_count=0;
        $quotations_request_count=0;
        if($count >0){
         $quotations_success = Quotation::where('send_user_id',$id)->with(['range','category','received_company'=>function($q){
                $q->where('quotation_received_companys.requested_status','received')->get();
             },'send_user','quotation_created_user','quotation_updated_user'])->get();
             
        $quotations_pending = Quotation::where('send_user_id',$id)->with(['range','category','send_user','quotation_created_user','quotation_updated_user','received_company'=>function($q){
                $q->where('quotation_received_companys.requested_status','pending')->get();
             }])->get();
             
        $quotations_request = Quotation::where('send_user_id',$id)->with('range','category','send_user','quotation_created_user','quotation_updated_user')->get();
         $quotations_success_count = $quotations_success->first()->received_company->count();
        $quotations_request_count = $quotations_request->count(); 
       }
       $usercoin_lists_count = $usercoin_lists->count();
        $quotation_statuses = Quotation::getEnum('quotation_received_companys','received_status');
            //end
            //end

        // return view('admin.coinplan.user_coinplan_history',compact('coin_histories'));
         
          return view('backend.user.coin.coin_plan_history',compact('coin_histories','userData','quotation_statuses','usercoin_lists_count','quotations_request_count','quotations_success_count','quotations_request','quotations_pending','quotations_success','usercoin_received','usercoin_lists'));
    }
    
    public function buyuserCoinplan(){

        try{
            $coinplan_lists = CoinPlan::with('currency_unit:id,unit')->where('is_active','=','1')->get();
              //start
               $id=Auth()->user()->id;
             $userData = DB::table('users')->where('id','=',$id)->first();
             
             
        $usercoin_lists = DB::table('coin_plan_user')
        ->join('coin_plans', 'coin_plans.id', '=', 'coin_plan_user.coin_plan_id')
        ->join('users', 'users.id', '=', 'coin_plan_user.user_id')
        ->select('users.name', 'coin_plan_user.coin_plan_id', 'coin_plan_user.status', 'coin_plan_user.id', 'coin_plan_user.user_id'
        , 'coin_plans.coin_count', 'coin_plans.price')
        ->where('coin_plan_user.user_id', '=',  $id)
        ->get();

         $usercoin_received = DB::table('coin_plan_user')
        ->join('coin_plans', 'coin_plans.id', '=', 'coin_plan_user.coin_plan_id')
        ->join('users', 'users.id', '=', 'coin_plan_user.user_id')
        ->where('coin_plan_user.user_id', '=',  $id)
        ->where('coin_plan_user.status', '=', 'approved')
        ->count();
        $count= Quotation::where('send_user_id',$id)->count();
        $quotations_success="";
        $quotations_pending="";
        $quotations_request="";
        $quotations_success_count=0;
        $quotations_request_count=0;
        if($count >0){
         $quotations_success = Quotation::where('send_user_id',$id)->with(['range','category','received_company'=>function($q){
                $q->where('quotation_received_companys.requested_status','received')->get();
             },'send_user','quotation_created_user','quotation_updated_user'])->get();
             
        $quotations_pending = Quotation::where('send_user_id',$id)->with(['range','category','send_user','quotation_created_user','quotation_updated_user','received_company'=>function($q){
                $q->where('quotation_received_companys.requested_status','pending')->get();
             }])->get();
             
        $quotations_request = Quotation::where('send_user_id',$id)->with('range','category','send_user','quotation_created_user','quotation_updated_user')->get();
         $quotations_success_count = $quotations_success->first()->received_company->count();
        $quotations_request_count = $quotations_request->count(); 
       }
       $usercoin_lists_count = $usercoin_lists->count();
        $quotation_statuses = Quotation::getEnum('quotation_received_companys','received_status');
        
        
            //end
           // return view('admin.coinplan.user_coinplan',compact('coinplan_lists'));
           
           return view('backend.user.coin.buy_coin',compact('coinplan_lists','userData','quotation_statuses','usercoin_lists_count','quotations_request_count','quotations_success_count','quotations_request','quotations_pending','quotations_success','usercoin_received','usercoin_lists'));
           
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }

    }
    //start
    public function buycompanyCoinplan(){

        try{
            $coinplan_lists = CoinPlan::with('currency_unit:id,unit')->where('is_active','=','1')->get();
              //start
               $id=Auth()->user()->id;
             $userData = DB::table('users')->where('id','=',$id)->first();
        $usercoin_lists = DB::table('coin_plan_user')
        ->join('coin_plans', 'coin_plans.id', '=', 'coin_plan_user.coin_plan_id')
        ->join('users', 'users.id', '=', 'coin_plan_user.user_id')
        ->select('users.name', 'coin_plan_user.coin_plan_id', 'coin_plan_user.status', 'coin_plan_user.id', 'coin_plan_user.user_id'
        , 'coin_plans.coin_count', 'coin_plans.price')
        ->where('coin_plan_user.user_id', '=',  $id)
        ->get();

         $usercoin_received = DB::table('coin_plan_user')
        ->join('coin_plans', 'coin_plans.id', '=', 'coin_plan_user.coin_plan_id')
        ->join('users', 'users.id', '=', 'coin_plan_user.user_id')
        ->where('coin_plan_user.user_id', '=',  $id)
        ->where('coin_plan_user.status', '=', 'approved')
        ->count();
        $count= Quotation::where('send_user_id',$id)->count();
        $quotations_success="";
        $quotations_pending="";
        $quotations_request="";
        $quotations_success_count=0;
        $quotations_request_count=0;
        if($count >0){
         $quotations_success = Quotation::where('send_user_id',$id)->with(['range','category','received_company'=>function($q){
                $q->where('quotation_received_companys.requested_status','received')->get();
             },'send_user','quotation_created_user','quotation_updated_user'])->get();
             
        $quotations_pending = Quotation::where('send_user_id',$id)->with(['range','category','send_user','quotation_created_user','quotation_updated_user','received_company'=>function($q){
                $q->where('quotation_received_companys.requested_status','pending')->get();
             }])->get();
             
        $quotations_request = Quotation::where('send_user_id',$id)->with('range','category','send_user','quotation_created_user','quotation_updated_user')->get();
         $quotations_success_count = $quotations_success->first()->received_company->count();
        $quotations_request_count = $quotations_request->count(); 
       }
       $usercoin_lists_count = $usercoin_lists->count();
        $quotation_statuses = Quotation::getEnum('quotation_received_companys','received_status');
            //end
           // return view('admin.coinplan.user_coinplan',compact('coinplan_lists'));
           //  myo min added
            $company = Company::Where('user_id',Auth()->user()->id)->with('parent_categories','user','packageplan','package_plan')->first();
            // myo min added end
           
           return view('backend.company.coin.buy_coin',compact('coinplan_lists','userData','quotation_statuses','usercoin_lists_count','quotations_request_count','quotations_success_count','quotations_request','quotations_pending','quotations_success','usercoin_received','usercoin_lists','company'));
           
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }

    }
    //end
      public function requestCoinhistoryForUserByAdmin(Request $request,$role)
    {
              $data=$request->all();
              $name=$request->name;
              $status=$request->status;
              $ordered_date = $request->ordered_date;
        $coin_histories=User::join('coin_plan_user',
            'coin_plan_user.user_id','=','users.id')
             ->join('coin_plans','coin_plans.id','=','coin_plan_user.coin_plan_id')
             ->where(function ($query) use ($name) {
                 $query->where('users.name','like','%'.$name.'%');
              })
            ->where(function($query)use($status){
                if(!empty($status))
                 $query->where('coin_plan_user.status','=',$status);
             })
             ->where(function($query)use($ordered_date){
                if(!empty($ordered_date))
                $query->whereDate('coin_plan_user.created_at', '=', $ordered_date);
             })
             ->where('users.role',$role)
             ->select('coin_plan_user.user_id','users.name as name','coin_plan_user.status','coin_plans.coin_count','coin_plans.price','coin_plan_user.id','coin_plan_user.created_at')
             ->orderBy('coin_plan_user.created_at','DESC')
             ->paginate(10);
       
        return view('admin.user.user-request-coin-history',compact('coin_histories','data','name','status','ordered_date','role'));
    }
    public function adminCoinForCompany($id)
    {
         $id = \Crypt::decrypt($id);

          $coin_histories=User::join('coin_plan_user',
            'coin_plan_user.user_id','=','users.id')
             ->join('coin_plans','coin_plans.id','=','coin_plan_user.coin_plan_id')
             ->where('coin_plan_user.user_id','=',$id)
             ->select('coin_plan_user.user_id','users.name as name','coin_plan_user.status','coin_plans.coin_count','coin_plans.price','coin_plan_user.id','coin_plan_user.created_at')
             ->paginate(10);
             
              $user=User::where('id',$id)->first();
           
        return view('admin.coinplan.history',compact('coin_histories','user'));
        
        //   $id = Auth::user()->id;
        // $coin_histories = User::where('id',$id)->with('coin_plan')->get();
        //  return view('admin.coinplan.history',compact('coin_histories'));
    }
     public function usedCoinHistory(Request $request)
    {
        // $id = Auth::user()->id;
        // $use_coin_histories = User::where('id',$id)->with('quotation','quotation.range','quotation.category','quotation.received_user')->first();
        // return view('admin.coinplan.used_coin_history',compact('use_coin_histories'));
              
            
         $id=Auth::user()->id;
             $use_coin_histories = DB::table('quotations')
             ->leftjoin('users', 'users.id', '=', 'quotations.send_user_id')
             ->leftjoin('ranges', 'ranges.id', '=', 'quotations.range_id')
             ->leftjoin('categories','categories.id','=','quotations.category_id')
             ->select('users.name as sender_user_name', 'quotations.used_coin','quotations.created_at','quotations.id','ranges.minimum_price',
             'ranges.maximum_price','categories.name as category_name','quotations.project_expected_start_date')
             ->where('quotations.send_user_id', '=',$id)
             ->get();
            foreach($use_coin_histories as $use_coin_history)
            {
                 $use_coin_history->received_users =DB::table('quotation_received_companys')
                                             ->leftjoin('companies as received', 'received.id', '=', 'quotation_received_companys.company_id')
                                             ->leftjoin('users', 'received.user_id', '=', 'users.id')
                                             ->where('quotation_received_companys.quotation_id','=',$use_coin_history->id)
                                             ->select('users.name as received_user_name','received.id','quotation_received_companys.received_status')
                                             ->get();
           }
        return view('admin.coinplan.used_coin_history',compact('use_coin_histories'));

    }
    //update Coin status record mhp
    public function updatestatus(Request $request)
    { 
        $user = User::find($request->user_id);
        $coin_plan = $user->coin_plan()->where(['user_id'=>$request->user_id,'coin_plan_id'=>$request->coin_plan_id])->first(); //get the first record
        if($request->status == "approved")
        {
            $user->left_coin += $request->coin_count;
            $user->coin+=$user->coin+$request->coin_count;
            $user->save();
        }
        $coin_plan->pivot->status = $request->status; //change col to a new value
        $coin_plan->pivot->created_by = $request->user_id;
        $coin_plan->pivot->updated_by = Auth::user()->id;
        $coin_plan->pivot->updated_at = date("Y-m-d H:m:i");
        $coin_plan->pivot->save(); 
        $success = array('success'=>"Successfully saved Changes.");
        return response()->json($success); 
    }
    //user used coin
      public function index_usedcoinhistory(Request $request)
    {
        

             $id=Auth::user()->id;
             $use_coin_histories = DB::table('quotations')
             ->leftjoin('users', 'users.id', '=', 'quotations.send_user_id')
             ->leftjoin('ranges', 'ranges.id', '=', 'quotations.range_id')
             ->leftjoin('categories','categories.id','=','quotations.category_id')
             ->select('users.name as sender_user_name', 'quotations.used_coin','quotations.created_at','quotations.id','ranges.minimum_price',
             'ranges.maximum_price','categories.name as category_name','quotations.project_expected_start_date')
             ->where('quotations.send_user_id', '=',$id)
             ->get();
            foreach($use_coin_histories as $use_coin_history)
            {
                 $use_coin_history->received_users =DB::table('quotation_received_companys')
                                             ->leftjoin('companies as received', 'received.id', '=', 'quotation_received_companys.company_id')
                                             ->leftjoin('users', 'received.user_id', '=', 'users.id')
                                             ->where('quotation_received_companys.quotation_id','=',$use_coin_history->id)
                                             ->select('users.name as received_user_name','received.id','quotation_received_companys.received_status')
                                             ->get();
           }
 
              return view('admin.coinplan.used_coin_history',compact('use_coin_histories'));
        
    }
     public function updateCoinPlanStatus(Request $request)
    {
    try{  
            $data['is_active']=$request->is_active;
            $data['updated_by'] = Auth()->user()->id;
            $data['updated_at'] = date('Y-m-d h:i:s');

           DB::table('coin_plans')->where('id','=',$request->id)
            ->update($data);
             Session::flash('success', 'Successfully Change Status!'); 
            $success = array('success'=>"Successfully saved Changes.");
            return response()->json($success);  
        }catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        } 
    } 
      public function updateRequestCoin(Request $request)
    {
    try{  
            $data['status']=$request->status;
            $data['updated_by'] = Auth()->user()->id;
            $data['updated_at'] = date('Y-m-d h:i:s');

           DB::table('coin_plan_user')->where('id','=',$request->id)
            ->update($data);
            
            if($request->status == 'Approved'){
              $user=User::find($request->user_id);
              $user->coin=$user->coin+$request->coin_count;
              $user->left_coin=$user->left_coin+$request->coin_count;
              $user->save();
            }
             Session::flash('success', 'Successfully Change Status!'); 
            $success = array('success'=>"Successfully saved Changes.");
            return response()->json($success);  
        }catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        } 
    }
     public function tobuycoinByAdmin($user_id,$url,$page)
    {

        try{ 
            Session::put('pageno',$page);
            $coinplan_lists = DB::table('coin_plans')->get();
             
            return view('admin.admin.company-coin.buy-coin',compact('coinplan_lists','user_id','url'));
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
     public function buyCoinByAdmin(Request $request)
    {
        $result =DB::table('coin_plan_user')->insert([
        'coin_plan_id' =>$request->id,
        'user_id'=>$request->user_id,
        'created_by'=>Auth::user()->id,
        'updated_by'=>Auth::user()->id,
        'created_at'=>date("Y-m-d H:m:i"),
        'status'=>'approved',
        ]);
           $coinplanuser=new CoinPlanUser;
           $coinplanuser->coin_plan_id=$request->id;
           $coinplanuser->user_id=$request->user_id;
           $coinplanuser->created_by=Auth::user()->id;
           $coinplanuser->updated_by=Auth::user()->id;
           $coinplanuser->created_at=date("Y-m-d H:m:i");
           $coinplanuser->status='approved';

        if($coinplanuser->save())
        {
            $user = User::find($request->user_id);
            if( $coinplanuser->status == "approved")
           {
            $user->left_coin += $request->coin_count;
            $user->coin += $request->coin_count;
            $user->save();
           }
             if($request->url == 'company') {
                $url = url('admin/companies?page='.Session::get('pageno'));
             }else{
                $url = url('admin/member_list');
             }
              return response()->json(['url'=>$url]);    
        }else
        {
            $errors = array('errors'=>"Something wrong");
            return response()->json($errors);
        } 
        
    }
    public function new(){
        $currency_units = CurrencyUnit::select(['id','currency_name','unit'])->where('is_active','1')->get();
        return view('admin.admin.coinplan.new',compact('currency_units'));
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
            'coin_count'=> 'required',
            'price'=> 'required',
           
        ]);
        
        $coin_plan= new CoinPlan;
        $coin_plan->coin_count=$request->coin_count;
        $coin_plan->price=$request->price;
        $coin_plan->currency_unit_id=$request->currency;
        $coin_plan->created_by=Auth::user()->id;
        $coin_plan->updated_by=Auth::user()->id;
        
         if($coin_plan->save())
            {
                $success = array('success'=>"Successfully save changes.");
                
                return redirect()->route('admin.coinplan.index')
                        ->with('success','updated successfully');
            }else
            {
                $errors = array('errors'=>"Something wrong");
                return $errors;
            }
    }


}
