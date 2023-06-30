@extends('layouts.admin_panel')
@section('content')
         <!-- Static Table Start -->
            <div class="container-fluid">
                @include('admin.element.breadcrumb')
                <div class="card">
                     @include('admin.element.success-message')
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title"> Freelancer Status List</h3>
                    </div>
                      
                  </div>
                </h4>
              </div>
                <div class="card-body">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                               <!-- <th data-field="state" data-checkbox="true"></th>-->
                                                <th data-field="no">No</th>
                                               
                                                <th data-field="freelancer_status_name" data-editable="true"> Freelancer Status Name</th>
                                                
                                                <th data-field="is_active" data-editable="true"> Status</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($statuses as $status)
                                            <tr>
                                             
                                                 <td>{{ ($statuses->currentPage()-1) * $statuses->perPage() + $loop->index + 1 }}</td>
                                                <td><?= $status->freelancer_status_name ?></td>
                                                
                                                <!--<td>
                                                @if($status->is_active == '1')
                                               <span style="color:green">
                                                  <?php echo "active"; ?>
                                                </span> 
                                                @else
                                                 <span style="color:red">
                                                 <?php echo "unactive"; ?>
                                               </span>
                                                @endif
                                                  <select id="<?= $status->id ?>" class="form-control status_change" name="is_active">
                                                      <option value="">change</option>
                                                      <option value="1">active</option>
                                                      <option value="0">unactive</option>
                                                     </select>
                                                 </td>-->
                                                 
                                    <td>
                                        <select id="{{$status->id}}" data-control="status" name="is_active" class="form-control status_change">
                                        <option value="1" <?= ($status->is_active==1)?"selected":""?>>Active</option>
                                        <option value="0" <?= ($status->is_active==0)?"selected":""?>>Inactive</option>
                                                </select>
                                        </td>
                                                
                                                
                                            </tr>
                                            @php $count +=1 @endphp
                                          @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
               
        <!-- Static Table End -->
        <!-- Static Table End -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
     var page ='<?php echo $statuses->currentPage() ?>';
            $(document).ready(function(){
               
               /* $('#table').on('change','.status_change',function(){  
                        var is_active = $(this).val();
                        var id = $(this).attr('id');
                        var conf = confirm('Are you sure want to change Status?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('admin.freelancer_status.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"is_active":is_active},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){  
                                alert(data.success); 
                                location.reload();
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                        }
                        else{
                            $(this).val(selectedvalue);
                            $(this).bind('focus');
                            return false;
                        }
                 }); */
                 
                 $('#table').on('change','.status_change',function(){  
                        var is_active = $(this).val();
                        var id = $(this).attr('id');
                            $.ajax({ 
                            url: "{{ URL::route('admin.freelancer_status.updatestatus') }}",
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
                                 
                                /*alert(data.success);
                                location.reload();*/
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                 });
             });
        </script>
       
       
@endsection