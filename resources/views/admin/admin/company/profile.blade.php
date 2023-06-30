@extends('layouts.admin_panel')
@section('content')

<!-- myo min start code-->
 <style>
    .card-avatar .btn{
        font-size:8px;
        padding:4px 6px 4px 6px !important;
        position:absolute;
        z-index:100;
        top: 2% !important;
        margin-left: 100px;
    }
    
    .cover-avatar .btn{
        font-size:8px;
        padding:4px 6px 4px 6px !important;
        position:absolute;
        z-index:100;
        top: 80% !important;
        margin-left: 10px;
    }
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
    <!-- myo min end code-->
    <!--image upload-modal start-->
            <div class="modal bs-example-modal-md-1 company-profile-upload-modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Upload Company Logo</h2>
                       <form id="companylogophotoForm"  enctype="multipart/form-data">
                           {!! csrf_field() !!}
                         <div class="form-group">
                              <!--<center>-->
                              <!--  <input type="file" id="company_logo_file" name="company_logo_photo">-->
                              <!--</center>-->
                              <div id="company_logo_photo"></div>
                          </div> 
                          <p>
                              <button  data-toggle="modal" class="btn btn-primary btn-block upload-company-logo" data-dismiss="modal" aria-label="Close">Upload </button>
                          </p>
                           
                     </form>
            <p>
             
            </p>
          </div>
        </div>
      </div>
        @if(Session::has('success')) 
                                        <script type = "text/javascript">  
                             var message = "{{Session::get('success')}}"; 
                                 callbackSuccess(message);
</script>
                                    @endif
 <!--image upload-modal start-->
    <!--image upload-modal start-->
            <div class="modal bs-example-modal-md-1 company-cover-profile" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Upload Cover Photo</h2>
                       <form id="coverphotoForm"  enctype="multipart/form-data">
                           {!! csrf_field() !!}
                         <div class="form-group">
                              <!--<center>-->
                              <!--  <input type="file" id="cover_file" name="cover_photo">-->
                              <!--</center>-->
                              <div id="cover_photo"></div>
                          </div> 
                          <p>
                               <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-cover" data-dismiss="modal" aria-label="Close">Upload </button>
                          </p>
                          
                     </form>
            <p>
             
            </p>
          </div>
        </div>
      </div>
 <!--image upload-modal start-->
  <!-- Single pro tab review Start-->
        @include('admin.element.breadcrumb')
        <div class="content">
            <div class="container-fluid company_profile">

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="card card-profile">
                                <div class="card-avatar" style="border-radius:0px !important;box-shadow: 0 10px 10px 0px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2) !important;">
                                  <!--<a href="#">-->
                                  <!--  <img  class="img" src="{{asset('storage/company_logo/'.$company->user->logo)}}" alt="" />-->
                                  <!--</a>-->
                                  <!-- start myo min-->
                                   @if($company->user->logo != null)
                                     <input type="file" id="company_logo_file" name="company_logo_photo" accept="image/*" class="hide">
                                    <img  class="img-responsive" src="{{asset('storage/company_logo/'.$company->user->logo)}}" alt="" />
                                     <label class="btn btn-sm btn-info" for="company_logo_file" title="update company logo">
                                     <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></label>
                                     @else
                                     <input type="file" id="company_logo_file" name="company_logo_photo" accept="image/*" class="hide">
                                      <!--<img  class="img-responsive"  src="{{ asset('storage/company_logo/company_noimage.png') }}" alt="update company logo"/>-->
                                      @if(Session::get('parent_category_id') == 1)
                         <img src="{{ asset('storage/company_logo/'.$projectsetting->service_default_logo) }}" class="img-responsive" alt="update company logo"
                          >
                          @elseif(Session::get('parent_category_id') == 2)
                          <img src="{{ asset('storage/company_logo/'.$projectsetting->supplier_default_logo) }}" class="img-responsive" alt="update company logo"
                         >
                          @elseif(Session::get('parent_category_id') == 3)
                          <img src="{{ asset('storage/company_logo/'.$projectsetting->reno_default_logo) }}" class="img-responsive" alt="update company logo"
                          >
                          @endif
                                        <label  class="btn btn-sm btn-info"  for="company_logo_file" title="update company logo">
                                           <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i>
                                         </label>
                                     @endif
                                     
                                    <!-- @if(auth()->user()->logo != null)-->
                                    <!--<input type="file" id="image_file" name="profile_photo" accept="image/*" class="hide">-->
                                    <!--<img  class="img-responsive" src="{{asset('storage/company_logo/'.Auth::user()->logo)}}" alt="" />-->
                                    <!-- <label   class="btn btn-sm btn-info" for="image_file">-->
                                    <!-- <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></label>-->
                                    <!-- @else-->
                                    <!-- <input type="file" id="image_file" name="profile_photo" accept="image/*" class="hide">-->
                                    <!--  <a  data-dismiss="modal" aria-label="Close" for="image_file" data-toggle="modal">-->
                                    <!--     <img src="{{ asset('storage/company_logo/company_noimage.png') }}" class="img-responsive" alt="update company logo"-->
                                    <!--           style="width:170px;height:170px">-->
                                    <!--     </a>-->
                                    <!-- @endif-->
                                  
                                  <!-- end myo min-->
                                </div>
                                <div class="card-body">
                                  <h4 class="card-title"><?= $company->user->name ?></h4>
                                 
                                  <div class="card-description height">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <span><b>Email </b></span>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                             <span> <?= $company->user->email ?>
                                             <?= $company->email ?></span>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <span><b>Phone </b></span>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                             <span>  <?= $company->phone ?></span>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <span><b>Website </b></span>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                             <span> <?= $company->website?></span>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <span><b>Category </b></span>
                                        </div>
                                        
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                             <span>  <?php $count =1; 
                                                           foreach($company->categories as $category){
                                                                if(sizeof($company->categories)==$count)
                                                                    echo $category->name;
                                                                else
                                                                    echo $category->name.",";
                                                            $count++;
                                                           }
                                                        ?>
                                              </span>
                                        </div>
                                    </div>
                                    
                                     <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <span><b>Active Package </b></span>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                             <span> <?= $company->packageplan->name ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <span><b>Viewer Count </b></span>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                             <span> <?= $company->view_count ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <span><b>Business Hour </b></span>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                             <span> <?= $company->business_opening_hours ?> ~ <?= $company->business_closing_hours ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <span><b>Total Coin </b></span>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                             <span>{{$selected_company->coin}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <span><b>Used Coin </b></span>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                             <span>{{$used_coin}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <span><b>Available Coin </b></span>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                             <span> {{$selected_company->left_coin}}</span>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <span><b>Address</b></span>
                                        </div>
                                        
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                             <span> <?= $company->address ?>
                                          @if(!empty($company->location->name))
                                           ,<?= $company->location->name ?>,
                                          @endif
                                          @if(!empty($city->name))
                                             <?=$city->name ?>
                                          @endif</span>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <a href="<?= $company->facebook ?>"><i class="fa fa-facebook" style="font-size: 20px;"></i></a>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <a href="<?= $company->twitter ?>"><i class="fa fa-twitter" style="font-size: 20px;"></i></a>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <a href="<?= $company->googleplus ?>"><i class="fa fa-google-plus" style="font-size: 20px;"></i></a>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <a href="<?= $company->linkedin ?>"><i class="fa fa-linkedin" style="font-size: 20px;"></i></a>
                                        </div>
                                    </div>
                                    <center>
                                        @php
                                            $id = $company->id;
                                            $id = \Crypt::encrypt($id);
                                            
                                            @endphp
                                     <a href="{{ url('admin/company-edit/'.$id ) }}" class="btn btn-primary btn-round">Edit</a>   
                                    </center>
                                  </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                  <h4 class="card-title ">Company Profile</h4>
                                  <p class="card-category"> Biography </p>
                                </div>
                                <div class="card-body">
                                   @if(!empty($company->vission))
                                   <div class="row">
                                       <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                                           <h4>Vission</h4>
                                           <p><?= $company->vission ?></p>
                                       </div>
                                   </div>
                                   @endif
                                      @if(!empty($company->service))
                                   <div class="row">
                                       <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                                           <h4>What We Do</h4>
                                           <p><?= $company->service ?></p>
                                       </div>
                                   </div>
                                   @endif
                                    <div class="row">
                                       <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                                           <h4>Description</h4>
                                           <p><?= $company->description ?></p>
                                   </div>
                                   <div class="row">
                                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cover-avatar">
                                           <h4>Cover Photo</h4>
                                           <!--<img src="{{asset('storage/company_coverphoto/'.$company->cover_photo)}}" alt="">-->
                                           <!-- start myo min-->
                                            @if($company->cover_photo != null)
                                             <input type="file" id="cover_file" name="cover_photo" accept="image/*" class="hide">
                                    <img  class="img-responsive" src="{{asset('storage/company_coverphoto/'.$company->cover_photo)}}" alt="" />
                                     <label  class="btn btn-sm btn-info" for="cover_file" data-toggle="modal">
                                     <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></label>
                                     @else
                                      <input type="file" id="cover_file" name="cover_photo" accept="image/*" class="hide">
                                       <!--<img src="{{ asset('storage/company_logo/company_noimage.png') }}" class="img-responsive" alt="update company cover Photo"-->
                                       <!--        style="width:170px;height:170px" >-->
                                                @if(Session::get('parent_category_id') == 1)
                            <img src="{{ asset('storage/company_coverphoto/'.$projectsetting->service_default_background_image ) }}" class="img-responsive" alt="update company cover photo">
                          @elseif(Session::get('parent_category_id') == 2)
                            <img src="{{ asset('storage/company_coverphoto/'.$projectsetting->supplier_default_background_image ) }}" class="img-responsive" alt="update company cover photo">
                          @elseif(Session::get('parent_category_id') == 3)
                            <img src="{{ asset('storage/company_coverphoto/'.$projectsetting->reno_default_background_image ) }}" class="img-responsive" alt="update company cover photo">
                          @endif
                                      <label   class="btn btn-sm btn-info"  for="cover_file" data-toggle="modal" title="update company logo">
                                          <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i>
                                         </label>
                                     @endif
                                     
                                               <!-- @if(auth()->user()->logo != null)-->
                                    <!--<input type="file" id="image_file" name="profile_photo" accept="image/*" class="hide">-->
                                    <!--<img  class="img-responsive" src="{{asset('storage/company_logo/'.Auth::user()->logo)}}" alt="" />-->
                                    <!-- <label   class="btn btn-sm btn-info" for="image_file">-->
                                    <!-- <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></label>-->
                                    <!-- @else-->
                                    <!-- <input type="file" id="image_file" name="profile_photo" accept="image/*" class="hide">-->
                                    <!--  <a  data-dismiss="modal" aria-label="Close" for="image_file" data-toggle="modal">-->
                                    <!--     <img src="{{ asset('storage/company_logo/company_noimage.png') }}" class="img-responsive" alt="update company logo"-->
                                    <!--           style="width:170px;height:170px">-->
                                    <!--     </a>-->
                                    <!-- @endif-->
                                           <!-- end myo min-->
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
        <script type="text/javascript">
         /* bind image */ 
         $(document).ready(function(){
               var img = '<?php echo url('storage/company_coverphoto/'.$company->cover_photo) ?>';
               var image_name = '<?php echo $company->cover_photo ?>';
               var id ='<?php echo $company->id ?>';
               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_cover_photo").html(html);
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
            $('#cover_file').on('change', function () {
              var reader = new FileReader();
                reader.onload = function (e) {
                  resize.croppie('bind',{
                    url: e.target.result
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
                }
                reader.readAsDataURL(this.files[0]);
                $('.company-cover-profile').modal('show');
            });

            $('.upload-cover').on('click', function (ev) {
              resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
               html = '<img src="' + img + '" />';
                $("#cover_photo").html(html);
                 $.ajax({
                   url: "{{route('user.croppie.upload-profile')}}",
                   type: "POST",
                   data: {"image":img,"path":"company_coverphoto","id":id},
                   dataType: 'json',
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success: function (data) {
                        window.location.href = window.location.href;
                        },
                   error:function(e){
                    console.log(e)
                   }
                 });
              });
            });
            
                 var user_id ='<?php echo $company->user_id ?>';
           
            /* image crop */
               var resize2 = $('#company_logo_photo').croppie({
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
            $('#company_logo_file').on('change', function () {
              var reader2 = new FileReader();
                reader2.onload = function (e) {
                  resize2.croppie('bind',{
                    url: e.target.result
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
                }
                reader2.readAsDataURL(this.files[0]);
                $('.company-profile-upload-modal').modal('show');
            });

            $('.upload-company-logo').on('click', function (ev) {
              resize2.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
               
                 $.ajax({
                   url: "{{route('user.croppie.upload-profile')}}",
                   type: "POST",
                   data: {"image":img,"path":"company_logo","id":user_id},
                   dataType: 'json',
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success: function (data) {
                        window.location.href = window.location.href;
                        },
                   error:function(e){
                    console.log(e)
                   }
                 });
              });
            });
             
          }); 
        </script>
       
@endsection
    