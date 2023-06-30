<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Quotation;
use App\QuotationReceivedUser;
use App\CompanyCategory;
use Session;
use Auth;
use DB;
use App\Company;
use App\User;

class QuotationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         try{   

            $id=Auth::user()->id;
            $requestquote_lists = DB::table('quotations')
            ->join('users', 'users.id', '=', 'quotations.send_user_id')
            ->join('categories', 'categories.id', '=', 'quotations.category_id')
            ->leftjoin('users AS A', 'A.id', '=', 'quotations.send_user_id')
            ->leftjoin('users AS B', 'B.id', '=', 'quotations.received_user_id')
            ->select('A.name as sendername','B.name as receivername', 'quotations.used_coin', 'quotations.received_status', 'quotations.requested_status', 
            'quotations.received_user_id','quotations.send_user_id' ,'quotations.created_at','quotations.id','quotations.range_id',
            'categories.name', 'quotations.project_expected_start_date','quotations.project_current_situation','quotations.summary',
            'quotations.file', 'quotations.policy', 'quotations.created_by')
            ->where('quotations.send_user_id', '=',  $id) 
            ->get();
         
            return view('admin.quotation.index',compact('requestquote_lists'));
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
    #Company Received/Request Quotation Function
    // public function companyQuotation(Request $request,$status)
    // {
    //     $id = Auth::user()->id;
    //     switch ($status) {
    //         case 'received':
    //             $quotations = Quotation::where('received_user_id',$id)->with('range','category','send_user','quotation_created_user','quotation_updated_user')->get();
    //             break;
    //         case 'request':
    //             $quotations = Quotation::where('send_user_id',$id)->with('range','category','send_user','quotation_created_user','quotation_updated_user')->get();
    //             break;    
            
    //         default:
    //             echo "There is no quotation";
    //             break;
    //     }
    //     $quotation_statuses = Quotation::getEnum('quotations','received_status');
    //     return view('admin.quotation.list',compact('quotations','quotation_statuses','status'));
    // }
    
   public function admincompanyQuotationForCompany(Request $request,$id,$status)
    {
        
                // $id = Auth::user()->id;
         $id = \Crypt::decrypt($id);
         //dd($id);
          if(is_numeric($id))
         {
            $company=User::where('id',$id)->first();
            $originalcompany=Company::where('user_id',$id)->first();
         }
         $company_id= $originalcompany->id;

        switch ($status) {
            case 'received':
            $quotations = Quotation::with('range','category','send_user','quotation_created_user','quotation_updated_user','received_company')->whereHas('received_company', function($q) use ($company_id){
                    $q->where('quotation_received_companys.company_id',$company_id);
                })->paginate(10);   
                
                // start myo min
                  //start
                     
                    foreach($quotations as $quotation){
                        if($quotation->send_user->role == '2'){    
                             $quotation->main_category=Company::leftjoin('category_company','category_company.company_id','=','companies.id')
                                 ->leftjoin('categories','categories.id','=','category_company.category_id')
                                 ->where('companies.user_id','=',$quotation->send_user->id)
                                 ->where('categories.parent_id','=',0)
                                 ->select('category_company.category_id','categories.category_url','companies.company_url')->first();
                    }
                 }
                 //end
                // end myo min
                break; 
            case 'request':
            $quotations = Quotation::where('send_user_id',$id)->with('range','category','send_user','quotation_created_user','quotation_updated_user','received_company')->paginate(10);
            
                // start myo min
                 foreach($quotations as $quotation){
                       foreach($quotation->received_company as $received_company){
                           
                           $received_company->cate=CompanyCategory::
                               leftjoin('categories','categories.id','=','category_company.category_id')->where('company_id','=',$received_company->id)->where('categories.parent_id','=',0)->select('category_id','categories.category_url')->first();
                               
                       }
                   }
                // end myo min
                
                break;
            default:
                echo "There is no quotation";
                break;
        }
       $quotation_statuses = Quotation::getEnum('quotation_received_companys','received_status');
     
        
        return view('admin.admin.company.company_quotation',compact('quotations','quotation_statuses','status','company','company_id'));
    }
    #Company Received/Request Quotation Function
    public function admincompanyQuotation(Request $request,$status)
    {
        
        // dd("hii");
        // $id = Auth::user()->id;
         // dd("hi");exit();  
        // switch ($status) {
        //     case 'received':
        //          $quotations = Quotation::with('range','category','send_user','quotation_created_user','quotation_updated_user','received_company','received_company.user','location')->get();


        //         // $quotations = Quotation::leftjoin('ranges','ranges.id','=','quotations.range_id')
        //         // ->leftjoin('categories','categories.id','=','quotations.category_id')
        //         // ->leftjoin('users as send_user','send_user.id','=','quotations.send_user_id')
        //         // ->leftjoin('users as created_user','created_user.id','quotations.created_by')
        //         //  ->leftjoin('users as updated_user','updated_user.id','quotations.updated_by')
        //         //  ->select('quotations.*','categories.name as category_name','send_user.name as send_user_name','created_user.name as creater','updated_user.name as updater','ranges.minimum_price','ranges.maximum_price')
        //         //  ->orderBy('project_expected_start_date','DESC')
        //         //  ->get();
                    
                
        //         //   foreach($quotations as $quotation){
        //         //         $quotation->received_user=QuotationReceivedUser::join('users as received_user','received_user.id','=','quotation_received_users.user_id')
        //         //         ->where('quotation_received_users.quotation_id','=',$quotation->id)
        //         //         ->select('quotation_received_users.*','received_user.name as received_user_name','received_user.phone','received_user.logo','received_user.name','received_user.email')
        //         //         ->orderBy('created_at','DESC')
        //         //         ->get();
        //         //   }
               
        //         break;
        //     case 'request':
        //          $quotations = Quotation::with('range','category','send_user','quotation_created_user','quotation_updated_user','received_user')->get();
           
        //         break;    
            
        //     default:
        //         echo "There is no quotation";
        //         break;
        // }
          // dd($quotations);exit();
           switch ($status) {
             case 'received':
         $data = $request->all;
         $requested_user = $request->requested_name;
         $received_user  = $request->receiver_name;
         $requested_status = $request->requested_status;
         $received_status = $request->received_status;
         $quotations = Quotation::with('range','category','send_user','quotation_created_user','quotation_updated_user','received_company','received_company.user','location');
                      if (!empty($requested_user)) {
                         $quotations->where(function ($query) use ($requested_user) {
                           $query->whereHas('quotation_created_user', function ($query) use ($requested_user) {
                            $query->where('users.name','like','%'.$requested_user.'%');
                             $query->where('users.role','=',2);
                           });
                         });
                       }else{
                           $quotations->where(function ($query){
                           $query->whereHas('quotation_created_user', function ($query){
                              $query ->where('users.role','=',2);
                           });
                          });
                       }
                       if (!empty($received_user)) {
                         $quotations->where(function ($query) use ($received_user) {
                           $query->whereHas('received_company.user', function ($query) use ($received_user) {
                            $query->where('users.name','like','%'.$received_user.'%');
                           });
                         });
                       }
                       if (!empty($requested_status)) {
                         $quotations->where(function ($query) use ($requested_status) {
                           $query->whereHas('received_company', function ($query) use ($requested_status) {
                            $query->where('quotation_received_companys.requested_status','=',$requested_status);
                           });
                         });
                       }
                       if (!empty($received_status)) {
                         $quotations->where(function ($query) use ($received_status) {
                           $query->whereHas('received_company', function ($query) use ($received_status) {
                            $query->where('quotation_received_companys.received_status','=',$received_status);
                           });
                         });
                       }
               $quotations=$quotations->paginate(10);
               
                //  foreach($quotations as $quotation){
                //         if($quotation->send_user->role == '2'){    
                //              $quotation->main_category=Company::leftjoin('category_company','category_company.company_id','=','companies.id')
                //                  ->leftjoin('categories','categories.id','=','category_company.category_id')
                //                  ->where('companies.user_id','=',$quotation->send_user->id)
                //                  ->where('categories.parent_id','=',0)
                //                  ->select('category_company.category_id','categories.category_url','companies.company_url')->first();
                //     }
                //  }
                 
                 foreach($quotations as $quotation){
                       
                       foreach($quotation->received_company as $received_company){
                           
                           $received_company->cate=CompanyCategory::
                               leftjoin('categories','categories.id','=','category_company.category_id')->where('company_id','=',$received_company->id)->where('categories.parent_id','=',0)->select('category_id','categories.category_url')->first();
                               
                       }
                   }
                
                
         $quotation_statuses = Quotation::getEnum('quotation_received_companys','received_status');
          break;
      case 'requested':
          $data = $request->all;
         $requested_user = $request->requested_name;
         $received_user  = $request->receiver_name;
         $requested_status = $request->requested_status;
         $received_status = $request->received_status;
         $quotations = Quotation::with('range','category','send_user','quotation_created_user','quotation_updated_user','received_company','received_company.user','location');
                      if (!empty($requested_user)) {
                         $quotations->where(function ($query) use ($requested_user) {
                           $query->whereHas('quotation_created_user', function ($query) use ($requested_user) {
                            $query->where('users.name','like','%'.$requested_user.'%');
                            $query->where('users.role','=',1);
                           });
                         });
                       }else{
                           $quotations->where(function ($query){
                           $query->whereHas('quotation_created_user', function ($query){
                              $query ->where('users.role','=',1);
                           });
                          });
                       }
                       if (!empty($received_user)) {
                         $quotations->where(function ($query) use ($received_user) {
                           $query->whereHas('received_company.user', function ($query) use ($received_user) {
                            $query->where('users.name','like','%'.$received_user.'%');
                           });
                         });
                       }
                       if (!empty($requested_status)) {
                         $quotations->where(function ($query) use ($requested_status) {
                           $query->whereHas('received_company', function ($query) use ($requested_status) {
                            $query->where('quotation_received_companys.requested_status','=',$requested_status);
                           });
                         });
                       }
                       if (!empty($received_status)) {
                         $quotations->where(function ($query) use ($received_status) {
                           $query->whereHas('received_company', function ($query) use ($received_status) {
                            $query->where('quotation_received_companys.received_status','=',$received_status);
                           });
                         });
                       }
               $quotations=$quotations->paginate(10);
               
                foreach($quotations as $quotation){
                       
                       foreach($quotation->received_company as $received_company){
                           
                           $received_company->cate=CompanyCategory::
                               leftjoin('categories','categories.id','=','category_company.category_id')->where('company_id','=',$received_company->id)->where('categories.parent_id','=',0)->select('category_id','categories.category_url')->first();
                               
                       }
                   }
                   
              $quotation_statuses = Quotation::getEnum('quotation_received_companys','received_status');
                  break;
                 default:
                 echo "There is no quotation";
                break;
           }
    
         
        return view('admin.admin.quotation.list',compact('quotations','quotation_statuses','status','requested_user','received_user','requested_status','received_status','data'));
    }
        //update Quotaion status record
         public function updatestatus(Request $request)
        { 
        try{  
            if($request->get('status') == "received"){
                $update_column = 'received_status';
            }
            elseif($request->get('status')=="requested"){
                $update_column = 'requested_status';
            }
            DB::table('quotation_received_companys')
            ->where('quotation_id', '=',$request->get('quotation_id'))
            ->where('company_id', '=',$request->get('company_id'))
            ->update([$update_column => $request->get('selectedvalue')]);
            Session::flash('success','Successfully Change Status!');
            $success = array('success'=>"Successfully Status Changes!");
            return response()->json($success);  
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }  

        }
        // public function updatestatus(Request $request)
        // { 
        //     try{  
        //         if($request->get('status') == "received"){
        //             $update_column = 'received_status';
        //         DB::table('quotation_received_users')
        //         ->where('quotation_id', '=',$request->get('id'))
        //         ->where('user_id', '=',$request->get('received_user_id'))
        //         ->update([$update_column => $request->get('selectedvalue')]);
        //         }else{
        //             $update_column = 'requested_status';
        //         DB::table('quotations')
        //         ->where('id', '=',$request->get('id'))
        //         ->update([$update_column => $request->get('selectedvalue')]);}
        //         $success = array('success'=>"Successfully saved Changes.");
        //         return response()->json($success);  
        //     }
        //     catch (\Illuminate\Database\QueryException $ex) {
        //         $res['status'] = false;
        //         $res['message'] = $ex->getMessage();
        //         return response($res, 500);
        //     }  
    
        // }
    public function updateReceivedStatus(Request $request){

        DB::table('quotation_received_users')
            ->where('id','=',$request->get('id'))
            ->update(['received_status' => $request->get('selectedvalue')]);
 
     //$success = array('success'=>"Successfully saved Changes.");
      return response()->json(['status'=>true,'received_status'=>$request->get('selectedvalue')]);
           // return response()->json($success); 

    }
    #Company/Admin Received/Request Quotation Function
     public function quotation(Request $request,$status)
    {
        $company_id=Session::get('login_company_id');
        switch ($status) {
            case 'received':
                if(Auth::user()->role == 2){
                 $quotations = Quotation::with('range','category','send_user','quotation_created_user','quotation_updated_user','received_company')->whereHas('received_company', function($q) use ($company_id){
                    $q->where('quotation_received_companys.company_id',$company_id);
                 })->orderby('created_at','DESC')->paginate(10);
                 
                //  $quotations = Quotation::with('range','category','send_user','quotation_created_user','quotation_updated_user','received_company')->whereHas('received_company', function($q) use ($company_id){
                //     $q->where('quotation_received_companys.company_id',$company_id)->where('quotation_received_companys.received_status','pending');
                // })->orderby('created_at','DESC')->paginate(10); 
                 
                 
                    
                     //start
                     
                    foreach($quotations as $quotation){
                        if($quotation->send_user->role == '2'){    
                             $quotation->main_category=Company::leftjoin('category_company','category_company.company_id','=','companies.id')
                                 ->leftjoin('categories','categories.id','=','category_company.category_id')
                                 ->where('companies.user_id','=',$quotation->send_user->id)
                                 ->where('categories.parent_id','=',0)
                                 ->select('category_company.category_id','categories.category_url','companies.company_url')->first();
                    }
                 }
                 //end
                 
                  
                }else{
                  $quotations = Quotation::with('range','category','send_user','quotation_created_user','quotation_updated_user','received_company')->whereHas('received_company', function($q) use ($company_id){
                    $q->where('quotation_received_companys.company_id',$company_id);
                 })->orderby('created_at','DESC')->get();   
                }
                break;
            case 'requested':
            if(Auth::user()->role == 1 || Auth::user()->role == 2)
            {
                $quotations = Quotation::where('send_user_id',Auth::user()->id)->with('range','category','send_user','quotation_created_user','quotation_updated_user','received_company')->orderby('created_at','DESC')->paginate(10);
                
                //start
                   foreach($quotations as $quotation){
                       
                       foreach($quotation->received_company as $received_company){
                           
                           $received_company->cate=CompanyCategory::
                               leftjoin('categories','categories.id','=','category_company.category_id')->where('company_id','=',$received_company->id)->where('categories.parent_id','=',0)->select('category_id','categories.category_url')->first();
                               
                       }
                   }
                 //end
            }
            elseif(Auth::user()->role == 4 || Auth::user()->role == 5)
            {  
               
                $quotations = Quotation::with('range','category','send_user','received_company','quotation_created_user','quotation_updated_user')->whereHas('send_user', function($q){
                    $q->where('users.role',1);
                })->orderby('created_at','DESC')->get();
            }
            break; 
            case "success":
                $quotations = Quotation::with('range','category','send_user','quotation_created_user','quotation_updated_user','received_company')->whereHas('received_company', function($q) use ($company_id){
                    $q->where('quotation_received_companys.company_id',$company_id)->where('quotation_received_companys.received_status','Received');
                })->orderby('created_at','DESC')->paginate(10);
                 
                  //start
                   foreach($quotations as $quotation){
                       
                         if($quotation->send_user->role == '2'){
                             $quotation->main_category=Company::leftjoin('category_company','category_company.company_id','=','companies.id')
                                 ->leftjoin('categories','categories.id','=','category_company.category_id')
                                 ->where('companies.user_id','=',$quotation->send_user->id)
                                 ->where('categories.parent_id','=',0)
                                 ->select('category_company.category_id','categories.category_url','companies.company_url')->first();
                                 
                                 
                         }
                   }
                 //end
                 
             $status='received';    
            break;
            case "pending":
                $quotations = Quotation::with('range','category','send_user','quotation_created_user','quotation_updated_user','received_company')->whereHas('received_company', function($q) use ($company_id){
                    $q->where('quotation_received_companys.company_id',$company_id)->where('quotation_received_companys.received_status','Pending');
                })->orderby('created_at','DESC')->paginate(10); 
                
                 //start
                   foreach($quotations as $quotation){
                       
                         if($quotation->send_user->role == '2'){
                             $quotation->main_category=Company::leftjoin('category_company','category_company.company_id','=','companies.id')
                                 ->leftjoin('categories','categories.id','=','category_company.category_id')
                                 ->where('companies.user_id','=',$quotation->send_user->id)
                                 ->where('categories.parent_id','=',0)
                                 ->select('category_company.category_id','categories.category_url','companies.company_url')->first();
                                 
                                 
                         }
                   }
                 //end
            $status='received';  
            break;
            default:
                echo "<H1><center>Please add correct url</center></H1>";
                break;
         }
         if(empty($quotations)){
              return abort(404);
         }else{
            $quotation_statuses = Quotation::getEnum('quotation_received_companys','received_status');
            
             if(Auth::user()->role == 2){
                  
                  //  myo min added
            $company = Company::Where('id',$company_id)->with('parent_categories','user','packageplan','package_plan')->first();
            // myo min added end
            
                 return view('backend.company.quotation.list',compact('quotations','quotation_statuses','status','company'));
             }else{
                return view('admin.quotation.list',compact('quotations','quotation_statuses','status'));  
             }
              
         }
       
    }
    //start
    public function userquotation(Request $request,$status){
       $url = URL :: previous();
       $route = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
       if(($route == 'company.send_quotation_form' || $route =='send_quotation_detail_form') && Session::has('quotation_data')) {
           Session::forget('quotation_data');
       }
       
        $company_id=Session::get('login_company_id');
        switch ($status) {
            case 'received':
                if(Auth::user()->role == 2){
                 $quotations = Quotation::with('range','range.currency_unit','category','send_user','quotation_created_user','quotation_updated_user','received_company')->whereHas('received_company', function($q) use ($company_id){
                    $q->where('quotation_received_companys.company_id',$company_id);
                 })->orderby('created_at','DESC')->where('quotations.mail_send_date','!=',null)->paginate(10);
                }else{
                  $quotations = Quotation::with('range','range.currency_unit','category','send_user','quotation_created_user','quotation_updated_user','received_company')->whereHas('received_company', function($q) use ($company_id){
                    $q->where('quotation_received_companys.company_id',$company_id);
                 })->orderby('created_at','DESC')->paginate(10);   
                }
                break;
            case 'requested':
            if(Auth::user()->role == 1 || Auth::user()->role == 2)
            {   
                $quotations = Quotation::where('send_user_id',Auth::user()->id)->with('range','range.currency_unit','category','send_user','quotation_created_user','quotation_updated_user','received_company')->orderby('created_at','DESC')->paginate(10);
                
                 //start
                   foreach($quotations as $quotation){
                       
                       foreach($quotation->received_company as $received_company){
                           
                           $received_company->cate=CompanyCategory::
                               leftjoin('categories','categories.id','=','category_company.category_id')->where('company_id','=',$received_company->id)->where('categories.parent_id','=',0)->select('category_id','categories.category_url')->first();
                               
                       }
                   }
                 //end
            }
            elseif(Auth::user()->role == 4 || Auth::user()->role == 5)
            {  
               
                $quotations = Quotation::with('range','range.currency_unit','category','send_user','received_company','quotation_created_user','quotation_updated_user')->whereHas('send_user', function($q){
                    $q->where('users.role',1);
                })->orderby('created_at','DESC')->paginate(10);
            }
            break; 
            case "success":
                $quotations = Quotation::with('range','range.currency_unit','category','send_user','quotation_created_user','quotation_updated_user','received_company')->whereHas('received_company', function($q) use ($company_id){
                    $q->where('quotation_received_companys.company_id',$company_id)->where('quotation_received_companys.received_status','success');
                })->orderby('created_at','DESC')->paginate(10); 
            break;
            case "pending":
                $quotations = Quotation::with('range','range.currency_unit','category','send_user','quotation_created_user','quotation_updated_user','received_company')->whereHas('received_company', function($q) use ($company_id){
                    $q->where('quotation_received_companys.company_id',$company_id)->where('quotation_received_companys.received_status','pending');
                })->orderby('created_at','DESC')->paginate(10); 
            break;
            default:
                echo "<H1><center>Please add correct url</center></H1>";
                break;
         }
         if(empty($quotations)){
              return abort(404);
         }else{
            $quotation_statuses = Quotation::getEnum('quotation_received_companys','received_status');
            $requested_statuses = Quotation::getEnum('quotation_received_companys','requested_status');
            //start
            if(Auth::user()->role == 1){
                
                //start
        $id=Auth::user()->id;
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
         $quotations_success = Quotation::where('send_user_id',$id)->with(['range','range.currency_unit','category','received_company'=>function($q){
                $q->where('quotation_received_companys.requested_status','received')->get();
             },'send_user','quotation_created_user','quotation_updated_user'])->get();
             
        $quotations_pending = Quotation::where('send_user_id',$id)->with(['range','range.currency_unit','category','send_user','quotation_created_user','quotation_updated_user','received_company'=>function($q){
                $q->where('quotation_received_companys.requested_status','pending')->get();
             }])->get();
             
        $quotations_request = Quotation::where('send_user_id',$id)->with('range','range.currency_unit','category','send_user','quotation_created_user','quotation_updated_user')->get();
         $quotations_success_count = $quotations_success->first()->received_company->count();
        $quotations_request_count = $quotations_request->count(); 
       }
       $usercoin_lists_count = $usercoin_lists->count();
        $quotation_statuses = Quotation::getEnum('quotation_received_companys','received_status');
            //end
               
                // return view('admin.user.user_changepassword',compact('userData','quotation_statuses','usercoin_lists_count','quotations_request_count','quotations_success_count','quotations_request','quotations_pending','quotations_success','usercoin_received','usercoin_lists'));
            //start
                 
                return view('backend.user.quotation.list',compact('quotations','quotation_statuses','status','requested_statuses','usercoin_lists_count','quotations_request_count','quotations_success_count',
                   'quotations_request','quotations_pending','quotations_success','usercoin_received','usercoin_lists'));
                
            }else{
                 
                  return view('admin.quotation.user_list_quotation',compact('quotations','quotation_statuses','status','requested_statuses'));
            }
            //end
             
         }
    }
    //end
     public function sendQuotationMail($id,$page){
         $domain =env('APP_URL');
        
       $quoations=Quotation::getQuotationToSendMail($id);
       foreach($quoations as $quotation){
              $file = unserialize($quotation->file);
               $file_arr=implode('|', $file);
              $files=explode("|",$file_arr);
            $file_array=[];
            foreach($files as $file){
          $file_array[]= storage_path('app/public/quotation/'.$file);
            }
          $quotation['subject']="Request Quotation";
       \Mail::send('mail.quotation_mail',['quotation'=>$quotation],function($message) use($quotation,$file_array){
          //$message->from('myanbox@findixmyanmar.com','myanbox.com.mm');
          $message->from('info@myanbox.com.mm');
          $message->to($quotation['receiver_email']);
          $message->subject($quotation['subject']);
             foreach($file_array as $filePath){
              $message->attach($filePath);
             }
       });
             $data['mail_send_date']=date('Y-m-d H:i:s');
             $data['mail_status']='success';
           Quotation::where('id','=',$id)->update($data);
           
        if(\Mail::failures()){
          echo "error";exit();
        }
        }
        return back();
    }
}
