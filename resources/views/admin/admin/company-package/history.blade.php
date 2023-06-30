@extends('layouts.admin_panel')
@section('content')
    <div class="container-fluid">
              <div class="row">
                  @include('admin.element.breadcrumb')
                  @include('admin.element.success-message')
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                      <div class="card-body search_form">
                                 @php 
                                     if(isset($name))
                          $name = $name;
                      else
                          $name ="";
                          
                            if(isset($received_user))
                          $received_user =$received_user;
                      else
                          $received_user ="";
                          
                             if(isset($start_date))
                          $start_date = $start_date;
                      else
                          $start_date ="";
                          
                             if(isset($end_date))
                          $end_date = $end_date;
                      else
                          $end_date ="";
                          
                            if(isset($is_active))
                             $is_active =$is_active;
                           else
                          $is_active ="2";
                     
                     
                @endphp
                               <!--start-->
                                    <form class="form-inline" action="{{ url('admin/company/package') }}" method="get">
                                          {{csrf_field()}}
                                       <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                          <label>Company Name :</label>
                                          <input value="{{$name}}" type="text" class="form-control" name="company_name" placeholder="Eg. ABC Co.,Ltd">
                                       </div>
                                      <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <label>Status :</label>
                                         <select class="form-control" name="is_active">
                                             <option value="" <?= ($is_active==2)?"selected":""?>>Status</option>
                                             <option value="1" <?= ($is_active==1)?"selected":""?>>Active</option>
                                             <option value="0" <?= ($is_active==0)?"selected":""?>>Unactive</option>
                                             
                                              <option value="3" <?= ($is_active==3)?"selected":""?>>Expired</option>
                                           </select>
                                      </div>
                                      <div class="form-group col-md-2 col-sm-6 col-xs-12">
                                        <label>Start Date:</label>
                                          <input value="{{$start_date}}" type="date" class="form-control pt-0" name="start_date" placeholder="start date">
                                      </div>
                                      <div class="form-group col-md-2 col-sm-6 col-xs-12">
                                        <label>End Date:</label>
                                          <input value="{{$end_date}}" type="date" class="form-control pt-0" name="end_date" placehoder="end date">
                                      </div>
                                      <div class="form-group pt-2em pull-right col-md-2 col-sm-12 col-xs-12">
                                        <button type="submit" class="btn btn-success">Search</button>
                                      <a  class="btn btn-reset" href="{{ url('admin/company/package') }}">Reset</a>
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
                              <h3 class="panel-title">Package History List</h3>
                            </h4>
                          </div>
                          <div class="card-body">
                            <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="false" 
                            data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                            data-resizable="true" data-cookie="true"   data-cookie-id-table="saveId" data-show-export="false"
                             data-click-to-select="true" data-toolbar="#toolbar">
                                          <thead>
                                              <tr>
                                                  <th data-field="no">No</th>
                                                  <th data-field="company_name">Company Name</th>
                                                  <th data-field="package_plan" data-editable="true">Package Plan</th>
                                                   <th data-field="created_at" data-editable="true">Requested Date </th>
                                                  <th data-field="status" data-editable="true">Status</th>
                                                  <th data-field="approve" data-editable="true">Approve Status</th>
                                                  <th style="width:20px;" data-field="start_date" data-editable="true">Start Date</th>
                                                  <th data-field="end_date" data-editable="true">End Date</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                          @php $count=1;@endphp
                                          @foreach($company_package_plans as $company_package)
                                              <tr>
                                                  <td>{{ ($company_package_plans->currentPage()-1) * $company_package_plans->perPage() + $loop->index + 1 }}</td>
                                                  <td>
                                                      <a class="show-modal" data-id="{{$company_package->id}}" data-name="{{ $company_package->company_name }}" data-email="{{$company_package->email}}"
                                                data-phone="{{ $company_package->phone }}"
                                                data-id="{{ $company_package->id }}"> <?= $company_package->company_name    ?></a>
                                                      
                                                     </td>
                                                  <td><?= $company_package->packageplan_name ?></td>
                                                  <td><?= $company_package->created_at ?></td>
                                                  <td>
                                                     
                                                      <!--<?= ($company_package->is_active =='1')?'<span class="badge" style="background:green">Active</span>':'<span class="badge" style="background:red">Unactive</span>' ?>-->
                                                      
                                                 <?php 
                                                 if($company_package->is_active== '1' && $company_package->end_date > 
                                                 date('Y-m-d')){
                                               
                                                 echo '<span class="badge" style="background:green">Active</span>';
                                                 
                                                 }else if($company_package->is_active== '1' && $company_package->end_date < date('Y-m-d')){
                                                     
                                                      echo '<span class="badge" style="background:red">Expired</span>';
                                                      
                                                 }else if($company_package->is_active== '0'){
                                                     
                                                   echo '<span class="badge" style="background:black">Unactive</span>'; 
                                                   
                                                 }
                                                  ?>
                                                  </td>
                                                  <td><!--<?= $company_package->approve ?><br>-->
                                                  @if( $company_package->approve != 'Success' && $company_package->approve = 'Cancel' && $company_package->approve != 'Pending')
                                                   <select id="<?= $company_package->id ?>"  data-control="status" company_id="<?= $company_package->company_id ?>"
                                          package_plan_id="<?= $company_package->package_plan_id ?>"class="form-control approve" name="approve">
                                              <option value="Cancel">Cancel</option>
                                              <!--<option value="Pending">Pending</option>-->
                                              <option value="Success">Success</option>
                                                       </select>
                                                   @elseif( $company_package->approve != 'Success'  && $company_package->approve = 'Pending')    
                                                   <select id="<?= $company_package->id ?>"  data-control="status" company_id="<?= $company_package->company_id ?>"
                                          package_plan_id="<?= $company_package->package_plan_id ?>"class="form-control approve" name="approve">
                                              
                                              <option value="Pending">Pending</option>
                                              <option value="Success">Success</option>
                                              <option value="Cancel">Cancel</option>
                                                       </select>
                                                  @elseif( $company_package->approve = 'Success'  && $company_package->approve != 'Pending'  && $company_package->approve != 'Cancel')    
                                                   <select id="<?= $company_package->id ?>"  data-control="status"   company_id="<?= $company_package->company_id ?>"
                                          package_plan_id="<?= $company_package->package_plan_id ?>"class="form-control approve" name="approve">
                                              <option value="Success">Success</option>
                                              <option value="Cancel">Cancel</option>
                                                       </select>     
                                                       @endif
                                                 
                                                  </td>
                                                   <td><?= $company_package->start_date ?>
                                                  </td>
                                                   <td><?= $company_package->end_date ?>
                                                  </td>
                                              </tr>
                                              @php $count++; @endphp
                                          @endforeach
                                          </tbody>
                                      </table>
                                    <div class="pull-right">
                                        {{ $company_package_plans->appends($data)->links() }}
                                    </div>
                          </div>
                        </div>
                    </div>
                </div>
              </div>

      
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
                                
                                
                               
                            </tbody>
                           </table>   
                       </div>
                   </div>
                  </div>
                </div>
      </div>
      
<!--quotation upload-modal end--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
     var page ='<?php echo $company_package_plans->currentPage() ?>';
            $(document).ready(function(){
               $('#table').on('change','.approve',function(){
                        var approve = $(this).val();
                        var id = $(this).attr('id');
                        var company_id=$(this).attr('company_id');
                        var package_plan_id=$(this).attr('package_plan_id');  
                             $.ajax({ 
                             url: "{{ URL::route('admin.packageplan.updateapprove') }}",
                             type: 'POST',
                             data: {'id' : id,"approve":approve,'company_id':company_id,'active_package_plan_id':package_plan_id},
                             dataType: 'json',
                             headers: {
                                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             },
                             success: function(data){ 
                                 
                                   $("[data-control='status']").prop('disabled', true);
                                   window.location.reload();
                             },
                             error:function(e)
                             {
                                 console.log(e);
                             }
                             });
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
<!--        <script type="text/javascript">-->
<!--                    $(document).ready(function(){-->
<!--                $('#table').on('click','.editBtn',function(){-->
<!--                   var id=$(this).attr('id');-->
<!--                   $('#company_package_id').val(id);-->
<!--                   $('#approveupdateModal').modal({show:true});-->
    
<!--              });-->
<!--});-->
<!--            </script>-->
@endsection