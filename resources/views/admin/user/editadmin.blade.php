@extends('layouts.admin_panel')
@section('content')
<?php 
if($user->logo != null && $user->logo !='undefined'){
     $logo=$user->logo; 
  }else{
    $logo=$projectsetting->admin_default_logo;  
  }
?>
<!-- Single pro tab review Start-->
  <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            @include('admin.element.breadcrumb')
            <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title">
                  Hello Admin!!! You can change login account information.
                </h4>
                </div>
                @include('admin.element.success-message')
              <div class="card-body">
                   <form  id="editAdminForm" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                     <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                       
                        <div class="form-group">
                         <label for="name">Name:</label><span class="text-error-danger"> * </span>
                          <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{$user->name}}">
                           <div id="nameError" class="error"></div>
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label><span class="text-error-danger"> * </span>
                          <input type="text" class="form-control" placeholder="Email" name="email" id="email" value="{{$user->email}}">
                          <div id="emailError" class="error"></div>
                        </div>
                         <div class="form-group">
                           <label for="phone">Phone</label><span class="text-error-danger"> * </span>
                           <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{$user->phone}}">
                           <div id="phoneError" class="error"></div>
                        </div>
                      </div> 
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                          <label for="Profile">Profile</label>
                          <div>
                           <!-- <p>-->
                           <!--     <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".updateadminownprofile">Upload Logo</button>-->
                         
                           <!-- </p>      -->
                           <!--<div id="current_logo"></div>-->
                           <!--start-->
                           
                            <div clas="file_input_wrap">      <!--<input type="file" name="imageUpload" id="imageUpload" class="hide" />-->
                                    <input type="file" id="profile_file" name="logo" accept="image/*" class="hide">
                                         <label for="profile_file" class="btn btn-primary ">Upload Photo</label>
                            </div>
                            <!--<div class="img_preview_wrap">-->
                                <div id="current_logo"></div>                                                                <!--<img src="" id="imagePreview" alt="Preview Image" width="200px" class="hide" />-->
                            <!--</div>-->
                           
                           <!--end-->
                           
                           
                          <input type="hidden" name="user_information" value="admin_edit">
                          <input type="hidden" name="id" value="{{$user->id}}">
                        </div> 
                      </div>

                   </div> 
                </div>
                <div class="row">
                   <div class="col-lg-12 col-md-12">
                      <div class="payment-adress">
                         <button type="submit" id="basic_add_btn" class="btn btn-primary waves-effect waves-light">Update</button>
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
    <!--image upload-modal start-->
      <div class="modal bs-example-modal-md-1 updateadminownprofile" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="profile_file" name="logo">-->
                        <!--</center>-->
                        <div id="logo"></div>
                    </div> 
               </form>
                <p>
                  <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
                </p>
              </div>
            </div>
          </div>
<!--image upload-modal end-->                                       
<script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
 <script type="text/javascript">
       $(document).ready(function(){
           
          /*     $('#basic_add_btn').on('click',function(){
	var $this=$(this);
   $this
         .attr('disabled','disabled');
          setTimeout(function() {
            $this.removeAttr('disabled');
        }, 3000);
});/*

              /* bind image */
               var img = '<?php echo asset('storage/admin_logo/'.$logo) ?>';
               var image_name = '<?php echo $logo ?>';

               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_logo").html(html);
              /* image crop */
              var resize = $('#logo').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 300,
                   height: 300,
                   type: 'circle' //square
               },
               boundary: {
                   width: 310,
                   height: 310
               }
           });
           $('#profile_file').on('change', function () {
             var reader = new FileReader();
               reader.onload = function (e) {
                 resize.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader.readAsDataURL(this.files[0]);
               $('.updateadminownprofile').modal('show');
           });


           $('.upload-image').on('click', function (ev) {
             resize.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"admin_logo"},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_logo").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
            
         }); 
            $('form#editAdminForm').on('submit',function(e){
               var image     = $('#current_logo img').attr('alt');
               e.preventDefault();
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('users.updateadmin') }}",
                     data: $('#editAdminForm').serialize()+"&image_name="+image,
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success:function(data)
                     {
                        console.log(data);
                         if($.isEmptyObject(data.errors)){
                             
                              $("#basic_add_btn").attr('disabled','disabled');
                                setTimeout(function() {
                                  $this.removeAttr('disabled');
                               }, 3000); 
                               
                          // var message = data.success;
                              //var url = "{{ url('admin/admin_list/1?page='.Session::get('pageno')) }}";
                               //  window.location=url;
                               var url = window.location.href;
                               window.location=url;
                                //  callbackURL(message,url); 
                         }
                         else{
                           console.log(data.errors);
                           // printErrorMsg(data.errors);
                           
                            if($.isEmptyObject(data.errors.name)){ 
                                  $('#nameError').html("");
                                    $("input[name=name]").removeClass('error-messageborder');
                              }else{
                                   $('#nameError').html(data.errors.name);
                                    $("input[name=name]").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.email)){ 
                                  $('#emailError').html("");
                                    $("input[name=email]").removeClass('error-messageborder');
                              }else{
                                   $('#emailError').html(data.errors.email);
                                    $("input[name=email]").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.phone)){ 
                                  $('#phoneError').html("");
                                    $("input[name=phone]").removeClass('error-messageborder');
                              }else{
                                   $('#phoneError').html(data.errors.phone);
                                    $("input[name=phone]").addClass('error-messageborder');
                              }
                             
                               
                         } 
                      },
                     error:function(e)
                     {
                        console.log(e);
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
  </script>


@endsection
