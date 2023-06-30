@extends('layouts.admin_panel')
@section('content')

<div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
      <div class="card">
        <div class="card-body search_form">
                      @php 
                      if(isset($name))
                          $name = $name;
                      else
                          $name ="";
                          
                            if(isset($status))
                          $status =$status;
                      else
                          $status ="0";
                          
                           if(isset($ordered_date))
                          $ordered_date =$ordered_date;
                      else
                          $ordered_date ="";
                     
                @endphp
         <!--start-->
            <form class="form-inline" action="{{ route('admin.company.request.coin') }}" method="post">
                  {{csrf_field()}}
               <div class="form-group col-md-4 col-sm-6 col-xs-12">
                  <label class="">Company Name :</label>
                  <input value="{{$name}}" type="text" class="form-control" name="name" placeholder="Eg. ABC Co.,Ltd">
               </div>
              <div class="form-group col-md-3 col-sm-6 col-xs-12">
                <label>Status : </label>
                 <select class="form-control status" name="status">
                     <option value=""<?= ($status==0)?"selected":""?>>Status</option>
                     <option value="pending"<?= ($status=="pending")?"selected":""?>>Pending</option>
                     <option value="approved"<?= ($status=="approved")?"selected":""?>>Approved</option>
                     <option value="rejected"<?= ($status=="rejected")?"selected":""?>>Rejected</option>
                   </select>
              </div>
              <div class="form-group col-md-3 col-sm-6 col-xs-12">
                <label>Ordered Date : </label>
                  <input value="{{$ordered_date}}" type="date" class="form-control date_style" name="ordered_date">
              </div>
              <div class="form-group col-md-2 col-sm-6 col-xs-12 pt-2em">
                 <button type="submit" class="btn btn-success">Search</button>
              <a  class="btn btn-reset" href="{{ route('admin.company.request.coin') }}">Reset</a>
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
            <h4 class="card-title">Coin History List</h4>
          </div>
          <div class="card-body">
            <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                          data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                          <thead>
                              <tr>
                                  <th data-field="no">No</th>
                                  <th data-field="company_name">Company Name</th>
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
                                 <!-- <td><?= $count; ?></td>-->
                                  <td>{{ ($coin_histories->currentPage()-1) * $coin_histories->perPage() + $loop->index + 1 }}</td>
                                  <td>
                                      <a class="show-modal" data-id="{{$coinplan_list->id}}" data-name="{{$coinplan_list->name}}" data-email="{{$coinplan_list->email}}"
                                
                                data-phone="{{ $coinplan_list->phone }}"
                                data-created_at="{{$coinplan_list->created_at}}" data-updated_at="{{$coinplan_list->updated_at}}"
                                data-id="{{ $coinplan_list->id }}"><?= $coinplan_list->name ?></a>
                                      
                                  </td>
                                  <td><?= $coinplan_list->coin_count ?></td>
                                  <td>
                                   <?= $coinplan_list->price  ?>  
                                  </td>
                                  <td> 
                                  @if($coinplan_list->status == 'Approved')
                                   <?= $coinplan_list->status ?> 
                                  @else
                                       <select id="<?= $coinplan_list->id ?>" data-control="status" coin_count="<?= $coinplan_list->coin_count ?>"  user_id="<?= $coinplan_list->user_id ?>" class="form-control status_change" name="status">
                                        <option value="Pending"  <?= ($coinplan_list->status=='Pending')?"selected":""?>>Pending</option>
                                        <option value="Approved" <?= ($coinplan_list->status=='Approved')?"selected":""?>>Approved</option>
                                        <option value="Rejected" <?= ($coinplan_list->status=='Rejected')?"selected":""?>>Rejected</option>
                                       </select> 
                                  @endif
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
         <!--image upload-modal start-->
      <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="showModal">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                   <center><h4 class="modal-title"></h4></center>
                   <div class="row">
                       <div class="col-md-offset-1 col-md-10">
                         <table class="table table-hover no-border" >
                            <tbody>
                                
                                <tr>
                                    <td>Name</td>
                                    <td>
                                         <div id="name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                         <div id="email">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>
                                         <div id="phone">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ordered Date</td>
                                    <td>
                                         <div id="created_at">
                                        </div>
                                    </td>
                                </tr>
                                
                               
                            </tbody>
                           </table>   
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
                       /* var conf = confirm('Are you sure want to change status?'); 
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
                                var message = data.success;
                                var url = window.location.href;
                                 callbackURL(message,url);
                                 
                             /* alert(data.success);
                                location.reload();*/
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                       /* }
                        else{
                            $(this).val(selectedvalue);
                            $(this).bind('focus');
                            return false;
                        }*/
                 });
             });
             
             $(document).on('click', '.show-modal', function() {   
                    $('.modal-title').text('Detail Information');
                    $('#name').html($(this).data('name'));
                    $('#email').html($(this).data('email'));
                    $('#phone').html($(this).data('phone'));
                    $('#created_at').html($(this).data('created_at'));
                    $('#updated_at').html($(this).data('updated_at'));
                    $('#showModal').modal('show');
                });
        </script>
        
@endsection