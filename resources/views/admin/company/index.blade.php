@extends('layouts.company_panel')
@section('content')
<!-- Static Table Start -->
        <div class="data-table-area  mg-t-10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-offset-4 col-md-offset-4 col-lg-4 col-md-4 col-sm-offset-2 col-sm-4 col-xs-12 company_profile">
                        <h2 class="center">Quotation History</h2>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-offest-8 col-md-offset-8 col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <ol class="breadcrumb pull-right">
                          <li><a href="#">Home</a></li>
                          <li class="#">Quotation List</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                            <option value="">Export Basic</option>
                                            <option value="all">Export All</option>
                                            <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="no">No</th>
                                                <th data-field="service_type" data-editable="true"> Service Type</th>
                                                <th data-field="money_range" data-editable="true">Money Range</th>
                                                <th data-field="username" data-editable="true">User Name</th>
                                                <th data-field="email">Email</th>
                                                <th data-field="phone" data-editable="true">Phone</th>
                                                <th data-field="status" data-editable="true">Status</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td>1</td>
                                                <td>Service</td>
                                                <td>20 ~ 50 Lakhs   </td>
                                                <td>Phyu</td>
                                                <td class="datatable-ct"><span class="pie">phyu@gmail.com</span>
                                                </td>
                                                <td>09422312147</td>
                                                <td><button class="btn btn-xs btn-primary">Waiting</button></td>
                                                <td class="">
                                                    <a href="detail" class="btn btn-xs btn-info"><i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="update" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                                     <a href="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                           <tr>
                                                <td></td>
                                                <td>2</td>
                                                <td>Service</td>
                                                <td>20 ~ 50 Lakhs   </td>
                                                <td>Phyu</td>
                                                <td class="datatable-ct"><span class="pie">phyu@gmail.com</span>
                                                </td>
                                                <td>09422312147</td>
                                                <td><button class="btn btn-xs btn-primary">Waiting</button></td>
                                                <td class="">
                                                    <a href="detail" class="btn btn-xs btn-info"><i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="update" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                                     <a href="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>3</td>
                                                <td>Service</td>
                                                <td>20 ~ 50 Lakhs   </td>
                                                <td>Phyu</td>
                                                <td class="datatable-ct"><span class="pie">phyu@gmail.com</span>
                                                </td>
                                                <td>09422312147</td>
                                                <td><button class="btn btn-xs btn-primary">Waiting</button></td>
                                                <td class="">
                                                    <a href="detail" class="btn btn-xs btn-info"><i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="update" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                                     <a href="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>4</td>
                                                <td>Service</td>
                                                <td>20 ~ 50 Lakhs   </td>
                                                <td>Phyu</td>
                                                <td class="datatable-ct"><span class="pie">phyu@gmail.com</span>
                                                </td>
                                                <td>09422312147</td>
                                                <td><button class="btn btn-xs btn-primary">Waiting</button></td>
                                                <td class="">
                                                    <a href="detail" class="btn btn-xs btn-info"><i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="update" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                                     <a href="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                             <tr>
                                                <td></td>
                                                <td>5</td>
                                                <td>Service</td>
                                                <td>20 ~ 50 Lakhs   </td>
                                                <td>Phyu</td>
                                                <td class="datatable-ct"><span class="pie">phyu@gmail.com</span>
                                                </td>
                                                <td>09422312147</td>
                                                <td><button class="btn btn-xs btn-primary">Waiting</button></td>
                                                <td class="">
                                                    <a href="detail" class="btn btn-xs btn-info"><i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="update" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                                     <a href="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                           <tr>
                                                <td></td>
                                                <td>6</td>
                                                <td>Service</td>
                                                <td>20 ~ 50 Lakhs   </td>
                                                <td>Phyu</td>
                                                <td class="datatable-ct"><span class="pie">phyu@gmail.com</span>
                                                </td>
                                                <td>09422312147</td>
                                                <td><button class="btn btn-xs btn-primary">Waiting</button></td>
                                                <td class="">
                                                    <a href="detail" class="btn btn-xs btn-info"><i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="update" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                                     <a href="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>7</td>
                                                <td>Service</td>
                                                <td>20 ~ 50 Lakhs   </td>
                                                <td>Phyu</td>
                                                <td class="datatable-ct"><span class="pie">phyu@gmail.com</span>
                                                </td>
                                                <td>09422312147</td>
                                                <td><button class="btn btn-xs btn-primary">Waiting</button></td>
                                                <td class="">
                                                    <a href="detail" class="btn btn-xs btn-info"><i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="update" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                                     <a href="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
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
        </div>
        <!-- Static Table End -->
@endsection