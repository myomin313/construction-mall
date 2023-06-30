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
                            <ul id="myTabedu1" class="tab-review-design center">
                                <li class="active"><a href="#profile">update Advertise With Us</a></li>
                            </ul>

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
                                                          <form id="aboutusUpdate"  method="post" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="type" value="{{ $aboutus->type }}">
                                                            <div class="form-group">
                                                              <label>Title</label>
                                                                <input type="text" class="form-control" placeholder="Blog Title" value="{{ old('title',$aboutus->title)}}" name="title">
                                                            </div>

                                                             <div class="form-group">
                                                                <label>Description</label>
                                                              <textarea name="description"  class="form-control" >
                                                                <?php echo $aboutus->description ?>
                                                              </textarea>  
                                                           </div>

                                                           <div class="form-group">
                                                              <label>Image</label>
                                                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target="#joinaboutusmodal">Upload Photo</button>
                                                                <div id="current_aboutus_photo"></div>
                                                            </div> 
                                                             

                                                          <div class="form-group">
                                                              <label>Button Text</label>
                                                                <input type="text" class="form-control" placeholder="Button Text" value="{{ old('btn_text',$aboutus->btn_text)}}" name="btn_text">
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
            <div class="modal fade bs-example-modal-md-1" id="joinaboutusmodal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Upload  Photo</h2>
                       <form id="profilephotoForm" enctype="multipart/form-data">
                         <div class="form-group">
                              <center>
                                <input type="file" id="aboutus_file" name="aboutus_photo" accept="image/*">
                              </center>
                              <div id="aboutus_photo"></div>
                          </div> 
                     </form>
            <p>
              <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-aboutus-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
            </p>
          </div>
        </div>
      </div>
        <!-- end profile image pop up -->
        <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
            
    <script type="text/javascript">
          $(document).ready(function(){
            // start image upload
             var img = '<?php echo asset('storage/setting/'.$aboutus->image) ?>';
               var image_name = '<?php echo $aboutus->image ?>';   

               //Image Cropping
               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_aboutus_photo").html(html);
               /* image crop */
               var resize = $('#aboutus_photo').croppie({
                 enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 448,
                    height: 261,
                    type: 'square' //circle
                },
                boundary: {
                    width: 800,
                    height: 600
                }
            });
             
            $('#aboutus_file').on('change', function () {
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

            $('.upload-aboutus-image').on('click', function (ev) {
              resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
                 $.ajax({
                   url: "{{ route('about-us.croppie.upload-image') }}",
                   type: "POST",
                    data: {"image":img,'old_image':image_name},
                   dataType: 'json',
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success: function (data) {
                   
                    html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                    $("#current_aboutus_photo").html(html);   
                        },
                   error:function(e){
                    console.log(e)
                   }
                 });
              });
            });

            //end image upload
               var APP_URL = '<?php echo url('/') ?>'; 
             $('form#aboutusUpdate').on('submit',function(e){
                var image     = $('#current_aboutus_photo img').attr('alt');
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('about-us.update',$aboutus->id) }}",
                      data: $('#aboutusUpdate').serialize()+"&image="+image+'&old_image='+image_name,
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          if($.isEmptyObject(data.errors)){ 
                             window.location.href = '<?php echo route('about-us.joins'); ?>'; 
                          }
                          else{
                              printErrorMsg(data.errors);
                          } 
                       },
                      error:function(e)
                      {
                           var message = "Something Wrong!";
                         callbackFailure(message);
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