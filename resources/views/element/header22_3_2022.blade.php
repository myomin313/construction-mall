<header>
     <div class="container-fluid">
      <div class="row">
        <div class="container">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <div class="logo" style="text-align: center;">
                <a class="navbar-brand" href="{{ url('/') }}">
                  <img alt="Brand" src="{{ asset('images/logo/logo.png') }}" class="img-responsive" style="width:90%;margin-top: -3px;">
                </a>
            </div>
          </div>
        </div>
           @php
              $current_route = isset(Route::current()->parameters['category_url'])?Route::current()->parameters['category_url']:'';
          @endphp
        <div class="col-md-9 col-sm-12 col-xs-12">
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" style="margin-top: 4px;">
              <li class="{{ Route::current()->getName() == 'home' ? 'active': '' }}"><a href="{{ url('/')}}">Home <span class="sr-only">(current)</span></a></li>
              <li class="dropdown mega-dropdown {{ request()->is('companies/service/*') ? 'active' : '' }}">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Service <span class="caret"></span></a>

                <ul class="dropdown-menu mega-dropdown-menu row overflow">
                   @php $count =1 @endphp
                   @php
                       $length = sizeof($serviceCategories);
                       $total = $length - floor(sizeof($serviceCategories)/3);
                       $column = (int)$total/2;
                    @endphp
                  <li class="col-md-4 col-sm-4">
                    <ul>
                    @for($i=0; $i<$column; $i++)
                      <li class="{{($current_route == $serviceCategories[$i]->category_url)?'active':''}}"> <a href="{{ url('companies/service/'.$serviceCategories[$i]->category_url) }}">{{ $serviceCategories[$i]->name }}</a> </li> 
                    @endfor
                    </ul>
                  </li>
                  <li class="col-md-4 col-sm-4">
                     <ul>
                        @for($j=$i; $j<$i*2; $j++)
                        <li class="{{($current_route == $serviceCategories[$j]->category_url)?'active':''}}"> <a href="{{ url('companies/service/'.$serviceCategories[$j]->category_url) }}">{{ $serviceCategories[$j]->name }}</a> </li> 
                        @endfor
                     </ul>
                  </li>
                  <li class="col-md-4 col-sm-4">
                     <ul>
                       @for($k=$j; $k<$length; $k++)
                        <li class="{{($current_route == $serviceCategories[$k]->category_url)?'active':''}}"> <a href="{{ url('companies/service/'.$serviceCategories[$k]->category_url) }}">{{ $serviceCategories[$k]->name }}</a> </li> 
                        @endfor
                     </ul>
                  </li>
                </ul>
              </li>
              <li class="dropdown mega-dropdown {{ request()->is('companies/supplier/*') ? 'active' : '' }}">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Supplier <span class="caret"></span></a>
                <ul class="dropdown-menu mega-dropdown-menu row overflow">
                   @php $count =1 @endphp
                   @php
                       $length = sizeof($supplierCategories);
                       $total = $length - floor(sizeof($supplierCategories)/3);
                       $column = (int)$total/2;
                    @endphp
                  <li class="col-md-4 col-sm-4">
                    <ul>
                    @for($i=0; $i<$column; $i++)
                      <li class="{{($current_route == $supplierCategories[$i]->category_url)?'active':''}}"> <a href="{{ url('companies/supplier/'.$supplierCategories[$i]->category_url) }}">{{ $supplierCategories[$i]->name }}</a> </li> 
                    @endfor
                    </ul>
                  </li>
                  <li class="col-md-4 col-sm-4">
                     <ul>
                        @for($j=$i; $j<$i*2; $j++)
                        <li class="{{($current_route == $supplierCategories[$j]->category_url)?'active':''}}"> <a href="{{ url('companies/supplier/'.$supplierCategories[$j]->category_url) }}">{{ $supplierCategories[$j]->name }}</a> </li> 
                        @endfor
                     </ul>
                  </li>
                  <li class="col-md-4 col-sm-4">
                     <ul>
                       @for($k=$j; $k<$length; $k++)
                        <li class="{{($current_route == $supplierCategories[$k]->category_url)?'active':''}}"> <a href="{{ url('companies/supplier/'.$supplierCategories[$k]->category_url) }}">{{ $supplierCategories[$k]->name }}</a> </li> 
                        @endfor
                     </ul>
                  </li>
                </ul>
              </li>
              <li class="dropdown  mega-dropdown {{ request()->is('companies/reno-business/*') ? 'active' : '' }}">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reno Business <span class="caret"></span></a>
                <ul class="dropdown-menu mega-dropdown-menu row overflow">
                   @php $count =1 @endphp
                   @php
                       $length = sizeof($renobusinessCategories);
                       $total = $length - floor(sizeof($renobusinessCategories)/3);
                       $column = (int)$total/2;
                    @endphp
                  <li class="col-md-4 col-sm-4">
                    <ul>
                    @for($i=0; $i<$column; $i++)
                      <li class="{{($current_route == $renobusinessCategories[$i]->category_url)?'active':''}}"> <a href="{{ url('companies/reno-business/'.$renobusinessCategories[$i]->category_url) }}">{{ $renobusinessCategories[$i]->name }}</a> </li> 
                    @endfor
                    </ul>
                  </li>
                  <li class="col-md-4 col-sm-4">
                     <ul>
                        @for($j=$i; $j<$i*2; $j++)
                        <li class="{{($current_route == $renobusinessCategories[$j]->category_url)?'active':''}}"> <a href="{{ url('companies/reno-business/'.$renobusinessCategories[$j]->category_url) }}">{{ $renobusinessCategories[$j]->name }}</a> </li> 
                        @endfor
                     </ul>
                  </li>
                  <li class="col-md-4 col-sm-4">
                     <ul>
                       @for($k=$j; $k<$length; $k++)
                        <li class="{{($current_route == $renobusinessCategories[$k]->category_url)?'active':''}}"> <a href="{{ url('companies/reno-business/'.$renobusinessCategories[$k]->category_url) }}">{{ $renobusinessCategories[$k]->name }}</a> </li> 
                        @endfor
                     </ul>
                  </li>
                </ul>
              </li>
              <li class="{{ Route::current()->getName() == 'professionals' ? 'active': '' }}"><a href="{{ route('professionals') }}">Professionals</a></li>
              <li class="{{ Route::current()->getName() == 'blogs' ? 'active': '' }}"><a href="{{ route('blogs') }}">Blog</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="margin-top:4px">
             @if(empty(auth()->user()->id))
              <li><a data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target=".login-in">                   
               <i class="fa fa-lock" aria-hidden="true"></i>
                Login</a></li>
              <li><a data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target=".bs-example-modal-md"><i class="fa fa-user" aria-hidden="true"></i>Sign Up</a></li>
              @else
              @if(auth()->user()->role == 1)
              <!--<li><a href="{{ url('user/dashboard') }}">-->
              <!--    @if(Auth::user()->logo != null && Auth::user()->logo != 'undefined')-->
              <!-- <img src="{{ asset('storage/user/'.Auth::user()->logo)}}"  alt="" style="width:25px;height:25px;border-radius: 50%" >-->
              <!--  @endif-->
              <!--  <?=  substr(Auth::user()->name,0,15) ?>-->
              <!-- </a></li>-->
                <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">                   
                  @if(Auth::user()->logo != null && Auth::user()->logo != 'undefined')
               <img src="{{ asset('storage/user/'.Auth::user()->logo)}}"  alt="" style="width:25px;height:25px;border-radius: 50%" >
                @endif
                <?=  substr(Auth::user()->name,0,5) ?> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu row mega-dropdown-user-menu overflow" >
                  <!--  <li>-->
                  <!--  <a href="{{ route('user.dashboard') }}">Dashboard</a>-->
                  <!--</li>-->
                  <li>
                    <a href="{{ route('user.received.user_quotation','requested') }}">Requested Quote List</a>
                  </li>
                  <li>
                    <a href="{{ route('user.coinplan.index') }}">Buy Coin </a>
                  </li>
                  <li>
                    <a href="{{ route('user.coinplan.history') }}">Ordered Coin History</a>
                  </li>

                  <li>
                    <a href="{{ route('user.edit') }}">Change Profile</a>
                  </li>
                  <li>
                    <a href="{{ route('user.change_password')}}"> Change Password</a>
                  </li>
                   <li><a href="{{ url('/logout') }}">
                  <!--<i class="fa fa-user" aria-hidden="true"></i>-->
                  <i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                  <li>
                  <!--<li>-->
                  <!--  <a href="{{ url('/logout') }}"> Logout</a>-->
                  <!--</li>-->
                  
                </ul>
                <!-- end -->

             </li>
               @else
                 @php
                    if(auth()->user()->role == 2){
                      $path = url('company/dashboard');
                      $path_name = 'Dashboard';
                      $icon = "fa-list";
                      $image_path = asset('storage/company_logo/'.Auth::user()->logo);
                      }
                    else if(auth()->user()->role == 3){
                      $path = url('freelancer/profile');
                      $path_name= 'Profile';
                      $icon = "fa-user";
                      $image_path = asset('storage/freelancer/'.Auth::user()->logo);
                      }
                    else{
                      $path = url('admin/companies');
                      $path_name = 'All Companies List';
                      $icon = "fa-home";
                      $image_path =  asset('storage/admin_logo/'.Auth::user()->logo);
                     }
                 @endphp
              
                <li>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">                   
                @if(Auth::user()->logo != null && Auth::user()->logo != 'undefined')
                 <img src="{{$image_path}}"  alt="" style="width:25px;height:25px;border-radius: 50%" >
              
                @endif
                <?=  substr(Auth::user()->name,0,10) ?> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu row mega-dropdown-user-menu overflow">
                    <li>
                        <a href="{{$path}}">
                           <i class="fa {{$icon}}"></i> {{$path_name}}
                        </a>
                    </li>
                    <li><a href="{{ url('/logout') }}">
                      <i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                </ul>
               </li>
             
            @endif
            @endif
            @if(!empty(auth()->user()->id))
              @if(auth()->user()->role == '1' || auth()->user()->role == '2')      
                  <button data-dismiss="modal" aria-label="Close" data-toggle="modal"  class="btn navbar-btn">Get A Quote</button></li>
              @else
                  <button data-dismiss="modal" aria-label="Close" data-toggle="modal"  class="btn navbar-btn1">Get A Quote</button></li>
              @endif
            @else
             <button data-dismiss="modal" aria-label="Close" data-toggle="modal"  class="btn navbar-btn">Get A Quote</button></li>
             @endif

            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </div>
  </div>
</div>
  </header>
