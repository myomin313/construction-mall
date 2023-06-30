<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\AllHelper;
use App\DailyProductPrice;
use App\CurrencyUnit;
use Session;

class DailyproductpriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          $data = $request->all(); 
          $name=$request->name;
        $products = DailyProductPrice::with('currency_unit');
        if(!empty($name))
            $products = $products->where('product_name','like','%'.$name.'%');
        $products = $products->orderBy('created_at','desc')->paginate(10);


   // $search_result->appends(['keyword' => $keyword]);

        return view('admin.dailyproductprice.index',compact('products','data','name'));
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currency_units = CurrencyUnit::select(['id','currency_name','unit'])->where('is_active','1')->get();
        return view('admin.dailyproductprice.create',compact('currency_units'));
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
            'product_name' => 'required',
            'price' => 'required',
            'currency' => 'required',
        ]);
  
        try{

            //$id = (int)$id;//string to int
            $product = new DailyProductPrice();
            $product->product_name=$request->product_name;
            $product->price=$request->price;
            $product->currency_unit_id=$request->currency;

            if($product->save())
            {
              //  $success = array('success'=>"Successfully save changes.");
                
              return redirect()->route('dailyproductprice.index')
                        ->with('success','Created successfully!');
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
        $product= DailyProductPrice::find($id); 
        $currency_units = CurrencyUnit::select(['id','currency_name','unit'])->where('is_active','1')->get();
        return view('admin.dailyproductprice.edit',compact('product','currency_units'));
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
            'product_name' => 'required',
            'price' => 'required',
            'currency' => 'required',
        ]);
        
        $product= DailyProductPrice::find($id);
        $product->product_name = $request->product_name;
        $product->price        = $request->price;
        $product->currency_unit_id     = $request->currency;
        $product->updated_at   = date('Y-m-d H:i:s');

         if($product->save())
            {
                //$success = array('success'=>"Successfully save changes.");
                
                return redirect('/dailyproductprice/index?page='.Session::get('pageno'))
                        ->with('success','Updated successfully!');
            }else
            {
                $errors = array('errors'=>"Something wrong");
                return $errors;
            }
    }

    
    
    public function storesession(Request $request){
          Session::put('dailyproductpricecheck',$request->ids);
        
    }
    public function deleteall(Request $request){
       $result = AllHelper::deleteall($request,'App\DailyProductPrice');
       return response()->json($result);
        
    }
   
}
