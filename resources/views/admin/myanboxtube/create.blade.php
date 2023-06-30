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
                        <h3 class="panel-title"> Add New Myanbox Tube</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="{{ route('myanboxtube.index') }}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                             Myanbox Tube List
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
<div class="card-body">
  
         <form  id="addMyanboxtubeForm" enctype="multipart/form-data" method="POST">
          {{csrf_field()}}
          <div class="row">
            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12"> 
             
              <div class="form-group">
               <label for="name">Title:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="Title" name="title" >
                  <div id="titleError" class="error"></div>
              </div>
              <div class="form-group">
               <label for="name">Link:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="Eg.http://www.youtube.com" name="link" >
                      <div id="linkError" class="error"></div>
              </div>
              <!--<div class="form-group">-->
              <!--    <label for="photo">Product Photo</label>-->
              <!--      <div>-->
              <!--          <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md-1">Upload Photo</button>-->
              <!--          <div id="current_cover_photo"></div>-->
              <!--      </div> -->
              <!--  </div>-->
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
<!--image upload-modal start-->
      <div class="modal bs-example-modal-md-1 myanbox-create-modal" tabindex="-1" role="dialog">
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
               $('.myanbox-create-modal').modal('show');
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
                  data: {"image":img,"path":"myanboxtube"},
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
            
         }); 
            $('form#addMyanboxtubeForm').on('submit',function(e){
               var image     = $('#current_cover_photo img').attr('alt');
               console.log($('#addMyanboxtubeForm').serialize());
               e.preventDefault();
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('myanboxtube.store') }}",
                     data: $('#addMyanboxtubeForm').serialize()+"&image_name="+image,
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success:function(data)
                     { 
                         if($.isEmptyObject(data.errors)){
                          //   var message = data.success;
                              var url = "{{ route('myanboxtube.index') }}";
                              window.location = url;
                                 //callbackURL(message,url);
                         }
                         else{ 
                             //printErrorMsg(data.errors);
                              console.log(data.errors);  
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
                      },
                     error:function(e)
                     {
                        console.log(e);
                     }
                   });
               });
               
             
       
  </script>




@endsection
