@extends('backend.layouts.company_panel')
@section('title','Dashboard')
@section('content')
@php use Carbon\Carbon; @endphp

    <div class="col-md-9 col-sm-12">
        <li>
            <div class="row our_services">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                            </div>
                            <p class="card-category">{{$count_arr[0]['received_quotation']}}</p>
                            <h3 class="card-title">Total Received Quote
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="{{route('company.received.quotation','received')}}">Get Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                            </div>
                            <p class="card-category">{{$count_arr[0]['received_quotation_success']}}</p>
                            <h3 class="card-title">Received Success Quote</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="{{route('company.received.quotation','success')}}">Get Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                            </div>
                            <p class="card-category">{{$count_arr[0]['received_quotation_pending']}}</p>
                            <h3 class="card-title">Received Pending Quote</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="{{route('company.received.quotation','pending')}}">Get Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                            </div>
                            <p class="card-category">{{$count_arr[0]['requested_quotation_count']}}</p>
                            <h3 class="card-title">Total Requested Quote</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="{{route('company.received.quotation','requested')}}">Get Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="side-bar package">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2 class="panel-title text-center">Company Information Summary</h2>
                            </div>
                            <div class="panel-body dashboard">
                                @if(Session::get('parent_category_id') == 1 || Session::get('parent_category_id') == 2)
                                    <p>Total Project Count <span class="pull-right"><a href="{{route('project.index')}}"><u>{{$count_arr[0]['project_count']}}</u></a></span></p>
                                @endif
                                @if(Session::get('parent_category_id') == 2 )
                                    <p>Total Product Count <span class="pull-right"><a href="{{route('product.index')}}"><u>{{$count_arr[0]['product_count']}}</u></a></span></p>
                                @endif
                                @if(Session::get('parent_category_id') == 1 )
                                    <p>Total Service Count <span class="pull-right"><a href="{{route('service.index')}}"><u>{{$count_arr[0]['service_count']}}</u></a></span></p>
                                @endif
                                <p>Total Package Count <span class="pull-right"><a href="{{route('package.history')}}"><u>{{$count_arr[0]['company_package_plan_count']}}</u></a></span></p>
                                <p>Total Viewer Count <span class="pull-right">{{$count_arr[0]['view_count']}}</span></p>
                                <p>Available Coin<span class="pull-right">{{$count_arr[0]['left_coin']}}</span></p>
                                <p>Active Package Plan<span class="pull-right">{{Session::get('active_package_plan_name')}}</span></p>
                                @if( Session::get('active_package_plan_id') != 1)
                                    @php
                                      
                                    $date = Carbon::parse(Session::get('package_end_date'));
                                    $now = Carbon::now();
                                    
                                    $diff = $date->diffInDays($now);

                                    @endphp
                                    
                                    @if($diff <= 7)
                                        <p>Your company's {{ Session::get('active_package_plan_name') }} package will expire soon.Please renew by buying <a href="{{ route('package.index') }}" style="color:#ffcc32;"> a new company package </a>.
                                            Your company's projects, products and services information will not see by the people who visit to our website  if you are late to renew it until <?php  echo date('d F, Y',strtotime(Session::get('package_end_date'))) ?>.</p>
                                    @else
                                      <p>Your company's package plan is <span style="color:#ffcc32 !important;text-weight:bold;">{{ Session::get('active_package_plan_name')}} </span>. This package will expire in <B> <?php  echo date('d F, Y',strtotime(Session::get('package_end_date'))) ?></B>. </p>
                                    @endif
                                        
                                @else
                                    @if(Session::get('parent_category_id') == 3)
                                        <p> Your Company Package is Free Package. If you want to achieve a lot of quotations, please buy 
                                        <a href="{{ route('package.index') }}" style="color:#ffcc32;">a new company package</a> </p>
                                    @else
                                    <p>
                                        Your Company Package is Free Package.Your company's projects, products and services information will not see by the people who visit to our website.Please Buy
                                        <a href="{{ route('package.index') }}" style="color:#ffcc32;">a new company package</a>
                                    </p>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </div>
@endsection
