<!DOCTYPE html>
<html lang="zxx">

<head>
<meta charset="UTF-8">
<title>Myanbox</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="SunRise construction & Builder company">
<meta name="keywords" content="construction, html, template, responsive, corporate">
<meta name="author"  l; ="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="shortcut icon" href="favicon.ico">
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
<link href="{{ asset('css/custom_style.css') }}" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
<!-- summernote CSS
        ============================================ -->
<link rel="stylesheet" href="{{ asset('admin/css/summernote/summernote.css') }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script type="text/javascript">
   var APP_URL = '{!! url('/') !!}';     
  window.Laravel = { base_url: '{!! url("/") !!}', csrfToken: '{!! csrf_token() !!}'};
 </script>
</head>
<body>
	<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
   <header class="main-header"> 
   <!--header-lower start-->
    <div class="container-fluid nav">
           <!--container start-->
      <div class="container clearfix"> 
        <!--row start-->
        <div class="row"> 
          <!--col start-->
          <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="logo-outer">
                <div class="logo"> <a href="{{ url('/') }}" class="img-responsive"><img class="logo-default" src="{{ asset('images/logo-default.png') }}" alt="" title=""></a> </div>
            </div>
          </div>
          <!--col end--> 
          <!--col start-->
          <div class="col-md-9 col-sm-12 col-xs-9"> 
            <!--main-menu start-->
            <nav class="main-menu navpad">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              <div class="navbar-collapse collapse clearfix">
                  <ul class="navigation navbar-nav mr-auto float-left clearfix">
                    <li><a class="hvr-link" href="{{ url('/')}}">Home</a>
                    </li>
                    <li class="dropdown"><a class="hvr-link" href="#">Service</a>
                      <ul>
                        @foreach($serviceCategories as $servicecategory)
                        <li><a class="hvr-link" href="{{ url('companies/'.$servicecategory->id.'/'.$servicecategory->parent_id) }}">{{ $servicecategory->name }}</a></li>
                        @endforeach
                        
                      </ul>
                    </li>
                    <li class="dropdown"><a class="hvr-link" href="#">Supplier</a>
                      <ul>
                        @foreach($supplierCategories as $suppliercategory)
                        <li><a class="hvr-link" href="{{ url('companies/'.$suppliercategory->id.'/'.$suppliercategory->parent_id) }}">{{ $suppliercategory->name }}</a></li>
                        @endforeach
                       
                      </ul>
                    </li>
                    <li class="dropdown"><a class="hvr-link" href="#">Reno Business</a>
                      <ul>
                       @foreach($renobusinessCategories as $renobusinesscategory)
                        <li><a class="hvr-link" href="{{ url('companies/'.$renobusinesscategory->id.'/'.$renobusinesscategory->parent_id) }}">{{ $renobusinesscategory->name }}</a></li>
                        @endforeach
                      </ul>
                    </li>
                    <li><a class="hvr-link" href="{{ route('freelancers') }}">Freelancer</a>
                    </li>
                    <li><a class="hvr-link" href="{{ route('blogs') }}">Blog</a></li>
                     @if(empty(auth()->user()->id))
                    <li><a class="hvr-link"   class="btn btn-primary" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target=".bs-example-modal-md-1">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    Login</a></li>
                    <li><a class="hvr-link" class="btn btn-primary" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target=".bs-example-modal-md"><i class="fa fa-user" aria-hidden="true"></i>Sign Up</a>
                    </li>
                     @else
                       @if(auth()->user()->role == 1)
                      <li><a class="hvr-link" href="{{ url('user/dashboard') }}">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    Profile</a></li>
                     @elseif(auth()->user()->role == 2)
                    <li><a class="hvr-link" href="{{ url('company') }}">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    Profile</a></li>
                      @elseif(auth()->user()->role == 3)
                      <li class="pl20"><a class="hvr-link" href="{{ url('freelancer/profile') }}">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    Profile</a></li>
                    @else
                    <li><a class="hvr-link" href="{{ url('admin/companies') }}">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    Profile</a></li>
                    @endif
                    <li> <a class="hvr-link" href="{{ url('/logout') }}"><i class="fa fa-user" aria-hidden="true"></i>Logout</a>
                       <!--      @csrf-->
                       <!--     <button class="hvr-link" type="submit" data-dismiss="modal" aria-label="Close">Logout</button>-->
                       <!--   </form>-->
                    </li>
                    @endif
                    <li class="nav-item"><button data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target=".bs-example-modal-md-2" class="btn-warning btn-sm mt_17 hidden_xs">Get A Quote</button></li>
                  </ul>
                  
                </div>
                <div class="clearfix"></div>
              </nav>
            <!--main-menu stendart--> 
          </div>
          <!--col end--> 
          <div class="col-xs-3 show_xs" style="display: none;">
            <button data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target=".bs-example-modal-md-2" class="btn-warning btn-sm mt_17">Get A Quote</button>
          </div>
        </div>
        <!--row end--> 
        <!--container end--> 
    </div>
    <!--header-lower end--> 

    </div>
  </header>
  @yield('content')
  <!--footer-sec start-->
<footer> 
  <!--container start-->
  <div class="container"> 
    <!--row start-->
    <div class="row"> 
      <div class="col-md-2 col-sm-3 col-xs-4">
        <img src="{{ asset('images/footer_logo.png') }}" class="img-responsive">
      </div>
      <div class="col-md-offset-8 col-md-2 col-sm-offset-6 col-sm-3 col-xs-offset-4 col-xs-4">
        <span>
        <a href="#."><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
        <a href="#."><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#."><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
        <a href="#."><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
        <a href="#."><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
      </span>
      </div>
    </div>
  </div>
  <!--container end--> 
</footer>
<!--footer-secn end-->
<!--login-modal start-->
<!--login-modal start-->
<div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
      <h2 class="modal-title">Sign In</h2>
         <p id="login_fail" style="color:red"></p>
      <form class="login-form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <fieldset>
          <div class="form-group"> <i class="fa fa-envelope"></i>
            <input type="email" id="login_email" name="email" class="form-control" placeholder="E-mail" >
          </div>
          <div class="form-group"> <i class="fa fa-lock"></i>
            <input type="password" id="login_password" name="password" class="form-control" placeholder="Password">
          </div>
          <div class="form-group">
            <label>
             <!--  <input type="checkbox">
              <em>Remember Me</em> --> </label>
            <a class="forgetpassword" href="{{ url('/password/reset') }}"> <em>Forgot Password</em> <i class="fa fa-question-circle"></i> </a> </div>
          <button class="tg-theme-btn tg-theme-btn-lg" id="login_form" type="button">login</button>            
        </fieldset>
      </form>
      <p>Not a Member?
        <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md">Create an Account</button>
      </p>
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
      <h2 class="modal-title">Sign Up</h2>

         <ul class="nav nav-tabs">
    <li class="active" style="width:30%"><a data-toggle="tab" href="#member_reg">Member</a></li>
    <li  style="width:30%"><a data-toggle="tab" href="#company_reg">Company</a></li>
    <li  style="width:40%"><a data-toggle="tab" href="#freelancer_reg">Freelancer</a></li>
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
        </fieldset>
      </form>
          
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
 <div class="modal fade bs-example-modal-md-2" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg modal-md-2" role="document">
              <div class="modal-content">
                <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                <h2 class="modal-title">GET A FREE QUOTE</h2>
                <form class="login-form" id="send_quotation" method="post" enctype="multipart/form-data">
                     <div class="row">
                      <div class="error"></div>
                    </div>
                    <div class="form-group">
                      <label>My Service Budget is</label>
                       <select name="range_id" class="form-control" id="range_id">
                         <option selected="selected" disabled="disabled">Budget</option>
                         @foreach($ranges as $range)
                         <option value="{{ $range->id }}">{{ $range->minimum_price }} ~ {{ $range->maximum_price }}</option>
                         @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                      <label>Category</label>
                       <select name="category_id" class="form-control" id="company_category_id">
                         <option value="">Category</option>
                        @foreach($categories as $category)
                         <option value="{{$category->id}}">{{ $category->name}}</option>
                        @endforeach
                       </select>
                    </div> 
                    <div class="form-group">
                      <label>Sub Category</label>
                       <select name="company" class="form-control" id="company_subcategory_id">
                       </select>
                    </div>
                     <div class="form-group">
                      <label>Company</label>
                       <select name="received_company[]" class="form-control" id="received_company" multiple="multiple">
                         
                       </select>
                    </div>
                    <div class="form-group">
                      <label>When Project Expected To Start</label>
                      <input type="date" name="project_expected_start_date" class="form-control" id="project_expected_start_date" placeholder="Email Address" >
                    </div>

                    <!-- m square -->
                     <div class="row">
                    <div class="col-lg-12">
                     <label>Project Current Situation</label>
                    <div class="form-group">                        
                        <textarea class="form-control" name="project_current_situation"id="current_situation" required rows="1" placeholder="Project Current Situation"></textarea>                  
                    </div>
                  </div>
                </div>
                
                     <div class="row">
                    <div class="col-lg-12">
                     <label>Summary</label>
                    <div class="form-group">                        
                        <textarea class="form-control" id="summary1" name="summary" required rows="1" placeholder="Summary"></textarea>                 
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                     <label>Policy</label>
                    <div class="form-group">                        
                      <textarea class="form-control" name="policy" id="policy1" required rows="1" placeholder="Policy"></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                      <label>File</label>
                       <input type="file" name="quotation_file[]" class="form-control" multiple="true" id="quotation_file">
                    </div>
                    <div class="form-group">
                      <button class="tg-theme-btn tg-theme-btn-lg" type="submit">Submit</button>
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
 <script type="text/javascript">
  $(document).ready(function(){
$('#login_form').on('click',function(e){
e.preventDefault();
var formData = {
    email: $('#login_email').val(),
    password: $('#login_password').val(),
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
               $("#login_fail").html(data.message);
           }else{
              if(data.role == 3){
                window.location=APP_URL+"/freelancer/profile";
              }else if(data.role == 2){
                window.location=APP_URL+"/company/dashboard";
              }else if(data.role == 1){
               window.location=APP_URL+"/user/dashboard";
             }
           }
        },
        error: function (data) {
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
                 alert('You Have Successfully Signed Up');
                window.location=APP_URL+"/user/dashboard";
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
           alert('You have Error When Register');
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
                 alert('You Have Successfully Signed Up');
                window.location=APP_URL+"/company/dashboard";
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
           alert('You have Error When Register');
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
                  alert('You Have Successfully Signed Up');
                window.location=APP_URL+"/freelancer/profile";             
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
           alert('You have Error When Register');
        }
    });

});


        

           function dynamicChange(onChangeId,showId,sendDataId)
           {
               var option="";
               $.ajax({
                   type : 'get',
                   url : "{{ URL :: route('home.getChildCategory')}}",
                   data : {id:onChangeId,type:sendDataId},
                   success : function(data){
                      if(sendDataId == "category_id")
                        option += '<option selected="selected" disabled="disabled">Sub Category</option>';

                       for(var i=0; i<data.length;i++){
                        option += '<option value="'+ data[i].id+'">';
                           if(sendDataId == "category_id")
                            option += data[i].name;
                           else
                              option += data[i].user.name;
                        option +='</option>';

                       }
                       console.log(option);
                       $(showId).html(option);

                   },
                   error:function(e)
                   {
                       console.log(e)
                   }
               });
           }
              $('#company_category_id').change(function(){
               dynamicChange($(this).val(),'#company_subcategory_id','category_id');
              }); 
              $('#company_subcategory_id').change(function(){
               dynamicChange($(this).val(),'#received_company','subcategory_id');
              });


   $('form#send_quotation').on('submit',function(e){
   
      e.preventDefault();
     
     $.ajax({
            type: "post",
            url: "{{ URL::route('company.send_quotation') }}",
            data: new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data)
            {
                if($.isEmptyObject(data.errors)){
                  alert(data.success);
                  location.reload();
                }
                else{
                  alert(data.errors);
                  location.reload();
                } 
             },
            error:function(e)
            {
              alert('Something Wrong');
              // location.reload();
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
});

        </script>
<style type="text/css">
  .register_error{
    color: red;
  }
</style>
</body>

</html>