@extends('layouts.dashboard')
@section('content')
<div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line product reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Total Product Count</h5>
                                <h2><span>5000</span></h2>
                                <span class="text-success">20%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line request_quote reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Quotation Request Count</h5>
                                <h2><span>3000</span></h2>
                                <span class="text-danger">30%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">230% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line received_quote reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Quotation Received Count</h5>
                                <h2><span>2000</span> </h2>
                                <span class="text-inverse">60%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">20% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line users table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Delivered Quotation Count</h5>
                                <h2><span>1000</span></h2>
                                <span class="text-info">80%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">230% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="quotation-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Recent Member Quotation Request</h3>
                          </div>
                          <div class="panel-body table-responsive">
                            <table class="table table-stripe">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Service Type</th>
                                        <th>Money Range </th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Service</td>
                                        <td>20 ~ 50 Lakhs</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>09422312147</td>
                                        <td>
                                            <button class="btn btn-info btn-xs" type="button">
                                              Waiting
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Service</td>
                                        <td>20 ~ 50 Lakhs</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>09422312147</td>
                                        <td>
                                            <button class="btn btn-info btn-xs" type="button">
                                              Waiting
                                            </button>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>3</td>
                                        <td>Service</td>
                                        <td>20 ~ 50 Lakhs</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>09422312147</td>
                                        <td>
                                            <button class="btn btn-info btn-xs" type="button">
                                              Waiting
                                            </button>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>4</td>
                                        <td>Service</td>
                                        <td>20 ~ 50 Lakhs</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>09422312147</td>
                                        <td>
                                            <button class="btn btn-info btn-xs" type="button">
                                              Waiting
                                            </button>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>5</td>
                                        <td>Service</td>
                                        <td>20 ~ 50 Lakhs</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>09422312147</td>
                                        <td>
                                            <button class="btn btn-info btn-xs" type="button">
                                              Waiting
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Recent Company Quotation Request</h3>
                          </div>
                          <div class="panel-body table-responsive">
                            <table class="table table-stripe">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Service Type</th>
                                        <th>Money Range </th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Service</td>
                                        <td>20 ~ 50 Lakhs</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>09422312147</td>
                                        <td>
                                            <button class="btn btn-info btn-xs" type="button">
                                              Waiting
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Service</td>
                                        <td>20 ~ 50 Lakhs</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>09422312147</td>
                                        <td>
                                            <button class="btn btn-info btn-xs" type="button">
                                              Waiting
                                            </button>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>3</td>
                                        <td>Service</td>
                                        <td>20 ~ 50 Lakhs</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>09422312147</td>
                                        <td>
                                            <button class="btn btn-info btn-xs" type="button">
                                              Waiting
                                            </button>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>4</td>
                                        <td>Service</td>
                                        <td>20 ~ 50 Lakhs</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>09422312147</td>
                                        <td>
                                            <button class="btn btn-info btn-xs" type="button">
                                              Waiting
                                            </button>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>5</td>
                                        <td>Service</td>
                                        <td>20 ~ 50 Lakhs</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>09422312147</td>
                                        <td>
                                            <button class="btn btn-info btn-xs" type="button">
                                              Waiting
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Quotation Received</h3>
                          </div>
                          <div class="panel-body table-responsive">
                            <table class="table table-stripe">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Service Type</th>
                                        <th>Money Range </th>
                                        <th>Company Name</th>
                                        <th>Email</th>
                                        <th>Used Coin</th>
                                        <th>Sttus</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Service</td>
                                        <td>20 ~ 50 Lakhs</td>
                                        <td>New co.ltd</td>
                                        <td>new@gmail.com</td>
                                        <td>2000</td>
                                        <td>
                                            <button class="btn btn-info btn-xs" type="button">
                                              Waiting
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Service</td>
                                        <td>20 ~ 50 Lakhs</td>
                                        <td>New co.ltd</td>
                                        <td>new@gmail.com</td>
                                        <td>2000</td>
                                        <td>
                                            <button class="btn btn-info btn-xs" type="button">
                                              Waiting
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Service</td>
                                        <td>20 ~ 50 Lakhs</td>
                                        <td>New co.ltd</td>
                                        <td>new@gmail.com</td>
                                        <td>2000</td>
                                        <td>
                                            <button class="btn btn-info btn-xs" type="button">
                                              Waiting
                                            </button>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>4</td>
                                        <td>Service</td>
                                        <td>20 ~ 50 Lakhs</td>
                                        <td>New co.ltd</td>
                                        <td>new@gmail.com</td>
                                        <td>2000</td>
                                        <td>
                                            <button class="btn btn-info btn-xs" type="button">
                                              Waiting
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Service</td>
                                        <td>20 ~ 50 Lakhs</td>
                                        <td>New co.ltd</td>
                                        <td>new@gmail.com</td>
                                        <td>2000</td>
                                        <td>
                                            <button class="btn btn-info btn-xs" type="button">
                                              Waiting
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Frequently Request Member</h3>
                          </div>
                          <div class="panel-body table-responsive">
                            <table class="table table-stripe">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email </th>
                                        <th>Phone</th>
                                        <th>Request Count</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>0942312134</td>
                                        <td>
                                            <a href="#">10</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>0942312134</td>
                                        <td>
                                            <a href="#">10</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>0942312134</td>
                                        <td>
                                            <a href="#">10</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>0942312134</td>
                                        <td>
                                            <a href="#">10</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>0942312134</td>
                                        <td>
                                            <a href="#">10</a>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>5</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>0942312134</td>
                                        <td>
                                            <a href="#">10</a>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>5</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>0942312134</td>
                                        <td>
                                            <a href="#">10</a>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>5</td>
                                        <td>Phyu</td>
                                        <td>phyu@gmail.com</td>
                                        <td>0942312134</td>
                                        <td>
                                            <a href="#">10</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
