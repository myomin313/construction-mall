@extends('layouts.admin_panel')
@section('content')
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12">
             @include('admin.element.breadcrumb')
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Add Admin Information</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                         <a href="{{route('users.adminlist',1)}}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                            Admin List
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
              <div class="card-body">
                     <form  id="addAdminForm" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                       <div class="row">
                     <div id="error"></div>  
                     
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                           <label >Name :</label><span class="text-error-danger"> * </span>
                            <input type="text" class="form-control" placeholder="Name" name="name" id="name">
                               <div id="nameError" class="error"></div>
                          </div>
                          <div class="form-group">
                            <label for="email">Email :</label><span class="text-error-danger"> * </span>
                            <input type="text" class="form-control" placeholder="Email" name="email" id="email">
                                 <div id="emailError" class="error"></div>
                          </div>
                         <div class="form-group">
                             <label for="phone">Phone</label><span class="text-error-danger"> * </span>
                             <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone"> 
                              <div id="phoneError" class="error"></div>
                          </div>
                        </div> 
                        <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                            <label for="password">Password :</label><span class="text-error-danger"> * </span>
                            <input type="password" name="password" placeholder="Password" class="form-control" id="password">
                             <div id="passwordError" class="error"></div>
                          </div>
                          <div class="form-group">
                            <label for="confirmpassword">Confirm Password :</label><span class="text-error-danger"> * </span>
                            <input type="password" name="confirmPassword" placeholder="Confirm Password" class="form-control" id="confirmpassword">
                              <div id="confirmError" class="error"></div>
                           
                          </div>
                          <div class="form-group">
                            <label for="profile">Profile :</label>
                            <div>
                            <!--    <p>-->
                            <!--        <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md-1">Upload Logo</button>-->
                            
                            <!--    </p>-->
                            <!--<div id="current_logo"></div>-->
                            <!--start-->
                            <!--start-->
                            <div clas="file_input_wrap">      <!--<input type="file" name="imageUpload" id="imageUpload" class="hide" />-->
                            <input type="file" id="image_file" name="logo" accept="image/*" class="hide">
                            <label for="image_file" class="btn btn-primary ">Upload Photo</label>
                            </div>
                            <!--<div class="img_preview_wrap">-->
                                <div id="current_logo"></div>                                                                <!--<img src="" id="imagePreview" alt="Preview Image" width="200px" class="hide" />-->
                            <!--</div>-->
                            <!--end-->
                            <input type="hidden" name="user_information" value="admin_add">
                          </div> 
                        </div>

                     </div> 
                  </div>
                  <div class="form-group">
                    <label for="permission">Allow Permission :</label>
                       <div class="row">

                        @foreach($functions as $function)
                                       <div class="col-md-6 col-sm-6 skin skin-line" style="text-align: left">
                                         <input  tabIndex="2{{ $function->id }}" type="checkbox" name="function_id[]"
                                         id="line-checkbox-2{{ $function->id }}"   value="{{ $function->id }}"  style="color:#818181">
                                          <label for="line-checkbox-2{!! $function->id !!}"> {{ $function->name
                                          }}
                                          </label>                      
                                       </div>
                         @endforeach
                </div>
                  </div>
                    
                  <div class="row">
                     <div class="col-lg-12 col-md-12">
                        <div class="payment-adress">
                           <button type="submit" id="basic_add_btn" class="btn btn-primary waves-effect waves-light">Save</button>
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
      <div class="modal bs-example-modal-md-1 create-admin-modal" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                  <h2 class="modal-title">Upload Profile Photo</h2>
                 <form id="coverphotoForm">
                   <div class="form-group">
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
               $('.create-admin-modal').modal('show');
           });


           $('.upload-image').on('click', function (ev) {
             resize.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
               html = '<img src="' + img + '" />';
               $("#logo").html(html);
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
         
            $('form#addAdminForm').on('submit',function(e){
               var image     = $('#current_logo img').attr('alt');
               e.preventDefault();
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('users.storeadmin') }}",
                     data: $('#addAdminForm').serialize()+"&image_name="+image,
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
                               
                             // var message = data.success;
                                var url = "{{ route('users.adminlist') }}";
                                 window.location=url;
                         }
                         else{ 
                             console.log(data.errors);
                             
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
                              
                              if($.isEmptyObject(data.errors.password)){ 
                                  $('#passwordError').html("");
                                   $("input[name=password]").removeClass('error-messageborder');
                              }else{
                                    $('#passwordError').html(data.errors.password);
                                     $("input[name=password]").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.confirmPassword)){ 
                                  $('#confirmError').html("");
                                  $("input[name=confirmPassword]").removeClass('error-messageborder');
                              }else{
                                  $('#confirmError').html(data.errors.confirmPassword);
                                  $("input[name=confirmPassword]").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.phone)){ 
                                  $('#phoneError').html("");
                                  $("input[name=phone]").removeClass('error-messageborder');
                              }else{
                                  $('#phoneError').html(data.errors.phone);
                                  $("input[name=phone]").addClass('error-messageborder');
                              }
                               
                           //  printErrorMsg(data.errors);
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
                  var message='';
                  $.each(msg, function( key, value ) {
                   message += '<span class="alert alert-danger">'+value+'</span>';
                    console.log(msg);
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
