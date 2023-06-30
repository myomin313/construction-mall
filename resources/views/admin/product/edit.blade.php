@extends('layouts.company_new_panel')
@section('content')
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
<body class="suppliers">
<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
  <!--preloader end--> 
  <!--main-header start-->
  @include('element.header')
  <!--main-header end--> 
   <!--<section class="inner-wrap service_detail"> -->
   @if(Session::get('parent_category_id') == 1)
       @if(!empty($company->cover_photo))
  <section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->service_default_background_image) }}');">
  @endif
  @elseif(Session::get('parent_category_id') == 2)
   @if(!empty($company->cover_photo))
  <section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->supplier_default_background_image) }}');">
  @endif
  @elseif(Session::get('parent_category_id') == 3)
   @if(!empty($company->cover_photo))
  <section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->reno_default_background_image) }}');">
  @endif
  @endif
    <div class="container">
      <h1>Product Update</h1>
    </div>    
  </section>
<!--inner content start-->
    <div class="container-fluid" style="margin-top: -3em;z-index: 4;">
      <input type="file" id="cover_file" name="cover_photo" accept="image/*" class="hide">
       <label class="pull-right edit_btn" for="cover_file">
    <i class="fa fa-camera" style="color:white;padding:10px;background: #ffcc32;border-radius: 20px" aria-hidden="true"></i></label>
    </div>
  <section class="inner-wrap supplier_detail"> 
    <!--container start-->
    <div class="container">
      <div class="row">
      <!--row start-->
      <ul class="blog-grid">
       @include('element.company_menu')
       </div>
        <!--col start-->
      <div class="col-md-9 col-sm-12">
        <li>
            <div class="blog-inter">
             <div class="row">
              <div class="col-md-12">
              <form  id="editProductForm" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                       <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div id="error">
                          </div>
                          <div class="form-group">
                           <label for="name">Product Name :</label><span class="text-danger"> * </span>
                            <input type="text" class="form-control" placeholder="Enter Product Name" name="name" id="name"  value="<?= $company_product->product_name ?>">
                            <div id="nameError" class="error"></div>
                          </div>
                          <div class="form-group">
                             <label for="price">Price :</label><span class="text-danger"> * </span>
                             <input type="number" name="price" class="form-control" id="price" placeholder="Price" value="<?= $company_product->price?>">
                              <div id="priceError" class="error"></div>
                          </div>
                          <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea name="description"  id="detail">
                                <?= $company_product->product_description ?>
                            </textarea>
                          </div>
                          <div class="form-group">
                             <label for="price">Stock Status :</label><span class="text-danger"> * </span><br>
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
                        </div> 
                        <div class="col-lg-6 col-md-6 ">
                           <div class="form-group">
                            <label for="code">Code No :</label><span class="text-danger"> * </span>
                            <input type="text" class="form-control" placeholder="Code No" name="code" id="codeno" value="<?= $company_product->code ?>">
                             <div id="codeError" class="error"></div>
                          </div>
                         
                          <div class="form-group">
                             <label for="price">Size :</label>
                             <input type="text" name="size" class="form-control" id="size" placeholder="Size" value="<?= $company_product->size ?>">
                          </div>
                          
                         <div class="form-group">
                            <label for="photo">Product Photo</label><span class="text-danger"> * </span>
                            <!--start-->
                            <div class="file_input_wrap">
                              <!--<input type="file" name="imageUpload" id="imageUpload" class="hide" />-->
                                  <!--<input type="file" id="blog_file" name="blog_photo" accept="image/*" class="hide">-->
                                <!--<input type="file" id="product_file" name="cover_product_photo" accept="image/*" class="hide">-->
                                <input type="file" id="product_edit_file" name="product_edit_cover_photo" accept="image/*" class="hide">
                                <label for="product_edit_file" class="btn btn-standard">Upload Photo</label>
                          </div>
                          <div class="img_preview_wrap">
                                  <div id="current_product_cover_photo"></div>
                              <!--<img src="" id="imagePreview" alt="Preview Image" width="200px" class="hide" />-->
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
<!--brand-section start-->
@include('element.company_logo_slider')
<!--brand-section end--> 
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
      
        <div class="row" style="padding:20px">
           <div class="col-lg-12">
                    <center>
                    <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-standard upload-product-edit-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
                    </center>
            </div>
        </div>
        
    </div>
  </div>
</div>
<!--image upload-modal end-->
<!--company-profile edit modal end--> 
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
                             // var url = "{{ url('product?page='.Session::get('pageno')) }}";
                                //   window.location = url;
                                   
                                    if(data.url == "<?php echo env('APP_URL').'company'?>"){
                                       window.location=data.url;
                                    }else{
                                      var url = "{{ url('product?page='.Session::get('pageno')) }}";
                                           window.location = url;
                                    }
                                    
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