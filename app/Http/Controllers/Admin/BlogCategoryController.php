<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BlogCategory;
use Session;

class BlogCategoryController extends Controller
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
        $categories = BlogCategory::where(function($query)use($name){
                if(!empty($name) )                
                $query->where('category_name','like', "%".$name."%");
             })->where(function($query)use($is_active){
                                 if($is_active != null)
                                     $query->where('is_active',$is_active);
                               })->orderBy('category_name', 'asc')->paginate(10);
        return view('admin.blogcategory.index', compact('categories','data','name','is_active'));
    }
    //  public function search(Request $request){
        
    //          $data = $request->all(); 
    //          $name=$request->name;
    //          //$is_active=$request->is_active; 
       
    //                           $categories = BlogCategory::where(function($query)use($name){
    //             if(!empty($name) )                
    //             $query->where('category_name','like', "%".$name."%");
    //          })
    //                           ->orderBy('category_name', 'asc')->paginate(10);
                     
            
    //     return view('admin.blogcategory.index',compact('categories','data'));
        
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['category_name' => 'required']);

        try
        {

            //$id = (int)$id;//string to int
            $category_url = strtolower(self::makeUrl(trim($request->category_name)));
            $category = new BlogCategory();
            $category->category_name = $request->category_name;
            $category->category_url = $category_url;

            if ($category->save())
            {
                // start develop by mayoo
                // return redirect()->route('blogcategory.create')->with('message','Successfully Save Changes!');
                // end
                // $success = array('success'=>"Successfully save changes.");
                
                return redirect()
                    ->route('blogcategory.index')
                    ->with('success', 'Created successfully!');
            }
            else
            {
                $errors = array(
                    'errors' => "Something wrong!"
                );
                return $errors;
            }
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
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
    public function edit($id, $pageno)
    {   
        $id = \Crypt::decrypt($id);
        $pageno= \Crypt::decrypt($pageno);

        if(is_numeric($id))
        {
            Session::put('pageno', $pageno);
            $category = BlogCategory::find($id);
            return view('admin.blogcategory.edit', compact('category'));
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
        $request->validate(['category_name' => 'required', ]);

        $category_url = strtolower(self::makeUrl(trim($request->category_name)));
        $category = BlogCategory::find($id);
        $category->category_name = $request->category_name;
        $category->category_url = $category_url;

        if ($category->save())
        {
            // start develop by mayoo
            // return redirect()->route('blogcategory.edit',$id)->with('message','Successfully Update Changes!');
            // end
            // $success = array('success'=>"Successfully save changes!");
            return redirect('blogcategory/index?page=' . Session::get('pageno'))
                ->with('success', 'Updated successfully!');
        }
        else
        {
            $errors = array(
                'errors' => "Something wrong!"
            );
            return $errors;
        }
    }
    public function updateStatus(Request $request)
    { 
        try
        {
            $data['is_active'] = $request->is_active;
            BlogCategory::where('id', '=', $request->id)
                ->update($data);

            Session::flash('success', 'Successfully Change Status!');
            $success = array(
                'success' => "Successfully Status Changes!"
            );
            return response()->json($success);
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
    public static function makeUrl($string)
    {
        $stripArr = array(
            '(',
            ')',
            '{',
            '}',
            '[',
            ']',
            '',
            '  ',
            '_',
            '!',
            '-',
            '&',
            '<',
            '>',
            '<',
            '\\',
            '/',
            '|',
            '+',
            '-',
            ':',
            ',',
            '`',
            '@',
            '#',
            '$',
            '%',
            '^',
            '&',
            '+',
            '*',
            '.',
            '=',
            '-',
            '~',
            '"',
            '\''
        );
        $result = str_replace($stripArr, ' ', $string);
        return preg_replace('# {1,}#', '-', trim($result));
    }


}

