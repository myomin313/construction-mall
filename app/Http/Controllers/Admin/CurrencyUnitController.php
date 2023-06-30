<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\AllHelper;
use Illuminate\Validation\Rule;

use App\CurrencyUnit;
use Auth;
use Session;
class CurrencyUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all(); 
        $name = $request->name;
        $currency_units = CurrencyUnit::with('creater:id,name','updater:id,name');
        if(!empty($name))
            $currency_units = $currency_units->where('currency_name','like','%'.$name.'%')->orWhere('unit','like','%'.$name.'%');

        $currency_units = $currency_units->orderby('updated_at','desc')->paginate(10);
        return view('admin.currency_unit.index',compact('currency_units','data','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.currency_unit.create');
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
            'currency_name' => 'required|unique:currency_units',
            'unit' => 'required|unique:currency_units',
        ]);
        $currency_unit = new CurrencyUnit();
        $currency_unit->currency_name=$request->currency_name;
        $currency_unit->unit=$request->unit;
        $currency_unit->created_by=Auth::user()->id;
        $currency_unit->updated_by=Auth::user()->id;
        $currency_unit->created_at=date('Y-m-d H:i:s');
        $currency_unit->updated_at=date('Y-m-d H:i:s');      

        if($currency_unit->save())
        {
            return redirect('/currency-unit/?page='.Session::get('pageno'))
                        ->with('success','Created successfully!');
        }else
        {
            $errors = array('errors'=>"Something wrong");
            return $errors;
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
    public function edit($id,$pageno)
    {
        $id = \Crypt::decrypt($id);
        $pageno = \Crypt::decrypt($pageno);

        if(is_numeric($id))
        {
            Session::put('pageno',$pageno);
            $currency_unit = CurrencyUnit::find($id);
            return view('admin.currency_unit.edit',compact('currency_unit'));
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
            'currency_name' => ['required', Rule::unique('currency_units')->ignore($id)],
            'unit' => ['required',Rule::unique('currency_units')->ignore($id)],
        ]);
        $currency_unit = CurrencyUnit::find($id);
        $currency_unit->currency_name=$request->currency_name;
        $currency_unit->unit=$request->unit;
        $currency_unit->updated_by=Auth::user()->id;
        $currency_unit->updated_at=date('Y-m-d H:i:s');      

        if($currency_unit->save())
        {
            if(Session::get('pageno') != 1){
                return redirect('/currency-unit/?page='.Session::get('pageno'))
                        ->with('success','Updated successfully!');
            }else{
                return redirect('/currency-unit')
                        ->with('success','Updated successfully!');
            }
           
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

   /**
     * Update the status of specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function updateStatus(Request $request)
    { 
        $result = AllHelper::updateStatus($request,'App\CurrencyUnit');
        return response()->json($result);
    }
}
