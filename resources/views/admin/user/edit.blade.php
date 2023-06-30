@extends('backend.layouts.user_panel')
@section('title', 'Profile Update')
@section('content')
<body class="freelancers">
<div class="page-wrapper"> 
  <div class="preloader"></div>
   @include('element.header')
   <section class="inner-heading" style="background-image: url('{{ asset('storage/member/'.$projectsetting->member_background_image)}}');">
    <div class="container">
    <h1>{{ Auth()->user()->name }}'s Profile Update</h1>    
    </div>
  </section> 		
          <section class="inner-wrap">
            <div class="container">
                <div class="row">
                    <ul class="blog-grid">
                        <div class="col-md-9 col-sm-12">
                            <li>
                    <div class="blog-inter" style="padding-bottom:40px">
                                  <div class="row">
                                     <div class="col-md-offset-1 col-sm-offset-1 col-md-10 col-sm-10 col-xs-12">
                                      <div id="error">
                                      </div>
                                            <!--<div class="review-content-section">-->
                                            <!--    <div class="row">-->
                                            <!--        <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12 ">-->
                                            <!--            <div class="devit-card-custom">-->
                                                      <form  method="POST" id="edituserForm" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                           
                                                             <div class="row">
                                                    <div class="col-lg-12 col-md-12" > 
                                                     <center>
                                                             <div class="center">
                    <!--<a href="#"><img src="{{ asset('storage/user/'.auth()->user()->logo)}}" class="img-circle" alt="" style="width:150px;height: 150px"></a>-->
                        @if(auth()->user()->logo != null)
                        <input type="file" id="panel_file" name="profile_photo" accept="image/*" class="hide">
                        <img src="{{ asset('storage/user/'.auth()->user()->logo) }}"  class="img-circle" alt="" style="width:150px;height: 150px">
                        <!--<a class="btn btn-sm btn-info" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#uploadprofileModal" title="change">-->
                        <!--     <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></a>-->
                        <label   class="btn btn-sm btn-info" for="panel_file">
                             <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></label>
                        @else
                        <input type="file" id="panel_file" name="profile_photo" accept="image/*" class="hide">
                         <!--<a  data-dismiss="modal" aria-label="Close" for="panel_file" data-toggle="modal">-->
                         
                         <img src="{{ asset('storage/user/'.$projectsetting->member_default_logo) }}"  class="img-circle" alt="" style="width:150px;height: 150px">
                             <label   class="btn btn-sm btn-info" for="panel_file">
                                 <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i>
                         </label>
                         <!--</a>-->
                        @endif
                        <!-- start-->
                       <!--<h2> <?=  substr(Auth::user()->name,0,20) ?></h2>-->
                        <!--end-->
                </div>
                </center>
                </div>
                </div>
                
                                             <div class="form-group">
                                                            
                                                               <label>Name</label><span class="text-error-danger"> * </span>
                                                                

                                                                 <input class="form-control" type="text" placeholder="Username" name="name" value="<?= $userData->name ?>">

                                                                 <div id="nameError" class="error"></div>
                                                            </div>
                                                            <div class="form-group">
                                                              <label>Phone</label><span class="text-error-danger"> * </span>
                                                                
                                                                <input class="form-control" type="phone" placeholder="Phone" name="phone" value="<?= $userData->phone ?>" style="border-radius:0px !important">

                                                                 <div id="phoneError" class="error"></div>
                                                            </div>
                                                            
                                                            <input type="hidden" name="user_information" value="_userinfo">

                                                            <div class="row">
                                                    <div class="col-lg-12 col-md-12" >
                                                        <div class="payment-adress">
                                                            <center>
                                                            <button id="basic_add_btn" type="submit" class="btn btn-standard">Submit</button> 
                                                            </center>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                                       </div>
                                    </div>
                                </div>
                                </li>
                                </div>
                                <li class="col-md-3 col-sm-12">
                                    <div class="side-bar" > 
            <!--  <div class="side-barBox"> -->
              <div class="side-barBox" >
                 <h5 class="side-barTitle" style="background:linear-gradient(90deg, {{ $projectsetting->freelancer_nav_first_background_and_icon }} 50%, {{ $projectsetting->freelancer_nav_second }}) !important;color:{{ $projectsetting->freelancer_nav_font_color}} !important">Summary</h5>
                     <table class="table">
                  <tbody>
                     
                    <tr>
                      <td colspan="3">Total Coin
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ Auth::user()->coin }}</td>
                    </tr>
                    <tr>
                      <td colspan="3">Left Coin
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ Auth::user()->left_coin }}</td>
                    </tr>
                    <tr>
                      <td colspan="3">Used Coin
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ Auth::user()->coin  -  Auth::user()->left_coin }}</td>
                    </tr>
                    
                     <tr>
                      <td colspan="3">Request Quotation
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ $quotations_request_count }}</td>
                    </tr>
                     <tr>
                      <td colspan="3">Approve Quotation
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ $quotations_success_count }}</td>
                    </tr>
                    
                    <tr>
                      <td colspan="3">Request Coin Plan
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ $usercoin_lists_count }}</td>
                    </tr>
                    
                    <tr>
                      <td colspan="3">Received Coin Plan
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ $usercoin_received }}</td>
                    </tr>
                    
                  </tbody>
                </table>
                </div>
             <!-- </div> -->
          </div>
                                    
                                </li>
                                </ul>
                        </div>
                    </div>
                    
                       <!--image upload-modal start-->
            <div class="modal bs-example-modal-md-1" tabindex="-1" role="dialog" id="uploadprofileModal">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Upload Profile Photo</h2>
                       <form id="profilephotoForm" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                         <div class="form-group">
                              <!--<center>-->
                              <!--  <input type="file" id="panel_file" name="profile_photo" accept="image/*">-->
                              <!--</center>-->
                              <div id="panel_photo"></div>
                          </div> 
                            <!--<p><button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-panel" data-dismiss="modal" aria-label="Close">Upload Image</button></p>-->
                            
                            <!--start-->
                            <div class="row" style="padding:20px">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <!--<button id="btn_experienceform" type="submit" class="btn btn-primary waves-effect waves-light">Save</button>-->
                                                            <center>
                                                            <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-panel" data-dismiss="modal" aria-label="Close">Upload Image</button>
                                                            </center>
                                                        </div>
                                                    </div>
                                                </div>
                            <!--end-->
                     </form>
            <p>
             <!--  <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-image" data-dismiss="modal" aria-label="Close">Upload Image</button> -->
            </p>
          </div>
        </div>
      </div>
      <!-- image upload modal end -->
      
                    </section>
        <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
        <script type="text/javascript">
           $(document).ready(function(){
              /* Township data bind */
               /* bind image */
               // console.log();
              
                var img = '<?php echo asset('storage/user/'.$userData->logo) ?>';
                var image_name = '<?php echo $userData->logo ?>';
               
                html = '<img alt="'+image_name+'" src="' + img + '" class="img-circle"/>';
                $("#current_edit_profile_photo").html(html);

               //Image Cropping

               /* image crop */
               var resize = $('#profile_photo').croppie({
                enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 300,
                    height: 300,
                    type: 'circle' //circle
                },
                boundary: {
                    width: 400,
                    height: 400
                }
            });
             
            $('#image_file').on('change', function () { 
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

            $('.upload-image').on('click', function (ev) {
              resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
                html = '<img src="' + img + '" />';
                $("#profile_photo").html(html);
                 $.ajax({
                   url: "{{ route('user.croppie.upload-profile') }}",
                   type: "POST",
                   data: {"image":img},
                   dataType: 'json',
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success: function (data) {
                   
                    html = '<img alt="'+data.image_name+'" src="' + img + '" class="img-circle" />';
                    $("#current_edit_profile_photo").html(html);   
                        },
                   error:function(e){
                    console.log(e)
                   }
                 });
              });
            });
             

               $('form#edituserForm').on('submit',function(e){
                var logo     = $('#current_edit_profile_photo img').attr('alt');
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('user.update') }}",
                      data: $('#edituserForm').serialize(),
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          if($.isEmptyObject(data.errors)){
                              
                               $("#basic_add_btn").attr('disabled','disabled');
                                setTimeout(function() {
                                  $this.removeAttr('disabled');
                               }, 3000);
                               
                            var message = data.success;
                                var url = window.location.href;
                                 callbackURL(message,url);
                               //  callbackSuccess(message);
                                // window.location.href;
                          }
                          else{
                              //printErrorMsg(data.errors); 
                               if($.isEmptyObject(data.errors.name)){  
                                  $('#nameError').html("");
                                   $(".form-group input-container").removeClass('error-messageborder');
                              }else{
                                   $('#nameError').html(data.errors.name);
                                   $(".form-group input-container").addClass('error-messageborder');
                              }
                               if($.isEmptyObject(data.errors.phone)){ 
                                  $('#phoneError').html("");
                                   $(".form-group input-container").removeClass('error-messageborder');
                              }else{
                                   $('#phoneError').html(data.errors.phone);
                                   $(".form-group input-container").addClass('error-messageborder');
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
                if($(msg).length >1){
                  $.each(msg, function( key, value ) {
                   message += '<span class="alert alert-danger">'+value+'</span>';
                    $("#error").html(message);
                }); 
                }
                else{
                    message = '<span class="alert alert-danger">'+msg+'</span>';
                    $("#error").html(message);               
                  }   
            }
            
          }); 
        </script>
@endsection
	