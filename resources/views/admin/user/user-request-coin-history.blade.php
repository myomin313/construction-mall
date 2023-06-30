@extends('layouts.admin_panel')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        @include('admin.element.breadcrumb')

          <div class="card">
               @include('admin.element.success-message')
            <div class="card-body search_form">
              <!--start-->
               @php
                         if(isset($name))
                          $name = $name;
                          else
                          $name ="";
                          
                          if(isset($status))
                          $status =$status;
                           else
                          $status ="";
                          
                          if(isset($ordered_date))
                          $ordered_date = $ordered_date;
                          else
                          $ordered_date ="";
                          
                        @endphp                                                  
              
              <form class="form-inline" action="{{ route('admin.coinplan.history',['role'=>$role]) }}" method="get">
                    {{csrf_field()}}
                 <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label>Name : </label>
                    <input type="text" class="form-control" name="name" placeholder="Eg. Aung Aung" value="{{ $name }}">
                 </div>
                <div class="form-group col-md-3 col-sm-6 col-xs-12">
                  <label>Status : </label>
                   <select class="form-control status" name="status">
                       <option value="">Status</option>
                       <option value="pending" <?= ($status=='pending')?"selected":""?>>pending</option>
                       <option value="approved" <?= ($status=='approved')?"selected":""?>>approved</option>
                       <option value="rejected" <?= ($status=='rejected')?"selected":""?>>rejected</option>
                     </select>
                </div>
                 <div class="form-group col-md-3 col-sm-6 col-xs-12">
                  <label>Ordered Date : </label>
                    <input type="date" class="form-control date_style" name="ordered_date" value="{{ $ordered_date }}">
                </div>
                <div class="form-group pull-right col-md-2 pt-2em col-sm-6 col-xs-12">
                   <button type="submit" class="btn btn-success">Search</button>
                    <a  class="btn btn-reset" href="{{ route('admin.coinplan.history',['role'=>$role]) }}">Reset</a>
                </div>
               
              </form>
              <!--end-->  
               </div>
            </div>
          </div>
        </div>
        <div class="row"> 
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">
                    <h3 class="panel-title">Coin History List</h3>
                  </h4>
                </div>
                <div class="card-body">                                    
                    <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                  data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                  <thead>
                                      <tr>
                                           <!--<th data-field="state" data-checkbox="true"></th>-->
                                          <th data-field="no">No</th>
                                          <th data-field="member_name">Member Name</th>
                                          <th data-field="coin_count" data-editable="true">Coin Count</th>

                                          <th data-field="price" data-editable="true">Price</th>
                                          <th data-field="status" data-editable="true">Status</th>
                                          <th data-field="order_date" data-editable="true">Ordered Date</th>
                                         
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @php $count=1; @endphp
                                      @foreach($coin_histories as $coinplan_list)
                                      <tr>
                                          <!--<td></td>-->
                                          <td>{{ ($coin_histories->currentPage()-1) * $coin_histories->perPage() + $loop->index + 1 }}</td>
                                          <td><?= $coinplan_list->name ?></td>
                                          <td><?= $coinplan_list->coin_count ?></td>
                                          <td>
                                           <?= $coinplan_list->price  ?>  
                                          </td>
                                          <td>
                                     
                                           <!--start-->
                                @if($coinplan_list->status == 'Approved')
                                   <?= $coinplan_list->status ?> 
                                  @else
                                       <select id="<?= $coinplan_list->id ?>" data-control="status" coin_count="<?= $coinplan_list->coin_count ?>"  user_id="<?= $coinplan_list->user_id ?>" class="form-control status_change" name="status">
                                        <option value="Pending"  <?= ($coinplan_list->status=='Pending')?"selected":""?>>Pending</option>
                                        <option value="Approved" <?= ($coinplan_list->status=='Approved')?"selected":""?>>Approved</option>
                                        <option value="Rejected" <?= ($coinplan_list->status=='Rejected')?"selected":""?>>Rejected</option>
                                       </select> 
                                  @endif
                                           
                                           <!--end-->
                                           
                                           
                                          </td>
                                          <td>
                                           <?= $coinplan_list->created_at  ?>  
                                          </td>
                                      </tr>
                                      @php $count +=1 @endphp
                                    @endforeach
                                     
                                  </tbody>
                              </table>
                              <div class="pull-right">
                                  {{ $coin_histories->appends($data)->links() }}
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
           <script type="text/javascript">
              var page ='<?php echo $coin_histories->currentPage() ?>';
            $(document).ready(function(){
               $('#table').on('change','.status_change',function(){ 
                        var status = $(this).val();
                        var id = $(this).attr('id');
                        var user_id=$(this).attr('user_id');
                        var coin_count =$(this).attr('coin_count');
                      /*  var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){*/
                            $.ajax({ 
                            url: "{{ URL::route('admin.request.coin.update') }}",
                            type: 'POST',
                            data: {'id' : id,"status":status,"coin_count":coin_count,"user_id":user_id},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                
                                $("[data-control='status']").prop('disabled', true);
                                
                                window.location.reload();
                                //  var message = data.success;
                                // var url = window.location.href;
                                //  callbackURL(message,url);
                             
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                      /*  }
                        else{
                            $(this).val(selectedvalue);
                            $(this).bind('focus');
                            return false;
                        }*/
                 });
             });
        </script>
@endsection