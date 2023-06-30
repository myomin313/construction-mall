<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdvertisingPlans;
use App\CurrencyUnit;
use Auth;

class AdvertisingPackageListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = AdvertisingPlans::join('users as creater','creater.id','=','advertising_plans.created_by')
                              ->join('users as updater','updater.id','=','advertising_plans.update_by')
                              ->join('currency_units','currency_units.id','=','advertising_plans.currency_unit_id')
                              ->select('advertising_plans.*','creater.name as creator','updater.name as updator','currency_units.unit as unit')
                              ->orderBy('plan_name')
                              ->orderBy('created_at','DESC')->paginate(4);
                              
  
        return view('admin.advertisingpackagelist.index',compact('packages'));
            /*->with('i', (request()->input('page', 1) - 1) * 5);*/
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
        $id = \Crypt::decrypt($id);
        if(is_numeric($id))
        {
            $package= AdvertisingPlans::find($id); 
             $currency_units = CurrencyUnit::select(['id','currency_name','unit'])->where('is_active','1')->get();
            return view('admin.advertisingpackagelist.edit',compact('package','currency_units'));
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
            'price'=> 'required',
            'plan_name'=> 'required',
            'periods'=> 'required',
            

        ]);
        
        $package= AdvertisingPlans::find($id);
        $package->price=$request->price;
        $package->plan_name=$request->plan_name;
        $package->currency_unit_id = $request->currency;
        $package->periods=$request->periods;
        $package->updated_at=date('Y-m-d H:i:s');
        $package->update_by=Auth::user()->id;
        
         if($package->save())
            {
                $success = array('success'=>"Successfully save changes.");
                
                return redirect()->route('advertisingpackagelist.index')
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
        $package= AdvertisingPlans::find($id);  
        $package->delete();
  
        return redirect()->route('advertisingpackagelist.index')
                        ->with('success','Product deleted successfully');
    }
}
