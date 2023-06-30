<!DOCTYPE html>
<html lang="zxx">

<head>
<meta charset="UTF-8">
<title>Myanbox</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="Myanbox">
<meta name="keywords" content="construction, html, template, responsive, corporate">
<meta name="author"  l; ="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="{!! url('images/myanbox_fav.png') !!}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('dist/color-default.css') }}">
<link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('css/owl.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery.fancybox.css') }}" rel="stylesheet">
<link href="{{ asset('css/style_slider.css') }}" rel="stylesheet">
<link href="{{ asset('rs-plugin/css/settings.css') }}" rel="stylesheet">
 <link href="{{asset('admin/js/notiflix/notiflix-2.6.0.min.css')}}" rel="stylesheet">
<link href="{{ asset('css/custom_style.css') }}" rel="stylesheet">

 
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
<!-- summernote CSS
        ============================================ -->
<link rel="stylesheet" href="{{ asset('admin/css/summernote/summernote.css') }}">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Notifix JS
        ============================================ -->
        <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
        <script src="{{ asset('admin/js/notiflix/notiflix-2.6.0.min.js')}}"></script>
        <script src="{{ asset('admin/js/notiflix/notiflix-aio-2.6.0.min.js')}}"></script>
      <script src="{{ asset('admin/js/notiflix/commonnoti.js')}}"></script>
        
     
<script type="text/javascript">
   var APP_URL = '{!! url('/') !!}';     
  window.Laravel = { base_url: '{!! url("/") !!}', csrfToken: '{!! csrf_token() !!}'};
 </script>
</head>

  @yield('content')
  <!--footer-sec start-->
<footer class="footer-sec"> 
  <!--container start-->
  <div class="container"> 
    <!--row start-->
    <div class="row"> 
      <!--col start-->
      <div class="col-md-4 col-sm-12">
        <div class="footer-info">
          <div class="footer-logo"> <a href="{{ url('/') }}"><img class="footer-logo-default" src="{{ asset('images/logo/footer_logo.png') }}" alt=""> </a> </div>
          <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquet, massa ac ornare feugiat, nunc dui auctor ipsum, sed posuere eros sapien id quam. </p>-->
          <p>FOLLOW US</p>
          <ul class="footer-social">
            <li><a href="{{ $projectsetting->facebook_link }}" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
            <li><a href="{{ $projectsetting->facebook_link }}" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
            <li><a href="{{ $projectsetting->facebook_link }}" target="_blank"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
            <li><a href="{{ $projectsetting->linkedin_link }}" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
            <!--<li><a href="{{ $projectsetting->linkedin_link }}"><i class="fa fa-vimeo-square" aria-hidden="true"></i></a></li>-->
          </ul>
        </div>
      </div>
      <!--col end--> 
      <!--col start-->
      <div class="col-md-8"> 
        <!--row start-->
        <div class="row"> 
          <!--col start-->
          <div class="col-md-6 col-sm-6">
            <div class="footer-info">
              <h3 class="footer-title">Useful Links</h3>
              <ul class="service-link">
                <li> <a href="{{ url('/') }}">Home</a> </li>
                <li> <a href="{{ route('blogs') }}">Blog</a> </li>
                <li> <a href="{{ route('contact-us') }}">Contact Us</a> </li>
                <!-- <li> <a href="projects-four.html">About Us</a> </li> -->
                <!--<li> <a href="#">Our Policy</a> </li>-->
              </ul>
            </div>
          </div>
          <!--col end-->  
          <!--col start-->
          <div class="col-md-6 col-sm-6">
            <div class="footer-info">
              <h3 class="footer-title">Contact Us</h3>
              <ul class="footer-adress">
                <li><i class="fa fa-map-marker"></i><span>{{ $projectsetting->address }}</span></li>
                <li><i class="fa fa-phone"></i><span>Call Us :
                @php 
              $string=$projectsetting->phone;

$array  = explode(",", $string);



$no = 1;
foreach ($array as $line) {
    echo '<a href="tel:'.$line.'">'.$line.'</a>,';
    $no++;
};

                
                @endphp
                </span></li>
                <li><i class="fa fa-envelope-o"></i><span>Email : <a href="mailto:{{ $projectsetting->website_mail }}">{{ $projectsetting->website_mail }}</a></span></li>
              </ul>
            </div>
          </div>
          <!--col end--> 
        </div>
        <!--row end--> 
        
      </div>
      <!--col end--> 
      
    </div>
    <!--row end-->
    <div class="copyright-content"> 
       <!--row start-->
      <div class="row"> 
        <!--col start-->
        <div class="col-md-6 col-sm-6">
          <span>copyright @ 2020 myanbox.com Powered By<a href="https://findixmyanmar.com/"> Findix Myanmar Co., Ltd</a> </span>
        </div>
         <div class="col-md-6 col-sm-6">
             <div class="pull-right">
              <!--<span>copyright @ 2020 myanbox.com Powered By<a href="https://findixmyanmar.com/"> Findix Myanmar Co., Ltd</a> </span>-->
              <span>
                  <a href="{{ url('/privacy-policy')}}" style="color:#ffffff">Privacy Policy | </a>
              </span>
              <span>
                  <a href="{{ url('/terms-and-service')}}" style="color:#ffffff">Terms of service | </a>
              </span>
               <span>
                  <a href="{{ url('/advertise-with-us')}}" style="color:#ffffff">Advertise With Us</a>
              </span>
             </div>
        </div>
        <!--col end--> 
      </div>
      <!--row end--> 
     
    </div>
  </div>
  <!--container end--> 
</footer>
<!--footer-secn end-->
<!--login-modal start-->
<!--login-modal start-->
<div class="modal fade bs-example-modal-md-1 login-in" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
      <h2 class="modal-title">You can Login as a following account type:</h2>
          <ul class="nav nav-tabs">
    <li class="active" style="width:30%;text-align:center"><a data-toggle="tab" href="#member_login">Client</a></li>
    <li  style="width:30%;text-align:center"><a data-toggle="tab" href="#company_login">Company</a></li>
    <li    style="width:40%;text-align:center"><a data-toggle="tab" href="#freelancer_login">Professionals</a></li>
  </ul>
  <div class="tab-content">
       <div id="member_login" class="tab-pane fade in active">
         <p id="login_fail" style="color:red"></p>
      <form class="login-form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="member_login_role" name="role" value="1">
        <fieldset>
          <div class="form-group"> <i class="fa fa-envelope"></i>
            <input type="email" id="member_login_email" name="email" class="form-control" placeholder="E-mail" >
          </div>
          <div class="form-group"> <i class="fa fa-lock"></i>
            <input type="password" id="member_login_password" name="password" class="form-control" placeholder="Password">
          </div>
          <div class="form-group">
            <label>
             <!--  <input type="checkbox">
              <em>Remember Me</em> --> </label>
            <a class="forgetpassword" href="{{ url('/password/reset') }}"> <em>Forgot Password</em> <i class="fa fa-question-circle"></i> </a> </div>
          <button class="tg-theme-btn tg-theme-btn-lg" id="member_login_form" type="button">login</button>            
        </fieldset>
      </form>
      <p>Not a Member?
        <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md">Create an Account</button>
      </p>
      </div>
         <!--start-->
          <div id="company_login" class="tab-pane fade">
         <p id="login_fail" style="color:red"></p>
      <form class="login-form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="company_login_role" name="role" value="2">
        <fieldset>
          <div class="form-group">
               <i class="fa fa-envelope"></i>
            <input type="email" id="company_login_email" name="email" class="form-control" placeholder="E-mail" >
          </div>
          <div class="form-group"> <i class="fa fa-lock"></i>
            <input type="password" id="company_login_password" name="password" class="form-control" placeholder="Password">
          </div>
          <div class="form-group">
            <label>
             <!--  <input type="checkbox">
              <em>Remember Me</em> --> </label>
            <a class="forgetpassword" href="{{ url('/password/reset') }}"> <em>Forgot Password</em> <i class="fa fa-question-circle"></i> </a> </div>
          <button class="tg-theme-btn tg-theme-btn-lg" id="company_login_form" type="button">login</button>            
        </fieldset>
      </form>
      <p>Not a Member?
        <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md">Create an Account</button>
      </p>
      </div>
         <!--end-->
          <!--start-->
          <div id="freelancer_login" class="tab-pane fade">
         <p id="login_fail" style="color:red"></p>
      <form class="login-form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="freelancer_login_role" name="role" value="3">
        <fieldset>
          <div class="form-group"> <i class="fa fa-envelope"></i>
            <input type="email" id="freelancer_login_email" name="email" class="form-control" placeholder="E-mail" >
          </div>
          <div class="form-group"> <i class="fa fa-lock"></i>
            <input type="password" id="freelancer_login_password" name="password" class="form-control" placeholder="Password">
          </div>
          <div class="form-group">
            <label>
             <!--  <input type="checkbox">
              <em>Remember Me</em> --> </label>
            <a class="forgetpassword" href="{{ url('/password/reset') }}"> <em>Forgot Password</em> <i class="fa fa-question-circle"></i> </a> </div>
          <button class="tg-theme-btn tg-theme-btn-lg" id="freelancer_login_form" type="button">login</button>            
        </fieldset>
      </form>
      <p>Not a Member?
        <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md">Create an Account</button>
      </p>
      </div>
         <!--end-->
      
      </div>
    </div>
  </div>
</div> 
<!--login-modal end--> 
<!--registration-modal start-->
<div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <!-- tab start -->
     
<!-- tab end -->
      <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
      <h2 class="modal-title">You can register as a following account type:</h2>

         <ul class="nav nav-tabs">
    <li class="active" style="width:30%;text-align:center"><a data-toggle="tab" href="#member_reg">Client</a></li>
    <li  style="width:30%;text-align:center"><a data-toggle="tab" href="#company_reg">Company</a></li>
    <li    style="width:40%;text-align:center"><a data-toggle="tab" href="#freelancer_reg">Professionals</a></li>
  </ul>
     <div class="tab-content">
      <!-- member register form start -->
        <div id="member_reg" class="tab-pane fade in active">
           <form class="login-form" method="post"  id="member_reg_form">        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="hidden" name="role" id="register_role" value="1">
        <fieldset>
          <div class="form-group">
            <input type="text" name="name" id="register_name" class="form-control" placeholder="Name">
            <span class="register_error" id="member_register_name_error"></span>
          </div>
          <div class="form-group">
            <input type="email" name="email" id="register_email" class="form-control" placeholder="E-mail" autocomplete="off">
            <span class="register_error" id="member_register_email_error"></span>
          </div>          
          <div class="form-group">
            <input type="text" name="phone" id="register_phone" class="form-control" placeholder="Phone">
            <span class="register_error" id="member_register_phone_error"></span>
          </div>

         
          <div class="form-group">
            <input type="password" name="password" id="register_password" class="form-control" placeholder="Password" autocomplete="off">
            <span class="register_error" id="member_register_password_error"></span>
          </div>

          <div class="form-group">
            <input type="password" name="confirm_password" id="register_confirm_password" class="form-control" placeholder="Confirm Password"  >
            <span class="register_error" id="member_register_confirm_password_error"></span>
          </div>          
          
          <button class="tg-theme-btn tg-theme-btn-lg" id="register_form" type="submit">Create an Account</button>
        </fieldset>
      </form>
        </div>
        <!-- member register form end -->
        <!-- company register form start -->
        <div id="company_reg" class="tab-pane fade">
             <form class="login-form" method="post" id="company_reg_form">        
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="role" id="register_role" value="2">
        <fieldset>
          <div class="form-group">
            <input type="text" name="name" id="register_name" class="form-control" placeholder="Company Name">
            <span class="register_error" id="company_register_name_error"></span>
          </div>
          <div class="form-group">
            <input type="email" name="email" id="register_email" class="form-control" placeholder="E-mail">
            <span class="register_error" id="company_register_email_error"></span>
          </div>          
          <div class="form-group">
            <input type="text" name="phone" id="register_phone" class="form-control" placeholder="Phone"  >
            <span class="register_error" id="company_register_phone_error"></span>
          </div>

         
          <div class="form-group">
            <select name="category_id" id="category_id" class="form-control">
              <option value="1">Service Company</option>
              <option value="2">Supplier Company</option>
              <option value="3">Reno Business Company</option>
            </select>
          </div>
          <div class="form-group">
            <input type="password" name="password" id="register_password" class="form-control" placeholder="Password"  >
            <span class="register_error" id="company_register_password_error"></span>
          </div>

          <div class="form-group">
            <input type="password" name="confirm_password" id="register_confirm_password" class="form-control" placeholder="Confirm Password"  >
            <span class="register_error" id="company_register_confirm_password_error"></span>
          </div>          
          
          <button class="tg-theme-btn tg-theme-btn-lg" id="register_form" type="submit">Create an Account</button>
        </fieldset>
      </form>
        </div>
        <!-- company register form end -->
        <!-- freelancer register form start -->
        <div id="freelancer_reg" class="tab-pane fade">
            <form class="login-form" method="post" id="freelancer_reg_form">        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="role" id="register_role" value="3">
        <fieldset>
          <div class="form-group">
            <input type="text" name="name" id="name" class="form-control" placeholder="Freelancer Name" >
            <span class="register_error" id="freelancer_register_name_error"></span>
          </div>
          <div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail">
            <span class="register_error" id="freelancer_register_email_error"></span>
          </div>          
          <div class="form-group">
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" >
            <span class="register_error" id="freelancer_register_phone_error"></span>
          </div>          
          <div class="form-group">
            <input type="password" name="password" id="register_password" class="form-control" placeholder="Password" >
            <span class="register_error" id="freelancer_register_password_error"></span>
          </div>

          <div class="form-group">
            <input type="password" name="confirm_password" id="register_confirm_password" class="form-control" placeholder="Confirm Password" >
            <span class="register_error" id="freelancer_register_confirm_password_error"></span>
          </div>          
          
          <button class="tg-theme-btn tg-theme-btn-lg" id="register_form" type="submit">Create an Account</button>
           
       <a  style="background:#0B85EE !important;" id="register_form" class="tg-theme-btn tg-theme-btn-lg" href="{{ route('social_login',['provider'=>'facebook']) }}" id="icon">
					<i class="fa fa-facebook"></i> Register With Facebook
				</a>
			
			<a style="background:#0077B5 !important;" id="register_form" class="tg-theme-btn tg-theme-btn-lg" href="{{ route('social_login', ['provider'=>'linkedin']) }}" id="icon">
					<i class="fa fa-linkedin"></i> Register With Linkedin 
				</a>
        </fieldset>
      </form>
     <!--     <a  style="background:#0B85EE !important" id="register_form" class="tg-theme-btn tg-theme-btn-md" href="{{ route('social_login',['provider'=>'facebook']) }}" id="icon">-->
					<!--	<i class="fa fa-facebook"></i>Register With Facebook-->
					<!--</a>-->

					<!--<a href="{{ route('social_login', ['provider'=>'linkedin']) }}" id="icon">-->
					<!--	<i class="fa fa-linkedin"></i>-->
					<!--</a-->
        </div>
        <!-- freelancer register end -->
     </div>
     
      <p>Already a Member?
        <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md-1">Login Here</button>
      </p>
    </div>
  </div>
</div>
<!--registration-modal end--> 
<!--quote-modal start-->
<div class="modal fade bs-example-modal-md-2" tabindex="-1" role="dialog" id="get_quote">
    <div class="modal-dialog modal-md-2" role="document">
        <div class="modal-content">
            <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()">Close (X)</a></div>
            <h2 class="modal-title">GET A QUOTE</h2>
            <form class="login-form" id="next" enctype="multipart/form-data">
                {{csrf_field()}}
                <fieldset>
                    <div class="form-group">
                        <label class="project_type_label">Project Type :</label>
                        <input type="radio" name="category_id" class ="company_category_id" value="1" checked>  <span class="project_type_label">Service</span>
                        <input type="radio" name="category_id" class ="company_category_id" value="2">  <span class="project_type_label">Supplier</span>
                        <input type="radio" name="category_id" class ="company_category_id" value="3">  <span class="project_type_label">Reno Business</span>
                    </div>
                    <div class="service_category">
                        @foreach($serviceCategories as $service_category)
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="company_subcategory_id" id="subcategory_id_{{$service_category->id}}" type="checkbox" name="subcategory_id[]" value="{{$service_category->id}}">  <span>{{$service_category->name}}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="supplier_category" style="display: none;">
                        @foreach($supplierCategories as $supplier_category)
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="company_subcategory_id" id="subcategory_id_{{$supplier_category->id}}" type="checkbox" name="subcategory_id[]" value="{{$supplier_category->id}}">  <span>{{$supplier_category->name}}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="reno_category" style="display: none;">
                        @foreach($renobusinessCategories as $reno_category)
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="company_subcategory_id" id="subcategory_id_{{$reno_category->id}}" type="checkbox" name="subcategory_id[]" value="{{$reno_category->id}}">  <span>{{$reno_category->name}}</span>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    <span class="text-danger pull-left" id="category_label">
            </span>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Budget<span class="text-danger"> * </span></label>
                                <select name="budget" class="form-control">
                                    <option selected="selected" disabled="disabled">Budget</option>
                                    @foreach($ranges as $range)
                                        <option value="{{ $range->id }}">{{ $range->minimum_price }} ~ {{ $range->maximum_price }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Project Expected To Start Date</label>
                                <input type="date" name="project_expected_start_date" class="form-control" min="<?php echo date("Y-m-d"); ?>" id="project_expected_start_date" placeholder="Email Address">
                            </div>
                        </div>
                        <small class="text-danger" id="budget_label">
                        </small>
                    </div>
                    <div class="form-group">
                        <label>Building Type <span class="text-danger"> * </span></label>
                        <input type="text" name="building_type" class="form-control" id="building_type" placeholder="Building Type">
                        <small class="text-danger" id="building_type_label">
                        </small>
                    </div>
                    <div class="form-group">
                        <label>Project Information<span class="text-danger"> * </span></label>
                        <textarea  rows="4" cols="50" name="project_information" class="form-control" id="project_information" placeholder="Please Enter Project Information" style="resize: none;"></textarea>
                        <small class="text-danger" id="project_information_label">
                        </small>
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
                                <small class="text-danger" id="city_label">
                                </small>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <label>Township<span class="text-danger"> * </span></label>
                                <select class="form-control" name="township" id="township">
                                    <option value="">Select Township</option>
                                </select>
                                <small class="text-danger" id="township_label">
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Street Address<span class="text-danger"> * </span></label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Street Address">
                        <small class="text-danger" id="address_label">
                        </small>
                    </div>
                    <div class="form-group">
                        <label>Contact Person Name</span></label>
                        <input type="text" name="contact_name" class="form-control" id="contact_name" placeholder="Contact Person Name" maxlength="50">
                    </div>
                    <div class="form-group" id="add_more_field">
                        <!-- //initially one field is set -->
                        <label>Contact Email Address</label>
                        <div class="row meta-field">
                            <div class="col-md-11 col-sm-10 col-xs-10">
                                <div class="form-group">
                                    <input class="form-control" id="contact_email1" name="contact_email" value="" type="email" placeholder="Contact Email Address">
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-2 col-xs-2">
                                <div class="bordered">
                                    <a class="add_more" class="pull-right"  href="#" ><i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="add_more_field1">
                        <label>Contact Phone Number<span class="text-danger"> * </span></label>
                        <!-- //initially one field is set -->
                        <div class="row meta-field1">
                            <div class="col-md-11 col-sm-10 col-xs-10">
                                <div class="form-group">
                                    <input class="form-control" id="contact_phone1" name="contact_phone" value="" type="number" placeholder="Contact Phone Number"  maxlength="11">
                                    <small class="text-danger" id="contact_phone_label"></small>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-2 col-xs-2">
                                <a class="add_more1" href="#" ><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Please Upload Files <small class="file_error">(Allowed file type :doc, docx,pdf,txt.)</small></label>
                            </div>
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
                        <input type="checkbox" id="contact_allow" name="contact_allow" value="1">  <span>Allow companies to contact regarding your project query<span class="text-danger"> * </span></span><br>
                        <small class="text-danger" id="contact_allow_label">
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="contact_way" class="pr-10">Prefer way to contact<span class="text-danger">*</span></label><br>
                            <input type="checkbox" id="email_contact" name="prefer_contact_way[]"  value="email">  <span>By email</span>
                            <input type="checkbox" id="phone_contact" name="prefer_contact_way[]" value="phone">  <span>By phone</span>
                        <div class="pull-left" style="width: 100%">
                            <small class="text-danger pull-left" id="prefer_contact_way_label"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact_way" class="pr-17">Best time to contact<span class="text-danger">*</span></label><br>
                        <input type="checkbox" id="best_contact_time1" name="best_contact_time[]" value="8am-12pm">  <span>8am-12pm</span>
                        <input type="checkbox" id="best_contact_time2" name="best_contact_time[]"  value="12pm-5pm">  <span>12pm-5pm</span>
                        <input type="checkbox" id="best_contact_time3" name="best_contact_time[]" value="5pm-9pm">  <span>5pm-9pm</span>
                        <div class="pull-left" style="width: 100%">
                            <small class="text-danger" id="best_contact_time_label"></small>
                        </div>
                    </div>

                    <button class="tg-theme-btn tg-theme-btn-lg" type="submit">Next</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<!--quote-modal end-->
</div>
<!--scroll-to-top start-->
<!--jquery start--> 
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-up"></span></div>

<script src="{{ asset('js/jquery-2.1.4.min.js')  }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script> 
<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script> 
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script> 
<script src="{{ asset('js/jquery.fancybox8cbb.js?v=2.1.5') }}"></script> 
<script src="{{ asset('js/owl.carousel.js') }}"></script> 
<script src="{{ asset('rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script> 
<script src="{{ asset('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script> 
<script src="{{ asset('js/counter.js') }}"></script> 
<script src="{{ asset('js/script.js') }}"></script>
 <script type="text/javascript">
  $('.navbar-btn').click(function(){
    if('<?php echo(Auth::user()) ?>' == ""){
        $('#get_quote').modal('hide');
         var message = "Please login in";
         callbackError(message);
    }
   
    else{
       $('#get_quote').modal('show');
    }
  });
   $('.head-quote').click(function(){
    if('<?php echo(Auth::user()) ?>' == ""){
        $('#get_quote').modal('hide');
        var message = "Please login in";
        callbackError(message);
    }
    else{
        $('#get_quote').modal('show');
    }
  });

  function addField(field,name,placeholder,value,count)
  {
      $(field).append('<div class="row meta-field"><div class="col-md-11"><div class="form-group"><input class="form-control" id="'+name+count+'" type="'+value+'" name="'+name+'"  placeholder="'+placeholder+'"></div></div><div class="col-md-1"><a href="#" class="add_more_close"><i class="fa fa-minus" aria-hidden="true"></i></a></div></div>');
  }
  var email_count = 1,phone_count=1;
   $("#get_quote .add_more,#get_quote_detail .add_more").click(function(){
      addField($(this).parents('[id *= add_more_field]'),'contact_email','Other Contact Email Address','email',++email_count);
      $("#get_quote .add_more_close,#get_quote_detail .add_more_close").click(function(){
              $(this).parents(".meta-field").remove();
              return false;
         });
      return false;
  });
  $("#get_quote .add_more1,#get_quote_detail .add_more1").click(function(){
      addField($(this).parents('[id *= add_more_field]'),'contact_phone','Other Contact Phone Number','number',++phone_count);
      $("#get_quote .add_more_close, #get_quote_detail .add_more_close").click(function(){
              $(this).parents(".meta-field").remove();
              return false;
         });
      return false;
  });

 /* Send Quotation start*/
 $('input[type=radio][name=category_id]').change(function(){
                 var category_id = $(this).val();
                if(category_id == 1)
                {
                  $('.service_category').show();
                  $('.supplier_category').hide();
                  $('.reno_category').hide();
                }
                else if(category_id == 2)
                {
                  $('.supplier_category').show();
                  $('.service_category').hide();
                  $('.reno_category').hide();
                }
                else if (category_id == 3) {
                  $('.reno_category').show();
                  $('.supplier_category').hide();
                  $('.service_category').hide();
                }



                //$("#default_company_subcategory_id").hide();     
                $("input[name=category_id]").next().css('color', '#959595');
                $("input[name=category_id]:checked").next().css('color', '#000');
        // $.ajax({
        //           type : 'get',
        //           url : "{{ URL :: route('home.getChildCategory')}}",
        //           data : {id:$(this).val(),type:'category_id'},
        //           success : function(data){
        //               var subcategory= data[0].sub_category;
        //               var company    = data[0].company;
        //               var subcategory_list ="";
        //               if(subcategory.length >=1)
        //               {
        //                 for(var i=0; i<=subcategory.length;i++){
                            
        //                   subcategory_list +='<div class="col-md-6"><input class="company_subcategory_id" id="subcategory_id_'+subcategory[i].id+'" type="checkbox" name="subcategory_id[]" value="'+subcategory[i].id+'"><span> '+subcategory[i].name+"</span></div> ";
                              
        //                   $('#company_subcategory_id').html(subcategory_list);
        //               } 
        //               }
        //           },
        //           error:function(e)
        //           {
        //               console.log(e)
        //           }
        //       });   
    
    });
  /* City & Township Dynamic */
    /*function for get township id according to city */
           function getTownshipByCity(city){
            var option = "";
               $.ajax({
                   type : 'get',
                   url : "{{ URL :: route('location.getTownship')}}",
                   data : {'city_id':city},
                   success : function(data){
                        option += '<option selected="selected" disabled="disabled">Select Township</option>';
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
           function checkFileType(file_pointer){
            var fileExtension = ['doc', 'docx', 'pdf', 'txt'];
            if ($.inArray($(file_pointer).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
               $(file_pointer).css('border','1px solid red');
               $('.file_error').css('color','red');
               $(file_pointer).val("");
            }else{
                $('.file_error').css('color','#acacac');
                $(file_pointer).css('border','1px solid #acacac');
            }
           }
        $('#quotation_file').change(function(){
              checkFileType('#quotation_file');   
          });
         $('#quotation_file1').change(function(){
              checkFileType('#quotation_file1');   
          });
         $('#quotation_file2').change(function(){
              checkFileType('#quotation_file2');   
          });
      $('form#next').on('submit',function(e){
         e.preventDefault();   
          var phone=""; 
          var email=""; 
          var phone_count = 1,email_count=1;
                  $("[id*= contact_phone]").each(function() {
                    var name = $('#contact_phone' +phone_count).val();
                    if(typeof(name) !== "undefined"){
                      phone +=name +", ";  
                    }
                    phone_count++;
                });
                $("[id*= contact_email]").each(function() {
                    var name = $('#contact_email' +email_count).val();
                    if(typeof(name) !== "undefined"){
                      email += name +", ";     
                    }
                    email_count++;
                });
                
               
                data = new FormData(this);
                data.append('email', email);
                data.append('phone',phone);
                data.append('quotation_file',$('input[name=quotation_file]').val());
                data.append('quotation_file1',$('input[name=quotation_file1]').val());
                data.append('quotation_file2',$('input[name=quotation_file2]').val());
                data.append('type',1); // 1 mean send quote from home page
         $.ajax({
                type: "post",
                url: "{{ URL::route('company.send_quotation_data') }}",
                data:data,
                contentType:false,
                cache:false,
                processData:false,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data)
                {
                    console.log(data.errors);
                  console.log(data);
                    if($.isEmptyObject(data.errors)){
                     window.location.href="{{route('company.send_quotation_form')}}";
                    }
                    else{
                      if(data.errors.category_id){
                       $('#category_label').html(data.errors.category_id);
                     }
                     if(data.errors.building_type){
                       $('#building_type_label').html(data.errors.building_type);
                     }
                     if(data.errors.city){
                       $('#city_label').html(data.errors.city);
                     }
                      if(data.errors.township){
                       $('#township_label').html(data.errors.township);
                     }
                      if(data.errors.address){
                       $('#address_label').html(data.errors.address);
                     }
                      if(data.errors.project_information){
                       $('#project_information_label').html(data.errors.project_information);
                     }
                      if(data.errors.budget){
                       $('#budget_label').html(data.errors.budget);
                     }
                     if(data.errors.budget){
                       $('#contact_phone_label').html(data.errors.contact_phone);
                     }
                     if(data.errors.contact_allow){
                      $('#contact_allow_label').html(data.errors.contact_allow);
                     }
                     if(data.errors.prefer_contact_way){
                      $('#prefer_contact_way_label').html(data.errors.prefer_contact_way); 
                     }
                      if(data.errors.best_contact_time){
                      $('#best_contact_time_label').html(data.errors.best_contact_time); 
                     }
                    }
                 },
                error:function(e)
                {
                  console.log();
                  //alert('Something Wrong');
                 // location.reload();
                }
              });
      })
  
$(".form-control").keyup(function(){

    if ($(this).val() !== ''){
        $(this).css('color', '#000');
    } else {
        $(this).css('color', '#959595');
    }
});
$('select,input[type=date]').change(function(){
  if ($(this).val() !== ''){
        $(this).css('color', '#000');
    } else {
        $(this).css('color', '#959595');
    }
});
$('#best_contact_time1,#best_contact_time2,#best_contact_time3,#email_contact,#phone_contact,#contact_allow,[id*=subcategory_id]').change(function(){
    if($(this).is(":checked"))
      $(this).next().css('color','#000');
    else
      $(this).next().css('color','#959595');
})
 /* Send Quotation End */
  $(document).ready(function() {
         $('#carousel-tilenav').carousel();
         $('#carousel1').carousel();
     });

(function(){
  $('.carousel-showmanymoveone .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<6;i++) {
      itemToClone = itemToClone.next();

      // wrap around if at end of item collection
      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }

      // grab item, clone, add marker class, add to collection
      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
}());

(function(){
  $('.carousel1 .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<4;i++) {
      itemToClone = itemToClone.next();

      // wrap around if at end of item collection
      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }

      // grab item, clone, add marker class, add to collection
      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
}());



 </script>
 <!-- Notifix JS
        ============================================ -->
        <script src="{{ asset('admin/js/notiflix/notiflix-2.6.0.min.js')}}"></script>
        <script src="{{ asset('admin/js/notiflix/notiflix-aio-2.6.0.min.js')}}"></script>
       
        
        <script type="text/javascript">
function callbackURL(message, url) 
{ 
    Notiflix.Notify.Init({position:"center-top",width:"70%"});
    Notiflix.Notify.Success(message);
    setTimeout(function(){
        window.location = url;
      }, 2000);
}

function callbackError(message) 
{ 
    Notiflix.Notify.Init({position:"center-top",width:"70%"});
    Notiflix.Notify.Failure(message);
     setTimeout(function(){
       // window.location = url;
      }, 2000);  
}

</script>

 <script type="text/javascript">
  $(document).ready(function(){
  
  
$('#member_login_form').on('click',function(e){
    var $this=$(this);
   $this
         .attr('disabled','disabled');
          setTimeout(function() {
            $this.removeAttr('disabled');
        }, 3000);
        
e.preventDefault();
var formData = {
    email: $('#member_login_email').val(),
    password: $('#member_login_password').val(),
    role:$('#member_login_role').val(),
}
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    $.ajax({
        type: "POST",
        url:APP_URL+"/login",
        data: formData,
        success: function (data) {
           if(data.success === false){
                var message = data.message;
            callbackError(message);
            
             //  $("#login_fail").html(data.message);
           }else{
                var message = "Login successfully!";
                var url = window.location.href;
                // var url = APP_URL+"/freelancer/profile";
                callbackURL(message,url);
           }
        },
        error: function (data) {
          //  var message = data.message;
          //  callbackError(message);
             $("#login_fail").html(data.message);
        }
    });

});
$('#company_login_form').on('click',function(e){
      var $this=$(this);
   $this
         .attr('disabled','disabled');
          setTimeout(function() {
            $this.removeAttr('disabled');
        }, 3000);
e.preventDefault();
var formData = {
    email: $('#company_login_email').val(),
    password: $('#company_login_password').val(),
    role:$('#company_login_role').val(),
}
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    $.ajax({
        type: "POST",
        url:APP_URL+"/login",
        data: formData,
        success: function (data) {
           if(data.success === false){
                var message = data.message;
            callbackError(message);
            
             //  $("#login_fail").html(data.message);
           }else{
                  var message = "Login successfully!";
                                var url = window.location.href;
                                // var url = APP_URL+"/freelancer/profile";
                                 callbackURL(message,url);
           }
        },
        error: function (data) {
           // var message = data.message;
          //  callbackError(message);
            $("#login_fail").html(data.message);
        }
    });

});
$('#freelancer_login_form').on('click',function(e){
      var $this=$(this);
   $this
         .attr('disabled','disabled');
          setTimeout(function() {
            $this.removeAttr('disabled');
        }, 3000);
e.preventDefault();
var formData = {
    email: $('#freelancer_login_email').val(),
    password: $('#freelancer_login_password').val(),
    role:$('#freelancer_login_role').val(),
}
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    $.ajax({
        type: "POST",
        url:APP_URL+"/login",
        data: formData,
        success: function (data) {
           if(data.success === false){
                var message = data.message;
            callbackError(message);
            
             //  $("#login_fail").html(data.message);
           }else{
              
                  var message = "Login successfully!";
                  var url = window.location.href;
                               // var url = APP_URL+"/freelancer/profile";
                                 callbackURL(message,url);
                
           }
        },
        error: function (data) {
           // var message = data.message;
           // callbackError(message);
            $("#login_fail").html(data.message);
        }
    });

});
 $('#member_reg_form').on('submit',function(e){
e.preventDefault();
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    $.ajax({
        type: "POST",
        url:APP_URL+"/register",
        data:  $('#member_reg_form').serialize(),
        success: function (data) {
            if(data.success === true){
                 var message = "You have successfully signed up!";
                                var url = APP_URL+"/user/dashboard";
                                 callbackURL(message,url);
            }else{
                 if(data.errors.name){
                   $('#member_register_name_error').html(data.errors.name);
                 }
                 if(data.errors.email){
                   $('#member_register_email_error').html(data.errors.email);
                 }
                 if(data.errors.phone){
                   $('#member_register_phone_error').html(data.errors.phone);
                 }
                 if(data.errors.role){
                   $('#member_register_role_error').html(data.errors.role);
                 }
                 if(data.errors.password){
                   $('#member_register_password_error').html(data.errors.password);
                 }
                 if(data.errors.confirm_password){
                   $('#member_register_confirm_password_error').html(data.errors.confirm_password);
                 }
            }
        },
        error: function (data) {
            var message = "You have error when register!";
            callbackError(message); 
            
        /* alert('You have Error When Register');*/
        }
    });

});

  $('#company_reg_form').on('submit',function(e){
e.preventDefault();
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    $.ajax({
        type: "POST",
        url:APP_URL+"/register",
        data:  $('#company_reg_form').serialize(),
        success: function (data) {
            if(data.success === true){
                var message = "You have successfully signed up!";
                                var url = APP_URL+"/company/edit";
                                 callbackURL(message,url);
              
            }else{
                console.log(data.errors);
                 if(data.errors.name){
                   $('#company_register_name_error').html(data.errors.name);
                 }
                 if(data.errors.email){
                   $('#company_register_email_error').html(data.errors.email);
                 }
                 if(data.errors.phone){
                   $('#company_register_phone_error').html(data.errors.phone);
                 }
                 if(data.errors.role){
                   $('#company_register_role_error').html(data.errors.role);
                 }
                 if(data.errors.password){
                   $('#company_register_password_error').html(data.errors.password);
                 }
                 if(data.errors.confirm_password){
                   $('#company_register_confirm_password_error').html(data.errors.confirm_password);
                 }
            }
        },
        error: function (data) {
             var message = "You have error when register!";
            callbackError(message); 
            
           //alert('You have Error When Register');
        }
    });

});

    $('#freelancer_reg_form').on('submit',function(e){
e.preventDefault();
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    $.ajax({
        type: "POST",
        url:APP_URL+"/register",
        data:  $('#freelancer_reg_form').serialize(),
        success: function (data) {
            if(data.success === true){
                 var message = "You have successfully signed up!";
                                var url = APP_URL+"/freelancer/update";
                                 callbackURL(message,url);
                                 
                 // alert('You Have Successfully Signed Up');
               // window.location=APP_URL+"/freelancer/profile";             
            }else{
                 if(data.errors.name){
                   $('#freelancer_register_name_error').html(data.errors.name);
                 }
                 if(data.errors.email){
                   $('#freelancer_register_email_error').html(data.errors.email);
                 }
                 if(data.errors.phone){
                   $('#freelancer_register_phone_error').html(data.errors.phone);
                 }
                 if(data.errors.role){
                   $('#freelancer_register_role_error').html(data.errors.role);
                 }
                 if(data.errors.password){
                   $('#freelancer_register_password_error').html(data.errors.password);
                 }
                 if(data.errors.confirm_password){
                   $('#freelancer_register_confirm_password_error').html(data.errors.confirm_password);
                 }
            }
        },
        error: function (data) {
                var message = "You have error when register!";
            callbackError(message); 
            
           //alert('You have Error When Register');
        }
    });

});


        

//           function dynamicChange(onChangeId,showId,sendDataId)
//           {
//               var option="";
//               $.ajax({
//                   type : 'get',
//                   url : "{{ URL :: route('home.getChildCategory')}}",
//                   data : {id:onChangeId,type:sendDataId},
//                   success : function(data){
//                       if(sendDataId == "category_id")
//                         option += '<option selected="selected" disabled="disabled">Sub Category</option>';

//                       for(var i=0; i<data.length;i++){
//                         option += '<option value="'+ data[i].id+'">';
//                           if(sendDataId == "category_id")
//                             option += data[i].name;
//                           else
//                               option += data[i].user.name;
//                         option +='</option>';

//                       }
//                       console.log(option);
//                       $(showId).html(option);

//                   },
//                   error:function(e)
//                   {
//                       console.log(e)
//                   }
//               });
//           }
//               $('#company_category_id').change(function(){
//               dynamicChange($(this).val(),'#company_subcategory_id','category_id');
//               }); 
//               $('#company_subcategory_id').change(function(){
//               dynamicChange($(this).val(),'#received_company','subcategory_id');
//               });


//   $('form#send_quotation').on('submit',function(e){
   
//       e.preventDefault();
     
//      $.ajax({
//             type: "post",
//             url: "{{ URL::route('company.send_quotation') }}",
//             data: new FormData(this),
//             contentType:false,
//             cache:false,
//             processData:false,
//             dataType: 'json',
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             success:function(data)
//             {
//                 if($.isEmptyObject(data.errors)){
//                   alert(data.success);
//                   location.reload();
//                 }
//                 else{
//                   alert(data.errors);
//                   location.reload();
//                 } 
//              },
//             error:function(e)
//             {
//               alert('Something Wrong');
//               // location.reload();
//             }
//           });
//     });



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
});

        </script>
<style type="text/css">
  .register_error{
    color: red;
    font-size: 13px;
  }
</style>
</body>

</html>