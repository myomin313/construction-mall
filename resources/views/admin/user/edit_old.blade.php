@extends('layouts.user')
@section('content')
		 <div class="analytics-sparkle-area" id = "_userinfo">
		 <div class="container-fluid">
		   
		<form  method="POST" id="edituserForm" enctype="multipart/form-data">
         {{ csrf_field() }}
  <!-- <h2>Register Form</h2> -->
  
 <!--  <div style="max-width:500px; margin:auto;margin-top: 50px;} " class="imgcontainer">-->
	<!--<button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#uploadprofileModal">Upload Image</button>-->
 <!--  <div alt="Avatar"  id="current_edit_profile_photo"></div>-->

 <!-- </div>-->
  
  <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="col-md-6 col-sm-6 col-xs-6"><span class="text-error-danger"> * </span>
  <div class="form-group input-container">
    <i class="fa fa-user iconuserupdate"></i>
    <input class="input-field" type="text" placeholder="Username" name="name" value="<?= $userData->name ?>">
   
  </div>
    <div id="nameError" class="error"></div>
  </div>
<!-- <div class="col-md-6 col-sm-6 col-xs-6">
  <div class="form-group input-container">
    <i class="fa fa-envelope iconuserupdate"></i>
    <input class="input-field" type="text" placeholder="Email" name="email" value="<?= $userData->email ?>">
  </div>
  </div> -->
  </div>
  
  <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="col-md-6 col-sm-6 col-xs-6"><span class="text-error-danger"> * </span>
  <div class="form-group input-container">
    <i class="fa fa-phone iconuserupdate"></i>
    <input class="input-field" type="phone" placeholder="Phone" name="phone" value="<?= $userData->phone ?>">
  
  </div>
     <div id="phoneError" class="error"></div>
  </div>
 
 </div>
   <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="col-md-6 col-sm-6 col-xs-6">
  <button id="basic_add_btn" style="max-width:500px; margin:auto; " type="submit" class="btnuserupdate">Update</button>
  </div>
  </div>
  <input type="hidden" name="user_information" value="_userinfo">
</form>
		</div>
		</div>

        
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
                                //var url = window.location.href;
                                 //callbackURL(message,url);
                                 callbackSuccess(message);
                                 window.location.href;
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
	