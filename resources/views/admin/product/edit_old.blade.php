@extends('layouts.company_panel')
@section('content')
<!-- Single pro tab review Start-->
  <div class="single-pro-review-area mg-t-30 mg-b-15">
      <div class="container-fluid">
      <div class="row"> 
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Update Product Information</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="{{ route('product.index') }}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                            Product List
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
<div class="card-body table-responsive">
    <div class="row"> 
                 <div class="panel panel-default col-lg-offset-1 col-md-offset-1 col-md-10 col-lg-10">
                   <div class="panel-body">
                     <form  id="editProductForm" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                       <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div id="error">
                          </div>
                          <div class="form-group">
                           <label for="name">Name:</label><span class="text-error-danger"> * </span>
                            <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="<?= $company_product->product_name ?>">
                            <div id="nameError" class="error"></div>
                          </div>
                          <div class="form-group">
                            <label for="code">Code No</label><span class="text-error-danger"> * </span>
                            <input type="text" class="form-control" placeholder="Code No" name="code" id="codeno" value="<?= $company_product->code ?>">
                            <div id="codeError" class="error"></div>
                          </div>
                          <div class="form-group">
                          <label for="description">Description</label>
                          <textarea name="description"  id="detail">
                            <?= $company_product->product_description ?>
                          </textarea>
                         </div>
                        </div> 
                        <div class="col-lg-6 col-md-6 ">
                          <div class="form-group">
                             <label for="price">Price</label><span class="text-error-danger"> * </span>
                             <input type="number" name="price" class="form-control" id="price" value="<?= $company_product->price?>">
                             <div id="priceError" class="error"></div>
                          </div>
                           <div class="form-group">
                             <label for="price">Size</label>
                             <input type="text" name="size" class="form-control" id="size" placeholder="Size" value="<?= $company_product->size ?>">
                          </div>
                          <div class="form-group">
                             <label for="price">Stock Status</label><span class="text-error-danger"> * </span>
                             <?php
                             foreach($current_stocks as $current_stock){
                                if($current_stock == $company_product->current_stock)
                                  $check = "checked";
                                else
                                  $check ="";
                              ?>
                             <input type="radio" name="stock_status"  id="stock_status" value="{{$current_stock}}" <?= $check?>>{{$current_stock}}
                             <?php } ?>
                             <div id="stock_statusError" class="error"></div>
                          </div>
                        <!--  <div class="form-group">-->
                        <!--    <label for="photo">Product Photo</label>-->
                        <!--    <div>-->
                        <!--    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".product-image-modal">Upload Photo</button>-->
                        <!--    <div id="current_product_cover_photo"></div>-->
                        <!--  </div> -->
                        <!--</div>-->
                          <div class="form-group">
                            <label for="photo">Product Photo</label>
                            <!--start-->
                            <div clas="file_input_wrap">
                              <!--<input type="file" name="imageUpload" id="imageUpload" class="hide" />-->
                                  <!--<input type="file" id="blog_file" name="blog_photo" accept="image/*" class="hide">-->
                                <!--<input type="file" id="product_file" name="cover_product_photo" accept="image/*" class="hide">-->
                                <input type="file" id="product_edit_file" name="product_edit_cover_photo" accept="image/*" class="hide">
                                <label for="product_edit_file" class="btn btn-large btn btn-primary ">Upload Photo</label>
                          </div>
                          <div class="img_preview_wrap">
                                  <div id="current_product_cover_photo"></div>
                              <!--<img src="" id="imagePreview" alt="Preview Image" width="200px" class="hide" />-->
                          </div>
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
      <div class="modal bs-example-modal-md-1 product-image-modal" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                  <h2 class="modal-title">Upload Product Photo</h2>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="product_edit_file" name="product_edit_cover_photo">-->
                        <!--</center>-->
                        <div id="product_edit_cover_photo"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal"  class="btn btn-primary btn-block upload-product-edit-image" data-dismiss="modal" aria-label="Close">Upload  Image</button>
      </p>
    </div>
  </div>
</div>
<!--image upload-modal end-->                                       
 <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
  <script type="text/javascript">
       $(document).ready(function(){
              /* bind image */
               var img = '<?php echo asset('storage/product/'.$company_product->photo) ?>';
               var image_name = '<?php echo $company_product->photo ?>';

               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_product_cover_photo").html(html);

              /* image crop */
              var resize10 = $('#product_edit_cover_photo').croppie({
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
           $('#product_edit_file').on('change', function () { 
             var reader10 = new FileReader();
               reader10.onload = function (e) {
                 resize10.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader10.readAsDataURL(this.files[0]);
               $('.product-image-modal').modal('show');
           });
           $('.upload-product-edit-image').on('click', function (ev) {
             resize10.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"product",'old_image':image_name},
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
      
            
      
                $('form#editProductForm').on('submit',function(e){
               var image     = $('#current_product_cover_photo img').attr('alt');
               var detail = $('#detail').summernote('code');
               e.preventDefault();
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('product.update',$company_product->id) }}",
                     data: $('#editProductForm').serialize()+"&description="+detail+"&image_name="+image+"&path=product"+'&old_image='+image_name,
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success:function(data)
                     {
                         if($.isEmptyObject(data.errors)){
                            //  var message = data.success;
                              var url = "{{ url('product?page='.Session::get('pageno')) }}";
                                   window.location = url;
                               //  callbackURL(message,url);

                         }
                         else{
                             //printErrorMsg(data.errors);
                             if($.isEmptyObject(data.errors.name)){ 
                                  $('#nameError').html("");
                                   $("input[name=name]").removeClass('error');
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
                               if($.isEmptyObject(data.errors.current_stock)){ 
                                  $('#stock_statusError').html("");
                                   $("input[name=stock_status]").removeClass('error-messageborder');
                              }else{
                                   $('#stock_statusError').html(data.errors.current_stock);
                                   $("input[name=stock_status]").addClass('error-messageborder');
                              }
                         } 
                      },
                     error:function(e)
                     {
                        console.log(e);

                     }
                   });
               });
        //   }); 
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
