<!DOCTYPE html>
<html lang="zxx">

<head>
<meta charset="UTF-8">
<title>Msquare</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="SunRise construction & Builder company">
<meta name="keywords" content="construction, html, template, responsive, corporate">
<meta name="author" content="">
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
  <!--preloader end--> 
  <!--main-header start-->
  
  <header class="main-header"> 
    <!--header-top start-->
    <div class="header-top"> 
      <!--container start-->
      <div class="container"> 
        <!--row start-->
        <div class="row"> 
          <!--col start-->
          <div class="col-md-3 col-sm-3 col-xs-4">
            <div class="user-wrap">
            @if(empty(auth()->user()->id))
              <div class="login-btn">
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target=".bs-example-modal-md-1">Login</button>
              </div>

              <div class="register-btn">
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target=".bs-example-modal-md">Register</button>
              </div>
              @else
             
                <form action="{{ route('logout') }}" method="POST" style="background:black">
                                                               @csrf
                                                              <button type="submit"  style="background:black;color:white">Logout</button>
                                                              </form>
             
              @endif
              <div class="clearfix"></div>
            </div>
          </div>
          <!--col end--> 
          <!--col start-->
          
          <div class="col-md-offset-4 col-sm-offset-1 col-xs-offset-1 col-md-5 col-sm-8 col-xs-7">
             <ul class="top-social-icons">
              <li><a href="#."><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
              <li><a href="#."><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              <li><a href="#."><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>
              <li><a href="#."><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
              <li><a href="#."><i class="fa fa-pinterest-square" aria-hidden="true"></i></a></li>
            </ul>
            <div class="btn-box">
              <button data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target=".bs-example-modal-md-2" class="brochure-btn theme-btn hvr-link">Get A Quote</button>
            </div>
          </div>
          <!--col end--> 
        </div>
        <!--row end--> 
      </div>
      <!--container end--> 
    </div>
    <!--header-top end--> 
    <!--header-upper start--> 
    
    <!--header-upper end--> 
    <!--header-lower start-->
    <div class="header-lower"> 
      <!--container start-->
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="logo-outer">
              <div class="logo"> <a href="{{ url('/')}}"> <img class="logo-default" src="{{ asset('images/logo/myandecor.png') }}" alt="" title=""> </a> </div>
            </div>
          </div>
          <div class="col-md-8 col-sm-12">
            <div class="nav-outer clearfix menu-bg"> 
              <!--main-menu start-->
              <nav class="main-menu">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="navbar-collapse collapse clearfix">
                  <ul class="navigation clearfix">
                    <li><a class="hvr-link" href="{{ url('/')}}">Home</a>
                    </li>
                    <li class="dropdown"><a class="hvr-link" href="{{ url('service-companies/1' ) }}">Service</a>
                      <ul>
                        @foreach($serviceCategories as $servicecategory)
                        <li><a class="hvr-link" href="{{ url('companies/'.$servicecategory->id.'/'.$servicecategory->parent_id) }}">{{ $servicecategory->name }}</a></li>
                        @endforeach
                       <!--  <li><a class="hvr-link" href="companyservice-list.html">Interior Decoration</a></li>
                        <li><a class="hvr-link" href="companyservice-list.html">Architecutre design</a></li>
                        <li><a class="hvr-link" href="companyservice-list.html">Interior design</a></li>
                        <li><a class="hvr-link" href="companyservice-list.html">Engineering </a></li>
                        <li><a class="hvr-link" href="companyservice-list.html">Plumbing</a></li>
                        <li><a class="hvr-link" href="companyservice-list.html">Air-con services</a></li>
                        <li><a class="hvr-link" href="companyservice-list.html">Research labs</a></li> -->
                        
                      </ul>
                    </li>
                    <li class="dropdown"><a class="hvr-link" href="{{ url('supplier-companies/2' ) }}">Supplier</a>
                      <ul>
                         @foreach($supplierCategories as $suppliercategory)
                        <li><a class="hvr-link" href="{{ url('companies/'.$suppliercategory->id.'/'.$suppliercategory->parent_id) }}">{{ $suppliercategory->name }}</a></li>
                        @endforeach
                        <!-- <li><a class="hvr-link" href="companysupplier-list.html">Glass</a></li>
                        <li><a class="hvr-link" href="companysupplier-list.html">Stone</a></li>
                        <li><a class="hvr-link" href="companysupplier-list.html"> Aluminium/iron/Steel</a></li>
                        <li><a class="hvr-link" href="companysupplier-list.html">Hardwood/Engineered Wood</a></li>
                        <li><a class="hvr-link" href="companysupplier-list.html">Eco-Friendly Materials</a></li> -->
                        
                      </ul>
                    </li>
                    <li class="dropdown"><a class="hvr-link" href="{{ url('renobusiness-companies/3' ) }}">Reno Business</a>
                      <ul>
                         @foreach($renobusinessCategories as $renobusinesscategory)
                        <li><a class="hvr-link" href="{{ url('companies/'.$renobusinesscategory->id.'/'.$renobusinesscategory->parent_id) }}">{{ $renobusinesscategory->name }}</a></li>
                        @endforeach
                       <!--  <li><a class="hvr-link" href="renobusiness-list.html">Real Estate</a></li>
                        <li><a class="hvr-link" href="renobusiness-list.html">Printing & Advertising</a></li>
                        <li><a class="hvr-link" href="renobusiness-list.html">Banking & Insurance</a></li>
                        <li><a class="hvr-link" href="renobusiness-list.html">Law Firms</a></li>
                        <li><a class="hvr-link" href="renobusiness-list.html">Rental services</a></li>
                        <li><a class="hvr-link" href="renobusiness-list.html">Training & Courses</a></li>
                        <li><a class="hvr-link" href="renobusiness-list.html">Government Offices</a></li> -->
                      </ul>
                    </li>
                    <li><a class="hvr-link" href="{{ route('freelancers') }}">Freelancer</a>
                    </li>
                    <li><a class="hvr-link" href="{{ route('blogs') }}">Blog</a></li>
                  </ul>
                </div>
                <div class="clearfix"></div>
              </nav>
              <!--main-menu end--> 
              
            </div>
          </div>
        </div>
      </div>
      <!--container end--> 
    </div>
    <!--header-lower end--> 
    <!--sticky-header start-->
    <div class="sticky-header"> 
      <!--container start-->
      <div class="container clearfix"> 
        <!--row start-->
        <div class="row"> 
          <!--col start-->
          <div class="col-md-4 col-sm-4">
            <div class="logo"> <a href="{{ url('/') }}" class="img-responsive"><img class="logo-default" src="{{ asset('images/logo/myandecor.png') }}" alt="" title=""></a> </div>
          </div>
          <!--col end--> 
          <!--col start-->
          <div class="col-md-8 col-sm-8"> 
            <!--main-menu start-->
            <nav class="main-menu">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              <div class="navbar-collapse collapse clearfix">
                  <ul class="navigation clearfix">
                    <li><a class="hvr-link" href="{{ url('/')}}">Home</a>
                    </li>
                    <li class="dropdown"><a class="hvr-link" href="{{ url('service-companies/1' ) }}">Service</a>
                      <ul>
                       @foreach($serviceCategories as $servicecategory)
                        <li><a class="hvr-link" href="{{ url('companies/'.$servicecategory->id.'/'.$servicecategory->parent_id) }}">{{ $servicecategory->name }}</a></li>
                        @endforeach
                       <!--  <li><a class="hvr-link" href="companyservice-list.html">Constructions</a></li>
                        <li><a class="hvr-link" href="companyservice-list.html">Interior Decoration</a></li>
                        <li><a class="hvr-link" href="companyservice-list.html">Architecutre design</a></li>
                        <li><a class="hvr-link" href="companyservice-list.html">Interior design</a></li>
                        <li><a class="hvr-link" href="companyservice-list.html">Engineering </a></li>
                        <li><a class="hvr-link" href="companyservice-list.html">Plumbing</a></li>
                        <li><a class="hvr-link" href="companyservice-list.html">Air-con services</a></li>
                        <li><a class="hvr-link" href="companyservice-list.html">Research labs</a></li> -->
                        
                      </ul>
                    </li>
                    <li class="dropdown"><a class="hvr-link" href="{{ url('supplier-companies/2') }}">Supplier</a>
                      <ul>
                        @foreach($supplierCategories as $suppliercategory)
                        <li><a class="hvr-link" href="{{ url('companies/'.$suppliercategory->id.'/'.$suppliercategory->parent_id) }}">{{ $suppliercategory->name }}</a></li>
                        @endforeach                       
                      </ul>
                    </li>
                    <li class="dropdown"><a class="hvr-link" href="{{ url('renobusiness-companies/3') }}">Reno Business</a>
                      <ul>
                        @foreach($renobusinessCategories as $renobusinesscategory)
                        <li><a class="hvr-link" href="{{ url('companies/'.$renobusinesscategory->id.'/'.$renobusinesscategory->parent_id) }}">{{ $renobusinesscategory->name }}</a></li>
                        @endforeach
                      </ul>
                    </li>
                    <li><a class="hvr-link" href="{{ route('freelancers') }}">Freelancer</a>
                    </li>
                    <li><a class="hvr-link" href="{{ route('blogs') }}">Blog</a></li>
                  </ul>
                </div>
                <div class="clearfix"></div>
              </nav>
            <!--main-menu stendart--> 
          </div>
          <!--col end--> 
        </div>
        <!--row end--> 
        
      </div>
      <!--container end--> 
    </div>
    <!--sticky-header end--> 
  </header>

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
          <h3 class="footer-title">Latest Blog</h3>
          <div class="row blog">
            <div class="col-md-3 col-sm-3 col-xs-3">
              <img src="images/event/new.png" class="img-responsive img-thumbnail">
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <h5>New blog</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
            </div>
        </div>
         <div class="row blog">
            <div class="col-md-3 col-sm-3 col-xs-3">
              <img src="images/event/new.png" class="img-responsive img-thumbnail">
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <h5>New blog</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
            </div>
        </div>

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
              <h3 class="footer-title">Usefull Links</h3>
              <ul class="service-link">
                <li> <a href="index.html">Home</a> </li>
                <li> <a href="about.html">Blog</a> </li>
                <li> <a href="service.html">Contact Us</a> </li>
                <li> <a href="projects-four.html">About Us</a> </li>
              </ul>
            </div>
          </div>
          <!--col end-->  
          <!--col start-->
          <div class="col-md-6 col-sm-6">
            <div class="footer-info">
              <h3 class="footer-title">Contact Us</h3>
              <ul class="footer-adress">
                <li><i class="fa fa-map-marker"></i><span>8500 lorem, New Ispum, Dolor amet sit 12301 </span></li>
                <li><i class="fa fa-phone"></i><span>Call Us :<a href="tel:+0934 343 343"> 0934 343 343</a></span></li>
                <li><i class="fa fa-envelope-o"></i><span>Email : <a href="mailto:info@site.com">info@site.com</a></span></li>
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
        <div class="col-md-offset-6 col-sm-offset-6 col-md-6 col-sm-6">
          <span>copyright @ 2020 Reno.Myanmar.com Powered By<a href="https://findixmyanmar.com/"> Findix Myanmar Co., Ltd</a> </span>
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
  <div class="modal-dialog modal-md-2" role="document">
    <div class="modal-content">
      <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
      <h2 class="modal-title">GET A FREE QUOTE</h2>
      <form class="login-form">
        <fieldset>
          <div class="form-group">
            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" >
          </div>
          <div class="form-group">
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number " required data-error="Phone Number is required.">
          </div>
          <div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required data-error="Valid email is required.">
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" required rows="1" placeholder="Your Message"></textarea>
          </div>
          <div class="form-group">
            <label>
              <input type="checkbox" data-error="Last Name is required.">
              <em>I agree with the terms and conditions</em></label>
          </div>
          <button class="tg-theme-btn tg-theme-btn-lg" type="submit">Submit</button>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<!--quote-modal end-->
</div>
<!--scroll-to-top start-->
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
<script src="{{ asset('js/slider.js') }}"></script> 
<!--jquery end-->
<!-- summernote JS Text editor
        ============================================ -->
    <script src="{{ asset('admin/js/summernote/summernote.min.js')}}"></script>
    <script src="{{ asset('admin/js/summernote/summernote-active.js')}}"></script>
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
                window.location=APP_URL+"/freelancer/dashboard";             
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


});
</script>
<style type="text/css">
  .register_error{
    color: red;
  }
</style>
</body>

</html>

