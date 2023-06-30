@extends('frontend.layouts.homeapp')
@section('title','Myanbox | About Us')
@section('extra_css')
    <style type="text/css">
        .mega-dropdown {
            position: static !important;
        }

        .navbar-nav>li>.dropdown-menu ul li a{
            font-size: 14px;
        }
    </style>
@endsection
@section('content')
  <!--main-header end-->
  <section class="inner-heading aboutus" style="background-color:{{ $aboutus->header_background_color }} !important;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-center">
            <h1 style="color:{{ $aboutus->header_font_color }} !important">{{ $aboutus->header }}</h1>
            <p style="color:{{ $aboutus->header_font_color }} !important">{{ $aboutus->header_description }}</p>
          </div>
        </div>
      </div>

    </div>
  </section>
  <section class="inner-wrap aboutus whychoose-wrap">
    <!--container start-->
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
           <div class="about-video-item">
              <div class="about-video-item">
                <div class="about-video-img"> <img src="{{ asset('storage/setting/'.$aboutus->about_us_image) }}" alt=""> <a href="{{ $aboutus->video }}" class="video-play mfp-iframe xs-video"><i class="fa fa-play"></i></a> </div>
                </div>
            </div>
          </div>
        </div>
         <?php $count=0; ?>
          @foreach($joins as $join)
             @if($count % 2 == 0)
             <div class="row">
                 <div class="col-md-6 col-sm-6">
                     <h3><span>{{ $join->title }}</span></h3>
                     <div  class="col-md-12 col-sm-12"><?php echo $join->description ?></div>
                     <a href="{{ route('contact-us') }}" class="btn btn-xs client_btn">{{ $join->btn_text }}</a>
                 </div>
                 <div class="col-md-6 col-sm-6">
                     <img src="{{ asset('storage/setting/'.$join->image) }}" class="image">
                  </div>
             </div>
             @else
              <div class="row">
                 <div class="col-md-6 col-sm-6">
                     <img src="{{ asset('storage/setting/'.$join->image) }}"  class="image">
                 </div>
                 <div class="col-md-6 col-sm-6">
                     <h3><span>{{ $join->title }}</span></h3>
                     <div  class="col-md-12 col-sm-12"><?php echo $join->description ?></div>
                     <a href="{{ route('contact-us') }}" class="btn btn-xs client_btn">{{ $join->btn_text }}</a>
                 </div>
             </div>
             @endif
             <?php $count++; ?>
             @endforeach

       <div class="row">
           <?php $count=0; ?>
          @foreach($targets as $target)
            @php
            if($count >=3)
                $no = 6;
            else
                $no = 4;
            @endphp
         @php
          if($count%3 ==0)
            echo "</div><div class='row'>";
        @endphp
             <div class="col-md-{{$no}} col-sm-{{$no}}">
               <div class="panel">
                  <div class="panel-title">
                    <div class="text-center">
                          <img src="{{ asset('storage/setting/'.$target->image) }}" alt="Target">
                      </div>
                  </div>
                    <div class="panel-body">
                        <h4 class="text-center">{{ $target->title }}:</h4>
                        <p class="text-center"><?php echo $target->description ?></p>
                    </div>
                </div>
            </div>
            <?php   $count++; ?>
          @endforeach
      </div>
</section>
<!--counter start-->
<section class="advertisement">
  <!--container start-->
  <div class="container">
    <!--row start-->
    <div class="row p10" style="background-color:{{ $aboutus->footer_background_color }} !important;color:{{ $aboutus->footer_font_color }} !important">
      <div class="col-md-6 col-sm-6 col-xs-8">
        <H1>{{ $aboutus->ready_to_get_start }}</H1>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-4">
        <a href="#" class="pull-right btn btn-lg">{{ $aboutus->sign_up_today  }}</a>
      </div>
    </div>
    <!--row end-->
  </div>
  <!--container end-->
</section>
<!--counter end-->
@include('element.company_logo_slider')
<!--brand-section end-->
@endsection
