@extends('frontend.layouts.homeapp')
@section('title','Myanbox | Home')
@section('extra_css')
    <style>
        .section-title h3::after {
            content: '';
            height: 2px;
            width: 130px;
            position: absolute;
            bottom: -20px;
            left: 50%;
            margin-left: -30px;
        }
    </style>
@endsection
@section('content')
    @include('admin.element.success-message')
  <div class="tp-banner-container sliderWraper">
    <div class="tp-banner" >
      <ul>
          @foreach($home_sliders as $home_slider)
        <li data-slotamount="7" data-transition="pop" data-masterspeed="1000" data-saveperformance="on"> <img alt="" src="{{ asset('images/dummy.png') }}" data-lazyload="{{asset('storage/advertising/'.$home_slider->photo)}}">
          <div class="caption lft large-title tp-resizeme slidertext4" data-x="left" data-y="250" data-speed="600" data-start="1600">Myanmar Biggest Collection <br>of Construction, Decoration, <br>Services & Supplier Website</div>
          <div class="caption lft large-title tp-resizeme slidertext1" data-x="left" data-y="400" data-speed="600" data-start="2200">Where you can find the best one for your buliding.</div>
          <div class="caption lfl large-title tp-resizeme slidertext3" data-x="left" data-y="450" data-speed="600" data-start="3500">
              
           @if(!empty(auth()->user()->id))
              @if(auth()->user()->role == '1' || auth()->user()->role == '2')
                  <a data-dismiss="modal" aria-label="Close" data-toggle="modal"  class="main-btn btn-1 btn-1e head-quote btn-warning get_quote_btn">Get A Quote</a>
              @else
                  <a data-dismiss="modal" aria-label="Close" data-toggle="modal"  class="main-btn btn-1 btn-1e head-quote btn-warning get_quote_btn1">Get A Quote</a>
              @endif
            @else
             <a data-dismiss="modal" aria-label="Close" data-toggle="modal"  class="main-btn btn-1 btn-1e head-quote btn-warning get_quote_btn">Get A Quote</a>
             @endif
             
          <a href="{{ route('about-us')}}" class="main-btn btn-1 btn-1e white_color" target="_blank">About Us</a>
          <a href="{{ route('contact-us')}}" class="main-btn btn-1 btn-1e white_color" target="_blank">Contact Us</a></div>
        </li>
        @endforeach
        <!--<li data-slotamount="7" data-transition="flip" data-masterspeed="1000" data-saveperformance="on"> <img alt="" src="{{ asset('images/dummy.png') }}" data-lazyload="{{ asset('images/banner-1.jpg') }}">-->
        <!-- <div class="caption lft large-title tp-resizeme slidertext4" data-x="left" data-y="250" data-speed="600" data-start="1600">Myanmar Biggest Collection <br>of Construction, Decoration, <br>Services & Supplier Website</div>-->
        <!--  <div class="caption lft large-title tp-resizeme slidertext1" data-x="left" data-y="400" data-speed="600" data-start="2200">Where you can find the best one for your buliding.</div>-->
        <!--  <div class="caption lfl large-title tp-resizeme slidertext3" data-x="left" data-y="450" data-speed="600" data-start="3500"><a data-dismiss="modal" aria-label="Close" data-toggle="modal"  class="main-btn btn-1 btn-1e head-quote btn-warning">Get A Quote</a> <a href="{{ route('about-us')}}" class="main-btn btn-1 btn-1e white_color" target="_blank">About Us</a> <a href="{{ route('contact-us')}}" class="main-btn btn-1 btn-1e white_color" target="_blank">Contact Us</a></div>-->
        <!--</li>-->
        <!--<li data-slotamount="7" data-transition="slidedown" data-masterspeed="1000" data-saveperformance="on"> <img alt="" src="{{ asset('images/dummy.png') }}" data-lazyload="{{ asset('images/banner-2.jpg') }}">-->
        <!--  <div class="caption lft large-title tp-resizeme slidertext4" data-x="left" data-y="250" data-speed="600" data-start="1600">Myanmar Biggest Collection <br>of Construction, Decoration, <br>Services & Supplier Website</div>-->
        <!--  <div class="caption lft large-title tp-resizeme slidertext1" data-x="left" data-y="400" data-speed="600" data-start="2200">Where you can find the best one for your buliding.</div>-->
        <!--  <div class="caption lfl large-title tp-resizeme slidertext3" data-x="left" data-y="450" data-speed="600" data-start="3500"><a  data-dismiss="modal" aria-label="Close" data-toggle="modal"  class="main-btn btn-1 btn-1e head-quote btn-warning">Get A Quote</a> <a href="{{ route('about-us')}}" class="main-btn btn-1 btn-1e white_color" target="_blank">About Us</a> <a href="{{ route('contact-us')}}" class="main-btn btn-1 btn-1e white_color" target="_blank">Contact Us</a></div>-->
        <!--</li>-->
      </ul>
    </div>
  </div>
  <!--slider end-->
  <!--search form start-->
    @include('frontend.element.advanced_search_form')
  <!-- search form end -->
 <div class="top-company">
  <!--container start-->
  <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
      @include('frontend.element.top_list',['type'=>'Companies','datas'=>$top_companies->companies])
    </div>
  </div>
  </div>
  <!--container end-->
</div>
<!--top company end-->
<!-- Company Panel -->
<section class="company-panel">
  <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
           <center>
           <h1>Need something done?</h1>
           <span>You can found our service provider here</span>
           </center>
        </div>
      </div>
      <div class="row">
        <div class="col-md-9 col-sm-12">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="panel service">
                <div class="panel-heading">
                   <h2 class="panel-title text-center" style="background:linear-gradient(90deg, {{ $projectsetting->home_nav_first_background}} 50%, {{ $projectsetting->home_nav_second_background}}) !important;color:{{ $projectsetting->home_nav_font_color}} !important">Featured Service Companies </h2>
                </div>
                 <div class="panel-body overflow">
                    <div class="row service">
                       <div class="col-md-12 ">
                          <div class="list-group">
                           @foreach($service_companies as $company)
                              <a href="{{ url($company->company_url)}}" class="list-group-item">
                              <div class="row">
                                <div class="col-md-2 col-sm-3 col-xs-3 nopadding">
                                    @if($company->user->logo != null && $company->user->logo != 'undefined')
                                    <img src="{{asset('storage/company_logo/'.$company->user->logo)}}" class="img-responsive" alt="<?= $company->user->name ?>">
                                    @else
                                    <img src="{{asset('storage/company_logo/'.$projectsetting->service_default_logo)}}" class="img-responsive" alt="<?= $company->user->name ?>">
                                    @endif
                                </div>
                                <div class="col-md-10 col-sm-9 col-xs-9 nopadding">
                                   <h2> <?= $company->user->name ?></h2>
                                   <span><?php $count =1; $category="";
                                           if(asset($company->child_categories))
                                           {
                                             foreach($company->child_categories as $child_category){
                                                  if(sizeof($company->child_categories)==$count)
                                                      $category .= $child_category->name;
                                                  else
                                                      $category .=$child_category->name.",";
                                              $count++;
                                             }
                                             echo (strlen($category) > 40)?substr($category, 0,40)."...":$category;
                                          }
                                          else{
                                            echo "-";
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
            <div class="col-md-6 col-sm-6">
               <div class="panel supplier">
                <div class="panel-heading">
                  <h2 class="panel-title text-center" style="background:linear-gradient(90deg, {{ $projectsetting->home_nav_first_background}} 50%, {{ $projectsetting->home_nav_second_background}}) !important;color:{{ $projectsetting->home_nav_font_color}} !important">Featured Supplier Companies</h2>
                </div>
                 <div class="panel-body overflow ">
                    <div class="row supplier">
                       <div class="col-md-12  ">
                         <div class="list-group">
                             @foreach($supplier_companies as $company)
                              <a href="{{ url($company->company_url)}}" class="list-group-item">
                              <div class="row">
                                <div class="col-md-2 col-sm-3 col-xs-3 nopadding">
                                    @if(isset($company->user->logo) && $company->user->logo != null && $company->user->logo != 'undefined')
                                    <img src="{{asset('storage/company_logo/'.$company->user->logo)}}" class="img-responsive" alt="<?= $company->user->name ?>">
                                    @else
                                    <img src="{{asset('storage/company_logo/'.$projectsetting->supplier_default_logo)}}" class="img-responsive" alt="<?= $company->user->name ?>">
                                    @endif
                                </div>
                                <div class="col-md-10 col-sm-9 col-xs-9 nopadding">
                                   <h2> <?= $company->user->name ?></h2>
                                   <span><?php $count =1; $category="";
                                           if(asset($company->child_categories))
                                           {
                                             foreach($company->child_categories as $child_category){
                                                  if(sizeof($company->child_categories)==$count)
                                                      $category .= $child_category->name;
                                                  else
                                                      $category .=$child_category->name.",";
                                              $count++;
                                             }
                                             echo (strlen($category) > 40)?substr($category, 0,40)."...":$category;
                                          }
                                          else{
                                            echo "-";
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
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 pr10">
              <div class="panel reno">
                <div class="panel-heading">
                   <h2 class="panel-title text-center" style="background:linear-gradient(90deg, {{ $projectsetting->home_nav_first_background}} 50%, {{ $projectsetting->home_nav_second_background}}) !important;color:{{ $projectsetting->home_nav_font_color}} !important">Featured Reno Business</h2>
                </div>
                <div class="panel-body overflow">
                    <div class="row ">
                       <div class="col-md-12  reno">
                          <div class="list-group">
                             @foreach($reno_companies as $company)
                              <a href="{{ url($company->company_url )}}" class="list-group-item">
                              <div class="row">
                                <div class="col-md-2 col-sm-3 col-xs-3 nopadding">
                                    @if(isset($company->user->logo) && $company->user->logo != null && $company->user->logo != 'undefined')
                                     <img src="{{asset('storage/company_logo/'.$company->user->logo)}}" class="img-responsive" alt="<?= $company->user->name ?>">
                                    @else
                                     <img src="{{asset('storage/company_logo/'.$projectsetting->reno_default_logo)}}" class="img-responsive" alt="<?= $company->user->name ?>">
                                    @endif
                                </div>
                                <div class="col-md-10 col-sm-9 col-xs-9 nopadding">
                                   <h2> <?= $company->user->name ?></h2>
                                   <span><?php $count =1; $category="";
                                           if(asset($company->child_categories))
                                           {
                                             foreach($company->child_categories as $child_category){
                                                  if(sizeof($company->child_categories)==$count)
                                                      $category .= $child_category->name;
                                                  else
                                                      $category .=$child_category->name.",";
                                              $count++;
                                             }
                                             echo (strlen($category) > 40)?substr($category, 0,40)."...":$category;
                                          }
                                          else{
                                            echo "-";
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
            <div class="col-md-6 col-sm-6">
               <div class="panel freelancer">
                <div class="panel-heading">
                   <h2 class="panel-title text-center" style="background:linear-gradient(90deg, {{ $projectsetting->home_nav_first_background}} 50%, {{ $projectsetting->home_nav_second_background}}) !important;color:{{ $projectsetting->home_nav_font_color}} !important">Top Professionals</h2>
                </div>
                <div class="panel-body overflow">
                  <div class="row ">
                       <div class="col-md-12 freelancer">
                          <div class="list-group">
                        @foreach($freelancers as $freelancer)
                            <a href="{{ url('professionals-detail/'.$freelancer->freelancer_url)}}" class="list-group-item">
                              <div class="row">
                                <div class="col-md-2 col-sm-3 col-xs-3 nopadding">
                                    @if(isset($freelancer->user->logo) && $freelancer->user->logo != null && $freelancer->user->logo != 'undefined')
                                    <img src="{{asset('storage/freelancer/'.$freelancer->user->logo)}}" class="img-responsive" alt="<?= $freelancer->user->name ?>">
                                    @else
                                    <img src="{{asset('storage/freelancer/'.$projectsetting->freelancer_default_logo )}}" class="img-responsive" alt="<?= $freelancer->user->name ?>">
                                    @endif
                                </div>
                                <div class="col-md-10 col-sm-9 col-xs-9 nopadding">
                                   <h2><?= $freelancer->user->name ?></h2>
                                   <span>
                                    <?php $count =1; $skills ="";
                                        if(asset($freelancer->skillForFreelancer))
                                        {
                                         foreach($freelancer->skillForFreelancer as $skill){
                                              if(sizeof($freelancer->skillForFreelancer)==$count)
                                                $skills .= $skill['skill_name'];
                                              else
                                                $skills .= $skill['skill_name'].",";
                                          $count++;
                                         }
                                          echo (strlen($skills) > 45)?substr($skills, 0,45)."...":$skills;
                                        }else{
                                          echo "-";
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
        </div>
      </div>
        <div class="col-md-3 col-sm-6">
           <div class="panel new">
              <div class="panel-heading">
                <h2 class="panel-title text-center" style="background:linear-gradient(90deg, {{ $projectsetting->home_nav_first_background}} 50%, {{ $projectsetting->home_nav_second_background}}) !important;color:{{ $projectsetting->home_nav_font_color}} !important">Update New</h2>
              </div>
              
              <div class="panel-body advertising overflow_half">
                  <div class="row ">
                     <div class="col-md-12 freelancer">
                        <div class="list-group">
                        @if(!empty($news))
                          @foreach($news as $new)
                          <a href="<?php echo $new->link ?>" class="list-group-item">
                            <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                 <h2><?php echo substr( $new->title, 0, 10)  ?></h2>
                                 <p><?php echo substr( strip_tags($new->description), 0, 150)  ?></p>
                              </div>
                            </div>
                          </a>
                          @endforeach
                          @endif
                        </div>
                      </div>
                    </div>
              </div>
           
           </div>
            <div class="panel sponsered">
              <div class="panel-heading sponsered">
                <h2 class="panel-title text-center" style="background:linear-gradient(90deg, {{ $projectsetting->home_nav_first_background}} 50%, {{ $projectsetting->home_nav_second_background}}) !important;color:{{ $projectsetting->home_nav_font_color}} !important">
                    Daily Price Update
                </h2>
              </div>
              <div class="panel-body overflow_half advertising pb49">
                <table class="table">
                  <tbody>
                     @foreach($daily_product_prices as $daily_product_price)
                    <tr>
                      <td colspan="3"><h2>{{$daily_product_price->product_name}}</h2>
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td><h2>{{$daily_product_price->currency_unit->unit}}&nbsp;{{number_format($daily_product_price->price)}}</h2></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
           </div>
              
           <div class="panel event hidden_sm">
              <div class="panel-heading ">
                <h2 class="panel-title text-center" style="background:linear-gradient(90deg, {{ $projectsetting->home_nav_first_background}} 50%, {{ $projectsetting->home_nav_second_background}}) !important;color:{{ $projectsetting->home_nav_font_color}} !important">Sponsored Logo</h2>
              </div>
              <div class="panel-body event pb25 overflow">
                <div class="row">
                  @foreach($left_logo_advertising->companies as $company)

                  @if(!empty($company->user))
                  <?php  $url="";
                               $category_id="";
                               $category_url="";
                                           if(!empty($company->parent_categories))
                                           {
                                             foreach($company->parent_categories as $parent_category){

                                         $category_url =$parent_category->category_url;

                                         $category_id =$parent_category->id;

                                             }
                                          }
                                           
                                          ?>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                      <a href="{{ url($company->company_url) }}" class="thumbnail">
                          <img src="{{ asset('storage/company_logo/'.$company->user->logo)}}" alt="{{ $company->user->name }}">
                      </a>
                  </div>
                  @endif
                  @endforeach
                </div>
            </div>
         </div>
       </div>
     
        <div class="col-sm-6 show_sm" style="display: none;">
          <div class="panel event">
              <div class="panel-heading ">
                <h2 class="panel-title text-center" style="background:linear-gradient(90deg, {{ $projectsetting->home_nav_first_background}} 50%, {{ $projectsetting->home_nav_second_background}}) !important;color:{{ $projectsetting->home_nav_font_color}} !important">Sponsored Logo</h2>
              </div>
              <div class="panel-body event pb25 overflow">
                <div class="row">
                 @foreach($left_logo_advertising->companies as $company)
                  @if(!empty($company->user))
                     <?php  $url="";
                               $category_id="";
                               $category_url="";
                                           if(!empty($company->parent_categories))
                                           {
                                             foreach($company->parent_categories as $parent_category){

                                         $category_url =$parent_category->category_url;
                                         $category_id =$parent_category->id;
                                             }
                                          }
                                          
                                          ?>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                      <a href="{{ url($company->company_url) }}" class="thumbnail">
                          <img src="{{asset('storage/company_logo/'.$company->user->logo)}}" alt="{{ $company->user->name }}">
                      </a>
                  </div>
                  @endif
                  @endforeach
                </div>
            </div>
         </div>
        </div>
        </div>
      </div>
  </div>
</section>
<!-- Company Panel end -->





<!-- Category start -->
<section class="category">
  <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
            <h1><center>Get work done in different category</center></h1>
        </div>
      </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="row">
              <div class="col-md-2 col-sm-3 col-xs-6">
                  <a href="{{ url('companies/service/residential-construction')}}">
                   <div class="category-desc">
                        <center>
                            <img src="{{ asset('images/category/construction.png') }}" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center">Construction</h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6">
                    <a href="{{ url('companies/service/structural-design')}}">
                   <div class="category-desc">
                        <center>
                            <img src="{{ asset('images/category/design.png') }}" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center">Design</h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6">
                     <a href="{{ url('companies/reno-business/renovation-decoration')}}">
                   <div class="category-desc">
                        <center>
                            <img src="{{ asset('images/category/renovation.png') }}" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center">Renovation</h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6">
                     <a href="{{ url('companies/reno-business/renovation-decoration')}}">
                   <div class="category-desc">
                        <center>
                            <img src="{{ asset('images/category/decoration.png') }}" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center">Decoration</h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6">
                     <a href="{{ url('companies/supplier/flooring-wall-decorative')}}">
                   <div class="category-desc">
                        <center>
                            <img src="{{ asset('images/category/flooring.png') }}" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center">Flooring</h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6">
                     <a href="{{ url('companies/service/architecture-design-firm')}}">
                   <div class="category-desc">
                        <center>
                            <img src="{{ asset('images/category/architecture.png') }}" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center">Architecture</h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6">
                    <a href="{{ url('companies/service/engineering-services')}}">
                   <div class="category-desc">
                       <center>
                            <img src="{{ asset('images/category/meengineering.png') }}" class="img-responsive">
                       </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center">M&E Engin..</h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6">
                    <a href="{{ url('companies/reno-business/real-estate')}}">
                   <div class="category-desc">
                       <center>
                            <img src="{{ asset('images/category/real_estate.png') }}" class="img-responsive">
                       </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center">Real Estate</h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6">
                    <a href="{{ url('companies/supplier/construcation-materials')}}">
                   <div class="category-desc">
                       <center>
                            <img src="{{ asset('images/category/heavy_duty.png') }}" class="img-responsive">
                       </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center">Heavy Duty</h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6">
                     <a href="{{ url('companies/reno-business/legal-consultants')}}">
                   <div class="category-desc">
                        <center>
                            <img src="{{ asset('images/category/rental.png') }}" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center">Rental</h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6">
                    <a href="{{ url('companies/reno-business/finance-solutions')}}">
                   <div class="category-desc">
                        <center>
                            <img src="{{ asset('images/category/estimate.png') }}" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center">Estimate</h4>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6">
                     <a href="{{ route('professionals') }}">
                   <div class="category-desc">
                        <center>
                            <img src="{{ asset('images/category/freelancer.png') }}" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center">Professionals</h4>
                        </div>
                    </div>
                    </a>
                </div>
              </div>
            </div>
         </div>
      </div>
</section>
<!-- Category end -->

<!--counter start-->
<section class="complete">
  <!--container start-->
  <div class="container">
    <!--row start-->
    <div class="row p10">
      <!--col start-->
      <div class="col-md-2 col-sm-4 col-xs-4 counter-item">
        <div class="counterbox">
          <div class="counter-icon">
            <div class="text-center"><img src="{{ asset('images/complete/service.jpg') }}" alt="Services Count"></div>
          </div>
          <div class="counter_area"><span class="counter-number" data-from="1" data-to="<?=  $companies_count[0] ?>" data-speed="1000"><?= $companies_count[0] ?></span> <br><span class="counter-text">Services</span> </div>
        </div>
      </div>
      <!--col end-->
      <!--col start-->
      <div class="col-md-2 col-sm-4 col-xs-4 counter-item">
        <div class="counterbox">
          <div class="counter-icon">
            <div class="text-center"><img src="{{ asset('images/complete/supplier.jpg') }}" alt="Supplier Count"></div>
          </div>
          <div class="counter_area"> <span class="counter-number" data-from="1" data-to="<?=  $companies_count[1] ?>" data-speed="2000"><?=  $companies_count[1] ?></span> <br><span class="counter-text">Suppliers</span> </div>
        </div>
      </div>
      <!--col end-->
      <!--col start-->
      <div class="col-md-2 col-sm-4 col-xs-4 counter-item">
        <div class="counterbox">
          <div class="counter-icon">
            <div class="text-center"><img src="{{ asset('images/complete/reno.jpg') }}" alt="Reno Business Count"></div>
          </div>
          <div class="counter_area"> <span class="counter-number" data-from="1" data-to="<?=  $companies_count[2] ?>" data-speed="3000"><?=  $companies_count[2] ?></span><br> <span class="counter-text">Reno Business</span> </div>
        </div>
      </div>
      <!--col end-->
      <!--col start-->
      <div class="col-md-2 col-sm-4 col-xs-4 counter-item">
        <div class="counterbox">
          <div class="counter-icon">
            <div class="text-center"><img src="{{ asset('images/complete/freelancer.jpg') }}" alt="Freelancer Count"></div>
          </div>
          <div class="counter_area"> <span class="counter-number" data-from="1" data-to="<?= sizeof($freelancers) ?>" data-speed="4000"><?= sizeof($freelancers) ?></span><br> <span class="counter-text">Freelancer</span></div>
        </div>
      </div>
      <!--col end-->
      <!--col start-->
      <div class="col-md-2 col-sm-4 col-xs-4 counter-item">
        <div class="counterbox">
          <div class="counter-icon">
            <div class="text-center"><img src="{{ asset('images/complete/quote.jpg') }}" alt="Request Quote"></div>
          </div>
          <div class="counter_area"> <span class="counter-number" data-from="1" data-to="<?= $quotation_count ?>" data-speed="3000"><?= $quotation_count ?></span><br> <span class="counter-text">Request Quote</span> </div>
        </div>
      </div>
      <!--col end-->
      <!--col start-->
      <div class="col-md-2 col-sm-4 col-xs-4 counter-item">
        <div class="counterbox">
          <div class="counter-icon">
            <center><img src="{{ asset('images/complete/project.jpg') }}" alt="Project Count" ></center>
          </div>
          <div class="counter_area"> <span class="counter-number" data-from="1" data-to="<?= $project_count ?>" data-speed="4000"><?= $project_count ?></span> <br><span class="counter-text">Project</span></div>
        </div>
      </div>
      <!--col end-->
      <!--col start-->
    </div>
    <!--row end-->
  </div>
  <!--container end-->
</section>


<!--counter end-->
<!--whychoose-wrap start-->
<section class="whychoose-wrap counter">
  <!--container start-->
  <div class="container">
    <!--row start-->
    <div class="row">
      <!--col start-->
      <div class="col-md-6">
        <div class="section-title">
          <a href="{{ route('about-us') }}"><h3><span>About Us</span></h3></a>
          <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquet, massa ac ornare feugiat, nunc dui auctor ipsum, sed posuere eros sapien id quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquet,Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod-->
          <!--tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,-->
          <!--quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo-->
          <!--consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse-->
          <!--cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non-->
          <!--proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>-->
          <p>
              {{ $aboutus->header_description }}
          </p>
        </div>
        <div class="whychoose-description">
          <ul class="row">
            <!--<li class="col-md-6">Expert & Professional </li>-->
            <!--<li class="col-md-6">Professional Approach</li>-->
            <!--<li class="col-md-6"> High Quality Work</li>-->
            <!--<li class="col-md-6">Satisfaction Guarantee</li>-->
            <!--<li class="col-md-6"> Quick In Response</li>-->
            <!--<li class="col-md-6">24/7 Emergency</li>-->
            @if(!empty($targets))
            @foreach($targets as $target)
             <li class="col-md-6">{{ $target->title }}</li>
            @endforeach
            @endif
          </ul>
        </div>
      </div>
      <!--col end-->
      <!--col start-->
      <div class="col-md-6">
          @if(!empty($latest_youtube))
         <div class="section-title">
         <a href="{{ route('myanboxtube')}}"><h3><span>Myanbox Tube</span></h3></a>
           @if(isset($latest_youtube->title))
         <p>{{ $latest_youtube->title }}</p>
         @endif
        </div>
        <div class="about-video-item">
          <div class="about-video-img">
                <img src="{{ asset('storage/myanboxtube/'.$latest_youtube->image)}}" alt=""><a href="{{$latest_youtube->link}}" class="video-play mfp-iframe xs-video">
                <i class="fa fa-play"></i></a>
          </div>
          </div>
           @endif

      </div>
      <!--col end-->
    </div>
    <!--row end-->
  </div>
  <!--container end-->
</section>
<!--whychoose-wrap end-->

<!--brand-section start-->
@include('element.company_logo_slider')
<!--brand-section end-->

@endsection
