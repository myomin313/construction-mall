@extends('backend.layouts.company_panel')
@section('title','Company Profile')
@section('extra_css')
    <style>
        .what_we_do ul li{
            list-style-type:square !important;
        }
        .what_we_do ol li{
            list-style-type:roman !important;
        }
    </style>
@endsection
@section('content')
@php use Carbon\Carbon; @endphp

<div class="col-md-9 col-sm-12">
<div class="overflow">
<li>
<div class="blog-inter">
<div class="row" style="margin-bottom:10px;">
    <div class="col-md-12 col-sm-12">
        @if(empty(auth()->user()->logo))
        <p class="text-center">*Please upload profile picture in order to public your company.*</p>
        @endif
    </div>
</div>
<div class="row">
<div class="col-md-4 col-sm-4">
    <!--<img src="images/blog.jpg" alt="portfolio" class="img-responsive logo">-->
    <!-- <label class="pull-right logo_upload" for="image_file">-->
    <!-- <i class="fa fa-camera" style="color:white;padding:10px;background: #ffcc32;border-radius: 20px" aria-hidden="true"></i></label>-->

    <!--start-->
      @php
        if(auth()->user()->logo != null)
        $img=asset('storage/company_logo/'.Auth::user()->logo);
        else
        if(Session::get('parent_category_id') == 1)
        $img=asset('storage/company_logo/'.$projectsetting->service_default_logo);
        else if(Session::get('parent_category_id') == 2)
        $img=asset('storage/company_logo/'.$projectsetting->supplier_default_logo);
        else if(Session::get('parent_category_id') == 3)
        $img=asset('storage/company_logo/'.$projectsetting->reno_default_logo);
       @endphp
        <input type="file" id="image_file" name="profile_photo" accept="image/*" class="hide">
        <img  class="img-responsive logo" src="{{ $img }}" alt="" />
        <label   class="pull-right logo_upload" for="image_file">
            <i class="fa fa-camera" style="color:white;padding:10px;background: #ffcc32;border-radius: 20px" aria-hidden="true"></i></label>
<!--end-->
</div>
<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="post-tittle">
        <h4 class="title"><?= $company->user->name ?><span class="pull-right show_xs" style="display: none;float: right !important;"><a class="company_profile_edit"  data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target=".bs-example-modal-md-3">
<span class="pull-right"><i class="fa fa-pencil" aria-hidden="true" style="color:#fcb80b !important;"></i> Edit</span>
</a></span></h4>
    </div>

    <ul class="blogDate info">
        <li> <i class="fa fa-user" aria-hidden="true"></i><span><?= $company->categories[0]->name ?></span> </li>
        <li class="contact_mail"> <i class="fa fa-envelope" aria-hidden="true"></i> <span><a href="mailto:<?= $company->user->email ?>"><?= $company->user->email ?>, </a><a href="mailto:<?= $company->email ?>"><?= $company->email ?></a></span></li>
        @if(!empty($company->phone))
            <li> <i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:<?= $company->phone ?>"><span><?= $company->phone ?></span></a> </li>
        @endif
        @if(!empty($company->website))
            <li> <i class="fa fa-globe" aria-hidden="true"></i> <a href="<?= $company->website ?>"><span><?= $company->website ?></span></a> </li>
        @endif
    </ul>

    <ul class="blogDate">
        <li><i class="fa fa-home" aria-hidden="true"></i><span> <?php $count =1;                                              foreach($company->categories as $category){
                    if(sizeof($company->categories)==$count)
                        echo $category->name;
                    else
                        echo $category->name.", ";
                    $count++;
                }
                ?></span></li>
    </ul>
    <!--start-->
    <!--end-->
</div>
<div class="col-md-4 col-sm-4 col-xs-12">
    <a class="company_profile_edit hidden_xs"  data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target=".bs-example-modal-md-3">
        <span class="pull-right"><i class="fa fa-pencil" aria-hidden="true" style="color:#fcb80b !important;"></i> Edit</span>
    </a>
    <br>
    <div class="mt90">
<span class="pull-right supplier-social">
@if(!empty($company->facebook))
<a href="<?= $company->facebook ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
@endif
@if(!empty($company->twitter))
<a href="<?= $company->twitter ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
@endif
@if(!empty($company->googleplus))
<a href="<?= $company->googleplus ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
@endif
@if(!empty($company->linkedin))
<a href="<?= $company->linkedin ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
@endif
</span>
    </div>
</div>
</div>
<div class="row about_us">
    <div class="col-md-12 col-sm-12">
        @if(!empty($company->description))
        <div class="post-tittle">
            <h5>About Us</h5>
        </div>
        <p><?= $company->description ?></p>
        @endif

        @if(!empty($company->location->name))
        <div class="post-tittle">
            <h5>Address</h5>
        </div>
        <p>
            <?= $company->address ?>
            @if(!empty($company->location->name)),
            <?= $company->location->name ?>
            @endif
            @if(!empty($city->name)),
                <?=$city->name ?>
            @endif
        </p>
        @endif

        @if(!empty($company->businessDay))
        <div class="post-tittle">
            <h5>Business Hour</h5>
        </div>
        <p>
            @foreach($company->businessDay as $business_day)
                {{ $business_day->name}} 
                @php
                    $opening_arr = explode(':',$business_day->pivot->opening_hour);
                    $closing_arr = explode(':',$business_day->pivot->closing_hour);
                    if($opening_arr[0] > 12){
                        $opening_arr[0] -= 12;
                        $open_am_pm = "PM";
                        if($opening_arr[0] < 10){
                          $opening_arr[0] = "0".$opening_arr[0];  
                        }
                    }
                    else
                        $open_am_pm = "AM";

                    if($closing_arr[0] > 12){
                        $closing_arr[0] -= 12;
                        $close_am_pm = "PM";
                        if($closing_arr[0] < 10){
                          $closing_arr[0] = "0".$closing_arr[0];  
                        }
                    }
                    else
                        $close_am_pm = "AM";
                @endphp
                ({{ $opening_arr[0].":".$opening_arr[1]." ".$open_am_pm }} ~
                {{ $closing_arr[0].":".$closing_arr[1]." ".$close_am_pm }}) <br>
            @endforeach
        </p>
        @endif
    </div>
</div>
@if(!empty($company->service))
<div class="row what_we_do">
    <div class="col-md-12 col-sm-12">
        <div class="post-tittle">
            <h5>What We Do?</h5>
        </div>
        <p>
        <p><?= $company->service ?></p>
        </p>
    </div>
</div>
@endif
@if(!empty($company->vission))
<div class="row what_we_do">
    <div class="col-md-12 col-sm-12">
        <div class="post-tittle">
            <h5>Our Vission</h5>
        </div>
        <p>


        <p><?= $company->vission ?></p>
        </p>
    </div>
</div>
@endif
<div class="row company_summary_count">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="post-tittle">
        <h5>Summary</h5>
    </div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12">
    <p>Total Coin<span class="pull-right"><?= Auth::user()->coin ?></span></p>
    <p>Total Viewer Count<span class="pull-right"><?= $company->view_count ?></span> </p>
</div>
<div class="col-md-4 col-sm-4 col-xs-12">
    <p>Used Coin<span class="pull-right"><?= $used_coin ?></span></p>
    <p>Active Package Plan <span class="pull-right"><?= Session::get('active_package_plan_name') ?></span></p>

</div>
<div class="col-md-4 col-sm-4 col-xs-12">
    <p>Available Coin <span class="pull-right"><?= Auth::user()->left_coin ?></span></p>
</div>
</div>
</div>

</li>
<!--added by myo min-->
<li>
<div class="blog-inter">
@if( Session::get('active_package_plan_id') != 1)
 @php
      
    $date = Carbon::parse(Session::get('package_end_date'));
    $now = Carbon::now();
    $diff = $date->diffInDays($now);

    @endphp
    
    @if($diff <= 7)
        <p>Your company's {{ Session::get('active_package_plan_name') }} package will expire soon.Please renew by buying <a href="{{ route('package.index') }}" style="color:#ffcc32;"> a new company package </a>.
            Your company's projects, products and services information will not see by the people who visit to our website  if you are late to renew it until <?php  echo date('d F, Y',strtotime(Session::get('package_end_date'))) ?>.</p>
    @else
      <p>Your company's package plan is <span style="color:#ffcc32 !important;text-weight:bold;">{{ Session::get('active_package_plan_name')}} </span>. This package will expire in <B> <?php  echo date('d F, Y',strtotime(Session::get('package_end_date'))) ?></B>. </p>
    @endif
@else
<p>
    Your Company Package is Free Package.Your company's projects, products and services information will not see by the people who visit to our website.Please Buy <a href="{{ route('package.index') }}" style="color:#ffcc32;">a new company package</a>
</p>
@endif
</div>
</li>
<!--end-->
@if(Session::get('active_package_plan_id') != 1)
@if(Session::get('parent_category_id') == 1)
<li>
<div class="row our_service">
    <div class="col-md-4 col-sm-4 col-xs-4">
        <div class="post-tittle">
            <h4 class="title">Our Services</h4>
        </div>
    </div>
    <div class="col-md-8 col-sm-8 col-xs-8">
        <a type="button" href="{{route('service.create')}}" class="pull-right editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
        <a type="button" class="pull-right deleteserviceitemall mr-10"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
    </div>
</div>
</li>

<li>
<div class="row our_services">
    @foreach($company_services as $company_service)
        <div class="col-md-4 col-sm-6">
            <div class="service_list">
                @php
                    $id = $company_service->id;
                    $id = \Crypt::encrypt($id);
                    $page = 1;
                    $page =\Crypt::encrypt($page);
                @endphp
                <a class="service-show-modal" data-id="{{$company_service->id}}" data-name="{{ $company_service->service_name}}"
                   data-description="{{$company_service->service_detail}}"
                   data-image="{{ $company_service->image_name }}"
                   data-created_at="{{$company_service->created_at}}" data-updated_at="{{$company_service->updated_at}}"
                   data-url="{{ url('service/'.$id.'/'.$page.'/edit') }}">
                    <img src="{{asset('storage/service/'.$company_service->image_name)}}" alt="portfolio" class="img-responsive">
                </a>
                <label>
                    <input name="company_serviceid" type="checkbox" data-id="{{ $company_service->id }}" value="{{ $company_service->id }}"> <?= $company_service->service_name ?>
                </label>
               
            </div>
        </div>
    @endforeach

</div>
</li>
@endif
@endif
@if(Session::get('active_package_plan_id') != 1)
<li>
<div class="row our_service">
<div class="col-md-4 col-sm-4 col-xs-4">
    <div class="post-tittle">
        <h4 class="title">Our Projects</h4>
    </div>
</div>
<div class="col-md-8 col-sm-8 col-xs-8">
    <a type="button" href="{{route('project.create')}}" class="pull-right editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
    <a type="button" class="pull-right  deleteprojectitemall mr-10"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
</div>
</div>
</li>

<li>
<div class="row our_services">
@php $count=1; @endphp
@foreach($company_projects as $company_project)
    @php
        $id = $company_project->id;
        $id = \Crypt::encrypt($id);
        $page = 1;
        $page =\Crypt::encrypt($page);
    @endphp
    <div class="col-md-4 col-sm-6">
        <div class="service_list">
            <a href="{{route('project.show',['id'=>$id,'page'=>$page])}}" >
                <img src="{{ asset('storage/project/'.$company_project->photo) }}" alt="portfolio" class="img-responsive">
            </a>
            <label>
                <input name="company_projectid" type="checkbox" data-id="{{ $company_project->id }}" value="{{ $company_project->id }}"> <?= $company_project->project_name ?>
            </label>
        </div>
    </div>
    @php $count +=1 @endphp
@endforeach
</div>
</li>
@endif
@if(Session::get('active_package_plan_id') != 1)
@if(Session::get('parent_category_id') == 2)
<li>
<div class="row our_service">
<div class="col-md-4 col-sm-4 col-xs-4">
    <div class="post-tittle">
        <h4 class="title">Our Products</h4>
    </div>
</div>
<div class="col-md-8 col-sm-8 col-xs-8 ">
    <a type="button" href="{{route('product.create')}}" class="pull-right editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
    <a type="button" class="pull-right  deleteproductitemall mr-10"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
</div>
</div>
</li>

<li>
<div class="row our_services">
@php $count=1; @endphp
@foreach($company_products as $company_product)
    <div class="col-md-4 col-sm-6">
        <div class="service_list">
            @php
                $id = $company_product->id;
                $id = \Crypt::encrypt($id);
                $page = 1;
                $page =\Crypt::encrypt($page);
            @endphp
            <a class="show-modal" data-id="{{$company_product->id}}" data-code="{{$company_product->code}}"
               data-product_name="{{$company_product->product_name}}"
               data-price="{{$company_product->price}}"
               data-size="{{$company_product->size}}"
               data-current_stock="{{$company_product->current_stock}}"
               data-photo="{{ $company_product->photo }}"
               data-product_description = "{{$company_product->product_description}}"
               data-created_at="{{$company_product->created_at}}" data-updated_at="{{$company_product->updated_at}}"
               data-url="{{ url('product/'.$id.'/'.$page.'/edit') }}">
                <img src="{{ asset('storage/product/'.$company_product->photo) }}" alt="portfolio" class="img-responsive">
            </a>
            <label>
                <input name="company_productid" type="checkbox" data-id="{{ $company_product->id }}" value="{{ $company_product->id }}"> <?= $company_product->product_name ?>
            </label>
        </div>
    </div>
    @php $count +=1 @endphp
@endforeach
</div>

</li>
@endif
@endif
</div>
</div>


    <!--company profile edit start-->
    <div class="modal fade bs-example-modal-md-3" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                <h2 class="modal-title text-uppercase">Change Basic Company Information</h2>
                @include('backend.element.company_basic_profile_form')
            </div>
        </div>
    </div>
    <!--company-profile edit modal end-->
    <!--image upload-modal start-->
    <div class="modal bs-example-modal-md-1 " tabindex="-1" role="dialog" id="uploadprofileModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                <h2 class="modal-title">Upload Profile Photo</h2>
                <form id="profilephotoForm" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <center>
                            <!--<input type="file" id="image_file" name="profile_photo" accept="image/*">-->
                        </center>
                        <div id="profile_photo"></div>
                    </div>
                    <!--<p>-->
                    <!--    <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-standard upload-image" data-dismiss="modal" aria-label="Close">Upload Image</button>-->

                    <!--</p>-->

                    <div class="row" style="padding:20px">
                        <div class="col-lg-12">
                            <center>
                                <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-standard upload-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
                            </center>
                        </div>
                    </div>

                </form>
                <p>
                    <!--  <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-image" data-dismiss="modal" aria-label="Close">Upload Image</button> -->
                </p>
            </div>
        </div>
    </div>
    <!-- image upload modal end -->
    <!-- delete service-->
@endsection
@section('script')
@include('backend.element.company_basic_profile_script')

<script type="text/javascript">
           $(document).ready(function () {
        $('#table #checkall').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $("#table .checkbox").prop('checked', true);  
         } else {  
            $("#table .checkbox").prop('checked',false);  
         }  
        });

         $('#table .checkbox').on('click',function(){
            if($('#table .checkbox:checked').length == $('.checkbox').length){
                $('#table #checkall').prop('checked',true);
                
            }else{
                $('#table #checkall').prop('checked',false);
            }
         });
           });
         </script>
         <script type="text/javascript">
         $(document).ready(function () {
             $('.deleteserviceitemall').on('click',function(){
                 /*alert('hi');*/
            var company_serviceids = [];
                  $("input:checkbox[name=company_serviceid]:checked").each(function(){
                      company_serviceids.push($(this).val());
                       });
                       if (company_serviceids.length == 0) {
                            alert("please checked at least one service that you want to delete");
                       }else{
                     var conf = confirm('Are you sure want to delete?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('company.service.deleteall') }}",
                            type: 'POST',
                            data: {'ids' : company_serviceids},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                 /*  alert(data.success);
                                location.reload();*/
                                //  var message = data.success;
                                // var url = window.location.href;
                                //  callbackURL(message,url);
                                var url = window.location.href;
                                window.location=url;
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                        } 
                      }
               });
         });
         
         $(document).ready(function () {
             $('.deleteprojectitemall').on('click',function(){
                 /*alert('hi');*/
            var company_projectids = [];
                  $("input:checkbox[name=company_projectid]:checked").each(function(){
                      company_projectids.push($(this).val());
                       });
                       if (company_projectids.length == 0) {
                            alert("please checked at least one project that you want to delete");
                       }else{
                     var conf = confirm('Are you sure want to delete?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('company.project.deleteall') }}",
                            type: 'POST',
                            data: {'ids' : company_projectids},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                var url = window.location.href;
                                window.location=url;
                                //  var message = data.success;
                                // var url = window.location.href;
                                //  callbackURL(message,url);
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                        } 
                      }
               });
         });
         
          $(document).ready(function () {
             $('.deleteproductitemall').on('click',function(){
            var company_productids = [];
                  $("input:checkbox[name=company_productid]:checked").each(function(){
                      company_productids.push($(this).val());
                       });
                       
                       if (company_productids.length == 0) {
                            alert("please checked at least one product that you want to delete");
                       }else{
                           
                     var conf = confirm('Are you sure want to delete?');
                        if(conf == true){
                            $.ajax({ 
                          url: "{{ route('company.product.deleteall') }}",
                            type: 'POST',
                            data: {'ids' : company_productids},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                              /*  alert(data.success);
                                location.reload();*/
                                // var message = data.success;
                                var url = window.location.href;
                                window.location=url;
                                // callbackURL(message,url);
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                        } 
                        
                      }
               });
         });
         
         </script>
         <script src="{{ asset('admin/js/cropper/croppie.js')}}"></script>

    <script type="text/javascript">
       $(document).ready(function(){
    
        /* Business Day Hide */

        var img = '<?php echo asset('storage/company_logo/'.auth()->user()->logo) ?>';
                var image_name = '<?php echo auth()->user()->logo ?>';
                html = '<img alt="'+image_name+'" src="' + img + '" class="img-circle"/>';
                $("#current_profile_photo").html(html);
               //Image Cropping

               /* image crop */
               var resize22 = $('#profile_photo').croppie({
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
            $('#image_file').on('change', function () { 
              var reader22 = new FileReader();
                reader22.onload = function (e) {
                  resize22.croppie('bind',{
                    url: e.target.result
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
                }
                reader22.readAsDataURL(this.files[0]);
                $('#uploadprofileModal').modal('show');
            });
            $('.upload-image').on('click', function (ev) {
              resize22.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
                html = '<img src="' + img + '" />';
                $("#profile_photo").html(html);
                 $.ajax({
                   url: "{{ route('user.croppie.upload-profile') }}",
                   type: "POST",
                   data: {"image":img,'path':'company_logo'},
                   dataType: 'json',
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success: function (data) {
                    window.location.href=window.location.href;   
                        },
                   error:function(e){
                    console.log(e)
                   }
                 });
               });
             });
             
          

           $(document).ready(function(){    
              
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
          
        
             
            
            // end
            }); 
    </script>
<!--delete service end-->
<!--start product show-->
<!--image upload-modal start-->
      <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="showModal">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                   <center><h4 class="modal-title"></h4></center>
                   <div class="row">
                       <div class="col-md-offset-1 col-md-10">
                         <table class="table table-hover no-border">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <center id="photo">
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>
                                         <div id="product_name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>
                                         <div id="price">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Code</td>
                                    <td>
                                         <div id="code">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size</td>
                                    <td>
                                         <div id="size">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Current Stock</td>
                                    <td>
                                         <div id="current_stock">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>
                                         <div id="product_description">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td>
                                         <div id="created_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Updated Date</td>
                                    <td>
                                         <div id="updated_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td> 
                                      <a type="button" id="company_product-edit" href="" class="btn btn-standard editeducationBtn">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                           </table>   
                       </div>
                   </div>
                  </div>
                </div>
      </div>
<!--image upload-modal end-->
        <script type="text/javascript">
           /* Show Event  */
            $(document).on('click', '.show-modal', function() {   
                    $('.modal-title').text('Product Detail');
                    $('#product_name').html($(this).data('product_name'));
                     var APP_URL = '<?php echo url('/'); ?>';
                    if($(this).data('photo') !== ''){
                      var img='<img src="'+APP_URL+'/storage/product/'+$(this).data('photo')+'" style="width:50px;height:50px">';
                       $('#photo').html(img);
                    }else{
                       $('#photo').html('');
                    }
                    $('#code').html($(this).data('code'));
                    $('#product_description').html($(this).data('product_description'));
                    $('#price').html($(this).data('price'));
                    $('#size').html($(this).data('size'));
                    $('#current_stock').html($(this).data('current_stock'));
                    $('#created_at').html($(this).data('created_at'));
                    $('#updated_at').html($(this).data('updated_at'));
                    $("#company_product-edit").attr('href',$(this).data('url') );
                    $('#showModal').modal('show');
                });
        </script>
<!--end product show-->
<!--image upload-modal start-->
      <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="serviceshowModal">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                   <center><h4 class="modal-title"></h4></center>
                   <div class="row">
                       <div class="col-md-offset-1 col-md-10">
                         <table class="table table-hover no-border">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <center id="photo">
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>
                                         <div id="service_name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>
                                         <div id="service_description">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td>
                                         <div id="service_created_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Updated Date</td>
                                    <td>
                                         <div id="service_updated_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td> 
                                    
                                      <a type="button" id="company_service-edit" href="" class="btn btn-standard editeducationBtn">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                           </table>   
                       </div>
                   </div>
                  </div>
                </div>
      </div>
<!--image upload-modal end-->
<script type="text/javascript">
           /* Show Event  */
            $(document).on('click', '.service-show-modal', function() {   
                    $('.modal-title').text('Service Detail');
                    $('#service_name').html($(this).data('name'));
                      var APP_URL = '<?php echo url('/'); ?>';
                // $("#photo").attr('src', APP_URL+'storage/service/'+$(this).data('photo'));
                    if($(this).data('image') !== ''){
                      var img='<img src="'+APP_URL+'/storage/service/'+$(this).data('image')+'" style="width:50px;height:50px">';
                      $('#photo').html(img);
                    }else{
                      $('#photo').html('');
                    }
                    $('#service_description').html($(this).data('description'));
                    $('#service_created_at').html($(this).data('created_at'));
                    $('#service_updated_at').html($(this).data('updated_at'));
                    $("#company_service-edit").attr('href',$(this).data('url') );
                    $('#serviceshowModal').modal('show');
                });
        </script>
 @endsection