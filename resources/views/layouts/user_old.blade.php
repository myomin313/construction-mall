<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Myanbox | User Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon"  href="favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/admin_style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/errorvalidation.css') }}">
      <link rel="stylesheet" href="{{ asset('admin/css/errorvalidation.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/data-table/bootstrap-table.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/data-table/bootstrap-editable.css') }}">
    <link rel="icon" type="image/jpg" href="{!! url('images/myanbox_fav.png') !!}">
     <!-- summernote CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/summernote/summernote.css') }}">
    <!-- cropper CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/cropper/croppie.css') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('admin/css/company_style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    
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
        bottom:30% !important;
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

.btn-large {
  padding: 11px 19px;
  font-size: 17.5px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
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
.container-fluid ul li{
   list-style-type:square !important; 
}
.container-fluid ol li{
   list-style-type:roman !important;  
}
    </style>
</head>
<body>
   <!--image upload-modal start-->
            <div class="modal bs-example-modal-md-1" tabindex="-1" role="dialog" id="uploadprofileModal">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Upload Profile Photo</h2>
                       <form id="profilephotoForm" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                         <div class="form-group">
                              <!--<center>-->
                              <!--  <input type="file" id="panel_file" name="profile_photo" accept="image/*">-->
                              <!--</center>-->
                              <div id="panel_photo"></div>
                          </div> 
                            <p><button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-panel" data-dismiss="modal" aria-label="Close">Upload Image</button></p>
                     </form>
            <p>
             <!--  <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-image" data-dismiss="modal" aria-label="Close">Upload Image</button> -->
            </p>
          </div>
        </div>
      </div>
      <!-- image upload modal end -->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
             <a href="{{ url('/')}}"><img class="main-logo" src="{{ asset('admin/images/logo/logo.png')}}" alt="" /></a>
                <strong><a href="index.html">
                <img src="{{ asset('admin/images/logo/logosn.png')}}" class="" alt="" /></a></strong>
            </div>
            <div class="profile">
                
                <div class="center">
                    <!--<a href="#"><img src="{{ asset('storage/user/'.auth()->user()->logo)}}" class="img-circle" alt="" style="width:150px;height: 150px"></a>-->
                        @if(auth()->user()->logo != null)
                        <input type="file" id="panel_file" name="profile_photo" accept="image/*" class="hide">
                        <img src="{{ asset('storage/user/'.auth()->user()->logo) }}"  class="img-circle" alt="" style="width:150px;height: 150px">
                        <!--<a class="btn btn-sm btn-info" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#uploadprofileModal" title="change">-->
                        <!--     <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></a>-->
                        <label   class="btn btn-sm btn-info" for="panel_file">
                             <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></label>
                        @else
                        <input type="file" id="panel_file" name="profile_photo" accept="image/*" class="hide">
                         <!--<a  data-dismiss="modal" aria-label="Close" for="panel_file" data-toggle="modal">-->
                         
                         <img src="{{ asset('storage/user/'.$projectsetting->member_default_logo) }}"  class="img-circle" alt="" style="width:150px;height: 150px">
                             <label   class="btn btn-sm btn-info" for="panel_file">
                                 <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i>
                         </label>
                         <!--</a>-->
                        @endif
                        <!-- start-->
                       <h2> <?=  substr(Auth::user()->name,0,20) ?></h2>
                        <!--end-->
                </div>
                
                <!--<div class="profile-social-dtl">
                    <ul class="dtl-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>-->
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li  class="active"><a href="{{route('user.dashboard')}}">
                            <i class="fa fa-list-ul" aria-hidden="true"></i>
                        Dashboard</a></li>
                        <li>
                            <a class="has-arrow" href="index.html">
                                <i class="fa fa-list-ul" aria-hidden="true"></i>
                                <span class="mini-click-non">Quate Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <!--<li><a title="received_quote" href="{{route('user.received.quotation','received')}}"><span class="mini-sub-pro">Received Quotation History</span></a></li>-->
                                <li class="{{ request()->is('user/quotation/requested')?'active':''}}"><a title="request_quote" href="{{route('user.received.quotation','requested')}}"><span class="mini-sub-pro">Request Quote</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="index.html">
                               <i class="fa fa-database" aria-hidden="true"></i>
                               <span class="mini-click-non">Coin Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('coinplan') ?'active':''}}"><a title="Dashboard v.1" href="{{route('coinplan.index')}}"><span class="mini-sub-pro">To Buy Coin</span></a></li>
                                <li class="{{ request()->is('coinplan/history') ?'active':''}}"><a title="Dashboard v.1" href="{{route('coinplan.history')}}"><span class="mini-sub-pro">Ordered Coin History</span></a></li>
                                
                                <!--<li class="{{ request()->is('usercoin/index_usedcoinhistory')?'active':''}}"><a title="Dashboard v.1" href="{{route('usercoin.index_usedcoinhistory')}}"><span class="mini-sub-pro">Used Coin History</span></a></li>-->
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="{{ asset('admin/images/logo/logo.png')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-offset-7 col-md-offset-7 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <img src="{{ asset('storage/user/'.auth()->user()->logo)}}" alt="" />
                                                            <span class="admin-name"><?= auth()->user()->name ?></span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="{{ route('user.edit') }}"><span class="edu-icon edu-user-rounded author-log-ic"></span>Update Profile</a>
                                                        </li>
                                                        <li><a href="{{ route('user.index_changepassword')}}"><span class="edu-icon edu-money author-log-ic"></span>Change Password</a>
                                                        </li>
                                                        <li><a href="{{ url('/') }}"><span class="edu-icon edu-settings author-log-ic"></span>Go To Website</a>
                                                        </li>
                                                         <li> <a  href="{{ url('/logout') }}"><span class="edu-icon edu-settings author-log-ic"></span>Logout</a></li>
                                                        <!--<li>-->
                                                        <!--    <span class="edu-icon edu-locked author-log-ic"></span>-->
                                                        <!--     <a class="dropdown-item" href="{{ route('logout') }}"-->
                                                        <!--       onclick="event.preventDefault();-->
                                                        <!--                     document.getElementById('logout-form').submit();">-->
                                                        <!--        {{ __('Logout') }}-->
                                                        <!--    </a>-->

                                                        <!--    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">-->
                                                        <!--        @csrf-->
                                                        <!--    </form>-->
                                                        <!--</li>-->
                                                    </ul>
                                                </li>
                                             </ul>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li  class="active"><a href="{{route('user.dashboard')}}">
                            <i class="fa fa-list-ul" aria-hidden="true"></i>
                        Dashboard</a></li>
                        <li>
                            <a class="has-arrow" href="index.html">
                                <i class="fa fa-list-ul" aria-hidden="true"></i>
                                <span class="mini-click-non">Quate Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="received_quote" href="{{route('user.received.quotation','received')}}"><span class="mini-sub-pro">Received Quotation History</span></a></li>
                                <li><a title="request_quote" href="{{route('user.received.quotation','request')}}"><span class="mini-sub-pro">Request Quotation Quote</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="index.html">
                               <i class="fa fa-database" aria-hidden="true"></i>
                               <span class="mini-click-non">Coin Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard v.1" href="{{route('coinplan.index')}}"><span class="mini-sub-pro">To Buy Coin</span></a></li>
                                <li><a title="Dashboard v.1" href="{{route('coinplan.history')}}"><span class="mini-sub-pro">Request Coin</span></a></li>
                                
                                <!--<li><a title="Dashboard v.1" href="{{route('usercoin.index_usedcoinhistory')}}"><span class="mini-sub-pro">Used Coin History</span></a></li>-->
                            </ul>
                        </li>                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->

           

        <main class="py-4" style="min-height:600px">
            @yield('content')
        </main>
        
     <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Developed By <a href="https://findixmyanmar.com/">Findix Myanmar</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
    <script src="{{ asset('admin/js/bootstrap.min.js')}}"></script> 
    <!-- meanmenu JS
        ============================================ -->
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

     <!-- Image cropper JS
        ============================================ -->
    <script src="{{ asset('admin/js/cropper/croppie.js')}}"></script>
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
</body>

</html>