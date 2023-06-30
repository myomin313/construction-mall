<!DOCTYPE html>
<html lang="zxx">

<head>
<meta charset="UTF-8">
  <title>@yield('title')</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="Myanbox">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- <link rel="stylesheet" href="{{ asset('admin/css/company_style.css') }}"> -->
<meta name="csrf-token" content="{{ csrf_token() }}" >

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" type="image/x-icon" href="{!! url('images/myanbox_fav.png') !!}">
 <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
<!--<link rel="stylesheet" href="{{ asset('admin/css/meanmenu.min.css')}}">-->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<!--<link rel="stylesheet" href="{{ asset('admin/css/admin_style.css') }}">-->
<link rel="stylesheet" href="{{ asset('dist/color-default.css') }}">
 <!--<link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}">-->
<link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('css/owl.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery.fancybox.css') }}" rel="stylesheet">
<link href="{{ asset('css/style_slider.css') }}" rel="stylesheet">
<link href="{{ asset('rs-plugin/css/settings.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('admin/css/errorvalidation.css') }}">
 <link href="{{asset('admin/js/notiflix/notiflix-2.6.0.min.css')}}" rel="stylesheet">
<link href="{{ asset('css/custom_style.css') }}" rel="stylesheet">
<link rel="icon" type="image/jpg" href="{!! url('images/myanbox_fav.png') !!}">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
<!-- summernote CSS
        ============================================ -->
<link rel="stylesheet" href="{{ asset('admin/css/summernote/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/cropper/croppie.css') }}">

<!-- Notifix JS
        ============================================ -->
        <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
        <script src="{{ asset('admin/js/notiflix/notiflix-2.6.0.min.js')}}"></script>
        <script src="{{ asset('admin/js/notiflix/notiflix-aio-2.6.0.min.js')}}"></script>
      <script src="{{ asset('admin/js/notiflix/commonnoti.js')}}"></script>
@yield('extra_css')

      <style>
    .center .btn{
        font-size:8px;
        padding:4px 6px 4px 6px !important;
        position:absolute;
        z-index:100;
        /*top:25% !important;*/
        margin-left: -35px;
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
    @yield('content')
</div>
  @include('element.footer')
@include('element.get_quote_modalbox')

<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-up"></span></div>

<script src="{{ asset('js/jquery-2.1.4.min.js')  }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.meanmenu.js')}}"></script>
 <!-- metisMenu JS
        ============================================ -->
    
    <script src="{{ asset('admin/js/main.js')}}"></script>
   
    <!-- summernote JS Text editor
        ============================================ -->
    <script src="{{ asset('admin/js/summernote/summernote.min.js')}}"></script>
    <script src="{{ asset('admin/js/summernote/summernote-active.js')}}"></script>
    <script src="{{ asset('admin/js/cropper/croppie.js')}}"></script>


<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script> 
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script> 
<script src="{{ asset('js/jquery.fancybox8cbb.js?v=2.1.5') }}"></script> 
<script src="{{ asset('js/owl.carousel.js') }}"></script> 
<script src="{{ asset('rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script> 
<script src="{{ asset('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script> 
<script src="{{ asset('js/counter.js') }}"></script> 
<script src="{{ asset('js/script.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('element.get_quote_script')
@include('element.get_township_by_city_ajax_function')
@yield('script')
<script type="text/javascript">
       $(document).ready(function(){
        var img = '<?php echo asset('storage/user/'.auth()->user()->logo) ?>';
                var image_name = '<?php echo auth()->user()->logo ?>';
                html = '<img alt="'+image_name+'" src="' + img + '" class="img-circle"/>';
                $("#current_profile_photo").html(html);
               //Image Cropping

               /* image crop */
               var resize22 = $('#panel_photo').croppie({
                enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 300,
                    height: 300,
                    type: 'circle' //circle
                },
                boundary: {
                    width: 310,
                    height: 310
                }
            });             
            $('#panel_file').on('change', function () { 
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
            $('.upload-panel').on('click', function (ev) {
              resize22.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
                html = '<img src="' + img + '" />';
                $("#panel_photo").html(html);
                 $.ajax({
                   url: "{{ route('user.croppie.upload-profile') }}",
                   type: "POST",
                   data: {"image":img,'path':'user'},
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
            }); 
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