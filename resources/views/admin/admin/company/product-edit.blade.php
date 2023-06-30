@extends('layouts.admin_panel')
@section('content')
<!-- Single pro tab review Start-->
  <div class="single-pro-review-area mg-t-30 mg-b-15">
      <div class="container-fluid">
        @include('admin.element.breadcrumb')
        <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title"> Change {{ $company->user->name }} Company Product Information</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                         @php
                                    $companyid = $company_product->company_id;
                                    $companyid = \Crypt::encrypt($companyid);
                                    
                                @endphp
                                 <a href="{{ url('/admin/company-product',['company_id'=>$companyid],'?page='.Session::get('pageno')) }}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                            Product List
                          </a>
                        <!--<a href="{{ url('/admin/company-product/'.$company_product->company_id.'?page='.Session::get('pageno')) }}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                            Product List
                          </a>-->
                    </div>   
                  </div>
                </h4>
              </div>
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
                            <label for="code">Code No:</label><span class="text-error-danger"> * </span>
                            <input type="text" class="form-control" placeholder="Code No" name="code" id="codeno" value="<?= $company_product->code ?>">
                              <div id="codeError" class="error"></div>
                          </div>
                          <div class="form-group">
                          <label for="description">Description:</label>
                          <textarea name="description"  id="detail">
                            <?= $company_product->product_description ?>
                          </textarea>
                         </div>
                        </div> 
                        <div class="col-lg-6 col-md-6 ">
                          <div class="form-group">
                             <label for="price">Price:</label><span class="text-error-danger"> * </span>
                             <input type="number" name="price" class="form-control" id="price" value="<?= $company_product->price?>">
                               <div id="priceError" class="error"></div>
                          </div>
                           <div class="form-group">
                             <label for="Size">Size:</label>
                             <input type="text" name="size" class="form-control" id="size" placeholder="Size" value="<?= $company_product->size ?>">
                          </div>
                          <div class="form-group">
                             <label for="price">Stock Status:</label><span class="text-error-danger"> * </span><br>
                             <?php
                             foreach($current_stocks as $current_stock){
                                if($current_stock == $company_product->current_stock)
                                  $check = "checked";
                                else
                                  $check ="";
                              ?>
                             <input type="radio" name="stock_status"  id="stock_status" value="{{$current_stock}}" <?= $check?>>{{$current_stock}}
                             <?php } ?>
                          </div>
                        <!--  <div class="form-group">-->
                        <!--    <label for="photo">Product Photo</label>-->
                        <!--    <div>-->
                        <!--    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md-1">Upload Photo</button>-->
                        <!--    <div id="current_cover_photo"></div>-->
                        <!--  </div> -->
                        <!--</div>-->
                        <!--start-->
                        <div class="form-group">
                                 <label>Image:</label><span class="text-error-danger"> * </span>
                         <div clas="file_input_wrap">
                                                                <!--<input type="file" name="imageUpload" id="imageUpload" class="hide" />-->
                                 <input type="file" id="image_file" name="cover_photo" accept="image/*" class="hide">
                             <label for="image_file" class="btn btn btn-primary ">Upload Photo</label>
                                  </div>
                         <div class="img_preview_wrap">
                                 <div id="current_cover_photo"></div>
                                    <div id="photoError" class="error"></div>
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
          <!--image upload-modal start-->
      <div class="modal bs-example-modal-md-1 admin-product-edit-modal" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                  <h2 class="modal-title">Upload Product Photo</h2>
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
  /* $("#basic_add_btn").on('click', function() {
  	var $this=$(this);
   $this
         .attr('disabled','disabled');
          setTimeout(function() {
            $this.removeAttr('disabled');
        }, 3000);
});*/
       $(document).ready(function(){
              /* bind image */
               var img = '<?php echo asset('storage/product/'.$company_product->photo) ?>';
               var image_name = '<?php echo $company_product->photo ?>';

               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_cover_photo").html(html);

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
               $('.admin-product-edit-modal').modal('show');
           });


           $('.upload-image').on('click', function (ev) {
             resize.croppie('result', {
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
                   $("#current_cover_photo").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
            
      
                $('form#editProductForm').on('submit',function(e){
               var image     = $('#current_cover_photo img').attr('alt');
               var detail = $('#detail').summernote('code');
               detail = detail.replaceAll("&amp;", "and_char");
               e.preventDefault();
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('admin.product.update',$company_product->id) }}",
                     data: $('#editProductForm').serialize()+"&description="+detail+"&image_name="+image+"&path=product"+'&old_image='+image_name,
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success:function(data)
                     {
                         if($.isEmptyObject(data.errors)){
                            
                              
                              // var message = "successfully updated!";
                                var url = "{{ url('/admin/company-product/'.$companyid.'?page='.Session::get('pageno')) }}";
                                window.location=url;
                                
                                // callbackURL(message,url);
                                 
                          /* alert('successfully update');
                           window.location=data.url;*/
                         }
                         else{
                             //printErrorMsg(data.errors);
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
                                          if ($.isEmptyObject(data.errors.image_name)) {
                            $("#photoError").html("");
                        } else {
                            $("#photoError").html(data.errors.image_name);
                        }
                         } 
                        // location.reload()
                      },
                     error:function(e)
                     {
                        var message = "Something Wrong!";
                         callbackFailure(message) ;

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
