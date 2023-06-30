@extends('backend.layouts.company_panel')
@section('title','Add New Service')
@section('content')
      <div class="col-md-9 col-sm-12">
        <li>
          <div class="blog-inter">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <form id="addServiceForm" method="post" enctype="multipart/form-data">
                       {{csrf_field()}}
                  <div class="row">
                      <div class="col-lg-8 col-md-8">
                          <div class="form-group">
                              <label for="name">Service Title :</label><span class="text-danger"> * </span>
                              <input type="text" class="form-control" placeholder="Enter Service Title" name="name" id="name" />
                              <div id="nameError" class="error"></div>
                          </div>
                          <div class="form-group">
                              <label for="servicedetail">Service Detail :</label><br>
                              <textarea name="detail" id="detail"> </textarea>
                          </div>
                      </div>
                      <div class="col-lg-4 col-md-4">
                         <div class="form-group">
                          <label for="servicephoto">Service Photo :</label><span class="text-danger"> * </span>
                          <div clas="file_input_wrap">
                             <input type="file" id="service_file" name="cover_photo" accept="image/*" class="hide" />
                              <label for="service_file" class="btn btn-standard" style="color:white !important">Upload Service Photo</label>
                          </div>
                          <div class="img_preview_wrap">
                              <div id="current_service_photo"></div>
                              <div id="imageError" class="error"></div>
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
                             <div class="row" style="padding:20px">
                             <div class="col-lg-12 col-md-12">
                            <center>
                                <button data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-standard upload-service-image" data-dismiss="modal" aria-label="Close">Upload</button>
                            </center>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <!--image upload-modal end-->
@endsection
@section('script')
                <script type="text/javascript">
                    $(document).ready(function () {
                        /* image crop */
                        var resize = $("#service_photo").croppie({
                            enableExif: true,
                            enableOrientation: true,
                            viewport: {
                                // Default { width: 100, height: 100, type: 'square' }
                                width: 500,
                                height: 400,
                                type: "square", //square
                            },
                            boundary: {
                                width: 510,
                                height: 410,
                            },
                        });
                        $("#service_file").on("change", function () {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                resize
                                    .croppie("bind", {
                                        url: e.target.result,
                                    })
                                    .then(function () {
                                        console.log("jQuery bind complete");
                                    });
                            };
                            reader.readAsDataURL(this.files[0]);
                            $(".service-image-modal").modal("show");
                        });

                        $(".upload-service-image").on("click", function (ev) {
                            resize.croppie("result", {
                                    type: "canvas",
                                    size: "viewport",
                                })
                                .then(function (img) {
                                    $.ajax({
                                        url: "{{route('croppie.upload-image')}}",
                                        type: "POST",
                                        data: { image: img, path: "service" },
                                        dataType: "json",
                                        headers: {
                                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                                        },
                                        success: function (data) {
                                            html = '<img alt="' + data.image_name + '" src="' + img + '" />';
                                            $("#current_service_photo").html(html);
                                        },
                                        error: function (e) {
                                            console.log(e);
                                        },
                                    });
                                });
                        });
                    });
                    $("form#addServiceForm").on("submit", function (e) {
                        var image = $("#current_service_photo img").attr("alt");
                        var detail = $("#detail").summernote("code");
                        detail = detail.replaceAll("&amp;", "and_char");
                        e.preventDefault();
                        $.ajax({
                            type: "post",
                            url: "{{ URL::route('service.store') }}",
                            data: $("#addServiceForm").serialize() + "&detail=" + detail + "&image_name=" + image,
                            dataType: "json",
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                            },
                            success: function (data) {
                                if ($.isEmptyObject(data.errors)) {
                                    if(data.url == "<?php echo URL::to('/').'/company'?>"){
                                       window.location=data.url;
                                    }else{
                                      var url = "{{ route('service.index') }}";
                                      window.location = url;
                                    }

                                } else {
                                    //printErrorMsg(data.errors);
                                    console.log(data.errors);
                                    if ($.isEmptyObject(data.errors.name)) {
                                        $("#nameError").html("");
                                        $("input[name=name]").removeClass("error-messageborder");
                                    } else {
                                        $("#nameError").html(data.errors.name);
                                        $("input[name=name]").addClass("error-messageborder");
                                    }
                                    if ($.isEmptyObject(data.errors.image_name)) {
                                        $("#imageError").html("");
                                    } else {
                                        $("#imageError").html(data.errors.image_name);
                                    }
                                }
                            },
                            error: function (e) {
                                var message = "Something Wrong!";
                                callbackFailure(message);
                            },
                        });
                    });

                    function printErrorMsg(msg) {
                        if ($(msg).length > 1) {
                            $.each(msg, function (key, value) {
                                message += '<span class="alert alert-danger">' + value + "</span>";
                                $("#error").html(message);
                            });
                        } else {
                            message = '<span class="alert alert-danger">' + msg + "</span>";
                            $("#error").html(message);
                        }
                    }
        </script>
 @endsection


