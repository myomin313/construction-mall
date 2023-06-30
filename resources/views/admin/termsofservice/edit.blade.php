@extends('layouts.admin_panel')
@section('content')
         <!-- Single pro tab review Start-->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                     <div class="col-md-12">
                    @include('admin.element.breadcrumb')
                    <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Update Terms Of Service</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="{{ route('terms-and-service') }}" class="btn btn-default pull-right">
                            <!--<i class="fa fa-list" aria-hidden="true"></i>-->
                            Go To Terms Of Service Page
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
              
                    <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pt-20 company_profile">
                        <h2 class="center">Freelancer Information</h2>  
                    </div> -->
                    <div class="card-body">
                        <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!--<div class="product-payment-inner-st">-->
                           
                             <div class="col-md-12 error">
                           </div>
                            <div id="myTabContent" class="tab-content custom-product-edit">


                                <!-- update account start -->
                                 <div class="product-tab-list tab-pane fade active in" id="profile">
                              <!--   <div class="product-tab-list tab-pane fade pb-150" id="account"> -->
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                                                        <div class="devit-card-custom">
                                                              @include('admin.element.success-message')
                                                          <form action="{{ route('terms-of-service.update') }}"  method="post" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                               <div id="error">
              </div>
                                                            <div class="form-group">
                                                              <label>Title</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control {{ $errors->has('header') ? 'error-messageborder' : '' }}" placeholder="Title" value="{{ old('header',$termsofservice->header)}}" name="header">
                                                                <!-- Error -->
                @if ($errors->has('header'))
                <div class="error">
                    {{ $errors->first('header') }}
                </div>
                @endif
            <!-- End Error -->
                                                            </div>
                                                            
                                                            <!--<div class="form-group">-->
                                                            <!--  <label>Image</label>-->
                                                            <!--    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".privacy_upload_modal">Upload Photo</button>-->
                                                            <!--    <div id="current_privacy_photo"></div>-->
                                                            <!--</div>-->
                                                             <div class="form-group">
                                                              <label>Image</label>
                                                                   <div clas="file_input_wrap">
                                                                     <input type="file" id="privacy_file" name="privacy_photo" accept="image/*" class="hide">
                                                                     <label for="privacy_file" class="btn btn-primary ">Upload Photo</label>
                                                                   </div>
                                                                    <div class="img_preview_wrap">
                                                                     <div id="current_privacy_photo"></div>
                                                                     <!--<img src="" id="imagePreview" alt="Preview Image" width="200px" class="hide" />-->
                                                                    </div>
                                                            </div>

                                                             <div class="form-group">
                                                                <label>Terms of Service Detail</label>
                                                              <textarea name="termsOfService" id="termsOfService" class="summernote" >
                                                                <?php echo $termsofservice->termsOfService ?>
                                                              </textarea>  
                                                           </div>
                                                            <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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
                        <!--</div>-->
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- start profile image pop up -->
       <!--image upload-modal start-->
            <div class="modal bs-example-modal-md-1 privacy_upload_modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Upload Tearms and Service Photo</h2>
                       <form  enctype="multipart/form-data">
                         <div class="form-group">
                              <!--<center>-->
                              <!--  <input type="file" id="privacy_file" name="privacy_photo" accept="image/*">-->
                              <!--</center>-->
                              <div id="privacy_photo"></div>
                          </div> 
                     </form>
            <p>
              <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-privacy-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
            </p>
          </div>
        </div>
      </div>
        <!-- end profile image pop up -->
        <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
        <script type="text/javascript">
        $(document).ready(function() {
          $('.summernote').summernote();
        });
       </script>      
    <script type="text/javascript">
          $(document).ready(function(){

             // start
              var img = '<?php echo asset('storage/setting/'.$termsofservice->header_image) ?>';
              var image_name = '<?php echo $termsofservice->header_image ?>';   

               //Image Cropping
               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_privacy_photo").html(html);
               /* image crop */
               var resize = $('#privacy_photo').croppie({
                 enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 1900,
                    height: 1000,
                    type: 'square' //circle
                },
                boundary: {
                    width: 800,
                    height: 500
                }
            });
             
            $('#privacy_file').on('change', function () {
              var reader = new FileReader();
                reader.onload = function (e) {
                  resize.croppie('bind',{
                    url: e.target.result
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
                }
                reader.readAsDataURL(this.files[0]);
                $('.privacy_upload_modal').modal('show');
            });

            $('.upload-privacy-image').on('click', function (ev) {
              resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
                 $.ajax({
                   url: "{{ route('terms-of-service.croppie.upload-blog-image') }}",
                   type: "POST",
                    data: {"image":img,'old_image':image_name},
                   dataType: 'json',
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success: function (data) {
                   
                    html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                    $("#current_privacy_photo").html(html);   
                        },
                   error:function(e){
                    console.log(e)
                   }
                 });
              });
            });
           

             // end
            //   var APP_URL = '<?php echo url('/') ?>'; 
            //  $('form#editBlogForm').on('submit',function(e){
            //     var image     = $('#current_privacy_photo img').attr('alt');
            //     var description = $('#blog_detail').summernote('code');
            //     e.preventDefault();
            //   $.ajax({
            //           type: "post",
            //           url: "{{ URL::route('privacy.update') }}",
            //           data: $('#editBlogForm').serialize()+"&description="+description+"&image="+image+'&old_image='+image_name,
            //           dataType: 'json',
            //           headers: {
            //               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //           },
            //           success:function(data)
            //           {
            //               if($.isEmptyObject(data.errors)){
            //                   alert(data.success);
            //     window.location.href = '<?php echo route('freelancer.blogs'); ?>';
            //               }
            //               else{
            //                   printErrorMsg(data.errors);
            //               } 
            //           },
            //           error:function(e)
            //           {
            //              alert('Something Wrong');
            //           }
            //         });
            //   });

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