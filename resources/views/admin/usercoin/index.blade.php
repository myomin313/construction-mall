@extends('layouts.user')
@section('content')

<div class="quotation-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                 
                  
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">User Coin Lists</h3>
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
                                                <th data-field="coin_count" data-editable="true">Coin Count</th>
                                                <th data-field="price" data-editable="true">Coin Price</th>
                                                <th data-field="status" data-editable="true">Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp 
                                            @if (!empty($usercoin_lists))
                                                @foreach($usercoin_lists as $usercoin_list): 
                                            <tr>
                                                <td>{{ ($usercoin_lists->currentPage()-1) * $usercoin_lists->perPage() + $loop->index + 1 }}</td>
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
                                                    <td>
                                                    @if ( $usercoin_list->status === "pending")
                                                    <a href="{{route('usercoin.delete',$usercoin_list->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash" onClick="return confirm('Are you sure to delete?')" aria-hidden="true"></i>
                                                    </a>
                                                       
                                                        @else
                                                    
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
                </div>
            </div>
        </div>
        
        
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
           <script  type="text/javascript">
                  var page ='<?php echo $usercoin_lists->currentPage() ?>';
           </script>

@endsection