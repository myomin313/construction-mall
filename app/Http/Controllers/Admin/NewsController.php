<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Helper\AllHelper;
use DB; 
use Auth;
use Session;

class NewsController extends Controller
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
             
        $news = News::join('users as creater','creater.id','=','news.created_by')
                        ->join('users as updater','updater.id','=','news.updated_by')
                        ->where(function($query)use($name){
                          if(!empty($name) )                
                                $query->where('title','like', "%".$name."%");
                           })
                        ->select('news.*','creater.name as creator','updater.name as updator')
                        ->orderBy('created_at','desc')
                        ->paginate(10);
  
        return view('admin.news.index',compact('news','data','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.news.create');
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
            'title' => 'required',
             'link'=>'required|nullable|url',
            'description'=>'required',
        ]);
  
         try{
            $news = new News();
            $news->title=$request->title;
            $news->link=$request->link;
            $news->description=$request->description;
            $news->created_by = Auth()->user()->id;
            $news->updated_by = Auth()->user()->id;

            if($news->save())
            {
                //$success = array('success'=>"Successfully save changes.");
              return redirect()->route('news.index')
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
            $news= News::find($id); 
            return view('admin.news.edit',compact('news'));
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
            'title' => 'required',
             'link'=>'required|nullable|url',
            'description'=>'required',
        ]);
  
         try{
            $news = News::find($id);
            $news->title=$request->title;
            $news->link=$request->link;
            $news->description=$request->description;
            $news->created_by = Auth()->user()->id;
            $news->updated_by = Auth()->user()->id;
            $news->updated_at = date('Y-m-d H:i:s');

            if($news->save())
            {
               // $success = array('success'=>"Successfully save changes!");
                    
              return redirect('news/index?page='.Session::get('pageno'))
                        ->with('success','Updated Successfully!');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storesession(Request $request){
        //dd($request->id);exit();
          Session::put('newscheck',$request->ids);
        
    }
    public function deleteall(Request $request){
       $result = AllHelper::deleteAll($request,'App\News');
       return response()->json($result); 
    }
    
}
