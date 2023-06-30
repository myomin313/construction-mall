@extends('layouts.user')
@section('content')
           
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line product reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Requested Quote Count</h5>
                                <h2><span>{{$quotations_request_count}}</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line request_quote reso-mg-b-30">
                            <div class="analytics-content">
                               <h5>Approved Quote Count</h5>
                                <h2><span>{{$quotations_success_count}}</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line received_quote reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Request Coin Plan Count</h5>
                                <h2><span>{{$usercoin_lists_count}}</span> </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line users table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                 <h5>Approved Coin Plan Count</h5>
                                 <h2><span>{{$usercoin_received}}</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="quotation-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title ">User Information</h4>
                            <p class="card-category">Summary</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><label>Total  Coin</label></td>
                                        <td>{{ Auth::user()->coin }}</td>
                                    </tr>
                                    <tr>
                                        <td><label>Left Coin</label></td>
                                        <td>{{ Auth::user()->left_coin }}</td>
                                    </tr>
                                    
                                     <tr>
                                        <td><label>Used Coin</label></td>
                                        <td>{{ Auth::user()->coin  -  Auth::user()->left_coin }}</td>
                                    </tr>
                                    
                                     <tr>
                                        <td><label>Total Request Quotation</label></td>
                                        <td>{{ $quotations_request_count }}</td>
                                    </tr>
                                    <tr>
                                        <td><label>Total Approve Quotation</label></td>
                                        <td>{{ $quotations_success_count }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td><label>Total Request Coin Plan</label></td>
                                        <td>{{ $usercoin_lists_count }}</td>
                                    </tr>
                                    <tr>
                                        <td><label>Total Received Coin Plan</label></td>
                                        <td>{{ $usercoin_received }}</td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- end-->
                </div>
            </div>
        </div>
        @endsection