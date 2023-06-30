@extends((!empty(Session::get('login_company_id'))) ? 'layouts.company_panel' : 'layouts.user')
@section('content')
<div class="quotation-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="row">
                                 <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <h3 class="panel-title">Use Coin History In Quotation</h3>
                                </div>
                                 <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <a href="{{route('coinplan.index')}}" class="btn btn-default pull-right">Buy Coin</a>
                                </div>   
                            </div>
                        </div>
                          <div class="panel-body table-responsive">
                          <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="no">No</th>
                                                 <th data-field="received_user" data-editable="true">Receiver</th>
                                                <th data-field="range" data-editable="true">Project Money Range(MMK)</th>
                                                <th data-field="used_coin" data-editable="true">Used Coin</th>
                                                <th data-field="category" data-editable="true">Category</th>
                                                <th data-field="project_start_date" data-editable="true">Project Expected Start Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($use_coin_histories as $quotation):
                                            <tr>
                                                <td>{{$count }}</td>
                                                <td>
                                                  @foreach($quotation->received_users as $received_user)
                                                  <?php echo $received_user->received_user_name.','  ?> 
                                                  @endforeach  
                                                </td>
                                                <td><?= $quotation->minimum_price ?> ~ <?= $quotation->maximum_price ?></td>
                                                <td>
                                                 <?= $quotation->used_coin  ?>  
                                                </td>
                                                <td><?= $quotation->category_name ?></etd>
                                                <td>
                                                 <?= $quotation->project_expected_start_date  ?>  
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
        
         
           
@endsection