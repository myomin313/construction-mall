@extends('frontend.layouts.homeapp')
@section('title','Myanbox | Advertise with us')
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

 <section class="inner-heading advertise_with_us" style="background-image: url('{{ asset('storage/setting/'.$advertisewithus->header_image)}}'); background-repeat: no-repeat;
  background-size: auto;">
    <div class="container">
    	<center>
    		<h1>{{ $advertisewithus->text_header }}</h1>
   			<span>{{ $advertisewithus->breadcrump  }}</span>
    	</center>
    </div>
  </section>
  <section class="inner-wrap advertise_with_us">
    <!--container start-->
    <div class="container">
    	<div class="row">
	        <div class="col-md-12 col-sm-12">
	           <div class="text-center">
	           <h1>{{ $advertisewithus->why_myanbox }}</h1>
	           <p>{{ $advertisewithus->myanbox_dec }}</p>
	         </div>
	        </div>
       </div>


         <?php $count=0; ?>
          @foreach($sponsors as $sponsor)
             @if($count % 2 == 0)
              <div class="row">
                   <div class="col-md-6 col-sm-6 sponser">
                       <img src="{{ asset('storage/setting/'.$sponsor->img)}}" alt="Premium List">
                   </div>
                   <div class="col-md-6 col-sm-6 sponser_info">
                       <h3><span>{{ $sponsor->title }}</span></h3>
                       <p>{{ $sponsor->description }}</p>
                       <a href="{{ route('contact-us')}}" class="btn btn-xs contact_btn">{{ $sponsor->btn_text }}</a>
                    </div>

              </div>
             @else
             <div class="row">
                   <div class="col-md-4 col-sm-4 premium_info">
                       <h3><span>{{ $sponsor->title }}</span></h3>
                       <p>{{ $sponsor->description }}</p>
                       <a href="{{ route('contact-us')}}" class="btn btn-xs contact_btn">{{ $sponsor->btn_text }}</a>
                    </div>
                     <div class="col-md-8 col-sm-8 premium">
                       <img src="{{ asset('storage/setting/'.$sponsor->img)}}" alt="Premium List">
                   </div>
              </div>
             @endif
            <?php   $count++; ?>
           @endforeach
	     <div class="row">
	        <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10">
	           <div class="text-center">
	           <h1>{{ $advertisewithus->benefit_header }}</h1>
	           <p>{{ $advertisewithus->benefit_bradcrumb }}</p>
	         </div>
	        </div>
	   </div>

    	<div class="row">
          @foreach($benefits as $benefit)
          <div class="col-md-4 col-sm-6">
               <div class="panel">
               		<div class="panel-title">
               			<div class="text-center">
                        	<img src="{{ asset('/storage/setting/'.$benefit->img )}}" alt="Target">
                    	</div>
               		</div>
                    <div class="panel-body">
                        <h4 class="text-center">{{ $benefit->title }}</h4>
                        <p class="text-center">{{ $benefit->description }}</p>
                    </div>
                </div>
            </div>
             @endforeach
        </div>

         <div class="row">
	       <div class="col-md-6 col-sm-6 customer_info">
	       		<h3><span>{{ $advertisewithus->analyse_customer_data_header }}</span></h3>
	       		<p>{{ $advertisewithus->analyse_description }}</p>
       			<a href="contact.html" class="btn btn-xs contact_btn">{{ $advertisewithus->btn_text }}</a>
	       </div>
	       <div class="col-md-4 col-sm-6 analyze">
	       		<img src="{{ asset('storage/setting/'.$advertisewithus->analyse_image) }}" style="height:100%" alt="Premium List">
	       	</div>
	    </div>
    </div>
</section>
<!--counter start-->
<section class="advertisement" >
  <!--container start-->
  <div class="container">
    <!--row start-->
    <div class="row p10" style="background-color:{{ $advertisewithus->call_now_background_color }} !important;color:{{ $advertisewithus->color }} !important">
      <div class="col-md-6 col-sm-6 col-xs-8">
      	<H1>{{ $advertisewithus->advertise_with_us }}</H1>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-4">
      	<a href="tel:{{ $advertisewithus->call_now_phone }}" class="pull-right btn btn-lg">{{ $advertisewithus->call_now }}</a>
      </div>
    </div>
    <!--row end-->
  </div>
  <!--container end-->
</section>

@include('element.company_logo_slider')
@endsection

