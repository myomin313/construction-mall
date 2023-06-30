@extends('layouts.company_panel')
@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mg-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">
                            <div class="row">
                                <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <h3 class="panel-title">Update Service Information</h3>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <a href="{{ route('service.index') }}" class="btn btn-default pull-right">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                        Service List
                                    </a>
                                </div>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="row">
                            <div class="panel panel-default col-lg-offset-1 col-md-offset-1 col-md-10 col-lg-10">
                                <div class="panel-body">
                                    <form id="editServiceForm" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div id="error"></div>
                                                <div class="form-group">
                                                    <label for="name">Name:</label><span class="text-error-danger"> * </span>
                                                    <input type="text" class="form-control" placeholder="Name" name="name" id="service_name" value="<?= $company_service->service_name ?>" />
                                                    <div id="nameError" class="error"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Service Detail</label>
                                                    <textarea name="detail" id="detail">
                            <?= $company_service->service_detail ?>

                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <!--  <div class="form-group">-->
                                                <!--    <label for="address">Service Photo</label>-->
                                                <!--    <div>-->
                                                <!--    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".service-image-modal">Upload Photo</button>-->
                                                <!--    <div id="current_service_photo"></div>-->
                                                <!--  </div> -->
                                                <!--</div>-->
                                                <!--start-->
                                                <div class="form-group">
                                                    <label for="servicephoto">Service Photo</label><span class="text-error-danger"> * </span>
                                                    <div clas="file_input_wrap">
                                                        <!--<input type="file" name="imageUpload" id="imageUpload" class="hide" />-->
                                                        <!--<input type="file" id="service_file" name="cover_photo">-->
                                                        <input type="file" id="service_file" name="cover_photo" accept="image/*" class="hide" />
                                                        <label for="service_file" class="btn btn-primary">Upload Photo</label>
                                                    </div>
                                                    <div class="img_preview_wrap">
                                                        <div id="current_service_photo"></div>
                                                        <div id="imageError" class="error"></div>
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
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
</div>

                <!--image upload-modal start-->
                <div class="modal bs-example-modal-md-1 service-image-modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                            <h2 class="modal-title">Upload Service Photo</h2>
                            <form id="coverphotoForm">
                                <div class="form-group">
                                    <!--<center>-->
                                    <!--  <input type="file" id="service_file" name="cover_photo">-->
                                    <!--</center>-->
                                    <div id="service_photo"></div>
                                </div>
                            </form>
                            <p>
                                <button data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-service-image" data-dismiss="modal" aria-label="Close">Upload</button>
                            </p>
                        </div>
                    </div>
                </div>
                <!--image upload-modal end-->
                <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script>
                <script type="text/javascript">
                    $(document).ready(function(){
                           /* bind image */
                            var img = '<?php echo asset('storage/service/'.$company_service->image_name) ?>';
                            var image_name = '<?php echo $company_service->image_name ?>';

                            html = '<img alt="'+image_name+'" src="' + img + '" />';
                             $("#current_service_photo").html(html);
                           /* image crop */
                           var resize = $('#service_photo').croppie({
                            enableExif: true,
                            enableOrientation: true,
                            viewport: { // Default { width: 100, height: 100, type: 'square' }
                                width: 500,
                                height: 400,
                                type: 'square' //square
                            },
                            boundary: {
                                width: 510,
                                height: 410
                            }
                        });
                        $('#service_file').on('change', function () {

                          var reader = new FileReader();
                            reader.onload = function (e) {
                              resize.croppie('bind',{
                                url: e.target.result
                              }).then(function(){
                                console.log('jQuery bind complete');
                              });
                            }
                            reader.readAsDataURL(this.files[0]);
                            $('.service-image-modal').modal('show');
                        });


                        $('.upload-service-image').on('click', function (ev) {
                          resize.croppie('result', {
                            type: 'canvas',
                            size: 'viewport'
                          }).then(function (img) {
                             $.ajax({
                               url: "{{route('croppie.upload-image')}}",
                               type: "POST",
                               data: {"image":img,"path":"service"},
                               dataType: 'json',
                               headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                               },
                               success: function (data) {

                                html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                                $("#current_service_photo").html(html);
                                    },
                               error:function(e){
                                console.log(e)
                               }
                             });
                          });
                        });


                             $('form#editServiceForm').on('submit',function(e){
                                   var image     = $('#current_service_photo img').attr('alt');

                            var detail = $('#detail').summernote('code');

                            e.preventDefault();
                           $.ajax({
                                  type: "post",
                                  url: "{{ URL::route('service.update',$company_service->id) }}",
                                  data: $('#editServiceForm').serialize()+"&detail="+detail+"&image_name="+image+"&old_image="+image_name,
                                  dataType: 'json',
                                  headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                  },
                                  success:function(data)
                                  {
                                      if($.isEmptyObject(data.errors)){
                                         //var message = data.success;
                                          var url = "{{ url('service?page='.Session::get('pageno')) }}";
                                           window.location = url;
                                             // callbackURL(message,url);
                                      }
                                      else{
                                         // printErrorMsg(data.errors);
                                         console.log(data.errors);
                                            if($.isEmptyObject(data.errors.name)){
                                               $('#nameError').html("");
                                                $("input[name=name]").removeClass('error-messageborder');
                                           }else{
                                                $('#nameError').html(data.errors.name);
                                                $("input[name=name]").addClass('error-messageborder');
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
            
