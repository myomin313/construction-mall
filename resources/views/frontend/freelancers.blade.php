@extends('frontend.layouts.homeapp')
@section('title','Myanbox | Professionals')
@section('extra_css')
    <style>
        .freelancers .categories li.active a {
            color: {{ $projectsetting->freelancer_nav_first_background_and_icon }};
        }
    </style>
@endsection
@section('content')

<div class="freelancers">
   <section class="suplier inner-heading" style="background-image: url('{{ asset('storage/freelancer/'.$projectsetting->freelancer_list_image)}}');">
    <div class="container">
    <h1>{{ $category_name }}</h1>
      <ul class="xs-breadcumb">
        <li style="text-transform:capitalize"><a href="{{ url('/')}}" style="color : {{ $projectsetting->freelancer_nav_first_background_and_icon }}">Home / </a>  {{ $category_name }}</li>
      </ul>
    </div>
  </section>
  <!--top company start-->
 
<div class="top-company">
  <!--container start-->
  <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <fieldset class="scheduler-border">
            <legend class="scheduler-border"> <h3>Top Professionals</h3></legend>
             <div class="row">

                 <div class="col-md-12 col-sm-12">
                    <div class="carousel carousel-showmanymoveone pl150 slide" id="carousel-tilenav" data-interval="2500">
                       <div class="carousel-inner">
                         @php $count =1; $active="active";@endphp
                          @foreach ($topfreelancers as $topfreelancer)
                           @php if($count%4 == 1 && $count==1)
                  $active = "active";
                 else
                  $active ="";
            @endphp
                          <div class="item <?= $active ?>">
                             <div class="col-xs-6 col-sm-4 col-md-2">
                                <a href="{{ url('professionals-detail/'.$topfreelancer->freelancer_url) }}"><img src="{{ asset('storage/freelancer/'.$topfreelancer->logo) }}" class="img-responsive img-circle"
                                style="width:100px;height:100px" alt="{{ ucfirst($topfreelancer->name) }}"></a>
                             </div>
                          </div>
                          @php $count++; @endphp
                      @endforeach
                       </div>
                       <a class="left carousel-control" href="#carousel-tilenav" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                       <a class="right carousel-control" href="#carousel-tilenav" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                    </div>
                 </div>
              </div>
        </fieldset>
        </div>
      </div>
  </div>
  <!--container end-->
</div>
<!--top company end-->
<!--inner content start-->

  <section class="inner-wrap">
    <!--container start-->
    <div class="container">
      <div class="row">
        <ul class="blog-grid">
        <div class="col-md-9 col-sm-12 freelancer_list">
          <div class="row">
               @if(!$freelancers->isEmpty())
                    @foreach($freelancers as $freelancer)
            <li class="col-md-4 col-sm-6">
              <div class="blog-inter">
                <figure  style="margin: 0 auto;text-align: center">
               @if($freelancer->user->logo != null && $freelancer->user->logo != 'undefined')
               <img src="{{ asset('storage/freelancer/'.$freelancer->user->logo) }}" class="img-circle" alt="{{ ucfirst($freelancer->user->name)}}" width="150 !important" height="150 !important" >
               @else
               <img src="{{ asset('storage/freelancer/'.$projectsetting->freelancer_default_logo ) }}" class="img-circle" alt="{{ ucfirst($freelancer->user->name)}}" width="150 !important" height="150 !important" >
               @endif

               </figure>
                <div class="post-tittle">
                  <h4><a href="{{ url('professionals-detail/'.$freelancer->freelancer_url) }}">{{ ucfirst($freelancer->user->name)}}</a></h4>
                </div>
                <ul class="blogDate">
                  <li><span>
                   @if(!empty( $freelancer->category->name))
                      {{ $freelancer->category->name }}
                   @endif
                  </span> </li>
                  <li><span>
                       @if(!empty( $freelancer->freelancerstatus->freelancer_status_name))
                      {{ $freelancer->freelancerstatus->freelancer_status_name }}
                      @endif
                      @if(!empty($freelancer->freelancer_company))
                  <?php  echo ( strlen($freelancer->freelancer_company) > 5)?  substr($freelancer->freelancer_company, 0,5)."..." :$freelancer->freelancer_company;  ?>
                     @endif
                  </span> </li>
                  <li>   @foreach ($freelancersrates as $freelancersrate)
          <?php $stars =$freelancersrate->rate; $stars = round($stars,0)?>
            @if($freelancersrate->usercount != 0)
                @if($freelancer->id == $freelancersrate->freelancer_id)
                      @for($i= 1;$i<=$stars;$i++)
                        @if($i>5)
                            @break(0);
                        @endif
                        <i class="fa fa-star" style="color:{{ $projectsetting->	freelancer_nav_first_background_and_icon }} !important;"></i>
                        <!-- <i class="fa fa-star" style="color: @if($stars<3) green @else green @endif"></i> -->
                      @endfor
                      @if(5-$stars > 0)
                          @for($i= 1;$i<=5-$stars;$i++)
                              <i class="fa fa-star" style="color: #acacac"></i>
                          @endfor
                    @endif
                @endif

            @else($freelancersrate->usercount == 0)
                @if($freelancer->id == $freelancersrate->id)
                    @if(5-$stars > 0)
                          @for($i= 1;$i<=5-$stars;$i++)
                              <i class="fa fa-star" style="color: #acacac"></i>
                          @endfor
                    @endif
                @endif
            @endif

          @endforeach
                      <span class="pull-right"> <i class="fa fa-map-marker"
                      style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i> {{ $freelancer->location->name }}</span>
                  </li>
                  <li><i class=" fa fa-folder-open" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i> <span> <?php $count =1; $skills ="";
                          if(asset($freelancer->skillForFreelancer))
                          {
                           foreach($freelancer->skillForFreelancer as $skill){
                                if(sizeof($freelancer->skillForFreelancer)==$count)
                                  $skills .= $skill['skill_name'];
                                else
                                  $skills .= $skill['skill_name'].",";
                            $count++;
                           }
                            echo (strlen($skills) > 15)?substr($skills, 0,15)."...":$skills;
                          }else{
                            echo "-";
                          }
            ?></span> </li>
                  <li class=" pull-right">
                        <a href="{{ url('professionals-detail/'.$freelancer->freelancer_url) }}" class="btn btn-xs more_btn"  style="background:linear-gradient(90deg, {{ $projectsetting->freelancer_nav_first_background_and_icon }} 50%, {{ $projectsetting->freelancer_nav_second }}) !important;color:{{ $projectsetting->freelancer_nav_font_color}} !important">More Info</a>
                  </li>
                  <div class="clearfix"></div>
                </ul>
              </div>
          </li>
          @endforeach
               @else
            <li class="col-md-12 col-sm-6" style="min-height:300px !important">
                 <div class="blog-inter">
                @include('element.404')
                </div>
            </li>
               @endif


        </div>
          <li>
             <div class="pagination-area">
                <ul class="pagination">
                  {!! $freelancers->links() !!}
                </ul>
              </div>
          <!--row end-->
          </li>
        </div>
        <div class="col-md-3 col-sm-12">
           <div class="side-bar">
             @php if(isset($request->keyword))
                          $keyword = $request->keyword;
                      else
                          $keyword ="";
                      if(isset($request->location_id))
                          $location_id = $request->location_id;
                      else
                          $location_id = "";

                    if(isset($request->selectskill))
                        $skill = $request->selectskill;
                    else
                        $skill = "";

                    if(isset($request->selectstatus))
                        $status = $request->selectstatus;
                    else
                        $status = "";
                @endphp
              <form action="{{ route('professionals') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <input type="text" name="keyword" placeholder="Name, Skills, Keywords" class="form-control" value="{{$keyword}}">
                </div>
                <div class="form-group">
                    <select name="selectskill" id="skills_id"  class="form-control">
                      <option value="">Select Skill</option>
                        @if (isset($skillforfreelancerlists))
                     @foreach ($skillforfreelancerlists as $id=> $skill_name)
                                   @php
                                      if($skill == $id)
                                          $choose = "selected";
                                      else
                                          $choose = "";
                                  @endphp
                     <option value="{{$id}}" {{$choose}}>{{ $skill_name }} </option>
                    @endforeach
                   @endif
                    </select>
                </div>
                <div class="form-group">
                    <select  name="selectstatus" id="status_id" class="form-control">
                      <option value="">Select Professional Status</option>
                      @if (isset($statusforfreelancerlists))
                       @foreach ($statusforfreelancerlists as $freelancer_status_search)
                                    @php
                                      if($status == $freelancer_status_search->id)
                                          $choose = "selected";
                                      else
                                          $choose = "";
                                  @endphp
                       <option value="{{ $freelancer_status_search->id }}" {{$choose}}>{{ $freelancer_status_search->freelancer_status_name }} </option>
                       @endforeach
                     @endif

                    </select>
                </div>
                <div class="form-group">
                    <select name="location_id" id="location_id" class="form-control">
                      <option value="">Select Location</option>
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
                <div class="form-group">
                  <input type="submit" name="" value="search" class="freelancer_search_btn btn-sm btn pull-right" style="background:linear-gradient(90deg, {{ $projectsetting->freelancer_nav_first_background_and_icon }} 50%, {{ $projectsetting->freelancer_nav_second }}) !important;color:{{ $projectsetting->freelancer_nav_font_color}} !important">
                </div>
                <div class="clearfix"></div>
              </form>
          </div>
           <div class="side-bar">
            <!-- Categories -->
            <div class="side-barBox">
              <h5 class="side-barTitle" style="background:linear-gradient(90deg, {{ $projectsetting->freelancer_nav_first_background_and_icon }} 50%, {{ $projectsetting->freelancer_nav_second }}) !important;color:{{ $projectsetting->freelancer_nav_font_color}} !important">Categories</h5>
              <ul class="categories">
                 @foreach ($categorylists as $category)
                <li class="{{ request()->is('professionals/'.$category->category_url) ? 'active' : '' }}"><a href="{{ url('professionals/'.$category->category_url)}}">{{ $category->name }}</a></li>
                 @endforeach
              </ul>
            </div>
          </div>
           @foreach($advertisings as $advertising)
          <div class="side-bar">
              <div class="advertise">
                  <a href="{{ $advertising->link }}"><img src="{{ asset('storage/advertising/'.$advertising->photo) }}" alt="{{ $advertising->company_name }}" style="height:100%;width:100%"></a>
              </div>
          </div>
           @endforeach
          </div>
        </ul>
      </div>
      <!--row start-->
  </div>
    <!--container end-->
  </section>


<!--brand-section start-->
@include('element.company_logo_slider')
</div>

<!--brand-section end-->
  @endsection

