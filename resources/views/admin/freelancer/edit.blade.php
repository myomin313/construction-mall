@extends('layouts.freelancer_panel')
@section('content')
         <!-- Single pro tab review Start-->
         <body class="freelancers">
          <div class="page-wrapper">
              <!-- <div class="preloader"></div> -->
              @include('element.header')
               <section class="inner-heading"  style="background: url('{{ asset('storage/freelancer/'.$projectsetting->freelancer_detail_image)}}') 100%;">
    <div class="container">
    <h1>{{ $freelancer->name }}</h1>
      <ul class="xs-breadcumb">
        <li><a href="{{ url('/professionals')}}" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;">Professionals / </a><a href="{{ url('/professionals') }}" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"> </a> {{ auth()->user()->name }}</li>
      </ul>
    </div>
  </section>
              <section class="inner-wrap">
                <!-- start -->
                <div class="container">
                <div class="row">
                                <div class="product-tab-list tab-pane fade active in" id="profile">
                                    <div class="row">
                                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                @if(empty($freelancer->freelancer_status_id))
                                       <p class="text-center"><span  class="text-error-danger">*</span>  Please fill required information  in order to show public your profile. <span class="text-error-danger">*</span></p>
                                @endif
                                         </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    <form action="#" class="dropzone dropzone-custom needsclick add-professors"  id="basicForm">
                                                        {{csrf_field()}}
                                                          <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Name</label><span class="text-error-danger"> * </span>
                                                                    <input name="name" id="name" type="text" class="form-control edit_name" value="{{ auth()->user()->name }}" placeholder="Name">
                                                                   <div id="freelancernameError" class="error"></div>
                                                                </div>
                                                                </div>
                                                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                  <div class="form-group">
                                                                 <label>Phone</label><span class="text-error-danger"> * </span>
                                                                    <input name="phone" id="phone" type="text" class="form-control edit_phone" value="{{ auth()->user()->phone }}" placeholder="Phone">
                                                                     <div id="phoneError" class="error"></div>
                                                                </div>
                                                             </div>
                                                             </div>
                                                             <div class="row">
                                                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                                                             <div class="form-group">
                                                                    <label>Date Of Birth</label>
                                                                    <input class="form-control" type="text" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" value="{{ $freelancer->date_of_birth }}">
                                                                 </div>
                                                                 </div>
                                                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                                                                  <div class="form-group">
                                                                    <label>NRC</label>
                                                                    <input type="text" id="nrc" class="form-control" name="nrc" value="{{ $freelancer->nrc }}" placeholder="NRC">
                                                                </div> 
                                                                </div>
                                                                </div>
                                                                <div class="row">
                                                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>City</label>
                                                                    <select class="form-control" id="city_id" name="city_id">
                                                                        <?php
                                                                        foreach($cities as $city){
                                                                        if(!empty($freelancer_city->id))
                                                                        if($freelancer_city->id == $city->id)
                                                                            $selected ="selected";
                                                                           else
                                                                            $selected ="";
                                                                        else
                                                                          $selected ="";
                                                                          ?>
                                                                       <option value={{$city->id}} <?=$selected?>>{{$city->name}}</option>
                                                                      <?php } ?>
                                                                    </select>
                                                                </div>
                                                                </div> 
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                 <div class="form-group">
                                                                    <label>Township</label><span class="text-error-danger"> * </span>
                                                                    <select class="form-control edit_townshipid" id="township_id" name="township_id">
                                                                        <option value="">Township</option>
                                                                        <?php
                                                                        foreach($townships as $township){
                                                                           if($township->id == $freelancer->location_id)
                                                                            $selected ="selected";
                                                                           else
                                                                            $selected ="";
                                                                          ?>
                                                                          <option value={{ $township->id}}" <?=$selected?>>{{$township->name}}
                                                                          </option>
                                                                      <?php } ?>
                                                                    </select>
                                                                     <div id="township_idError" class="error"></div>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                 <div class="form-group">
                                                                    <label>Address</label>
                                                                  <input type="text" class="form-control" id="freelancer_address" name="address" placeholder="address" value="{{ $freelancer->address }}">
                                                                </div>
                                                                </div>
                                                                
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                                                                <div class="form-group">
                                                                    <label>Category</label><span class="text-error-danger"> * </span>
                                                                    <select class="form-control edit_freelancer_category_id" id="freelancer_category_id" name="freelancer_category_id">
                                                                    <option value="">Category</option>
                                                                        <?php
                                                                        foreach($freelancercategories as $category){
                                                                        if(!empty($freelancer->category_id))
                                                                        if($freelancer->category_id == $category->id)
                                                                            $selected ="selected";
                                                                           else
                                                                            $selected ="";
                                                                        else
                                                                          $selected ="";
                                                                          ?>
                                                                       <option value={{$category->id}} <?=$selected?>>{{$category->name }}</option>
                                                                      <?php } ?>
                                                                    </select>
                                                                     <div id="freelancer_category_idError" class="error"></div>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                 <div class="form-group">
                                                                    <label>Freelancer Status</label><span class="text-error-danger"> * </span>
                                                                    <select class="form-control edit_freelancer_status_id" id="freelancer_status_id" name="freelancer_status_id">
                                                                        <option value="">Freelancer Status</option>
                                                                        <?php
                                                                        foreach($freelancer_statuses as $freelancer_status){
                                                                        if(!empty($freelancer->freelancer_status_id))
                                                                        if($freelancer->freelancer_status_id == $freelancer_status->id)
                                                                            $selected ="selected";
                                                                           else
                                                                            $selected ="";
                                                                           else
                                                                            $selected ="";
                                                                          ?>
                                                                       <option value={{$freelancer_status->id}} <?=$selected?>>{{$freelancer_status->freelancer_status_name}}</option>
                                                                      <?php } ?>
                                                                    </select>
                                                                     <div id="freelancer_status_idError" class="error"></div>
                                                                </div>
                                                                </div>
                                                               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                  <div class="form-group">
                                                                     <label>Total Experience</label>
                                                                      <input type="number" id="total_experiences" class="form-control" placeholder="Total Experiences" name="total_experiences" value="{{ $freelancer->total_experiences }}">
                                                                     <div  class="error"></div>
                                                                  </div>
                                                                </div>
                                                                </div>
                                                                <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Current Works</label>
                                                                    <input type="text" class="form-control edit_current_work_status" placeholder="Current Works" id="current_work_status" name="current_work_status"  value="{{ $freelancer->current_work_status }}">
                                                                    <div  class="error"></div>
                                                                   <!--  <div id="current_work_statusError" class="error"></div> -->
                                                                </div>
                                                                </div>
                                                                
                                                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Currently Wroking Company Name</label>
                                                                    <input type="text" class="form-control" id="freelancer_company" name="freelancer_company" placeholder="company name" value="{{ $freelancer->freelancer_company }}">
                                                                    <div  class="error"></div>
                                                                </div>
                                                               </div>  
                                                               </div>
                                                               <div class="row">
                                                               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                               <div class="form-group">
                                                                    <label>Currently Wroking company From this website</label>
                                                                    <select class="form-control" id="company_id" name="company_id">
                                                                        <option value="">Company Name</option>
                                                                        <?php
                                                                        
                                                                        foreach($companies as $company){
                                                                        if(!empty($freelancer->company_id))
                                                                        if($freelancer->company_id == $company->id)
                                                                            $selected ="selected";
                                                                           else
                                                                            $selected ="";
                                                                        else
                                                                          $selected ="";
                                                                          ?>
                                                                       <option value={{$company->id}} <?=$selected?>>{{$company->name}}</option>
                                                                      <?php } ?>
                                                                    
                                                                    </select>
                                                                     <div  class="error"></div>
                                                                </div>
                                                                </div>

                                                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                 <div class="form-group">
                                                                    <label>Facebook</label>
                                                                    <input type="text" class="form-control edit_facebook" id="facebook" name="facebook" placeholder="Eg.https://www.facebook.com/your_account_id" value="{{ $freelancer->facebook }}">
                                                                    <div id="facebookError" class="error"></div>
                                                                 </div>
                                                              </div>
                                                                </div>
                                                                <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Twitter</label>
                                                                    <input type="text" class="form-control edit_twitter" id="twitter" name="twitter" placeholder="Eg.http://twitter.com/username" value="{{ $freelancer->twitter }}">
                                                               <div id="twitterError" class="error"></div> 
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                               <div class="form-group">
                                                                <label>Website</label>
                                                                    <input type="text" class="form-control" id="website" name="website" placeholder="Eg.https://myanbox.com" value="{{ $freelancer->website }}">
                                                                     <div id="websiteError" class="error"></div>
                                                                </div>
                                                                </div>
                                                               </div>
                                                               <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Google Plus</label>
                                                                    <input type="text" class="form-control edit_googleplus" id="googleplus" name="googleplus" placeholder="Eg.http://www.google.com" value="{{ $freelancer->googleplus }}">
                                                                 <div id="googleplusError" class="error"></div>
                                                                </div> 
                                                                </div>
                                                                
                                                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Linkedin</label>
                                                                    <input type="text" class="form-control edit_linkedin" id="linkedin" name="linkedin" placeholder="Eg.https://www.linkedin.com/in/yourname" value="{{ $freelancer->linkedin }}">
                                                                 <div id="linkedinError" class="error"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                          <div class="row"> 
                                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                           <div class="form-group">
                                                        <label for="description">About me</label>
                                                    <textarea name="description" id="freelancer_description" class="summernote" >
                                                        <?php echo $freelancer->description; ?>
                                                        </textarea>
                                                        </div> 
                                                         </div>
                                                         </div>
                                                         

                                                         <input type="hidden" name="information_type" value="basic">
                                                        <div class="row" style="padding:20px">
                                                            <div class="col-lg-12" >
                                                                <div class="payment-adress" >
                                                                    <center>
                                                                    <button id="btn_basicform" type="submit" class="btn btn-standard waves-effect waves-light" >Update</button>
                                                                     </center>
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
                  <!-- </div> -->
                <!-- </div>
            </div>
        </div> -->
        <!-- start profile image pop up -->
        <!--image upload-modal start-->
      <!--      <div class="modal fade bs-example-modal-md-1 " tabindex="-1" role="dialog" id="uploadupdateModal">-->
      <!--              <div class="modal-dialog modal-lg" role="document">-->
      <!--                <div class="modal-content">-->
      <!--                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>-->
      <!--                  <h2 class="modal-title">Upload Profile Photo</h2>-->
      <!--                 <form id="profilephotoForm" enctype="multipart/form-data">-->
      <!--                   <div class="form-group">-->
      <!--                        <center>-->
      <!--                          <input type="file" id="image_file" name="profile_photo" accept="image/*">-->
      <!--                        </center>-->
      <!--                        <div id="profile_photo"></div>-->
      <!--                    </div> -->
      <!--               </form>-->
      <!--      <p>-->
      <!--        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-image" data-dismiss="modal" aria-label="Close">Upload Image</button>-->
      <!--      </p>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</div>-->

       <!--education-modal start-->
            <div class="modal fade bs-example-modal-md-1 " tabindex="-1" role="dialog" id="educationupdateModal">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Update Education</h2>
                     <div class="row">
                                                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                                                    
                                                        <form id="updateeducationForm">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            {{csrf_field()}}
                                                             <input type="hidden" name="information_type" value="education">
                                                            <input type="hidden" id="education_id" name="education_id" >
                                                            <div class="form-group"> 
                                                                
                                                                 <label>Subject Name</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_subjectname_modalEducation" placeholder="Subject name(eg.Law)" id="subject" value="" name="name">
                                                            <div id="nameEducationModalError" class="error"></div>
                                                             </div>
                                                            
                                                            <div class="form-group">
                                                                
                                                                 <label>University</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_university_modalEducation" name="university" placeholder="University(eg.Yangon University)" id="university" value="">
                                                            <div id="universityEducationModalError" class="error"></div>
                                                            </div>
                                                            
                                                         
                                                            <div class="form-group">
                                                                <label>From</label><span class="text-error-danger"> * </span>
                                                                <input type="month" class="form-control edit_from_date_modalEducation" name="from_date" id="education_from_date" placeholder="Eg.2020-01" value=""> 
                                                             <div id="from_dateEducationModalError" class="error"></div>
                                                            </div>
                                                      
                                                           </div>
                                                        <!-- </div> -->
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group"> 
                                                                 <label>Education Level</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_education_level_modalEducation" placeholder="Eg.BA" id="education_level" name="education_level" value="">
                                                                  <div id="education_levelEducationModalError" class="error"></div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Country</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_country_modalEducation" name="country" placeholder="Country(eg.myanmar)" id="country" value="">
                                                                 <div id="countryEducationModalError" class="error"></div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>To</label><span class="text-error-danger"> * </span>
                                                                  <input type="month" class="form-control edit_to_date_modalEducation" name="to_date" id="education_to_date" placeholder="Eg.2020-01" value="">
                                                           <div id="to_dateEducationModalError" class="error"></div>
                                                           </div>
                                                             </div>
                                                              <div class="row" style="padding:20px">
                                                            <div class="col-lg-12" >
                                                                <div class="payment-adress" >
                                                                    <button id="btn_updateeducationform" type="submit" class="btn btn-primary waves-effect waves-light" >Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                          </form>   
                                                    </div>
          </div>
        </div>
      </div>
  </div>
<!--education-modal end-->
                <!-- end -->
              </section>
            </div>
         </body>

     

      

        <!-- end profile image pop up -->
        <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
        
        <script type="text/javascript">

        
     
        $('form#basicForm').on('submit',function(e){
                var name    =$('#name').val();
                var phone   = $('#phone').val();
                var nrc     = $('#nrc').val();
                var location_id = $('#date_of_birth').val();
                var total_experiences = $('#total_experiences').val();
                var address = $('#freelancer_address').val();
                var current_work_status = $('#current_work_status').val();
                var freelancer_status_id=$('#freelancer_status_id').children("option:selected").val();
                var facebook = $('#facebook').val();
                var googleplus = $('#googleplus').val();
                var website = $('#website').val();
                var linkedin = $('#linkedin').val();
                var description = $('#freelancer_description').summernote('code');
                 description = description.replaceAll("&amp;", "and_char");
                e.preventDefault();
               $.ajax({
                      type: "post",
                       url: "{{ URL::route('freelancer.update') }}",
                      data: $('#basicForm').serialize()+"&description="+description,
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          if($.isEmptyObject(data.errors)){
                              var message = data.success;
                               var url="{{ route('freelancer.profile') }}";
                              // var url = window.location.href;
                                 callbackURL(message,url);
                                 
                           /* alert(data.success);
                            location.reload(); */
                          }
                          else{
                              console.log(data.errors)
                              if($.isEmptyObject(data.errors.name)){ 
                                  $('#freelancernameError').html("");
                                   $(".edit_name").removeClass('error-messageborder');
                              }else{
                                   $('#freelancernameError').html(data.errors.name);
                                   $(".edit_name").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.freelancer_category_id)){ 
                                  $('#freelancer_category_idError').html("");
                                   $(".edit_freelancer_category_id").removeClass('error-messageborder');
                              }else{
                                   $('#freelancer_category_idError').html(data.errors.freelancer_category_id);
                                   $(".edit_freelancer_category_id").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.township_id)){ 
                                  $('#township_idError').html("");
                                   $(".edit_townshipid").removeClass('error-messageborder');
                              }else{
                                   $('#township_idError').html(data.errors.township_id);
                                   $(".edit_townshipid").addClass('error-messageborder');
                              }
                               if($.isEmptyObject(data.errors.facebook)){ 
                                  $('#facebookError').html("");
                                   $(".edit_facebook").removeClass('error-messageborder');
                              }else{
                                   $('#facebookError').html(data.errors.facebook);
                                   $(".edit_facebook").addClass('error-messageborder');
                              }  
                              
                               if($.isEmptyObject(data.errors.twitter)){ 
                                  $('#twitterError').html("");
                                   $(".edit_twitter").removeClass('error-messageborder');
                              }else{
                                   $('#twitterError').html(data.errors.twitter);
                                   $(".edit_twitter").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.googleplus)){ 
                                  $('#googleplusError').html("");
                                   $(".edit_googleplus").removeClass('error-messageborder');
                              }else{
                                   $('#googleplusError').html(data.errors.googleplus);
                                   $(".edit_googleplus").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.linkedin)){ 
                                  $('#linkedinError').html("");
                                   $(".edit_linkedin").removeClass('error-messageborder');
                              }else{
                                   $('#linkedinError').html(data.errors.linkedin);
                                   $(".edit_linkedin").addClass('error-messageborder');
                              }
                              
                               if($.isEmptyObject(data.errors.freelancer_status_id)){ 
                                  $('#freelancer_status_idError').html("");
                                   $(".edit_freelancer_status_id").removeClass('error-messageborder');
                              }else{
                                   $('#freelancer_status_idError').html(data.errors.freelancer_status_id);
                                   $(".edit_freelancer_status_id").addClass('error-messageborder');
                              }
                              
                                if($.isEmptyObject(data.errors.phone)){ 
                                  $('#phoneError').html("");
                                   $(".edit_phone").removeClass('error-messageborder');
                              }else{
                                   $('#phoneError').html(data.errors.phone);
                                   $(".edit_phone").addClass('error-messageborder');
                              }
                             // printErrorMsg(data.errors);
                             
                          } 
                       },
                      error:function(e)
                      {
                         var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });


            $('form#changeprofilephotoForm').on('submit',function(e){
                var image     = $('#current_profile_photo img').attr('alt');
                var old_image="<?php echo $freelancer->user->logo ?>";

                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update') }}",
                      data: $('#changeprofilephotoForm').serialize()+"&profile_photo="+image+"&old_profile_photo"+old_image,
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
                          }
                          else{
                              printErrorMsg(data.errors);
                          }
                       },
                      error:function(e)
                      {
                           var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });

            // $('form#accountForm').on('submit',function(e){
            //     e.preventDefault();
            //    $.ajax({
            //           type: "post",
            //           url: "{{ URL::route('freelancer.update') }}",
            //           data: $('#accountForm').serialize(),
            //           dataType: 'json',
            //           headers: {
            //               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //           },
            //           success:function(data)
            //           {
                        
            //               if($.isEmptyObject(data.errors)){
            //                 alert(data.success);
            //               }
            //               else{
            //                   printErrorMsg(data.errors);
            //               } 
            //            },
            //           error:function(e)
            //           {
            //              alert('Something Wrong');
            //           }
            //         });
            //   });
            
               $('form#educationForm').on('submit',function(e){
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update') }}",
                      data: $('#educationForm').serialize(),
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {   
                          if($.isEmptyObject(data.errors)){
                             // console.log("hi");
                                var message = data.success;
                                var url = window.location.href;
                                 callbackURL(message,url);
                          }
                          else{     
                              console.log(data.errors);  
                              
                              //printErrorMsg(data.errors);
                              if($.isEmptyObject(data.errors.name)){ 
                                  $('#nameError').html("");
                                   $(".edit_subjectname").removeClass('error-messageborder');
                              }else{
                                   $('#nameError').html(data.errors.name);
                                   $(".edit_subjectname").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.education_level)){ 
                                  $('#education_levelError').html("");
                                   $(".edit_education_level").removeClass('error-messageborder');
                              }else{
                                   $('#education_levelError').html(data.errors.education_level);
                                   $(".edit_education_level").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.university)){ 
                                  $('#universityError').html("");
                                    $(".edit_university").removeClass('error-messageborder');
                              }else{
                                   $('#universityError').html(data.errors.university);
                                   $(".edit_university").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.country)){ 
                                  $('#countryError').html("");
                                    $(".edit_country").removeClass('error-messageborder');
                              }else{
                                   $('#countryError').html(data.errors.country);
                                   $(".edit_country").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.from_date)){ 
                                  $('#from_dateError').html("");
                                    $(".edit_from_date").removeClass('error-messageborder');
                              }else{
                                   $('#from_dateError').html(data.errors.from_date);
                                   $(".edit_from_date").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.to_date)){ 
                                  $('#to_dateError').html("");
                                    $(".edit_to_date").removeClass('error-messageborder');
                              }else{
                                   $('#to_dateError').html(data.errors.to_date);
                                   $(".edit_to_date").addClass('error-messageborder');
                              }
                          } 
                       },
                      error:function(e)
                      { 
                                var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });

               $('form#projectForm').on('submit',function(e){
                 var project_detail = $('#project_detail').summernote('code');
                  project_detail = project_detail.replaceAll("&amp;", "and_char");
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update') }}",
                      data: $('#projectForm').serialize()+"&project_detail="+project_detail,
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
                          }
                          else{
                              console.log(data.errors);
                              //printErrorMsg(data.errors);
                               if($.isEmptyObject(data.errors.company_name)){ 
                                  $('#edit_company_name_proError').html("");
                                   $(".edit_company_name_pro").removeClass('error-messageborder');
                              }else{
                                   $('#edit_company_name_proError').html(data.errors.company_name);
                                   $(".edit_company_name_pro").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.project_detail)){ 
                                  $('#edit_project_detail_proError').html("");
                                    $(".edit_project_detail_pro").removeClass('error-messageborder');
                              }else{
                                   $('#edit_project_detail_proError').html(data.errors.project_detail);
                                   $(".edit_project_detail_pro").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.project_end_date)){ 
                                  $('#edit_project_end_date_proError').html("");
                                    $(".edit_project_end_date_pro").removeClass('error-messageborder');
                              }else{
                                   $('#edit_project_end_date_proError').html(data.errors.project_end_date);
                                   $(".edit_project_end_date_pro").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.project_name)){ 
                                  $('#edit_project_name_proError').html("");
                                    $(".edit_project_name_pro").removeClass('error-messageborder');
                              }else{
                                   $('#edit_project_name_proError').html(data.errors.project_name);
                                   $(".edit_project_name_pro").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.project_start_date)){ 
                                  $('#edit_project_start_date_proError').html("");
                                    $(".edit_project_start_date_pro").removeClass('error-messageborder');
                              }else{
                                   $('#edit_project_start_date_proError').html(data.errors.project_start_date);
                                   $(".edit_project_start_date_pro").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.project_link)){ 
                                  $('#linkError').html("");
                                    $(".edit_link_project").removeClass('error-messageborder');
                              }else{
                                   $('#linkError').html(data.errors.project_link);
                                   $(".edit_link_project").addClass('error-messageborder');
                              }
                          } 
                       },
                      error:function(e)
                      {
                         var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });

               // start 
                 $('form#updateexperienceForm').on('submit',function(e){
                 var description = $('#update_experience_description').summernote('code');
                 description = description.replaceAll("&amp;", "and_char");
                          
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update_experience') }}",
                      data: $('#updateexperienceForm').serialize()+"&description="+description,
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {      console.log(data);
                   
                          if($.isEmptyObject(data.errors)){ 
                               var message = data.success; 
                              var url = window.location.href;
                                  callbackURL(message,url);
                          }
                          else{
                              //printErrorMsg(data.errors);
                               if($.isEmptyObject(data.errors.company)){ 
                                  $('#_companynameError').html("");
                                       $(".edit_company_modal").removeClass('error-messageborder');
                              }else{
                                   $('#_companynameError').html(data.errors.company);
                                   $(".edit_company_modal").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.from_date)){ 
                                  $('#_from_dateforexperienceError').html("");
                                   $(".edit_from_date_modal").removeClass('error-messageborder');
                              }else{
                                   $('#_from_dateforexperienceError').html(data.errors.from_date);
                                   $(".edit_from_date_modal").addClass('error-messageborder');
                              }
                              
                               if($.isEmptyObject(data.errors.to_date)){ 
                                  $('#_to_dateforexperienceError').html("");
                                   $(".edit_to_date_modal").removeClass('error-messageborder');
                              }else{
                                   $('#_to_dateforexperienceError').html(data.errors.to_date);
                                   $(".edit_to_date_modal").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.position)){ 
                                  $('#_positionforexperienceError').html("");
                                    $(".edit_position_modal").removeClass('error-messageborder');
                              }else{
                                   $('#_positionforexperienceError').html(data.errors.position);
                                   $(".edit_position_modal").addClass('error-messageborder');
                              }
                          } 
                       },
                      error:function(e)
                      {
                          var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });
              
               $('form#updateeducationForm').on('submit',function(e){
                // var description = $('#desc').summernote('code');
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update_education') }}",
                      data: $('#updateeducationForm').serialize(),
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
                          }
                          else{
                              console.log(data.errors);
                             // printErrorMsg(data.errors);
                              if($.isEmptyObject(data.errors.name)){ 
                                  $('#nameEducationModalError').html("");
                                   $(".edit_subjectname_modalEducation").removeClass('error-messageborder');
                              }else{
                                   $('#nameEducationModalError').html(data.errors.name);
                                   $(".edit_subjectname_modalEducation").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.education_level)){ 
                                  $('#education_levelEducationModalError').html("");
                                   $(".edit_education_level_modalEducation").removeClass('error-messageborder');
                              }else{
                                   $('#education_levelEducationModalError').html(data.errors.education_level);
                                   $(".edit_education_level_modalEducation").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.university)){ 
                                  $('#universityEducationModalError').html("");
                                    $(".edit_university_modalEducation").removeClass('error-messageborder');
                              }else{
                                   $('#universityEducationModalError').html(data.errors.university);
                                   $(".edit_university_modalEducation").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.country)){ 
                                  $('#countryEducationModalError').html("");
                                    $(".edit_country_modalEducation").removeClass('error-messageborder');
                              }else{
                                   $('#countryEducationModalError').html(data.errors.country);
                                   $(".edit_country_modalEducation").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.from_date)){ 
                                  $('#from_dateEducationModalError').html("");
                                    $(".edit_from_date_modalEducation").removeClass('error-messageborder');
                              }else{
                                   $('#from_dateEducationModalError').html(data.errors.from_date);
                                   $(".edit_from_date_modalEducation").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.to_date)){ 
                                  $('#to_dateEducationModalError').html("");
                                    $(".edit_to_date_modalEducation").removeClass('error-messageborder');
                              }else{
                                   $('#to_dateEducationModalError').html(data.errors.to_date);
                                   $(".edit_to_date_modalEducation").addClass('error-messageborder');
                              }
                          } 
                       },
                      error:function(e)
                      {
                         var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });
              
               $('form#updateprojectForm').on('submit',function(e){
                 var project_detail = $('#edit_project_detail').summernote('code');
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update_project') }}",
                      data: $('#updateprojectForm').serialize()+"&project_detail="+project_detail,
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
                          }
                          else{
                            
                             if($.isEmptyObject(data.errors.company_name)){ 
                                  $('#edit_company_name_modalError').html("");
                                   $(".edit_company_name_modal").removeClass('error-messageborder');
                              }else{
                                   $('#edit_company_name_modalError').html(data.errors.company_name);
                                   $(".edit_company_name_modal").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.project_detail)){ 
                                  $('#edit_project_detail_modalError').html("");
                                    $(".edit_project_detail_modal").removeClass('error-messageborder');
                              }else{
                                   $('#edit_project_detail_modalError').html(data.errors.project_detail);
                                   $(".edit_project_detail_modal").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.project_end_date)){ 
                                  $('#edit_project_end_date_modalError').html("");
                                    $(".edit_project_end_date_modal").removeClass('error-messageborder');
                              }else{
                                   $('#edit_project_end_date_modalError').html(data.errors.project_end_date);
                                   $(".edit_project_end_date_modal").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.project_name)){ 
                                  $('#edit_project_name_modalError').html("");
                                    $(".edit_project_name_modal").removeClass('error-messageborder');
                              }else{
                                   $('#edit_project_name_modalError').html(data.errors.project_name);
                                   $(".edit_project_name_modal").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.project_start_date)){ 
                                  $('#edit_project_start_date_modalError').html("");
                                    $(".edit_project_start_date_modal").removeClass('error-messageborder');
                              }else{
                                   $('#edit_project_start_date_modalError').html(data.errors.project_start_date);
                                   $(".edit_project_start_date_modal").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.project_link)){ 
                                  $('#edit_projectlink_modalError').html("");
                                    $(".edit_link_project_modal").removeClass('error-messageborder');
                              }else{
                                   $('#edit_projectlink_modalError').html(data.errors.project_link);
                                   $(".edit_link_project_modal").addClass('error-messageborder');
                              }
                          } 
                       },
                      error:function(e)
                      {
                         var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });
               $('form#experienceForm').on('submit',function(e){
                 var description = $('#experience_description').summernote('code');
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update') }}",
                      data: $('#experienceForm').serialize()+"&description="+description,
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
                          }
                          else{
                              //printErrorMsg(data.errors);
                              console.log(data.errors);
                              if($.isEmptyObject(data.errors.company)){ 
                                  $('#companynameError').html("");
                                       $(".edit_position_exper").removeClass('error-messageborder');
                              }else{
                                   $('#companynameError').html(data.errors.company);
                                   $(".edit_position_exper").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.from_date)){ 
                                  $('#from_dateforexperienceError').html("");
                                   $(".edit_from_date_exper").removeClass('error-messageborder');
                              }else{
                                   $('#from_dateforexperienceError').html(data.errors.from_date);
                                   $(".edit_from_date_exper").addClass('error-messageborder');
                              }
                              
                               if($.isEmptyObject(data.errors.to_date)){ 
                                  $('#to_dateforexperienceError').html("");
                                   $(".edit_to_date_exper").removeClass('error-messageborder');
                              }else{
                                   $('#to_dateforexperienceError').html(data.errors.to_date);
                                   $(".edit_to_date_exper").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.position)){ 
                                  $('#positionforexperienceError').html("");
                                    $(".edit_position_exper").removeClass('error-messageborder');
                              }else{
                                   $('#positionforexperienceError').html(data.errors.position);
                                   $(".edit_position_exper").addClass('error-messageborder');
                              }
                          } 
                       },
                      error:function(e)
                      {
                         var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });
             $('form#skillForm').on('submit',function(e){
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update') }}",
                      data: $('#skillForm').serialize(),
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                           console.log(data);
                          if($.isEmptyObject(data.errors)){
                               $('#skillError').html("");
                                    $(".edit_skill").removeClass('error-messageborder');
                             var message = data.success;
                               var url = window.location.href;
                                 callbackURL(message,url);
                          }
                          else{
                             // printErrorMsg(data.errors);
                             console.log(data.errors);
                             if($.isEmptyObject(data.errors.skill_id)){ 
                                  $('#skillError').html("");
                                    $(".edit_skill").removeClass('error-messageborder');
                              }else{
                                   $('#skillError').html(data.errors.skill_id);
                                   $(".edit_skill").addClass('error-messageborder');
                              }
                          } 
                       },
                      error:function(e)
                      {
                          var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });   
               $('form#updateskillForm').on('submit',function(e){
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update_skill') }}",
                      data: $('#updateskillForm').serialize(),
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          if($.isEmptyObject(data.errors)){
                               $('#skillmodalError').html("");
                               $(".edit_modalskill").removeClass('error-messageborder'); 
                            var message = data.success;
                               var url = window.location.href;
                                 callbackURL(message,url);
                          }
                          else{
                             // printErrorMsg(data.errors);
                             console.log(data.errors);
                              if($.isEmptyObject(data.errors.skill_id)){ 
                                  $('#skillmodalError').html("");
                                    $(".edit_modalskill").removeClass('error-messageborder');
                              }else{
                                   $('#skillmodalError').html(data.errors.skill_id);
                                   $(".edit_modalskill").addClass('error-messageborder');
                              }
                          } 
                       },
                      error:function(e)
                      {
                          var message = data.errors;
                                 callbackFailure(message);
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

                 setTimeout(function() {
                      $('.alert').fadeOut('fast');
                     }, 5000);              
                  } 
            }  

            $(document).ready(function(){
              /* Township data bind */
               var city_id = $('#city_id').val();
               if(city_id >=0){
                getTownshipByCity(city_id);
               }
          }); 
            
    </script>
    
    
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
                       document.getElementById("township_id").innerHTML = option

                   },
                   error:function(e)
                   {
                       console.log(e)
                   }
               });
           }
         /* City onchange event */
           $('#city_id').change(function(){
              getTownshipByCity($(this).val());
           });
           $('#freelancer_status_id').change(function(){
              var id=($(this).val());
           });
    </script>


    <!--image experience-update-modal end-->
    <script src="{{ asset('admin/js/datepicker/datepicker.js')}}"></script>
<script type="text/javascript">

function dateRangePickerforEducation() {
    
        var $startDate = $("#fromdate_education");
        var $endDate = $("#todate_education");
        
        $startDate
            .datepicker({
                autoHide: true,
            })
            .on("changeDate", function (ev) {
                $startDate.datepicker("hide");
            });

        $endDate
            .datepicker({
                autoHide: true,
                startDate: $startDate.datepicker("getDate"),
            })
            .on("changeDate", function (ev) {
                $endDate.datepicker("hide");
            });

        $startDate.on("change", function () {
            $endDate.datepicker("setStartDate", $startDate.datepicker("getDate"));
        });
    }
    
    function dateRangePickerforEducationModal() {
    
        var $startDate = $("#education_from_date");
        var $endDate = $("#education_to_date");
        
        $startDate
            .datepicker({
                autoHide: true,
            })
            .on("changeDate", function (ev) {
                $startDate.datepicker("hide");
            });

        $endDate
            .datepicker({
                autoHide: true,
                startDate: $startDate.datepicker("getDate"),
            })
            .on("changeDate", function (ev) {
                $endDate.datepicker("hide");
            });

        $startDate.on("change", function () {
            $endDate.datepicker("setStartDate", $startDate.datepicker("getDate"));
        });
    }
    
     function dateRangePickerforExperience() {
    
        var $startDate = $("#from_dateExperience");
        var $endDate = $("#to_dateExperience");
        
        $startDate
            .datepicker({
                autoHide: true,
            })
            .on("changeDate", function (ev) {
                $startDate.datepicker("hide");
            });

        $endDate
            .datepicker({
                autoHide: true,
                startDate: $startDate.datepicker("getDate"),
            })
            .on("changeDate", function (ev) {
                $endDate.datepicker("hide");
            });

        $startDate.on("change", function () {
            $endDate.datepicker("setStartDate", $startDate.datepicker("getDate"));
        });
    }
    
      function dateRangePickerforExperienceModal() {
    
        var $startDate = $("#from_date");
        var $endDate = $("#to_date");
        
        $startDate
            .datepicker({
                autoHide: true,
            })
            .on("changeDate", function (ev) {
                $startDate.datepicker("hide");
            });

        $endDate
            .datepicker({
                autoHide: true,
                startDate: $startDate.datepicker("getDate"),
            })
            .on("changeDate", function (ev) {
                $endDate.datepicker("hide");
            });

        $startDate.on("change", function () {
            $endDate.datepicker("setStartDate", $startDate.datepicker("getDate"));
        });
    }
    
    function dateRangePickerforProject() {
    
        var $startDate = $("#project_start_date_edit");
        var $endDate = $("#project_end_date_edit");
        
        $startDate
            .datepicker({
                autoHide: true,
            })
            .on("changeDate", function (ev) {
                $startDate.datepicker("hide");
            });

        $endDate
            .datepicker({
                autoHide: true,
                startDate: $startDate.datepicker("getDate"),
            })
            .on("changeDate", function (ev) {
                $endDate.datepicker("hide");
            });

        $startDate.on("change", function () {
            $endDate.datepicker("setStartDate", $startDate.datepicker("getDate"));
        });
    }
    
     function dateRangePickerforProjectModal() {
    
        var $startDate = $("#project_start_date");
        var $endDate = $("#project_end_date");
        
        $startDate
            .datepicker({
                autoHide: true,
            })
            .on("changeDate", function (ev) {
                $startDate.datepicker("hide");
            });

        $endDate
            .datepicker({
                autoHide: true,
                startDate: $startDate.datepicker("getDate"),
            })
            .on("changeDate", function (ev) {
                $endDate.datepicker("hide");
            });

        $startDate.on("change", function () {
            $endDate.datepicker("setStartDate", $startDate.datepicker("getDate"));
        });
    }
    
    function formatDate(date) {
    var year = date.getFullYear().toString();
    var month = (date.getMonth() + 101).toString().substring(1);
    var day = (date.getDate() + 100).toString().substring(1);
    return year + "-" + month + "-" + day;
}


    $(document).ready(function(){
     //  alert(formatDate(new Date()));
       var cDate =  formatDate(new Date());
       
        var sDate = new Date('1700-01-01'),
        eDate = formatDate(new Date());
        
        $( "#date_of_birth" ).datepicker({
       format: "yyyy-mm-dd",
       // maxDate: '-1d'
         weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 4,
        keyboardNavigation: 1,
        minView: 2,
        forceParse: 0,
        startDate: sDate,
        endDate: eDate,
        setDate: sDate
    });
    
       /* Education Datepicker Start*/
          $("#fromdate_education").datepicker({
            format: "yyyy-mm",
              //startView: 2, 
           // minViewMode: "months"
        });

        $("#todate_education").datepicker({
            format: "yyyy-mm",
           //  startView: 2, 
       // minViewMode: "months"
        }); 
        
         /* Education Datepicker End*/
        
         /* Education Modal Datepicker Start*/
        $("#education_from_date").datepicker({
            format: "yyyy-mm",
              //startView: 2, 
           // minViewMode: "months"
        });

        $("#education_to_date").datepicker({
            format: "yyyy-mm",
           //  startView: 2, 
       // minViewMode: "months"
        });
         /* Education Modal Datepicker End*/
         
         
          /* Experience Datepicker Start*/
        $("#from_dateExperience").datepicker({
            format: "yyyy-mm",
              //startView: 2, 
           // minViewMode: "months"
        });

        $("#to_dateExperience").datepicker({
            format: "yyyy-mm",
           //  startView: 2, 
       // minViewMode: "months"
        });
         /* Experience  Datepicker End*/
         
           /* Experience Modal Datepicker Start*/
        $("#from_date").datepicker({
            format: "yyyy-mm",
              //startView: 2, 
           // minViewMode: "months"
        });

        $("#to_date").datepicker({
            format: "yyyy-mm",
           //  startView: 2, 
       // minViewMode: "months"
        });
         /* Experience Modal Datepicker End*/
         
          /* Project  Datepicker Start*/
        $("#project_start_date_edit").datepicker({
            format: "yyyy-mm-dd",
              //startView: 2, 
           // minViewMode: "months"
        });

        $("#project_end_date_edit").datepicker({
            format: "yyyy-mm-dd",
           //  startView: 2, 
       // minViewMode: "months"
        });
         /* Project Datepicker End*/
         
          /* Project modal  Datepicker Start*/
        $("#project_start_date").datepicker({
            format: "yyyy-mm-dd",
              //startView: 2, 
           // minViewMode: "months"
        });

        $("#project_end_date").datepicker({
            format: "yyyy-mm-dd",
           //  startView: 2, 
       // minViewMode: "months"
        });
         /* Project modal Datepicker End*/
         
        dateRangePickerforEducation();
        dateRangePickerforEducationModal();
        dateRangePickerforExperience();
        dateRangePickerforExperienceModal();
        dateRangePickerforProject();
        dateRangePickerforProjectModal();
        
$('.editBtn').on('click',function(){
       var id=$(this).attr('id');
          $.ajax({
                   type : 'get',
                   url : "{{ URL :: route('freelancer.getexperience')}}",
                   data : {'id':id},
                   success : function(data){
                      console.log(data.experience.description);
                    $("#experience_id").val(data.experience.id);
                    $("#position").val(data.experience.position);
                    $("#company").val(data.experience.company);
                    $("#from_date").val(data.experience.from_date);
                    $("#to_date").val(data.experience.to_date);
                    $('#experienceupdateModal .note-editable').html(data.experience.description);
                     $('#experienceupdateModal').modal({show:true});
                   },
                   error:function(e)
                   {
                       console.log(e)
                   }
               });
});

 $('.editeducationBtn').on('click',function(){
       var education_id=$(this).attr('education_id');
          $.ajax({
                   type : 'get',
                   url : "{{ URL :: route('freelancer.geteducation')}}",
                   data : {'education_id':education_id},
                   success : function(data){
                    $("#education_id").val(data.education.id);
                    $("#subject").val(data.education.name);
                    $("#education_level").val(data.education.education_level);
                    $("#country").val(data.education.country);
                    $("#education_from_date").val(data.education.from_date);
                    $("#education_to_date").val(data.education.to_date);
                    $('#university').val(data.education.university);
                    $('#educationupdateModal').modal({show:true});
                   },
                   error:function(e)
                   {
                      alert("hi");
                       console.log(e)
                   }
               });
});


 $('.editprojectBtn').on('click',function(){
       var project_id=$(this).attr('project_id');
          $.ajax({
                   type : 'get',
                   url : "{{ URL :: route('freelancer.getproject')}}",
                   data : {'project_id':project_id},
                   success : function(data){
                    $("#project_id").val(data.project.id);
                    $("#project_name").val(data.project.project_name);
                    $("#company_name").val(data.project.company_name);
                    $("#updateprojectForm .note-editable").html(data.project.project_detail);
                    $("#project_start_date").val(data.project.project_start_date);
                    $("#project_end_date").val(data.project.project_end_date);
                    $("#project_link").val(data.project.project_link);
                    $('#projectupdateModal').modal({show:true});
                   },
                   error:function(e)
                   {
                       console.log(e)
                   }
               });
});

 $('.editSkillBtn').on('click',function(){
     
       var skill_id=$(this).attr('skill_id');
          $.ajax({
                   type : 'get',
                   url : "{{ URL :: route('freelancer.getskill')}}",
                   data : {'skill_id':skill_id},
                   success : function(data){
                       console.log(data.skill.id);
                    $("#freelancerskill_id").val(data.skill.id);
                     $('#skillupdateModal').modal({show:true});
                   },
                   error:function(e)
                   {
                       console.log(e)
                   }
               });
});


});
</script>

       @endsection