@extends('layouts.user')
@section('content')
           
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line product reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Request Quotation Count</h5>
                                <h2><span>{{$quotations_request_count}}</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line request_quote reso-mg-b-30">
                            <div class="analytics-content">
                               <h5>Received Quotation Count</h5>
                                <h2><span>{{$quotations_received_count}}</span></h2>
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
                                 <h5>Received Coin Plan Count</h5>
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
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Recent Quotation Request</h3>
                          </div>
                          <div class="panel-body table-responsive">
                          <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" 
                          data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                          data-resizable="true" data-cookie="true"   data-cookie-id-table="saveId" data-show-export="true"
                           data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="no">No</th>
                                                <th data-field="range_id" data-editable="true">Range</th>
                                                <th data-field="category_id" data-editable="true">Category</th>
                                                <th style="width:20px;" data-field="project_current_situation" data-editable="true">Project Situation</th>
                                                <th data-field="used_coin" data-editable="true">Used Coin</th>
                                                <th data-field="send_user_id" data-editable="true">Sender</th>
                                                <th data-field="received_status" data-editable="true">Request Status</th> 
                                                <th data-field="created_at" data-editable="true">Received Date</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @php $count=1;@endphp
                                         @foreach($quotations_request as $quotation):
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td><?= $quotation->range->minimum_price ?> ~ <?= $quotation->range->maximum_price ?></td>
                                                <td><?= $quotation->category->name ?></td>
                                                <td><?= $quotation->project_current_situation ?></td>
                                                <td><?= $quotation->used_coin ?></td>
                                                <td><?= $quotation->send_user->name ?></td> 
                                                <td>  <span class="mj_btn btn btn-success"> <?=$quotation->requested_status ?>  </span>
                                                     </td> 
                                                <td><?= $quotation->created_at ?></td>
                                               
                                            </tr>
                                            @php $count++; @endphp
                                         @endforeach  
                                        </tbody>
                                    </table>
                          </div>
                        </div>
                    </div>

                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Quotation Pending</h3>
                          </div>
                          <div class="panel-body table-responsive">
                          <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" 
                          data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                          data-resizable="true" data-cookie="true"   data-cookie-id-table="saveId" data-show-export="true"
                           data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="no">No</th>
                                                <th data-field="range_id" data-editable="true">Range</th>
                                                <th data-field="category_id" data-editable="true">Category</th>
                                                <th style="width:20px;" data-field="project_current_situation" data-editable="true">Project Situation</th>
                                                <th data-field="used_coin" data-editable="true">Used Coin</th>
                                                <th data-field="send_user_id" data-editable="true">Sender</th>
                                                <th data-field="received_status" data-editable="true">Request Status</th> 
                                                <th data-field="created_at" data-editable="true">Received Date</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @php $count=1;@endphp
                                         @foreach($quotations_pending as $quotation):
                                            <tr>
                                                 <td>{{$count}}</td>
                                               <td><?= $quotation->range->minimum_price ?> ~ <?= $quotation->range->maximum_price ?></td>
                                                <td><?= $quotation->category->name ?></td>
                                                <td><?= $quotation->project_current_situation ?></td>
                                                <td><?= $quotation->used_coin ?></td>
                                                <td><?= $quotation->send_user->name ?></td>  
                                                <td>           <span class="mj_btn btn btn-warning">  <?= $quotation->requested_status  ?>  </span>
                                                        
                                                    </td> 
                                                <td><?= $quotation->created_at ?></td>
                                               
                                            </tr>
                                            @php $count++; @endphp
                                         @endforeach  
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
                          <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" 
                          data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                          data-resizable="true" data-cookie="true"   data-cookie-id-table="saveId" data-show-export="true"
                           data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="no">No</th>
                                                <th data-field="range_id" data-editable="true">Range</th>
                                                <th data-field="category_id" data-editable="true">Category</th>
                                                <th style="width:20px;" data-field="project_current_situation" data-editable="true">Project Situation</th>
                                                <th data-field="used_coin" data-editable="true">Used Coin</th>
                                                <th data-field="send_user_id" data-editable="true">Sender</th>
                                                <th data-field="received_status" data-editable="true">Request Status</th> 
                                                <th data-field="created_at" data-editable="true">Received Date</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @php $count=1;@endphp
                                         @foreach($quotations_received as $quotation):
                                            <tr>
                                                 <td>{{$count}}</td>
                                              <td><?= $quotation->range->minimum_price ?> ~ <?= $quotation->range->maximum_price ?></td>
                                                <td><?= $quotation->category->name ?></td>
                                                <td><?= $quotation->project_current_situation ?></td>
                                                <td><?= $quotation->used_coin ?></td>
                                                <td><?= $quotation->send_user->name ?></td>  
                                                <td>
                                                @if ( $quotation->received_status === "pending")
                                                            <span class="mj_btn btn btn-warning">  <?= $quotation->received_status ?>  </span>
                                                      
                                                        @else
                                                            <span class="mj_btn btn btn-success"> <?=$quotation->received_status ?>  </span>
                                                        @endif

                                              </td>
                                                <td><?= $quotation->created_at ?></td>
                                               
                                            </tr>
                                            @php $count++; @endphp
                                         @endforeach  
                                        </tbody>
                                    </table>
                          </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Coin Lists</h3>
                          </div>
                          <div class="panel-body table-responsive">
                          <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" 
                          data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                          data-resizable="true" data-cookie="true"   data-cookie-id-table="saveId" data-show-export="true"
                           data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="no">No</th>
                                                <!-- <th data-field="user_id" data-editable="true">User Name</th> -->
                                                <th data-field="coin_count" data-editable="true">Coin Count</th>
                                                <th data-field="price" data-editable="true">Coin Price</th>
                                                <th data-field="status" data-editable="true">Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp 
                                            @if (!empty($usercoin_lists))
                                                @foreach($usercoin_lists as $usercoin_list): 
                                            <tr>
                                                <td>{{$count}}</td>
                                              <!-- <td><?= $usercoin_list->name ?></td> -->
                                                <td>
                                                 <?= $usercoin_list->coin_count  ?>  
                                                </td>
                                                <td>
                                                 <?= $usercoin_list->price  ?>  
                                                </td>
                                                <td>
                                                        @if ( $usercoin_list->status === "pending")
                                                            <span class="mj_btn btn btn-warning">  <?= $usercoin_list->status  ?>  </span>
                                                        @elseif ($usercoin_list->status === "rejected")
                                                            <span class="mj_btn btn btn-danger"> <?= $usercoin_list->status ?>   </span>
                                                        @else
                                                            <span class="mj_btn btn btn-success"> <?= $usercoin_list->status ?>  </span>
                                                        @endif
                                                    </td>
                                                    
                                            </tr>
                                            @php $count +=1 @endphp 
                                          @endforeach
                                          @else
                                          @endif
                                       
                                        </tbody>
                                    </table>
                          </div>
                        </div>
                    </div>
                    <!--start -->
                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
                                        <td><label>Total Received Quotation</label></td>
                                        <td>{{ $quotations_received_count }}</td>
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
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
           <script  type="text/javascript">
              
           </script>
        @endsection