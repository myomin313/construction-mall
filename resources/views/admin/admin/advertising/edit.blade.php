@extends('layouts.admin_panel')
@section('content')
<style>
      .alert-message {
        color: red;
        position: absolute;
      }
    </style>
  <!-- Single pro tab review Start-->
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            @include('admin.element.breadcrumb')
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Update Advertising Information</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                         <a href="{{ url('/admin/advertisings?page='.Session::get('pageno')) }}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                            Advertising List
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
              <div class="card-body">
                  <div id="error">
                        </div>
                <form  id="editAdvertisingForm" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                     <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                          <div class="form-group">
                         <label for="name">link:</label>
                          <input type="text" class="form-control" placeholder="Eg.http://www.facebook.com" name="link" id="link" value="{{ old('link',$advertising->link)}}">
                           <div id="linkError" class="error"></div>
                        </div>
                      </div>
                     
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <div class="form-group">
                           <label for="Business">Company Name:</label><span class="text-error-danger"> * </span>
                           <input list="project" class="project_type form-control" id="company_name" autocomplete="off" name="company_name" placeholder="Company name" value="{{ old('company_name',$advertising->company_name)}}">
                        <div id="company_nameError" class="error"></div>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <div class="form-group">
                           <label for="Business">Address:</label>
                           <input list="project" class="project_type form-control" id="address" autocomplete="off" name="address" placeholder="Address" value="{{ old('address',$advertising->address)}}">
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <div class="form-group">
                           <label for="Business">Phone:</label><span class="text-error-danger"> * </span>
                           <input list="project" class="project_type form-control"   id="phone" autocomplete="off" name="phone" placeholder="Phone" value="{{ old('phone',$advertising->phone) }}"> 
                        <div id="phoneError" class="error"></div>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <div class="form-group">
                           <label for="Business">Email:</label>
                           <input list="project" class="project_type form-control"  id="email" autocomplete="off" name="email" placeholder="Email" value="{{ old('email',$advertising->email) }}">
                             <div id="emailError" class="error"></div>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <div class="form-group">
                           <label for="Business">Priority:</label><span class="text-error-danger"> * </span>
                           <select class="project_type form-control" name="priority">
                             <option value="">Select Priority</option>
                             <option value="1" {{ old('priority', $advertising->priority) == 1 ? 'selected' : '' }}>1</option>
                             <option value="2" {{ old('priority', $advertising->priority) == 2 ? 'selected' : '' }}>2</option>
                             <option value="3" {{ old('priority', $advertising->priority) == 3 ? 'selected' : '' }}>3</option> 
                             <option value="4" {{ old('priority', $advertising->priority) == 4 ? 'selected' : '' }}>4</option>
                             <option value="5" {{ old('priority', $advertising->priority) == 5 ? 'selected' : '' }}>5</option>
                             <option value="6" {{ old('priority', $advertising->priority) == 6 ? 'selected' : '' }}>6</option>
                             <option value="7" {{ old('priority', $advertising->priority) == 7 ? 'selected' : '' }}>7</option>
                           </select>  
                           <div id="priorityError" class="error"></div>
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                           <div id="add_more_field">
                            <!-- //initially one field is set -->
                            <div class="row meta-field">
                              <div class="col-md-4">
                                <div class="form-group">
                                   <label for="Business">Advertising Plan:</label><span class="text-error-danger"> * </span>
                                  <select class="project_type form-control" name="advertising_plan_id" id="plan_id">
                             <option value="">Select Advertising Plan</option>
                            <!--  <option value="1">1</option>
                             <option value="2">2</option>
                             <option value="3">3</option> 
                             <option value="4">4</option>
                             <option value="5">5</option>
                             <option value="6">6</option>
                             <option value="7">7</option> -->
                             <!--   @foreach($advertisingPlans as $advertisingplan)
                                <option value="{{ $advertisingplan->id }}">
                                  {{ $advertisingplan->plan_name }} - {{ $advertisingplan->price }} ks - {{ $advertisingplan->periods }}days
                                </option>
                               @endforeach -->
                                <?php
                                    foreach($advertisingPlans as $advertisingplan){
                                      if(!empty($advertising->advertising_plan_id))
                                      if($advertising->advertising_plan_id == $advertisingplan->id)
                                         $selected ="selected";
                                      else
                                          $selected ="";
                                      else
                                        $selected ="";
                                        ?>
                                        <option value="{{ $advertisingplan->id }}" <?=$selected?>> {{ $advertisingplan->plan_name }} - {{ $advertisingplan->price }} ks - {{ $advertisingplan->periods }}days</option>
                                        <?php } ?>
                                   </select> 
                                     <div id="advertising_plan_idError" class="error"></div>
                                </div>
                              </div>
                              <div class="col-md-4">                                 
                            <div class="form-group">
                               <label for="start_date">Start Date:</label><span class="text-error-danger"> * </span>
                              <input type="text" class="project_type form-control" id="start_date" autocomplete="off" name="start_date" placeholder="Start date" value="{{ old('start_date',$advertising->start_date) }}"> 
                             <div id="start_dateError" class="error"></div>
                         </div>
                              </div>

                       <!--       <div class="col-md-4">                                 -->
                       <!--     <div class="form-group">-->
                       <!--        <label for="end_date">End Date:</label><span class="text-error-danger"> * </span>-->
                       <!--       <input type="text" class="project_type form-control" id="end_date" autocomplete="off" name="end_date" placeholder="End date" value="{{ old('end_date',$advertising->end_date) }}"> -->
                       <!--<div id="end_dateError" class="error"></div>-->
                       <!--  </div>-->
                       <!--       </div>-->
                              <!-- <div class="col-md-7">
                                 <label for="Business">Advertising Photo:</label>
                                <a href="#" class="add-modal btn btn-success w_200" data-no="1">
                                Upload Photo</a>
                                <div id="current_cover_photo"></div>
                              </div> -->
                              <!-- start  -->
                             <!--  <div class="col-md-7">
                            <label for="photo">Product Photo</label>
                            <div>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md-1">Upload Photo</button>
                            <div id="current_cover_photo"></div>
                          </div> 
                        </div> -->
                              <!--<div class="col-md-12">-->
                              <!--   <div class="form-group">-->
                              <!--      <label>Image</label>-->
                              <!--      <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md-1">Upload Photo</button>-->
                              <!--       <div id="current_advertising_photo"></div>-->
                              <!--        <div id="current_advertising_photoError" class="alert-message"></div>-->
                              <!--    </div> -->
                              <!--  </div>-->
                               <div class="col-md-12" id="photoframe">
                                 <div class="form-group">
                                     <!--start-->
                                      <label>Image</label><span class="text-error-danger"> * </span>
                                     <div clas="file_input_wrap" id="wrap">    
                                       <input type="file" id="image_file" name="image" accept="image/*" class="hide">
                                         <label for="image_file" class="btn btn-primary ">Upload Photo</label>
                                       </div>
                                       <!-- start -->
                                        <div clas="file_input_wrap" id="wrap-1">
                                          <input type="file" id="image_file-1" name="image" accept="image/*" class="hide" />
                                            <label for="image_file-1" class="btn btn-primary">Upload Photo</label>
                                        </div>
                                        <!-- end -->
                                      <div id="current_advertising_photo"></div>
                                      <div id="current_advertising_photoError" class="error"></div>
                                  </div> 
                                </div>
                              <!-- end -->
                              
                            </div>
                          </div>
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

      <!--image upload-modal start-->
      <!--image upload-modal start-->
      <div class="modal bs-example-modal-md-1 advertise-image-modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Advertising Photo</h2>
                       <form id="profilephotoForm" enctype="multipart/form-data">
                         <div class="form-group">
                              <div id="advertising_photo"></div>
                          </div> 
                     </form>
            <p>
              <button  data-toggle="modal"  class="btn btn-primary btn-block upload-advertising-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
            </p>
          </div>
        </div>
      </div>
        <!-- end profile image pop up -->
        <!-- add by myo min -->
        <div class="modal bs-example-modal-md-1 advertise-image-modal-1" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
            <h2 class="modal-title">Advertising Photo</h2>
            <form id="profilephotoForm" enctype="multipart/form-data">
                <div class="form-group">
                    <!--<center>-->
                    <!--  <input type="file" id="image_file" name="image" accept="image/*">-->
                    <!--</center>-->
                    <div id="advertising_photo-1"></div>
                </div>
            </form>
            <p>
                <button data-toggle="modal"  class="btn btn-primary btn-block upload-advertising-image-1" data-dismiss="modal" aria-label="Close">Upload Image</button>
            </p>
        </div>
    </div>
</div>
        <!-- end by myo min -->
<!--image upload-modal end--> 
<script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script>
<script type="text/javascript">    
  $(document).ready(function(){
  
    var img = '<?php echo asset('storage/advertising/'.$advertising->photo) ?>';
               var image_name = '<?php echo $advertising->photo ?>';

               html = '<img alt="'+image_name+'" src="' + img + '" />';

               $("#current_advertising_photo").html(html);
               //Image Cropping
               /* image crop */
             
                if($('#plan_id').val() == 1){
                   $('#wrap').show();
                   $('#wrap-1').hide();
                   // start myo min

        var resize3 = $("#advertising_photo").croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: {
                // Default { width: 100, height: 100, type: 'square' }
                width: 1920,
                height: 687,
                type: "square", //circle
            },
            boundary: {
                width: 810,
                height: 340,
            },
        });

        $("#image_file").on("change", function () {
            var reader3 = new FileReader();
            reader3.onload = function (e) {
                resize3.croppie("bind", {
                        url: e.target.result,
                    })
                    .then(function () {
                        console.log("jQuery bind complete");
                    });
            };
            reader3.readAsDataURL(this.files[0]);
            $(".advertise-image-modal").modal("show");
            $(".advertise-image-modal-1").modal("hide");
        });

        $(".upload-advertising-image").on("click", function (ev) {
            resize3.croppie("result", {
                    type: "canvas",
                    size: "viewport",
                })
                .then(function (img) {
                    $.ajax({
                        url: "{{ route('admin.croppie.upload-advertising-image') }}",
                        type: "POST",
                        data: { image: img },
                        dataType: "json",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        success: function (data) {
                            html = '<img alt="' + data.image_name + '" src="' + img + '" />';
                            $("#current_advertising_photo").html(html);
                        },
                        error: function (e) {
                            console.log(e);
                        },
                    });
                });
        });

                   //end myo min
                }else{
                   $('#wrap-1').show();
                   $('#wrap').hide();
        var resize4 = $("#advertising_photo-1").croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: {
                // Default { width: 100, height: 100, type: 'square' }
                width: 350,
                height: 300,
                type: "square", //circle
            },
            boundary: {
                width: 360,
                height: 310,
            },
        });

        $("#image_file-1").on("change", function () {
            var reader4 = new FileReader();
            reader4.onload = function (e) {
                resize4.croppie("bind", {
                        url: e.target.result,
                    })
                    .then(function () {
                        console.log("jQuery bind complete");
                    });
            };
            reader4.readAsDataURL(this.files[0]);
            $(".advertise-image-modal-1").modal("show");
            $(".advertise-image-modal").modal("hide");
        });

        $(".upload-advertising-image-1").on("click", function (ev) {
            resize4.croppie("result", {
                    type: "canvas",
                    size: "viewport",
                })
                .then(function (img) {
                    $.ajax({
                        url: "{{ route('admin.croppie.upload-advertising-image') }}",
                        type: "POST",
                        data: { image: img },
                        dataType: "json",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        success: function (data) {
                            html = '<img alt="' + data.image_name + '" src="' + img + '" />';
                            $("#current_advertising_photo").html(html);
                        },
                        error: function (e) {
                            console.log(e);
                        },
                    });
                });
        });
                }

              $('#plan_id').on('change', function() {
                if($(this).find(":selected").val() != ""){
                  if($(this).find(":selected").val() == 1){  
                    $('#current_advertising_photo img').remove();                 
                    $('#photoframe').show();
                    $('#wrap').show();
                    $('#wrap-1').hide();
        var resize1 = $("#advertising_photo").croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: {
                // Default { width: 100, height: 100, type: 'square' }
                width: 1920,
                height: 687,
                type: "square", //circle
            },
            boundary: {
                width: 810,
                height: 340,
            },
        });

        $("#image_file").on("change", function () {
            var reader1 = new FileReader();
            reader1.onload = function (e) {
                resize1.croppie("bind", {
                        url: e.target.result,
                    })
                    .then(function () {
                        console.log("jQuery bind complete");
                    });
            };
            reader1.readAsDataURL(this.files[0]);
            $(".advertise-image-modal").modal("show");
            $(".advertise-image-modal-1").modal("hide");
        });

        $(".upload-advertising-image").on("click", function (ev) {
            resize1.croppie("result", {
                    type: "canvas",
                    size: "viewport",
                })
                .then(function (img) {
                    $.ajax({
                        url: "{{ route('admin.croppie.upload-advertising-image') }}",
                        type: "POST",
                        data: { image: img },
                        dataType: "json",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        success: function (data) {
                            html = '<img alt="' + data.image_name + '" src="' + img + '" />';
                            $("#current_advertising_photo").html(html);
                        },
                        error: function (e) {
                            console.log(e);
                        },
                    });
                });
        });

        }else{
               $('#current_advertising_photo img').remove();  
                    $('#photoframe').show();
                    $('#wrap').hide();
                    $('#wrap-1').show();
        var resize2 = $("#advertising_photo-1").croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: {
                // Default { width: 100, height: 100, type: 'square' }
                width: 350,
                height: 300,
                type: "square", //circle
            },
            boundary: {
                width: 360,
                height: 310,
            },
        });

        $("#image_file-1").on("change", function () {
            var reader2 = new FileReader();
            reader2.onload = function (e) {
                resize2.croppie("bind", {
                        url: e.target.result,
                    })
                    .then(function () {
                        console.log("jQuery bind complete");
                    });
            };
            reader2.readAsDataURL(this.files[0]);
            $(".advertise-image-modal-1").modal("show");
            $(".advertise-image-modal").modal("hide");
        });

        $(".upload-advertising-image-1").on("click", function (ev) {
            resize2.croppie("result", {
                    type: "canvas",
                    size: "viewport",
                })
                .then(function (img) {
                    $.ajax({
                        url: "{{ route('admin.croppie.upload-advertising-image') }}",
                        type: "POST",
                        data: { image: img },
                        dataType: "json",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        success: function (data) {
                            html = '<img alt="' + data.image_name + '" src="' + img + '" />';
                            $("#current_advertising_photo").html(html);
                        },
                        error: function (e) {
                            console.log(e);
                        },
                    });
                });
        });
                  }
        }else{
            $('#photoframe').hide();
            } 
    });

             $('form#editAdvertisingForm').on('submit',function(e){
               var image     = $('#current_advertising_photo img').attr('alt');
               e.preventDefault();
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('admin.advertising.update',$advertising->id) }}",
                     data: $('#editAdvertisingForm').serialize()+"&image="+image+'&old_image='+image_name,
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success:function(data)
                     {
                         if($.isEmptyObject(data.errors)){
                               
                                var url = "{{ url('/admin/advertisings?page='.Session::get('pageno')) }}";
                                window.location=url;
                                 
                       /*    alert('Successfully Updated!');
                           window.location=data.url;*/
                         }
                         else{
                             console.log(data.errors);
                             
                              if($.isEmptyObject(data.errors.image)){ 
                                  $('#imageError').html("");
                                   $("input[name=image]").removeClass('error-messageborder');
                              }else{
                                   $('#imageError').html(data.errors.image);
                                    $("input[name=image]").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.company_name)){ 
                                  $('#company_nameError').html("");
                                   $("input[name=company_name]").removeClass('error-messageborder');
                              }else{
                                   $('#company_nameError').html(data.errors.company_name);
                                    $("input[name=company_name]").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.phone)){ 
                                  $('#phoneError').html("");
                                   $("input[name=phone]").removeClass('error-messageborder');
                              }else{
                                    $('#phoneError').html(data.errors.phone);
                                     $("input[name=phone]").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.advertising_plan_id)){ 
                                  $('#advertising_plan_idError').html("");
                                   $("select[name=advertising_plan_id]").removeClass('error-messageborder');
                              }else{
                                    $('#advertising_plan_idError').html(data.errors.advertising_plan_id);
                                     $("select[name=advertising_plan_id]").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.priority)){ 
                                  $('#priorityError').html("");
                                   $("input[name=priority]").removeClass('error-messageborder');
                              }else{
                                    $('#priorityError').html(data.errors.priority);
                                     $("input[name=priority]").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.email)){ 
                                  $('#emailError').html("");
                                   $("input[name=email]").removeClass('error-messageborder');
                              }else{
                                 $('#emailError').html(data.errors.email);
                                 $("input[name=email]").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.link)){ 
                                  $('#linkError').html("");
                                   $("input[name=link]").removeClass('error-messageborder');
                              }else{
                                    $('#linkError').html(data.errors.link);
                                     $("input[name=link]").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.start_date)){ 
                                  $('#start_dateError').html("");
                                   $("input[name=start_date]").removeClass('error-messageborder');
                              }else{
                                    $('#start_dateError').html(data.errors.start_date);
                                     $("input[name=start_date]").addClass('error-messageborder');
                              }
                               if($("#current_advertising_photo").html() == "")
                                {
                                     $('#current_advertising_photoError').html("Photo is required."); 
                                }else{
                                     $('#current_advertising_photoError').html(""); 
                                } 
                           //  printErrorMsg(data.errors);
                         } 
                      },
                     error:function(e)
                     {
                        console.log(e);

                     }
                   });
               });
        
             

                function printErrorMsg (msg) {
                 var message="";
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

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('admin/js/datepicker/datepicker.js')}}"></script>
<script>
           
      function dateRangePicker() {
        var $startDate = $("#start_date");
        var $endDate = $("#end_date");

        $startDate.
             datepicker({
                autoHide: true,
            }).on("changeDate", function (ev) {
                if( $(this).val() >= $("#end_date").val() ){
                    $("#end_date").val(""); 
                 }
                $startDate.datepicker("hide");
            });

        $endDate.
             datepicker({
                autoHide: true,
                startDate: $startDate.datepicker("getDate"),
            }).on("changeDate", function (ev) {
                if( $(this).val() <= $("#start_date").val() ){
                    $("#start_date").val(""); 
                 }
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
        
        var cDate =  formatDate(new Date());
       
        var sDate = new Date('1700-01-01'),
        eDate = formatDate(new Date());
        
       $("#start_date").datepicker({
            format: "yyyy-mm-dd",
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
        $("#end_date").datepicker({
            format: "yyyy-mm-dd",
        });
     dateRangePicker();
    });
       
      
</script>
@endsection