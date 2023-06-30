@extends('layouts.admin_panel')
@section('content')
  <!-- Single pro tab review Start-->
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Add New Advertising</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                         <a href="{{route('admin.advertising.list')}}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                            Advertising List
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
              <div class="card-body">
                 
                <form  id="addAdvertisingForm" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                     <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        
                        <div class="form-group">
                         <label for="name">Link:</label>
                          <input type="text" class="form-control" placeholder="Link" name="link" id="link">
                        </div>
                      </div>
                     
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <div class="form-group">
                           <label for="Business">Company Name:</label>
                           <input list="project" class="project_type form-control validation" data-id="error1"  autocomplete="off" name="company_name" placeholder="Company Name">
                          <div id="error1"  class="error"> </div>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <div class="form-group">
                           <label for="Business">Address:</label>
                           <input list="project" class="project_type form-control" id="address" autocomplete="off" name="address" placeholder="Address">
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <div class="form-group">
                           <label for="Business">Phone:</label>
                           <input list="project" class="project_type form-control validation" data-id="error2"  autocomplete="off" name="phone" placeholder="Phone"> 
                           <div id="error2"  class="error"> </div>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <div class="form-group">
                           <label for="Business">Email:</label>
                           <input list="project" class="project_type form-control validation" data-id="error5"  autocomplete="off" name="email" placeholder="Email">
                           <div id="error5"  class="error"> </div>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <div class="form-group">
                           <label for="Business">Priority:</label>
                           <select class="project_type form-control validation" data-id="error4" name="priority">
                             <option value="">Select Priority</option>
                             <option value="1">1</option>
                             <option value="2">2</option>
                             <option value="3">3</option> 
                             <option value="4">4</option>
                             <option value="5">5</option>
                             <option value="6">6</option>
                             <option value="7">7</option>
                           </select>                       
                           <div id="error4"  class="error"> </div>
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
                                   <label for="Business">Advertising Plan:</label>
                                  <select class="project_type form-control validation" data-id="error3" name="advertising_plan_id">
                             <option value="">Select Advertising Plan</option>
                            <!--  <option value="1">1</option>
                             <option value="2">2</option>
                             <option value="3">3</option> 
                             <option value="4">4</option>
                             <option value="5">5</option>
                             <option value="6">6</option>
                             <option value="7">7</option> -->
                               @foreach($advertisingPlans as $advertisingplan)
                                <option value="{{ $advertisingplan->id }}">End Date:
                                  {{ $advertisingplan->plan_name }} - {{ $advertisingplan->price }} ks - {{ $advertisingplan->periods }}days
                                </option>
                               @endforeach
                           </select> 
                           <div id="error3"  class="error"> </div>
                                </div>
                              </div>
                              <div class="col-md-4">                                 
                            <div class="form-group">
                               <label for="start_date">Start Date:</label>
                              <input type="date" class="project_type form-control" data-id="error6"  autocomplete="off" name="start_date" placeholder="Start Date"> 
                             
                         </div>
                          <div id="error6" style="margin-top: 10px;" class="error"> </div>
                              </div>

                              <div class="col-md-4">                                 
                            <div class="form-group">
                               <label for="end_date">End Date:</label>
                              <input type="date" class="project_type form-control" data-id="error7"  autocomplete="off" name="end_date" placeholder="End Date">
                            
                         </div>
                           <div id="error7" style="margin-top: 10px;" class="error"> </div>
                              </div>
                              
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
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Image</label>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md-1">Upload Photo</button>
                                     <div id="current_advertising_photo"></div>
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
                                 <button type="submit" id="basic_add_btn" class="btn btn-primary waves-effect waves-light">Save</button>
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
      <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Upload Profile Photo</h2>
                       <form id="profilephotoForm" enctype="multipart/form-data">
                         <div class="form-group">
                              <center>
                                <input type="file" id="image_file" name="blog_photo" accept="image/*">
                              </center>
                              <div id="advertising_photo"></div>
                          </div> 
                     </form>
            <p>
              <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-advertising-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
            </p>
          </div>
        </div>
      </div>
        <!-- end profile image pop up -->
<!--image upload-modal end--> 
<script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script>
<script type="text/javascript">
  
  $(document).ready(function(){
               //Image Cropping
               /* image crop */
               var resize = $('#advertising_photo').croppie({
                enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 350,
                    height: 300,
                    type: 'square' //circle
                },
                boundary: {
                    width: 600,
                    height: 400
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

            $('.upload-advertising-image').on('click', function (ev) {
              resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
                 $.ajax({
                   url: "{{ route('admin.croppie.upload-advertising-image') }}",
                   type: "POST",
                   data: {"image":img},
                   dataType: 'json',
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success: function (data) {
                   
                    html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                    $("#current_advertising_photo").html(html);   
                        },
                   error:function(e){
                    console.log(e)
                   }
                 });
              });
            });
        
             var APP_URL = '<?php echo url('/') ?>'; 
             $('form#addAdvertisingForm').on('submit',function(e){
                var image     = $('#current_advertising_photo img').attr('alt');
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('admin.add.advertising') }}",
                      data: $('#addAdvertisingForm').serialize()+"&image="+image,
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          if($.isEmptyObject(data.errors)){
                               var message = data.success;
                                var url = "{{ route('admin.advertising.list') }}";
                                 callbackURL(message,url);
                          }
                          else{ 
                              printErrorMsg(data.errors);
                          } 
                       },
                      error:function(e)
                      {
                          var message = "Something Wrong!";
                         callbackFailure(message); 
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
@endsection