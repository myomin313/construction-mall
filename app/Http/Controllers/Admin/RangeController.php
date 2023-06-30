<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CurrencyUnit;
use App\Range;
use DB; 
use Auth;
use Session;

class RangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ranges = Range::join('users as creater','creater.id','=','ranges.created_by')
                        ->join('users as updater','updater.id','=','ranges.updated_by')
                        ->join('currency_units','currency_units.id','=','ranges.currency_unit_id')
                        ->select('ranges.*','creater.name as creator','updater.name as updator','currency_units.unit as unit')
                        ->orderBy('created_at','DESC')
                        ->paginate(10);
   
        return view('admin.range.index',compact('ranges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $currency_units = CurrencyUnit::select(['id','currency_name','unit'])->where('is_active','1')->get();
       return view('admin.range.create',compact('currency_units'));
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
           'minimum_price' => 'required',
            'maximum_price' => 'required',
       ]);
        
        if($request->maximum_price <= $request->minimum_price){
            return redirect()->back()
            ->with('error','Maximum price must be greater than minimum price');
         }
  
         try{

            $range = new Range();
            $range->minimum_price=$request->minimum_price;
            $range->maximum_price=$request->maximum_price;
            $range->currency_unit_id = $request->currency;
            $range->created_by = Auth()->user()->id;
            $range->updated_by = Auth()->user()->id;

            if($range->save())
            {
                $success = array('success'=>"Successfully save changes.");
                
              return redirect()->route('range.index')
                        ->with('success','created successfully.');
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

         if(is_numeric($id)){
             Session::put('pageno',$page);
        $range= Range::find($id);
        $currency_units = CurrencyUnit::select(['id','currency_name','unit'])->where('is_active','1')->get(); 
        return view('admin.range.edit',compact('range','currency_units'));
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
            'minimum_price' => 'required',
            'maximum_price' => 'required',
        ]);
        
          if($request->maximum_price <= $request->minimum_price){
            return redirect()->back()
            ->with('error','Maximum price must be greater than minimum price');
         }
  
         try{

            
            $range = Range::find($id);
            $range->minimum_price=$request->minimum_price;
            $range->maximum_price=$request->maximum_price;
            $range->currency_unit_id = $request->currency;
            $range->created_by = Auth()->user()->id;
            $range->updated_by = Auth()->user()->id;
            $range->updated_at = date('Y-m-d H:i:s');
            if($range->save())
            {
               
              return redirect('range/index?page='.Session::get('pageno'))
                        ->with('success','Updated successfully!.');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function updatestatus(Request $request)
    {
       
    try{  
            $data['is_active']=$request->is_active;
            $data['updated_by'] = Auth()->user()->id;
            $data['updated_at'] = date('Y-m-d H:i:s');

           Range::where('id','=',$request->id)
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
}
