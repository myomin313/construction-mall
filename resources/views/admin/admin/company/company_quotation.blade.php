@extends('layouts.admin_panel')
@section('content')
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            @include('admin.element.breadcrumb')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title "> {{ $company->name }} Company @php echo ($status == "received")?"Received":"Requested" @endphp Quotation List</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">

                  <div class="table-responsive">
                  <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="false" 
                  data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                  data-resizable="true" data-cookie="true"   data-cookie-id-table="saveId" data-show-export="false"
                   data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="range_id" data-editable="true">Range</th>
                                        <th data-field="category_id" data-editable="true">Category</th>
                                        <th style="width:20px;" data-field="project_current_situation" data-editable="true">Project Situation</th>
                                        <th data-field="used_coin" data-editable="true">Used Coin</th>
                                         @if($status == "received")
                                        <th data-field="send_user_id" data-editable="true">Sender</th>
                                        @endif
                                         @if($status == "request")
                                        <th data-field="received_user_id" data-editable="true">Receiver</th>
                                        @endif
                                        <th data-field="received_status" data-editable="true">Received Status</th>
                                        <th data-field="requested_status" data-editable="true">Request Status</th>
                                        <th data-field="created_at" data-editable="true">Received Date</th>
                                        <th data-field="action" data-editable="true">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php $count=1;@endphp
                                 @foreach($quotations as $quotation)
                                  <?php
                                              $received_user_id ='';
                                              $received_status ='';
                                            foreach($quotation->received_company as $received){
                                              
                                            $received_user_id = $received->pivot->user_id;
                                            $received_status = $received->pivot->received_status;
                                            }
                                            ?>
                                    <tr>
                                       <td>{{ ($quotations->currentPage()-1) * $quotations->perPage() + $loop->index + 1 }}</td>
                                        <td><?= $quotation->range->minimum_price ?> ~ <?= $quotation->range->maximum_price ?></td>
                                        <td><?= $quotation->category->name ?></td>
                                        <td><?= $quotation->project_current_situation ?></td>
                                        <td><?= $quotation->used_coin ?></td>
                                         @if($status == "received")
                                        <td>
                                            <!--{{ $quotation->send_user->name }}-->
                                        <!-- start myo min-->
                                        @if($quotation->send_user->role == '2')
                            <span><a href="{{ url('companydetail/'.$quotation->main_category->category_url.'/'.$quotation->main_category->company_url)}}"><u>{{ $quotation->send_user->name }}</u></a>  </span>
                        @else
                            <span><a class="show-request-modal" data-id="{{$quotation->send_user->id}}" data-name="{{ $quotation->send_user->name }}" data-email="{{ $quotation->send_user->email }}" data-phone="{{ $quotation->send_user->phone }}"><u>{{ $quotation->send_user->name }}</u></a>  </span>
                        @endif
                                        <!-- end myo min-->
                                        </td>
                                        @endif
                                         @if($status == "request")
                                        <td>
                                        
                                        
                                      
                                        <!--     foreach($quotation->received_company as $received){-->
                                        <!--     echo "<p>";-->
                                        <!--     echo (strlen($received->user->name)>25)?substr($received->user->name,0,25)."...":$received->user->name;-->
                                        <!--     echo "</p>";-->
                                        <!--    }-->
                                       
                                        
                                        <!-- start myo min-->
                                        <p>
                                
                                
                                  <a href="{{ url('companydetail/'.$received->cate->category_url.'/'.$received->company_url)}}" target="_blank"><u> @php echo (strlen($received->user->name)>25)?substr($received->user->name,0,25)."...":$received->user->name;
                                @endphp</u></a>
                                
                                </p>
                                        <!-- end myo min-->
                                        
                                        </td>
                                        @endif
                                        @if($status == "received")
                                        <td>
                                        <select received_user_id="<?= $received_user_id ?>" id="<?= $quotation->id ?>" data-control="_receivedstatus" name="received_status" class="form-control status_change" status="received">
                                            <?php
                                            foreach($quotation_statuses as $quotation_status){
                                                if($quotation_status ==   $received_status)
                                                    $selected = "selected";
                                                else
                                                    $selected = "";
                                            ?>
                                            <option value="<?= $quotation_status?>" <?= $selected ?>><?= $quotation_status ?>
                                            </option>
                                            <?php }?>
                                        </select>
                                        </td>
                                        <td><?= $quotation->requested_status ?></td>
                                        @elseif(strcmp($status, "request") == 0)
                                        <td><?php 
                                                    if(!empty($quotation->received_company())){
                                                           foreach($quotation->received_company as $received_company)
                                                           {
                                                             echo $received_company->pivot->received_status.",";
                                                           }
        
                                                        } ?></td>
                                        <td>
                                        <select id="<?= $quotation->id ?>" name="request_status" data-control="_requestedstatus" class="form-control status_change" status="request">
                                            <?php
                                            foreach($quotation_statuses as $quotation_status){
                                                if($quotation_status ==   $quotation->requested_status)
                                                    $selected = "selected";
                                                else
                                                    $selected = "";
                                            ?>
                                            <option value="<?= $quotation_status?>" <?= $selected ?>><?= $quotation_status ?>
                                            </option>
                                            <?php }?>
                                        </select>
                                        </td>
                                        @endif

                                        <td><?= $quotation->created_at ?></td>
                                        <td>
                                        <button class="show-modal btn btn-success btn-sm" data-id="{{$quotation->id}}" data-minimum="{{$quotation->range->minimum_price}}" 
                                        data-maximum="{{$quotation->range->maximum_price}}"
                                        data-category="{{$quotation->category->name}}"
                                        data-project_expected_start_date="{{$quotation->project_expected_start_date}}"
                                        data-project_situation="{{$quotation->project_current_situation}}"
                                        data-summary="{{$quotation->summary}}"
                                        data-file = "{{$quotation->file}}"
                                        data-policy="{{$quotation->policy}}"
                                        data-used_coin="{{$quotation->used_coin}}"
                                        data-send_user_name="{{$quotation->send_user->name}}"
                                        data-received_user_name="<?php 
                                            $received_user_name="";
                                            $received_count = 1; 
                                            foreach($quotation->received_company as $received_company)
                                            if($quotation->received_company->count() >1 && $received_count != sizeof($quotation->received_company))
                                               $received_user_name .=$received_company->name.",";
                                            else
                                               $received_user_name .=$received_company->name;
                                            $received_count++;
                                        ?>"
                                        data-received_status="{{$quotation->received_status}}"
                                        data-requested_status="{{$quotation->requested_status}}"
                                        data-created_by="{{$quotation->quotation_created_user->name}}"
                                        data-updated_by="{{$quotation->quotation_updated_user->name}}
                                        " data-created_at="{{$quotation->created_at}}" data-updated_at="{{$quotation->updated_at}}"
                                        >                                                  Detail
                                        </button> 
                                        </td>
                                    </tr>
                                    @php $count++; @endphp
                                 @endforeach  
                                </tbody>
                            </table>
                             <div class="pull-right">
                            {{ $quotations->links() }}
                            </div>
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
                         <table class="table table-hover no-border">
                            <tbody>
                                <tr>
                                    <td>Range</td>
                                    <td>
                                         <div id="range">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>
                                         <div id="category">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Project Expected Start Date</td>
                                    <td>
                                         <div id="project_expected_start_date">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Project Current Situation</td>
                                    <td>
                                         <div id="project_current_situation_detail">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Used Coin</td>
                                    <td>
                                         <div id="used_coin">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Requested User</td>
                                    <td>
                                         <div id="send_user_name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Received Company</td>
                                    <td>
                                         <div id="received_user_name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Received Status</td>
                                    <td>
                                         <div id="received_status">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Request Status</td>
                                    <td>
                                         <div id="requested_status">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Updated User</td>
                                    <td>
                                         <div id="updated_by">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Requested Date</td>
                                    <td>
                                         <div id="created_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Updated Date</td>
                                    <td>
                                         <div id="updated_at">
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>File</td>
                                    <td>
                                         <div id="file">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Summary</td>
                                    <td>
                                         <div id="summary">
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Policy</td>
                                    <td>
                                         <div id="policy_detail">
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
<!--image upload-modal end--> 
 <!--inner content end-->
    <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="showrequestModal">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                <center><h4 class="sender-modal-title"></h4></center>
                <div class="row">
                    <div class="col-md-offset-1 col-md-10">
                        <table class="table table-hover no-border" >
                            <tbody>

                            <tr>
                                <td>Name</td>
                                <td>
                                    <div id="sender_name">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <div id="sender_email">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>
                                    <div id="sender_phone">
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
        <script  type="text/javascript">
        $(document).on('click','.show-request-modal', function() {
            $('.sender-modal-title').text('Detail Information');
            $('#sender_name').html($(this).data('name'));
            $('#sender_email').html($(this).data('email'));
            $('#sender_phone').html($(this).data('phone'));
            $('#showrequestModal').modal('show');
        });
    </script>
        <script type="text/javascript">
           var page ='<?php echo $quotations->currentPage() ?>';
           
           /* Show Event  */
            $(document).on('click', '.show-modal', function() {   
                    $('.modal-title').text('Quotation Detail');
                    var range = $(this).data('minimum')+"~"+$(this).data('maximum');
                    $('#range').html(range);
                    $('#category').html($(this).data('category'));
                    $('#project_expected_start_date').html($(this).data('project_expected_start_date'));
                    $('#project_current_situation_detail').html($(this).data('project_situation'));
                    $('#used_coin').html($(this).data('used_coin'));
                    $('#summary').html($(this).data('summary'));
                    $('#file').html($(this).data('file'));
                    $('#policy_detail').html($(this).data('policy'));
                    $('#send_user_name').html($(this).data('send_user_name'));
                    $('#received_user_name').html($(this).data('received_user_name'));
                    $('#received_status').html($(this).data('received_status'));
                    $('#requested_status').html($(this).data('requested_status'));
                    $('#created_by').html($(this).data('created_at'));
                    $('#updated_by').html($(this).data('updated_by'));
                    $('#created_at').html($(this).data('created_at'));
                    $('#updated_at').html($(this).data('updated_at'));
                    $('#showModal').modal('show');
                });
             $(document).ready(function(){  
                   $('#table').on('change','.status_change',function(){ 
                        var getval = $(this).val();
                        var id = $(this).attr('id');
                        var status = $(this).attr('status');
                        var received_user_id = $(this).attr('received_user_id');
                      /*  var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){*/
                            $.ajax({ 
                            url: "{{ URL::route('quotation.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"selectedvalue":getval,'status':status,'received_user_id':received_user_id},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                
                                 $("[data-control='_receivedstatus']").prop('disabled', true);
                                
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
                      /*  }
                        else{
                            $(this).val(selectedvalue);
                            $(this).bind('focus');
                            return false;
                        }*/
                });
                $('#table').on('change','.selectchangerequest',function(){
                        var getval = $(this).val();
                        var id = $(this).attr('id');
                     /*   var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){*/
                            $.ajax({ 
                            url: "",
                            type: 'POST',
                            data: {'id' : id,"selectedvalue":getval},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                 var message = data.success;
                                 callbackSuccess(message);
                                 
                               /* alert(data.success);*/
                            },
                            error:function(e)
                            {
                                console.log(e);

                            }
                            });
                     /*   }
                        else{
                            $(this).val(selectedvalue);
                            $(this).bind('focus');
                            return false;
                        }*/
                });

                    
        });
        </script>

@endsection