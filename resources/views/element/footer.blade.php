<!--footer-sec start-->
<footer class="footer-sec">
    <!--container start-->
    <div class="container">
        <!--row start-->
        <div class="row">
            <!--col start-->
            <div class="col-md-4 col-sm-12">
                <div class="footer-info">
                    <div class="footer-logo"> <a href="{{ url('/') }}"><img class="footer-logo-default" src="{{ asset('images/logo/footer_logo.png') }}" alt=""> </a> </div>
                    <p>FOLLOW US</p>
                    <ul class="footer-social">
                        <li><a href="{{ $projectsetting->facebook_link }}" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                        <li><a href="{{ $projectsetting->facebook_link }}" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                        <li><a href="{{ $projectsetting->facebook_link }}" target="_blank"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                        <li><a href="{{ $projectsetting->linkedin_link }}" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <!--col end-->
            <!--col start-->
            <div class="col-md-8">
                <!--row start-->
                <div class="row">
                    <!--col start-->
                    <div class="col-md-6 col-sm-6">
                        <div class="footer-info">
                            <h3 class="footer-title">Useful Links</h3>
                            <ul class="service-link">
                                <li> <a href="{{ url('/') }}">Home</a> </li>
                                <li> <a href="{{ route('blogs') }}">Blog</a> </li>
                                <li> <a href="{{ route('about-us') }}">About Us</a> </li>
                                <li> <a href="{{ route('contact-us') }}">Contact Us</a> </li>
                            </ul>
                        </div>
                    </div>
                    <!--col end-->
                    <!--col start-->
                    <div class="col-md-6 col-sm-6">
                        <div class="footer-info">
                            <h3 class="footer-title">Contact Us</h3>
                            <ul class="footer-adress">
                                <li><i class="fa fa-map-marker"></i><span>{{ $projectsetting->address }}</span></li>
                                <li><i class="fa fa-phone"></i><span>Call Us :
                                @php
                                    $string = $projectsetting->phone;
                                    $array  = explode(",", $string);
                                    $no = 1;
                                    foreach ($array as $line) {
                                      echo '<a href="tel:'.$line.'">'.$line.'</a>,';
                                      $no++;
                                    };
                                @endphp
                                </span></li>
                                <li><i class="fa fa-envelope-o"></i><span>Email : <a href="mailto:{{ $projectsetting->website_mail }}">{{ $projectsetting->website_mail }}</a></span></li>
                            </ul>
                        </div>
                    </div>
                    <!--col end-->
                </div>
                <!--row end-->

            </div>
            <!--col end-->
        </div>
        <!--row end-->
        <div class="copyright-content">
            <!--row start-->
            <div class="row">
                <!--col start-->
                <div class="col-md-6 col-sm-6">
                    <span>copyright @ {{date('Y')}} myanbox.com Powered By<a href="https://findixmyanmar.com/"> Findix Myanmar Co., Ltd</a> </span>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="pull-right">
              <span>
                  <a href="{{ url('/privacy-policy')}}" style="color:#ffffff">Privacy Policy | </a>
              </span>
                        <span>
                  <a href="{{ url('/terms-and-service')}}" style="color:#ffffff">Terms of service | </a>
              </span>
                        <span>
                  <a href="{{ url('/advertise-with-us')}}" style="color:#ffffff">Advertise With Us</a>
              </span>
                    </div>
                </div>
                <!--col end-->
            </div>
            <!--row end-->
        </div>
    </div>
    <!--container end-->
</footer>
