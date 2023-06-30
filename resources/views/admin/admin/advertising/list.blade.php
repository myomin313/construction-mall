@extends('layouts.admin_panel')
@section('content')
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            @include('admin.element.breadcrumb')
            <div class="card">
                
                @php 
                                     if(isset($name))
                          $name = $name;
                      else
                          $name ="";
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
                   
                                <div class="card-body search_form">
                                    <form class="form-inline" action="{{ route('admin.advertising.list') }}" method="get">
                                          {{csrf_field()}}
                                       <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                          <label>Company Name</label>
                                          <input value="{{$name}}" type="text" class="form-control" name="company_name" placeholder="Company name">
                                       </div>
                                      <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <label>Status</label>
                                         <select class="form-control" name="is_active">
                                             <option value="" <?= ($is_active==2)?"selected":""?>>Status</option>
                                             <option value="1" <?= ($is_active==1)?"selected":""?>>Active</option>
                                             <option value="0" <?= ($is_active==0)?"selected":""?>>Inactive</option>
                                           </select>
                                      </div>
                                      <div class="form-group col-md-2 col-sm-6 col-xs-12">
                                        <label>Start Date</label>
                                          <input value="{{$start_date}}" type="date" class="form-control" name="start_date" placeholder="start date">
                                      </div>
                                      <div class="form-group col-md-2 col-sm-6 col-xs-12">
                                        <label>End Date</label>
                                          <input value="{{$end_date}}" type="date" class="form-control" name="end_date" placehoder="end date">
                                      </div>
                                      <div class="form-group pt-2em pull-right col-md-2 col-sm-6 col-xs-12">
                                      <button type="submit" class="btn btn-success">Search</button>
                                      <a  class="btn btn-reset" href="{{ route('admin.advertising.list') }}">Reset</a>
                                      </div>
                                    </form> 
                                 
                                </div>
                              </div>
                             </div>
                            </div>
                                


<!--<div class="quotation-area mg-tb-30">-->
            <div class="row">
          <div class="col-md-12">
               <div class="card">
                   @include('admin.element.success-message')
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Advertising List</h3>
                    </div>
                    
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                  <a  type="button" href="{{ route('admin.advertising.new') }}"  class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a> 
                                 </div>
                       
                  </div>
                </h4>
              </div>
               <div class="card-body"> 
               
               
                                  <div class="row" style="padding:10px">
                                    <div class="col-md-12">
                                       <a  type="button" class="btn btn-danger deleteitemall"> <i class="fa fa-trash" aria-hidden="true"></i> Delete All</a>  
                                       <!--<a  type="button" href="{{ route('admin.advertising.new') }}"  class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>-->
                                    </div>
                                   </div>
                  
                                

                          <table id="table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                 <th data-field="state"><input type="checkbox" name="category_id" id="checkall"></th>
                                                <th data-field="no">No</th>
                                                <th data-field="company_name" data-editable="true">Company Name</th>
                                                <th data-field="photo" data-editable="true">Photo</th>
                                                <th  data-field="plan_name" data-editable="true">Plan Name</th>  
                                                <th data-field="link" data-editable="true">Link</th>
                                                <th data-field="start_date" data-editable="true">Start Date</th>
                                                <th data-field="end_date" data-editable="true">End Date</th>
                                                <th data-field="is_active" data-editable="true">Status</th>
                                              <!--   <th data-field="received_status" data-editable="true">Received Status</th>
                                                <th data-field="requested_status" data-editable="true">Request Status</th>
                                                <th data-field="created_at" data-editable="true">Received Date</th> -->
                                              
                                                <th data-field="Phone" data-editable="true">phone</th>
                                                <th data-field="Priority" data-editable="true">priority</th>
                                               <!-- <th data-field="Action" data-editable="true">Action</th>-->
                                                <!--<th>View</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1;@endphp
                                          @foreach($advertisings as $advertising)
                                            <tr>
                                                <td><input class="checkbox" name="advertisingid" type="checkbox" data-id="{{ $advertising->id }}" value="{{ $advertising->id }}"/></td>
                                                
                                              <td>{{ ($advertisings->currentPage()-1) * $advertisings->perPage() + $loop->index + 1 }}</td>
                                                <td>
                                                    @php
                                    $id = $advertising->id;
                                    $id = \Crypt::encrypt($id);
                                    $page = $advertisings->currentPage();
                                    $page =\Crypt::encrypt($page);
                                @endphp
                                                    <a  class="show-modal"
                                                    data-plan_name="{{$advertising->plan_name}}" 
                                                    data-photo="{{$advertising->photo}}" 
                                                    data-link="{{ $advertising->link }}"
                                                    data-start_date="{{$advertising->start_date}}"
                                                    data-end_date="{{$advertising->end_date}}"
                                                    data-is_active="{{$advertising->is_active }}"
                                                    data-created_by="{{ $advertising->creater}}"
                                                    data-updated_by = "{{$advertising->updater}}"
                                                    data-company_name="{{$advertising->company_name}}"
                                                    data-address="{{ $advertising->address}}"
                                                    data-phone="{{ $advertising->phone }}"
                                                    data-email="{{ $advertising->email }}"
                                                    data-priority="{{ $advertising->priority }}"
                                                    data-created_at="{{ $advertising->created_at }}"
                                                    data-updated_at="{{ $advertising->updated_at }}"
                                                    data-id="{{ $advertising->id }}"
                                                    data-url="{{ url('admin/advertising/edit/'.$id.'/'.$page) }}">{{ $advertising->company_name }}</a></td>
                                                <td>
                                                    @if($advertising->photo != null && $advertising->photo !='undefined')
                                                    <img src="{{ asset('storage/advertising/'.$advertising->photo) }}" alt="" title="" style="width:50px;height:50px">
                                                    @endif
                                                    </td>
                                                <td>{{ $advertising->plan_name}}</td>  
                                                
                                                 <td>
                                                 <a href="{{ $advertising->link }}" target="_blank">{{  substr($advertising->link, 0, 30) }}</a>
                                                 </td>
                                                 <td>{{ $advertising->start_date }}</td>
                                                 <td>{{ $advertising->end_date }}</td> 
                                                  <!--<td>   
                                                  @if($advertising->is_active == '1')
                                                  <span style="color:green">
                                                  <?php echo "active"; ?>
                                                  </span>
                                                  @else
                                                  <span style="color:red">
                                                  <?php echo "not active"; ?>
                                                  @endif
                                                   <select id="<?= $advertising->id ?>" class="form-control status_change" name="is_active">
                                                      <option value="">change</option>
                                                      <option value="1">Active</option>
                                                      <option value="0"> Inactive</option>
                                                     </select>
                                                  </span>
                                                   </td>-->
                                                <td>
                                                      <select id="{{$advertising->id}}" data-control="status" name="is_active" class="form-control status_change">
                                                       <option value="1" <?= ($advertising->is_active==1)?"selected":""?>>Active</option>
                                                        <option value="0" <?= ($advertising->is_active==0)?"selected":""?>>Inactive</option>
                                                        </select>
                                                </td>
                                                <td>
                                                {{ $advertising->phone }}
                                                </td>
                                                <td>
                                                {{ $advertising->priority }}
                                                </td>
                                                  <!--<td>
                                             <a type="button" href="{{ url('admin/advertising/edit/'.$advertising->id ) }}"  class="btn btn-success editeducationBtn">edit</a>
                                             <a type="button" class="btn btn-danger deleteeducationBtn" href="{{ url('admin/advertising/delete/'.$advertising->id ) }}" 
                                             onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                             
                                               <a type="button" class="btn btn-danger deleteeducationBtn" href="{{ url('admin/advertising/delete/'.$advertising->id ) }}" >Delete</a>
                                                </td>-->
                                                <!--<td>
                                        <button class="show-modal btn btn-success btn-sm" data-plan_name="{{$advertising->plan_name}}" data-photo="{{$advertising->photo}}" 
                                        data-link="{{ $advertising->link }}"
                                        data-start_date="{{$advertising->start_date}}"
                                        data-end_date="{{$advertising->end_date}}"
                                        data-is_active="{{$advertising->is_active }}"
                                        data-created_by="{{ $advertising->creater}}"
                                        data-updated_by = "{{$advertising->updater}}"
                                        data-company_name="{{$advertising->company_name}}"
                                        data-address="{{ $advertising->address}}"
                                        data-phone="{{ $advertising->phone }}"
                                        data-email="{{ $advertising->email }}"
                                        data-priority="{{ $advertising->priority }}"
                                        data-created_at="{{ $advertising->created_at }}"
                                        data-updated_at="{{ $advertising->updated_at }}" 
                                        >                                                 view
                                        </button> 
                                      </td>-->
                                             </tr>
                                             @php $count++; @endphp
                                           @endforeach 
                                        </tbody>
                                    </table>
                                    <div class="pull-right">
                                       {{ $advertisings->appends($data)->links() }} 
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
                   <center><h4 class="modal-title"></h4>
                   </center>
                   <center style="padding:20px">
                        <img id="photo" src=""  style="width:150px;height:150px;text-align:center"/>
                   </center>
                   <div class="row">
                       <div class="col-md-offset-1 col-md-10">
                         <table class="table table-hover no-border">
                            <tbody>
                                <!--<tr>-->
                                <!--   <td></td>-->
                                <!--    <td>-->
                                <!--         <div >-->
                                <!--            <img id="photo" src=""  style="width:150px;height:150px;text-align:center"/>-->
                                <!--        </div>-->
                                <!--    </td>-->
                                <!--</tr>-->
                                <tr>
                                    <td>Plan Name</td>
                                    <td>
                                         <div id="plan_name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Link</td>
                                    <td>
                                         <div>
                                           <a id="link" href="" target="_blank"></a>
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Start Date</td>
                                    <td>
                                         <div id="start_date">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>End Date</td>
                                    <td>
                                         <div id="end_date">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Is Active?</td>
                                    <td>
                                         <div id="is_active">
                                        </div>
                                    </td>
                                </tr>

                                 <tr>
                                    <td>Company Name</td>
                                    <td>
                                         <div id="company_name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>
                                         <div id="address">
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
                                    <td>Email</td>
                                    <td>
                                         <div id="email">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Created By</td>
                                    <td>
                                         <div id="created_by">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Update By</td>
                                    <td>
                                         <div id="updated_by">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Created At</td>
                                    <td>
                                         <div id="created_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Updated At</td>
                                    <td>
                                         <div id="updated_at">
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>Priority</td>
                                    <td>
                                         <div id="priority">
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    <td>                                        <a type="button" id="advertising-edit" href=""  class="btn btn-success editeducationBtn">Edit</a>
                                    </td>
                                </tr>

                            </tbody>
                           </table>   
                       </div>
                   </div>
                  </div>
                </div>
      </div>
<!--image upload-modal end--> 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
     
        <script type="text/javascript">
           /* Show Event  */
            $(document).on('click', '.show-modal', function() { 
                  var APP_URL = '<?php echo url('/'); ?>'; 
                 var page ='<?php echo $advertisings->currentPage() ?>';
                    $('.modal-title').text('Advertising Detail');
                    //var range = $(this).data('minimum')+"~"+$(this).data('maximum');
                    $('#plan_name').html($(this).data('plan_name'));
                    $('#link').html('Go To Site');
                    $('#link').attr('href',$(this).data('link'));
                    $("#photo").attr('src', APP_URL+'/storage/advertising/'+$(this).data('photo'));
                    $('#start_date').html($(this).data('start_date'));
                    $('#end_date').html($(this).data('end_date'));
                    if($(this).data('is_active') == 1){
                     $('#is_active').html('active');
                   }else{
                     $('#is_active').html('not active');
                   }
                     $('#created_by').html($(this).data('created_by'));
                     $('#updated_by').html($(this).data('updated_by'));
                     $('#company_name').html($(this).data('company_name'));
                     $('#address').html($(this).data('address'));
                     $('#phone').html($(this).data('phone'));
                     $('#email').html($(this).data('email'));
                     $('#priority').html($(this).data('priority'));
                     $('#created_at').html($(this).data('created_at'));
                     $('#updated_at').html($(this).data('updated_at'))
                     /*$("#advertising-edit").attr('href', '{{ url('admin/advertising/edit/') }}'+'/'+$(this).data('id')+'/'+page);*/
                     $("#advertising-edit").attr('href',$(this).data('url') );
                    $('#showModal').modal('show');
                });
            
            $(document).ready(function(){
              
               $('#table').on('change','.status_change',function(){
                        var is_active = $(this).val();
                        var id = $(this).attr('id');
                      /*  var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){ */
                            $.ajax({ 
                            url: "{{ URL::route('admin.advertising.updatestatus') }}",
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
                                // var url = window.location.href;
                                //  callbackURL(message,url);
                                 
                                /*alert(data.success);
                                location.reload();*/
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
        <script type="text/javascript">
           $(document).ready(function () {
        $('#table #checkall').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $("#table .checkbox").prop('checked', true);  
         } else {  
            $("#table .checkbox").prop('checked',false);  
         }  
        });

         $('#table .checkbox').on('click',function(){
            if($('#table .checkbox:checked').length == $('.checkbox').length){
                $('#table #checkall').prop('checked',true);
                
            }else{
                $('#table #checkall').prop('checked',false);
            }
            //  if($(this).prop("checked") == true){
                 
            //       var ids = $("input:checkbox:checked").map(function(){
            //                     return $(this).data('id');
            //                      }).get();
            //                      alert(ids);
            //                 $.ajax({ 
            //                 url: "{{ URL::route('myanboxtube.store-checkbox') }}",
            //                 type: 'POST',
            //                 data: {'ids' : ids},
            //                 dataType: 'json',
            //                 headers: {
            //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //                 },
            //                 success: function(data){ 
            //                 },
            //                 error:function(e)
            //                 {
            //                     console.log(e);
            //                 }
            //                 });
               
            // }
            // else if($(this).prop("checked") == false){
            //     alert('false');
            // }
         });
           });
         </script>
         <script type="text/javascript">
         $(document).ready(function () {
             $('.deleteitemall').on('click',function(){
                 
            var advertisingids = [];
                  $("input:checkbox[name=advertisingid]:checked").each(function(){
                      advertisingids.push($(this).val());
                       });
                       
                       if (advertisingids.length == 0) {
                            alert("please checked at least one advertising that you want to delete");
                       }else{
                     var conf = confirm('Are you sure want to delete?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('advertising.deleteall') }}",
                            type: 'POST',
                            data: {'ids' : advertisingids},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                               /* alert(data.success);
                                location.reload();*/
                                // var message = data.success;
                                var url = window.location.href;
                                window.location=url;
                                 //callbackURL(message,url);
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                        }
                     }
               });
         });
         </script>

@endsection