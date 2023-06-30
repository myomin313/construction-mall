@extends('layouts.admin_panel')
@section('content')
<style>
body.modal-open {
    overflow: hidden;
}
</style>
 <style>
  .hide {
    display: none;
}
/*.btn {*/
/*  display: inline-block;*/
/*  padding: 4px 12px;*/
/*  margin-bottom: 0;*/
/*  font-size: 14px;*/
/*  line-height: 20px;*/
  /*color: #333333;*/
/*  text-align: center;*/
/*  vertical-align: middle;*/
/*  cursor: pointer;*/
/*  border: 1px solid #ddd;*/
/*  box-shadow: 2px 2px 10px #eee;*/
/*  border-radius: 4px;*/
/*}*/

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
 <!--end-->
  <!-- Single pro tab review Start-->
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
                        <h3 class="panel-title">Update Advertise With Us Information</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="{{route('advertise-with-us')}}" class="btn btn-default pull-right">
                            <!--<i class="fa fa-list" aria-hidden="true"></i>-->
                            Go To Advertise With Us Page
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
                     <div id="error">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                     <div class="form-group">
                       <label>Image</label>
                         <input type="file" id="advertise_file" name="advertise_photo" accept="image/*" class="hide">
                        <!--<button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".advertise_upload_modal">-->
                            <label for="advertise_file" class="btn btn btn-primary ">
                            Upload Photo
                            </label>
                            <!--</button>-->
                        <div id="current_advertise_photo"></div>
                    </div>
                    </div>
                    <!--start-->
                     <!--<div class="form-group">-->
                     <!--                                         <label>Image</label>-->
                     <!--                                       <div clas="file_input_wrap">-->
                                                                <!--<input type="file" name="imageUpload" id="imageUpload" class="hide" />-->
                     <!--                                            <input type="file" id="blog_file" name="blog_photo" accept="image/*" class="hide">-->
                     <!--                                           <label for="blog_file" class="btn btn btn-primary ">Upload Photo</label>-->
                     <!--                                       </div>-->
                     <!--                                       <div class="img_preview_wrap">-->
                     <!--                                            <div id="current_blog_photo"></div>-->
                                                                <!--<img src="" id="imagePreview" alt="Preview Image" width="200px" class="hide" />-->
                     <!--                                       </div>-->
                     <!--                                       </div>-->
                    <!--end-->
                    
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group"><span class="text-error-danger"> * </span>
                      <input type="text" class="form-control" placeholder="Header"  name="text_header" id="text_header" value="{{ old('text_header',$advertisewithus->text_header) }}">
                      <div id="text_headerError" class="error"></div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group"><span class="text-error-danger"> * </span>
                            <input type="text" class="form-control" placeholder="Bread Crump" id="breadcrump" value="{{ old('breadcrump',$advertisewithus->breadcrump )}}" name="breadcrump">
                       <div id="breadcrumpError" class="error"></div>
                   </div>
                  </div> 
                </div>
                <div class="row" >
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group"><span class="text-error-danger"> * </span>
                      <input type="text" class="form-control" id="why_myanbox"  value="{{ old('why_myanbox',$advertisewithus->why_myanbox)}}" name="why_myanbox">
                       <div id="why_myanboxError" class="error"></div>
                      </div>
                   </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group"><span class="text-error-danger"> * </span>
                        <textarea name="myanbox_dec" id="myanbox_dec"  class="form-control" >
                          <?php echo $advertisewithus->myanbox_dec ?>
                        </textarea>  
                        <div id="myanbox_decError" class="error"></div>
                    </div> 
                  </div>
                </div>
                <!-- start-->
                 <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <!--<div class="form-group">-->
                    <!--   <div id="add_more_field">-->
                          <!--  <div class="col-md-11"> -->
                          <!-- </div>-->
                          <!--<div class="col-md-1">-->
                          <!--  <a class="btn btn-success btn-sm" id="add_more" href="#" >-->
                          <!--   <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add </a>-->
                          <!--</div>-->
                        <!-- //initially one field is set -->
                        
                        <div class="row meta-field">
                        <?php
                            $count = 1;
                            foreach($sponsors as $sponsor){
                        ?>
                        <input type="hidden" name="id" id="sponsor_id_{{$count}}" value="{{ $sponsor->id }}">
                        <div class="col-md-6">
                          <div class="col-md-12">
                              <input type="file" id="image_sponsor_{{$count}}" name="sponsor_photo[]" accept="image/*" class="sponsor_file hide">
                            <labal href="#" for="image_sponsor_{{$count}}" class="add-sponsor-modal w_200 btn btn-success" data-no="{{$count}}">
                            Upload Photo</labal>
                            <div id="current_sponsor_photo_{{$count}}">
                              <img  alt="{{ $sponsor->img }}" class="current_sponsor_photo_{{$count}} w_200 img-thumbnail" src="{{asset('storage/setting/'.$sponsor->img)}}">
                            </div>
                         </div>
                          
                          <div class="col-md-12">
                            <div class="form-group">
                              <input class="form-control" id="sponsor_title_{{$count}}" name="title" value="<?= $sponsor->title ?>" type="text">
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                 <textarea name="description_{{ $count }}" id="sponsor_description_{{$count}}" class="form-control" >
                                   <?php echo $sponsor->description ?>
                                 </textarea>  
                                </div>
                                </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <!--<label>Button Text</label>-->
                                   <input type="text" class="form-control" placeholder="Button Text" value="{{ old('btn_text',$sponsor->btn_text)}}" id="sponsor_btn_text_{{$count}}" name="sponsor_btn_text">
                            </div>
                            </div>
                            
                          </div>
                          <!--<div class="col-md-12">-->
                          <!--  <a href="#" class="add_more_close btn btn-danger">X</a>-->
                          <!--</div>-->
                          <!--</div>-->
                        
                       
                        <?php
                            $count ++;
                            }
                         ?>
                         </div>
                       <!-- </div>-->
                       <!--</div>-->
                      </div>
                    </div> 
                <!--end-->
                 <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                     <!--<label for="name">Name:</label>-->
                        <input type="text" class="form-control"  value="{{ old('benefit_header',$advertisewithus->benefit_header )}}" name="benefit_header"  id="benefit_header">
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                     <div class="form-group">
                        <textarea name="benefit_breadcrumb" id="benefit_breadcrumb" class="form-control" value="{{ old('benefit_breadcrumb',$advertisewithus->benefit_breadcrumb )}}">
                            {{ old('benefit_breadcrumb',$advertisewithus->benefit_breadcrumb )}}
                        </textarea> 
                      </div>  
                   </div>
                  </div> 
                  </div>
                <!-- start-->
                 <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <!--<div class="form-group">-->
                    <!--   <div id="add_more_field">-->
                          <!--  <div class="col-md-11"> -->
                          <!-- </div>-->
                          <!--<div class="col-md-1">-->
                          <!--  <a class="btn btn-success btn-sm" id="add_more" href="#" >-->
                          <!--   <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add </a>-->
                          <!--</div>-->
                        <!-- //initially one field is set -->
                        <div class="row meta-field">
                        <?php
                            $count = 1;
                            foreach($benefits as $benefit){
                        ?>
                        <input type="hidden" name="benefit_id" id="benefit_id_{{$count}}" value="{{ $benefit->id }}">
                         <div class="col-md-4">
                          <div class="col-md-12">
                                <input type="file" id="image_benefit_{{$count}}" name="benefit_photo[]" class="join_file hide" accept="image/*">
                            <labal href="#" for="image_benefit_{{$count}}" class="add-benefit-modal w_200 btn btn-success" data-no="{{$count}}">
                            Upload Photo</labal>
                            <div id="current_benefit_photo_{{ $count }}">
                              <img  alt="{{ $benefit->img }}" class="current_benefit_photo_{{$count}} w_200 img-thumbnail" src="{{asset('storage/setting/'.$benefit->img)}}">
                            </div>
                          </div>
                          <!--start-->
                         <!-- <div class="col-md-12">-->
                         <!--     <input type="file" id="image_sponsor_{{$count}}" name="sponsor_photo[]" accept="image/*" class="sponsor_file hide">-->
                         <!--   <labal href="#" for="image_sponsor_{{$count}}" class="add-sponsor-modal w_200 btn btn-success" data-no="{{$count}}">-->
                         <!--   Upload Photo</labal>-->
                         <!--   <div id="current_sponsor_photo_{{$count}}">-->
                         <!--     <img  alt="{{ $sponsor->img }}" class="current_sponsor_photo_{{$count}} w_200 img-thumbnail" src="{{asset('storage/setting/'.$sponsor->img)}}">-->
                         <!--   </div>-->
                         <!--</div>-->
                          <!--end-->
                          <div class="col-md-12">
                            <div class="form-group">
                              <input class="form-control" id="benefit_title_{{$count}}" name="benefit_title" value="{{ old('benefit_title',$benefit->title)}}" type="text">
                            </div>
                            <div class="form-group">
                                 <textarea name="benefit_description" id="benefit_description_{{ $count }}"  class="form-control" >
                                   <?php echo $benefit->description ?>
                                 </textarea>  
                                </div>
                          </div>
                         </div>
                        <?php
                            $count ++;
                            }
                         ?>
                         </div>
                       <!-- </div>-->
                       <!--</div>-->
                      </div>
                    </div> 
                <!--end-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                       <input type="text" class="form-control" id="analyse_customer_data_header"  value="{{ old('analyse_customer_data_header',$advertisewithus->analyse_customer_data_header)}}"
                                                                name="analyse_customer_data_header">
                                                                
                                                                <div class="form-group">
                         <input type="text" class="form-control" id="btn_text" value="{{ old('btn_text',$advertisewithus->btn_text )}}" name="btn_text">
                    </div>
                      <textarea name="analyse_description" id="analyse_description"  class="form-control" value="{{ old('analyse_description',$advertisewithus->analyse_description )}}">
                                                    {{ old('analyse_description',$advertisewithus->analyse_description )}}
                                                              </textarea>
                    </div>
                        </div>
                    <div class="col-md-6">
                         <div class="form-group">
                             <label>Image</label>
                              <input type="file" id="analyse_file" name="analyse_photo" accept="image/*" class="sponsor_file hide">
                        <label for="analyse_file" data-dismiss="modal"  class="btn btn-primary" >
                            Upload Photo</label>
                         <div id="current_analyse_image"></div> 
                    </div>
                        </div>
                        <!--start-->
                    <!--     <div class="form-group">-->
                    <!--   <label>Image</label>-->
                    <!--     <input type="file" id="advertise_file" name="advertise_photo" accept="image/*" class="hide">-->
                        <!--<button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".advertise_upload_modal">-->
                    <!--        <label for="advertise_file" class="btn btn btn-primary">-->
                    <!--        Upload Photo-->
                    <!--        </label>-->
                    <!--        </button>-->
                    <!--    <div id="current_advertise_photo"></div>-->
                    <!--</div>-->
                        <!--end-->
                </div>
                <!-- start-->
                  <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                    <div class="form-group">
                        <input type="text" class="form-control" id="advertise_with_us" value="{{ old('advertise_with_us',$advertisewithus->advertise_with_us)}}" 
                                                                name="advertise_with_us">
                    </div>
                  </div>
                   
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                    <div class="form-group">
                        <input type="text" class="form-control" id="call_now" value="{{ old('call_now',$advertisewithus->call_now )}}" 
                                                                name="call_now">
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                    <div class="form-group">
                         <label for="name">Phone To Call:</label>
                              <input type="text" class="form-control" id="call_now_phone"  name="call_now_phone" value="{{ $advertisewithus->call_now_phone }}">
                    </div>
                  </div>
                  
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                    <div class="form-group">
                          <label for="name">Footer Background Color:</label>
                       <input type="color" class="form-control" id="call_now_background_color" name="call_now_background_color" value="{{ $advertisewithus->call_now_background_color }}">
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                    <div class="form-group">
                         <label for="name">Footer Font Color:</label>
                          <input type="color" class="form-control" id="call_now_font_color"  name="call_now_font_color" value="{{ $advertisewithus->call_now_font_color  }}">
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
            <div class="modal bs-example-modal-md-1 advertise_upload_modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Upload Advertise with us Header</h2>
                       <form  enctype="multipart/form-data">
                         <div class="form-group">
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
        <!--image upload-modal start-->
            <div class="modal bs-example-modal-md-1 footer_advertise_modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Upload Analyse Photo</h2>
                       <form  enctype="multipart/form-data">
                         <div class="form-group">
                             <center>
                                 <!--<input type="file" id="image_sponsor_{{$count}}" name="sponsor_photo[]" class="sponsor_file">-->
                             </center>
                              <div id="analyse_photo"></div>
                          </div> 
                     </form>
            <p>
              <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-analyse-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
            </p>
          </div>
        </div>
      </div>
        <!-- end profile image pop up -->
<!--image upload-modal start-->
     <?php
        $count = 1;
        foreach($sponsors as $sponsor){
      ?>
      <div class="modal bs-example-modal-md-{{$count}} sponsor-image-{{ $count }}" tabindex="-1" role="dialog" id="addsponsorModal{{$count}}">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                     <form id="coverphotoForm">
                       <div class="form-group">
                            <center>
                              <!--<input type="file" id="image_sponsor_{{$count}}" name="sponsor_photo[]" class="sponsor_file">-->
                            </center>
                            <div id="sponsor_photo_{{$count}}" class="sponsor_photo"></div>
                        </div> 
                    </form>
                     <p>
                      <button  data-toggle="modal" class="btn btn-primary btn-block upload-sponsor-image_{{$count}}" id="upload-sponsor-image_{{$count}}" data-dismiss="modal" aria-label="Close">Upload Image</button>
                    </p>
                  </div>
                </div>
      </div>
    <?php $count++;
          }
    ?>
    
         <?php
        $count = 1;
        foreach($benefits as $benefit){
      ?>
      <div class="modal bs-example-modal-md-{{$count}} benefit-image-{{ $count }}" tabindex="-1" role="dialog" id="addbenefitModal{{$count}}">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                     <form id="coverphotoForm">
                       <div class="form-group">
                            <center>
                              <!--<input type="file" id="image_benefit_{{$count}}" name="benefit_photo[]" class="join_file">-->
                            </center>
                            <div id="benefit_photo_{{$count}}" class="benefit_photo"></div>
                        </div> 
                    </form>
                     <p>
                      <button  data-toggle="modal" class="btn btn-primary btn-block upload-benefit-image_{{$count}}" id="upload-benefit-image_{{$count}}" data-dismiss="modal" aria-label="Close">Upload Image</button>
                    </p>
                  </div>
                </div>
      </div>
    <?php $count++;
          }
    ?>
<!--image upload-modal end--> 
 <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
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
  $(document).on('click', '.add-sponsor-modal', function() {
              var no = $(this).data('no');
            //   $('#addsponsorModal'+no).modal('show');
             document.getElementById('image_sponsor_'+no).click(no);
              /* image crop */
              var resize = $('#sponsor_photo_'+no).croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 658,
                   height: 530,
                   type: 'square' //square
               },
               boundary: {
                   width: 670,
                   height: 540
               }
             });
             
           $('#image_sponsor_'+no).on('change', function () { 
             var reader = new FileReader();
               reader.onload = function (e) {
                 resize.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader.readAsDataURL(this.files[0]);
               $('#addsponsorModal'+no).modal('show');
           });
           
           $('#upload-sponsor-image_'+no).on('click', function (ev) {
             resize.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
               html = '<img src="' + img + '" />';
                $.ajax({
                  url: "{{ route('advertise-with-us.croppie.upload-image') }}",
                  type: "POST",
                  data: {"image":img,"path":"project"},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {
                     html = '<img class="current_sponsor_photo_'+no+'" alt="'+data.image_name+'" src="' + img + '" />';
                     if(($('#current_sponsor_photo_'+no).find('> img').length )>=1)
                     {
                        $('#current_sponsor_photo_' +no+' img').replaceWith(html);     
                     }
                     else{
                        $("#current_sponsor_photo_"+no).append(html); 
                     }
                  },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
   });
   
    $(document).ready(function(){
    // start header photo
     var img = '<?php echo asset('storage/setting/'.$advertisewithus->header_image) ?>';
              var image_name = '<?php echo $advertisewithus->header_image ?>';   

               //Image Cropping
               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_advertise_photo").html(html);
               /* image crop */
               var resize20 = $('#advertise_photo').croppie({
                 enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 1900,
                    height: 1000,
                    type: 'square' //circle
                },
                boundary: {
                    width: 800,
                    height: 500
                }
            });
             
            $('#advertise_file').on('change', function () {
              var reader20 = new FileReader();
                reader20.onload = function (e) {
                  resize20.croppie('bind',{
                    url: e.target.result
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
                }
                reader20.readAsDataURL(this.files[0]);
               $('.advertise_upload_modal').modal('show');
            });

            $('.upload-advertise-image').on('click', function (ev) {
              resize20.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
                 $.ajax({
                   url: "{{ route('advertise.croppie.upload-blog-image') }}",
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
            
            //  start footer
                var img = '<?php echo asset('storage/setting/'.$advertisewithus->analyse_image) ?>';
              var image_name = '<?php echo $advertisewithus->analyse_image ?>';   

               //Image Cropping
               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_analyse_image").html(html);
               /* image crop */
               var resize21 = $('#analyse_photo').croppie({
                 enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                     width: 650,
                    height: 530,
                    type: 'square' //circle
                },
                boundary: {
                    width: 660,
                    height: 540
                }
            });
             
            $('#analyse_file').on('change', function () {
              var reader21 = new FileReader();
                reader21.onload = function (e) {
                  resize21.croppie('bind',{
                    url: e.target.result
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
                }
                reader21.readAsDataURL(this.files[0]);
                $('.footer_advertise_modal').modal('show')
            });

            $('.upload-analyse-image').on('click', function (ev) {
              resize21.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
                 $.ajax({
                   url: "{{ route('advertise.croppie.upload-blog-image') }}",
                   type: "POST",
                    data: {"image":img,'old_image':image_name},
                   dataType: 'json',
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success: function (data) {
                   
                    html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                    $("#current_analyse_image").html(html);   
                        },
                   error:function(e){
                    console.log(e)
                   }
                 });
              });
            });
            //end footer
    });
    //end header photo
   
//   start target
  $(document).on('click', '.add-benefit-modal', function() {
              var no = $(this).data('no');
              document.getElementById('image_benefit_'+no).click(no);
              /* image crop */
              var resize = $('#benefit_photo_'+no).croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 50,
                   height: 50,
                   type: 'square' //square
               },
               boundary: {
                   width: 100,
                   height: 100
               }
             });
           $('#image_benefit_'+no).on('change', function () { 
             var reader = new FileReader();
               reader.onload = function (e) {
                 resize.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader.readAsDataURL(this.files[0]);
               $('#addbenefitModal'+no).modal('show');
           });
           
           $('#upload-benefit-image_'+no).on('click', function (ev) {
             resize.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
               html = '<img src="' + img + '" />';
                $.ajax({
                  url: "{{ route('advertise-with-us.croppie.upload-image') }}",
                  type: "POST",
                  data: {"image":img,"path":"project"},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {
                     html = '<img class="current_benefit_photo_'+no+'" alt="'+data.image_name+'" src="' + img + '" />';
                     if(($('#current_benefit_photo_'+no).find('> img').length )>=1)
                     {
                        $('#current_benefit_photo_' +no+' img').replaceWith(html);     
                     }
                     else{
                        $("#current_benefit_photo_"+no).append(html); 
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
              var sponsor_photo_arr = [];
                $("[id*= current_sponsor_photo_]").each(function(key,value) {
                    var image_id = '#'+ value.id;
                    var arr = image_id.split('#current_sponsor_photo_');
                    var img=$(image_id +' img').attr('alt');
                    var title = $('#sponsor_title_'+arr[1]).val();
                    var btn_text = $('#sponsor_btn_text_'+arr[1]).val();
                    var description = $('#sponsor_description_'+arr[1]).val();
                    var sponsor_id = $('#sponsor_id_'+arr[1]).val();
                    item = {};
                    item ["img"] = img;
                    item ["title"] = title;
                    item ["btn_text"] = btn_text;
                    item ["description"] = description;
                    item ["sponsor_id"] = sponsor_id;
                    sponsor_photo_arr.push(item);
                });
              var sponsor_photo_arr =JSON.stringify(sponsor_photo_arr);
                 var benefit_photo_arr = [];
                $("[id*= current_benefit_photo_]").each(function(key,value) {
                    var image_id = '#'+ value.id;
                    var arr = image_id.split('#current_benefit_photo_');
                    var img=$(image_id +' img').attr('alt');
                    var title = $('#benefit_title_' +arr[1]).val();
                    var description = $('#benefit_description_' +arr[1]).val();
                    var benefit_id = $('#benefit_id_'+arr[1]).val();
                    item = {};
                    item ["img"] = img;
                    item ["title"] = title;
                    item ["description"] = description;
                    item ["benefit_id"] = benefit_id;
                    benefit_photo_arr.push(item);
                });
              var benefit_photo_arr =JSON.stringify(benefit_photo_arr);
              var header_image =$('#current_advertise_photo img').attr('alt');
              var analyse_image =$('#current_analyse_image img').attr('alt');
              var text_header = $('#text_header').val();
              var breadcrump = $('#breadcrump').val();
              var why_myanbox =  $('#why_myanbox').val();
              var myanbox_dec =  $('#myanbox_dec').val();
              var benefit_header =  $('#benefit_header').val();
              var benefit_breadcrumb =  $('#benefit_breadcrumb').val();
              var analyse_customer_data_header =  $('#analyse_customer_data_header').val();
              var btn_text =  $('#btn_text').val();
              var call_now =  $('#call_now').val();
              var call_now_phone =  $('#call_now_phone').val();
              var call_now_background_color =  $('#call_now_background_color').val();
              var call_now_font_color =  $('#call_now_font_color').val();
              var analyse_description = $('#analyse_description').val();
              var advertise_with_us=$('#advertise_with_us').val();
              e.preventDefault();
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('advertise-with-us.update') }}",
                     data:"header_image="+header_image+"&analyse_image="+analyse_image+"&text_header="+text_header+"&breadcrump="+breadcrump+"&why_myanbox="+why_myanbox+"&text_header="+text_header
                     +"&myanbox_dec="+myanbox_dec+"&benefit_header="+benefit_header+"&analyse_customer_data_header="+analyse_customer_data_header+"&btn_text="+btn_text+
                     "&call_now="+call_now+"&call_now_phone="+call_now_phone+"&call_now_background_color="+call_now_background_color+"&call_now_font_color="+call_now_font_color+"&analyse_description="+analyse_description
                     +"&benefit_photo_arr="+benefit_photo_arr+"&sponsor_photo_arr="+sponsor_photo_arr+"&advertise_with_us="+advertise_with_us+"&benefit_breadcrumb="+benefit_breadcrumb,
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success:function(data)
                     {
                         if($.isEmptyObject(data.errors)){
                              var url = "{{ route('advertise-with-us.edit') }}";
                                window.location=url;
                         }
                         else{
                               //printErrorMsg(data.errors);
                               console.log(data.errors);
                                if($.isEmptyObject(data.errors.text_header)){ 
                                  $('#text_headerError').html("");
                                   $("input[name=text_header]").removeClass('error-messageborder');
                              }else{
                                   $('#text_headerError').html(data.errors.text_header);
                                   $("input[name=text_header]").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.breadcrump)){ 
                                  $('#breadcrumpError').html("");
                                   $("input[name=breadcrump]").removeClass('error-messageborder');
                              }else{
                                   $('#breadcrumpError').html(data.errors.breadcrump);
                                   $("input[name=breadcrump]").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.why_myanbox)){ 
                                  $('#why_myanboxError').html("");
                                   $("input[name=why_myanbox]").removeClass('error-messageborder');
                              }else{
                                   $('#why_myanboxError').html(data.errors.why_myanbox);
                                   $("input[name=why_myanbox]").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.myanbox_dec)){ 
                                  $('#myanbox_decError').html("");
                                   $("input[name=myanbox_dec]").removeClass('error-messageborder');
                              }else{
                                   $('#myanbox_decError').html(data.errors.myanbox_dec);
                                   $("input[name=myanbox_dec]").addClass('error-messageborder');
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
        //   $('.project_type').on('input',function(e){
        //       var project  = $(this).val();
        //       var dataList = $("#project");
        //       var op ="";
        //       e.preventDefault();
        //       $.ajax({
        //              type: "post",
        //              url: "{{ URL::route('getProjectType') }}",
        //              data:{'project':project},
        //              dataType: 'json',
        //              headers: {
        //                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //              },
        //              success:function(data)
        //              {

        //                 op +="<option value='0' >Choose Project Type</option>";
        //               for(var i=0;i<data.length;i++)
        //               {
        //                  op +='<option value="'+data[i].project_type_name+'">'+data[i].project_type_name+'</option>';
        //               }
        //               $("#project").html(op); 
                       
        //               },
        //              error:function(e)
        //              {
        //                 console.log(e);
        //              }
        //           });
        //       });
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