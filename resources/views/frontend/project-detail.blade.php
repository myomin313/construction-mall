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
        <li ><a href="{{ url('/') }}" style="color:{{ $projectsetting->service_nav_first_background_and_icon }} !important;"> Home  / </a> <a href="{{ url($company_url) }}" style="color:{{ $projectsetting->service_nav_first_background_and_icon }} !important;">{{ $companyproject->company_name}} /</a> {{ $companyproject->project_name }} </li>
      </ul>
    </div>
  </section>
  <!--inner-heading end-->
  <!--inner content start--> 
  <section class="inner-wrap service_detail"> 
    <!--container start-->
    <div class="container">
      <div class="row">
      <!--row start-->
      <ul class="blog-grid">
      <div class="col-md-12 col-sm-12 project_detail">
        <li>
            <div class="blog-inter">
             <div class="row">
              <div class="col-md-5 col-sm-6">
                <span><i class="fa fa-home" aria-hidden="true"></i> Business Type: {{ $companyproject->project_type_name }}</span><br>
              </div>
              <div class="col-md-5 col-sm-6">
                <span><i class="fa fa-money" aria-hidden="true"></i> Range: {{ $companyproject->minimum_price }} ~ {{ $companyproject->maximum_price }} Ks</span>
              </div>
              <div class="col-md-2">
              </div>
              <div class="col-md-12">
                <p><?php  echo $companyproject->project_description ?></p>
              </div>
            </div>
          </div>
        </li>
        @if(count($projectphotos) > 0)
        <li>
          <div class="row gallery no-gutters">
             @foreach ($projectphotos as $project_photo)
            <div class="col-md-3 col-sm-4 thumb p5 ">
              <div class="blog-inter">
                <a class="box" href="#" data-image-id="" data-toggle="modal" data-title="{{ $project_photo->image_title }} "
                 data-image="{{ asset('storage/project/'.$project_photo->photo) }}"
                 data-target="#image-gallery">
                  <figure class="style-greens-two green">
                    <img class="img-thumbnail w-100 rounded-0"
                         src="{{ asset('storage/project/'.$project_photo->photo) }}"
                         alt="{{ $project_photo->image_title }} ">
                    <div>
                        <span>{{ $project_photo->image_title }} </span>
                    </div>
                  </figure>
                </a>
              </div>
            </div>
            @endforeach            
          </div>
        </div>
        </li>
        @endif
      </div>
      </ul>  
      </div>    
    </div>      
    <!--container end--> 
  </section>
</div>
@include('element.company_logo_slider')
@include('element.project_gallery_modal')
@endsection
@section('script')
  @include('element.project_gallery_script')
@endsection