@extends('layouts.admin_panel')
@section('content')            
        <div class="container-fluid" style="margin-top: 0px !important;">
          @include('admin.element.breadcrumb')

            <h2 style="text-align:center" class="pb-15">{{ $company->user->name }} Company Dashboard</h2>
         <div class="row">
             @if($category_id == 1)
              <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon"> 
                    <i class="fa fa-gear" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">Services</p>
                  <h3 class="card-title">{{ $servicecount }}
                  </h3>
                </div>
                 @php
                                    $id = $company->id;
                                    $id = \Crypt::encrypt($id);
                                    
                                    
                                    
                                @endphp
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-warning text-danger" aria-hidden="true"></i>
                    <a href="{{ url('/admin/company-service/'.$id) }}">Get Detail...</a>
                  </div>
                </div>
              </div>
            </div>
            @endif
             @if($category_id == 1 || $category_id == 2)
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">  
                    <i class="fa fa-tasks" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">Projects</p>
                  <h3 class="card-title">{{ $projectcount }}
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-warning text-danger" aria-hidden="true"></i>
                   @php
                                    $id = $company->id;
                                    $id = \Crypt::encrypt($id);
                                    
                                    
                                    
                                @endphp
                    <a href="{{ url('/admin/company-project/'.$id) }}">Get Detail...</a>
                  </div>
                </div>
              </div>
            </div>
             @endif
             @if($category_id == 2)
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">  
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">Products</p>
                  <h3 class="card-title">{{ $productcount }}
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-warning text-danger" aria-hidden="true"></i>
                    @php
                                    $id = $company->id;
                                    $id = \Crypt::encrypt($id);
                                    
                                    
                                    
                                @endphp
                    <a href="{{ url('/admin/company-product/'.$id) }}">Get Detail...</a>
                  </div>
                </div>
              </div>
            </div>
            @endif
           

            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  </div> 
                  <p class="card-category">Request Quotations</p>
                  <h3 class="card-title">{{ $requestquotationcount }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-warning text-danger"></i>
                                        @php
                                    $id = $company->id;
                                    $id = \Crypt::encrypt($id);
                                    $user_id = \Crypt::encrypt($company->user->id);
                                    
                                    
                                @endphp
                    <a href="{{ url('/admin/company/quotation/'.$user_id.'/'.'request') }}">Get Detail...</a>
                  </div>
                </div>
              </div>
            </div>

             <!-- <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="received_quote" href="{{route('company.received.quotation','received')}}"><span class="mini-sub-pro">Received Quote</span></a></li>
                                <li><a title="request_quote" href="{{route('company.received.quotation','request') }}"><span class="mini-sub-pro">Request Quote</span></a></li>
                            </ul> -->


            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                  </div> 
                  <p class="card-category">Received Quotations</p>
                  <h3 class="card-title">{{ $receivedquotationcount }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-warning text-danger"></i> 
                    <a href="{{ url('/admin/company/quotation/'.$user_id.'/'.'received') }}">Get Detail...</a>
                  </div>
                </div>
              </div>
            </div>

             <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-database" aria-hidden="true"></i>
                  </div> 
                  <p class="card-category">Request Coins</p>
                  <h3 class="card-title">{{ $usercoincount }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-warning text-danger"></i> 
                    <a href="{{ url('/admin/company/coin/'.$user_id) }}">Get Detail...</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-folder-o" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">Package Counts</p>
                  <h3 class="card-title">{{ $packagecount }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-warning text-danger"></i> 
                    <a href="{{ url('/admin/company/package/'.$id) }}">Get Detail...</a>
                  </div>
                </div>
              </div>
            </div>

          </div>
    
        
            </div>
          
@endsection