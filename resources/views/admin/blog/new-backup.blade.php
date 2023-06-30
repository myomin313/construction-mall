@extends((Auth::user()->role == 3) ? 'layouts.freelancer_panel' :'layouts.admin_panel')
@section('content')
 <style>
  .hide {
    display: none;
}
/*.btn {*/
/*  display: inline-block;*/
/*  padding: 4px 12px;*/
/*  margin-bottom: 0;*/
/*  font-size: 14px;*/
/*  line-height: 20px;*/
  /*color: #333333;*/
/*  text-align: center;*/
/*  vertical-align: middle;*/
/*  cursor: pointer;*/
/*  border: 1px solid #ddd;*/
/*  box-shadow: 2px 2px 10px #eee;*/
/*  border-radius: 4px;*/
/*}*/

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
 <!--end-->
         <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mg-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Add New Blog</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="{{ route('freelancer.blogs') }}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                             Blog List
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
              <div class="card-body table-responsive">
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                 <div class="product-tab-list tab-pane fade active in" id="profile">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                                                        <div class="devit-card-custom">
                                                           
                                                              <form id="addnewblogForm" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                            <div class="form-group">
                                                              <label>Title</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control" placeholder="Blog Title" value="" name="title">
                                                               <div id="titleError" class="error"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                  <label>Category</label><span class="text-error-danger"> * </span>
                                                                  <select class="form-control" id="blog_category_id" name="blog_category_id">
                                                                    <option value="">Category</option>
                                                                       @foreach($blog_categories as $blog_category)
                                                                        <option value="{{ $blog_category->id }}">{{ $blog_category->category_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                       <div id="category_nameError" class="error"></div>
                                                                </div>
                                                           
                                                            <!--<div class="form-group">-->
                                                            <!--  <label>Image</label>-->
                                                            <!--    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".blog-create-modal">Upload Photo</button>-->
                                                            <!--    <div id="current_blog_photo"></div>-->
                                                            <!--        <div id="imageError" class="error"> </div>-->
                                                            <!--</div> -->
                                                            <!--start-->
                                                            <div class="form-group">
                                                              <label>Image</label><span class="text-error-danger"> * </span>
                                                            <div clas="file_input_wrap">
                                                                <!--<input type="file" name="imageUpload" id="imageUpload" class="hide" />-->
                                                                 <input type="file" id="blog_file" name="blog_photo" accept="image/*" class="hide">
                                                                <label for="blog_file" class="btn btn btn-primary ">Upload Photo</label>
                                                            </div>
                                                            <div class="img_preview_wrap">
                                                                 <div id="current_blog_photo"></div>
                                                                 <div id="imageError" class="error"> </div>
                                                                <!--<img src="" id="imagePreview" alt="Preview Image" width="200px" class="hide" />-->
                                                            </div>
                                                            </div>
                                                           
                                                             <div class="form-group">
                                                                <label>Blog Detail</label><span class="text-error-danger"> * </span>
                                                              <textarea name="description" name="blog_detail" id="blog_detail">
                                                              </textarea> 
                                                                <div id="descriptionError" class="error"> </div>
                                                           </div>


                                                            <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button type="submit" id="btn_addblog" class="btn btn-primary waves-effect waves-light">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- update account end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- start profile image pop up -->
        <!--image upload-modal start-->
            <div class="modal bs-example-modal-md-1 blog-create-modal"  tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Upload Blog Photo</h2>
                       <form id="profilephotoForm" enctype="multipart/form-data">
                         <div class="form-group">
                              <div id="blog_photo"></div>
                             
                          </div> 
                     </form>
            <p>
              <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-blog-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
            </p>
          </div>
        </div>
      </div>
        <!-- end profile image pop up -->
        <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
      
    <script type="text/javascript">
     /*  $("#btn_addblog").on('click', function() {
  	var $this=$(this);
   $this
         .attr('disabled','disabled');
          setTimeout(function() {
            $this.removeAttr('disabled');
        }, 3000);
});*/
          $(document).ready(function(){
     
               //Image Cropping
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
                  $('.blog-create-modal').modal('show');
            });

            $('.upload-blog-image').on('click', function (ev) {
              resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
                 $.ajax({
                   url: "{{ route('freelancer.croppie.upload-blog-image') }}",
                   type: "POST",
                   data: {"image":img},
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
             $('form#addnewblogForm').on('submit',function(e){
                var image     = $('#current_blog_photo img').attr('alt');
                 var description = $('#blog_detail').summernote('code');
                e.preventDefault();
               
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('add.blog') }}",
                      data: $('#addnewblogForm').serialize()+"&description="+description+"&image="+image,
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          if($.isEmptyObject(data.errors)){
                          
                       /*   $("#basic_add_btn").attr('disabled','disabled');
                                setTimeout(function() {
                                  $this.removeAttr('disabled');
                               }, 3000);
*/

                               /*   var message = data.success; 
                                var url = APP_URL+"/blog-list"; 
                                 callbackURL(message,url);*/
      var url = APP_URL+"/blog-list"; 
      window.location = url;
                              
                                  
                            //alert(data.success);
                           // window.location.href = APP_URL+"/blog-list";
                            //location.reload();
                          }else{
                            //  printErrorMsg(data.errors);
                            console.log(data.errors);
                             if($.isEmptyObject(data.errors.title)){ 
                                  $('#titleError').html("");
                                  $("input[name=title]").removeClass('error-messageborder');
                              }else{
                                   $('#titleError').html(data.errors.title);
                                    $("input[name=title]").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.blog_category_id)){ 
                                  $('#category_nameError').html("")
                                  $("input[name=blog_category_id]").removeClass('error-messageborder');
                              }else{
                                   $('#category_nameError').html(data.errors.blog_category_id);
                                    $("select[name=blog_category_id]").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.description)){ 
                                  $('#descriptionError').html("");
                                   $("textarea[name=blog_detail]").removeClass('error-messageborder');
                                  //$("#blog_detail").removeClass('error');
                              }else{
                                   $('#descriptionError').html(data.errors.description);
                                    $("textarea[name=blog_detail]").addClass('error-messageborder');
                                   // $("#blog_detail]").addClass('error');
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
               
               
          }); 
            
    </script>
       @endsection