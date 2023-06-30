<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Myanbox | Company Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        bottom:26% !important;
        margin-left: 52px;
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
            <div class="modal bs-example-modal-md-1 " tabindex="-1" role="dialog" id="uploadprofileModal">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Upload Profile Photo</h2>
                       <form id="profilephotoForm" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                         <div class="form-group">
                              <center>
                                <!--<input type="file" id="image_file" name="profile_photo" accept="image/*">-->
                              </center>
                              <div id="profile_photo"></div>
                          </div> 
                          <p>
                              <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
                     
                          </p>
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
                     @if(auth()->user()->logo != null)
                          <input type="file" id="image_file" name="profile_photo" accept="image/*" class="hide">
                          <img src="{{ asset('storage/company_logo/'.auth()->user()->logo) }}" class="img-responsive" alt="{{ auth()->user()->name }}"
                          style="width:170px;height:170px">
                           <label   class="btn btn-sm btn-info" for="image_file">
                         <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></label>
                     @else
                         <input type="file" id="image_file" name="profile_photo" accept="image/*" class="hide">
                         @if(Session::get('parent_category_id') == 1)
                         <img src="{{ asset('storage/company_logo/'.$projectsetting->service_default_logo) }}" class="img-responsive" alt="update company logo"
                          style="width:170px;height:170px">
                          @elseif(Session::get('parent_category_id') == 2)
                          <img src="{{ asset('storage/company_logo/'.$projectsetting->supplier_default_logo) }}" class="img-responsive" alt="update company logo"
                          style="width:170px;height:170px">
                          @elseif(Session::get('parent_category_id') == 3)
                          <img src="{{ asset('storage/company_logo/'.$projectsetting->reno_default_logo) }}" class="img-responsive" alt="update company logo"
                          style="width:170px;height:170px">
                          @endif
                          <label   class="btn btn-sm btn-info" for="image_file">
                         <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></label
                     @endif
                     <!--start-->
                     <!--end-->
                    <h2> <?=  substr(Auth::user()->name,0,20) ?></h2>
                </div>
                <div class="profile-social-dtl">
                    <ul class="dtl-social">
                        @if (Session::has('facebook'))
                        <li><a href="<?= Session::get('facebook') ?>"><i class="fa fa-facebook"></i></a></li>
                        @endif
                        @if (Session::has('twitter'))
                        <li><a href="<?= Session::get('twitter') ?>"><i class="fa fa-twitter"></i></a></li>
                        @endif
                        @if (Session::has('googleplus'))
                        <li><a href="<?= Session::get('googleplus') ?>"><i class="fa fa-google-plus"></i></a></li>
                        @endif
                        @if(Session::has('linkedin'))
                        <li><a href="<?= Session::get('linkedin') ?>"><i class="fa fa-linkedin"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li  class="active"><a href="{{route('companies.dashboard')}}">
                            <i class="fa fa-list-ul" aria-hidden="true"></i>
                        Dashboard</a></li>
                        <li>
                            <a class="has-arrow" href="index.html">
                                <i class="fa fa-list-ul" aria-hidden="true"></i>
                                <span class="mini-click-non">Quate Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('company_quotation/received')?'active':''}}"><a title="received_quote" href="{{route('company.received.quotation','received')}}"><span class="mini-sub-pro">Received Quote</span></a></li>
                                <li class="{{ request()->is('company_quotation/requested')?'active':''}}"><a title="request_quote" href="{{route('company.received.quotation','requested') }}"><span class="mini-sub-pro">Requested Quote</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#">
                               <i class="fa fa-database" aria-hidden="true"></i>
                               <span class="mini-click-non">Coin Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('coinplan') ?'active':''}}"><a href="{{route('coinplan.index')}}"><span class="mini-sub-pro">Buy Coin</span></a></li>
                                 <li class="{{ request()->is('coinplan/history') ?'active':''}}"><a href="{{route('coinplan.history')}}"><span class="mini-sub-pro">Ordered Coin History</span></a></li>
                                 <!--<li class="{{ request()->is('coinplan/usecoin') ?'active':''}}"><a href="{{route('coinplan.usecoin')}}"><span class="mini-sub-pro">Used Coin History</span></a></li>-->
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#">
                                <i class="fa fa-th" aria-hidden="true"></i>
                                <span class="mini-click-non">Package Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('package') || request()->is('package/history')?'active':''}}"><a  href="{{route('package.index')}}"><span class="mini-sub-pro">Buy Package</span></a></li>
                            </ul>
                        </li>
                        <?php
                            if (Session::has('parent_category_id')){
                                if((Session::get('parent_category_id') == 1 ||
                                   Session::get('parent_category_id') == 2 ) && Session::get('active_package_plan_id') != 1)
                                { 
                                    ?>
                            <li>
                                <a class="has-arrow" href="index.html">
                                    <i class="fa fa-tasks" aria-hidden="true"></i>
                                    <span class="mini-click-non">Project Management</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li class="{{ request()->is('project') || request()->is('project/*/*') || request()->is('project/*/edit') ?'active':''}}"><a title="project list" href="{{route('project.index')}}"><span class="mini-sub-pro">Project List</span></a></li>

                                    <li class="{{ request()->is('project/create')?'active':''}}"><a title="project list" href="{{route('project.create')}}"><span class="mini-sub-pro">Add Project</span></a></li>
                                </ul>
                            </li>
                        <?php   } 
                                if(Session::get('parent_category_id') == 2 && Session::get('active_package_plan_id') != 1)
                                { ?>
                             <li>
                                <a class="has-arrow" href="index.html">
                                    <i class="fa fa-th-large" aria-hidden="true"></i>
                                    <span class="mini-click-non">Product Management</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li class="{{ request()->is('product') || request()->is('product/*/*/edit')?'active':''}}"><a title="project list" href="{{route('product.index')}}"><span class="mini-sub-pro">Product List</span></a></li>
                                    <li class="{{ request()->is('product/create') ?'active':''}}"><a title="project list" href="{{route('product.create')}}"><span class="mini-sub-pro">Add Product</span></a></li>
                                </ul>
                             </li>        
                        <?php   } 
                                if(Session::get('parent_category_id') == 1 && Session::get('active_package_plan_id') != 1)
                                { ?>
                        
                        <li>
                            <a class="has-arrow" href="index.html">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                <span class="mini-click-non">Service Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('service') || request()->is('service/*/*/edit')?'active':''}}"><a title="service List" href="{{ route('service.index') }}"><span class="mini-sub-pro">Service List</span></a></li>
                                 <li class="{{ request()->is('service/create') ?'active':''}}"><a title="service List" href="{{route('service.create')}}"><span class="mini-sub-pro">Add Service</span></a></li>
                            </ul>
                        </li>
                    <?php
                             } 
                        }   ?>
                        <li><a href="{{route('companies.profile')}}">
                        <i class="fa fa-building" aria-hidden="true"></i>
                        Company Profile</a></li>
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
                        <a href="{{url('/')}}"><img class="main-logo" src="{{ asset('admin/images/logo/logo.png')}}" alt="" /></a>
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
                                    <div class="col-lg-9 col-md-9">
                                        @php
                                       
                                        $end_date = strtotime(Session::get('package_end_date')); // convert to timestamps
                                        $current_date = strtotime(date('Y-m-d')); // convert to timestamps
                                        $days = (int)(($end_date - $current_date)/86400); 
                                        @endphp
                                        <div class="header-top-menu tabl-d-n">
                                            @if(Session::get('active_package_plan_id') == 1)
                                            <h3 style="color: red">    {{Session::get('active_package_plan_name')}} package is active.<a href="{{route('package.index')}}" class="btn btn-md btn-black"> Click here to buy packge.</a></h3>
                                            @else
                                            @if(Session::get('package_end_date')> date('Y-m-d'))
                                                @if($days <= 15)
                                                    <h4 style="color: red">{{Session::get('active_package_plan_name')}} package 
                                                    will be expire soon.Please buy new package until {{Session::get('package_end_date')}}
                                                    </h4>
                                                @else
                                                    <h4>{{Session::get('active_package_plan_name')}} package is active.
                                                    </h4>
                                                @endif
                                            @else 
                                               <h4 style="color: red">{{Session::get('active_package_plan_name')}} package was expired.
                                                    @if(Session::get('parent_category_id') == 1)
                                                      Your Service and Project information was disappeard.Please renew it!
                                                    @elseif(Session::get('parent_category_id') == 2)
                                                        Your Project and Product information was disappeard.Please renew it!
                                                    @endif
                                               </h4>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <img src="{{ asset('storage/company_logo/'.Auth::user()->logo)}}" alt="" />
                                                            <span class="admin-name">{{ Auth::user()->name }}</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                         <li><a href="{{ route('companies.profile') }}"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                                                        </li>
                                                        <li><a href="{{ route('user.index_changepassword')}}"><span class="edu-icon edu-money author-log-ic"></span>Change Password</a>
                                                        </li>
                                                        <li><a href="{{ url('/') }}"><span class="edu-icon edu-settings author-log-ic"></span>Go To Website</a>
                                                        </li>
                                                         <li> <a  href="{{ url('/logout') }}"><span class="edu-icon edu-settings author-log-ic"></span>Logout</a></li>
                                                        <!--<li>-->
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
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Quote Management <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="{{route('company.received.quotation','received')}}">Received Quote</a></li>
                                                <li><a href="{{route('company.received.quotation','requested') }}">Requested Quote</a></li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demoevent" href="#">Coin Management <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent" class="collapse dropdown-header-top">
                                              <li ><a href="{{route('coinplan.index')}}">Buy Coin</a></li>
                                              <li ><a href="{{route('coinplan.history')}}">Ordered Coin History</a></li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demopro" href="#">Package Management<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demopro" class="collapse dropdown-header-top">
                                                <li><a href="href="{{route('package.index')}}"">Buy Package</a>
                                                </li>

                                            </ul>
                                        </li>
                                        <?php
                            if (Session::has('parent_category_id')){
                                if((Session::get('parent_category_id') == 1 ||
                                   Session::get('parent_category_id') == 2 ) && Session::get('active_package_plan_id') != 1)
                                { 
                                    ?>
                                        <li><a data-toggle="collapse" data-target="#democrou" href="#">Project Management <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="democrou" class="collapse dropdown-header-top">
                                                <li><a href="{{route('project.index')}}">Project  List</a>
                                                </li>
                                                <li><a href="{{ route('project.create') }}">Add Project</a>
                                                </li>
                                            </ul>
                                        </li>
                                       <?php   } 
                                if(Session::get('parent_category_id') == 2 && Session::get('active_package_plan_id') != 1)
                                { ?> 
                                        <li><a data-toggle="collapse" data-target="#democrou" href="#">Product Management <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="democrou" class="collapse dropdown-header-top">
                                                <li><a href="{{route('product.index')}}">Product  List</a>
                                                </li>
                                                <li><a href="{{ route('product.create') }}">Add Product</a>
                                                </li>
                                            </ul>
                                        </li>
                                          <?php   } 
                                if(Session::get('parent_category_id') == 1 && Session::get('active_package_plan_id') != 1)
                                { ?>
                                        
                                        <li><a data-toggle="collapse" data-target="#demolibra" href="#">Service Management <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demolibra" class="collapse dropdown-header-top">
                                                <li><a href="{{ route('service.index') }}">Service List</a>
                                                </li>
                                                <li><a href="{{ route('service.create') }}">Add Service</a>
                                                </li>
                                            </ul>
                                        </li>
                                         <?php
                             } 
                        }   ?>
                                        <li><a href="{{route('companies.profile')}}">Company Profile</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->

        <main class="py-4" style="min-height:700px">
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
        var img = '<?php echo asset('storage/company_logo/'.auth()->user()->logo) ?>';
                var image_name = '<?php echo auth()->user()->logo ?>';
                html = '<img alt="'+image_name+'" src="' + img + '" class="img-circle"/>';
                $("#current_profile_photo").html(html);
               //Image Cropping

               /* image crop */
               var resize22 = $('#profile_photo').croppie({
                enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 420,
                    height: 280,
                    type: 'square' //circle
                },
                boundary: {
                    width: 430,
                    height: 290
                }
            });             
            $('#image_file').on('change', function () { 
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
            $('.upload-image').on('click', function (ev) {
              resize22.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
                html = '<img src="' + img + '" />';
                $("#profile_photo").html(html);
                 $.ajax({
                   url: "{{ route('user.croppie.upload-profile') }}",
                   type: "POST",
                   data: {"image":img,'path':'company_logo'},
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