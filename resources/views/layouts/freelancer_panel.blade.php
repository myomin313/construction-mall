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
<!-- from old -->
<!--<link rel="stylesheet" href="{{ url('/css/meanmenu.min.css') }}">-->
<!--<link rel="stylesheet" href="{{ url('/admin/css/admin_style.css') }}">-->
<!-- from old -->
<link rel="stylesheet" href="{{ asset('dist/color-default.css') }}">
<link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('css/owl.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery.fancybox.css') }}" rel="stylesheet">
<link href="{{ asset('css/style_slider.css') }}" rel="stylesheet">
<link href="{{ asset('rs-plugin/css/settings.css') }}" rel="stylesheet">
 <link href="{{asset('admin/js/notiflix/notiflix-2.6.0.min.css')}}" rel="stylesheet">
<link href="{{ asset('css/custom_style.css') }}" rel="stylesheet">
<link rel="icon" type="image/jpg" href="{!! url('images/myanbox_fav.png') !!}">
<!-- start -->
 <!--<link rel="stylesheet" href="{{ url('/css/responsive.css') }}">-->
    <link rel="stylesheet" href="{{ asset('admin/css/errorvalidation.css') }}">
   <link rel="stylesheet" href="{{ asset('admin/css/data-table/bootstrap-table.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/data-table/bootstrap-editable.css') }}">
    <link rel="icon" type="image/jpg" href="{!! url('images/myanbox_fav.png') !!}">
    <link rel="stylesheet" href="{{ asset('admin/js/datepicker/datepicker.css') }}"> 
    <link rel="stylesheet" href="{{ asset('admin/css/summernote/summernote.css') }}">
<!-- end -->

 
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
<!-- summernote CSS
        ============================================ -->
<link rel="stylesheet" href="{{ asset('admin/css/summernote/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/cropper/croppie.css') }}">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Notifix JS
        ============================================ -->
        <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script>
         <!--<script src="{{ asset('admin/js/jquery-3.5.1.min.js')}}"></script>-->
        <script src="{{ asset('admin/js/notiflix/notiflix-2.6.0.min.js')}}"></script>
        <script src="{{ asset('admin/js/notiflix/notiflix-aio-2.6.0.min.js')}}"></script>
      <script src="{{ asset('admin/js/notiflix/commonnoti.js')}}"></script>
        
     
<script type="text/javascript">
   var APP_URL = '{!! url('/') !!}';     
  window.Laravel = { base_url: '{!! url("/") !!}', csrfToken: '{!! csrf_token() !!}'};
 </script>
     <style>
    .center .btn{
        font-size:8px;
        padding:4px 6px 4px 6px !important;
        position:absolute;
        z-index:100;
        /*bottom:30% !important;*/
        margin-left: -32px;
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

.btn-reset {
   background-color: #286090 !important;
   color:white;
}
.btn-reset:hover {
   background-color: #286090 !important;
   color:white;
}
.btn-large {
  padding: 11px 19px;
  font-size: 17.5px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}
.btn-primary{
   background-color: #FCB80B !important;
   border: 1px solid #FCB80B !important;
}

#imagePreview {
  margin: 15px 0 0 0;
  border: 2px solid #ddd;
}
.no-border>tbody>tr>td, .no-border>tbody>tr>th, .no-border>tfoot>tr>td, .no-border>tfoot>tr>th, .no-border>thead>tr>td, .no-border>thead>tr>th {
           border-top: 0px !important;
        } 
        
.note-editable ul li{
   list-style-type:square !important; 
}
.note-editable ol li{
   list-style-type:roman !important;  
}
/*.container-fluid ul li{
   list-style-type:square !important; 
}
.container-fluid ol li{
   list-style-type:roman !important;  
}*/
 </style>
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
</div>
<!--scroll-to-top start-->
<!--jquery start--> 
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-up"></span></div>

<script src="{{ asset('js/jquery-2.1.4.min.js')  }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script> 
<!-- start -->
<script src="{!! url('js/jquery.meanmenu.js') !!}"></script>
<!-- end -->
<!-- start -->
 <script src="{!! url('js/metisMenu/metisMenu-active.js') !!}"></script>
    <script src="{!! url('js/main.js') !!}"></script>
     <script src="{{ asset('admin/js/data-table/bootstrap-table.js')}}"></script>
    <script src="{{ asset('admin/js/data-table/bootstrap-editable.js')}}"></script>
    <script src="{{ asset('admin/js/data-table/tableExport.js')}}"></script>
    <script src="{{ asset('admin/js/data-table/bootstrap-table-resizable.js')}}"></script>
    <script src="{{ asset('admin/js/data-table/colResizable-1.5.source.js')}}"></script>
    <script src="{{ asset('admin/js/data-table/bootstrap-table-export.js')}}"></script>
     <script src="{{ asset('admin/js/summernote/summernote.min.js')}}"></script>
    <script src="{{ asset('admin/js/summernote/summernote-active.js')}}"></script>
      <script src="{{ asset('admin/js/cropper/croppie.js')}}"></script>

<!-- end -->
<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script> 
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script> 
<script src="{{ asset('js/jquery.fancybox8cbb.js?v=2.1.5') }}"></script> 
<script src="{{ asset('js/owl.carousel.js') }}"></script> 
<script src="{{ asset('rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script> 
<script src="{{ asset('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script> 
<script src="{{ asset('js/counter.js') }}"></script> 
<script src="{{ asset('js/script.js') }}"></script>
 <script type="text/javascript">
  $('.navbar-btn,.navbar-btn1').click(function(){
    if('<?php echo(Auth::user()) ?>' == ""){
         var message = "Please login in";
         callbackError(message);
    }
    else{
        var message = "Sorry! You have no permission to request quote.";
         callbackError(message);
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

 
  $(document).ready(function() {
         $('#carousel-tilenav').carousel();
         $('#carousel1').carousel();
         
           $('#project_detail,#edit_project_detail,#experience_description,#update_experience_description,#experience_description,#update_experience_description,#freelancer_description').on('summernote.paste', function(e, ne) {
                 var bufferText = ((ne.originalEvent || ne).clipboardData || window.clipboardData).getData('Text');
                 ne.preventDefault();
                 document.execCommand('insertText', false, bufferText)
             });
             
             
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

<style type="text/css">
  .register_error{
    color: red;
    font-size: 13px;
  }
</style>
</body>

</html>