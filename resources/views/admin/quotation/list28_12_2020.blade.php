@extends((Auth::user()->role == 2) ? 'layouts.company_panel' : ((Auth::user()->role == 4 || Auth::user()->role == 5)?'layouts.admin_panel': 'layouts.user'))
@section('content')
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title "> @php echo ($status == "received")?"Received":"Requested" @endphp Quotation Lists</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">

                  <div class="table-responsive">
                  <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" 
                  data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                  data-resizable="true" data-cookie="true"   data-cookie-id-table="saveId" data-show-export="true"
                   data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="range_id" data-editable="true">Range</th>
                                        <th data-field="category_id" data-editable="true">Category</th>
                                        <!--<th data-field="used_coin" data-editable="true">Used Coin</th>-->
                                        @if(Auth::user()->role == 4 || Auth::user()->role == 5 || $status == "received")
                                        <th data-field="send_user_id" data-editable="true">Sender</th>
                                        @endif
                                       @if(Auth::user()->role == 4 || Auth::user()->role == 5 || $status == "request")
                                        <th data-field="received_user_id" data-editable="true">Receiver</th>
                                        @endif
                                        <th data-field="received_status" data-editable="true">Received Status</th>
                                        <th data-field="requested_status" data-editable="true">Request Status</th>
                                        <th data-field="created_at" data-editable="true">Received Date</th>
                                        <th data-field="contact_email" data-editable="true">Contact Email</th>
                                        <th data-field="action" data-editable="true">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @php $count=1;
                                 @endphp
                                 @foreach($quotations as $quotation):
                                    <tr>
                                         <td>{{$count }}</td>
                                        <td><?= $quotation->range->minimum_price ?> ~ <?= $quotation->range->maximum_price ?></td>
                                        <td><?= $quotation->category->name ?></td>
                                        <!--<td><?= $quotation->used_coin ?></td>-->
                                        @if(Auth::user()->role == 4 || Auth::user()->role == 5 || $status == "received")
                                        <td><?= $quotation->send_user->name ?></td>
                                        @endif
                                        @if(Auth::user()->role == 4 || Auth::user()->role == 5 || $status == "request")
                                        <td>
                                        @php 
                                            $received_user_name="";
                                            $received_count = 1; 
                                            foreach($quotation->received_user as $received_user)
                                            if($quotation->received_user->count() >1 && $received_count != sizeof($quotation->received_user))
                                               $received_user_name .=$received_user->name.",";
                                            else
                                               $received_user_name .=$received_user->name;
                                            $received_count++;
                                            echo $received_user_name;
                                        @endphp 
                                        </td>
                                        @endif
                                        @if(Auth::user()->role == 4 || Auth::user()->role == 5)
                                        <td>
                                        <select id="<?= $quotation->id ?>" name="received_status" class="form-control status_change" status="received">
                                            <?php
                                            foreach($quotation_statuses as $quotation_status){
                                                if($quotation_status ==   $quotation->received_status)
                                                    $selected = "selected";
                                                else
                                                    $selected = "";
                                            ?>
                                            <option value="<?= $quotation_status?>" <?= $selected ?>><?= $quotation_status ?>
                                            </option>
                                            <?php }?>
                                        </select>
                                        </td>
                                        <td>
                                        <select id="<?= $quotation->id ?>" name="request_status" class="form-control status_change" status="request">
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
                                        @elseif(Auth::user()->role == 1 || Auth::user()->role == 2)

                                            @if($status == "received")
                                            <td>
                                            <select id="<?= $quotation->id ?>" name="received_status" class="form-control selectchangerequest" status="received">
                                                <?php
                                                foreach($quotation_statuses as $quotation_status){
                                                    if($quotation_status ==   $quotation->received_status)
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
                                            <td>
                                                <?php 
                                                    if(!empty($quotation->received_user())){
                                                           foreach($quotation->received_user as $received_user)
                                                           {
                                                             echo $received_user->pivot->received_status.",";
                                                           }
        
                                                        } ?>
                                            </td>
                                            <td>
                                            <select id="<?= $quotation->id ?>" name="request_status" class="form-control selectchangerequest" status="request">
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
                                        @endif

                                        <td><?= $quotation->created_at ?></td>
                                        <td><?= $quotation->contact_email ?></td>
                                        <td>
                                        <?php $file = unserialize($quotation->file);
                                         ?>
                                         @if(Auth::user()->role == 4 || Auth::user()->role == 5)
                                        <button class="show-modal btn btn-success btn-sm" data-id="{{$quotation->id}}" data-minimum="{{$quotation->range->minimum_price}}" 
                                        data-maximum="{{$quotation->range->maximum_price}}"
                                        data-category="{{$quotation->category->name}}"
                                        data-project_expected_start_date="{{$quotation->project_expected_start_date}}"
                                        data-project_situation="{{$quotation->project_current_situation}}"
                                        data-summary="{{$quotation->summary}}"
                                        data-file = "{{ (!empty($file))?implode('|',$file):''}}"
                                        data-policy="{{$quotation->policy}}"
                                        data-used_coin="{{$quotation->used_coin}}"
                                        data-send_user_name="{{$quotation->send_user->name}}"
                                        data-received_user_name="{{$received_user_name}}"
                                        data-received_status="{{$quotation->received_status}}"
                                        data-requested_status="{{$quotation->requested_status}}"
                                        data-created_by="{{$quotation->quotation_created_user->name}}"
                                        data-updated_by="{{$quotation->quotation_updated_user->name}}
                                        " data-created_at="{{$quotation->created_at}}" data-updated_at="{{$quotation->updated_at}}"
                                        data-role="{{Auth::user()->role}}"
                                        data-contact_email="{{$quotation->contact_email }}" data-contact_phone="{{$quotation->contact_phone }}"
                                         data-contact_person_name="{{$quotation->contact_person_name }}"
                                         data-prefer_contact_way ="{{ $quotation->prefer_contact_way }}" 
                                         data-best_contact_time ="{{ $quotation->best_contact_time }}"
                                        >                                                  Detail
                                        </button> 
                                        @elseif(Auth::user()->role == 2 || Auth::user()->role == 1)
                                        <button class="show-modal btn btn-success btn-sm" data-id="{{$quotation->id}}" data-minimum="{{$quotation->range->minimum_price}}" 
                                        data-maximum="{{$quotation->range->maximum_price}}"
                                        data-category="{{$quotation->category->name}}"
                                        data-project_expected_start_date="{{$quotation->project_expected_start_date}}"
                                        data-project_situation="{{$quotation->project_current_situation}}"
                                        data-summary="{{$quotation->summary}}"
                                        data-file = "{{(!empty($file))?implode('|',$file):''}}"
                                        data-policy="{{$quotation->policy}}"
                                        data-used_coin="{{$quotation->used_coin}}"
                                        data-send_user_name="{{$quotation->send_user->name}}"
                                        data-received_status="{{$quotation->received_status}}"
                                        data-requested_status="{{$quotation->requested_status}}"
                                        data-created_by="{{$quotation->quotation_created_user->name}}"
                                        data-updated_by="{{$quotation->quotation_updated_user->name}}
                                        " data-created_at="{{$quotation->created_at}}" data-updated_at="{{$quotation->updated_at}}"
                                        data-role ="{{Auth::user()->role}}"
                                        data-contact_email="{{$quotation->contact_email }}" data-contact_phone="{{$quotation->contact_phone }}"
                                         data-contact_person_name="{{$quotation->contact_person_name }}"
                                         data-prefer_contact_way ="{{ $quotation->prefer_contact_way }}" 
                                         data-best_contact_time ="{{ $quotation->best_contact_time }}"
                                        >                                                  Detail
                                        </button>
                                        @endif 
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
      <div class="modal fade" tabindex="-1" role="dialog" id="showModal">
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
                                         <div id="current_situation">
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
                                    <td>Sender</td>
                                    <td>
                                         <div id="send_user_name">
                                        </div>
                                    </td>
                                </tr>
                                 <tr id="receiver">
                                    <td>Receiver</td>
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
                                         <div id="quotations_policy">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contact Email</td>
                                    <td>
                                         <div id="contact_email">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contact Phone</td>
                                    <td>
                                         <div id="contact_phone">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contact Person Name</td>
                                    <td>
                                         <div id="contact_person_name">
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Contact Allow</td>
                                    <td>
                                         <div id="contact_allow">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Prefer Contact Way</td>
                                    <td>
                                         <div id="prefer_contact_way">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Best Contact Time</td>
                                    <td>
                                         <div id="best_contact_time">
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
           
           /* Show Event  */
            $(document).on('click', '.show-modal', function() {   
                    $('.modal-title').text('Quotation Detail');
                    var range = $(this).data('minimum')+"~"+$(this).data('maximum');
                    $('#range').html(range);
                    $('#category').html($(this).data('category'));
                    $('#project_expected_start_date').html($(this).data('project_expected_start_date'));
                    $('#current_situation').html($(this).data('project_situation'));
                    $('#used_coin').html($(this).data('used_coin'));
                    $('#summary').html($(this).data('summary'));
                    var file_list= $(this).data('file');
                    var files = file_list.split("|");
                    var file ="";
                    $.each( files, function( key, value ) {
                       var route = "<?php echo url('storage/quotation')?>"+"/"+value;
                       file += "<span class='badge'>"+ ++key +"</span>"+"<a href='"+ route+"' download>"+value+"</a><br>";
                    });
                    $('#file').html(file);
                    $('#quotations_policy').html($(this).data('policy'));
                    $('#send_user_name').html($(this).data('send_user_name'));
                    if($(this).data('role') == 4 || $(this).data('role') == 5 )
                    {
                        $('#received_user_name').html($(this).data('received_user_name'));   
                    }else
                    {
                        $('#receiver').hide();   
                    }
                    $('#received_status').html($(this).data('received_status'));
                    $('#requested_status').html($(this).data('requested_status'));
                    $('#created_by').html($(this).data('created_at'));
                    $('#updated_by').html($(this).data('updated_by'));
                    $('#created_at').html($(this).data('created_at'));
                    $('#updated_at').html($(this).data('updated_at'));
                    $('#contact_email').html($(this).data('contact_email'));
                    $('#contact_phone').html($(this).data('contact_phone'));
                    $('#contact_person_name').html($(this).data('contact_person_name'));
                    $('#contact_allow').html($(this).data('contact_allow '));
                    $('#prefer_contact_way').html($(this).data('prefer_contact_way'));
                    $('#best_contact_time').html($(this).data('best_contact_time'));
                    $('#showModal').modal('show');
                });
             $(document).ready(function(){  
                 
               /*    $('#table').on('change','.status_change',function(){  
                        var getval = $(this).val();
                        var id = $(this).attr('id');
                        var status = $(this).attr('status');
                        var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('quotation.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"selectedvalue":getval,'status':status},
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
                        var getval = $(this).val();
                        var id = $(this).attr('id');
                        var status = $(this).attr('status');
                            $.ajax({ 
                            url: "{{ URL::route('quotation.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"selectedvalue":getval,'status':status},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                               var message = data.success;
                                var url = window.location.href;
                                 callbackURL(message,url);
                                 
                              /*  alert(data.success);
                                location.reload(); */
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                        
                });
                
                /*$('#table').on('change','.selectchangerequest',function(){ 
                //$('.selectchangerequest').change(function(){ 
                        var getval = $(this).val();
                        var id = $(this).attr('id');
                        var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('quotation.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"selectedvalue":getval},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                alert(data.success);
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
                });*/

                    $('#table').on('change','.selectchangerequest',function(){ 
                //$('.selectchangerequest').change(function(){ 
                        var getval = $(this).val();
                        var id = $(this).attr('id');
                            $.ajax({ 
                            url: "{{ URL::route('quotation.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"selectedvalue":getval},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                 var message = data.success;
                                  callbackSuccess(message);
                            },
                            error:function(e)
                            {
                                console.log(e);

                            }
                            });  return false;
                        }
                });

        });
        </script>

@endsection