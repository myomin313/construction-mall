@extends('layouts.freelancer_panel')
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
                  <p class="card-category">Received Quotation</p>
                  <h3 class="card-title">50
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-warning text-danger" aria-hidden="true"></i>
                    <a href="#">Get Detail...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                  </div> 
                  <p class="card-category">Request Quotation</p>
                  <h3 class="card-title">34</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-warning text-danger"></i> Get Detail...
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-ban" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">Cancelled Quotation</p>
                  <h3 class="card-title">75</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-warning text-danger"></i> 
                    <a href="#">Get Detail...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">Delivered Quotation</p>
                  <h3 class="card-title">245</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-warning text-danger"></i> Get Detail...
                  </div>
                </div>
              </div>
            </div>
          </div>
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-header card-header-warning">
                          <h4 class="card-title ">Recent Quotation Received</h4>
                          <p class="card-category"> Member </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
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
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title ">Recent Quotation Received</h4>
                            <p class="card-category">Company</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
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
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-header card-header-danger">
                                  <h4 class="card-title ">Quotation Request</h4>
                                  <p class="card-category">Company</p>
                            </div>
                        <div class="card-body">
                            <div class="table-responsive">
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
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td><label>Total Product Count</label></td>
                                        <td>10</td>
                                    </tr>
                                     <tr>
                                        <td><label>Total Service Count</label></td>
                                        <td>10</td>
                                    </tr>
                                     <tr>
                                        <td><label>Total Package  Count</label></td>
                                        <td>10</td>
                                    </tr>
                                     <tr>
                                        <td><label>Quotation Requested User count</label></td>
                                        <td>10</td>
                                    </tr>
                                     <tr>
                                        <td><label>Total View Count</label></td>
                                        <td>10</td>
                                    </tr>
                                     <tr>
                                        <td><label>Active Package plan</label></td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td><label>Available Coin</label></td>
                                        <td>10</td>
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