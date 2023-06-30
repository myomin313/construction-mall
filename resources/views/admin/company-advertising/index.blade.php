@extends('layouts.admin_panel')
@section('content')

         <!-- Static Table Start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @include('admin.element.breadcrumb')
                        <div class="card">
                             @include('admin.element.success-message')
                            <div class="card-body search_form">
                                  <!-- start -->
                <div class="row">
                                   <div class="col-md-12">
                                        @php 
                                     if(isset($request->company_name))
                          $company_name = $request->company_name;
                      else
                          $company_name ="";
                          
                           if(isset($request->plan_id))
                          $plan_id = $request->plan_id;
                      else
                          $plan_id ="";
                          
                          if(isset($request->start_date))
                          $start_date = $request->start_date;
                      else
                          $start_date ="";
                          
                           if(isset($request->end_date))
                          $end_date = $request->end_date;
                      else
                          $end_date ="";
                          
                            if(isset($request->is_active))
                          $is_active =$request->is_active;
                      else
                          $is_active ="2";
                     
                @endphp
                                    <form class="form-inline" action="{{ route('companyadvertisinglist.index') }}" method="get">
                                          {{ csrf_field() }}
                                       <div class="form-group col-md-2 col-sm-6 col-xs-12">
                                          <label>Company Name :</label>
                                          <input  type="text" value="{{$company_name}}" class="form-control" name="company_name" placeholder="Eg. ABC Co.Ltd">
                                       </div>
                                      <div class="form-group col-md-2 col-sm-6 col-xs-12">
                                        <label>Plan Name :</label>
                                         <select class="form-control" name="plan_id">
                                             <option value="">Plan Name</option>
                                             @foreach($advertising_plans as $advertising_plan)
                                             <option value="{{ $advertising_plan->id }}" {{ ($advertising_plan->id  == old('plan_id',$plan_id))?'selected':'' }}>{{ $advertising_plan->plan_name}}</option>
                                             
                                             @endforeach
                                           </select>
                                      </div>
                                      <div class="form-group col-md-2 col-sm-6 col-xs-12">
                                        <label>Status :</label>
                                         <select class="form-control" name="is_active">
                                             <option value="" <?= ($is_active==2)?"selected":""?> >Status</option>
                                             <option value="1" <?= ($is_active==1)?"selected":""?> >Active</option>
                                             <option value="0" <?= ($is_active==0)?"selected":""?> >Inactive</option>
                                           </select>
                                      </div>
                                      <div class="form-group col-md-2 col-sm-6 col-xs-12">
                                        <label>Start Date :</label>
                                          <input  type="date" class="form-control" value="{{$start_date}}" name="start_date" placeholder="start date">
                                      </div>
                                      <div class="form-group col-md-2 col-sm-6 col-xs-12">
                                        <label>End Date :</label>
                                          <input type="date" class="form-control" value="{{$end_date}}" name="end_date" placehoder="end date">
                                      </div>
                                      <div class="form-group col-md-2 col-sm-6 col-xs-12 pull-right pt-2em">
                                           <button type="submit" class="btn btn-success">Search</button>
                                            <a  class="btn btn-reset" href="{{ route('companyadvertisinglist.index') }}">Reset</a>
                                      </div>
                                     
                                    </form> 
                            </div>
                        </div>
                    </div>
                </div>
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Company Advertising List</h3>
                    </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a  type="button" href="{{ route('companyadvertisinglist.create') }}"  class="btn btn-default pull-right">
                            <i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
 
                      </div>
                  </div>
                </h4>
              </div>
              <div class="card-body">
                                    <table class="table" id="table">
                                        <thead>
                                            <tr>
                                                <!--<th data-field="state" data-checkbox="true"></th>-->
                                                <th data-field="no">No</th>
                                                <th data-field="name"> Company Name</th>
                                                <th data-field="plan_name"> Plan Name</th>
                                                <th data-field="start_date"> Start Date</th>
                                                <th data-field="end_date" > End Date</th>
                                                <th data-field="created_at" >Created Date</th>
                                                <th data-field="updated_at" >Updated Date</th>
                                                <th data-field="is_active" > Status</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($advertising_lists as $advertising_list)
                                            
                                            <tr>
                                                
                                                 <td>{{ ($advertising_lists->currentPage()-1) * $advertising_lists->perPage() + $loop->index + 1 }}</td>
                                                <td><?= $advertising_list->name ?></td>
                                                <td><?= $advertising_list->plan_name ?></td>
                                                <td><?= $advertising_list->start_date ?></td>
                                                <td><?= $advertising_list->end_date ?></td>
                                                <td><?= $advertising_list->created_at ?></td>
                                                <td><?= $advertising_list->updated_at ?></td>
                                               <!--<td>
                                                @if($advertising_list->is_active == '1')
                                                  <span style="color:green">
                                                  <?php echo "active"; ?>
                                                </span>
                                                  @else
                                                  <span style="color:red">
                                                  <?php echo "unactive"; ?>
                                                  </span>
                                                @endif
                                                 <select id="<?= $advertising_list->id ?>" class="form-control status_change" name="is_active">
                                                      <option value="">change</option>
                                                      <option value="1">active</option>
                                                      <option value="0">unactive</option>
                                                     </select>
                                                 </td>-->
                                                <td>
                                                      <select id="{{$advertising_list->id}}" data-control="status" name="is_active" class="form-control status_change">
                                                       <option value="1" <?= ($advertising_list->is_active==1)?"selected":""?>>Active</option>
                                                        <option value="0" <?= ($advertising_list->is_active==0)?"selected":""?>>Inactive</option>
                                                        </select>
                                            </td>
                                                
                                            </tr>
                                            @php $count++; @endphp
                                         @endforeach 
                                        </tbody>
                                    </table>
                                    <div class="pull-right">
                                         {{ $advertising_lists->appends($data)->links() }}
                                    </div>
                                </div>
                            </div>
                       </div>
        
         <!-- Static Table End -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
           <script type="text/javascript">
             var page ='<?php echo $advertising_lists->currentPage() ?>';

            $(document).ready(function(){
                $('#table').on('change','.status_change',function(){ 
                        var is_active = $(this).val();
                        var id = $(this).attr('id');
                      /*  var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){*/
                            $.ajax({ 
                            url: "{{ URL::route('companyadvertisinglist.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"is_active":is_active},
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
                                 /*
                                alert(data.success);
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