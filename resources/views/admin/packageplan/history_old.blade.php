@extends('layouts.company_panel')
@section('content')
<div class="quotation-area mg-tb-30">
            <div class="container-fluid">
                <div class="row"> 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="row">
                             <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <h3 class="panel-title">Ordered Package History</h3>
                            </div>
                             <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <a href="{{route('package.index')}}" class="btn btn-default pull-right">Buy Package</a>
                            </div>   
                            </div>
                          </div>
                          <div class="panel-body table-responsive">
                          <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="true" 
                          data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                          data-resizable="true" data-cookie="true"   data-cookie-id-table="saveId" data-show-export="true"
                           data-click-to-select="true" data-toolbar="#toolbar">
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
                                                <td><?= ($company_package->pivot->is_active =='1')?'<span class="badge" style="background:green">Active</span>':'<span class="badge" style="background:red">Unactive</span>' ?>
                                                </td>
                                                <td><?= $company_package->pivot->approve ?>
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
           
           /* Show Event  */
            $(document).on('click', '.show-modal', function() {   
                    $('.modal-title').text('Request Package');
                    $('#showModal').modal('show');
                });
            $('form#packagePlanForm').on('submit',function(e){

               e.preventDefault();
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('package.store') }}",
                     data: $('#packagePlanForm').serialize(),
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success:function(data)
                     {
                         if($.isEmptyObject(data.errors)){
 var message = data.success;
                                var url = window.location.href;
                                 callbackURL(message,url);
                         }
                         else{
                            $("#error").html(data.errors);
                         } 
                      },
                     error:function(e)
                     {
                        console.log(e);
                     }
                   });
                });
            </script>
@endsection