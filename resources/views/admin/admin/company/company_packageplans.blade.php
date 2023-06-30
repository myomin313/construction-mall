@extends('layouts.admin_panel')
@section('content')
 @php
     $id =  \Crypt::encrypt($company->id);
 @endphp
<div class="quotation-area mg-tb-30">
            <div class="container-fluid">
                <div class="row"> 
                @include('admin.element.breadcrumb')
                 @include('admin.element.success-message')
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                          <div class="card-header card-header-primary">
                            <h4 class="card-title ">
                              <div class="row">
                                 <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <h3 class="panel-title">{{ $company->user->name }} Company Ordered Package History</h3>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <a href="{{ url('/admin/company/buy-package/'.$id)}}" class="btn btn-default pull-right">Buy Package</a>
                                </div>  
                            </div>
                        </h4>
                          </div>

                          <div class="card-body table-responsive">
                          <table id="table" class="table table-bordered table-stripe">
                                        <thead>
                                            <tr>
                                                <th data-field="no">No</th>
                                                <th data-field="package_plan" data-editable="true">Package Plan</th>
                                                <th data-field="status" data-editable="true">Status</th>
                                                <th data-field="approve" data-editable="true">Approve Status</th>
                                                <th style="width:20px;" data-field="start_date" data-editable="true">Start Date</th>
                                                <th data-field="end_date" data-editable="true">End Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $count=1;@endphp
                                        @foreach($company_package_plans->package_plan as $company_package)
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td><?= $company_package->name ?></td>
                                                <td>
                                                    <!--<?= ($company_package->pivot->is_active =='1')?'<span class="badge" style="background:green">Active</span>':'<span class="badge" style="background:red">Unactive</span>' ?>-->
                                                
                                                <?php 
                                                 if($company_package->pivot->is_active== '1' && $company_package->pivot->end_date > 
                                                 date('Y-m-d')){
                                               
                                                 echo '<span class="badge" style="background:green">Active</span>';
                                                 
                                                 }else if($company_package->pivot->is_active== '1' && $company_package->pivot->end_date < date('Y-m-d')){
                                                     
                                                      echo '<span class="badge" style="background:red">Expired</span>';
                                                      
                                                 }else if($company_package->pivot->is_active== '0'){
                                                     
                                                   echo '<span class="badge" style="background:black">Unactive</span>'; 
                                                   
                                                 }
                                                  ?>
                                                  
                                                </td>
                                                <td><!--<?= $company_package->pivot->approve ?>-->
                                                <!--<br>-->
                                        <!--         <select id="<?= $company_package->pivot->id ?>" company_id="<?= $company_package->pivot->company_id ?>"-->
                                        <!--package_plan_id="<?= $company_package->pivot->package_plan_id ?>"class="form-control approve" name="approve">-->
                                        <!--    <option value="Pending">Pending</option>-->
                                        <!--     <option value="Cancel">Cancel</option>-->
                                        <!--    <option value="Success">Success</option>-->
                                        <!--             </select>-->
                                                     
                                                     @if( $company_package->pivot->approve != 'Success' && $company_package->pivot->approve = 'Cancel' && $company_package->pivot->approve != 'Pending')
                                                   <select id="<?= $company_package->pivot->id ?>"  data-control="status" company_id="<?= $company_package->pivot->company_id ?>"
                                          package_plan_id="<?= $company_package->pivot->package_plan_id ?>"class="form-control approve" name="approve">
                                              <option value="Cancel">Cancel</option>
                                              <!--<option value="Pending">Pending</option>-->
                                              <option value="Success">Success</option>
                                                       </select>
                                                   @elseif( $company_package->pivot->approve != 'Success'  && $company_package->pivot->approve = 'Pending')    
                                                   <select id="<?= $company_package->pivot->id ?>"  data-control="status" company_id="<?= $company_package->pivot->company_id ?>"
                                          package_plan_id="<?= $company_package->pivot->package_plan_id ?>"class="form-control approve" name="approve">
                                              
                                              <option value="Pending">Pending</option>
                                              <option value="Success">Success</option>
                                              <option value="Cancel">Cancel</option>
                                                       </select>
                                                  @elseif( $company_package->pivot->approve = 'Success'  && $company_package->pivot->approve != 'Pending'  && $company_package->pivot->approve != 'Cancel')    
                                                   <select id="<?= $company_package->pivot->id ?>"  data-control="status"   company_id="<?= $company_package->pivot->company_id ?>"
                                          package_plan_id="<?= $company_package->pivot->package_plan_id ?>" class="form-control approve" name="approve">
                                              <option value="Success">Success</option>
                                              <option value="Cancel">Cancel</option>
                                                       </select>     
                                                       @endif
                                                       
                                                </td>
                                                 <td><?= $company_package->pivot->start_date ?>
                                                </td>
                                                 <td><?= $company_package->pivot->end_date ?>
                                                </td>
                                            </tr>
                                            @php $count++; @endphp
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

         <!--image upload-modal start-->
      <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="showModal">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                   <center><h4 class="modal-title"></h4></center>
                    <p id="error" style="color:red"></p>
                    <form id="packagePlanForm" class="form login-form">
                        <fieldset>
                            <div class="form-group">
                               <select name="package_plan" id="package_plan" class="form-control">
                                <option disabled="disabled" selected="selected">Choose Package :</option>
                                @foreach($package_plans as $package_plan)
                                   <option value="<?= $package_plan->id ?>"><?= $package_plan->name ?></option>
                                @endforeach
                               </select>
                            </div>   
                            <center><button class="btn btn-primary" type="submit">Send</button></center>
                        </fieldset>
                     </form>
                  </div>
                </div>
      </div>
<!--quotation upload-modal end--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
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
                                 window.location.reload();
                                //   var message = data.success;
                                // var url = window.location.href;
                                //  callbackURL(message,url);
                                 
                                /* alert(data.success);
                                 location.reload();*/
                             },
                             error:function(e)
                             {
                                 console.log(e);
                             }
                             });
                        //  else{
                        //      $(this).val(selectedvalue);
                        //      $(this).bind('focus');
                        //      return false;
                        //  }
                 });
             });
        </script>
@endsection