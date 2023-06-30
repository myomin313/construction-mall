<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CompanyAdvertisingPlan;
use App\CurrencyUnit;

class CompanyAdvertisingPlanListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = CompanyAdvertisingPlan::with('currency_unit')->orderBy('plan_name')->get();
         
        return view('admin.companyadvertisingplan.index',compact('plans'))
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
        $id = \Crypt::decrypt($id);
    
         if(is_numeric($id))
         {
            $plans= CompanyAdvertisingPlan::find($id); 
            $currency_units = CurrencyUnit::select(['id','currency_name','unit'])->where('is_active','1')->get();
            return view('admin.companyadvertisingplan.edit',compact('plans','currency_units'));
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
            'plan_name' => 'required',
            'price' => 'required',
            'periods' => 'required',
        ]);
        
        $plans= CompanyAdvertisingPlan::find($id);
        $plans->plan_name = $request->plan_name;
        $plans->price        = $request->price;
        $plans->currency_unit_id = $request->currency;
        $plans->periods     = $request->periods;
        $plans->updated_at   = date('Y-m-d H:i:s');

         if($plans->save())
            {
                $success = array('success'=>"Successfully save changes.");
                
                return redirect()->route('companyadvertisingplan.index')
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
        
    }
}
