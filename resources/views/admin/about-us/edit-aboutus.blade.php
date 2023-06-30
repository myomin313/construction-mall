@extends('layouts.admin_panel')
@section('content')
  <!-- Single pro tab review Start-->
   <style>
  .hide {
    display: none;
}

.btn-large {
  padding: 11px 19px;
  font-size: 17.5px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}

#imagePreview {
  margin: 15px 0 0 0;
  border: 2px solid #ddd;
}
 </style>
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
                        <h3 class="panel-title">Update About Us Information</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                         <a href="{{route('about-us')}}" class="btn btn-default pull-right">
                             <!--<i class="fa fa-list" aria-hidden="true"></i>-->
                           Go To About Us Page
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
              <div class="card-body">
                    @include('admin.element.success-message')
               <form  id="editProjectForm" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                 <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div id="error">
                    </div>
                    <div class="form-group">
                     <label for="name">Name:</label><span class="text-error-danger"> * </span>
                      <input type="text" class="form-control" placeholder="Name"  name="header" id="header" value="{{ old('header',$aboutusheader->header) }}"> 
                         <div id="headerError" class="error"></div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                     <div class="form-group">
                            <label>Video</label>
                            <input type="text" class="form-control" placeholder="Blog Title" id="video" value="{{ old('header',$aboutusheader->video)}}" name="video">
                      </div>  
                   </div>
                  </div>
                <!--</div>-->
              
                  <!--start image-->
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="form-group">
                     <label>About Us video Background Image</label>
                                                                <!--<button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".privacy_upload_modal">Upload Photo</button>-->
                                                                <!--<div id="current_privacy_photo"></div>-->
                                 <div clas="file_input_wrap">
                              <!--<input type="file" name="imageUpload" id="imageUpload" class="hide" />-->
                                  <!--<input type="file" id="blog_file" name="blog_photo" accept="image/*" class="hide">-->
                             <input type="file" id="about_us_file" name="about_us_photo" accept="image/*" class="hide">
                             <label for="about_us_file" class="btn btn-primary">Upload Photo</label>
                                 </div>
                         <div class="img_preview_wrap">
                             <div id="current_about_us_photo"></div>
                         </div>
                  </div>
                 </div>
                  <!--end image-->
                     <!--<div class="row">-->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="name">Header Font Color:</label>
                     <input type="color" class="form-control" id="header_font_color"  name="header_font_color" value="{{ $aboutusheader->header_font_color }}">
                   </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                       <label>Header Description</label><span class="text-error-danger"> * </span>
                        <textarea name="header_description" id="header_description"  class="form-control" >
                          <?php echo $aboutusheader->header_description ?>
                        </textarea>  
                        <div id="header_descriptionError" class="error"></div>
                    </div> 
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                       <label for="name">Header Background Color:</label>
                          <input type="color" class="form-control" id="header_background_color" name="header_background_color" value="{{ $aboutusheader->header_background_color }}"> 
                    </div>
                  </div>
                  
                </div>
                <!-- start-->
                 <div class="row">
                  <div class="col-lg-12 col-md-12">
                   
                        <!-- //initially one field is set -->
                        
                        <div class="row meta-field">
                        <?php
                            $count = 1;
                            foreach($joins as $join){
                        ?>
                          <div class="col-md-6">
                              <input type="hidden" id="join_id_{{$count}}" name="join_id" value="{{ $join->id }}">
                          <div class="col-md-12">
                              <!--<input type="file" id="privacy_file" name="privacy_photo" accept="image/*" class="hide">-->
                              <input type="file" id="image_join_{{$count}}" name="join_photo[]" accept="image/*"  class="hide">
                            <labal  for="image_join_{{$count}}" class="add-join-modal w_200 btn btn-success"  data-no="{{$count}}">
                            Upload Photo</labal>
                            <div id="current_join_photo_{{$count}}">
                              <img  alt="{{ $join->image}}" class="current_join_photo_{{$count}} w_200 img-thumbnail" src="{{asset('storage/setting/'.$join->image)}}">
                            </div>
                          </div>
                          <!--start-->
                           <!--<div class="form-group">-->
                           <!--                                   <label>Image</label>-->
                           <!--                                        <div clas="file_input_wrap">-->
                           <!--                                          <input type="file" id="privacy_file" name="privacy_photo" accept="image/*" class="hide">-->
                           <!--                                          <label for="privacy_file" class="btn btn-primary ">Upload Photo</label>-->
                           <!--                                        </div>-->
                           <!--                                         <div class="img_preview_wrap">-->
                           <!--                                          <div id="current_privacy_photo"></div>-->
                           <!--                                         </div>-->
                           <!--                                 </div>-->
                          <!--end-->
                          
                          <div class="col-md-12">
                            <div class="form-group">
                              <input class="form-control" id="join_title_{{$count}}" name="title" value="<?= $join->title ?>" type="text">
                            </div>
                            <div class="form-group">
                                 <textarea name="description" id="join_description_{{$count}}" class="form-control join-description">
                                   <?php echo $join->description ?>
                                 </textarea>  
                            </div>
                            <div class="form-group">
                                   <input type="text" class="form-control" placeholder="Button Text" value="{{ old('btn_text',$join->btn_text)}}" id="join_btn_text_{{$count}}" name="join_btn_text">
                            </div>
                          </div>
                         </div>
                        <?php
                            $count ++;
                            }
                         ?>
                         </div>
                      </div>
                    </div> 
                <!--end-->
                <!-- start-->
                 <div class="row">
                  <div class="col-lg-12 col-md-12">
                          
                        <!-- //initially one field is set -->
                         <div class="row meta-field">
                        <?php
                            $count = 1;
                            foreach($targets as $target){
                        ?>
                          <div class="col-md-6">
                              <input type="hidden" id="target_id_{{ $count }}" name="target_id" value="{{ $target->id }}">
                            
                          <div class="col-md-12">
                              <input type="file" id="image_target_{{$count}}" name="target_photo[]"  accept="image/*"  class="hide">
                            <label href="#" class="add-target-modal w_200 btn btn-success" data-no="{{$count}}">
                            Upload Photo</label>
                            <div id="current_target_photo_{{ $count }}">
                              <img  alt="{{ $target->image}}" class="current_target_photo_{{$count}} w_200 img-thumbnail" src="{{asset('storage/setting/'.$target->image)}}">
                            </div>
                          </div>
                          
                          <!--<div class="col-md-12">-->
                          <!--    <input type="file" id="image_join_{{$count}}" name="join_photo[]" accept="image/*"  class="hide">-->
                          <!--  <labal  for="image_join_{{$count}}" class="add-join-modal w_200 btn btn-success"  data-no="{{$count}}">-->
                          <!--  Upload Photo</labal>-->
                          <!--  <div id="current_join_photo_{{$count}}">-->
                          <!--    <img  alt="{{ $join->image}}" class="current_join_photo_{{$count}} w_200 img-thumbnail" src="{{asset('storage/setting/'.$join->image)}}">-->
                          <!--  </div>-->
                          <!--</div>-->
                          
                          <div class="col-md-12">
                            <div class="form-group">
                              <input class="form-control" id="target_title_{{$count}}" name="target_title" value="{{ old('title',$target->title)}}" type="text">
                            </div>
                            <div class="form-group">
                                 <textarea name="target_description" id="target_description_{{ $count }}"  class="form-control" >
                                   <?php echo $target->description ?>
                                 </textarea>  
                                </div>
                          </div>
                        </div>
                        <?php
                            $count ++;
                            }
                         ?>
                         </div>
                        </div>
                       </div>
                       
                <!--end-->
                <!-- start-->
                  <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div id="error">
                    </div>
                    <div class="form-group">
                     <!--<label for="name">Name:</label>-->
                      <input type="text" class="form-control" id="ready_to_get_start" value="{{ old('ready_to_get_start',$aboutusheader->ready_to_get_start)}}" name="ready_to_get_start">
                     
           
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                     <div class="form-group">
                            <input type="text" class="form-control" id="sign_up_today" value="{{ old('sign_up_today',$aboutusheader->sign_up_today )}}" name="sign_up_today">
                      </div>  
                   </div>
                  </div> 
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                       <label for="name">Footer Background Color:</label>
                          <input type="color" class="form-control" id="footer_background_color" name="footer_background_color" value="{{ $aboutusheader->footer_background_color }}"> 
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                       <label for="name">Footer Font Color:</label>
                         <input type="color" class="form-control" id="footer_font_color" name="footer_font_color" value="{{ $aboutusheader->footer_font_color }}"> 
                    </div>
                  </div>
                </div>
               
                    <div class="row">
                       <div class="col-lg-12 col-md-12">
                          <div class="payment-adress">
                             <button type="submit" id="basic_add_btn" class="btn btn-primary waves-effect waves-light">Change</button>
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

<!--image upload-modal start-->
     <?php
        $count = 1;
        foreach($joins as $join){
      ?>
      <div class="modal bs-example-modal-md-{{$count}} join-image-{{ $count }}" tabindex="-1" role="dialog" id="addModal{{$count}}">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                     <form id="coverphotoForm">
                       <div class="form-group">
                           <center>
                            <!--  <input type="file" id="image_join_{{$count}}" name="join_photo[]" class="join_file">-->
                            </center>
                            <div id="join_photo_{{$count}}" class="join_photo"></div>
                        </div> 
                    </form>
                     <p>
                      <button  data-toggle="modal" class="btn btn-primary btn-block upload-join-image_{{$count}}" id="upload-join-image_{{$count}}" data-dismiss="modal" aria-label="Close">Upload Image</button>
                    </p>
                  </div>
                </div>
      </div>
    <?php $count++;
          }
    ?>
    
         <?php
        $count = 1;
        foreach($targets as $target){
      ?>
      <div class="modal bs-example-modal-md-{{$count}} target-image-{{ $count }}" tabindex="-1" role="dialog" id="addtargetModal{{$count}}">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                     <form id="coverphotoForm">
                       <div class="form-group">
                            <center>
                              <!--<input type="file" id="image_target_{{$count}}" name="target_photo[]" class="join_file">-->
                            </center>
                            <div id="target_photo_{{$count}}" class="target_photo"></div>
                        </div> 
                    </form>
                     <p>
                      <button  data-toggle="modal" class="btn btn-primary btn-block upload-target-image_{{$count}}" id="upload-target-image_{{$count}}" data-dismiss="modal" aria-label="Close">Upload Image</button>
                    </p>
                  </div>
                </div>
      </div>
    <?php $count++;
          }
    ?>
    
     <!--image upload-modal start-->
            <div class="modal bs-example-modal-md-1 aboutus_upload_modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Upload About Us Video Cover</h2>
                       <form  enctype="multipart/form-data">
                         <div class="form-group">
                              <!--<center>-->
                              <!--  <input type="file" id="privacy_file" name="privacy_photo" accept="image/*">-->
                              <!--</center>-->
                              <div id="about_us_photo"></div>
                          </div> 
                     </form>
            <p>
              <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-about-us-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
            </p>
          </div>
        </div>
      </div>
        <!-- end profile image pop up -->
    
    <!--start-->
    <!--end-->
<!--image upload-modal end--> 

<script type="text/javascript">

//   function addField(label,value)
//   {
//       $("#add_more_field").append('<div class="row meta-field"><div class="col-md-3"><div class="form-group">
//       <input class="form-control" id="photoname_'+value+'" type="text" name="photoname" value="'+label+'"></div></div>
//       <div class="col-md-7"><a href="#" class="add-modal btn btn-success" data-no="'+value+'">Upload Photo</a>
//       <div id="current_cover_photo_'+value+'"></div></div><div class="col-md-1"><a href="#" class="add_more_close btn btn-danger">X</a>
//       </div></div><div   data-backdrop="" class="modal fade bs-example-modal-md-'+value+'" tabindex="-1" role="dialog" id="addModal'+value+'">
//       <div class="modal-dialog modal-md" role="document"><div class="modal-content"><div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a>
//       </div><form id="coverphotoForm"><div class="form-group"><center><input type="file" id="image_file_'+value+'" name="cover_photo[]" class="image_file'+value+'"></center>
//       <div id="cover_photo_'+value+'" class="cover_photo"></div></div> </form><p>
//       <button  data-toggle="modal" data-target=".bs-example-modal-md-'+value+'" class="btn btn-primary btn-block upload-image" id="upload-image_'+
//          value+'" data-dismiss="modal" aria-label="Close">Upload Image</button></p></div></div></div>');
//   }
//   var current_btn_lenght = $('.add-modal').length;
//   $("#add_more").click(function(){
//       addField('',++current_btn_lenght);
//       $(".add_more_close").click(function(){
//              alert('Close');
//               $(this).parents(".meta-field").remove();
//               return false;
//           });
//       return false;
//   });
//   $(".add_more_close").click(function(){
//       $(this).parents(".meta-field").remove();
//       return false;
//   });
//  document.getElementById('buttonid').addEventListener('click', openDialog);
//               function openDialog() {
//                     document.getElementById('fileid').click();
                  // }
                  
                //   start
                // start
                 $(document).ready(function(){
              var img = '<?php echo asset('storage/setting/'.$aboutusheader->about_us_image) ?>';
              var image_name = '<?php echo $aboutusheader->about_us_image ?>';   

               //Image Cropping
               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_about_us_photo").html(html);
               /* image crop */
               var resize22 = $('#about_us_photo').croppie({
                 enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 1920,
                    height: 989,
                    type: 'square' //circle
                },
                boundary: {
                    width: 800,
                    height: 500
                }
            });
             
            $('#about_us_file').on('change', function () {
              var reader22 = new FileReader();
                reader22.onload = function (e) {
                  resize22.croppie('bind',{
                    url: e.target.result
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
                }
                reader22.readAsDataURL(this.files[0]);
                $('.aboutus_upload_modal').modal('show');
             });
             
               $('.upload-about-us-image').on('click', function (ev) {
              resize22.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
                 $.ajax({
                   url: "{{ route('about-us.croppie.upload-blog-image') }}",
                   type: "POST",
                    data: {"image":img,'old_image':image_name},
                   dataType: 'json',
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success: function (data) {
                   
                    html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                    $("#current_about_us_photo").html(html);   
                        },
                   error:function(e){
                    console.log(e)
                   }
                 });
              });
            });
            
         });
                // end
  $(document).on('click', '.add-join-modal', function() {
                
              var no = $(this).data('no');
             // alert(no);
              document.getElementById('image_join_'+no).click(no);
            //   $('#addModal'+no).modal('show');
              /* image crop */
              var resize = $('#join_photo_'+no).croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 448,
                   height: 261,
                   type: 'square' //square
               },
               boundary: {
                   width: 460,
                   height: 270
               }
             });
           $('#image_join_'+no).on('change', function () {
             var reader = new FileReader();
               reader.onload = function (e) {
                 resize.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader.readAsDataURL(this.files[0]);
              $('#addModal'+no).modal('show');
           });
           $('#upload-join-image_'+no).on('click', function (ev) {
             resize.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
               html = '<img src="' + img + '" />';
                $.ajax({
                  url: "{{ route('about-us.croppie.upload-image') }}",
                  type: "POST",
                  data: {"image":img,"path":"project"},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {
                     html = '<img class="current_join_photo_'+no+'" alt="'+data.image_name+'" src="' + img + '" />';
                     if(($('#current_join_photo_'+no).find('> img').length )>=1)
                     {
                        $('#current_join_photo_' +no+' img').replaceWith(html);     
                     }
                     else{
                        $("#current_join_photo_"+no).append(html); 
                     }
                  },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
   });
   
//   start target
  $(document).on('click', '.add-target-modal', function() {
              var no = $(this).data('no');
               document.getElementById('image_target_'+no).click(no);
              
              /* image crop */
              var resize = $('#target_photo_'+no).croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 73,
                   height: 73,
                   type: 'square' //square
               },
               boundary: {
                   width: 83,
                   height: 83
               }
             });
           $('#image_target_'+no).on('change', function () { 
             var reader = new FileReader();
               reader.onload = function (e) {
                 resize.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader.readAsDataURL(this.files[0]);
               $('#addtargetModal'+no).modal('show');
           });
           $('#upload-target-image_'+no).on('click', function (ev) {
             resize.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
               html = '<img src="' + img + '" />';
                $.ajax({
                  url: "{{ route('about-us.croppie.upload-image') }}",
                  type: "POST",
                  data: {"image":img,"path":"project"},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {
                     html = '<img class="current_target_photo_'+no+'" alt="'+data.image_name+'" src="' + img + '" />';
                     if(($('#current_target_photo_'+no).find('> img').length )>=1)
                     {
                        $('#current_target_photo_' +no+' img').replaceWith(html);     
                     }
                     else{
                        $("#current_target_photo_"+no).append(html); 
                     }
                  },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
   });
   
//end target
          $('form#editProjectForm').on('submit',function(e){
              var join_photo_arr = [];
                $("[id*= current_join_photo_]").each(function(key,value) {
                    var image_id = '#'+ value.id;
                    var arr = image_id.split('#current_join_photo_');
                    var image=$(image_id +' img').attr('alt');
                    var title = $('#join_title_'+arr[1]).val();
                    var join_id = $('#join_id_'+arr[1]).val();
                    var btn_text = $('#join_btn_text_'+arr[1]).val();
                    var description = $('#join_description_'+arr[1]).summernote('code');
                    description = description.replaceAll("&amp;", "and_char");
                    item = {};
                    item["join_id"]= join_id;
                    item["image"] = image;
                    item["title"] = title;
                    item["btn_text"] = btn_text;
                    item["description"] = description;
                    join_photo_arr.push(item);
                });
              var join_photo_arr =JSON.stringify(join_photo_arr);
              console.log(join_photo_arr);
                 var target_photo_arr = [];
                $("[id*= current_target_photo_]").each(function(key,value) {
                    var image_id = '#'+ value.id;
                    var arr = image_id.split('#current_target_photo_');
                    var image=$(image_id +' img').attr('alt');
                    var title = $('#target_title_' +arr[1]).val();
                    var description = $('#target_description_' +arr[1]).val();
                    var target_id = $('#target_id_'+arr[1]).val();
                    item = {};
                    item ["image"] = image;
                    item ["title"] = title;
                    item ["target_id"] = target_id;
                    item ["description"] = description;
                    target_photo_arr.push(item);
                });
              var target_photo_arr =JSON.stringify(target_photo_arr);
              var header = $('#header').val();
              var video = $('#video').val();
              var header_background_color =  $('#header_background_color').val();
              var header_font_color =  $('#header_font_color').val();
              var header_description =  $('#header_description').val();
              var ready_to_get_start =  $('#ready_to_get_start').val();
              var sign_up_today =  $('#sign_up_today').val();
              var footer_background_color =  $('#footer_background_color').val();
              var footer_font_color = $('#footer_font_color').val();
              e.preventDefault();
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('about-us.update') }}",
                     data:"header="+header+"&video="+video+"&header_background_color="+header_background_color+"&header_font_color="+header_font_color+"&join_photo_arr="+join_photo_arr+"&target_photo_arr="+target_photo_arr
                     +"&header_description="+header_description+"&ready_to_get_start="+ready_to_get_start+"&sign_up_today="+sign_up_today+"&footer_background_color="+footer_background_color+
                     "&footer_font_color="+footer_font_color,
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success:function(data)
                     {
                         if($.isEmptyObject(data.errors)){
                            
                            window.location = window.location.href;
                              
                                 
                      
                         }
                         else{
                            // printErrorMsg(data.errors); 
                            console.log(data.errors);
                            if($.isEmptyObject(data.errors.header)){ 
                                  $('#headerError').html("");
                                   $("input[name=header]").removeClass('error-messageborder');
                              }else{
                                   $('#headerError').html(data.errors.header);
                                   $("input[name=header]").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.header_description)){ 
                                  $('#header_descriptionError').html("");
                                   $("input[name=header_description]").removeClass('error-messageborder');
                              }else{
                                   $('#header_descriptionError').html(data.errors.header_description);
                                   $("input[name=header_description]").addClass('error-messageborder');
                              }
                         } 
                       
                       console.log(data);
                      },
                     error:function(e)
                     {
                        console.log(e);
                     }
                   });
                  
               });
               
           $('.project_type').on('input',function(e){
              var project  = $(this).val();
              var dataList = $("#project");
              var op ="";
              e.preventDefault();
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('getProjectType') }}",
                     data:{'project':project},
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success:function(data)
                     {

                        op +="<option value='0' >Choose Project Type</option>";
                       for(var i=0;i<data.length;i++)
                       {
                         op +='<option value="'+data[i].project_type_name+'">'+data[i].project_type_name+'</option>';
                       }
                       $("#project").html(op); 
                       
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