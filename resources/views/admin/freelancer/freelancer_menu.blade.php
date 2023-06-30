 <div class="side-bar related_standard" > 
            <!--  <div class="side-barBox"> -->
              <!--<div class="side-barBox" >-->
                 <!--<h5 class="side-barTitle" style="background:linear-gradient(90deg, {{ $projectsetting->freelancer_nav_first_background_and_icon }} 50%, {{ $projectsetting->freelancer_nav_second }}) !important;color:{{ $projectsetting->freelancer_nav_font_color}} !important">Menu</h5>-->
                 <div class="panel">
                    <!--  <div class="panel-heading" style="background:linear-gradient(90deg, {{ $projectsetting->freelancer_nav_first_background_and_icon }} 50%, {{ $projectsetting->freelancer_nav_second }}) !important;color:{{ $projectsetting->freelancer_nav_font_color}} !important"> -->
                    <!--   <h2 class="panel-title text-center">Menu</h2>-->
                    <!--</div>-->
                    <h5 class="side-barTitle" style="background:linear-gradient(90deg, {{ $projectsetting->freelancer_nav_first_background_and_icon }} 50%, {{ $projectsetting->freelancer_nav_second }}) !important;color:{{ $projectsetting->freelancer_nav_font_color}} !important">Menu</h5>
                  
                  <div class="panel-body left_menu">
                    <ul class="nav nav-pills nav-stacked"  id="menu1"  style="list-style: none">
                        
                         <li class="{{ request()->is('blog-list') || request()->is('add/blog') || request()->is('blog/edit/*')  ?'active':''}}">
                            <a href="{{ route('freelancer.blogs') }}">Blog List</a> 
                         </li>
                         <li class="{{ request()->is('freelancer/feedbacks') ?'active':''}}">
                           <a href="{{ route('freelancer.feedbacks') }}">Feedback List</a>
                         </li>
                         <li  class="{{ request()->is('freelancer/rates') ?'active':''}}">
                           <a href="{{ route('freelancer.rates') }}">Rating List</a>
                         </li>
                         <li  class="{{ request()->is('freelancer/profile') ?'active':''}}">
                          <a  href="{{ route('freelancer.profile') }}"> Profile</a>
                         </li>
                         <li class="{{ request()->is('freelancer/account') ?'active':''}}">
                           <a href="{{ route('freelancer.account') }}">
                          Change Password
                          </a>
                         </li>
                     </ul>
                    </div>
                    </div>
                <!--</div>-->
             <!-- </div> -->
          </div>