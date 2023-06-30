@extends('layouts.company_panel')
@section('content')
        <div class="content">
        <div class="container-fluid">
         <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">Total Received Quote</p>
                  <h3 class="card-title">{{$count_arr[0]['received_quotation']}}
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-warning text-info" aria-hidden="true"></i>
                    <a href="{{route('company.received.quotation','received')}}">Get Detail...</a>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-ban" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">Received Success Quote</p>
                  <h3 class="card-title">{{$count_arr[0]['received_quotation_success']}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-warning text-info"></i> 
                    <a href="{{route('company.received.quotation','success')}}">Get Detail...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">Received Pending Quote</p>
                  <h3 class="card-title">{{$count_arr[0]['received_quotation_pending']}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-warning text-info"></i><a href="{{route('company.received.quotation','pending')}}"> Get Detail...</a>
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
                  <p class="card-category">Total Request Quote</p>
                  <h3 class="card-title">{{$count_arr[0]['requested_quotation_count']}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-warning text-info"></i><a href="{{route('company.received.quotation','requested')}}">Get Detail...</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
    
        <div class="row">
           
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title ">Company Information</h4>
                            <p class="card-category">Summary</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><label>Total Project Count</label></td>
                                        <td>{{$count_arr[0]['project_count']}}</td>
                                    </tr>
                                    <tr>
                                        <td><label>Total Product Count</label></td>
                                        <td>{{$count_arr[0]['product_count']}}</td>
                                    </tr>
                                     <tr>
                                        <td><label>Total Service Count</label></td>
                                        <td>{{$count_arr[0]['service_count']}}</td>
                                    </tr>
                                     <tr>
                                        <td><label>Total Package  Count</label></td>
                                        <td>{{$count_arr[0]['company_package_plan_count']}}</td>
                                    </tr>
                                     <tr>
                                        <td><label>Total View Count</label></td>
                                        <td>{{$count_arr[0]['view_count']}}</td>
                                    </tr>
                                     <tr>
                                        <td><label>Active Package plan</label></td>
                                        <td>{{$count_arr[0]['active_plan_name']}}</td>
                                    </tr>
                                    <tr>
                                        <td><label>Available Coin</label></td>
                                        <td>{{$count_arr[0]['left_coin']}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection