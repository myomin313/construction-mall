@extends('layouts.admin_panel')
@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mg-t-30 mg-b-15">
  <div class="container-fluid">
      <div class="row"> 
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @include('admin.element.breadcrumb')
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title"> Update Myanbox Tube Information</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="{{ url('myanboxtube/index?page='.Session::get('pageno')) }}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                             Myanbox Tube List
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
<div class="card-body">
         <form  id="editMyanboxtubeForm" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="row">
            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
              
              <div class="form-group">
               <label for="name">Title:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="Title" name="title" value="{{ $myanboxtube->title }}">
                <div id="titleError" class="error"></div>
             </div>
               <div class="form-group">
               <label for="name">Link:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="Eg.http://www.youtube.com" name="link" value="{{ $myanboxtube->link }}">
                <div id="linkError" class="error"></div>
             </div>
                      
                        
                        <!--start-->
                         <div class="form-group">
                   <label>Image</label><span class="text-error-danger"> * </span>
                       <div clas="file_input_wrap">
                                                                <!--<input type="file" name="imageUpload" id="imageUpload" class="hide" />-->
                      <input type="file" id="image_file" name="cover_photo" accept="image/*" class="hide">
                      <label for="image_file" class="btn btn btn-primary ">Upload Photo</label>
              </div>
              <div class="img_preview_wrap">
                      <div id="current_cover_photo"></div>
                         <div id="imageError" class="error"> </div>
                                                                <!--<img src="" id="imagePreview" alt="Preview Image" width="200px" class="hide" />-->
              </div>
              </div>
                        <!--end-->
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


  <!--image upload-modal start-->
      <div class="modal bs-example-modal-md-1 myanbox-edit-modal" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                  <h2 class="modal-title">Upload Myanbox Tube Photo</h2>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="image_file" name="cover_photo">-->
                        <!--</center>-->
                        <div id="cover_photo"></div>
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
              /* bind image */
               var img = '<?php echo asset('storage/myanboxtube/'.$myanboxtube->image) ?>';
               var image_name = '<?php echo $myanboxtube->image ?>';

               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_cover_photo").html(html);

              /* image crop */
              var resize = $('#cover_photo').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 270,
                   height: 230,
                   type: 'square' //square
               },
               boundary: {
                   width: 280,
                   height: 240
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
               $('.myanbox-edit-modal').modal('show');
               
           });


           $('.upload-image').on('click', function (ev) {
             resize.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
               html = '<img src="' + img + '" />';
               $("#cover_photo").html(html);
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"myanboxtube",'old_image':image_name},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_cover_photo").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
            
           
                $('form#editMyanboxtubeForm').on('submit',function(e){
               var image     = $('#current_cover_photo img').attr('alt');
               e.preventDefault();
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('myanboxtube.update',$myanboxtube->id) }}",
                     data: $('#editMyanboxtubeForm').serialize()+"&image_name="+image+"&path=myanboxtube"+'&old_image='+image_name,
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success:function(data)
                     {
                         if($.isEmptyObject(data.errors)){
                            // var message = data.success;
                            var url = "{{ url('myanboxtube/index?page='.Session::get('pageno')) }}";
                            window.location = url;
                               //  callbackURL(message,url);
                         }
                         else{
                           //  printErrorMsg(data.errors);
                            if($.isEmptyObject(data.errors.title)){ 
                                  $('#titleError').html("");
                                   $("input[name=title]").removeClass('error-messageborder');
                              }else{
                                   $('#titleError').html(data.errors.title);
                                   $("input[name=title]").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.link)){ 
                                  $('#linkError').html("");
                                   $("input[name=link]").removeClass('error-messageborder');
                              }else{
                                   $('#linkError').html(data.errors.link);
                                   $("input[name=link]").addClass('error-messageborder');
                              }
                                if($.isEmptyObject(data.errors.image_name)){ 
                                  $('#imageError').html("");
                              }else{
                                   $('#imageError').html(data.errors.image_name);
                              }
                         } 
                        // location.reload()
                      },
                     error:function(e)
                     {
                        console.log(e);
                     }
                   });
               });
           }); 
           
             /*   function printErrorMsg (msg) {
                if($(msg).length >1){
                  var message="";
                  $.each(msg, function( key, value ) {
                   message += '<span class="alert alert-danger">'+value+'</span>';
                    $("#error").html(message); 
                }); 
                }
                else{
                    message = '<span class="alert alert-danger">'+msg+'</span>';
                    $("#error").html(message); 
                  }   
            }*/
  </script>

    @endsection