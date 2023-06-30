<?php

namespace App\Http\Controllers\Admin;
use App\Helper\AndCharacterChanger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\BlogCategory;
use App\Freelancer;
use App\Blog;
use App\Advertising;
use App\Helper\AllHelper;
use DB;
use Session;
use Redirect;
use URL;

class BlogController extends Controller
{
    
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addBlog(Request $request){
        $user_id = Auth()->user()->id;
       $freelancer= Freelancer::where('user_id',$user_id)->with('user')->first();
        $advertisings = Advertising::getPageDetailAdvertising(); 
        if(Auth::user()->role == 3){
          return view('admin.blog.freelancer_blog_new',compact('freelancer','advertisings'));  
        }else{
          return view('admin.blog.new',compact('freelancer'));   
        }
    }
    public function blogimageCrop(Request $request){
        $image = $request->image;
       list($type, $image) = explode(';',$image);
        list(, $image)      = explode(',',$image);
        $image = base64_decode($image);
         $image_name= time().'.png';
           $path  = storage_path('app/public/blog/'. $image_name);
        file_put_contents($path, $image);
        return response()->json(['status'=>true,'image_name'=>$image_name]);
    }
       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createBlog(Request $request){ 
      
      if ($request->image == "undefined")
        {
            $request['image_name'] = null;
        }
        else
        {
            $request['image_name'] = $request->image;
        }
        
             $status = $this->validation($request);
        if($status->fails())
        {
             $errors =array('errors'=>$status->messages());
             return response()->json($errors);  
        }
        else{
            $category_id =implode(",",$request->blog_category_id);
            $blog_url = strtolower(self::makeUrl(trim($request->title)));
            
            // start image  upload
         $description =$request->description;
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
           $data = $img->getAttribute('src');
             $pathinfo = pathinfo($data);
           $img->removeAttribute('src');
           $img->setAttribute('src', $pathinfo['filename'].'.'.$pathinfo['extension']);
        }
        $description = $dom->saveHTML();
            //end image upload
            
            $blog=new Blog;
            $blog->post_user_id = Auth()->user()->id;
            $blog->title =$request->title;
            $blog->image =$request->image;
            $blog->blog_url= $blog_url;
            $blog->description = $description;
            $blog->blog_category_id =$category_id;
            //$blog->save();
            if($blog->save())
            {
                  Session::flash('success', 'Created successfully!'); 
                $success = array('success'=>"Created successfully!");
                return response()->json($success);            
            }else
            {
                $errors = array('errors'=>"Something wrong!");
                return response()->json($errors);
            }
        }

    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogList(Request $request){
        $data=$request->all();
        $title=$request->title;
        $is_active = $request->is_active;
        $posted_user = $request->posted_user;
               
        $user_id = Auth()->user()->id;
      $freelancer= Freelancer::where('user_id',$user_id)->with('user')->first();
       if(Auth()->user()->role == 3){
         $blogs=Blog::getBlogList($request,$user_id);
       }else{
         $blogs=Blog::getBlogListForAdmin($request);
       }
       
          foreach($blogs as $blog){
                     $categories= explode (",", $blog->blog_category_id);
                      $blog->category_arr = [];
                      foreach($categories as $category){
                     $cate=BlogCategory::where('id','=',$category)
                          ->select('category_name')->first();
                         array_push($blog->category_arr, $cate->category_name);  
                      }
                      
                $blog->description =$this->setImageSrc($blog->description);
                     
                 }
                 
       
         $advertisings = Advertising::getPageDetailAdvertising();
        if(Auth::user()->role == 3){
           return view('admin.blog.freelancer_blog_list',compact('blogs','freelancer','data','title','is_active','posted_user','advertisings'));  
        }else{
           return view('admin.blog.list',compact('blogs','freelancer','data','title','is_active','posted_user'));   
        }
        
        //return view('');
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function editBlog($id,$page){
       $id = \Crypt::decrypt($id);
        $page = \Crypt::decrypt($page);

         if(is_numeric($id)){
            Session::put('pageno',$page);
            $user_id = Auth()->user()->id;
            $freelancer= Freelancer::where('user_id',$user_id)->with('user')->first();
        $blog = Blog::where('id',$id)->first();
         // start  blog 
       $blog->description=$this->setImageSrc($blog->description);
        // end blog
        // return view('admin.blog.edit',compact('blog','freelancer'));
          $advertisings = Advertising::getPageDetailAdvertising();
         if(Auth::user()->role == 3){
          return view('admin.blog.freelancer_blog_edit',compact('blog','freelancer','advertisings'));  
        }else{
          return view('admin.blog.edit',compact('blog','freelancer'));   
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
    public function updateBlog(Request $request,$id){
        
        if ($request->image == "undefined")
        {
            $request['image_name'] = null;
        }
        else
        {
            $request['image_name'] = $request->image;
        }
        
           $status = $this->validation($request);
        if($status->fails())
        {
            $errors =array('errors'=>$status->messages());
             return response()->json($errors);  
        }
        else{
            $blog_category_id=implode(",",$request->blog_category_id);
            $old_image = $request->old_image;
            
            // start image  upload
         $description = AndCharacterChanger::replaceChar($request->description);
         $description = $request->description;
         $dom = new \DomDocument();
         $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
         $images = $dom->getElementsByTagName('img');
         foreach($images as $k => $img){
           $data = $img->getAttribute('src');
             $pathinfo = pathinfo( $data);
           $img->removeAttribute('src');
           $img->setAttribute('src', $pathinfo['filename'].'.'.$pathinfo['extension']);
         }
         $description = $dom->saveHTML();
            //end image upload
            
            $updated_at = date('Y-m-d H:i:s');
            $blog_url = strtolower(self::makeUrl(trim($request->title)));
            $blog = Blog::find($id);
            $blog->title =$request->title;
            $blog->image =$request->image_name;
            $blog->blog_url =$blog_url;
            $blog->updated_at = $updated_at;
            $blog->description = $description;
            $blog->blog_category_id =$blog_category_id;
         
            if($blog->save())
            {
                    
                if( $request->image != $request->old_image){
                    if(Storage::disk('public')->exists('/blog/'.$request->old_image)){
                  unlink(storage_path('app/public/blog/'.$request->old_image));
                    }
                } 
                Session::flash('success', 'Updated Successfully!'); 
                $success = array('success'=>"Successfully saved changes!");
                return response()->json($success);            
            }else
            {
                $errors = array('errors'=>"Something wrong!");
                return response()->json($errors);
            }
        }  

    }
    private function validation($request)
    {
        $messages = [
            'title.required' => 'Blog Title is required',
            'image_name.required' => 'Image is required',
            'description.required' => 'Blog Description is required',
            'blog_category_id.required' => 'Blog Category is required',
        ];

        $validator = Validator::make($request->all(), [
                'title' => "required",
                'image_name'=>"required",
                'description'=>"required",
                'blog_category_id'=>"required",
            ], $messages);
        return $validator;  
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteBlog($id){
         $blog = Blog::findOrFail($id);
        if(Storage::disk('public')->exists('/blog/'.$blog->image))
            unlink(storage_path('app/public/blog/'.$blog->image));
        $blog->delete();
        return Redirect::back();
        
    }
     //update Quotaion status record
     public function updateBlogStatus(Request $request){
       $result = AllHelper::approveStatus($request,'App\Blog');
       return response()->json($result);

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

     public function storesession(Request $request){
        //dd($request->id);exit();
          Session::put('blogcheck',$request->ids);
        
    }
    public function deleteall(Request $request){
        $result = AllHelper::deleteAll($request,'App\Blog');
       return response()->json($result);
    }
    public function summernoteUpload(Request $request){
       $return_value = "";
        if ($_FILES['image']['name']) {
             if (!$_FILES['image']['error']) {
        $name = md5(rand(100,200));
        $ext = explode('.', $_FILES['image']['name']);
        $filename = $name . '.' . $ext[1];
        $destination = storage_path('app/public/blog/'. $filename);
        $location = $_FILES["image"]["tmp_name"];
        move_uploaded_file($location, $destination);
        $return_value = 'https://myanbox.com.mm/storage/blog/'. $filename;
        }else{
        $return_value = 'Ooops! Your upload triggered the following error: '.$_FILES['image']['error'];
        }
       }
       echo $return_value;
    }
    public function setImageSrc($description){
    //   $dom = new \DomDocument();
    //   $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
       
        $dom = new \DomDocument();   
     $searchPage = mb_convert_encoding($description, 'HTML-ENTITIES', "UTF-8");
      @$dom->loadHTML($searchPage);
       
       $images = $dom->getElementsByTagName('img');
       foreach($images as $k => $img){
           $data = $img->getAttribute('src');
             $pathinfo = pathinfo( $data);
           $img->removeAttribute('src');
           $img->setAttribute('src', URL::to('/').'/storage/blog/'.$pathinfo['filename'].'.'.$pathinfo['extension']);
        }
       $description = $dom->saveHTML();
        return $description;
        
    }
}
