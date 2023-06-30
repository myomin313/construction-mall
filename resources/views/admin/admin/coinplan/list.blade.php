@extends('layouts.admin_panel')
@section('content')
<div class="data-table-area  mg-t-10">
            <div class="container-fluid">
           @include('admin.element.breadcrumb')
          <div class="card">
                @include('admin.element.success-message')
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Coin Plan List</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <a  type="button" href="{{ route('coinplan.new') }}"  class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a> 
                    </div>
                  </div>
                </h4>
              </div>
              
              <div class="card-body table-responsive">
                <table id="table" class="table table-bordered">
                              <thead>
                                  <tr>
                                    
                                      <th>No</th>
                                      <th>Coin Count</th>
                                      <th>Price</th>
                                      <th>Unit</th>
                                      <th>Creator</th>
                                      <th>Updator</th>
                                      <th>Created Date</th>
                                      <th>Updated Date</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @php $count=1; @endphp
                                  @foreach($coinplan_lists as $coinplan_list)
                                  <tr>
                                     
                                    <!--  <td><?= $count; ?></td>-->
                                     <td>{{ ($coinplan_lists->currentPage()-1) * $coinplan_lists->perPage() + $loop->index + 1 }}</td>
                                      <td><?= number_format($coinplan_list->coin_count) ?></td>
                                      <td>
                                       <?= number_format($coinplan_list->price)  ?>  
                                      </td>
                                      <td><?= $coinplan_list->unit ?></td>
                                      <td>
                                       <?= $coinplan_list->creator  ?>  
                                      </td>
                                      <td>
                                       <?= $coinplan_list->updator  ?>  
                                      </td>
                                      <td>
                                       <?= $coinplan_list->created_at  ?>  
                                      </td>
                                      <td>
                                       <?= $coinplan_list->updated_at  ?>  
                                      </td>
                                        <!--<td>
                                         @if($coinplan_list->is_active == '1')
                                        <span style="color:green">
                                          <?php echo "active"; ?>
                                        </span> 
                                        @else
                                        <span style="color:red">
                                          <?php echo "unactive"; ?>
                                        </span>
                                        @endif
                                                  <select id="<?= $coinplan_list->id ?>" class="form-control status_change" name="is_active">
                                                      <option value="">change</option>
                                                      <option value="1">active</option>
                                                      <option value="0">unactive</option>
                                                     </select>
                                      </td>-->
                                      
                                      <td>
                                            <select id="{{$coinplan_list->id}}" data-control="status" name="is_active" class="form-control status_change">
                                            <option value="1" <?= ($coinplan_list->is_active==1)?"selected":""?>>Active</option>
                                         <option value="0" <?= ($coinplan_list->is_active==0)?"selected":""?>>Inactive</option>
                                        </select>
                                    </td>
                                        <td>
                                            @php
                                            $id = $coinplan_list->id;
                                            $id = \Crypt::encrypt($id);
                                            $page = $coinplan_lists->currentPage();
                                            $page =\Crypt::encrypt($page);
                                            @endphp
                                            <a href="{{ url('/coinplans/edit/'.$id.'/'.$page)}}" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a></td>
                                  @php $count +=1 @endphp
                                @endforeach
                                 </tr>
                              </tbody>
                          </table>
                          {{ $coinplan_lists->links() }}
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script  type="text/javascript">
         var page ='<?php echo $coinplan_lists->currentPage() ?>';
          $(document).ready(function (){
            $('.search input').css({"width": "50%", "height": "100%","float":"right"});
             $('.search').append('<div style="float:left;width:50%;height:100%;text-align:center"><a  type="button" href="{{ route('coinplan.new') }}"  class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a></div>');  
          });
     </script>
  <script type="text/javascript">
  
            $(document).ready(function(){
               
              $('#table').on('change','.status_change',function(){
                        var is_active = $(this).val();
                        var id = $(this).attr('id');
                       /* var conf = confirm('Are you sure want to change Status?'); 
                        if(conf == true){*/
                            $.ajax({ 
                            url: "{{ URL::route('admin.coinplan.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"is_active":is_active},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                            
                             $("[data-control='status']").prop('disabled', true);
                             
                               window.location.reload();
                             // var message = data.success;
                              //  var url = window.location.href;
                               //  callbackURL(message,url);
                                 
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
        </script>
    

@endsection