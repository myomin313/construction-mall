<div class="col-md-3 col-sm-12">
          <div class="side-bar related_standard" style="height:550px"> 
              <div class="panel">
                <div class="panel-heading"> 
                   <h2 class="panel-title text-center">Menu</h2>
                </div>
                 <div class="panel-body left_menu">
                    <ul class="nav nav-pills nav-stacked" id="myDropDown">
                      <li class="{{ request()->is('company/dashboard') ?'active':''}}"><a href="{{route('companies.dashboard')}}">Company Dashboard</a></li>
                      <li class="dropdown submenu {{ request()->is('company_quotation/received') || request()->is('company_quotation/requested')?'open':''}}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="true
                        ">Quote Management</a>
                        <ul class="dropdown-menu">
                          <li class="{{ request()->is('company_quotation/received')?'active':''}}"><a href="{{route('company.received.quotation','received')}}">Received Quote</a></li>
                          <li class="{{ request()->is('company_quotation/requested')?'active':''}}"><a href="{{route('company.received.quotation','requested') }}">Requested Quote</a></li>
                        </ul>
                      </li>
                      <li class="dropdown submenu {{ request()->is('company/coinplan') || request()->is('coinplan/history') ?'open':''}}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Coin Management</a>
                        <ul class="dropdown-menu">
                          <li class="{{ request()->is('company/coinplan') ?'active':''}}"><a href="{{ route('company.coinplan.index')}}">Order Coin</a></li>
                          <li class="{{ request()->is('company/coinplan/history') ?'active':''}}"><a href="{{route('company.coinplan.history')}}">Ordered Coin History</a></li>
                        </ul>
                      </li>
                      <?php
                            if (Session::has('parent_category_id')){
                                if((Session::get('parent_category_id') == 1 ||
                                   Session::get('parent_category_id') == 2 ) && Session::get('active_package_plan_id') != 1)
                                { 
                                    ?>
                      <li class="dropdown submenu {{ request()->is('project') || request()->is('project/*/*') || request()->is('project/*/edit') || request()->is('project/create') ?'open':''}}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="true
                        ">Project Management</a>
                        <ul class="dropdown-menu">
                          <li class="{{ request()->is('project') || request()->is('project/*/*') || request()->is('project/*/edit') ?'active':''}}"><a  href="{{route('project.index')}}">Project List</a></li>
                          <li class="{{ request()->is('project/create')?'active':''}}"><a href="{{route('project.create')}}">Project Add</a></li>
                        </ul>
                      </li>
                       <?php   } 
                                if(Session::get('parent_category_id') == 2 && Session::get('active_package_plan_id') != 1)
                                { ?>
                       <li class="dropdown submenu {{ request()->is('product') || request()->is('product/*/*/edit') || request()->is('product/create')?'open':''}}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="true
                        ">Product Management</a>
                        <ul class="dropdown-menu">
                          <li class="{{ request()->is('product') || request()->is('product/*/*/edit')?'active':''}}"><a  href="{{route('product.index')}}">Product List</a></li>
                          <li class="{{ request()->is('product/create') ?'active':''}}"><a href="{{route('product.create')}}">Product Add</a></li>
                        </ul>
                      </li>
                      
                       <?php   } 
                    if(Session::get('parent_category_id') == 1 && Session::get('active_package_plan_id') != 1) { ?>
                      
                      <li class="dropdown submenu {{ request()->is('service') ||request()->is('service/*/*/edit') || request()->is('service/create') ?'open':''}}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="true
                        ">Service Management</a>
                        <ul class="dropdown-menu">
                          <li class="{{ request()->is('service') || request()->is('service/*/*/edit')?'active':''}}"><a  href="{{ route('service.index') }}">Service List</a></li>
                          <li class="{{ request()->is('service/create') ?'active':''}}"><a href="{{route('service.create')}}">Service Add</a></li>
                        </ul>
                      </li>
                       <?php
                             } 
                        }   ?>
                      
                      <li class="dropdown submenu {{ request()->is('package') || request()->is('package/history')?'open':''}}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="true
                        ">Package Management</a>
                        <ul class="dropdown-menu">
                      <li class="{{ request()->is('package')?'active':''}}"><a href="{{route('package.index')}}">Buy Package</a></li>
                       <!--start-->
                       <li class="{{  request()->is('package/history')?'active':''}}"><a href="{{route('package.history')}}">Package History</a></li>
                       </ul>
                       </li>
                       <!--end-->
                       <li class="{{ request()->is('company') ?'active':''}}"><a href="{{route('companies.profile')}}">Company Profile</a></li>
                       <li class="{{ request()->is('company/change_password') ?'active':''}}"><a href="{{ route('company.change_password')}}">Change Password</a></li>
                        
                    </ul>
                 </div>
              </div>
          </div>
           