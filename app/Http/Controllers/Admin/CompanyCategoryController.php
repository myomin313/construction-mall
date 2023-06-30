<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\AllHelper;
use App\Category;
use DB;
use Auth;
use Session;

class CompanyCategoryController extends Controller
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
             $is_active=$request->is_active;
        $categories = Category::join('categories as parent','parent.id','=','categories.parent_id')
            ->join('users as creater','creater.id','=','categories.created_by')
            ->join('users as updater','updater.id','=','categories.updated_by')
            ->where(function($query)use($name){
                if(!empty($name) )                
                $query->where('categories.name','like', "%".$name."%");
             })
            ->where(function($query)use($is_active){
                if($is_active != null)
                 $query->where('categories.is_active',$is_active);
             })
            ->where('categories.parent_id','!=',0)
            ->where('categories.id','!=',4)
            ->where('categories.parent_id','!=',4)
            ->select('categories.*','parent.name as parent_name','creater.name as creator','updater.name as updator')
            ->orderBy('name','asc')
            ->paginate(10);
  
        return view('admin.companycategory.index',compact('categories','data','name','is_active'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_catgories=Category::where('id','!=',4)->where('parent_id','=',0)->get();
        return view('admin.companycategory.create',compact('company_catgories'));
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
            'category_name' => 'required'
        ]);
  
         try{

            //$id = (int)$id;//string to int
            $category_url = strtolower(self::makeUrl(trim($request->category_name)));
            $category = new Category();
            $category->parent_id=$request->parent_id;
            $category->name=$request->category_name;
            $category->category_url =$category_url;
            $category->created_by = Auth()->user()->id;
            $category->updated_by = Auth()->user()->id;

            if($category->save())
            {
                $success = array('success'=>"Successfully save changes!");
                
              return redirect()->route('companycategory.index')
                        ->with('success','Created successfully!');
            }else
            {
                $errors = array('errors'=>"Something wrong!");
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
    public function edit($id,$page)
    {
        $id = \Crypt::decrypt($id);
        $page = \Crypt::decrypt($page);

         if(is_numeric($id)){
        Session::put('pageno',$page);
        $category= Category::find($id);
        $company_catgories=Category::where('id','!=',4)->where('parent_id','=',0)->get();
        return view('admin.companycategory.edit',compact('category','company_catgories'));}
         
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
            'category_name' => 'required',
        ]);
        
        $category_url = strtolower(self::makeUrl(trim($request->category_name)));
        $category = new Category();
        $category= Category::find($id);
        $category->parent_id=$request->parent_id;
        $category->name=$request->category_name;
        $category->category_url=$category_url;
        $category->created_by = Auth()->user()->id;
        $category->updated_by = Auth()->user()->id;

         if($category->save())
            {
               // $success = array('success'=>"Successfully save changes!");
                
               // return redirect()->route('user.profile', ['step' => $step, 'id' => $id]);
               //companycategory/index?page=4
                return redirect('companycategory/index?page='.Session::get('pageno'))
                        ->with('success','Updated successfully!');
            }else
            {
                $errors = array('errors'=>"Something wrong!");
                return $errors;
            }
  
        
    }

    public function updatestatus(Request $request)
    {
        $result = AllHelper::updateStatusWithUpdater($request,'App\Category');
        return response()->json($result);
       
    // try{  
    //         $data['is_active']=$request->is_active;
    //         $data['updated_at']=date('Y-m-d H:i:s');
    //         $data['updated_by']=Auth()->user()->id;
    //        Category::where('id','=',$request->id)
    //         ->update($data);
            
    //         Session::flash('success', 'Successfully Change Status!'); 
    //         $success = array('success'=>"Successfully Status Changes!");
    //         return response()->json($success);  
            
    //     }catch (\Illuminate\Database\QueryException $ex) {
    //         $res['status'] = false;
    //         $res['message'] = $ex->getMessage();
    //         return response($res, 500);
    //     } 
    } 
     //by mhp
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= Category::find($id);  
        $category->delete();
  
        return redirect()->route('companycategory.index')
                        ->with('success','Deleted successfully!');
    }
     public static function makeUrl( $string ) 
    {
          $stripArr = array( '(', ')','{','}','[',']','','  ','_',
                          '!','-','&','<','>','<','\\','/',
                          '|','+','-',':',',','`','@','#','$',
                          '%','^','&','+','*','.','=','-','~','"','\''
          );
          $result = str_replace($stripArr,' ', $string); 
          return preg_replace('# {1,}#', '-', trim($result));
    }
   
}
