<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Myanbox | Admin Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon"  href="favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/admin_style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/data-table/bootstrap-table.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/data-table/bootstrap-editable.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{!! url('images/myanbox_fav.png') !!}">
    
     <!-- Datepicker CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/js/datepicker/datepicker.css') }}"> 
    
     <!-- Error Validation CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/errorvalidation.css') }}">
    
     <!-- summernote CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/summernote/summernote.css') }}">
    <!-- cropper CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/cropper/croppie.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    
     <!-- Notifix JS
        ============================================ -->
       <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script>
        <!--<script src="{{ asset('admin/js/jquery-3.5.1.min.js')}}"></script> -->
        <script src="{{ asset('admin/js/notiflix/notiflix-2.6.0.min.js')}}"></script>
        <script src="{{ asset('admin/js/notiflix/notiflix-aio-2.6.0.min.js')}}"></script>
          <script src="{{ asset('admin/js/notiflix/commonnoti.js')}}"></script>
           <!-- <script src="{{ asset('admin/js/validation-error.js')}}"></script>-->
        
           
       
   <style>
    .center .btn{
        font-size:8px;
        padding:4px 6px 4px 6px !important;
        position:absolute;
        z-index:100;
        bottom:20% !important;
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
table ul li{
   list-style-type:square !important; 
}
ol li{
   list-style-type:roman !important;  
}
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!--<link rel="stylesheet" href="{{ asset('admin/css/company_style.css') }}">-->
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <style>
        #sidebar{
         min-height: 1200px;
       }
    </style>
    
</head>
<body>
    
     
     <!--image upload-modal start-->
            <div class="modal bs-example-modal-md-2" tabindex="-1" role="dialog" id="uploadprofileModal">
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
            <!--<div class="profile">-->
            <!--    <div class="center">-->
            <!--             @if(!empty(auth()->user()->logo))-->
            <!--              <input type="file" id="panel_file" name="profile_photo" accept="image/*" class="hide">-->
            <!--            <img src="{{ asset('storage/admin_logo/'.Auth::user()->logo) }}" class="img-circle" alt=""  style="width: 150px;height:150px">-->
            <!--            <label class="btn btn-sm btn-info" for="panel_file" title="Change">-->
            <!--                <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></label>-->
            <!--            @else-->
            <!--            <input type="file" id="panel_file" name="profile_photo" accept="image/*" class="hide">-->
            <!--            <a  data-dismiss="modal" for="panel_file"  title="change">-->
            <!--             <img src="{{ asset('storage/admin_logo/'.$projectsetting->admin_default_logo) }}" class="img-circle" alt="" style="width:150px;height: 150px">-->
            <!--             </a>-->
            <!--             @endif-->
            <!--        <h2><?=  substr(Auth::user()->name,0,20) ?> </h2>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="left-custom-menu-adp-wrap" >
                <nav class="sidebar-nav left-sidebar-menu">
                    <ul class="metismenu" id="menu1">
                        @if(Auth::user()->role == 5) 
                             <li>
                            <a class="has-arrow" href="#">
                               <i class="fa fa-building" aria-hidden="true"></i>
                               <span class="mini-click-non">Company Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('admin/companies') ||
                                request()->is('admin/company/dashboard/*') ||
                                    request()->is('admin/company-service/*')|| request()->is('admin/service/create/*') ||
                                    request()->is('admin/service/edit/*') ||
                         request()->is('admin/company-project/*') ||
                         request()->is('admin/project/create/*') || 
                         request()->is('admin/project/*') ||
                         request()->is('admin/company-product/*')||
                         request()->is('admin/product/create/*') || request()->is('admin/company-profile/*') || request()->is('admin/company-edit/*') ||  request()->is('admin/company/quotation/*')  ||  request()->is('admin/company/package/*') ||  request()->is('admin/company/coin/*')? 'active':''}}"><a title="Dashboard" href="{{ url('admin/companies') }}">
                                    <span class="mini-sub-pro">All Company List</span></a>
                                </li>
                                <li class="{{ request()->is('admin/quotations/received') || request()->is('admin/company/quotation') ? 'active':''}}"><a title="Dashboard" href="{{route('admin_company.quotation','received')}}">
                                    <span class="mini-sub-pro">Quotation History List</span></a>
                                </li>
                                 <!--<li class="{{request()->is('admin/quotations/request')?'active':''}}"><a title="Dashboard" href="{{route('admin_company.quotation','request')}}">
                                    <span class="mini-sub-pro">Request Quotations</span></a>
                                </li>-->
                                 <li class="{{ request()->is('admin/coinplan/history/2')? 'active':''}}"><a title="Dashboard" href="{{ url('admin/coinplan/history/2') }}">
                                    <span class="mini-sub-pro">Coin History List</span></a>
                                </li>
                                <li class="{{ request()->is('admin/company/package')? 'active':''}}"><a title="Dashboard" href="{{ route('admin.company.request.package') }}">
                                    <span class="mini-sub-pro">Package History List</span></a>
                                </li>
                                <li class="{{ request()->is('companycategory/index') || request()->is('companycategory')  || request()->is('companycategory/edit/*') ? 'active':''  }}"><a  title="service List" href="{{ route('companycategory.index') }}"><span class="mini-sub-pro">Company Category</span></a>
                                </li>
                            </ul>
                        </li>      
	           <li>
                            <a class="has-arrow" href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Freelancer Management</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('admin/freelancer_list') || request()->is('admin/freelancer/detail')?'active':''}}"><a title="freelancer" href="{{route('users.freelancerlist')}}">
                                    <span class="mini-sub-pro">Freelancer List</span></a>
                                </li>
                                <li class="{{request()->is('admin/freelancer/feedbacks')?'active':''}}"><a title="freelancer feedback" href="{{route('admin.freelancer.feedbacks')}}">
                                    <span class="mini-sub-pro">Freelancer Feedback List</span></a>
                                </li>
                                <li class="{{ request()->is('freelancercategory/index') || request()->is('freelancercategory/edit/*') || request()->is('freelancercategory') ? 'active':''}}"><a title="Freelancer Category" href="{{ route('freelancercategory.index') }}"><span class="mini-sub-pro">Freelancer Category List</span></a></li>
                                <li class="{{ request()->is('freelancerstatus/index')? 'active':''}}"><a title="Freelancer Status List" href="{{ route('freelancerstatus.index') }}"><span class="mini-sub-pro">Freelancer Status List</span></a></li>

                            </ul>
                        </li>
 <li>
                            <a class="has-arrow" href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Member Management</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('admin/member_list')?'active':''}}"><a title="member" href="{{route('users.memberlist')}}">
                                    <span class="mini-sub-pro">Member List</span></a>
                                </li>

                                 <li class="{{request()->is('admin/quotations/requested')?'active':''}}"><a title="member" href="{{route('admin_company.quotation','requested')}}">
                                    <span class="mini-sub-pro">Quotation History List</span></a>
                                </li>
                                 <li class="{{request()->is('admin/coinplan/history/1')?'active':''}}"><a title="member" href="{{ url('admin/coinplan/history/1') }}">
                                    <span class="mini-sub-pro">Coin History List</span></a>
                                </li>

                            </ul>
                     </li>
	       <li>
                            <a class="has-arrow" href="company_dashboard.html">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        Admin Management</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('admin/admin_list')|| request()->is('admin/functions/edit') ?'active':''}}"><a title="admin" href="{{route('users.adminlist')}}">
                                    <span class="mini-sub-pro">Admin List</span></a>
                                </li>
                                 <li class="{{ request()->is('admin/add_admin')?'active':''}}"><a title="admin" href="{{route('users.createadmin')}}">
                                    <span class="mini-sub-pro">Add New Admin</span></a>
                                </li>

                            </ul>
                     </li>
                     <li>
                            <a class="has-arrow" href="company_dashboard.html">
                            <i class="fa fa-list-ul" aria-hidden="true"></i>
                        Advertising Management</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                 <li class="{{ request()->is('admin/advertisings') || request()->is('admin/advertising/edit/*')?'active':''}}"><a title="Dashboard" href="{{ route('admin.advertising.list') }}">
                                    <span class="mini-sub-pro">Advertising  List</span></a>
                                </li>
                                 <li class="{{ request()->is('admin/new/advertising')?'active':''}}"><a title="Dashboard" href="{{ route('admin.advertising.new') }}">
                                    <span class="mini-sub-pro">Add New Advertising</span></a>
                                </li>
                                 <li class="{{ request()->is('advertisingpackagelist/index') || request()->is('advertisingpackagelist/edit/*')?'active':''}}"><a title="Advertising Package List" href="{{ route('advertisingpackagelist.index') }}"><span class="mini-sub-pro">Advertising Package List</span></a></li>

                                <li class="{{request()->is('packageplans/index') || request()->is('packageplans/edit/*')?'active':''}}"><a title="Package List" href="{{ route('packageplans.index') }}"><span class="mini-sub-pro">Seller Package List</span></a></li>
                                 <li class="{{ request()->is('companyadvertisinglist/index') || request()->is('companyadvertisinglist/create') ?'active':''}}"><a title="Company Advertisng Plan List" href="{{ route('companyadvertisinglist.index') }}"><span class="mini-sub-pro">Company Advertising List</span></a></li>

                                <li class="{{request()->is('companyadvertisingplan/*')?'active':''}}"><a title="Company Advertising Plan" href="{{ route('companyadvertisingplan.index') }}"><span class="mini-sub-pro">Company Advertising Plan</span></a></li>
                            </ul>
                       </li>
                         <li>
                            <a  class="has-arrow"  href="{{ route('freelancer.blogs') }}">
                                 <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                <span class="mini-click-non">Blog Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                
                                <li class="{{ request()->is('blog-list') || request()->is('blog/edit/*')?'active':''}}"><a title="blog" href="{{ route('freelancer.blogs') }}"><span class="mini-sub-pro">Blog List</span></a></li>
                                
                                <li class="{{ request()->is('add/blog')?'active':''}}"><a title="add blog" href="{{ route('add.blog') }}"><span class="mini-sub-pro">Add New Blog</span></a></li>
                                
                                <li class="{{ request()->is('blogcategory/index') || request()->is('blogcategory')|| request()->is('blogcategory/edit/*') ?'active':''}}"><a title="Blog Category List" href="{{ route('blogcategory.index') }}"><span class="mini-sub-pro">Blog Category List</span></a></li>

                            </ul>
                        </li>
                         <li>
                            <a class="has-arrow" href="index.html">
                                <i class="fa fa-cogs" aria-hidden="true"></i>
                                <span class="mini-click-non">Setting</span>
                            </a>
                            <ul class="submenu-angle setting" aria-expanded="true">

                                <li class="{{ request()->is('admin/location') || request()->is('admin/location/*')?'active':''}}"><a title="Location List" href="{{ route('admin.location.index') }}"><span class="mini-sub-pro">Location List</span></a></li>

                                <li class="{{ request()->is('range') || request()->is('range/*')? 'active':''}}"><a title="Range List" href="{{ route('range.index') }}"><span class="mini-sub-pro">Range List</span></a></li>

                               

                                <li class="{{ request()->is('admin/coinplan') || request()->is('coinplannew') || request()->is('coinplans/edit/*')?'active':''}}"><a title="Coin Plan List" href="{{ route('admin.coinplan.index') }}"><span class="mini-sub-pro">Coin Plan List</span></a></li>
                           
                                 <li class="{{ request()->is('currency-unit') || request()->is('currency-unit/*')?'active':''}}"><a title="currency-unit List" href="{{ route('currency-unit.index') }}"><span class="mini-sub-pro">Currency Unit List</span></a></li> 
                              


                                <li class="{{request()->is('projectsetting/edit')?'active':''}}"><a title="Update Project Setting" href="{{ route('projectsetting.edit') }}"><span class="mini-sub-pro">Update Project Setting</span></a></li>

                              
                                
                                <li class="{{request()->is('privacy/edit')?'active':''}}"><a title="Privacy Policy" href="{{ route('privacy.edit') }}"><span class="mini-sub-pro">Privacy</span></a></li>
                                
                                <li class="{{request()->is('terms-of-service/edit')?'active':''}}"><a title="Terms Of Service" href="{{ route('terms-of-service.edit') }}"><span class="mini-sub-pro">Terms Of Service</span></a></li>
                                
                                <li class="{{request()->is('about-us/edit')?'active':''}}"><a title="About Us" href="{{ route('about-us.edit') }}"><span class="mini-sub-pro">About Us</span></a></li>
                                
                                 <li class="{{request()->is('advertise-with-us/edit')?'active':''}}"><a title="Advertise With Us" href="{{ route('advertise-with-us.edit') }}"><span class="mini-sub-pro">Advertise With Us</span></a></li>

                            </ul>
                        </li>
                        <li>
                             <a class="has-arrow" href="index.html">
                                <i class="fa fa-money" aria-hidden="true"></i>
                                <span class="mini-click-non">Daily Product Price</span>
                            </a>

                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{request()->is('dailyproductprice/index') || request()->is('dailyproductprice/edit/*')?'active':''}}"><a title="Dashboard" href="{{ route('dailyproductprice.index') }}">
                                    <span class="mini-sub-pro">Daily Product Price List</span></a>
                                </li>
                                 <li class="{{ request()->is('dailyproductprice')?'active':''}}"><a title="Dashboard" href="{{ route('dailyproductprice.create') }}">
                                    <span class="mini-sub-pro">New Daily Product Price</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                             <a class="has-arrow">
                                <i class="fa fa-youtube" aria-hidden="true"></i>
                                <span class="mini-click-non">Myanboxtube</span>
                            </a>

                            <ul class="submenu-angle" aria-expanded="true">
                                
                                <li class="{{ request()->is('myanboxtube/index') || request()->is('myanboxtube/edit/*')?'active':''}}"><a title="Dashboard" href="{{ route('myanboxtube.index') }}">
                                    <span class="mini-sub-pro">MyanBox Tube List</span></a>
                                </li>
                                
                                <li class="{{ request()->is('myanboxtube') ?'active':''}}"><a title="Dashboard" href="{{ route('myanboxtube.create') }}">
                                    <span class="mini-sub-pro">New MyanBox Tube</span></a>
                                </li>
                                
                            </ul>
                        </li>
                         <li>
                             <a class="has-arrow">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                <span class="mini-click-non">News</span>
                            </a>

                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('news/index') || request()->is('news/edit/*')?'active':''}}"><a title="Dashboard" href="{{ route('news.index') }}">
                                    <span class="mini-sub-pro">News List</span></a>
                                </li>
                                <li class="{{request()->is('news')?'active':''}}"><a title="Dashboard" href="{{ route('news.create') }}">
                                    <span class="mini-sub-pro">Create News</span></a>
                                </li>
                              
                                
                            </ul>
                        </li>
                        @else
                        
                             @if(!empty($userfunctions))
                             @foreach($userfunctions as $userfunction)
                             @if($userfunction->function_id == '1')
                         <li>
                            <a class="has-arrow" href="#">
                               <i class="fa fa-building" aria-hidden="true"></i>
                               <span class="mini-click-non">Company Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('admin/companies') ||
                                request()->is('admin/company/dashboard/*') ||
                                    request()->is('admin/company-service/*')|| request()->is('admin/service/create/*') ||
                                    request()->is('admin/service/edit/*') ||
                         request()->is('admin/company-project/*') ||
                         request()->is('admin/project/create/*') || 
                         request()->is('admin/project/*') ||
                         request()->is('admin/company-product/*')||
                         request()->is('admin/product/create/*') || request()->is('admin/company-profile/*') || request()->is('admin/company-edit/*') ||  request()->is('admin/company/quotation/*')  ||  request()->is('admin/company/package/*') ||  request()->is('admin/company/coin/*')? 'active':''}}"><a title="Dashboard" href="{{ url('admin/companies') }}">
                                    <span class="mini-sub-pro">All Company List</span></a>
                                </li>
                                <li class="{{ request()->is('admin/quotations/received') || request()->is('admin/company/quotation') ? 'active':''}}"><a title="Dashboard" href="{{route('admin_company.quotation','received')}}">
                                    <span class="mini-sub-pro">Quotation History List</span></a>
                                </li>
                                 <!--<li class="{{request()->is('admin/quotations/request')?'active':''}}"><a title="Dashboard" href="{{route('admin_company.quotation','request')}}">
                                    <span class="mini-sub-pro">Request Quotations</span></a>
                                </li>-->
                                 <li class="{{ request()->is('admin/coinplan/history/2')? 'active':''}}"><a title="Dashboard" href="{{ url('admin/coinplan/history/2') }}">
                                    <span class="mini-sub-pro">Coin History List</span></a>
                                </li>
                                <li class="{{ request()->is('admin/company/package')? 'active':''}}"><a title="Dashboard" href="{{ route('admin.company.request.package') }}">
                                    <span class="mini-sub-pro">Package History List</span></a>
                                </li>
                                <li class="{{ request()->is('companycategory/index') || request()->is('companycategory')  || request()->is('companycategory/edit/*') ? 'active':''  }}"><a title="service List" href="{{ route('companycategory.index') }}"><span class="mini-sub-pro">Company Category</span></a>
                                </li>
                            </ul>
                        </li>      
                          @endif
                          @endforeach
                           @foreach($userfunctions as $userfunction)
                          @if($userfunction->function_id == '2')               
                        <li>
                            <a class="has-arrow" href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Freelancer Management</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('admin/freelancer_list') || request()->is('admin/freelancer/detail')?'active':''}}"><a title="freelancer" href="{{route('users.freelancerlist')}}">
                                    <span class="mini-sub-pro">Freelancer List</span></a>
                                </li>
                                <li class="{{request()->is('admin/freelancer/feedbacks')?'active':''}}"><a title="freelancer feedback" href="{{route('admin.freelancer.feedbacks')}}">
                                    <span class="mini-sub-pro">Freelancer Feedback List</span></a>
                                </li>
                                <li class="{{ request()->is('freelancercategory/index') || request()->is('freelancercategory/edit/*') || request()->is('freelancercategory') ? 'active':''}}"><a title="Freelancer Category" href="{{ route('freelancercategory.index') }}"><span class="mini-sub-pro">Freelancer Category List</span></a></li>
                                <li class="{{ request()->is('freelancerstatus/index')? 'active':''}}"><a title="Freelancer Status List" href="{{ route('freelancerstatus.index') }}"><span class="mini-sub-pro">Freelancer Status List</span></a></li>

                            </ul>
                        </li>
                        @endif
                        @endforeach
                         @foreach($userfunctions as $userfunction)
                         @if($userfunction->function_id == '3')
                         <li>
                            <a class="has-arrow" href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Member Management</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('admin/member_list')?'active':''}}"><a title="member" href="{{route('users.memberlist')}}">
                                    <span class="mini-sub-pro">Member List</span></a>
                                </li>

                                 <li class="{{request()->is('admin/quotations/requested')?'active':''}}"><a title="member" href="{{route('admin_company.quotation','requested')}}">
                                    <span class="mini-sub-pro">Quotation History List</span></a>
                                </li>
                                 <li class="{{request()->is('admin/coinplan/history/1')?'active':''}}"><a title="member" href="{{ url('admin/coinplan/history/1') }}">
                                    <span class="mini-sub-pro">Coin History List</span></a>
                                </li>

                            </ul>
                     </li>
                     @endif
                     @endforeach
                      @foreach($userfunctions as $userfunction)
                          @if($userfunction->function_id == '9')
                       <li>
                            <a class="has-arrow" href="company_dashboard.html">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        Admin Management</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('admin/admin_list')|| request()->is('admin/functions/edit') ?'active':''}}"><a title="admin" href="{{route('users.adminlist')}}">
                                    <span class="mini-sub-pro">Admin List</span></a>
                                </li>
                                 <li class="{{ request()->is('admin/add_admin')?'active':''}}"><a title="admin" href="{{route('users.createadmin')}}">
                                    <span class="mini-sub-pro">Add New Admin</span></a>
                                </li>

                            </ul>
                     </li>
                     @endif
                     @endforeach
                     @foreach($userfunctions as $userfunction)
                     @if($userfunction->function_id == '4')
                        <li>
                            <a class="has-arrow" href="company_dashboard.html">
                            <i class="fa fa-list-ul" aria-hidden="true"></i>
                        Advertising Management</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                 <li class="{{ request()->is('admin/advertisings') || request()->is('admin/advertising/edit/*')?'active':''}}"><a title="Dashboard" href="{{ route('admin.advertising.list') }}">
                                    <span class="mini-sub-pro">Advertising  List</span></a>
                                </li>
                                 <li class="{{ request()->is('admin/new/advertising')?'active':''}}"><a title="Dashboard" href="{{ route('admin.advertising.new') }}">
                                    <span class="mini-sub-pro">Add New Advertising</span></a>
                                </li>
                                 <li class="{{ request()->is('advertisingpackagelist/index') || request()->is('advertisingpackagelist/edit/*')?'active':''}}"><a title="Advertising Package List" href="{{ route('advertisingpackagelist.index') }}"><span class="mini-sub-pro">Advertising Package List</span></a></li>

                                <li class="{{request()->is('packageplans/index') || request()->is('packageplans/edit/*')?'active':''}}"><a title="Package List" href="{{ route('packageplans.index') }}"><span class="mini-sub-pro">Seller Package List</span></a></li>
                                 <li class="{{ request()->is('companyadvertisinglist/index') || request()->is('companyadvertisinglist/create') ?'active':''}}"><a title="Company Advertisng Plan List" href="{{ route('companyadvertisinglist.index') }}"><span class="mini-sub-pro">Company Advertising List</span></a></li>

                                <li class="{{request()->is('companyadvertisingplan/*')?'active':''}}"><a title="Company Advertising Plan" href="{{ route('companyadvertisingplan.index') }}"><span class="mini-sub-pro">Company Advertising Plan</span></a></li>
                            </ul>
                       </li>
                        @endif
                       @endforeach
                       @foreach($userfunctions as $userfunction)
                     @if($userfunction->function_id == '5')
                         <li>
                            <a  class="has-arrow"  href="{{ route('freelancer.blogs') }}">
                                 <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                <span class="mini-click-non">Blog Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('blog-list') || request()->is('blog/edit/*')?'active':''}}"><a title="blog" href="{{ route('freelancer.blogs') }}"><span class="mini-sub-pro">Blog List</span></a></li>
                                <li class="{{ request()->is('add/blog')?'active':''}}"><a title="add blog" href="{{ route('add.blog') }}"><span class="mini-sub-pro">Add New Blog</span></a></li>
                                
                                <li class="{{ request()->is('blogcategory/index') || request()->is('blogcategory')|| request()->is('blogcategory/edit/*') ?'active':''}}"><a title="Blog Category List" href="{{ route('blogcategory.index') }}"><span class="mini-sub-pro">Blog Category List</span></a></li>

                            </ul>
                        </li>
                         @endif
                       @endforeach
                       @foreach($userfunctions as $userfunction)
                     @if($userfunction->function_id == '6')
                         <li>
                            <a class="has-arrow" href="index.html">
                                <i class="fa fa-cogs" aria-hidden="true"></i>
                                <span class="mini-click-non">Setting</span>
                            </a>
                            <ul class="submenu-angle setting" aria-expanded="true">

                                <li class="{{ request()->is('admin/location') || request()->is('admin/location/*')?'active':''}}"><a title="Location List" href="{{ route('admin.location.index') }}"><span class="mini-sub-pro">Location List</span></a></li>

                                <li class="{{ request()->is('range') || request()->is('range/*')? 'active':''}}"><a title="Range List" href="{{ route('range.index') }}"><span class="mini-sub-pro">Range List</span></a></li>

                               

                                <li class="{{ request()->is('admin/coinplan') || request()->is('coinplannew') || request()->is('coinplans/edit/*')?'active':''}}"><a title="Coin Plan List" href="{{ route('admin.coinplan.index') }}"><span class="mini-sub-pro">Coin Plan List</span></a></li>
                           

                               <li class="{{ request()->is('currency-unit') || request()->is('currency-unit/*')?'active':''}}"><a title="currency-unit List" href="{{ route('currency-unit.index') }}"><span class="mini-sub-pro">Currency Unit List</span></a></li> 


                                <li class="{{request()->is('projectsetting/edit')?'active':''}}"><a title="Update Project Setting" href="{{ route('projectsetting.edit') }}"><span class="mini-sub-pro">Update Project Setting</span></a></li>

                              
                                
                                <li class="{{request()->is('privacy/edit')?'active':''}}"><a title="Privacy Policy" href="{{ route('privacy.edit') }}"><span class="mini-sub-pro">Privacy</span></a></li>
                                <li class="{{request()->is('terms-of-service/edit')?'active':''}}"><a title="Terms Of Service" href="{{ route('terms-of-service.edit') }}"><span class="mini-sub-pro">Terms Of Service</span></a></li>
                                <li class="{{request()->is('about-us/edit')?'active':''}}"><a title="About Us" href="{{ route('about-us.edit') }}"><span class="mini-sub-pro">About Us</span></a></li>
                                 <li class="{{request()->is('advertise-with-us/edit')?'active':''}}"><a title="Advertise With Us" href="{{ route('advertise-with-us.edit') }}"><span class="mini-sub-pro">Advertise With Us</span></a></li>

                            </ul>
                        </li>
                         @endif
                       @endforeach
                       @foreach($userfunctions as $userfunction)
                     @if($userfunction->function_id == '7')
                        <li>
                             <a class="has-arrow" href="index.html">
                                <i class="fa fa-money" aria-hidden="true"></i>
                                <span class="mini-click-non">Daily Product Price</span>
                            </a>

                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{request()->is('dailyproductprice/index') || request()->is('dailyproductprice/edit/*')?'active':''}}"><a title="Dashboard" href="{{ route('dailyproductprice.index') }}">
                                    <span class="mini-sub-pro">Daily Product Price List</span></a>
                                </li>
                                 <li class="{{ request()->is('dailyproductprice')?'active':''}}"><a title="Dashboard" href="{{ route('dailyproductprice.create') }}">
                                    <span class="mini-sub-pro">New Daily Product Price</span></a>
                                </li>
                            </ul>
                        </li>
                         @endif
                       @endforeach
                        @foreach($userfunctions as $userfunction)
                     @if($userfunction->function_id == '8')
                        <li>
                             <a class="has-arrow">
                                <i class="fa fa-youtube" aria-hidden="true"></i>
                                <span class="mini-click-non">Myanboxtube</span>
                            </a>

                            <ul class="submenu-angle" aria-expanded="true">
                                
                                <li class="{{ request()->is('myanboxtube/index') || request()->is('myanboxtube/edit/*')?'active':''}}"><a title="Dashboard" href="{{ route('myanboxtube.index') }}">
                                    <span class="mini-sub-pro">MyanBox Tube List</span></a>
                                </li>
                                
                                <li class="{{ request()->is('myanboxtube') ?'active':''}}"><a title="Dashboard" href="{{ route('myanboxtube.create') }}">
                                    <span class="mini-sub-pro">New MyanBox Tube</span></a>
                                </li>
                                
                            </ul>
                        </li>
                        @endif
                       @endforeach
                       @foreach($userfunctions as $userfunction)
                          @if($userfunction->function_id == '10')
                         <li>
                             <a class="has-arrow">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                <span class="mini-click-non">News</span>
                            </a>

                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('news/index') || request()->is('news/edit/*')?'active':''}}"><a title="Dashboard" href="{{ route('news.index') }}">
                                    <span class="mini-sub-pro">News List</span></a>
                                </li>
                                <li class="{{request()->is('news')?'active':''}}"><a title="Dashboard" href="{{ route('news.create') }}">
                                    <span class="mini-sub-pro">Create News</span></a>
                                </li>
                              
                                
                            </ul>
                        </li>
                        @endif
                       @endforeach
                    @endif
                @endif
                        <!-- <li><a href="company_profile.html">
                        <i class="fa fa-building" aria-hidden="true"></i>
                        Company Profile</a></li> -->
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
                                                            <img src="{{ asset('storage/admin_logo/'.Auth::user()->logo) }}" alt="" />
                                                            <span class="admin-name">{{ Auth::user()->name }}</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        @php
                                                           $id = Auth::user()->id;
                                                           $id = \Crypt::encrypt($id);
                                                        @endphp
                                                        <li><a href="{{ route('users.editadmin',$id ) }}"><span class="edu-icon edu-user-rounded author-log-ic"></span>Update Profile</a>
                                                        </li>
                                                        <li><a href="{{ route('admin.account') }}"><span class="edu-icon edu-money author-log-ic"></span>Change Password</a>
                                                        </li>
                                                        <li><a href="{{ url('/') }}"><span class="edu-icon edu-settings author-log-ic"></span>Go To Website</a>
                                                        </li>
                                                       <li> <a  href="{{ url('/logout') }}"><span class="edu-icon edu-settings author-log-ic"></span>Logout</a></li>
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
                                  @if(Auth::user()->role == 5) 
                             <li>
                            <a class="has-arrow" href="#">
                               <i class="fa fa-building" aria-hidden="true"></i>
                               <span class="mini-click-non">Company Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('admin/companies') ||
                                request()->is('admin/company/dashboard/*') ||
                                    request()->is('admin/company-service/*')|| request()->is('admin/service/create/*') ||
                                    request()->is('admin/service/edit/*') ||
                         request()->is('admin/company-project/*') ||
                         request()->is('admin/project/create/*') || 
                         request()->is('admin/project/*') ||
                         request()->is('admin/company-product/*')||
                         request()->is('admin/product/create/*') || request()->is('admin/company-profile/*') || request()->is('admin/company-edit/*') ||  request()->is('admin/company/quotation/*')  ||  request()->is('admin/company/package/*') ||  request()->is('admin/company/coin/*')? 'active':''}}"><a title="Dashboard" href="{{ url('admin/companies') }}">
                                    <span class="mini-sub-pro">All Company List</span></a>
                                </li>
                                <li class="{{ request()->is('admin/quotations/received') || request()->is('admin/company/quotation') ? 'active':''}}"><a title="Dashboard" href="{{route('admin_company.quotation','received')}}">
                                    <span class="mini-sub-pro">Quotation History List</span></a>
                                </li>
                                 <!--<li class="{{request()->is('admin/quotations/request')?'active':''}}"><a title="Dashboard" href="{{route('admin_company.quotation','request')}}">
                                    <span class="mini-sub-pro">Request Quotations</span></a>
                                </li>-->
                                 <li class="{{ request()->is('admin/coinplan/history/2')? 'active':''}}"><a title="Dashboard" href="{{ url('admin/coinplan/history/2') }}">
                                    <span class="mini-sub-pro">Coin History List</span></a>
                                </li>
                                <li class="{{ request()->is('admin/company/package')? 'active':''}}"><a title="Dashboard" href="{{ route('admin.company.request.package') }}">
                                    <span class="mini-sub-pro">Package History List</span></a>
                                </li>
                                <li class="{{ request()->is('companycategory/index') || request()->is('companycategory')  || request()->is('companycategory/edit/*') ? 'active':''  }}"><a title="service List" href="{{ route('companycategory.index') }}"><span class="mini-sub-pro">Company Category</span></a>
                                </li>
                            </ul>
                        </li>      
	           <li>
                            <a class="has-arrow" href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Freelancer Management</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('admin/freelancer_list') || request()->is('admin/freelancer/detail')?'active':''}}"><a title="freelancer" href="{{route('users.freelancerlist')}}">
                                    <span class="mini-sub-pro">Freelancer List</span></a>
                                </li>
                                <li class="{{request()->is('admin/freelancer/feedbacks')?'active':''}}"><a title="freelancer feedback" href="{{route('admin.freelancer.feedbacks')}}">
                                    <span class="mini-sub-pro">Freelancer Feedback List</span></a>
                                </li>
                                <li class="{{ request()->is('freelancercategory/index') || request()->is('freelancercategory/edit/*') || request()->is('freelancercategory') ? 'active':''}}"><a title="Freelancer Category" href="{{ route('freelancercategory.index') }}"><span class="mini-sub-pro">Freelancer Category List</span></a></li>
                                <li class="{{ request()->is('freelancerstatus/index')? 'active':''}}"><a title="Freelancer Status List" href="{{ route('freelancerstatus.index') }}"><span class="mini-sub-pro">Freelancer Status List</span></a></li>

                            </ul>
                        </li>
 <li>
                            <a class="has-arrow" href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Member Management</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('admin/member_list')?'active':''}}"><a title="member" href="{{route('users.memberlist')}}">
                                    <span class="mini-sub-pro">Member List</span></a>
                                </li>

                                 <li class="{{request()->is('admin/quotations/requested')?'active':''}}"><a title="member" href="{{route('admin_company.quotation','requested')}}">
                                    <span class="mini-sub-pro">Quotation History List</span></a>
                                </li>
                                 <li class="{{request()->is('admin/coinplan/history/1')?'active':''}}"><a title="member" href="{{ url('admin/coinplan/history/1') }}">
                                    <span class="mini-sub-pro">Coin History List</span></a>
                                </li>

                            </ul>
                     </li>
	       <li>
                            <a class="has-arrow" href="company_dashboard.html">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        Admin Management</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('admin/admin_list')|| request()->is('admin/functions/edit') ?'active':''}}"><a title="admin" href="{{route('users.adminlist')}}">
                                    <span class="mini-sub-pro">Admin List</span></a>
                                </li>
                                 <li class="{{ request()->is('admin/add_admin')?'active':''}}"><a title="admin" href="{{route('users.createadmin')}}">
                                    <span class="mini-sub-pro">Add New Admin</span></a>
                                </li>

                            </ul>
                     </li>
                     <li>
                            <a class="has-arrow" href="company_dashboard.html">
                            <i class="fa fa-list-ul" aria-hidden="true"></i>
                        Advertising Management</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                 <li class="{{ request()->is('admin/advertisings') || request()->is('admin/advertising/edit/*')?'active':''}}"><a title="Dashboard" href="{{ route('admin.advertising.list') }}">
                                    <span class="mini-sub-pro">Advertising  List</span></a>
                                </li>
                                 <li class="{{ request()->is('admin/new/advertising')?'active':''}}"><a title="Dashboard" href="{{ route('admin.advertising.new') }}">
                                    <span class="mini-sub-pro">Add New Advertising</span></a>
                                </li>
                                 <li class="{{ request()->is('advertisingpackagelist/index') || request()->is('advertisingpackagelist/edit/*')?'active':''}}"><a title="Advertising Package List" href="{{ route('advertisingpackagelist.index') }}"><span class="mini-sub-pro">Advertising Package List</span></a></li>

                                <li class="{{request()->is('packageplans/index') || request()->is('packageplans/edit/*')?'active':''}}"><a title="Package List" href="{{ route('packageplans.index') }}"><span class="mini-sub-pro">Seller Package List</span></a></li>
                                 <li class="{{ request()->is('companyadvertisinglist/index')?'active':''}}"><a title="Company Advertisng Plan List" href="{{ route('companyadvertisinglist.index') }}"><span class="mini-sub-pro">Company Advertising List</span></a></li>

                                <li class="{{request()->is('companyadvertisingplan/*')?'active':''}}"><a title="Company Advertising Plan" href="{{ route('companyadvertisingplan.index') }}"><span class="mini-sub-pro">Company Advertising Plan</span></a></li>
                            </ul>
                       </li>
                         <li>
                            <a  class="has-arrow"  href="{{ route('freelancer.blogs') }}">
                                 <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                <span class="mini-click-non">Blog Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('blog-list') || request()->is('blog/edit/*')?'active':''}}"><a title="blog" href="{{ route('freelancer.blogs') }}"><span class="mini-sub-pro">Blog List</span></a></li>
                                <li class="{{ request()->is('add/blog')?'active':''}}"><a title="add blog" href="{{ route('add.blog') }}"><span class="mini-sub-pro">Add New Blog</span></a></li>
                                
                                <li class="{{ request()->is('blogcategory/index') || request()->is('blogcategory')|| request()->is('blogcategory/edit/*') ?'active':''}}"><a title="Blog Category List" href="{{ route('blogcategory.index') }}"><span class="mini-sub-pro">Blog Category List</span></a></li>

                            </ul>
                        </li>
                         <li>
                            <a class="has-arrow" href="index.html">
                                <i class="fa fa-cogs" aria-hidden="true"></i>
                                <span class="mini-click-non">Setting</span>
                            </a>
                            <ul class="submenu-angle setting" aria-expanded="true">

                                <li class="{{ request()->is('admin/location') || request()->is('admin/location/*')?'active':''}}"><a title="Location List" href="{{ route('admin.location.index') }}"><span class="mini-sub-pro">Location List</span></a></li>

                                <li class="{{ request()->is('range') || request()->is('range/*')? 'active':''}}"><a title="Range List" href="{{ route('range.index') }}"><span class="mini-sub-pro">Range List</span></a></li>

                               

                                <li class="{{ request()->is('admin/coinplan') || request()->is('coinplannew') || request()->is('coinplans/edit/*')?'active':''}}"><a title="Coin Plan List" href="{{ route('admin.coinplan.index') }}"><span class="mini-sub-pro">Coin Plan List</span></a></li>
                           

                              


                                <li class="{{request()->is('projectsetting/edit')?'active':''}}"><a title="Update Project Setting" href="{{ route('projectsetting.edit') }}"><span class="mini-sub-pro">Update Project Setting</span></a></li>

                              
                                
                                <li class="{{request()->is('privacy/edit')?'active':''}}"><a title="Privacy Policy" href="{{ route('privacy.edit') }}"><span class="mini-sub-pro">Privacy</span></a></li>
                                <li class="{{request()->is('terms-of-service/edit')?'active':''}}"><a title="Terms Of Service" href="{{ route('terms-of-service.edit') }}"><span class="mini-sub-pro">Terms Of Service</span></a></li>
                                <li class="{{request()->is('about-us/edit')?'active':''}}"><a title="About Us" href="{{ route('about-us.edit') }}"><span class="mini-sub-pro">About Us</span></a></li>
                                 <li class="{{request()->is('advertise-with-us/edit')?'active':''}}"><a title="Advertise With Us" href="{{ route('advertise-with-us.edit') }}"><span class="mini-sub-pro">Advertise With Us</span></a></li>

                            </ul>
                        </li>
                        <li>
                             <a class="has-arrow" href="index.html">
                                <i class="fa fa-money" aria-hidden="true"></i>
                                <span class="mini-click-non">Daily Product Price</span>
                            </a>

                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{request()->is('dailyproductprice/index') || request()->is('dailyproductprice/edit/*')?'active':''}}"><a title="Dashboard" href="{{ route('dailyproductprice.index') }}">
                                    <span class="mini-sub-pro">Daily Product Price List</span></a>
                                </li>
                                 <li class="{{ request()->is('dailyproductprice')?'active':''}}"><a title="Dashboard" href="{{ route('dailyproductprice.create') }}">
                                    <span class="mini-sub-pro">New Daily Product Price</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                             <a class="has-arrow">
                                <i class="fa fa-youtube" aria-hidden="true"></i>
                                <span class="mini-click-non">Myanboxtube</span>
                            </a>

                            <ul class="submenu-angle" aria-expanded="true">
                                
                                <li class="{{ request()->is('myanboxtube/index') || request()->is('myanboxtube/edit/*')?'active':''}}"><a title="Dashboard" href="{{ route('myanboxtube.index') }}">
                                    <span class="mini-sub-pro">MyanBox Tube List</span></a>
                                </li>
                                
                                <li class="{{ request()->is('myanboxtube') ?'active':''}}"><a title="Dashboard" href="{{ route('myanboxtube.create') }}">
                                    <span class="mini-sub-pro">New MyanBox Tube</span></a>
                                </li>
                                
                            </ul>
                        </li>
                         <li>
                             <a class="has-arrow">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                <span class="mini-click-non">News</span>
                            </a>

                            <ul class="submenu-angle" aria-expanded="true">
                                <li class="{{ request()->is('news/index') || request()->is('news/edit/*')?'active':''}}"><a title="Dashboard" href="{{ route('news.index') }}">
                                    <span class="mini-sub-pro">News List</span></a>
                                </li>
                                <li class="{{request()->is('news')?'active':''}}"><a title="Dashboard" href="{{ route('news.create') }}">
                                    <span class="mini-sub-pro">Create News</span></a>
                                </li>
                              
                                
                            </ul>
                        </li>
                        @else
                                        @if(!empty($userfunctions))
                             @foreach($userfunctions as $userfunction)
                             @if($userfunction->function_id == '1')
                         <li>
                            <a class="has-arrow" href="#">
                               <i class="fa fa-building" aria-hidden="true"></i>
                               <span class="mini-click-non">Company Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard" href="{{ url('admin/companies') }}">
                                    <span class="mini-sub-pro">All Company List</span></a>
                                </li>
                                <li><a title="Dashboard" href="{{route('admin_company.quotation','received')}}">
                                    <span class="mini-sub-pro">Quotation History List</span></a>
                                </li>
                                 <li><a title="Dashboard" href="{{ url('admin/coinplan/history/2') }}">
                                    <span class="mini-sub-pro">Coin History List</span></a>
                                </li>
                                <li><a title="Dashboard" href="{{ route('admin.company.request.package') }}">
                                    <span class="mini-sub-pro">Package History  List</span></a>
                                </li>
                                 <li class="{{ request()->is('companycategory/index') || request()->is('companycategory')  || request()->is('companycategory/edit/*') ? 'active':''  }}"><a title="service List" href="{{ route('companycategory.index') }}"><span class="mini-sub-pro">Company Category</span></a></li>
                            </ul>
                        </li>      
                          @endif
                          @endforeach
                           @foreach($userfunctions as $userfunction)
                          @if($userfunction->function_id == '2')               
                        <li>
                            <a class="has-arrow" href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Freelancer Management</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="freelancer" href="{{route('users.freelancerlist')}}">
                                    <span class="mini-sub-pro">Freelancer List</span></a>
                                </li>
                                <li><a title="freelancer feedback" href="{{route('admin.freelancer.feedbacks')}}">
                                    <span class="mini-sub-pro">Freelancer Feedback List</span></a>
                                </li>
                               <li class="{{ request()->is('freelancercategory/index') || request()->is('freelancercategory/edit/*') || request()->is('freelancercategory') ? 'active':''}}"><a title="Freelancer Category" href="{{ route('freelancercategory.index') }}"><span class="mini-sub-pro">Freelancer Category List</span></a></li>
                               <li class="{{ request()->is('freelancerstatus/index')? 'active':''}}"><a title="Freelancer Status List" href="{{ route('freelancerstatus.index') }}"><span class="mini-sub-pro">Freelancer Status List</span></a></li>

                            </ul>
                        </li>
                        @endif
                        @endforeach
                         @foreach($userfunctions as $userfunction)
                         @if($userfunction->function_id == '3')
                         <li>
                            <a class="has-arrow" href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Member Management</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="member" href="{{route('users.memberlist')}}">
                                    <span class="mini-sub-pro">Member List</span></a>
                                </li>

                                 <li><a title="member" href="{{route('admin.quotation','request') }}">
                                    <span class="mini-sub-pro">Quotation History List</span></a>
                                </li>
                                 <li><a title="member" href="{{url('admin/coinplan/history/1') }}">
                                    <span class="mini-sub-pro">Coin History List</span></a>
                                </li>

                            </ul>
                     </li>
                     @endif
                     @endforeach
                      @foreach($userfunctions as $userfunction)
                          @if($userfunction->function_id == '9')
                       <li>
                            <a class="has-arrow" href="company_dashboard.html">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        Admin Management</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="admin" href="{{route('users.adminlist')}}">
                                    <span class="mini-sub-pro">Admin List</span></a>
                                </li>
                                 <li><a title="admin" href="{{route('users.createadmin')}}">
                                    <span class="mini-sub-pro">Add New Admin</span></a>
                                </li>

                            </ul>
                     </li>
                     @endif
                     @endforeach
                     @foreach($userfunctions as $userfunction)
                     @if($userfunction->function_id == '4')
                        <li  class="active">
                            <a class="has-arrow" href="company_dashboard.html">
                            <i class="fa fa-list-ul" aria-hidden="true"></i>
                        Advertising Management</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard" href="{{ route('admin.advertising.new') }}">
                                    <span class="mini-sub-pro">add new advertising</span></a>
                                </li>
                                 <li><a title="Dashboard" href="{{ route('admin.advertising.list') }}">
                                    <span class="mini-sub-pro">Advertising  List</span></a>
                                </li>
                                 <li class="{{ request()->is('advertisingpackagelist/index') || request()->is('advertisingpackagelist/edit/*')?'active':''}}"><a title="Advertising Package List" href="{{ route('advertisingpackagelist.index') }}"><span class="mini-sub-pro">Advertising Package List</span></a></li>

                                <li class="{{request()->is('packageplans/index') || request()->is('packageplans/edit/*')?'active':''}}"><a title="Package List" href="{{ route('packageplans.index') }}"><span class="mini-sub-pro">Seller Package List</span></a></li>
                                 <li class="{{ request()->is('companyadvertisinglist/index') || request()->is('companyadvertisinglist/create') ?'active':''}}"><a title="Company Advertisng Plan List" href="{{ route('companyadvertisinglist.index') }}"><span class="mini-sub-pro">Company Advertising List</span></a></li>

                                <li class="{{request()->is('companyadvertisingplan/*')?'active':''}}"><a title="Company Advertising Plan" href="{{ route('companyadvertisingplan.index') }}"><span class="mini-sub-pro">Company Advertising Plan</span></a></li>
                            </ul>
                       </li>
                        @endif
                       @endforeach
                       @foreach($userfunctions as $userfunction)
                     @if($userfunction->function_id == '5')
                         <li>
                            <a  class="has-arrow"  href="{{ route('freelancer.blogs') }}">
                                 <i class="fa fa-th" aria-hidden="true"></i>
                                <span class="mini-click-non">Blog Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="blog" href="{{ route('freelancer.blogs') }}"><span class="mini-sub-pro">Blog List</span></a></li>
                                <li><a title="add blog" href="{{ route('add.blog') }}"><span class="mini-sub-pro">Add New Blog</span></a></li>
                                
                                <li class="{{ request()->is('blogcategory/index') || request()->is('blogcategory')|| request()->is('blogcategory/edit/*') ?'active':''}}"><a title="Blog Category List" href="{{ route('blogcategory.index') }}"><span class="mini-sub-pro">Blog Category List</span></a></li>

                            </ul>
                        </li>
                         @endif
                       @endforeach
                       @foreach($userfunctions as $userfunction)
                     @if($userfunction->function_id == '6')
                         <li>
                            <a class="has-arrow" >
                                <i class="fa fa-cogs" aria-hidden="true"></i>
                                <span class="mini-click-non">Setting</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">

                                

                                <li><a title="Location List" href="{{ route('admin.location.index') }}"><span class="mini-sub-pro">Location List</span></a></li>

                                <li><a title="Range List" href="{{ route('range.index') }}"><span class="mini-sub-pro">Range List</span></a></li>

                                <!--<li><a title="Advertising Package List" href="{{ route('advertisingpackagelist.index') }}"><span class="mini-sub-pro">Advertising Package List</span></a></li>-->

                                <!--<li><a title="Package List" href="{{ route('packageplans.index') }}"><span class="mini-sub-pro">Seller Package List</span></a></li>-->

                                <li><a title="Coin Plan List" href="{{ route('admin.coinplan.index') }}"><span class="mini-sub-pro">Coin Plan List</span></a></li>
                                 
                               
                            

                                <li><a title="Update Project Setting" href="{{ route('projectsetting.edit') }}"><span class="mini-sub-pro">Update Project Setting</span></a></li>

                                
                                
                                <li><a title="Privacy Policy" href="{{ route('privacy.edit') }}"><span class="mini-sub-pro">Privacy</span></a></li>
                                <li><a title="Terms Of Service" href="{{ route('terms-of-service.edit') }}"><span class="mini-sub-pro">Terms Of Service</span></a></li>
                                <li><a title="About Us" href="{{ route('about-us.edit') }}"><span class="mini-sub-pro">About Us</span></a></li>
                                 <li><a title="Advertise With Us" href="{{ route('advertise-with-us.edit') }}"><span class="mini-sub-pro">Advertise With Us</span></a></li>

                            </ul>
                        </li>
                         @endif
                       @endforeach
                       @foreach($userfunctions as $userfunction)
                     @if($userfunction->function_id == '7')
                        <li>
                             <a class="has-arrow" href="index.html">
                                <i class="fa fa-cogs" aria-hidden="true"></i>
                                <span class="mini-click-non">Daily Product Price</span>
                            </a>

                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard" href="{{ route('dailyproductprice.create') }}">
                                    <span class="mini-sub-pro">New Daily Product Price</span></a>
                                </li>
                                <li><a title="Dashboard" href="{{ route('dailyproductprice.index') }}">
                                    <span class="mini-sub-pro">Daily Product Price List</span></a>
                                </li>
                                
                            </ul>
                        </li>
                         @endif
                       @endforeach
                        @foreach($userfunctions as $userfunction)
                     @if($userfunction->function_id == '8')
                        <li>
                             <a class="has-arrow">
                                <i class="fa fa-youtube" aria-hidden="true"></i>
                                <span class="mini-click-non">Myanboxtube</span>
                            </a>

                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard" href="{{ route('myanboxtube.create') }}">
                                    <span class="mini-sub-pro">New MyanBox Tube</span></a>
                                </li>
                                 <li><a title="Dashboard" href="{{ route('myanboxtube.index') }}">
                                    <span class="mini-sub-pro">MyanBox Tube List</span></a>
                                </li>
                                
                               
                                
                            </ul>
                        </li>
                        @endif
                       @endforeach
                       @foreach($userfunctions as $userfunction)
                          @if($userfunction->function_id == '10')
                         <li>
                             <a class="has-arrow">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                <span class="mini-click-non">News</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard" href="{{ route('news.create') }}">
                                    <span class="mini-sub-pro">Create News</span></a>
                                </li>
                                <li><a title="Dashboard" href="{{ route('news.index') }}">
                                    <span class="mini-sub-pro">News List</span></a>
                                </li>
                                
                            </ul>
                        </li>
                        @endif
                       @endforeach
                    @endif
                    @endif
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
    
   <!--<script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script>-->
   <script src="{{ asset('admin/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js')}}"></script> 
    
    
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script> 
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
    <!-- summernote JS Text editor
        ============================================ -->
    <script src="{{ asset('admin/js/summernote/summernote.min.js')}}"></script>
    <script src="{{ asset('admin/js/summernote/summernote-active.js')}}"></script>

     <!-- Image cropper JS
        ============================================ -->
    <script src="{{ asset('admin/js/cropper/croppie.js')}}"></script>
   <script>
         
   </script>
     <script>
         
                @if(session('process_fail'))
                    const message = '{{session("process_fail")}}';
                    callbackError(message);
                @endif
                @if(Session::has('error')) 
                    var message = "{{Session::get('error')}}"; 
                    callbackError(message);
                @endif
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
    $('#blog_detail,#privacy,#termsOfService,#detail').on('summernote.paste', function(e, ne) {
         var bufferText = ((ne.originalEvent || ne).clipboardData || window.clipboardData).getData('Text');
         ne.preventDefault();
         document.execCommand('insertText', false, bufferText)
    });
    
       $(document).ready(function(){
        var img = '<?php echo asset('storage/user/'.auth()->user()->logo) ?>';
                var image_name = '<?php echo auth()->user()->logo ?>';
                html = '<img alt="'+image_name+'" src="' + img + '" class="img-circle"/>';
                $("#current_profile_photo").html(html);
               //Image Cropping

               /* image crop */
               var resize22 = $('#profile_photo').croppie({
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
                   data: {"image":img,'path':'admin_logo'},
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