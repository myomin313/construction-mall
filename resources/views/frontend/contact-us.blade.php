@extends('frontend.layouts.homeapp')
@section('title','Myanbox | Contact Us')
@section('content')

  <!--inner-heading start-->
  <section class="inner-heading"  style="background-image: url('{{ asset('images/contact-heading-bg.jpg' )}}');">
    <div class="container">
      <h1>Contact Us</h1>
      <ul class="xs-breadcumb">
        <li><a href="{{route('home')}}" style="color : #fcb80b"> Home  / </a> <a hfer="#">Contact</a></li>
      </ul>
    </div>
  </section>
  <!--inner-heading end-->

  <!--inner content start-->
  <section class="contactWrap">
    <!--container start-->
    <div class="container">
      <div class="section-title">
        <h3>Get in <span>touch</span></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquet, massa ac ornare feugiat, nunc dui auctor ipsum, sed posuere eros sapien id quam. </p>
      </div>
      <!--row start-->
      <div class="row serviceList">
        <!--col start-->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="contact-item">
            <div class="fig_caption">
              <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i> </div>
              <div class="details">
                <h3>Visit our office</h3>
                <p> <strong>{{ $projectsetting->address }}</strong> </p>
              </div>
            </div>
          </div>
        </div>
        <!--col end-->
        <!--col start-->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="contact-item">
            <div class="fig_caption">
              <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i> </div>
              <div class="details">
                <h3>Mail us</h3>
                <p> <strong>
                  <?php echo "<a href='mailto:$projectsetting->website_mail'>". $projectsetting->website_mail."</a><br>"; ?>
                 </strong> <br>
                   <?php echo "<a href='mailto:$projectsetting->other_mail'>". $projectsetting->other_mail."</a><br>"; ?>
                 </p>
              </div>
            </div>
          </div>
        </div>
        <!--col end-->
        <!--col start-->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="contact-item">
            <div class="fig_caption">
              <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i> </div>
              <div class="details">
                <h3>Call Us</h3>
                <p> <strong>CALL US NOW</strong> <br>
                 <?php
                   $phones = explode(',', $projectsetting->phone );
                   foreach($phones as $phone){
                      echo "<a href='tel:$phone'>".$phone."</a><br>" ;
                    }
                 ?></p>
              </div>
            </div>
          </div>
        </div>
        <!--col end-->
        <!--col start-->
       <!--  <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="contact-item">
            <div class="fig_caption">
              <div class="icon"><i class="fa fa-clock-o" aria-hidden="true"></i> </div>
              <div class="details">
                <h3>Working hour</h3>
                <p> <strong>Mon - Sat : 10am to 7pm</strong> <br>
                  Sunday : Closed</p>
              </div>
            </div>
          </div>
        </div> -->
        <!--col end-->
      </div>
      <!--row end-->
            <div class="section-title margin_t40">
        <h3>Drop <span>your message</span></h3>

      </div>
                  <form action="{{ route('contact') }}" method="POST" id="xs-contact-form" class="xs-form">
                    {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Your name" id="xs_contact_name">
                                 @if($errors->has('name'))
                                 <div class="error" style="color:red">{{ $errors->first('name') }}</div>
                                   @endif
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control invaild" name="email" placeholder="Your email" id="xs_contact_email">
                                 @if($errors->has('email'))
                                 <div class="error" style="color:red">{{ $errors->first('email') }}</div>
                                   @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" placeholder="Your phone number" id="xs_contact_phone">
                                  @if($errors->has('phone'))
                                 <div class="error" style="color:red">{{ $errors->first('phone') }}</div>
                                   @endif
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" placeholder="Subject" id="xs_contact_subject">
                                @if($errors->has('title'))
                                  <div class="error" style="color:red">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                        </div>
                        <textarea name="description" placeholder="Message" id="x_contact_massage" class="form-control message-box" cols="30" rows="10"></textarea>
                                @if($errors->has('description'))
                                  <div class="error" style="color:red">{{ $errors->first('description') }}</div>
                                @endif
                         <div class="readmore text-center">
                            <button type="submit" class="main-btn btn-1 btn-1e">SEND MESSAGE</button>
                         </div>
                    </form>
    </div>
    <!--container end-->

  </section>
  <!--inner content end-->


  <div class="xs-map-sec">
    <div class="xs-maps-wraper">
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9696.321865093838!2d96.20752542566872!3d16.821086532559598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x45530581cb562bcc!2sM+Square+Constrction+%26+Decoration+Co.%2CLtd!5e1!3m2!1sen!2smm!4v1548746068845"></iframe>
        </div>
    </div>
</div>
  @include('element.company_logo_slider')

  @endsection
