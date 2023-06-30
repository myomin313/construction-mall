@extends('layouts.company_new_panel')
@section('title','Myanbox | Dashboard')
@section('content')
<body class="suppliers">
<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
  <!--preloader end--> 
  <!--main-header start-->
  @include('element.header')
  <!--main-header end--> 
    <!--<section class="inner-heading">-->
    @if(Session::get('parent_category_id') == 1)
    <?php $main_category='Service Company'; ?>
       @if(!empty($company->cover_photo))
  <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->service_default_background_image) }}');">
  @endif
  @elseif(Session::get('parent_category_id') == 2)
  <?php $main_category='Supplier Company'; ?>
   @if(!empty($company->cover_photo))
  <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->supplier_default_background_image) }}');">
  @endif
  @elseif(Session::get('parent_category_id') == 3)
  <?php $main_category='Reno Business Company'; ?>
   @if(!empty($company->cover_photo))
  <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->reno_default_background_image) }}');">
  @endif
  @endif
    <div class="container">
      <h1>Company Dashboard</h1>
    </div>
  </section>
<!--inner content start-->
  <div class="container-fluid" style="margin-top: -3em;z-index: 4;">
      <input type="file" id="cover_file" name="cover_photo" accept="image/*" class="hide">
       <label class="pull-right edit_btn" for="cover_file">
    <i class="fa fa-camera" style="color:white;padding:10px;background: #ffcc32;border-radius: 20px" aria-hidden="true"></i></label>
    </div> 
  <section class="inner-wrap service_detail"> 
    <!--container start-->
    <div class="container">
      <!--row start-->
      <ul class="blog-grid">
        
        <!--col start-->
        @include('element.company_menu')
         
         
        </div>
      <div class="col-md-9 col-sm-12">
          <li>
            <div class="row our_services">
              <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">{{$count_arr[0]['received_quotation']}}</p>
                  <h3 class="card-title">Total Received Quote
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="{{route('company.received.quotation','received')}}">Get Detail</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">{{$count_arr[0]['received_quotation_success']}}</p>
                  <h3 class="card-title">Received Success Quote</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="{{route('company.received.quotation','success')}}">Get Detail</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">{{$count_arr[0]['received_quotation_pending']}}</p>
                  <h3 class="card-title">Received Pending Quote</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="{{route('company.received.quotation','pending')}}">Get Detail</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                  </div> 
                  <p class="card-category">{{$count_arr[0]['requested_quotation_count']}}</p>
                  <h3 class="card-title">Total Requested Quote</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="{{route('company.received.quotation','requested')}}">Get Detail</a>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-md-12 col-sm-12">
                <div class="side-bar package">
                  <div class="panel">
                    <div class="panel-heading"> 
                       <h2 class="panel-title text-center">Company Information Summary</h2>
                    </div>
                     <div class="panel-body dashboard">
                          @if(Session::get('parent_category_id') == 1 || Session::get('parent_category_id') == 2)
                      <p>Total Project Count <span class="pull-right"><a href="{{route('project.index')}}"><u>{{$count_arr[0]['project_count']}}</u></a></span></p>
                      @endif
                      @if(Session::get('parent_category_id') == 2 )
                      <p>Total Product Count <span class="pull-right"><a href="{{route('product.index')}}"><u>{{$count_arr[0]['product_count']}}</u></a></span></p>
                      @endif
                      @if(Session::get('parent_category_id') == 1 )
                      <p>Total Service Count <span class="pull-right"><a href="{{route('service.index')}}"><u>{{$count_arr[0]['service_count']}}</u></a></span></p>
                      @endif
                      <p>Total Package Count <span class="pull-right"><a href="{{route('package.history')}}"><u>{{$count_arr[0]['company_package_plan_count']}}</u></a></span></p>
                      <p>Total Viewer Count <span class="pull-right">{{$count_arr[0]['view_count']}}</span></p>
                      <p>Available Coin<span class="pull-right">{{$count_arr[0]['left_coin']}}</span></p>
                      <p>Active Package Plan<span class="pull-right">{{$count_arr[0]['active_plan_name']}}</span></p>
                      @if( Session::get('active_package_plan_id') != 1)
                      <p>Your company's {{ Session::get('active_package_plan_name') }} package will expire soon.Please renew by buying <a href="{{ route('package.index') }}" style="color:#ffcc32;"> a new company package </a>.
                      Your company's projects, products and services information will not see by the people who visit to our website  if you are late to renew it until <?php  echo date('d F, Y',strtotime(Session::get('package_end_date'))) ?>.</p>
                      @else
                       <p>
                          Your Company Package is Free Package.Your company's projects, products and services information will not see by the people who visit to our website.Please Buy <a href="{{ route('package.index') }}" style="color:#ffcc32;">a new company package</a>
                       </p>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
      </div>
      </ul> 

      </div>    
    </div>      
    <!--container end--> 
  </section>
 <!--inner content end--> 

<!--whychoose-wrap end-->
<!--brand-section start-->
@include('element.company_logo_slider')
<!--brand-section end--> 
 @endsection
