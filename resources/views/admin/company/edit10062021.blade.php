@extends('layouts.company_panel')
@section('content')
<!-- Single pro tab review Start-->
       <div class="single-pro-review-area mg-t-30 mg-b-15">
           <div class="container-fluid">
               <div class="row">
                   <!--<div class="col-lg-offset-4 col-md-offset-4 col-lg-4 col-md-4 col-sm-offset-2 col-sm-4 col-xs-12 company_profile">
                       <h2 class="center">Company Information</h2>  
                   </div>-->
                   <div class="card">
                          <div class="card-header card-header-primary">
                            <h4 class="card-title ">
                              <div class="row">
                                 <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <h4 style="color:#ffffff; ">Company Information</h4>
                                </div>
                                   
                              </div>
                            </h4>
                          </div>
                         </div>
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                       <ol class="breadcrumb pull-right">
                         <!--<li><a href="#">Home</a></li>
                         <li class="#">profile</li>
                         <li class="active">edit</li>-->
                       </ol>
                   </div>
               </div>
              
               <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="product-payment-inner-st">
                           <ul id="myTabedu1" class="tab-review-design center">
                               <li class="active"><a href="#basic">Change Basic Information</a></li>
                               <!--<li><a href="#cover_photo_change">Change Cover Photo & Logo</a></li>-->
                               <li><a href="#account">Change Password</a></li>
                               <li><a href="#social">Change Social Information</a></li>
                           </ul>
                           <div id="myTabContent" class="tab-content custom-product-edit">
                               <div class="product-tab-list tab-pane fade active in" id="basic">
                                   <div class="row jumbotron">
                                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                           <div class="review-content-section">
                                               <div id="dropzone1" class="pro-ad">
                                                   <form  class="dropzone dropzone-custom needsclick add-professors" id="basicForm" method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                       <div class="row">
                                                          <div class="error">
                                                           </div>
                                                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                               <div class="form-group">
                                                                   <label for="name">Name:</label><span class="text-error-danger"> * </span>
                                                                   <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="<?= $company->user->name?>">
                                                                    <div id="nameError" class="error"></div>
                                                                   
                                                               </div>
                                                               
                                                               <div class="form-group">
                                                                   <label for="name">Email:</label><span class="text-error-danger"> * </span>
                                                                   <input type="text" name="email" class="form-control" placeholder="Email" value="<?= $company->email?>" id="email">
                                                                    <div id="emailError" class="error"></div>
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="phone">Phone Number:</label>
                                                                   <input type="text" class="form-control" placeholder="Phone" name="phone" id="phone" value="<?= $company->phone?>">
                                                               </div>
                                                              
                                                               <div class="form-group">
                                                                   <label for="city">City</label><span class="text-error-danger"> * </span>
                                                                   <select class="form-control" id="city" name="city">
                                                                       <option disabled="disabled" selected="selected">City</option>
                                                                       <?php
                                                                        foreach($cities as $city){
                                   if(!empty($company_city))
                                    if($company_city->id == $city->id)
                                                                            $selected ="selected";
                                                                           else
                                                                            $selected ="";
                                    else
                                       $selected ="";                                    ?>
                                                                       <option value={{$city->id}} <?=$selected?>>{{$city->name}}</option>
                                                                      <?php } ?>
                                                                   </select>
                                                                    <div id="cityError" class="error"></div>
                                                               </div>
                                                                 
                                                               <div class="form-group">
                                                                   <label for="township">Township</label><span class="text-error-danger"> * </span>
                                                                   <select class="form-control" id="township" name="township">
                                                                    <option>Township</option>
                                                                    <?php
                                                                        foreach($townships as $township){
                                        if($township->parent_id == $company_city->id){
                                                                           if($township->id == $company->location_id)
                                                                            $selected ="selected";
                                                                           else
                                                                            $selected ="";
                                                                          ?>
                                                                          <option value={{$township->id}}" <?=$selected?>>{{$township->name}}
                                                                          </option>
                                                                      <?php }} ?>
                                                                   </select>
                                                                    <div id="townshipError" class="error"></div>
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="address">Address</label>
                                                                   <input type="text" class="form-control" name="address" id="address" value="<?= $company->address ?>">
                                                               </div>
                                                                <div class="form-group">
                                                                   <label for="opening_hour">Opening hour:</label><span class="text-error-danger"> * </span>
                                                                   <input type="time" class="form-control" name="business_opening_hours" id="business_opening_hours" value="<?= $company->business_opening_hours ?>">
                                                               <div id="business_opening_hoursError" class="error"></div>
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="closing_hour">Closing hour:</label><span class="text-error-danger"> * </span>
                                                                  <input type="time" class="form-control" name="business_closing_hours" id="business_closing_hours" value="<?= $company->business_closing_hours ?>">
                                                                <div id="business_closing_hoursError" class="error"></div>
                                                               </div>
                                                               <!--
                                                               <div class="form-group">
                                                                   <label for="business_days"></label>
                                                                   <select id="package_plan" class="form-control" name="package_plan">
                                                                       <option disabled="disabled" selected="selected">Package</option>
                                                                       <?php 
                                                                       foreach($package_plans as $package_plan){
                                                                        if($company->active_package_plan_id == $package_plan->id)
                                                                          $selected = "selected";
                                                                         else
                                                                           $selected ="";
                                                                         ?>
                                                                       <option value=<?= $package_plan->id ?> <?=$selected?> >{{$package_plan->name}}</option>
                                                                      <?php } ?>
                                                                   </select>
                                                               </div>
                                                             -->
                                                           </div>

                                                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                               <div class="form-group">
                                                                   <label for="business_days">Business Days</label><span class="text-error-danger"> * </span>
                                                                  <input type="text" class="form-control" name="business_days" id="business_days" value="<?= $company->business_days ?>">
                                                                   <div id="business_daysError" class="error"></div>
                                                               </div>                                                                
                                                               <div class="form-group">
                                                                   <label for="website">Website</label>
                                                                   <input type="text" class="form-control" name="website" placeholder="https://myanbox.com.mm" value="<?= $company->website ?>" id="website">
                                                               </div>
                                   
                                            <div class="form-group">
                                                                    <label for="description">Description</label><span class="text-error-danger"> * </span>
                                                                    <textarea name="description" class="form-control">
                                                                     <?= $company->description?>
                                                                    </textarea>
                                                                     <div id="descriptionError" class="error"></div>
                                                               </div>
                                     <div class="form-group">
                                    <label for="service">What We Do</label>
                                    <textarea name="service" id="service" class="summernote">
                                        <?= $company->service ?>
                                        </textarea>
                                       </div>
                            <input type="hidden" name="parent_category_id" value="{{ $parent_category_id }}">
                                         <div class="form-group">
                                    <label for="vission">Vission</label>
                                    <textarea name="vission" id="vission" class="summernote">
                                        <?= $company->vission ?>
                                        </textarea>
                                       </div>
                                                               <input type="hidden" name="information_type" value="basic">
                                                           </div>
                                                       </div>
                                                       <div class="row">
                                                         <div class="col-lg-12 col-md-12">
                                                          <div class="form-group">
                                                             <label for="category">Categories :</label>
                                                             @foreach($categories as $category)
                                                             <?php 
                                                             if(in_array($category->id, $category_arr))
                                                                $checked = "checked";
                                                             else
                                                                $checked = "";
                                                              ?>
                                                             <input type="checkbox" value="<?= $category->id ?>" name="category[]" class="category" <?= $checked ?>><?= $category->name ?>
                                                             @endforeach
                                                          </div>
                                                         </div>
                                                       </div>
                                                       <div class="row">
                                                           <div class="col-lg-12">
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
                               <!--<div class="product-tab-list tab-pane fade pb-150" id="cover_photo_change">-->
                               <!--    <div class="row jumbotron">-->
                               <!--        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
                               <!--            <div class="review-content-section">-->
                               <!--                     <div class="error">-->
                               <!--                      </div>-->
                               <!--                        <div class="devit-card-custom">-->
                               <!--                         <form id="changecoverphotoForm">-->
                               <!--                        {{csrf_field()}}-->
                               <!--                          <div class="row">-->
                               <!--                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
                               <!--                              <div class="form-group">-->
                               <!--                                     <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md-1">Upload Cover Photo</button>-->
                               <!--                                     <div id="current_cover_photo"></div>-->
                               <!--                               </div>-->
                               <!--                           </div>-->
                               <!--                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
                               <!--                              <div class="form-group">-->
                               <!--                                     <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md-2">Upload Logo</button>-->
                               <!--                                     <div id="current_logo_photo"></div>-->
                               <!--                               </div>-->
                               <!--                               <input type="hidden" name="information_type" value="cover_photo">-->
                               <!--                           </div>-->
                               <!--                          </div>-->
                               <!--                           <div class="row">-->
                               <!--                            <div class="col-lg-12">-->
                               <!--                                <div class="payment-adress">-->
                               <!--                                    <input type="submit" id="basic_add_btn" class="btn btn-primary waves-effect waves-light" value="Change">-->
                               <!--                                </div>-->
                               <!--                            </div>-->
                               <!--                        </div>-->
                               <!--                    </form>-->
                               <!--                 </div>-->
                               <!--            </div>-->
                               <!--        </div>-->
                               <!--    </div>-->
                               <!--</div>-->
                               <div class="product-tab-list tab-pane fade pb-150" id="account">
                                   <div class="row jumbotron">
                                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                           <div class="review-content-section">
                                               <div class="row">
                                                   <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                                                    <div class="error">
                                                    </div>
                                                       <div class="devit-card-custom">
                                                        <form id="accountForm">
                                                       {{csrf_field()}}
                                                           <div class="form-group">
                                                               <label for="old password">Old Password:</label><span class="text-error-danger"> * </span>
                                                               <input type="password" class="form-control" name="old_password" placeholder="Old Password" id="old_password">
                                                                 <div id="old_passwordError" class="error"></div>
                                                           </div>
                                                           <div class="form-group">
                                                               <label for="new password">New Password:</label><span class="text-error-danger"> * </span>
                                                               <input type="password" name="new_password" class="form-control" placeholder="New Password" id="new_password">
                                                                 <div id="new_passwordError" class="error"></div>
                                                           </div>
                                                           <div class="form-group">
                                                                <label for="old password">Confirm Password:</label><span class="text-error-danger"> * </span>
                                                               <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" value="" id="confirm_password">
                                                           <div id="confirm_passwordError" class="error"></div>
                                                           </div>
                                                           <input type="hidden" name="information_type" value="account">
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="row">
                                                   <div class="col-lg-12">
                                                       <div class="payment-adress">
                                                           <button id="basic_add_btn_account" type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                                       </div>
                                                   </div>
                                               </div>
                                              </form>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="product-tab-list tab-pane fade pb-150" id="social">
                                   <div class="row jumbotron">
                                       <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                                           <div class="review-content-section">
                                               <div class="row">
                                                   <div class="col-lg-12">
                                                    <div class="error">
                                                    </div>
                                                       <div class="devit-card-custom">
                                                        <form id="socialForm" name="socialForm">
                                                         {{csrf_field()}}
                                                           <div class="form-group">
                                                                <label for="Fackbook Link">Facebook Link:</label><span class="text-error-danger"> * </span>
                                                               <input type="url" class="form-control" placeholder="https://facebook.com" value="<?=$company->facebook?>" name="facebook" id="facebook">
                                                           <div id="facebookError" class="error"></div>
                                                           </div>
                                                           <div class="form-group">
                                                                <label for="Twitter Link">Twitter Link:</label>
                                                               <input type="url" class="form-control" placeholder="https://twitter.com" value="<?= $company->twitter?>" name="twitter" id="twitter">
                                                           </div>
                                                           <div class="form-group">
                                                                 <label for="Google Plus Link">Google Plus Link:</label>
                                                               <input type="url" class="form-control" placeholder="https://myaccount.google.com/profile?" value="<?= $company->googleplus?>" name="googleplus" id="googleplus">
                                                           </div>
                                                           <div class="form-group">
                                                                <label for="linkedin">Linkedin Link:</label>
                                                               <input type="url" class="form-control" placeholder="https://www.linkedin.com/in/yourname" value="<?= $company->linkedin?>" name="linkedin" id="linkedin">
                                                           </div>
                                                           <input type="hidden" name="information_type" value="social">
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="row">
                                                   <div class="col-lg-12">
                                                       <div class="payment-adress">
                                                           <button id="basic_add_btn_social" type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
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
       </div>
       <!--image upload-modal start-->
            <div class="modal fade bs-example-modal-md-1 " tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                       <form id="coverphotoForm">
                         <div class="form-group">
                              <center>
                                <input type="file" id="image_file" name="cover_photo">
                              </center>
                              <div id="cover_photo"></div>
                          </div> 
                     </form>
            <p>
              <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-image" data-dismiss="modal" aria-label="Close">Upload </button>
            </p>
          </div>
        </div>
      </div>
 <!--image upload-modal start-->
    <div class="modal fade bs-example-modal-md-2 " tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
         <form id="LogoForm">
           <div class="form-group">
                <center>
                  <input type="file" id="logo_image_file" name="logo_photo">
                </center>
                <div id="logo_photo"></div>
            </div> 
       </form>
        <p>
          <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-logo" data-dismiss="modal" aria-label="Close">Upload </button>
        </p>
      </div>
    </div>
</div>
<!--image upload-modal end-->

        <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
        <script type="text/javascript">
         /*function for get township id according to city */
           function getTownshipByCity(city){
            var option = "";
               $.ajax({
                   type : 'get',
                   url : "{{ URL :: route('location.getTownship')}}",
                   data : {'city_id':city},
                   success : function(data){
                       for(var i=0; i<data.length;i++){
                           option += '<option value="'+ data[i].id+'">'+ data[i].name+'</option>';
                       }
                       $("#township").html(option);

                   },
                   error:function(e)
                   {
                       console.log(e)
                   }
               });
           }
         /* City onchange event */
           $('#city').change(function(){
              getTownshipByCity($(this).val());
           });

           $(document).ready(function(){    
              getHourMin('#business_opening_hours');
              getHourMin('#business_closing_hours');

              function getHourMin(time){
                  var business_hour=$(time).attr('value');
                  var business_hour_arr = business_hour.split(" ");
                  var am_pm = business_hour_arr[1];
                  var hour_min = business_hour_arr[0].split(':');
                  var hr = parseInt(hour_min[0]);
                  var min = hour_min[1];
                  if(am_pm =="PM")
                  {
                    hr += 12;
                  }
                  if(hr <12)
                  {
                    hr = "0"+hr;
                  }
                   $(time).each(function(){ 
                       $(time).attr({'value': hr + ':' + min});
                     });
              }
              /* Township data bind */
               var city_id = $('#city').val();
               if(city_id >=0){
                getTownshipByCity(city_id);
               }
               /* bind image */ 
               var img = '<?php echo url('storage/company_coverphoto/'.$company->cover_photo) ?>';
               var image_name = '<?php echo $company->cover_photo ?>';
               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_cover_photo").html(html);


               var logo = '<?php echo asset('storage/company_logo/'.$company->user->logo) ?>';
               var logo_name = '<?php echo $company->user->logo ?>';
               html = '<img alt="'+logo_name+'" src="' + logo + '" />';
                $("#current_logo_photo").html(html);

               //Image Cropping

               /* image crop */
               var resize1 = $('#logo_photo').croppie({
                enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 420,
                    height: 280,
                    type: 'square' //circle
                },
                boundary: {
                    width: 430,
                    height: 290
                }
            });


            $('#logo_image_file').on('change', function () { 
              var reader1 = new FileReader();
                reader1.onload = function (e) {
                  resize1.croppie('bind',{
                    url: e.target.result
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
                }
                reader1.readAsDataURL(this.files[0]);
            });

             $('.upload-logo').on('click', function (ev) {
              resize1.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
               // html = '<img src="' + img + '" />';
               // $("#logo_photo").html(html);
                 $.ajax({
                   url: "{{route('croppie.upload-image')}}",
                   type: "POST",
                   data: {"image":img,'path':"company_logo"},
                   dataType: 'json',
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success: function (data) {
                    html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                    $("#current_logo_photo").html(html);   
                   },
                   error:function(e){
                    console.log(e)
                   }
                 });
              });
            });
              /* image crop */
               var resize = $('#cover_photo').croppie({
                enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 1600,
                    height: 230,
                    type: 'square' //circle
                },
                boundary: {
                    width: 800,
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
            });

            $('.upload-image').on('click', function (ev) {
              resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
               // html = '<img src="' + img + '" />';
               // $("#cover_photo").html(html);
                 $.ajax({
                   url: "{{route('croppie.upload-image')}}",
                   type: "POST",
                   data: {"image":img,"path":"company_coverphoto"},
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
             
          }); 


            $('form#basicForm').on('submit',function(e){
                var name    =$('#name').val();
                var phone   = $('#phone').val();
                var vission = $('#vission').summernote('code');
                // var description = $('#description').summernote('code');
                var service = $('#service').summernote('code'); 
                
              
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('companies.update',$company->id) }}",
                      data: $('#basicForm').serialize()+"&vission="+vission+"&service="+service,
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          if($.isEmptyObject(data.errors)){
                               $("#basic_add_btn").attr('disabled','disabled');
                                setTimeout(function() {
                                  $this.removeAttr('disabled');
                               }, 3000);


                                var message = data.success;
                                 callbackSuccess(message);
                                //alert(data.success);
                          }
                          else{
                              console.log(data.errors); 
                              
                               if($.isEmptyObject(data.errors.description)){ 
                                  $('#descriptionError').html("");
                                  $("textarea[name=description]").removeClass('error-messageborder');
                              }else{
                                   $('#descriptionError').html(data.errors.description);
                                   $("textarea[name=description]").addClass('error-messageborder');
                              }
                               
                               
                               if($.isEmptyObject(data.errors.email)){ 
                                  $('#emailError').html("");
                                  $("input[name=email]").removeClass('error-messageborder');
                              }else{
                                   $('#emailError').html(data.errors.email);
                                   $("input[name=email]").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.name)){ 
                                  $('#nameError').html("");
                                  $("input[name=name]").removeClass('error-messageborder');
                              }else{
                                   $('#nameError').html(data.errors.name);
                                   $("input[name=name]").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.township)){ 
                                  $('#townshipError').html("");
                                  $("select[name=township]").removeClass('error-messageborder');
                              }else{
                                   $('#townshipError').html(data.errors.township);
                                   $("select[name=township]").addClass('error-messageborder');
                              }
                               if($.isEmptyObject(data.errors.business_days)){ 
                                  $('#business_daysError').html("");
                                  $("input[name=business_days]").removeClass('error-messageborder');
                              }else{
                                   $('#business_daysError').html(data.errors.business_days);
                                   $("input[name=business_days]").addClass('error-messageborder');
                              }
                                if($.isEmptyObject(data.errors.city)){ 
                                  $('#cityError').html("");
                                  $("select[name=city]").removeClass('error-messageborder');
                              }else{
                                   $('#cityError').html(data.errors.city);
                                   $("select[name=city]").addClass('error-messageborder');
                              }
                               if($.isEmptyObject(data.errors.business_opening_hours)){ 
                                  $('#business_opening_hoursError').html("");
                                  $("input[name=business_opening_hours]").removeClass('error-messageborder');
                              }else{
                                   $('#business_opening_hoursError').html(data.errors.business_opening_hours);
                                   $("input[name=business_opening_hours]").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.business_closing_hours)){ 
                                  $('#business_closing_hoursError').html("");
                                  $("input[name=business_closing_hours]").removeClass('error-messageborder');
                              }else{
                                   $('#business_closing_hoursError').html(data.errors.business_closing_hours);
                                   $("input[name=business_closing_hours]").addClass('error-messageborder');
                              }
                             // printErrorMsg(data.errors);
                          } 
                         // location.reload();
                          
                       },
                      error:function(e)
                      {
                          var message = "Something Wrong!";
                                 callbackWarning(message);
                        // alert('something Wrong');

                      }
                    });
              });
            $('form#changecoverphotoForm').on('submit',function(e){
                var image     = $('#current_cover_photo img').attr('alt');
                var logo      = $('#current_logo_photo img').attr('alt');
                var old_cover_photo ='<?php echo $company->cover_photo ?>';
                var old_logo_name = '<?php echo $company->user->logo ?>';
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('companies.update',$company->id) }}",
                      data: $('#changecoverphotoForm').serialize()+"&cover_photo="+image+"&logo="+logo+"&old_cover_photo="+old_cover_photo+"&old_logo="+old_logo_name,
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          
                          if($.isEmptyObject(data.errors)){
                               var message = data.success;
                                var url = window.location.href;
                                 callbackURL(message,url);
                                 /*
                            alert(data.success);
                            location.reload();*/
                          }
                          else{
                              printErrorMsg(data.errors);
                          }
                       },
                      error:function(e)
                      {
                          console.log(e);
                         //alert('Something Wrong');
                      }
                    });
              });
             $('form#accountForm').on('submit',function(e){
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('companies.update',$company->id) }}",
                      data: $('#accountForm').serialize(),
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          
                               
                          if($.isEmptyObject(data.errors)){
                              
                               $('input').removeClass('error-messageborder'); 
                               
                                  $("#basic_add_btn_account").attr('disabled','disabled');
                                setTimeout(function() {
                                  $this.removeAttr('disabled');
                               }, 3000);
                               
                               var message = data.success;
                               var url = location.reload();
                                 callbackSuccess(message);
                                  location.reload();
                                //   $('#account').removeClass('error-messageborder');
                                // $('#old_passwordError').html("");
                                // $('#new_passwordError').html("");
                                // $('#confirm_passwordError').html("");
                                 
                                 
                           /* alert(data.success);
                            location.reload(); */
                          }
                          else{
                             // printErrorMsg(data.errors);
                             
                             //console.log(data.errors);
                             
                             
                             
                              if($.isEmptyObject(data.errors.old_password)){ 
                                  $('#old_passwordError').html("");
                                  $("input[name=old_password]").removeClass('error-messageborder');
                              }else{
                                   $('#old_passwordError').html(data.errors.old_password);
                                   $("input[name=old_password]").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.new_password)){ 
                                  $('#new_passwordError').html("");
                                  $("input[name=new_password]").removeClass('error-messageborder');
                              }else{
                                   $('#new_passwordError').html(data.errors.new_password);
                                   $("input[name=new_password]").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.confirm_password)){ 
                                  $('#confirm_passwordError').html("");
                                  $("input[name=confirm_password]").removeClass('error-messageborder');
                              }else{
                                   $('#confirm_passwordError').html(data.errors.confirm_password);
                                   $("input[name=confirm_password]").addClass('error-messageborder');
                              }
                               if($.isEmptyObject(data.errors)){ 
                                  $('#old_passwordError').html("");
                                  $("input[name=old_password]").removeClass('error-messageborder');
                              }else{
                                   $('#old_passwordError').html(data.errors);
                                   $("input[name=old_password]").addClass('error-messageborder');
                              }
                          } 
                       },
                      error:function(e)
                      {
                          var message = "Something Wrong!";
                                 callbackWarning(message);
                      }
                    });
              });
              $('form#socialForm').on('submit',function(e){
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('companies.update',$company->id) }}",
                      data: $('#socialForm').serialize(),
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          
                          
                          if($.isEmptyObject(data.errors)){
                                 $("#basic_add_btn_social").attr('disabled','disabled');
                                setTimeout(function() {
                                  $this.removeAttr('disabled');
                               }, 3000);
                              
                             var message = data.success;
                               var url = window.location.href;
                                 callbackSuccess(message);
                          }
                          else{
                            //  printErrorMsg(data.errors);
                              if($.isEmptyObject(data.errors.facebook)){ 
                                  $('#facebookError').html("");
                                  $("input[name=facebook]").removeClass('error-messageborder');
                              }else{
                                   $('#facebookError').html(data.errors.facebook);
                                   $("input[name=facebook]").addClass('error-messageborder');
                              }
                          }
                       },
                      error:function(e)
                      {
                         var message = "Something Wrong!";
                                 callbackWarning(message);
                      }
                    });
              });
               function printErrorMsg (msg) {
                   var message="";
                   if($(msg).length >1){
                     message +='<ul class="alert alert-danger">';
                     $.each(msg, function( key, value ) {
                      message += '<li>'+value+'</li>';
                   }); 
                    message +='</ul>';
                  $(".error").html(message);
                }
                else{
                   message = '<span class="alert alert-danger">'+msg+'</span>';
                   $(".error").html(message);               
                  } 
            }          
       </script>
@endsection
