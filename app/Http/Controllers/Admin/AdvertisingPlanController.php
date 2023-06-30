<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use Storage;
use App\AdvertisingPlans;
use App\Advertising;
use App\Helper\AllHelper;
use Session;

class AdvertisingPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
    }
    public function newAdvertising()
    {
        $advertisingPlans = AdvertisingPlans::where('is_active', '=', '1')->get();
        return view('admin.admin.advertising.new', compact('advertisingPlans'));
    }

    public function storeAdvertising(Request $request)
    {
       
        if ($request->image == "undefined")
        {
            $request['image_name'] = null;
        }
        else
        {
            $request['image_name'] = $request->image;
        }

        $status = $this->validation($request);
        if ($status->fails())
        {
             $errors =array('errors'=>$status->messages());
             return response()->json($errors);  
        }
        else
        {
             
            $plan=  AdvertisingPlans::where('id','=',$request->advertising_plan_id)->select('periods')->first();
            $end_date= date('Y-m-d',strtotime('+'.$plan->periods.'days',strtotime($request->start_date)));
          
            $advertising = new Advertising;
            $advertising->link = $request->link;
            $advertising->photo = $request->image_name;
            $advertising->company_name = $request->company_name;
            $advertising->phone = $request->phone;
            $advertising->email = $request->email;
            $advertising->priority = $request->priority;
            $advertising->advertising_plan_id = $request->advertising_plan_id;
            $advertising->user_id = Auth()
                ->user()->id;
            $advertising->created_by = Auth()
                ->user()->id;
            $advertising->updated_by = Auth()
                ->user()->id;
            $advertising->start_date = $request->start_date;
            $advertising->end_date = $end_date;
            $advertising->address = $request->address;
            //$blog->save();
            if ($advertising->save())
            {
                Session::flash('success', 'Created successfully!'); 
               $success = array(
                    'success' => "Successfully saved!"
                );
                return response()->json($success);
            }
            else
            {
                $errors = array(
                    'errors' => "Something wrong!"
                );
                return response()->json($errors);
            }
        }
    }
    public function imageCrop(Request $request)
    {
       
        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image) = explode(',', $image);
        $image = base64_decode($image);
        $image_name = time() . '.png';
        $path = storage_path('app/public/advertising/' . $image_name);
        file_put_contents($path, $image);
        return response()->json(['status' => true, 'image_name' => $image_name]);

    }

    private function validation($request)
    {

       
            $messages = [
                'image_name.required' => 'Advertising Photo is required',
                'company_name.required' => 'Company Name is required', 
                'phone.required' => 'Phone is required',
                'advertising_plan_id.required' => 'Plan Name is required',
                'priority.required' => 'Priority is required',
                'email.email' => 'Email  is not correct',
                'link.url' => 'Link  is not correct',
                'start_date.required' => 'Start Date  is required'
            /*  'start_date.after' => 'Please choose a date in the future',
             'end_date.after' => 'Your return date is before start_date'*/
            ];

            $validator = Validator::make($request->all() , 
            ['image_name' => 'required',
            'company_name' => "required",
            'phone' => "required",
            'advertising_plan_id' => "required",
            'priority' => "required", 
            'email' => 'nullable|email', 
            'link' => 'nullable|url',
            /*'start_date'=>'required|after:now',
             'end_date'=>'required|after:start_date',*/
            'start_date' => 'required|date' 
            // 'end_date' => 'required|date|after_or_equal:start_date'
            ], $messages);

            return $validator;
        }
        public function Advertisings(Request $request)
        {
               $data=$request->all();
               $company_name=$request->company_name;
               $is_active = $request->is_active;
               $start_date = $request->start_date;
               $end_date = $request->end_date;
               
            $advertisings = Advertising::join('advertising_plans', 'advertising_plans.id', '=', 'advertisings.advertising_plan_id')
                ->join('users as create', 'create.id', '=', 'advertisings.created_by')
                ->join('users as update', 'update.id', '=', 'advertisings.updated_by')
                ->where(function ($query) use ($company_name) {
                   $query->where('advertisings.company_name','like','%'.$company_name.'%');
                 })
                ->where(function($query)use($is_active){
                 if($is_active != null)
                   $query->where('advertisings.is_active','=',$is_active);
                })
                ->where(function($query)use($start_date){
                    if(!empty($start_date))
                    $query->whereDate('advertisings.start_date', '=', $start_date);
                  })
                  ->where(function($query)use($end_date){
                    if(!empty($end_date))
                    $query->whereDate('advertisings.end_date', '=', $end_date);
                  })
               
                //end
                ->select('advertisings.*', 'advertising_plans.plan_name', 'create.name as creater', 'update.name as updater')
                ->orderBy('created_at', 'DESC')
                ->paginate(10);

            return view('admin.admin.advertising.list', compact('advertisings','data','company_name','is_active','start_date','end_date'));

        }
        public function editAdvertising($id, $pageno)
        {   
            $id = \Crypt::decrypt($id);
            $pageno = \Crypt::decrypt($pageno);

         if(is_numeric($id)){
             Session::put('pageno', $pageno);
            $advertising = Advertising::find($id);
            $advertisingPlans = AdvertisingPlans::where('is_active', '=', '1')->get();
            return view('admin.admin.advertising.edit', compact('advertisingPlans', 'advertising'));
         }
            

        }

        public function deleteAdvertising($id)
        {

            try
            {
                $advertising = Advertising::findOrFail($id);
                if (file_exists(storage_path('app/public/advertising/' . $advertising->photo))) unlink(storage_path('app/public/advertising/' . $advertising->photo));

                return redirect()
                    ->route('admin.advertising.list')
                    ->with('success', 'Delete successfully!');

                /*      if($advertising->delete())
                {
                   return redirect()
                    ->route('admin.advertising.list')
                    ->with('success', 'Delete successfully!');
                }else{
                 $errors = array(
                    'errors' => "Something wrong!"
                );
                return $errors;
                }*/
            }
            catch(\Illuminate\Database\QueryException $ex)
            {
                $res['status'] = false;
                $res['message'] = $ex->getMessage();
                return response($res, 500);
            }

            //  $advertising->delete();
            //  return back();
            
        }
        public function updateAdvertising(Request $request, $id)
        {
            if ($request->image == "undefined")
        {
            $request['image_name'] = null;
        }
        else
        {
            $request['image_name'] = $request->image;
        }
            $status = $this->validation($request);
            if ($status->fails())
            {
                $errors = array(
                    'errors' => $status->messages()
                );
                return response()
                    ->json($errors);
            }
            else
            {
                 
                $plan=  AdvertisingPlans::where('id','=',$request->advertising_plan_id)->select('periods')->first();
                $end_date= date('Y-m-d',strtotime('+'.$plan->periods.'days',strtotime($request->start_date)));
          
                $old_image = $request->old_image;
                $advertising = Advertising::find($id);
                $advertising->link = $request->link;
                $advertising->photo = $request->image_name;
                $advertising->company_name = $request->company_name;
                $advertising->phone = $request->phone;
                $advertising->email = $request->email;
                $advertising->priority = $request->priority;
                $advertising->updated_by = Auth()
                    ->user()->id;
                $advertising->advertising_plan_id = $request->advertising_plan_id;
                $advertising->user_id = Auth()
                    ->user()->id;
                $advertising->start_date = $request->start_date;
                $advertising->end_date = $end_date;
                $advertising->address = $request->address;
                if ($advertising->save())
                {
                    
                      if( $request->image != $request->old_image){
                    if(Storage::disk('public')->exists('/blog/'.$request->old_image)){
                  unlink(storage_path('app/public/advertising/'.$request->old_image));
                    }
                   } 
                   Session::flash('success', 'Updated successfully!'); 
                    $success = array('success'=>"Updated successfully!");
                   return response()->json($success);  
                }
                else
                {
                    $errors = array(
                        'errors' => "Something wrong!"
                    );
                    return response()->json($errors);
                }
            }
        }
        public function updateAdvertisingStatus(Request $request)
        {
            $result = AllHelper::updateStatus($request,'App\Advertising');
             return response()->json($result);   
            // try
            // {
            //     $data['is_active'] = $request->is_active;
            //     Advertising::where('id', '=', $request->id)
            //         ->update($data);
                    
            //     Session::flash('success', 'Successfully Change Status!'); 
            //     $success = array(
            //         'success' => "Successfully Update Status!"
            //     );
            //     return response()->json($success);
            // }
            // catch(\Illuminate\Database\QueryException $ex)
            // {
            //     $res['status'] = false;
            //     $res['message'] = $ex->getMessage();
            //     return response($res, 500);
            // }

        }
        
         public function storesession(Request $request){
        //dd($request->id);exit();
          Session::put('advertisingcheck',$request->ids);
        
    }
    public function deleteall(Request $request){
         $result = AllHelper::deleteall($request,'App\Advertising');
       return response()->json($result);  
        
    }

    }
    
