<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\CategoryFreelancer;
use App\Category;
use DB; 
use Auth;
use Session;

class FreelancerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$freelancercategories = CategoryFreelancer::latest()->paginate(5);
        $freelancercategories =Category::
                               join('users as creater','creater.id','=','categories.created_by')
                               ->join('users as updater','updater.id','=','categories.updated_by')
                               ->where('parent_id',4)
                               ->select('categories.*','creater.name as creator','updater.name as updator')
                               ->orderBy('categories.name')
                               ->paginate(10);
  
        return view('admin.freelancercategory.index',compact('freelancercategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.freelancercategory.create');
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
            $freelancercategory = new Category;
            $freelancercategory->name=$request->category_name;
            $freelancercategory->parent_id=4;
            $freelancercategory->category_url=$category_url;
            $freelancercategory->created_by=Auth::user()->id;
            $freelancercategory->updated_by=Auth::user()->id;
            if($freelancercategory->save())
            {
                $success = array('success'=>"Successfully save changes.");
                
              return redirect()->route('freelancercategory.index')
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
    public function edit($id,$pageno)
    {   
        $id = \Crypt::decrypt($id);
        $pageno = \Crypt::decrypt($pageno);

         if(is_numeric($id))
         {
             Session::put('pageno',$pageno);
            $freelancercategory= Category::find($id); 
            return view('admin.freelancercategory.edit',compact('freelancercategory'));
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
            'category_name' => 'required',
        ]);
        
        $category_url = strtolower(self::makeUrl(trim($request->category_name)));
        $freelancercategory= Category::find($id);
        $freelancercategory->name=$request->category_name;
        $freelancercategory->updated_by=Auth::user()->id;
        $freelancercategory->category_url=$category_url;
        $freelancercategory->updated_at=date('Y-m-d H:i:s');

         if($freelancercategory->save())
            {
                $success = array('success'=>"Successfully save changes.");
                
                return redirect('freelancercategory/index?page='.Session::get('pageno'))
                        ->with('success','Updated successfully');
            }else
            {
                $errors = array('errors'=>"Something wrong");
                return $errors;
            }
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
    
     public function search(Request $request){
        
             $data = $request->all(); 
             $name=$request->name;
             $is_active=$request->is_active; 
                              
                               $freelancercategories =Category::
                               join('users as creater','creater.id','=','categories.created_by')
                               ->join('users as updater','updater.id','=','categories.updated_by')
                               ->where('parent_id',4)
                                 ->where(function($query)use($name){
                if(!empty($name) )                
                $query->where('categories.name','like', "%".$name."%");
             })
               ->where(function($query)use($is_active){
                if($is_active != null)
                 $query->where('categories.is_active',$is_active);
             })
             
                               ->select('categories.*','creater.name as creator','updater.name as updator')
                               ->orderBy('categories.name')
                               ->paginate(10);
                     
            
        return view('admin.freelancercategory.index',compact('freelancercategories','data','name','is_active'));
        
    }
  
}
