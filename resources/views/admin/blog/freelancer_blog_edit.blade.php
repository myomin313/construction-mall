@extends((Auth::user()->role == 3) ? 'layouts.freelancer_panel' :'layouts.admin_panel')
@section('content')
<?php
$category_arr = explode(",",$blog->blog_category_id);
?> 
<style>
  .hide {
    display: none;
}
.btn-large {
  padding: 11px 19px;
  font-size: 17.5px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}

#imagePreview {
  margin: 15px 0 0 0;
  border: 2px solid #ddd;
}
 </style>
 <!-- start -->
 <body class="freelancers">
 <div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
<!--main-header end--> 
@include('element.header')

   <section class="inner-heading"  style="background: url('{{ asset('storage/freelancer/'.$projectsetting->freelancer_detail_image)}}') 100%;">
    <div class="container">
    <h1>Update Blog</h1>
     
    </div>
  </section>
           <!-- Single pro tab review Start-->
      <section class="inner-wrap">
        <div class="container">
         <div class="row">
         <ul class="blog-grid">
         
        <div class="col-md-9 col-sm-12">
             <li>
          <div class="blog-inter">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- <div class="single-pro-review-area mg-b-15"> -->
            <!--<div class="container-fluid" style="border: 2px solid #acacac;border-radius: 10px">-->
                <!-- <div class="card"> -->
              <!-- <div class="card-body table-responsive"> -->
                                                    <form  id="editBlogForm" method="post" enctype="multipart/form-data">
                                                      {{csrf_field()}}
                                                      <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <input type="hidden" name="id" value="{{ $blog->id }}">
                                                          <div class="form-group">
                                                              <label>Title</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control" placeholder="Blog Title" value="<?= $blog->title ?>" name="title">
                                                                 <div id="titleError" class="error"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Blog Detail</label><span class="text-error-danger"> * </span>
                                                              <textarea name="description" id="blog_detail">
                                                                 <?= $blog->description ?>
                                                              </textarea> 
                                                                  <div id="descriptionError" class="error"> </div>
                                                           </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                          
                                                                <div class="form-group">
                                                              <label>Image</label><span class="text-error-danger"> * </span>
                                                            <div clas="file_input_wrap">
                                                                 <input type="file" id="blog_file" name="blog_photo" accept="image/*" class="hide">
                                                                <label for="blog_file" class="btn btn-standard" style="color:white !important">Upload Photo</label>
                                                            </div>
                                                            <div class="img_preview_wrap">
                                                                 <div id="current_blog_photo"></div>
                                                                 <div id="imageError" class="error"> </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        
                                                          <div class="col-md-12 col-sm-12 col-xs-12">
                               
                                    <div class="form-group">
                                                             <label for="category">Categories <span class="text-error-danger"> * </span></label><br>
                                                             <div class="row">
                                                             @foreach($blog_categories as $blog_category)
                                                              <?php 
                                                             if(in_array($blog_category->id, $category_arr))
                                                                $checked = "checked";
                                                             else
                                                                $checked = "";
                                                              ?>
                                                            
                                                              <div class="col-md-3 col-sm-6 col-xs-12">
                                                                  <label>
                                                             <input type="checkbox" value="<?= $blog_category->id ?>" name="blog_category_id[]" class="category" <?= $checked ?>> <span><?= $blog_category->category_name ?></span>
                                                             </label>
                                                           </div>
                                                             @endforeach
                                                           </div>
                                                            <div id="category_nameError" class="error"></div>
                                                          </div>
                                                          
                                       </div>
                                       
                                                        </div>
                                                        
                                                    <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                  <div class="payment-adress">
                                                      <center>
                                                            <button type="submit" id="btn_editblog" class="btn btn-standard">Update</button>
                                                            </center>
                                                        </div>
                                                    </div>
                                                </div>
                                                      <!--</div>-->
                                                      <!--start-->
                                <!--                      <div class="row">-->
                                <!--<div class="col-lg-12 col-md-12">-->
                                <!--                  <div class="payment-adress">-->
                                <!--                      <center>-->
                                <!--                <button type="submit" id="btn_addblog" class="btn btn-standard">Save</button>-->
                                <!--                </center>-->
                                <!--              </div>-->
                                <!--              </div>-->
                                <!--              </div>-->
                                                      <!--end-->
                                                             
                                                </form>
                                                <!-- </div> -->
                                             <!--  </div> -->
                                            <!--</div>-->
                                          <!-- </div> -->
                                        </div>
                                        </div>
                                        </div>
                                        </li>
                                        </div>
                                        <li class="col-md-3 col-sm-12"> 
            @include('admin.freelancer.freelancer_menu')
          <!-- end advertising -->
            @foreach($advertisings as $advertising)
          <div class="side-bar"> 
              <div class="advertise">
                   <a href="{{ $advertising->link }}"><img src="{{ asset('storage/advertising/'.$advertising->photo) }}" alt="{{ $advertising->company_name }}" style="height:100%;width:100%"></a>
              </div> 
          </div>
           @endforeach 
        </li>
                                      </ul>
                                    </div>
                                  </div>
                                        </section>
        <!--image upload-modal start-->
            <div class="modal bs-example-modal-md-1 blog-edit-modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Upload Blog Photo</h2>
                       <form id="profilephotoForm" enctype="multipart/form-data">
                         <div class="form-group">
                              <div id="blog_photo"></div>
                          </div> 
                     </form>
            <!--<p>-->
            <!--  <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-blog-image" data-dismiss="modal" aria-label="Close">Upload Image</button>-->
            <!--</p>-->
            
            <div class="row" style="padding:20px">
                <div class="col-lg-12 col-md-12">
                            <center>
                             <!--<button id="btn_experienceform" type="submit" class="btn btn-primary waves-effect waves-light">Save</button>-->
                       <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-blog-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
                    </center>
                </div>
            </div>
                                                
          </div>
        </div>
      </div>
        <!-- end profile image pop up -->
        <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
      
    <script type="text/javascript">
   
          $(document).ready(function(){
 

              var img = '<?php echo asset('storage/blog/'.$blog->image) ?>';
               var image_name = '<?php echo $blog->image ?>';   

               //Image Cropping
               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_blog_photo").html(html);
               /* image crop */
               var resize = $('#blog_photo').croppie({
                 enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 600,
                    height: 450,
                    type: 'square' //circle
                },
                boundary: {
                    width: 610,
                    height: 460
                }
            });
             
            $('#blog_file').on('change', function () {
              var reader = new FileReader();
                reader.onload = function (e) {
                  resize.croppie('bind',{
                    url: e.target.result
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
                }
                reader.readAsDataURL(this.files[0]);
                 $('.blog-edit-modal').modal('show');
            });

            $('.upload-blog-image').on('click', function (ev) {
              resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
                 $.ajax({
                   url: "{{ route('freelancer.croppie.upload-blog-image') }}",
                   type: "POST",
                    data: {"image":img,'old_image':image_name},
                   dataType: 'json',
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success: function (data) {
                   
                    html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                    $("#current_blog_photo").html(html);   
                        },
                   error:function(e){
                    console.log(e)
                   }
                 });
              });
            });
           
               var APP_URL = '<?php echo url('/') ?>'; 
             $('form#editBlogForm').on('submit',function(e){
                var image     = $('#current_blog_photo img').attr('alt');
                var description = $('#blog_detail').summernote('code');
                description = description.replaceAll("&amp;", "and_char");
                e.preventDefault();
                
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('update.blog',$blog->id) }}",
                      data: $('#editBlogForm').serialize()+"&description="+description+"&image="+image+'&old_image='+image_name,
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          if($.isEmptyObject(data.errors)){  
                           //   var message = data.success; 
                                var url = "{{ url('blog-list?page='.Session::get('pageno')) }}";
                                window.location= url;
                             //   callbackURL(message,url); 
                          }
                          else{
                             // printErrorMsg(data.errors);
                             console.log(data.errors);
                              if($.isEmptyObject(data.errors.title)){ 
                                  $('#titleError').html("");
                                   $("input[name=title]").removeClass('error-messageborder');
                              }else{
                                   $('#titleError').html(data.errors.title);
                                   $("input[name=title]").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.blog_category_id)){ 
                                  $('#category_nameError').html("");
                                   $("input[name=blog_category_id]").removeClass('error-messageborder');
                              }else{
                                   $('#category_nameError').html(data.errors.blog_category_id);
                                   $("select[name=blog_category_id]").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.description)){ 
                                  $('#descriptionError').html("");
                                   $("textarea[name=description]").removeClass('error-messageborder');
                              }else{
                                   $('#descriptionError').html(data.errors.description);
                                   $("textarea[name=description]").addClass('error-messageborder');
                              }
                               
                             if($.isEmptyObject(data.errors.image_name)){ 
                                  $('#imageError').html("");
                              }else{
                                   $('#imageError').html(data.errors.image_name);
                              }
                          } 
                       },
                      error:function(e)
                      {
                          var message = "Something Wrong!";
                         callbackFailure(message) ;
                      }
                    });
              });

            
              function printErrorMsg (msg) {
                   var message="";
                   if($(msg).length >1){
                     message +='<ul class="alert alert-danger">';
                     $.each(msg, function( key, value ) {
                      message += '<li>'+value+'</li>';
                   }); 
                    message +='</ul>';
                  $(".error").html(message);
                }
                else{
                   message = '<span class="alert alert-danger">'+msg+'</span>';
                   $(".error").html(message);

                 setTimeout(function() {
                      $('.alert').fadeOut('fast');
                     }, 5000);              
                  } 
            } 
            
             // start blog  image upload
             $('#blog_detail').summernote({
                    height: 150,
	               toolbar: [
                    ['style',['style']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['font', ['bold', 'italic','underline', 'strikethrough']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['height', ['height']]
                 ],
                  styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5'],
                   callbacks: {
                  onImageUpload: function(files) {
                  // editor = $(this);
                  // uploadImageContent(image[0], editor);
                  for(let i=0; i < files.length; i++) {
                    uploadImageContent(files[i]);
                   }
                }
              }
            });
            //start summernote js 
            function uploadImageContent(image) {
                var data = new FormData();
                 data.append("image", image);
             $.ajax({
               url: "{{ URL::route('summernote.upload') }}",
               cache: false,
               contentType: false,
               processData: false,
               data: data,
               type: "post",
               headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
               success: function(url) {
                   //console.log(url);
               var image = $('<img>').attr('src', url);
               $('#blog_detail').summernote("insertNode", image[0]);
               },
               error: function(data) {
               console.log(data);
               }
               });
             }


             
          }); 
            
    </script>
       @endsection