@extends('backend.layouts.company_panel')
@section('title','Change Project Information')
@section('content')

      <div class="col-md-9 col-sm-12">
        <li>
            <div class="blog-inter">
             <div class="row">
              <div class="col-md-12">
               <form  id="editProjectForm" method="post" enctype="multipart/form-data">
                         {{csrf_field()}}
                     <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div id="error">
                        </div>
                        <div class="form-group">
                         <label for="name">Project Name:</label><span class="text-danger"> * </span>
                          <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="<?= $company_project->project_name ?>">
                           <div id="nameError" class="error"></div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div class="form-group">
                          <label for="price">Range : </label>
                         
                          <select class="form-control" name="range" id="range">
                            <option>Range</option>

                          <?php
                          foreach($ranges as $range){
                            if($company_project->range_id == $range->id)
                                $select = "selected";
                            else
                                $select = "";
                          ?>
                          <option value="<?= $range->id ?>" <?= $select ?>><?= $range->minimum_price ?> ~ <?= $range->maximum_price ?></option>
                         <?php } ?>
                        </select>
                       </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <div class="form-group">
                           <label for="Business">Business Type:</label><span class="text-danger"> * </span>
                           <input list="project" class="project_type form-control" id="project_list" autocomplete="off" name="project_type" placeholder="Please Enter Project Type" value="<?= $company_project->projectType->project_type_name ?>">
                            <datalist id="project">
                            </datalist>
                            <div id="project_typeError" class="error"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                          <label for="description">Description : </label>
                          <textarea name="description"  id="detail">
                              <?= $company_project->project_description ?>
                          </textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12 col-md-12">
                        <label for="photo">Project Photo : </label>
                        <div class="form-group">
                           <div id="add_more_field">
                            <div class="col-md-8">
                           </div>
                          <div class="col-md-4">
                           <a id="add_more" class="pull-right"> <i class="fa fa-plus" aria-hidden="true"></i> Add </a>
                          </div>
                            <!-- //initially one field is set -->
                             <?php
                            $count = 1;
                            foreach($company_project->projectphoto as $photo){
                        ?>

                            <div class="row meta-field">
                          <div class="col-md-4">
                            <div class="form-group">
                              <input class="form-control" id="photoname_{{$count}}" name="photoname" value="<?= $photo->image_title ?>" type="text">
                              <div id="photo_name_error_{{$count}}" class="error"></div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <a href="#" class="add-modal btn btn-standard" style="width:250px" data-no="{{$count}}">
                            Upload Photo</a>
                            <div id="current_cover_photo_{{$count}}">
                              <img  alt="{{$photo->photo}}" class="current_cover_photo_{{$count}} img-thumbnail" src="{{asset('storage/project/'.$photo->photo)}}">
                               <div id="current_photo_error_{{$count}}" class="error"></div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <a href="#" class="add_more_close pull-right"><i class="fa fa-minus" aria-hidden="true"></i> Remove</a>
                          </div>

                        </div>
                            <?php
                            $count ++;
                            }
                         ?>
                          </div>
                           </div>
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12 col-md-12">
                             <center>
                                 <button type="submit" id="basic_add_btn" class="btn btn-standard">Update</button>
                              </center>
                               </div>
                        </div>
               </form>
              </div>
             </div>
            </div>
        </li>
      </div>


       <!--image upload-modal start-->
      <?php
        $count = 1;
        foreach($company_project->projectphoto as $photo){
      ?>
      <div class="modal fade bs-example-modal-md-{{$count}}" tabindex="-1" role="dialog" id="addModal{{$count}}">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                  <h2 class="modal-title">Upload Project Photo</h2>
                     <form id="coverphotoForm">
                       <div class="form-group">
                            <center>
                              <input type="file" id="image_file_{{$count}}" name="cover_photo[]" class="image_file" accept="image/*">
                            </center>
                            <div id="cover_photo_{{$count}}" class="cover_photo"></div>
                        </div>
                    </form>
                      <div class="row" style="padding:20px">
                        <div class="col-lg-12">
                          <center>
                      <button  data-toggle="modal" class="btn btn-standard upload-image_{{$count}}" id="upload-image_{{$count}}" data-dismiss="modal" aria-label="Close">Upload Image</button>
                        </center>
                           </div>
                     </div>
                  </div>
                </div>
      </div>
    <?php $count++;
          }
    ?>



@endsection
@section('script')
@include('backend.element.project_input_validation_script')
@include('backend.element.project_business_type_input_script')
<script type="text/javascript">
 $(document).ready(function(){
  function addField(label,value)
  {
        $("#add_more_field").append('<div class="row meta-field"><div class="col-md-4"><div class="form-group"><input class="form-control" id="photoname_'+value+'" type="text" name="photoname" placeholder="Photo Name" value="'+label+'" ><div id="photo_name_error_'+value+'" class="error"></div></div></div><div class="col-md-4"><a href="#" class="add-modal btn btn-standard" style="width:250px" data-no="'+value+'">Upload Photo</a><div id="current_cover_photo_'+value+'"></div> <div id="current_photo_error_'+value+'" class="error"></div></div><div class="col-md-4"><a href="#" class="add_more_close pull-right"><i class="fa fa-minus" aria-hidden="true"></i> Remove</a></div></div><div   data-backdrop="" class="modal fade bs-example-modal-md-'+value+'" tabindex="-1" role="dialog" id="addModal'+value+'"><div class="modal-dialog modal-md" role="document"><div class="modal-content"><div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div><h2 class="modal-title">Upload Project Photo</h2><form id="coverphotoForm"><div class="form-group"><center><input type="file" id="image_file_'+value+'" name="cover_photo[]" class="image_file'+value+'"></center><div id="cover_photo_'+value+'" class="cover_photo"></div></div> </form><div class="row" style="padding:20px"><div class="col-lg-12"><center><button  data-toggle="modal" data-target="#addModal'+value+'" class="btn btn-standard upload-image" id="upload-image_'+value+'" data-dismiss="modal" aria-label="Close">Upload Image</button></center></div></div></div></div></div>');

  }
  var current_btn_lenght = $('.add-modal').length;
  $("#add_more").click(function(){
      addField('',++current_btn_lenght);
      $(".add_more_close").click(function(){
              $(this).parents(".meta-field").remove();
              return false;
         });
      return false;
  });
  $(".add_more_close").click(function(){
      $(this).parents(".meta-field").remove();
      return false;
  });
  $(document).on('click', '.add-modal', function() {
              var no = $(this).data('no');
              $('#addModal'+no).modal('show');
              /* image crop */
              var resize = $('#cover_photo_'+no).croppie({
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
           $('#image_file_'+no).on('change', function () {
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
           $('#upload-image_'+no).on('click', function (ev) {
             resize.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
               html = '<img src="' + img + '" />';
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"project"},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {
                     html = '<img class="current_cover_photo_'+no+'" alt="'+data.image_name+'" src="' + img + '" />';
                     if(($('#current_cover_photo_'+no).find('> img').length )>=1)
                     {
                        $('#current_cover_photo_' +no+' img').replaceWith(html);
                     }
                     else{
                        $("#current_cover_photo_"+no).append(html);
                     }
                  },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
   });
          $('form#editProjectForm').on('submit',function(e){
              var photo_arr = [];
                $("[id*= current_cover_photo_]").each(function(key,value) {
                    var image_id = '#'+ value.id;
                    var arr = image_id.split('#current_cover_photo_');
                    if($(image_id +' img').attr('alt') == undefined){
                        var image = "";
                    }else{
                        var image=$(image_id +' img').attr('alt');
                    }

                    var name = $('#photoname_' +arr[1]).val();
                    item = {};
                    item ["image"] = image;
                    item ["name"] = name;
                    photo_arr.push(item);
                });
              var photo =JSON.stringify(photo_arr);
              var name = $('#name').val();
              var range = $('#range').val();
              var project_type =  $('#project_list').val();
              var detail = $('#detail').summernote('code');
              detail = detail.replaceAll("&amp;", "and_char");
              e.preventDefault();
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('project.update',$company_project->id) }}",
                     data:"name="+name+"&range="+range+"&project_type="+project_type+"&description="+detail+"&photo_arr="+photo,
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success:function(data)
                     {
                           if($.isEmptyObject(data.photo_errors) && $.isEmptyObject(data.input_errors)){
                              if(data.url == "<?php echo URL::to('/').'/company'?>"){
                                    window.location=data.url;
                             }else{
                                var url = "{{ url('project?page='.Session::get('pageno')) }}";
                                 window.location = url;
                               }
                         }
                         else{
                             // printErrorMsg(data.errors);
                              inputValidationError(data);
                         }

                       console.log(data);
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
 });
</script>
@endsection





