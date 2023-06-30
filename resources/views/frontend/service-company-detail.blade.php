@extends('frontend.layouts.homeapp')
@section('title','Myanbox | '.$servicecompanydetail->name.' Company')
@section('content')
<div class="company_services detail">
<!--main-header end-->
  @if(!empty($servicecompanydetail->cover_photo))
   <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$servicecompanydetail->cover_photo) }}');">
  @else
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->service_default_background_image) }}');">
  @endif
    <div class="container">
    <h1>{{ $servicecompanydetail->name }}</h1>
      <ul class="xs-breadcumb">
        <li><a href="{{ url('/') }}" style="color:{{ $projectsetting->service_nav_first_background_and_icon }} !important;">Home / </a>
       @if(!empty($main_category_url))
       <a href="{{ url('/companies/'.$main_category_url.'/'.$category_url) }}" style="color:{{ $projectsetting->service_nav_first_background_and_icon }} !important;">  {{ $company_category_name }} / </a>
       @else
        <a href="{{ url('/companies/'.$category_url) }}" style="color:{{ $projectsetting->service_nav_first_background_and_icon }} !important;">  {{ $company_category_name }} / </a>
       @endif
        {{ $servicecompanydetail->name }}</li>
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
                      @if($servicecompanydetail->logo != null && $servicecompanydetail->logo !='undefined')
                   <img src="{{ asset('storage/company_logo/'.$servicecompanydetail->logo) }}" alt="{{ $servicecompanydetail->name }}" class="img-responsive">
                   @else
                   <img src="{{ asset('storage/company_logo/'.$projectsetting->service_default_logo) }}" alt="{{ $servicecompanydetail->name }}" class="img-responsive">
                   @endif
                      <!--<div><i class="fa fa-plus"></i></div>
                          <a href="blog.html"></a>--> </figure>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="post-tittle">
                      <h4><a href="#">{{ $servicecompanydetail->name }}</a></h4>
                    </div>
                    <ul class="blogDate info">
                      <li> <i class="fa fa-envelope" aria-hidden="true" style="color:{{ $projectsetting->service_nav_first_background_and_icon }} !important;"></i></i> <a href="mailto:<?= $servicecompanydetail->email ?>"><span>{{ $servicecompanydetail->email }}</span> </a></li>
                      <li> <i class="fa fa-phone" aria-hidden="true" style="color:{{ $projectsetting->service_nav_first_background_and_icon }} !important;"></i><a href="tel:<?= $servicecompanydetail->phone ?>"> <span>{{ $servicecompanydetail->phone }}</span> </a></li>
                       @if(!empty($servicecompanydetail->website))
                      <li> <i class="fa fa-globe" aria-hidden="true" style="color:{{ $projectsetting->service_nav_first_background_and_icon }} !important;"></i> <a href="<?= $servicecompanydetail->website ?>"><span><?= $servicecompanydetail->website ?></span></a> </li>
                       @endif
                    </ul>
                    <ul class="blogDate">
                      <li> <i class="fa fa-home" aria-hidden="true"style="color:{{ $projectsetting->service_nav_first_background_and_icon }} !important;"></i><span>@foreach($companycategories as $category)
                  {{ $category->category_name }},
                  @endforeach</span> </li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-4">
                  <span class="pull-right service-social">
                  @if(!empty($servicecompanydetail->facebook ))
                  <a href="{{ $servicecompanydetail->facebook }}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                   @endif
                    @if(!empty($servicecompanydetail->instagram))
                  <a href="{{ $servicecompanydetail->instagram }}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                  @endif
                   @if(!empty($servicecompanydetail->twitter))
                  <a href="{{ $servicecompanydetail->twitter }}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  @endif
                   @if(!empty($servicecompanydetail->linkedin))
                  <a href="{{ $servicecompanydetail->linkedin }}"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                   @endif

                  <!-- <a href="#."><i class="fa fa-pinterest-square" aria-hidden="true"></i></a> -->
                </span>
                <br>
                <div class="mt90">
                  <a id="myBtn" data-company="{{$servicecompanydetail->id}}" data-category="{{$companycategories[0]->category_id}}" data-dismiss="modal" aria-label="Close" data-toggle="modal" class="service-quotation pull-right company_detail_quotation" style="background:linear-gradient(90deg, {{ $projectsetting->	service_nav_first_background_and_icon }} 50%, {{ $projectsetting->service_nav_second_background }}) !important;color:{{ $projectsetting->service_nav_font_color}} !important">Get A Quote</a>
                </div>
                </div>
            </div>
            <div class="row about_us">
              <div class="col-md-12 col-sm-12">
                  <div class="post-tittle">
                      <h5>About Us</h5>
                  </div>
                  <p><?php echo $servicecompanydetail->description; ?></p>
                 @if(!empty($servicecompanydetail->business_opening_hours) || !empty($servicecompanydetail->business_closing_hours))
                  <ul  class="blogDate">
                        <li><i class="fa fa-calendar" aria-hidden="true" style="color:{{ $projectsetting->service_nav_first_background_and_icon }} !important;"></i><span> Opening  :
                        <?= $servicecompanydetail->business_opening_hours ?> ~
                        <?= $servicecompanydetail->business_closing_hours ?>
                      <?=  "(". $servicecompanydetail->business_days .")" ?></span></li>
                    </ul>
                    @endif
                    @if(!empty($servicecompanydetail->address) || !empty($servicecompanydetail->location))
                     <ul  class="blogDate">
                        <li>
                        <i class="fa fa-map-marker" aria-hidden="true" style="color:{{ $projectsetting->service_nav_first_background_and_icon }} !important;"></i>
                        <span> Address  :
                        <?= $servicecompanydetail->address ?>
                        @if(!empty($servicecompanydetail->location->name)),
                          <?= $servicecompanydetail->location->name ?>,
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
                  <p><?php echo $servicecompanydetail->service; ?></p>
                </div>
              </div>

              <div class="row what_we_do">
              <div class="col-md-12 col-sm-12 editor">
                  <div class="post-tittle">
                      <h5>Vission</h5>
                  </div>
                  <p><?php echo $servicecompanydetail->vission; ?></p>
                </div>
              </div>
            </div>
          </li>

            @if($activepackage)
           @if($activepackage->end_date > date('Y-m-d') && $activepackage->package_plan_id != 1 )
           @if(count($servicedetails) > 0)

           <li>
            <div class="row our_service">
              <div class="col-md-12 col-sm-12">
                 <div class="post-tittle">
                    <h4>Our Services</h4>
                  </div>
              </div>
            </div>
          </li>
          <li>

            <div class="row our_services">
              @foreach ($servicedetails as $servicedetail)
               @if($servicedetail->image_name != null && $servicedetail->image_name != 'undefined' )
              <div class="col-md-4 col-sm-6">
                <div class="service_list">
                  <img src="{{ asset('storage/service/'.$servicedetail->image_name) }}" alt="portfolio" class="img-responsive">
                  <a data-toggle="collapse" href="#collapse{{ $servicedetail->id}}">
                  <h5>{{ $servicedetail->service_name }} </h5>
                  </a>
                  <div id="collapse{{ $servicedetail->id}}" class="panel-collapse collapse">
              <div class="panel-body"><?php  echo $servicedetail->service_detail ?></div>
            </div>
                </div>
              </div>
              @endif
              @endforeach
            </div>
          </li>
            @endif
            @if(count($projectdetails) > 0 )
           <li>
            <div class="row our_service">
              <div class="col-md-12 col-sm-12">
                 <div class="post-tittle">
                    <h4>Our Project</h4>
                  </div>
              </div>
            </div>
          </li>
          <li>
            <div class="row our_services">
                @foreach ($projectdetails as $projectdetail)
                @if($projectdetail->photo != null && $projectdetail->photo != 'undefined' )
              <div class="col-md-4 col-sm-6 pr10">
                <div class="service_list">
                  <a href="{{ url('project-detail/servicecompanydetail/'.$category_url.'/'.$projectdetail->company_url.'/'.$projectdetail->project_url )}}">
                  <img src="{{ asset('storage/project/'.$projectdetail->photo) }}" alt="portfolio" class="img-responsive">
                  <h5>{{ $projectdetail->project_name }}</h5>
                  </a>
                </div>
              </div>
              @endif
              @endforeach
            </div>
          </li>
          @endif
          @endif
          @endif
      </div>
        <li class="col-md-3 col-sm-12">
          <div class="side-bar related_standard">
              <div class="panel">
                <div class="panel-heading">
                   <h2 class="panel-title text-center"  style="background:linear-gradient(90deg, {{ $projectsetting->service_nav_first_background_and_icon }} 50%, {{ $projectsetting->service_nav_second_background }}) !important;color:{{ $projectsetting->service_nav_font_color}} !important">Related Companies </h2>
                </div>
                 <div class="panel-body overflow">
                    <div class="row service">
                       <div class="col-md-12 ">
                          <div class="list-group">
                            @foreach($relatedcompanies as $relatedcompany)
                            <a href="{{ url('servicecompanydetail/'.$category_url.'/'.$relatedcompany->company_url) }}" class="list-group-item">
                              <div class="row">
                                <div class="col-md-4 col-sm-3 col-xs-3 nopadding">
                                    @if($relatedcompany->company_logo != null && $relatedcompany->company_logo !='undefined')
                                    <img src="{{ asset('storage/company_logo/'.$relatedcompany->company_logo) }}" class="img-responsive">
                                    @else
                                    <img src="{{ asset('storage/company_logo/'.$projectsetting->service_default_logo) }}" class="img-responsive">
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
           @foreach($advertisings as $advertising)
          <div class="side-bar">
              <div class="advertise">
                 <a href="{{  $advertising->link }}"><img src="{{ asset('storage/advertising/'.$advertising->photo) }}" alt="{{ $advertising->company_name }}" style="height:100%;width:100%"></a>
              </div>
          </div>
          @endforeach
        </li>
      </ul>
      </div>
    </div>
    <!--container end-->
  </section>
 <!--inner content end-->
<!--brand-section start-->
@include('element.company_logo_slider')
@include('element.get_quote_detail_modalbox')
</div>

<!--brand-section end-->
<script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script>
@include('element.get_detail_quote_script')
