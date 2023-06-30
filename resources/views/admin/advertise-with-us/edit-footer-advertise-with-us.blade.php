@extends('layouts.admin_panel')
@section('content')
         <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mg-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pt-20 company_profile">
                        <h2 class="center">Freelancer Information</h2>  
                    </div> -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            
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
                                                       <form action="{{ url('/advertise-with-us/footer/update') }}"  method="post" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                           
                                                            <div class="form-group">
                                                              <label>Image</label>
                                                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".advertise_upload_modal">Upload Photo</button>
                                                                <div id="current_advertise_photo"></div>
                                                            </div>
                                                            
                                                              <div class="form-group">
                                                                <input type="text" class="form-control"  value="{{ old('analyse_customer_data_header',$advertisewithusfooter->analyse_customer_data_header)}}"
                                                                name="analyse_customer_data_header">
                                                            </div>
                                                            
                                                            
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"  value="{{ old('btn_text',$advertisewithusfooter->btn_text )}}" name="btn_text">
                                                            </div>
                                                            
                                                              <div class="form-group">
                                                             
                                                                <input type="text" class="form-control"  value="{{ old('advertise_with_us',$advertisewithusfooter->advertise_with_us)}}" 
                                                                name="advertise_with_us">
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"  value="{{ old('call_now',$advertisewithusfooter->call_now )}}" 
                                                                name="call_now">
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                      <label for="name">Phone To Call:</label>
                                                                    <input type="text" class="form-control"  name="call_now_phone" value="{{ $advertisewithusfooter->call_now_phone }}">
                                                              </div>
                                                            
                                                            <div class="form-group">
                                                                      <label for="name">Footer Background Color:</label>
                                                                    <input type="color" class="form-control"  name="call_now_background_color" value="{{ $advertisewithusfooter->call_now_background_color }}">
                                                              </div>
                                                         <div class="form-group">
                                                            <label for="name">Footer Font Color:</label>
                                                           <input type="color" class="form-control"  name="call_now_font_color" value="{{ $advertisewithusfooter->call_now_font_color  }}">
                                                         </div>

                                                             <div class="form-group">
                                                              
                                                              <textarea name="analyse_description"  class="form-control" value="{{ old('analyse_description',$advertisewithusfooter->analyse_description )}}">
                                                    {{ old('analyse_description',$advertisewithusfooter->analyse_description )}}
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- start profile image pop up -->
        <!--image upload-modal start-->
            <div class="modal fade bs-example-modal-md-1 advertise_upload_modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Upload Privacy Header</h2>
                       <form  enctype="multipart/form-data">
                         <div class="form-group">
                              <center>
                                <input type="file" id="advertise_file" name="advertise_photo" accept="image/*">
                              </center>
                              <div id="advertise_photo"></div>
                          </div> 
                     </form>
            <p>
              <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-advertise-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
            </p>
          </div>
        </div>
      </div>
        <!-- end profile image pop up -->
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
              var img = '<?php echo asset('storage/setting/'.$advertisewithusfooter->analyse_image ) ?>';
              var image_name = '<?php echo $advertisewithusfooter->analyse_image  ?>';   

               //Image Cropping
               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_advertise_photo").html(html);
               /* image crop */
               var resize = $('#advertise_photo').croppie({
                 enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 800,
                    height: 600,
                    type: 'square' //circle
                },
                boundary: {
                    width: 900,
                    height: 630
                }
            });
             
            $('#advertise_file').on('change', function () {
              var reader = new FileReader();
                reader.onload = function (e) {
                  resize.croppie('bind',{
                    url: e.target.result
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('.upload-advertise-image').on('click', function (ev) {
              resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
                 $.ajax({
                   url: "{{ route('advertise.croppie.upload-analyse-image') }}",
                   type: "POST",
                    data: {"image":img,'old_image':image_name},
                   dataType: 'json',
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success: function (data) {
                   
                    html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                    $("#current_advertise_photo").html(html);   
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