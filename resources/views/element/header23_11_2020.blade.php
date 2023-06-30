 <header>
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
              <img alt="Brand" src="{{ asset('images/logo/logo.png') }}" class="img-responsive">
            </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="{{ Route::current()->getName() == 'home' ? 'active': '' }}"><a href="{{ url('/')}}">Home <span class="sr-only">(current)</span></a></li>
              <li class="dropdown {{ request()->is('companies/1/*') ? 'active' : '' }}">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Service <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  @foreach($serviceCategories as $servicecategory)
                        <li><a  href="{{ url('companies/service/'.$servicecategory->category_url) }}">{{ $servicecategory->name }}</a></li>
                        @endforeach
                </ul>
              </li>
              <li class="dropdown  {{ request()->is('companies/2/*') ? 'active' : '' }}">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Supplier <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  @foreach($supplierCategories as $suppliercategory)
                        <li><a  href="{{ url('companies/supplier/'.$suppliercategory->category_url) }}">{{ $suppliercategory->name }}</a></li>
                        @endforeach
                </ul>
              </li>
              <li class="dropdown  {{ request()->is('companies/3/*') ? 'active' : '' }}">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reno Business<span class="caret"></span></a>
                <ul class="dropdown-menu">
                 @foreach($renobusinessCategories as $renobusinesscategory)
                        <li><a  href="{{ url('companies/reno-business/'.$renobusinesscategory->category_url) }}">{{ $renobusinesscategory->name }}</a></li>
                        @endforeach
                </ul>
              </li>
              <li class="{{ Route::current()->getName() == 'professionals' ? 'active': '' }}"><a href="{{ route('professionals') }}">Professionals</a></li>
              <li class="{{ Route::current()->getName() == 'blogs' ? 'active': '' }}"><a href="{{ route('blogs') }}">Blog</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
             @if(empty(auth()->user()->id))
              <li><a data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target=".bs-example-modal-md-1">                   
               <i class="fa fa-lock" aria-hidden="true"></i>
                Login</a></li>
              <li><a data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target=".bs-example-modal-md"><i class="fa fa-user" aria-hidden="true"></i>Sign Up</a></li>
              @else
              @if(auth()->user()->role == 1)
              <li><a href="{{ url('user/dashboard') }}">
               <i class="fa fa-lock" aria-hidden="true"></i>
                Profile</a></li>
               @elseif(auth()->user()->role == 2)
                <li><a href="{{ url('company') }}">
               <i class="fa fa-lock" aria-hidden="true"></i>Profile</a></li>
              @elseif(auth()->user()->role == 3)
              <li><a class="hvr-link" href="{{ url('freelancer/profile') }}"><i class="fa fa-user" aria-hidden="true"></i>Profile</a></li>
              @else
                <li><a href="{{ url('admin/companies') }}"><i class="fa fa-user" aria-hidden="true"></i>Profile</a></li>
              @endif
              <li><a href="{{ url('/logout') }}"><i class="fa fa-user" aria-hidden="true"></i>Logout</a></li>
               @endif
              <li><button data-dismiss="modal" aria-label="Close" data-toggle="modal"  class="btn navbar-btn">Get A Quote</button></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
        
  </header>