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
         <a  style="background:#0B85EE !important" id="register_form" class="tg-theme-btn tg-theme-btn-md" href="{{ route('social_login',['provider'=>'facebook']) }}" id="icon">
					<i class="fa fa-facebook"></i>Register With Facebook
				</a>

					<a href="{{ route('social_login', ['provider'=>'linkedin']) }}" id="icon">
					<i class="fa fa-linkedin"></i>
				</a>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@yield('script')
@include('element.get_quote_script')
 <script type="text/javascript">

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

                /* alert('You Have Successfully Signed Up');
                window.location=APP_URL+"/company/dashboard"; */
            }else{
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
