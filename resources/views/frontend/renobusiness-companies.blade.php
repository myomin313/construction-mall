@extends('frontend.layouts.homeapp')
@section('title','Myanbox | Reno Business')
@section('script')
    <style>
        .reno_business .categories li.active a {
            color: {{ $projectsetting->reno_nav_first_background_and_icon }} !important;

        }
    </style>
@endsection
@section('content')

<div class="reno_business">

   <section class="suplier inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$projectsetting->reno_list_image  )}}');">
    <div class="container">
    <h1>{{ $category_name }}</h1>
      <ul class="xs-breadcumb">
        <li><a href="{{ url('/')}}" style="color: {{ $projectsetting->reno_nav_first_background_and_icon }}">Home / </a> {{ $category_name }}</li>
      </ul>
    </div>
  </section>
<!-- search form start-->
  <!--search form start-->
  <div class="quick-quote">
    <div class="container">

      <div class="row">
        <div class="col-md-12 col-sm-12">
           <div class="advanced_search">
                <!--Row Start-->
                @php if(isset($request->keyword))
                          $keyword = $request->keyword;
                      else
                          $keyword ="";
                      if(isset($request->category))
                          $category = $request->category;
                      else
                          $category = "";
                      if(isset($request->location_id))
                          $location_id = $request->location_id;
                      else
                          $location_id = "";
                @endphp
                 <form action="{{ route('search') }}" class="form-inline advanced_search_form">
                    <div class="form-group col-md-4  inner-addon left-addon">
                        <i class="fa fa-search"></i>
                        <input type="text" name="keyword" class="form-control" placeholder="Skill,Company,Keyword" value="{{$keyword}}" />
                      </div>
                      <input type="hidden" name="default_category_id" value="3">
                      <div class="form-group col-md-3 inner-addon left-addon ">
                        <i class="fa fa-folder-open"></i>
                          <select class="form-control" name="category">
                              <option value="">Select Category</option>
                              @foreach($renobusinessCategories as $renobusinessCategory)
                                 @php
                                      if($category == $renobusinessCategory->id || $id == $renobusinessCategory->id)
                                          $choose = "selected";
                                      else
                                          $choose = "";
                                  @endphp
              <option value="{{ $renobusinessCategory->id }}" {{$choose}}>{{ $renobusinessCategory->name }}</option>
                @endforeach
                            </select>
                      </div>
                     <div class="form-group col-md-3 inner-addon left-addon ">
                        <i class="fa fa-map-marker"></i>
                            <select class="form-control"  name="location_id">
                              <option value="">Select Locations</option>
                              @foreach($cities as $city)
                                @php
                                      if($location_id == $city->id)
                                          $choose = "selected";
                                      else
                                          $choose = "";
                                  @endphp
                  <option value="{{ $city->id }}" {{$choose}}>{{ $city->name }}</option>
              @endforeach
                          </select>
                      </div>
                      <div class="form-group col-md-2 col-sm-12">
                        <input type="submit" name="" class="btn btn-sm advanced_search_btn" value="Search" style="background:linear-gradient(90deg, {{ $projectsetting->reno_nav_first_background_and_icon }} 50%, {{ $projectsetting->reno_nav_second_background }}) !important;color:{{ $projectsetting->reno_nav_font_color}} !important">
                      </div>
              </form>
              <!--Row End-->
          </div>

        </div>

      </div>
    </div>
  </div>
<!-- search form end -->
<!--inner content start-->

  <section class="inner-wrap">
    <!--container start-->
    <div class="container">
      <div class="row">
      <!--row start-->
      <ul class="blog-grid">
        <!--col start-->
        <div class="col-md-9 col-sm-12">
            @if(!$search_result->isEmpty())
                @foreach ($search_result as $data)
          <li>
            <div class="blog-inter">
              <div class="row">
                <div class="col-md-4 col-sm-4">
                  <figure class="style-greens-two green">
                  @if($data->user->logo != null && $data->user->logo !='undefined')
                   <img src="{{ asset('storage/company_logo/'.$data->user->logo) }}" alt="portfolio" class="img-responsive">
                   @else
                    <img src="{{ asset('storage/company_logo/'.$projectsetting->reno_default_logo ) }}" alt="portfolio" class="img-responsive">
                   @endif
                      <div><i class="fa fa-plus" style="color:{{ $projectsetting->reno_nav_first_background_and_icon }} !important;"></i></div>
                          <a href="{{ url('companydetail/'.$category_url.'/'.$data->company_url) }}"></a> </figure>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="post-tittle">
                      <h4><a href="{{ url('companydetail/'.$category_url.'/'.$data->company_url) }}">{{ $data->user->name }}</a></h4>
                    </div>
                    <ul class="blogDate">
                      <li> <i class="fa fa-user" aria-hidden="true" style="color:{{ $projectsetting->	reno_nav_first_background_and_icon }} !important;"></i><span>Reno Business</span> </li>
                      <li> <i class="fa fa-envelope" aria-hidden="true" style="color:{{ $projectsetting->	reno_nav_first_background_and_icon }} !important;"></i> <span><a href="mailto: {{ $data->email }}">{{ $data->email }}</a></span></li>
                      <li> <i class="fa fa-phone" aria-hidden="true" style="color:{{ $projectsetting->	reno_nav_first_background_and_icon }} !important;"></i> <span><a href="tel:{{ $data->phone }}">{{ $data->phone }}</a></span> </li>
                    </ul>
                    <ul class="blogDate">
                      <li> <i class="fa fa-home" aria-hidden="true" style="color:{{ $projectsetting->	reno_nav_first_background_and_icon }} !important;"></i><span><?php
                                      echo $data->parent_categories[0]->name.",";
                                        $count =1; $category="";
                                           if(!empty($data->child_categories))
                                           {
                                             foreach($data->child_categories as $child_category){
                                                  if(sizeof($data->child_categories)==$count)
                                                      $category .= $child_category->name;
                                                  else
                                                      $category .=$child_category->name.",";
                                              $count++;
                                             }

                                             echo (strlen($category) > 60)?substr($category, 0,60)."...":$category;
                                          }
                                          else{
                                            echo "-";
                                          }
                                          ?></span> </li>
                    </ul>
                    <p><?php  echo substr($data->description,0,250).'...' ?>
                    </p>
                </div>
              </div>
            </div>
          </li>
           @endforeach
            @else
            <div class="container">
                <img src="{{ asset('admin/images/error_404/error-404.jpg')}}"  alt="portfolio" class="img-responsive" />
            </div>


                <!-- <div class="alert alert-info" role="alert">

  <strong>No Matching Data !</strong> Sorry, we couldn't find anything to match that request, please try another option.
</div>-->
            @endif


          <li>
            <div class="pagination-area">
              <ul class="pagination">{{ $search_result->links() }}
              </ul>
            </div>
      <!--row end-->
          </li>
      </div>
        <li class="col-md-3 col-sm-12">
          <div class="side-bar">
            <!-- Categories -->
            <div class="side-barBox">
              <h5 class="side-barTitle" style="background:linear-gradient(90deg, {{ $projectsetting->reno_nav_first_background_and_icon }} 50%, {{ $projectsetting->reno_nav_second_background }}) !important;color:{{ $projectsetting->reno_nav_font_color}} !important">Categories</h5>
              <ul class="categories"> @foreach($renobusinessCategories as $renocategory)
       <li class="{{ $renocategory->name == $category_name ? 'active' : '' }}"><a  href="{{ url('companies/reno-business/'.$renocategory->category_url) }}">{{ $renocategory->name }}</a></li>
    @endforeach
              </ul>
            </div>
          </div>
          @foreach($advertisings as $advertising)
          <div class="side-bar">
              <div class="advertise">
                <!--<center>-->
                   <a href="{{  $advertising->link }}"><img src="{{ asset('storage/advertising/'.$advertising->photo) }}" alt="{{ $advertising->company_name }}" style="height:100%;width:100%"></a>
                <!--</center>-->
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
<!--brand-section end-->
</div>
@endsection
