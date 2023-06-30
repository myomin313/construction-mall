@extends('frontend.layouts.homeapp')
@section('title','Myanbox | Project Detail')
@section('extra_css')
    <link href="{{ asset('css/company_style.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="company_services detail">

  <!--inner-heading start-->
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->service_default_background_image) }}');">
  <!--<section class="inner-heading">-->
    <div class="container">
      <h1 >{{ $companyproject->project_name }}</h1>
      <ul class="xs-breadcumb">
        <li ><a href="{{ url('/') }}" style="color:{{ $projectsetting->service_nav_first_background_and_icon }} !important;"> Home  / </a> <a href="{{ url('companydetail/'.$category_url.'/'.$company_url) }}" style="color:{{ $projectsetting->service_nav_first_background_and_icon }} !important;">{{ $companyproject->company_name}} /</a> {{ $companyproject->project_name }} </li>
      </ul>
    </div>
  </section>
  <!--inner-heading end-->
  <!-- start myo min design-->
  <section class="inner-wrap service_detail">
    <!--container start-->
    <div class="container">
      <div class="row">
      <!--row start-->
      <ul class="blog-grid">

        <!--col start-->
      <div class="col-md-12 col-sm-12">
         <li>
            <div class="blog-inter">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                    <ul class="blogDate info">
                     	<li class="subtitle col-md-12 col-sm-12 ">Project Name : {{ $companyproject->project_name }}</li>
					<li class="col-md-12 col-sm-12">Business Type :{{ $companyproject->project_type_name }}</li>
					<li class="col-md-12 col-sm-12">Range : {{ $companyproject->minimum_price }} to {{ $companyproject->maximum_price }}</li>
                    </ul>
                </div>
                <div class="col-md-12 col-sm-12 project-description">
                  <!--<span class="pull-right service-social">-->
                        <h3 >Project Description</h3>
	                     <p><?php echo $companyproject->project_description ?></p><br>


                </div>
            </div>

            </div>
          </li>

          @if(count($projectphotos) > 0)
           <li>
            <div class="row our_service">
              <div class="col-md-12 col-sm-12">
                 <div class="post-tittle">
                    <h4><a href="#">Our Project Photo</a></h4>
                  </div>
              </div>
            </div>
          </li>
          <li>
        <!--       @foreach ($projectphotos as $project_photo) -->
        <!-- <li class="col-md-3 col-sm-3">-->
        <!--  <div class="service_list">-->
        <!--    <div class="serviceWrap" style="background:gray">-->
        <!--      <div class="overlay-shop"> <img src="{{ asset('storage/project/'.$project_photo->photo) }}" alt=""></div>-->
        <!--      <div class="link-wrap"> <a href="{{ asset('storage/project/'.$project_photo->photo) }}" class="lightbox-image"><i class="fa fa-search"></i></a> </div>-->
        <!--   </div>-->
        <!--   <div class="title-holder">-->
        <!--    <div class="product-title">-->
        <!--        <h5>{{ $project_photo->image_title }}</h5>-->
        <!--     </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</li>-->
        <!--  @endforeach-->
        <div class="row our_services">
          @foreach ($projectphotos as $project_photo)
              <div class="col-md-3 col-sm-3">
                <div class="service_list">
                  <img src="{{ asset('storage/project/'.$project_photo->photo) }}" alt="portfolio" class="img-responsive">
                  <h5>{{ $project_photo->image_title }} </h5>
                  </a>
                </div>
              </div>
              @endforeach
            </div>
          </li>
            @endif


      </div>

      </ul>
      </div>
    </div>
    <!--container end-->
  </section>
 <!--inner content end-->


<!--portfolio-area end-->

@include('element.company_logo_slider')
  </div>
@endsection
