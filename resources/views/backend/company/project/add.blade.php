@extends('backend.layouts.company_panel')
@section('title','Add New Project')
@section('content')

      <div class="col-md-9 col-sm-12">
        <li>
            <div class="blog-inter">
             <div class="row">
              <div class="col-md-12">
               <form  id="addProjectForm" method="post" enctype="multipart/form-data">
                         {{csrf_field()}}
                     <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div id="error">
                        </div>
                        <div class="form-group">
                         <label for="name">Project Name:</label><span class="text-danger"> * </span>
                          <input type="text" class="form-control" placeholder="Name" name="name" id="name">
                           <div id="nameError" class="error"></div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div class="form-group">
                          <label for="price">Range : </label>
                         <select class="form-control" name="range" id="range">
                            <option>Range</option>
                           @foreach($ranges as $range)
                          <option value="<?= $range->id ?>" ><?= $range->minimum_price ?> ~ <?= $range->maximum_price ?></option>
                          @endforeach
                        </select>
                       </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <div class="form-group">
                           <label for="Business">Business Type:</label><span class="text-danger"> * </span>
                           <input list="project" class="project_type form-control" id="project_list" autocomplete="off" name="project_type" placeholder="Please Enter Project Type">
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
                          <textarea name="description"  id="detail"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12 col-md-12">
                        <label for="photo">Project Photo : </label>
                        <div class="form-group">
                           <div id="add_more_field">
                            <!-- //initially one field is set -->
                            <div class="row meta-field">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <input class="form-control" id="photoname_1" name="photoname" placeholder="Photo Name" value="" type="text">
                                  <div id="photo_name_error_1" class="error"></div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <a href="#" class="add-modal btn btn-standard" data-no="1">
                                Upload Project Photo</a>
                                <div id="current_cover_photo_1"></div>
                                <div id="current_photo_error_1" class="error"></div>
                              </div>
                              <div class="col-md-4">
                                <a id="add_more" class="pull-right" > <i class="fa fa-plus" aria-hidden="true"></i> Add </a>
                              </div>
                            </div>
                          </div>
                           </div>
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12 col-md-12">
                             <center>
                                 <button type="submit" id="basic_add_btn" class="btn btn-standard">Save</button>
                              </center>
                               </div>
                        </div>
               </form>
              </div>
             </div>
            </div>
        </li>
      </div>


    <!--container end-->

       <!--image upload-modal start-->
      <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="addModal">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
          <h2 class="modal-title">Upload Project Photo</h2>
             <form id="coverphotoForm">
               <div class="form-group">
                    <center>
                      <input type="file" id="image_file_1" name="cover_photo[]" class="image_file" accept="image/*" >
                    </center>
                    <div id="cover_photo_1" class="cover_photo"></div>
                </div>
            </form>
            <!-- <p>-->
            <!--  <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-image_1" id="upload-image_1" data-dismiss="modal" aria-label="Close">Upload Image</button>-->
            <!--</p>-->

                     <div class="row" style="padding:20px">
                             <div class="col-lg-12">
                                    <center>
                                       <button data-toggle="modal" data-target=".bs-example-modal-md"  type="submit" class="btn btn-standard upload-image_1" id="upload-image_1"  data-dismiss="modal" aria-label="Close">Save</button>
                                    </center>
                           </div>
                     </div>

        </div>
      </div>
      </div>
 <!--inner content end-->
@endsection
@section('script')
@include('backend.element.project_input_validation_script')
@include('backend.element.project_business_type_input_script')
<script type="text/javascript">
    $(document).ready(function() {
        function addField(label, value) {
            $("#add_more_field").append('<div class="row meta-field"><div class="col-md-4"><div class="form-group"><input class="form-control" id="photoname_' + value + '" type="text" name="photoname" placeholder="Photo Name" value="' + label + '" ><div id="photo_name_error_' + value + '" class="error"></div></div></div><div class="col-md-4"><a href="#" class="add-modal btn btn-standard" data-no="' + value + '">Upload Project Photo</a><div id="current_cover_photo_' + value + '"></div> <div id="current_photo_error_' + value + '" class="error"></div></div><div class="col-md-4"><a href="#" class="add_more_close pull-right"><i class="fa fa-minus aria-hidden="true"></i> Remove</a></div></div><div   data-backdrop="" class="modal fade bs-example-modal-md-' + value + '" tabindex="-1" role="dialog" id="addModal' + value + '"><div class="modal-dialog modal-md" role="document"><div class="modal-content"><div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div><h2 class="modal-title">Upload Project Photo</h2><form id="coverphotoForm"><div class="form-group"><center><input type="file" id="image_file_' + value + '" name="cover_photo[]" class="image_file' + value + '"></center><div id="cover_photo_' + value + '" class="cover_photo"></div></div> </form><div class="row" style="padding:20px"><div class="col-lg-12"><center><button  data-toggle="modal" data-target="#addModal' + value + '" class="btn btn-standard upload-image" id="upload-image_' + value + '" data-dismiss="modal" aria-label="Close">Upload Image</button></center></div></div></div></div></div>');

        }

        var count = 1;
        $("#add_more").click(function () {
            addField('', ++count);
            $(".add_more_close").click(function () {
                $(this).parents(".meta-field").remove();
                return false;
            });
            return false;
        });

        $(document).on('click', '.add-modal', function() {
            var no = $(this).data('no');
            if(no == 1)
            {
                $('#addModal').modal('show');
            }
            else{
                $('#addModal'+no).modal('show');
            }
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
                            if($.isEmptyObject(data.errors)){
                                if(no >1){
                                    html = '<img class="w_200 img-thumbnail current_cover_photo_'+no+'" alt="'+data.image_name+'" src="' + img + '" />';
                                    $("#current_cover_photo_"+no).append(html);
                                }
                                else{
                                    html = '<img class="w_200 img-thumbnail current_cover_photo_'+no+'" alt="'+data.image_name+'" src="' + img + '" />';
                                    $('#current_cover_photo_'+no).html(html);
                                }
                            }
                            else{
                                printErrorMsg(data.errors);
                            }
                        },
                        error:function(e){
                            console.log(e)
                        }
                    });
                });
            });
        });

        $('form#addProjectForm').on('submit', function (e) {
            e.preventDefault();
            var photo_arr = [];
            var count = 1;
            $("[id*= current_cover_photo_]").each(function() {

                if($('#current_cover_photo_' +count+' img').attr('alt') == undefined){
                    var image = "";
                }else{
                    var image=$('#current_cover_photo_' +count+' img').attr('alt');
                }
                var name = $('#photoname_' +count).val();
                item = {};
                item ["image"] = image;
                item ["name"] = name;
                photo_arr.push(item);
                count++;
            });

            var photo =JSON.stringify(photo_arr);
            var name = $('#name').val();
            var range = $('#range').val();
            var project_type =  $('#project_list').val();
            var detail = $('#detail').summernote('code');
             detail = detail.replaceAll("&amp;", "and_char");
            $.ajax({
                type: "post",
                url: "{{ URL::route('project.store') }}",
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
                            var url = "{{ route('project.index') }}";
                            window.location = url;
                        }
                    }
                    else{
                        // printErrorMsg(data.errors);
                        inputValidationError(data);

                    }
                    //window.reload();
                },
                error:function(e)
                {
                    console.log(e);
                }
            });



        })
    })

</script>
@endsection





