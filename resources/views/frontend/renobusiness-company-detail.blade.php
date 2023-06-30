@extends('frontend.layouts.homeapp')
@section('title','Myanbox | '.$renobusinessdetail->name .' Company')
@section('script')
@section('content')
<div class="reno_business detail">
@if(!empty($renobusinessdetail->cover_photo))
  <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$renobusinessdetail->cover_photo) }}');">
 @else
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->reno_default_background_image) }}');">
  @endif
    <div class="container">
    <h1>{{ $renobusinessdetail->name }}</h1>
      <ul class="xs-breadcumb">
        <li><a href="{{ url('/') }}" style="color:{{ $projectsetting->reno_nav_first_background_and_icon }} !important;">Home / </a>
       @if(!empty($main_category_url))
       <a href="{{ url('/companies/'.$main_category_url.'/'.$category_url) }}" style="color:{{ $projectsetting->reno_nav_first_background_and_icon }} !important;">  {{ $company_category_name }} / </a>
       @else
        <a href="{{ url('/companies/'.$category_url) }}" style="color:{{ $projectsetting->reno_nav_first_background_and_icon }} !important;">  {{ $company_category_name }} / </a>
       @endif
       {{ $renobusinessdetail->name }}</li>
      </ul>
    </div>

  </section>
<!--inner content start-->

  <section class="inner-wrap service_detail">
    <!--container start-->
    <div class="container">
      <div class="row">
      <!--row start-->
      <ul class="blog-grid">

        <!--col start-->
      <div class="col-md-9 col-sm-12">
         <li>
            <div class="blog-inter">
              <div class="row">
                <div class="col-md-4 col-sm-4">
                  <figure >
                     @if($renobusinessdetail->logo != null && $renobusinessdetail->logo !='undefined')
                   <img src="{{ asset('storage/company_logo/'.$renobusinessdetail->logo) }}" alt="{{ $renobusinessdetail->name }}" class="img-responsive">
                    @else
                    <img src="{{ asset('storage/company_logo/'.$projectsetting->reno_default_logo) }}" alt="{{ $renobusinessdetail->name }}" class="img-responsive">
                   @endif
                      <!--<div><i class="fa fa-plus"></i></div>-->
                          <!--<a href="blog.html"></a>--> </figure>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="post-tittle">
                      <h4><a href="#">{{ $renobusinessdetail->name }}</a></h4>
                    </div>
                    <ul class="blogDate info">
                      <li> <i class="fa fa-envelope" aria-hidden="true" style="color:{{ $projectsetting->reno_nav_first_background_and_icon }} !important;"></i><a href="mailto:<?= $renobusinessdetail->email ?>"> <span>{{ $renobusinessdetail->email }}</a></span> </li>
                      <li> <i class="fa fa-phone" aria-hidden="true" style="color:{{ $projectsetting->reno_nav_first_background_and_icon }} !important;"></i><a href="tel:<?= $renobusinessdetail->phone ?>"> <span>{{ $renobusinessdetail->phone }}</span> </li>
                       @if(!empty($renobusinessdetail->website))
                      <li> <i class="fa fa-globe" aria-hidden="true" style="color:{{ $projectsetting->reno_nav_first_background_and_icon }} !important;"></i> <a href="<?= $renobusinessdetail->website ?>"><span><?= $renobusinessdetail->website ?></span></a> </li>
                       @endif
                    </ul>
                    <ul class="blogDate">
                      <li> <i class="fa fa-home" aria-hidden="true" style="color:{{ $projectsetting->reno_nav_first_background_and_icon }} !important;"></i><span>@foreach($companycategories as $category)
                  {{ $category->category_name }},
                  @endforeach</span> </li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-4">
                  <span class="pull-right service-social">
                 @if(!empty($renobusinessdetail->facebook ))
                  <a href="{{ $renobusinessdetail->facebook }}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                   @endif
                    @if(!empty($renobusinessdetail->instagram))
                  <a href="{{ $renobusinessdetail->instagram }}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                  @endif
              @if(!empty($renobusinessdetail->twitter))
                  <a href="{{ $renobusinessdetail->twitter }}"><i class="fa fa-file-video" aria-hidden="true"></i></a>
                  @endif
                  @if(!empty($renobusinessdetail->linkedin))
                  <a href="{{ $renobusinessdetail->linkedin }}"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                  @endif
                  <!-- <a href="#."><i class="fa fa-pinterest-square" aria-hidden="true"></i></a> -->
                </span>
                <br>
                <div class="mt90">
                  <a id="myBtn" data-dismiss="modal"  data-company="{{$renobusinessdetail->id}}" data-category="{{$companycategories[0]->category_id}}" aria-label="Close" data-toggle="modal" data-target="#reno-business-get-contact" class="renobusiness-contact company_detail_quotation pull-right" style="background:linear-gradient(90deg, {{ $projectsetting->reno_nav_first_background_and_icon }} 50%, {{ $projectsetting->reno_nav_second_background }}) !important;color:{{ $projectsetting->reno_nav_font_color}} !important">Get A Quote</a>
                </div>
                </div>
            </div>
            <div class="row about_us">
              <div class="col-md-12 col-sm-12">
                  <div class="post-tittle">
                      <h5>About Us</h5>
                  </div>
                  <p><?php echo $renobusinessdetail->description; ?></p>
                  @if(!empty($renobusinessdetail->business_opening_hours) || !empty($renobusinessdetail->business_closing_hours))
                  <ul  class="blogDate">
                        <li><i class="fa fa-calendar" aria-hidden="true" style="color:{{ $projectsetting->reno_nav_first_background_and_icon }} !important;"></i><span> Opening  :
                        <?= $renobusinessdetail->business_opening_hours ?> ~
                        <?= $renobusinessdetail->business_closing_hours ?>
                      <?=  "(". $renobusinessdetail->business_days .")" ?></span></li>
                    </ul>
                  @endif
                  @if(!empty($renobusinessdetail->address) || !empty($renobusinessdetail->location))
                     <ul  class="blogDate">
                        <li>
                        <i class="fa fa-map-marker" aria-hidden="true" style="color:{{ $projectsetting->reno_nav_first_background_and_icon }} !important;"></i>
                        <span> Address  :
                        <?= $renobusinessdetail->address ?>
                        @if(!empty($renobusinessdetail->location->name)),
                          <?= $renobusinessdetail->location->name ?>,
                        @endif
                        @if(!empty($city->name))
                           <?=$city->name ?>
                        @endif</span></li>
                    </ul>
                 @endif
                </div>
              </div>
              <div class="row what_we_do">
              <div class="col-md-12 col-sm-12 editor">
                  <div class="post-tittle">
                      <h5>What We Do?</h5>
                  </div>
                  <p><?php echo $renobusinessdetail->service; ?></p>
                </div>
              </div>
             <div class="row what_we_do">
              <div class="col-md-12 col-sm-12 editor">
                  <div class="post-tittle">
                      <h5>Our Vission/h5>
                  </div>
                  <p><?php echo $renobusinessdetail->vission; ?></p>
                </div>
              </div>
            </div>
          </li>

           <li>
              <div class="row" style="position:relative;top:10px">
   @foreach($advertisings as $advertising)
  <div class="col-md-5 col-sm-12" style="padding:12px;    border: 2px solid #c7c3c3;
    padding: 20px;
    margin-right:15px;
    margin-bottom: 20px;
    border-radius: 10px;">
   <!-- <div class="side-bar"> -->
    <!-- <div class="side-barBox"> -->
     <!--  <ul>
        -->
       <!--  <li> -->
           <a href="{{  $advertising->link }}"><img src="{{ asset('storage/advertising/'.$advertising->photo) }}" alt="{{ $advertising->company_name }}"  style="height:100%;width:100%"></a>
       <!--  </li> -->

      <!-- </ul> -->
    <!-- </div> -->
  <!-- </div> -->
</div>
  @endforeach
</div></li>
    </div>
        <li class="col-md-3 col-sm-12">
          <div class="side-bar related_standard">
              <div class="panel">
                <div class="panel-heading">
                   <h2 class="panel-title text-center" style="background:linear-gradient(90deg, {{ $projectsetting->reno_nav_first_background_and_icon }} 50%, {{ $projectsetting->reno_nav_second_background }}) !important;color:{{ $projectsetting->reno_nav_font_color}} !important">Related Companies </h2>
                </div>
                 <div class="panel-body overflow">
                    <div class="row service">
                       <div class="col-md-12 ">
                          <div class="list-group">
                            @foreach($relatedcompanies as $relatedcompany)
                            <a href="{{ url('renobusinessdetail/'.$category_url.'/'.$relatedcompany->company_url) }}" class="list-group-item">
                              <div class="row">
                                <div class="col-md-4 col-sm-3 col-xs-3 nopadding">
                                    @if($relatedcompany->company_logo != null && $relatedcompany->company_logo !='undefined')
                                    <img src="{{ asset('storage/company_logo/'.$relatedcompany->company_logo) }}" class="img-responsive">
                                    @else
                                    <img src="{{asset('storage/company_logo/'.$projectsetting->reno_default_logo)}}" class="img-responsive">
                                    @endif
                                </div>
                                <div class="col-md-8 col-sm-9 col-xs-9 nopadding">
                                   <h2>{{ $relatedcompany->company_name }}</h2>
                                   <span><?php

                                foreach ($relatedcompany->categories->slice(0,1) as  $category) {
                                    echo $category->category_name.',';
                                }

                              ?></span>
                                </div>
                              </div>
                            </a>
                            @endforeach

                          </div>
                       </div>
                      </div>
                    </div>
              </div>
          </div>
        </li>
      </ul>
      </div>
    </div>
    <!--container end-->
  </section>
 <!--inner content end-->
<!--brand-section start-->
<!--inner content end-->
@include('element.company_logo_slider')
@include('element.get_quote_detail_modalbox')
</div>

<!--brand-section end-->
<script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script>
@include('element.get_detail_quote_script')
@endsection
