@extends('layouts.admin_panel')
@section('content')
<div class="quotation-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="row">
                                 <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <h3 class="panel-title">Ordered Coin History</h3>
                                </div>
                                 <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <a href="{{route('coinplan.index')}}" class="btn btn-default pull-right">Buy Coin</a>
                                </div>   
                            </div>
                        </div>
                          <div class="panel-body table-responsive">
                          <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="no">No</th>
                                                <th data-field="coin_count" data-editable="true">Coin Count</th>
                                                <th data-field="price" data-editable="true">Price</th>
                                                <th data-field="status" data-editable="true">Status</th>
                                                <th data-field="order_date" data-editable="true">Ordered Date</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($coin_histories->coin_plan as $coinplan_list):
                                            <tr>
                                                <td>{{ ($coin_histories->currentPage()-1) * $coin_histories->perPage() + $loop->index + 1 }}</td>
                                                <td><?= $coinplan_list->coin_count ?></td>
                                                <td>
                                                 <?= $coinplan_list->price  ?>  
                                                </td>
                                                <td><?= $coinplan_list->pivot->status ?></td>
                                                <td>
                                                 <?= $coinplan_list->pivot->created_at  ?>  
                                                </td>
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
        
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
          <script type="text/javascript">
             var page ='<?php echo $coin_histories->currentPage() ?>';
          </script> 
        
@endsection