@extends('frontend.layouts.homeapp')
@section('title','Myanbox | '.$companydetail->name.' Company')
@section('content')
@if(!empty($companydetail->cover_photo))
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$companydetail->cover_photo) }}');">
@else
@if($main_category_id == 1)
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$projectsetting->service_default_background_image) }}');">
@elseif($main_category_id == 2)
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$projectsetting->supplier_default_background_image) }}');">
@elseif($main_category_id == 3)
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$projectsetting->reno_default_background_image ) }}');">
@endif
@endif
<div class="container">
<h1>{{ $companydetail->name }}</h1>
<ul class="xs-breadcumb">
@if($main_category_id == 1)
<?php
$color= $projectsetting->service_nav_first_background_and_icon;
$second_color =$projectsetting->service_nav_second_background;
$font_color =$projectsetting->service_nav_font_color;
$company_type='Service Company';
?>
@elseif($main_category_id == 2)
<?php
$color= $projectsetting->supplier_nav_first_background_and_icon;
$second_color =$projectsetting->supplier_nav_second_background;
$font_color =$projectsetting->supplier_nav_font_color;
$company_type='Supplier Company';
?>
@elseif($main_category_id == 3)
<?php
$color= $projectsetting->reno_nav_first_background_and_icon;
$second_color =$projectsetting->reno_nav_second_background;
$font_color =$projectsetting->reno_nav_font_color;
$company_type='Reno Business Company';
?>
@endif
<li><a href="{{ url('/') }}" style="color:{{ $color }} !important;">Home / </a>

@if($category_id != $main_category_id)
<a href="{{ url('/companies/'.$main_category_url.'/'.$category_url) }}" style="color:{{ $color }} !important;">  {{ $company_category_name }} / </a>
@else
<a href="{{ url('/companies/'.$category_url) }}" style="color:{{ $color }} !important;">  {{ $company_category_name }} / </a>
@endif
{{ $companydetail->name }}</li>
</ul>
</div>
</section>
<!--inner content start-->
@if($main_category_id == 1 || $main_category_id == 3)
<section class="inner-wrap service_detail">
@elseif($main_category_id == 2)
<section class="inner-wrap supplier_detail">
@endif
<!--container start-->
<div class="container">
<div class="row">
<!--row start-->
<ul class="blog-grid">

<!--col start-->
<div class="col-md-9 col-sm-12">
<li>
    <div class="blog-inter">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <figure >
                    @if($companydetail->logo != null && $companydetail->logo !='undefined')
                        <img src="{{ asset('storage/company_logo/'.$companydetail->logo) }}" alt="{{ $companydetail->name }}" class="img-responsive">
                    @else
                        @if($main_category_id == 1)
                            <?php  $default_logo = $projectsetting->service_default_logo; ?>
                        @elseif($main_category_id == 2)
                            <?php  $default_logo = $projectsetting->supplier_default_logo; ?>
                        @elseif($main_category_id == 3)
                            <?php  $default_logo = $projectsetting->reno_default_logo; ?>
                        @endif

                        <img src="{{ asset('storage/company_logo/'.$default_logo) }}" alt="{{ $companydetail->name }}" class="img-responsive">
                @endif
                <!--<div><i class="fa fa-plus"></i></div>
<a href="blog.html"></a>--> </figure>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="post-tittle">
                    <h2 style="font-size:18px;font-weight:bold;">{{ $companydetail->name }}</h2>
                </div>
                <ul class="blogDate info">
                    <li> <i class="fa fa-user" aria-hidden="true" style="color:{{ $color }} !important;"></i><span>{{ $company_type }}</span> </li>
                    <li> <i class="fa fa-envelope" aria-hidden="true" style="color:{{ $color }} !important;"></i> <span><a href="mailto:{{ empty($companydetail->email)? $companydetail->user_email: $companydetail->email }}" style="color:#acacac">{{ empty($companydetail->email)? $companydetail->user_email: $companydetail->email }}</a></span> </li>
                    
                    @if(!empty($companydetail->phone))
                    <li> <i class="fa fa-phone" aria-hidden="true" style="color:{{ $color }} !important;"></i> <span><a href="tel:{{ empty($companydetail->phone)?$companydetail->user->phone:$companydetail->phone }}" style="color:#acacac">{{ empty($companydetail->phone)?$companydetail->user->phone:$companydetail->phone }}</a></span> </li>
                    @endif
                </ul>
                <ul class="blogDate">
                    <li> <i class="fa fa-home" aria-hidden="true" style="color:{{ $color }} !important;"></i><span>@foreach($companycategories as $category)
                                {{ $category->category_name }},
                            @endforeach</span> </li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-4">
<span class="pull-right service-social">
@if(!empty($companydetail->facebook ))
<a href="{{ $companydetail->facebook }}" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
@endif
@if(!empty($companydetail->instagram))
<a href="{{ $companydetail->instagram }}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
@endif
@if(!empty($companydetail->website))
<a href="{{ $companydetail->website }}" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>
@endif
@if(!empty($companydetail->linkedin))
<a href="{{ $companydetail->linkedin }}" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
@endif
<!-- <a href="#."><i class="fa fa-pinterest-square" aria-hidden="true"></i></a> -->
</span>
                <br>
                <div class="mt90">
                    @php
                        $login_company_id = Session::has('login_company_id')?Session::get('login_company_id'):'';
                        if(!empty($login_company_id) && $companydetail->id==$login_company_id)
                            $status = 0;  // cant' send own company.
                        else
                            $status = 1;
                    @endphp
                    <a id="myBtn" data-status="{{$status}}" data-company="{{$companydetail->id}}" data-category="{{$companycategories[0]->category_id}}" data-dismiss="modal" aria-label="Close" data-toggle="modal" class="service-quotation pull-right company_detail_quotation" style="background:linear-gradient(90deg, {{ $color }} 50%, {{ $second_color }}) !important;color:{{ $font_color }} !important">Get A Quote</a>
                </div>
            </div>
        </div>
         @if(!empty($companydetail->description))
        <div class="row about_us">
            <div class="col-md-12 col-sm-12">
                <div class="post-tittle">
                    <h5>About Us<h5>
                </div>
                <p><?php echo $companydetail->description; ?></p>
            </div>
        </div>
        @endif
        @if(!empty($companydetail->service))
        <div class="row what_we_do">
            <div class="col-md-12 col-sm-12">
                <div class="post-tittle">
                    <h5>What We Do?</h5>
                </div>
                <p><?php echo $companydetail->service; ?></p>
            </div>
        </div>
        @endif
        @if(!empty($companydetail->vission))
        <div class="row what_we_do">
            <div class="col-md-12 col-sm-12">
                <div class="post-tittle">
                    <h5>Vission</h5>
                </div>
                <p><?php echo $companydetail->vission; ?></p>
            </div>
        </div>
        @endif
         @if(!empty($companydetail->mission))
        <div class="row what_we_do">
            <div class="col-md-12 col-sm-12">
                <div class="post-tittle">
                    <h5>Mission</h5>
                </div>
                <p><?php echo $companydetail->mission; ?></p>
            </div>
        </div>
        @endif
    </div>
</li>
@if(isset($servicedetails))
    @if(count($servicedetails) > 0 && ($companydetail->active_package_plan_id != 1))

        <li>
            <div class="row our_service">
                <div class="col-md-12 col-sm-12">
                    <div class="post-tittle">
                        <h4>Our Services</h4>
                    </div>
                </div>
            </div>
        </li>
        <li>

            <div class="row our_services">
                @foreach ($servicedetails as $servicedetail)
                    @if($servicedetail->image_name != null && $servicedetail->image_name != 'undefined' )
                        <div class="col-md-4 col-sm-6">
                            <div class="service_list">
                                <img src="{{ asset('storage/service/'.$servicedetail->image_name) }}" alt="portfolio" class="img-responsive">
                                <a data-toggle="collapse" href="#collapse{{ $servicedetail->id}}">
                                    <h5>{{ $servicedetail->service_name }} </h5>
                                </a>
                                <div id="collapse{{ $servicedetail->id}}" class="panel-collapse collapse">
                                    <div class="panel-body"><?php  echo $servicedetail->service_detail ?></div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </li>
    @endif
@endif
@if(isset($projectdetails))
    @if(count($projectdetails) > 0 && ($companydetail->active_package_plan_id != 1))
        <li>
            <div class="row our_service">
                <div class="col-md-12 col-sm-12">
                    <div class="post-tittle">
                        <h4>Our Project</h4>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="row our_services">
                @foreach ($projectdetails as $projectdetail)
                    @if($projectdetail->photo != null && $projectdetail->photo != 'undefined')
                        <div class="col-md-4 col-sm-6 pr10">
                            <div class="service_list">
                                <a href="{{ url('project-detail/servicecompanydetail/'.$category_url.'/'.$projectdetail->company_url.'/'.$projectdetail->project_url )}}">
                                    <img src="{{ asset('storage/project/'.$projectdetail->photo) }}" alt="portfolio" class="img-responsive">
                                    <h5>{{ $projectdetail->project_name }}</h5>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </li>
    @endif
@endif
<!-- start -->
@if(isset($productdetails))
    @if(count($productdetails) > 0 && ($companydetail->active_package_plan_id != 2))
        <li>
            <div class="row our_service">
                <div class="col-md-12 col-sm-12">
                    <div class="post-tittle">
                        <h4>Our Products</h4>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="row our_services">
                @foreach ($productdetails as $productdetail)
                    @if($productdetail->photo != null && $productdetail->photo !='undefined')
                        <div class="col-md-4 col-sm-6 pr10">
                            <div class="service_list">
                                <div class="serviceWrap" style="background:gray">
                                    <div class="overlay-shop"> <img  src="{{ asset('storage/product/'.$productdetail->photo) }}" alt="img1" class="img-responsive"></div>
                                    <div class="link-wrap"> <a href="{{ asset('storage/product/'.$productdetail->photo) }}" class="lightbox-image"><i class="fa fa-search"></i></a>
                                        <a data-dismiss="modal" aria-label="Close" data-toggle="modal" id="product-modal"
                                           class="brochure-btn theme-btn" data-photo="{{ $productdetail->photo  }}" data-name="{{ $productdetail->product_name }}"  data-price="{{ $productdetail->price }}" data-code="{{ $productdetail->code }}" data-size="{{ $productdetail->size }}" data-current-stock="{{ $productdetail->current_stock }}"
                                           data-description="{{ $productdetail->product_description }}">
                                            <i class="fa fa-asterisk"></i></a> </div>
                                </div>
                                <h5>{{ $productdetail->product_name }}</h5>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </li>
    @endif
@endif
<!-- end -->
<!-- start -->
@if($main_category_id == 3)
    @if(isset($advertisings))
        <li>
            <div style="position:relative;top:10px">
                @foreach($advertisings as $advertising)
                    <div class="col-md-5 col-sm-12" style="padding:12px;    border: 2px solid #c7c3c3;
padding: 10px;
margin-right:15px;
margin-bottom: 20px;
border-radius: 10px;">
                        <!-- <div class="side-bar"> -->
                        <!-- <div class="side-barBox"> -->
                        <!--  <ul>
                           -->
                        <!--  <li> -->
                        <a href="{{  $advertising->link }}"><img src="{{ asset('storage/advertising/'.$advertising->photo) }}" alt="{{ $advertising->company_name }}"  style="height:100%;width:100%"></a>
                        <!--  </li> -->

                        <!-- </ul> -->
                        <!-- </div> -->
                        <!-- </div> -->
                    </div>
                @endforeach
            </div>
            </li>
@endif
@endif
<!-- end -->
</div>
<li class="col-md-3 col-sm-12">
<div class="side-bar related_standard">
    <div class="panel">
        <div class="panel-heading">
            <h2 class="panel-title text-center"  style="background:linear-gradient(90deg, {{ $color }} 50%, {{ $second_color }}) !important;color:{{ $font_color}} !important">Related Companies </h2>
        </div>
        <div class="panel-body overflow">
            <div class="row service">
                <div class="col-md-12 ">
                    <div class="list-group">
                        
                       
                        @foreach($related_companies as $related_company)
                         @php
                                          
                           $category = isset($related_company->categories[0]->name)?$related_company->categories[0]->name:"";
                           $company_name=isset($related_company->user->name)?$related_company->user->name:'';
                        @endphp
                        <a href="{{ url($related_company->company_url) }}" class="list-group-item">
                                <div class="row">
                                    <div class="col-md-4 col-sm-3 col-xs-3 nopadding">
                                        @if(isset($related_company->user->logo) && !empty($related_company->user->logo) && $related_company->user->logo !='undefined')
                                            <img src="{{ asset('storage/company_logo/'.$related_company->user->logo) }}" class="img-responsive">
                                        @else
                                            @if($category == 'Service')
                                                <img src="{{ asset('storage/company_logo/'.$projectsetting['service_default_logo']) }}" alt="Service Default Logo" class="img-responsive">
                                            @elseif($category == 'Supplier')
                                                <img src="{{ asset('storage/company_logo/'.$projectsetting['supplier_default_logo']) }}" alt="Supplier Default Logo" class="img-responsive">
                                            @elseif($category == "Reno Business")
                                                <img src="{{ asset('storage/company_logo/'.$projectsetting['reno_default_logo']) }}" alt="Reno Default Logo" class="img-responsive">
                                            @else
                                                <img  class="img-responsive" src="https://ui-avatars.com/api/?name={{$company_name}}" alt="">
                                            @endif
                                        @endif

                                    </div>
                                    <div class="col-md-8 col-sm-9 col-xs-9 nopadding">
                                        <h2>{{$company_name}}</h2>
                                        <span>{{$category}}
<!--                                            --><?php
//
//                                            foreach ($related_company->categories->slice(0,1) as  $category) {
//                                                echo $category->category_name.',';
//                                            }
//
//                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($main_category_id != 3)
    @foreach($advertisings as $advertising)
        <div class="side-bar">
            <div class="advertise">
                <a href="{{  $advertising->link }}"><img src="{{ asset('storage/advertising/'.$advertising->photo) }}" alt="{{ $advertising->company_name }}" style="height:100%;width:100%"></a>
            </div>
        </div>
    @endforeach
@endif
</li>
</ul>
</div>
</div>
<!--container end-->
</section>
<!--inner content end-->
<!--brand-section start-->
@include('element.company_logo_slider')
<!--quote-modal start-->
<div class="modal fade bs-example-modal-md-2" tabindex="-1" role="dialog" id="get_detail_quote">
<div class="modal-dialog modal-md-2" role="document">
<div class="modal-content">
<div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
<h2 class="modal-title">GET A QUOTE</h2>
<form class="login-form" id="detail_next" method="post" enctype="multipart/form-data">
{{csrf_field()}}
<fieldset>
<input type="hidden" name="company_id" id="company_id">
<input type="hidden" name="category_id" id="category_id">
<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label>Budget <span class="text-danger"> * </span></label>
            <select name="budget" class="form-control">
                <option selected="selected" disabled="disabled">Budget</option>
                @foreach($ranges as $range)
                    <option value="{{ $range->id }}">{{ $range->minimum_price }} ~ {{ $range->maximum_price }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label>Project Expected To Start Date</label>
            <input type="date" name="project_expected_start_date" class="form-control" id="project_expected_start_date" placeholder="Email Address">
        </div>
    </div>
    <span class="text-danger" id="budget_label">
</span>
</div>
<div class="form-group">
    <label>Building Type<span class="text-danger"> * </span></label>
    <input type="text" name="building_type" class="form-control" id="building_type" placeholder="Building Type">
    <span class="text-danger" id="building_type_label">
</span>
</div>
<div class="form-group">
    <label>Project Information <span class="text-danger"> * </span></label>
    <textarea  rows="4" cols="50" name="project_information" class="form-control" id="project_information" placeholder="Please Ener Project Information"></textarea>
    <span class="text-danger" id="project_information_label">
</span>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <label>City<span class="text-danger"> * </span></label>
            <select class="form-control" name="city" id="city">
                <option value="">Select City</option>
                @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
            <span class="text-danger" id="city_label">
</span>
        </div>
        <div class="col-md-6 col-sm-6">
            <label>Township<span class="text-danger"> * </span></label>
            <select class="form-control" name="township" id="township">
                <option value="">Select Township</option>
            </select>
            <span class="text-danger" id="township_label">
</span>
        </div>
    </div>
</div>
<div class="form-group">
    <label>Street Address<span class="text-danger"> * </span></label>
    <input type="text" name="address" class="form-control" id="address" placeholder="Street Address">
    <span class="text-danger" id="address_label">
</span>
</div>
<div class="form-group">
    <input type="text" name="contact_name" class="form-control" id="contact_name" placeholder="Contact Person Name" maxlength="50">
</div>
<div class="form-group" id="add_more_field">
    <!-- //initially one field is set -->
    <div class="row meta-field">
        <div class="col-md-11">
            <div class="form-group">
                <input class="form-control" id="contact_email1" name="contact_email" value="" type="text" placeholder="Contact Email Address">
            </div>
        </div>
        <div class="col-md-1">
            <div class="bordered">
                <a id="service_add_more" class="pull-right"  href="#" ><i class="fa fa-plus" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="form-group" id="add_more_field1">
    <!-- //initially one field is set -->
    <div class="row meta-field1">
        <div class="col-md-11">
            <div class="form-group">
                <input class="form-control" id="contact_phone1" name="contact_phone" value="" type="text" placeholder="Contact Phone Number"  maxlength="11">
            </div>
        </div>
        <div class="col-md-1">
            <a id="service_add_more1" href="#" ><i class="fa fa-plus" aria-hidden="true"></i></a>
        </div>
    </div>
</div>

<div class="form-group">
    <label>Please Upload Your Files <small class="file_error">(Allowed file type :doc, docx,pdf,txt.Only one file in a time.)</small></label><br>
    <div class="row">
        <div class="col-md-4">
            <input type="file" name="quotation_file" class="form-control" id="quotation_file" title="No File" >
        </div>
        <div class="col-md-4">
            <input type="file" name="quotation_file1" class="form-control" id="quotation_file1">
        </div>
        <div class="col-md-4">
            <input type="file" name="quotation_file2" class="form-control" id="quotation_file2">
        </div>
    </div>

</div>
<div class="form-group">
    <input type="checkbox" id="contact_allow" name="contact_allow" value="1"><span>allow companies to contact regarding your project query</span><span class="text-danger"> * </span><br>
    <span class="text-danger" id="contact_allow_label">
</span>
</div>
<div class="form-group">
    <label for="contact_way">Prefer way to contact</label>
    <input type="checkbox" id="email_contact" name="prefer_contact_way[]"  value="email">
    <span>By email</span>
    <input type="checkbox" id="phone_contact" name="prefer_contact_way[]" value="phone"><span>By phone</span>
</div>
<div class="form-group">
    <label for="contact_way">Best time to contact</label>
    <input type="checkbox" id="best_contact_time1" name="best_contact_time[]" value="8am-12pm">
    <span>8am-12pm</span>
    <input type="checkbox" id="best_contact_time2" name="best_contact_time[]"  value="12pm-5pm"><span>12pm-5pm</span>
    <input type="checkbox" id="best_contact_time3" name="best_contact_time[]" value="5pm-9pm"><span>5pm-9pm</span>
</div>
<button class="tg-theme-btn tg-theme-btn-lg" type="submit">Next</button>
</fieldset>
</form>
</div>
</div>
</div>

<!--quote-modal start-->
<div class="modal fade bs-example-modal-md-2 product-modal-show" tabindex="-1" role="dialog">
<div class="modal-dialog modal-md-2" role="document">
<div class="modal-content" >
<div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
<h2 class="modal-title" style="text-align: center;color:black"></h2>

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-6">
<div class="single-shop-content" style="
border-right: 1px solid #cecece;
">
    <div class="img-supplierproducts"> <img src="" alt="Awesome Image" data-imagezoom="true" class="img-responsive" id="product-image"> </div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-xs-6">
<div class="content-box">
    <p style="color:Black;" id="price"></p>
    <p style="color:Black;" id="code"></p>
    <p style="color:Black;" id="size"></p>
    <p style="color:Black;" id="current_stock"></p>

</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
<h3 style="margin-left:30px;margin-bottom:5px; color:#000000;font-size: 18px;">Description</h3>
<div class="text" style="margin-left:35px;margin-bottom:5px; color:#000000;">
    <p  id="product_description"></p>

</div>
</div>
</div>
</div>
</div>
</div>
<!--quote-modal end-->
@include('element.get_quote_detail_modalbox')
@endsection
@section('script')
@include('element.get_detail_quote_script')

<script type="text/javascript">
$(document).ready(function(){
$(document).on('click', '#product-modal', function() {
// var APP_URL = '<?php echo url('/'); ?>';
$('.modal-title').html($(this).data('name'));
$('#price').html("Price :" + $(this).data('price'));
$('#code').html("Code No:" + $(this).data('code'));
$('#size').html("size :" + $(this).data('size'));
$('#current_stock').html("Stock :"+$(this).data('current-stock'));
$('#product_description').html($(this).data('description'));

$("#product-image").attr('src', APP_URL+'/storage/product/'+$(this).data('photo'));
$('.product-modal-show').modal('show');
});
});
</script>
@endsection
