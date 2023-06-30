<!DOCTYPE html>
<html lang="zxx">

<head>
<meta charset="UTF-8">
<title>@yield('title')</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="Myanbox">
<meta name="keywords" content="construction, html, template, responsive, corporate">
<meta name="author"  l; ="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="{!! url('images/myanbox_fav.png') !!}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="referrer" content="no-referrer" />
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
@yield('extra_css')
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
<body>
   
    <div class="page-wrapper">
        <!--preloader start-->
        <div class="preloader"></div>
        <!--preloader end-->
            @include('element.header')
            <!--main-header end-->
            @yield('content')
    </div>
</body>
  @include('element.footer')
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
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" id="member_login_password" name="password" class="form-control" placeholder="Password">
            <span class="input-group-addon">
              <i class="fa fa-eye-slash eye_icon" aria-hidden="true" onclick="Show('#member_login #member_login_password','#member_login .eye_icon')"></i>
            </span>
          </div>


          <!-- <div class="form-group"> <i class="fa fa-lock"></i>
            <input type="password" id="member_login_password" name="password" class="form-control" placeholder="Password">
          </div> -->
          <div class="form-group">
            <label>
             <!--  <input type="checkbox">
              <em>Remember Me</em> --> </label>
               @php
                $rol1 =  \Crypt::encrypt(1);
                @endphp
            <a class="forgetpassword" href="{{ url('/reset/mail/'.$rol1) }}"> <em>Forgot Password</em> <i class="fa fa-question-circle"></i> </a> </div>
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
         <!--  <div class="form-group"> <i class="fa fa-lock"></i>
            <input type="password" id="company_login_password" name="password" class="form-control" placeholder="Password">
          </div> -->
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" id="company_login_password" name="password" class="form-control" placeholder="Password">
            <span class="input-group-addon">
              <i class="fa fa-eye-slash eye_icon" aria-hidden="true" onclick="Show('#company_login #company_login_password','#company_login .eye_icon')"></i>
            </span>
          </div>

          <div class="form-group">
            <label>
             <!--  <input type="checkbox">
              <em>Remember Me</em> --> </label>
                @php
                $rol2 =  \Crypt::encrypt(2);
                @endphp
            <a class="forgetpassword" href="{{ url('/reset/mail/'.$rol2) }}"> <em>Forgot Password</em> <i class="fa fa-question-circle"></i> </a> </div>
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
         
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" id="freelancer_login_password" name="password" class="form-control" placeholder="Password">
            <span class="input-group-addon">
              <i class="fa fa-eye-slash eye_icon" aria-hidden="true" onclick="Show('#freelancer_login #freelancer_login_password','#freelancer_login .eye_icon')"></i>
            </span>
          </div>
          <div class="form-group">
            <label>
             <!--  <input type="checkbox">
              <em>Remember Me</em> --> </label>
               @php
                $rol3 =  \Crypt::encrypt(3);
                @endphp
            <a class="forgetpassword" href="{{ url('/reset/mail/'.$rol3) }}"> <em>Forgot Password</em> <i class="fa fa-question-circle"></i> </a> </div>
          <button class="tg-theme-btn tg-theme-btn-lg" id="freelancer_login_form" type="button">login</button>
                <div class="text-center" style="padding:10px">
             <span style="font-size:18px;font-weight:bold;color:#000">OR</span>
         </div>
                  <!---->
   <a  style="background:#0B85EE !important;margin-bottom:7px;" id="register_form" class="tg-theme-btn tg-theme-btn-lg" href="{{ route('social_login') }}" id="icon">
			<i class="fa fa-facebook"></i> Login With Facebook
			</a>

		<a style="background:#0077B5 !important;" id="register_form" class="tg-theme-btn tg-theme-btn-lg" href="{{ route('linkedin_login') }}" id="icon">
				<i class="fa fa-linkedin"></i> Login With Linkedin
			</a>
			
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
          <div class="input-group">
            <input type="password" name="password" id="member_register_password" class="form-control" placeholder="Password" autocomplete="off">
            <span class="input-group-addon">
              <i class="fa fa-eye-slash pwd_eye_icon" aria-hidden="true" onclick="Show('#member_reg #member_register_password','#member_reg .pwd_eye_icon')"></i>
            </span>
          </div>
          <span class="register_error" id="member_register_password_error"></span>

          <div class="input-group">
            <input type="password" name="confirm_password" id="member_register_confirm" class="form-control" placeholder="Confirm Password"  >
            <span class="input-group-addon">
              <i class="fa fa-eye-slash member_confirm_eye_icon" aria-hidden="true" onclick="Show('#member_reg #member_register_confirm','#member_reg .member_confirm_eye_icon')"></i>
            </span>
          </div>
            <span class="register_error" id="member_register_confirm_password_error"></span>
        

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
           <div class="input-group">
            <input type="password" name="password" id="company_register_password" class="form-control" placeholder="Password"  >
            <span class="input-group-addon">
              <i class="fa fa-eye-slash pwd_eye_icon" aria-hidden="true" onclick="Show('#company_reg #company_register_password','#company_reg .pwd_eye_icon')"></i>
            </span>
          </div>
            <span class="register_error" id="company_register_password_error"></span>

          <div class="input-group">
            <input type="password" name="confirm_password" id="company_register_confirm" class="form-control" placeholder="Confirm Password"  >
            <span class="input-group-addon">
              <i class="fa fa-eye-slash company_confirm_eye_icon" aria-hidden="true" onclick="Show('#company_reg #company_register_confirm','#company_reg .company_confirm_eye_icon')"></i>
            </span>
          </div>
            <span class="register_error" id="company_register_confirm_password_error"></span>

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
          <div class="input-group">
            <input type="password" name="password" id="freelancer_register_password" class="form-control" placeholder="Password" >
            <span class="input-group-addon">
              <i class="fa fa-eye-slash pwd_eye_icon" aria-hidden="true" onclick="Show('#freelancer_reg #freelancer_register_password','#freelancer_reg .pwd_eye_icon')"></i>
            </span>
          </div>
            <span class="register_error" id="freelancer_register_password_error"></span>

          <div class="input-group">
            <input type="password" name="confirm_password" id="freelancer_register_confirm" class="form-control" placeholder="Confirm Password" >
            <span class="input-group-addon">
              <i class="fa fa-eye-slash freelancer_confirm_eye_icon" aria-hidden="true" onclick="Show('#freelancer_reg #freelancer_register_confirm','#freelancer_reg .freelancer_confirm_eye_icon')"></i>
            </span>
          </div>
            <span class="register_error" id="freelancer_register_confirm_password_error"></span>

          <button class="tg-theme-btn tg-theme-btn-lg" id="register_form" type="submit">Create an Account</button>

         <div class="text-center" style="padding:10px">
             <span style="font-size:18px;font-weight:bold;color:#000">OR</span>
         </div>
                  <!---->
   <a  style="background:#0B85EE !important;margin-bottom:7px;" id="register_form" class="tg-theme-btn tg-theme-btn-lg" href="{{ route('social_login') }}" id="icon">
			<i class="fa fa-facebook"></i> Register With Facebook
			</a>

		<a style="background:#0077B5 !important;" id="register_form" class="tg-theme-btn tg-theme-btn-lg" href="{{ route('linkedin_login') }}" id="icon">
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
@include('element.get_quote_modalbox')
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
<!-- Notifix JS
       ============================================ -->
<script src="{{ asset('admin/js/notiflix/notiflix-2.6.0.min.js')}}"></script>
<script src="{{ asset('admin/js/notiflix/notiflix-aio-2.6.0.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('process_success'))
        const message = '{{session('process_success')}}';
        callbackURL(message,APP_URL);
    @endif
     @if(session('message'))
        const message = '{{session('message')}}';
        callbackError(message);
    @endif
     function Show(id,icon){
            if ( $(icon).hasClass("fa-eye-slash") ) {
                $(id).prop("type", "text");  
                $(icon).addClass('fa-eye').removeClass('fa-eye-slash');  
            }else{
                $(id).prop("type", "password");  
                $(icon).addClass('fa-eye-slash').removeClass('fa-eye');  
            }
        }
  
     
     

</script>
@include('element.get_quote_script')
@include('element.get_township_by_city_ajax_function')
@yield('script')
@include('element.company_logo_slider_script')
@include('element.flash_alert_script')
@include('element.login_register_script')


<style type="text/css">
  .register_error{
    color: red;
    font-size: 13px;
  }
</style>

</body>

</html>
