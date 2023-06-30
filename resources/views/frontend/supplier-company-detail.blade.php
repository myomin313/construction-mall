@extends('frontend.layouts.homeapp')
@section('title','Myanbox | '.$suppliercompanydetail->name.' Company')
@section('content')
<div class="suppliers">
@if(!empty($suppliercompanydetail->cover_photo))
  <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$suppliercompanydetail->cover_photo) }}');">
 @else
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->supplier_default_background_image) }}');">
  @endif
  <div class="container">
    <h1>{{ $suppliercompanydetail->name }}</h1>
      <ul class="xs-breadcumb">
        <li><a href="{{ url('/') }}" style="color:{{ $projectsetting->supplier_nav_first_background_and_icon }} !important;">Home / </a>
       @if(!empty($main_category_url))
       <a href="{{ url('/companies/'.$main_category_url.'/'.$category_url) }}" style="color:{{ $projectsetting->supplier_nav_first_background_and_icon }} !important;">  {{ $company_category_name }} / </a>
       @else
        <a href="{{ url('/companies/'.$category_url) }}" style="color:{{ $projectsetting->supplier_nav_first_background_and_icon }} !important;">  {{ $company_category_name }} / </a>
       @endif
       {{ $suppliercompanydetail->name }}</li>
      </ul>
    </div>

  </section>
<!--inner content start-->

  <section class="inner-wrap supplier_detail">
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
                  <figure class="style-greens-two green">
                        @if($suppliercompanydetail->logo != null && $suppliercompanydetail->logo !='undefined')
                   <img src="{{ asset('storage/company_logo/'.$suppliercompanydetail->logo) }}" alt=" {{ $suppliercompanydetail->name }}" class="img-responsive">
                   @else
                    <img src="{{ asset('storage/company_logo/'.$projectsetting->supplier_default_logo) }}" alt=" {{ $suppliercompanydetail->name }}" class="img-responsive">
                   @endif
                      <!--<div><i class="fa fa-plus" style="color:{{ $projectsetting->supplier_nav_first_background_and_icon }} !important;"></i></div>
                          <a href="blog.html"></a>--> </figure>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="post-tittle">
                      <h4><a href="#">{{ $suppliercompanydetail->name }}</a></h4>
                    </div>
                    <ul class="blogDate info">
                      <li> <i class="fa fa-envelope" aria-hidden="true" style="color:{{ $projectsetting->supplier_nav_first_background_and_icon }} !important;"></i><a href="mailto:<?= $suppliercompanydetail->email ?>">  <span>{{ $suppliercompanydetail->email }}</span> </li>
                      <li> <i class="fa fa-phone" aria-hidden="true" style="color:{{ $projectsetting->supplier_nav_first_background_and_icon }} !important;"></i><a href="tel:<?= $suppliercompanydetail->phone ?>">  <span>{{ $suppliercompanydetail->phone }}</span> </a></li>
                     @if(!empty($suppliercompanydetail->website))
                      <li> <i class="fa fa-globe" aria-hidden="true" style="color:{{ $projectsetting->supplier_nav_first_background_and_icon }} !important;"></i> <a href="<?= $suppliercompanydetail->website ?>"><span><?= $suppliercompanydetail->website ?></span></a> </li>
                       @endif
                     </ul>
                    <ul class="blogDate">
                      <li> <i class="fa fa-home" aria-hidden="true" style="color:{{ $projectsetting->supplier_nav_first_background_and_icon }} !important;"></i><span> @foreach($companycategories as $category)
                  {{ $category->category_name }},@endforeach</span> </li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-4">
                  <span class="pull-right supplier-social">
                    @if(!empty($suppliercompanydetail->facebook ))
                  <a href="{{ $suppliercompanydetail->facebook }}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                   @endif
                   @if(!empty($suppliercompanydetail->instagram))
                  <a href="{{ $suppliercompanydetail->instagram }}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                  @endif
                  @if(!empty($suppliercompanydetail->twitter))
                  <a href="{{ $suppliercompanydetail->twitter }}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    @endif
                @if(!empty($suppliercompanydetail->linkedin))
                  <a href="{{ $suppliercompanydetail->linkedin }}"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                  @endif
                </span>
                <br>
                 @if($suppliercompanydetail->active_quotation == 1)
                <div class="mt90">
                  <a id="myBtn" data-dismiss="modal" data-company="{{$suppliercompanydetail->id}}" data-category="{{$companycategories[0]->category_id}}" aria-label="Close" data-toggle="modal" data-target="#service_company_detail_quotation" class="supplier-quotation company_detail_quotation pull-right" style="background:linear-gradient(90deg, {{ $projectsetting->supplier_nav_first_background_and_icon }} 50%, {{ $projectsetting->supplier_nav_second_background }}) !important;color:{{ $projectsetting->supplier_nav_font_color}} !important">Get A Quote</a>
                </div>
                @else
                <div class="mt90">
                  <a id="myBtn" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#supplier_get_contact" class="supplier-quotation pull-right" style="background:linear-gradient(90deg, {{ $projectsetting->supplier_nav_first_background_and_icon }} 50%, {{ $projectsetting->supplier_nav_second_background }}) !important;color:{{ $projectsetting->supplier_nav_font_color}} !important">Get Contact</a>
                </div>
                @endif
                </div>
            </div>
            <div class="row about_us">
              <div class="col-md-12 col-sm-12">
                  <div class="post-tittle">
                      <h5>About Us</h5>
                  </div>
                  <p>  <?php echo $suppliercompanydetail->description; ?></p>
                  @if(!empty($suppliercompanydetail->business_opening_hours) || !empty($suppliercompanydetail->business_opening_hours))
                    <ul  class="blogDate">
                        <li><i class="fa fa-calendar" aria-hidden="true" style="color:{{ $projectsetting->supplier_nav_first_background_and_icon }} !important;"></i><span> Opening  :
                        <?= $suppliercompanydetail->business_opening_hours ?> ~
                        <?= $suppliercompanydetail->business_closing_hours ?>
                      <?=  "(". $suppliercompanydetail->business_days .")" ?></span></li>
                    </ul>
                 @endif
                    @if(!empty($suppliercompanydetail->address) || !empty($city->name))
                     <ul  class="blogDate">
                        <li>
                        <i class="fa fa-map-marker" aria-hidden="true" style="color:{{ $projectsetting->supplier_nav_first_background_and_icon }} !important;"></i>
                        <span> Address  :
                        <?= $suppliercompanydetail->address ?>
                        @if(!empty($suppliercompanydetail->location->name)),
                          <?= $suppliercompanydetail->location->name ?>,
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
                  <p> <?php echo $suppliercompanydetail->service; ?></p>
                </div>
              </div>
              <div class="row what_we_do">
              <div class="col-md-12 col-sm-12 editor">
                  <div class="post-tittle">
                      <h5>Vission</h5>
                  </div>
                  <p><?php echo $suppliercompanydetail->vission; ?></p>
                </div>
              </div>
            </div>
          </li>
           @if($activepackage)
           @if($activepackage->end_date > date('Y-m-d') && $activepackage->package_plan_id != 1 )
           @if(count($supplierprojectdetails) > 0)
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
              @foreach ($supplierprojectdetails as $supplierprojectdetail)
              @if($supplierprojectdetail->photo != null && $supplierprojectdetail->photo !='undefined')
              <div class="col-md-4 col-sm-6 pr10">
                <div class="service_list">
                  <a href="{{ url('company/project-detail/'.$supplierprojectdetail->id )}}">
                  <img src="{{ asset('storage/project/'.$supplierprojectdetail->photo) }}" alt="portfolio" class="img-responsive">
                  <h5>{{ $supplierprojectdetail->project_name }}</h5>
                </a>
                </div>
              </div>
              @endif
              @endforeach
            </div>
          </li>
           @endif
            @if(count($productdetails) > 0)
           <li>
            <div class="row our_service">
              <div class="col-md-12 col-sm-12">
                 <div class="post-tittle">
                    <h4>Our Products</h4>
                  </div>
              </div>
            </div>
          </li>
          <li>
            <div class="row our_services">
               @foreach ($productdetails as $productdetail)
                @if($productdetail->photo != null && $productdetail->photo !='undefined')
              <div class="col-md-4 col-sm-6 pr10">
                <div class="service_list">
                  <div class="serviceWrap" style="background:gray">
                  <div class="overlay-shop"> <img  src="{{ asset('storage/product/'.$productdetail->photo) }}" alt="img1" class="img-responsive"></div>
                  <div class="link-wrap"> <a href="{{ asset('storage/product/'.$productdetail->photo) }}" class="lightbox-image"><i class="fa fa-search"></i></a>
                    <a data-dismiss="modal" aria-label="Close" data-toggle="modal" id="product-modal"
                    class="brochure-btn theme-btn" data-photo="{{ $productdetail->photo  }}" data-name="{{ $productdetail->product_name }}"  data-price="{{ $productdetail->price }}" data-code="{{ $productdetail->code }}" data-size="{{ $productdetail->size }}" data-current-stock="{{ $productdetail->current_stock }}"
                     data-description="{{ $productdetail->product_description }}">
                    <i class="fa fa-asterisk"></i></a> </div>
                  </div>
                      <h5>{{ $productdetail->product_name }}</h5>
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
                   <h2 class="panel-title text-center" style="background:linear-gradient(90deg, {{ $projectsetting->supplier_nav_first_background_and_icon }} 50%, {{ $projectsetting->supplier_nav_second_background }}) !important;color:{{ $projectsetting->supplier_nav_font_color}} !important">Related Companies </h2>
                </div>
                 <div class="panel-body overflow">
                    <div class="row service">
                       <div class="col-md-12 ">
                          <div class="list-group">
                            @foreach($relatedcompanies as $relatedcompany)
                            <a href="{{ url('suppliercompanydetail/'.$category_url.'/'.$relatedcompany->company_url) }}" class="list-group-item">
                              <div class="row">
                                <div class="col-md-4 col-sm-3 col-xs-3 nopadding">
                                    @if($relatedcompany->company_logo != null && $relatedcompany->company_logo !='undefined')
                                    <img src="{{ asset('storage/company_logo/'.$relatedcompany->company_logo) }}" class="img-responsive">
                                    @else
                                    <img src="{{ asset('storage/company_logo/'.$projectsetting->supplier_default_logo) }}" class="img-responsive">
                                    @endif
                                </div>
                                <div class="col-md-8 col-sm-9 col-xs-9 nopadding">
                                   <h2>{{ $relatedcompany->company_name }}</h2>
                                   <span> <?php

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
<!--brand-section end-->
<!--quote-modal start-->
      <div class="modal fade product-modal-show" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md-2" role="document">
          <div class="modal-content" >
            <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
            <h2 class="modal-title" style="text-align: center;color:black"></h2>

            <div class="row">
             <div class="col-md-6 col-sm-6 col-xs-6">
              <div class="single-shop-content" style="
              border-right: 1px solid #cecece;
              ">
              <div class="img-supplierproducts"> <img src="" alt="Awesome Image" data-imagezoom="true" class="img-responsive" id="product-image"> </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="content-box">
              <p style="color:Black;" id="price"></p>
              <p style="color:Black;" id="code"></p>
              <p style="color:Black;" id="size"></p>
              <p style="color:Black;" id="current_stock"></p>

            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <h3 style="margin-left:30px;margin-bottom:5px; color:#000000;font-size: 18px;">Description</h3>
            <div class="text" style="margin-left:35px;margin-bottom:5px; color:#000000;">
              <p  id="product_description"></p>

           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
  <div id="supplier_get_contact" class="modal fade bs-example-modal-md-3" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-md-2" role="document">
            <div class="modal-content">
              <div class="modal-header">
                    <h4 class="modal-title"  id="myModalLabel">To Contact</h4>
              </div>
               <div class="modal-body">
              <p><i class="fa fa-phone fa-lg"></i> <a href="tel:{{ $suppliercompanydetail->phone }}" class="text-orange">{{ $suppliercompanydetail->phone }}</a></p>
              <p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto: {{ $suppliercompanydetail->email }}" class="text-orange">{{ $suppliercompanydetail->email }}</a></p>
              <p style="color:black !important"><i class="fa fa-address-book" aria-hidden="true"></i>{{ $suppliercompanydetail->address }},{{ $suppliercompanydetail->location_name }}</p>
              </div>
             <div class="modal-footer"> <span><a class="btn btn-orange pull-right" data-dismiss="modal">close</a></span> </div>
              </div>
            </div>
          </div>
<!--brand-section end-->
<!--inner content end-->
    @include('element.company_logo_slider')
    @include('element.get_quote_detail_modalbox')
</div>

<!--brand-section end-->
<script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script>
@include('element.get_detail_quote_script')
@endsection
@section('script')
    <script type="text/javascript">

           /* Show Event  */
            $(document).on('click', '#product-modal', function() {
                  // var APP_URL = '<?php echo url('/'); ?>';
                    $('.modal-title').html($(this).data('name'));
                    $('#price').html("Price :" + $(this).data('price'));
                    $('#code').html("Code No:" + $(this).data('code'));
                    $('#size').html("size :" + $(this).data('size'));
                    $('#current_stock').html("Stock :"+$(this).data('current-stock'));
                    $('#product_description').html($(this).data('description'));
                    $("#product-image").attr('src', APP_URL+'/storage/product/'+$(this).data('photo'));
                    // $('#category_name').html($(this).data('category-name'));
                    // $("#image").attr('src', APP_URL+'/storage/blog/'+$(this).data('image'));
                    // $('#blog-detail').html($(this).data('description'));
                    // $('#created_at').html($(this).data('created'));
                    $('.product-modal-show').modal('show');
                });




        </script>


@endsection
