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
<link rel="shortcut icon" href="favicon.ico">
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
<link rel="stylesheet" href="{{ asset('admin/css/data-table/bootstrap-table.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/data-table/bootstrap-editable.css') }}">
 <link href="{{asset('admin/js/notiflix/notiflix-2.6.0.min.css')}}" rel="stylesheet">
<link href="{{ asset('css/custom_style.css') }}" rel="stylesheet">
<link rel="icon" type="image/jpg" href="{!! url('images/myanbox_fav.png') !!}">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
<!-- summernote CSS
        ============================================ -->
<link rel="stylesheet" href="{{ asset('admin/css/summernote/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/cropper/croppie.css') }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- <link rel="stylesheet" href="{{ asset('admin/css/company_style.css') }}"> -->
<meta name="csrf-token" content="{{ csrf_token() }}" >

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Notifix JS
        ============================================ -->
        <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
        <script src="{{ asset('admin/js/notiflix/notiflix-2.6.0.min.js')}}"></script>
        <script src="{{ asset('admin/js/notiflix/notiflix-aio-2.6.0.min.js')}}"></script>
      <script src="{{ asset('admin/js/notiflix/commonnoti.js')}}"></script>

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
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquet, massa ac ornare feugiat, nunc dui auctor ipsum, sed posuere eros sapien id quam. </p>
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
@include('element.get_quote_modalbox')
</div>
<!--scroll-to-top start-->
<!--jquery start--> 
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-up"></span></div>

<script src="{{ asset('js/jquery-2.1.4.min.js')  }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.meanmenu.js')}}"></script>
 <!-- metisMenu JS
        ============================================ -->
    <script src="{{ asset('admin/js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{ asset('admin/js/metisMenu/metisMenu-active.js')}}"></script>  
    <script src="{{ asset('admin/js/main.js')}}"></script>
    <!-- data table JS
        ============================================ -->
        <script src="{{ asset('admin/js/data-table/bootstrap-table.js')}}"></script>
    <script src="{{ asset('admin/js/data-table/bootstrap-editable.js')}}"></script>

    <script src="{{ asset('admin/js/data-table/tableExport.js')}}"></script>
    <script src="{{ asset('admin/js/data-table/bootstrap-table-resizable.js')}}"></script>
    <script src="{{ asset('admin/js/data-table/colResizable-1.5.source.js')}}"></script>
    <script src="{{ asset('admin/js/data-table/bootstrap-table-export.js')}}"></script>
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
@include('element.get_quote_script')
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
       <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@yield('script')
        
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
                                var url = APP_URL+"/company/dashboard";
                                 callbackURL(message,url);
                                 
                /* alert('You Have Successfully Signed Up');
                window.location=APP_URL+"/company/dashboard"; */
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