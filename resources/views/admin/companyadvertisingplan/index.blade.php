@extends('layouts.admin_panel')
@section('content')
         <!-- Static Table Start -->
        <div class="data-table-area  mg-t-10">
            <div class="container-fluid">
                <div class="row"> 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @include('admin.element.breadcrumb')
                    <div class="card">
                        @include('admin.element.success-message')
                                  <div class="card-header card-header-primary">
                                    <h4 class="card-title ">
                                      <div class="row">
                                         <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                            <h3 class="panel-title">Company Advertising Plan</h3>
                                        </div>
                                            
                                      </div>
                                    </h4>
                                  </div>
                <div class="card-body table-responsive">
                    <div class="row"> 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                   
                                    <table id="table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                               
                                                <th> Advertising Plan Name</th>
                                                <th> Periods (Days)</th>
                                                <th> Price</th>
                                                <th> Unit</th>
                                             
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($plans as $plan)
                                            <tr>
                                              
                                                <td><?= $count; ?></td>
                                                <td>
                                                    @php
                                                        $id = $plan->id;
                                                        $id = \Crypt::encrypt($id);
                                                        
                                                    @endphp
                                                    <a href="{{route('companyadvertisingplan.edit',$id)}}" >
                                                   <?= $plan->plan_name ?> </a></td>
                                                <td><?= $plan->periods ?></td>
                                                <td><?= number_format($plan->price) ?></td>
                                                <td><?= $plan->currency_unit->unit ?></td>
                                               
                                                
                                                
                                            </tr>
                                            @php $count +=1 @endphp
                                          @endforeach
                                           
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