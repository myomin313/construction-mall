@extends('layouts.user')
@section('content')

<div class="quotation-area mg-tb-30">
            <div class="container-fluid">
                <div class="row"> 
                  
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Coin History Lists</h3>
                          </div>
                          <div class="panel-body table-responsive">
                          <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="false" 
                          data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                          data-resizable="true" data-cookie="true"   data-cookie-id-table="saveId" data-show-export="false"
                           data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="no">No</th>
                                                <!-- <th data-field="user_id" data-editable="true">User Name</th> -->
                                                <th data-field="coin" data-editable="true">Total Coin</th>
                                                <th data-field="used_coin" data-editable="true">Used Coin</th>
                                                <th data-field="left_coin" data-editable="true">Left Coin</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($usercoinhistory_lists as $usercoinhistory_list):
                                            <tr>
                                               <td>{{ ($usercoinhistory_lists->currentPage()-1) * $usercoinhistory_lists->perPage() + $loop->index + 1 }}</td>
                                                <td><?= $usercoinhistory_list->coin ?></td>
                                                <td>
                                                 <?= $usercoinhistory_list->used_coin  ?>  
                                                </td>
                                                <td>
                                                 <?= $usercoinhistory_list->left_coin  ?>  
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
           <script  type="text/javascript">
                  var page ='<?php echo $usercoinhistory_lists->currentPage() ?>';
           </script>

@endsection