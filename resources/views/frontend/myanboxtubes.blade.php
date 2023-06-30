@extends('frontend.layouts.homeapp')
@section('title','Myanbox | Myantube Box')
@section('content')
  <!--preloader end-->
  <!--main-header start-->
 <!--main-header end-->
  <!--inner-heading start-->
  <section class="inner-heading" style="background-image: url('{{ asset('storage/myanboxtube/'.$projectsetting->myanboxtube_list_image)}}') !important;">
    <div class="container">
      <h1>Myanbox Tube</h1>
      <ul class="xs-breadcumb">
        <li><a href="{{ url('/') }}"> Home  / </a>Myanbox Tube</li>
      </ul>
    </div>
  </section>
  <!--inner-heading end-->
  <!--whychoose-wrap start-->
<!--<section class="whychoose-wrap blog_video"> -->
<section  class="whychoose-wrap blog_video" style="background-color: #f5f5f5 !important;">
  <!--container start-->
  <div class="container">
    <!--row start-->
     @if(!$myanboxtubes->isEmpty())
    <div class="row">
        
    @foreach($myanboxtubes as $myanboxtube)
      <div class="col-md-4">
        <div class="section-title">
          <p><?=  substr($myanboxtube->title,0,58) ?></p>
        </div>
        <div class="about-video-item">
          <div class="about-video-img">
               @if(!empty($myanboxtube->image))
                <img src="{{ asset('storage/myanboxtube/'.$myanboxtube->image)}}" alt=""><a href="{{$myanboxtube->link}}" class="video-play mfp-iframe xs-video">
               @else
                <img src="{{ asset('storage/myanboxtube/'.$projectsetting->myanboxtube_default_image )}}" alt=""><a href="{{$myanboxtube->link}}" class="video-play mfp-iframe xs-video">
               @endif
               <i class="fa fa-play"></i></a></div>
          </div>
      </div>
      @endforeach
    
      <!--col end-->
    </div>
      @else
      <div class="row">
          <div class="blog-grid">
      <div class="blog-inter">
       @include('element.404')
       </div>
       </div>
       </div>
      @endif
    <!--row end-->
     <div class="pagination-area">
                <ul class="pagination">
                  {!! $myanboxtubes->links() !!}
                </ul>
              </div>
  </div>

  <!--container end-->
</section>
  <!--inner content end-->
  <!--brand-section start-->
@include('element.company_logo_slider')
  <!--brand-sectionn end-->
  </div>
@endsection
