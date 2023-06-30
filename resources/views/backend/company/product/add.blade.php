@extends('backend.layouts.company_panel')
@section('title','Add New Product')
@section('extra_css')
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
@endsection
@section('content')

      <div class="col-md-9 col-sm-12">
        <li>
            <div class="blog-inter">
             <div class="row">
              <div class="col-md-12">
              <form  id="addProductForm" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                       <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div id="error">
                          </div>
                          <div class="form-group">
                           <label for="name">Product Name :</label><span class="text-danger"> * </span>
                            <input type="text" class="form-control" placeholder="Enter Product Name" name="name" id="name">
                            <div id="nameError" class="error"></div>
                          </div>
                          <div class="form-group">
                             <label for="price">Price :</label><span class="text-danger"> * </span>
                             <input type="number" name="price" class="form-control" id="price" placeholder="Price">
                              <div id="priceError" class="error"></div>
                          </div>
                          <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea name="description"  id="detail">
                            </textarea>
                          </div>
                          <div class="form-group">
                             <label for="price">Stock Status :</label><span class="text-danger"> * </span><br>
                               @foreach($current_stocks as $current_stock)
                             <input type="radio" name="stock_status"  id="stock_status" value="{{$current_stock}}">{{$current_stock}}
                             @endforeach
                              <div id="stock_statusError" class="error"></div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 ">
                           <div class="form-group">
                            <label for="code">Code No :</label><span class="text-danger"> * </span>
                            <input type="text" class="form-control" placeholder="Code No" name="code" id="codeno">
                             <div id="codeError" class="error"></div>
                          </div>

                          <div class="form-group">
                             <label for="price">Size :</label>
                             <input type="text" name="size" class="form-control" id="size" placeholder="Size">
                          </div>
                          <div class="form-group">
                            <label for="photo">Product Photo :</label><span class="text-danger"> * </span>
                            <div class="file_input_wrap">
                                <input type="file" id="product_file" name="cover_product_photo" accept="image/*" class="hide">
                                <label for="product_file" class="btn btn-standard">Upload Product Photo</label>
                          </div>
                          <div class="img_preview_wrap">
                            <div id="current_product_cover_photo"></div>
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
      </ul>
      </div>
    </div>
    <!--container end-->
  </section>
 <!--inner content end-->

  <!--image upload-modal start-->
      <div class="modal bs-example-modal-md-1 product-image-modal" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                  <h2 class="modal-title">Upload Product Photo</h2>
                 <form id="coverphotoForm" enctype="multipart/form-data">
                   <div class="form-group">
                        <div id="cover_product_photo"></div>
                    </div>
               </form>
      <!--<p>-->
      <!--  <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-standard btn-block upload-product-image" data-dismiss="modal" aria-label="Close">Upload Image</button>-->
      <!--</p>-->

      <!--standard-->
        <div class="row" style="padding:20px">
           <div class="col-lg-12">
                    <center>
                    <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-standard upload-product-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
                    </center>
           </div>
        </div>
        </div>
      </div>
      </div>
@endsection
@section('script')
  <script type="text/javascript">
       $(document).ready(function(){
              /* image crop */
              var resize = $('#cover_product_photo').croppie({
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
           $('#product_file').on('change', function () {
             var reader = new FileReader();
               reader.onload = function (e) {
                 resize.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
              reader.readAsDataURL(this.files[0]);
             $('.product-image-modal').modal('show');
           });
           $('.upload-product-image').on('click', function (ev) {
             resize.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"product"},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_product_cover_photo").html(html);
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });

         });
            $('form#addProductForm').on('submit',function(e){
               var image     = $('#current_product_cover_photo img').attr('alt');
               var detail = $('#detail').summernote('code');
               detail = detail.replaceAll("&amp;", "and_char");
               e.preventDefault();
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('product.store') }}",
                     data: $('#addProductForm').serialize()+"&description="+detail+"&image_name="+image,
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success:function(data)
                     {
                         if($.isEmptyObject(data.errors)){
                           //   var message = data.success;
                                //var url = "{{ route('product.index') }}";
                                //window.location =data.url;
                               //  callbackURL(message,url);

                                if(data.url == "<?php echo URL::to('/').'/company'?>"){
                                       window.location=data.url;
                                    }else{
                                     var url = "{{ route('product.index') }}";
                                     window.location = url;
                                    }

                         }
                         else{
                             //printErrorMsg(data.errors);
                             console.log(data.errors);
                             if($.isEmptyObject(data.errors.name)){
                                  $('#nameError').html("");
                                   $("input[name=name]").removeClass('error-messageborder');
                              }else{
                                   $('#nameError').html(data.errors.name);
                                   $("input[name=name]").addClass('error-messageborder');
                              }
                                if($.isEmptyObject(data.errors.code)){
                                  $('#codeError').html("");
                                   $("input[name=code]").removeClass('error-messageborder');
                              }else{
                                   $('#codeError').html(data.errors.code);
                                   $("input[name=code]").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.price)){
                                  $('#priceError').html("");
                                   $("input[name=price]").removeClass('error-messageborder');
                              }else{
                                   $('#priceError').html(data.errors.price);
                                   $("input[name=price]").addClass('error-messageborder');
                              }
                               if($.isEmptyObject(data.errors.stock_status)){
                                  $('#stock_statusError').html("");
                                   $("input[name=stock_status]").removeClass('error-messageborder');
                              }else{
                                   $('#stock_statusError').html(data.errors.stock_status);
                                   $("input[name=stock_status]").addClass('error-messageborder');
                              }
                               if ($.isEmptyObject(data.errors.image_name)) {
                                        $("#imageError").html("");
                                    } else {
                                        $("#imageError").html(data.errors.image_name);
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
