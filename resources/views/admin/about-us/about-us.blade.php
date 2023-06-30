@extends('layouts.homeapp')
@section('content')
<style type="text/css">
.mega-dropdown {
position: static !important;
}

.navbar-nav>li>.dropdown-menu ul li a{
  font-size: 14px;
}
</style>

<body>
<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
  <!--preloader end--> 
  <!--main-header start-->
   @include('element.header')
  <!--main-header end--> 
  <section class="inner-heading aboutus" style="background-color:{{ $aboutus->header_background_color }} !important;color:{{ $aboutus->header_font_color }} !important">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <center>
            <h1>{{ $aboutus->header }}</h1>
            <p>{{ $aboutus->header_description }}</p>
          </center>
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
                <div class="about-video-img"> <img src="{{ asset('images/welcome-1.jpg') }}" alt=""> <a href="{{ $aboutus->video }}" class="video-play mfp-iframe xs-video"><i class="fa fa-play"></i></a> </div>
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
                $no = 4
            @endphp
         @php
          if($count ==3)
            echo "</div><div class='row'>";
        @endphp
             <div class="col-md-{{$no}} col-sm-{{$no}}">
               <div class="panel">
                  <div class="panel-title">
                    <center>
                          <img src="{{ asset('storage/setting/'.$target->image) }}" alt="Target">
                      </center>
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
<section>
<section class="inner-wrap">
   <div class="container"> 
     <div class="row p10">
         <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10">
             <center>
        <a  href="{{ route('about-us.edit')}}" class="btn btn-primary">EDIT</a>
          </center>
       </div>
     </div>
    </div>
 </section>  
<!--counter end--> 
<!--brand-section end--> 
@endsection
