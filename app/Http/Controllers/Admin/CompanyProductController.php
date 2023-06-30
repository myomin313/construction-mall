<?php

namespace App\Http\Controllers\Admin;
use App\Helper\AndCharacterChanger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Company;
use App\CompanyProduct;
use App\Quotation;
use Auth;
use Session;
use Redirect;
use URL;

class CompanyProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id=null)
    {
         if(auth()->user()->role == 2){
           $id=Session::get('login_company_id');
           $page=12;
         }else{
           $id = \Crypt::decrypt($id);
           $page=10;
         }
        $data = $request->all(); 
        $name=$request->name;
        $company_products=CompanyProduct::where(function($query)use($name){
                if(!empty($name) )                
                $query->where('product_name','like', "%".$name."%");
             })->where('company_id',$id)->orderBy('product_name','desc')->paginate($page);
            //  myo min added
            if(auth()->user()->role == 2){
            $company = Company::Where('id',$id)->with('parent_categories','user','packageplan','package_plan')->first();
            // myo min added end
              return view('backend.company.product.list',compact('company_products','data','name','company'));
            }else{
                 $company=Company::where('id',$id)->with('user')->first();
              return view('admin.admin.company.product-list',compact('company_products','id','company','data','name'));  
            }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current_stocks = Quotation::getEnum('company_products','current_stock');
        //  myo min added
             session()->put('redirect_url', url()->previous());
            $company = Company::Where('user_id',Auth::user()->id)->with('parent_categories','user','packageplan','package_plan')->first();
            // myo min added end
        return view('backend.company.product.add',compact('current_stocks','company'));

    }    
     public function createcompanyproductbyadmin($id)
    {
        $id = \Crypt::decrypt($id);
        

         if(is_numeric($id))
         {
            $current_stocks = Quotation::getEnum('company_products','current_stock');
            
            $company = Company::Where('id',$id)->with('parent_categories','user','packageplan','package_plan')->first();
            
            return view('admin.admin.company.new-product',compact('current_stocks','id','company'));
         }
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
          if ($request->image_name == "undefined")
        {
            $request['image_name'] = null;
        }
        else
        {
            $request['image_name'] = $request->image_name;
        }
        
         $status = $this->validation($request);
        if($status->fails())
        {
           $errors =array('errors'=>$status->messages());
             return response()->json($errors); 
        }
        else{
            if(Auth::user()->role == 2){
                    $company= Company::select('id')->where('user_id',Auth::user()->id)->first();
                    Session::put('login_company_id',$company->id);      
               }
                
             if(!empty(Session::get('login_company_id'))){
                $company_id= Session::get('login_company_id'); 
              }else{
                $company_id= $request->company_id;
              }
                $product = new CompanyProduct();
                $product->product_name = $request->name;
                $product_description = AndCharacterChanger::replaceChar($request->description);
                $product->product_description = $product_description;
                $product->company_id =$company_id;
                $product->photo = $request->image_name;
                $product->price = $request->price;
                $product->code  = $request->code;
                $product->size  = $request->size;
                $product->current_stock = $request->stock_status;
                $product->created_by = Auth::user()->id;
                $product->updated_by = Auth::user()->id;
                $product->created_at = date("Y-m-d H:m:i");
                $product->updated_at = date("Y-m-d H:m:i");
               if($product->save())
                {
                     Session::flash('success', 'Created Successfully !'); 
                    $success = array('success'=>"Created Successfully !");
                    //return response()->json($success);  
                if(!empty(Session::get('redirect_url'))){
                 $url =Session::get('redirect_url');
                  } else{
                 $url = url('/admin/company-product/'.$request->company_id);
                }
                    return response()->json(['url'=>$url,'success'=>$success]);
                    
                }else
                {
                    $errors = array('errors'=>"Something wrong !");
                    return response()->json($errors);
                }
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
        

         if(is_numeric($id)){
              
        $current_stocks = Quotation::getEnum('company_products','current_stock');
        $company_product = CompanyProduct::where('id',$id)->first();
           if(auth()->user()->role == 2){
               $page = \Crypt::decrypt($page);
               Session::put('pageno',$page);
        //  myo min added
            $company = Company::Where('user_id',Auth::user()->id)->with('parent_categories','user','packageplan','package_plan')->first();
               session()->put('edit_redirect_url', url()->previous());
            // myo min added end
           return view('backend.company.product.edit',compact('company_product','current_stocks','company'));
           }else{
               Session::put('pageno',$page);
               
                //  myo min added
                 $company = Company::Where('id',$company_product->company_id)->with('parent_categories','user','packageplan','package_plan')->first();
                // myo min added end
               
              return view('admin.admin.company.product-edit',compact('company_product','current_stocks','company'));   
           }
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
           
          if ($request->image_name == "undefined")
        {
            $request['image_name'] = null;
        }
        else
        {
            $request['image_name'] = $request->image_name;
        }
        $status = $this->validation($request);
        if($status->fails())
        {
           /* $errors =array('errors'=>$status->errors()->all());
            return response()->json($errors);*/
             $errors =array('errors'=>$status->messages());
             return response()->json($errors); 
        }
        else{
            $old_image = $request->old_image; 
            $product = CompanyProduct::where('id',$id)->first();
            $product->product_name = $request->name;
            $product_description = AndCharacterChanger::replaceChar($request->description);
            $product->product_description = $product_description;
           // $product->company_id = Session::get('login_company_id');
            $product->price = $request->price;
            $product->code  = $request->code;
            $product->size  = $request->size;
            $product->current_stock = $request->stock_status;
            $product->photo = $request->image_name;    
            $product->updated_by = Auth::user()->id;
            $product->updated_at = date("Y-m-d H:m:i");
           if($product->save())
            {
             if($request->image_name != $old_image){
               if(Storage::disk('public')->exists('/product/'.$old_image)){
                unlink(storage_path('app/public/product/'.$old_image));
               }
             }
              Session::flash('success', 'Updated successfully !');
                $success = array('success'=>"Updated successfully !");
                
                if(auth()->user()->role==2){
                 $url =Session::get('edit_redirect_url');
                 return response()->json(['url'=>$url,'success'=>$success]);
                }else{
                   return response()->json($success); 
                }
                
                 
            }else
            {
                $errors = array('errors'=>"Something wrong !");
                return response()->json($errors);
            }
        }   
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $product = CompanyProduct::findOrFail($id);
         if(Storage::disk('public')->exists('/product/'.$product->photo)){
           unlink(storage_path('app/public/product/'.$product->photo));
         }
        if($product->delete())
            $request->session()->flash('process_success', 'Deleting Process Successfully completed.');
        else
            $request->session()->flash('process_fail', 'Deleting Process Fail.');
        // return redirect(route('product.index'));
          return Redirect::back();
    }
     public function adminproductdestroy(Request $request,$id,$company_id)
    {
         
        $product = CompanyProduct::findOrFail($id);
        if(Storage::disk('public')->exists('/product/'.$product->photo)){
           unlink(storage_path('app/public/product/'.$product->photo));
         }  
        if($product->delete()){
            $request->session()->flash('process_success', 'Deleting Process Successfully completed.');
        }
        else{
            $request->session()->flash('process_fail', 'Deleting Process Fail.');
        }
        //return redirect('admin/company-product/'.$company_id);
        return Redirect::back();
    }

    private function validation($request)
    {
        $messages = [
            'name.required' => 'Product name is required',
            //'current_stock.required'=>'Stock Status is required',
             'code.required'=>'Code is required',
              'price.required'=>'Price is required',
              'image_name.required' => 'Product Photo is required',
               'stock_status.required' => 'Stock Status is required',
        ];

        $validator = Validator::make($request->all(), [
                'name' => "required",
                // 'current_stock' => "required|string|in:Instock,Out Of Stock,Preorder",
                  'code' => "required",
                   'price' => "required",
                   'image_name' => 'required',
                   'stock_status'=> 'required|in:Instock,Out Of Stock,Preorder', 
            ], $messages);
        
        return $validator; 
    }
     public function storesession(Request $request){
        //dd($request->id);exit();
          Session::put('productcheck',$request->ids);
        
    }
    public function deleteall(Request $request){
        $ids = $request->ids;
        foreach( $ids as $id){
           CompanyProduct::where('id','=',$id)->delete();
        }
         Session::flash('success','Deleted Successfully!'); 
        $success = array('success'=>"Successfully delete!");
                return response()->json($success);  
        
    }
}
