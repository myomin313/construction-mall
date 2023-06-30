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
                                <li class="active"><a href="#profile">update Benefit Us</a></li>
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
                                                          <form id="advertisewithusUpdate"  method="post" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="type" value="{{ $advertisewithus->type }}">
                                                            <div class="form-group">
                                                              <label>Title</label>
                                                                <input type="text" class="form-control" placeholder="Blog Title" value="{{ old('title',$advertisewithus->title)}}" name="title">
                                                            </div>

                                                             <div class="form-group">
                                                                <label>Description</label>
                                                              <textarea name="description"  class="form-control" >
                                                                <?php echo $advertisewithus->description ?>
                                                              </textarea>  
                                                           </div>

                                                           <div class="form-group">
                                                              <label>Image</label>
                                                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target="#sponsoraboutmodal">Upload Photo</button>
                                                                <div id="current_advertise_photo"></div>
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
            <div class="modal fade bs-example-modal-md-1" id="sponsoraboutmodal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Upload  Photo</h2>
                       <form id="profilephotoForm" enctype="multipart/form-data">
                         <div class="form-group">
                              <center>
                                <input type="file" id="advertise_file" name="advertise_photo" accept="image/*">
                              </center>
                              <div id="advertise_photo"></div>
                          </div> 
                     </form>
            <p>
              <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-advertise-us-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
            </p>
          </div>
        </div>
      </div>
        <!-- end profile image pop up -->
        <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
            
    <script type="text/javascript">
          $(document).ready(function(){
            // start image upload
             var img = '<?php echo asset('storage/setting/'.$advertisewithus->img) ?>';
               var image_name = '<?php echo $advertisewithus->img ?>';   

               //Image Cropping
               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_advertise_photo").html(html);
               /* image crop */
               var resize = $('#advertise_photo').croppie({
                 enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 50,
                    height: 50,
                    type: 'square' //circle
                },
                boundary: {
                    width: 100,
                    height: 100
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

            $('.upload-advertise-us-image').on('click', function (ev) {
              resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
                 $.ajax({
                   url: "{{ route('advertise-with-us.croppie.upload-image') }}",
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

            //end image upload
               var APP_URL = '<?php echo url('/') ?>'; 
             $('form#advertisewithusUpdate').on('submit',function(e){
                var image     = $('#current_advertise_photo img').attr('alt');
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('advertise-with-us.benefit.update',$advertisewithus->id) }}",
                      data: $('#advertisewithusUpdate').serialize()+"&img="+image+'&old_image='+image_name,
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          if($.isEmptyObject(data.errors)){
                              console.log(data);
                              if(data.type == 'sponsor'){
                             window.location.href = '<?php echo route('advertise-with-us.sponsorship'); ?>';
                           }else{
                            window.location.href = '<?php echo route('advertise-with-us.benefits'); ?>';
                           }
                          }
                          else{
                              printErrorMsg(data.errors);
                          } 
                       },
                      error:function(e)
                      {
                         alert('Something Wrong');
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