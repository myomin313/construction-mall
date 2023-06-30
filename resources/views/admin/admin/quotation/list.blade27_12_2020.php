@extends((Auth::user()->role == 4 || Auth::user()->role == 5) ? 'layouts.admin_panel' : 'layouts.company_panel')

@section('content')
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <!--<h4 class="card-title "> @php echo ($status == "received")?"Received":"Requested" @endphp Quotation Lists</h4>-->
                  <h4 class="card-title "> Quotation History List</h4>
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
                                        <!-- <th data-field="range_id" data-editable="true">Range</th> -->
                                        <th data-field="category_id" data-editable="true">Category</th>
                                        <!-- <th style="width:20px;" data-field="project_current_situation" data-editable="true">Project Situation</th> -->
                                        <!-- <th data-field="used_coin" data-editable="true">Used Coin</th> -->
                                        <th data-field="send_user_id" data-editable="true">Requester</th>                     
                                        <th data-field="contact_person_name" data-editable="true">Contact Person Name</th>
                                        <th data-field="contact_email" data-editable="true">Contact Email</th>
                                        <th data-field="contact_phone" data-editable="true">Contact Phone</th>
                                        <th data-field="prefer_contact_way" data-editable="true">Prefer Contact Way</th>
                                        <th data-field="prefer_contact_time" data-editable="true">Best Contact Time</th>
                                        <!-- <th data-field="received_status" data-editable="true">Received Status</th> -->
                                        <th data-field="requested_status" data-editable="true">Requester Status</th>
                                        <!-- <th data-field="created_at" data-editable="true">Received Date</th> -->
                                        <th data-field="action" data-editable="true">Action</th>
                                        <th data-field="received_user_id" data-editable="true">Receiver Company</th>
                                    </tr>
                                </thead>
                                <tbody>

                                 @php $count=1;@endphp
                                 @foreach($quotations as $quotation)

                                  <!-- <?php
                                              $received_user_id ='';
                                              $received_status ='';
                                            foreach($quotation->received_user as $received){
                                              
                                            $received_user_id = $received->user_id;
                                            $received_status = $received->received_status;
                                            }
                                            ?> -->
                                  
                                    <tr>
                                    <td><?= $count; ?></td>
                                        <!-- <td><?= $quotation->minimum_price ?> ~ <?= $quotation->maximum_price ?></td> -->
                                        <td><?= $quotation->category_name ?></td>
                                       <!--  <td><?= $quotation->project_current_situation ?></td> -->
                                        <!-- <td><?= $quotation->used_coin ?></td> -->
                                        <td><?= $quotation->send_user->name ?></td>
                                         <td><?= $quotation->contact_person_name ?></td>

                                        <td><?= $quotation->contact_email  ?></td>
                                        <td><?= $quotation->contact_phone  ?></td>
                                       <td>
                                        @php
                                        if(!empty(unserialize ($quotation->prefer_contact_way))){
                                         $count = 1;
                                         foreach(unserialize ($quotation->prefer_contact_way) as $way){
                                          if($count>1)
                                            echo ",".$way;
                                          else
                                            echo $way;
                                          $count++;
                                       }
                                     }else{
                                       echo "-";
                                     }
                                       @endphp
                                       </td>
                                        <td>
                                        @php
                                        if(!empty(unserialize ($quotation->best_contact_time))){
                                         $count = 1;
                                         foreach(unserialize ($quotation->best_contact_time) as $way){
                                          if($count>1)
                                            echo ",".$way;
                                          else
                                            echo $way;
                                          $count++;
                                       }
                                     }else{
                                       echo "-";
                                     }
                                       @endphp                                        
                                       </td>
                                        @if($status == "received")
                                        <td><?= $quotation->requested_status ?></td>
                                        @elseif(strcmp($status, "request") == 0)
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
                                        @endif
                                        <td>
                                        <button class="show-modal btn btn-success btn-sm" data-id="{{$quotation->id}}" data-minimum="{{$quotation->minimum_price}}" 
                                        data-maximum="{{$quotation->maximum_price}}"
                                        data-category="{{$quotation->category_name}}"
                                        data-project_expected_start_date="{{$quotation->project_expected_start_date}}"
                                        data-project_situation="{{$quotation->project_current_situation}}"
                                        data-summary="{{$quotation->summary}}"
                                        data-file = "{{$quotation->file}}"
                                        data-policy="{{$quotation->policy}}"
                                        data-used_coin="{{$quotation->used_coin}}"
                                        data-send_user_name="{{$quotation->send_user_name}}"
                                        data-received_user_name="
                                        <?php 
                                            $received_user_name="";
                                            $received_count = 1; 
                                            foreach($quotation->received_user as $received_user)
                                            if($quotation->received_user->count() >1 && $received_count != sizeof($quotation->received_user))
                                               $received_user_name .=$received_user->name.",";
                                            else
                                               $received_user_name .=$received_user->name;
                                            $received_count++;
                                            echo $received_user_name;
                                        ?>
                                        "
                                        data-received_status="{{$quotation->received_status}}"
                                        data-requested_status="{{ $quotation->requested_status }}"
                                        data-created_by="{{ $quotation->creater }}"
                                        data-updated_by="{{ $quotation->updater }}
                                        " data-created_at="{{ $quotation->created_at }}" data-updated_at="{{$quotation->updated_at}}"
                                        >                                                  Detail
                                        </button> 
                                        </td>
                                         <td>                                            
                                             @php 
                                            $received_user_name="";
                                            $received_count = 1; 
                                            foreach($quotation->received_user as $received_user)
                                            if($quotation->received_user->count() >1 && $received_count != sizeof($quotation->received_user)) 
                                    echo  $received_user->received_user_name." <a data-received_user_id='$received_user->id'
                                         data-received_user_phone='$received_user->phone' id='receiver-detail' data-received_user_name='$received_user->received_user_name' data-received_user_email='$received_user->email' data-received_logo='$received_user->logo'
                                         data-received_status='$received_user->received_status'
                                         data-received_id='$received_user->id'
                                         data-user_id='$received_user->user_id'>detail</a><br>";
                                            else
                                    echo  $received_user->received_user_name." <a id='receiver-detail' data-received_user_id='$received_user->id'
                                         data-received_user_phone='$received_user->phone' id='receiver-detail' data-received_user_name='$received_user->received_user_name' data-received_user_email='$received_user->email' data-received_logo='$received_user->logo' data-received_status='$received_user->received_status' 
                                         data-received_id='$received_user->id'
                                         data-user_id='$received_user->user_id'>detail</a><br>";
                                            $received_count++;
                                        @endphp 
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
                                         <div id="status">
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

       <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="receiverModal">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-5">
            <!--Carousel Wrapper-->
            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
              data-ride="carousel">
              <!--Slides-->
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" id="receiver_image">
                </div>                
              </div>
              <!--/.Slides-->
              <!--Controls-->
            </div>
            <!--/.Carousel Wrapper-->
          </div>
          <div class="col-lg-7">
            <h5 class="h2-responsive">
              <strong>Received Company Detail</strong>
            </h5>
            <!-- <h4 class="h4-responsive"> -->
              <div class="green-text">
                <span id="receiver_company"></span><br>
              <!-- </div>
              <div class="grey-text"> -->
                 <a id="receiver_phone"></a><br>
              <!-- </div>
              <div class="grey-text"> -->
                 <a id="receiver_email"></a><br>
                <!-- <span id="received_company_status"></span><br>-->
                 <select class="form-control"  name="received_status" id="received_status" received_status_id="" user_id="">
                    <!--<option value="">Change Received Status</option>-->
                    <option value="pending">pending</option>
                    <option value="received">Received</option>
                    <option value="cancel">cancel</option>
                  </select>
              </div>
           <!--  </h4> -->

            


            <!-- Add to Cart -->
            <div class="card-body">
              <!-- <div class="row">
                <div class="col-md-6">

                  <select class="md-form mdb-select dropdown-primary"  name="received_status" id="received_status" received_status_id="" user_id="">
                    <option value="">Received Status</option>
                    <option value="pending">pending</option>
                    <option value="received">Received</option>
                    <option value="cancel">cancel</option>
                  </select>
                </div>
              </div> -->
              <div class="text-center">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.Add to Cart -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- receiver show modal end -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
       
          
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
                    $('#status').html($(this).data('received_status'));
                    $('#requested_status').html($(this).data('requested_status'));
                    $('#created_by').html($(this).data('created_at'));
                    $('#updated_by').html($(this).data('updated_by'));
                    $('#created_at').html($(this).data('created_at'));
                    $('#updated_at').html($(this).data('updated_at'));
                    $('#showModal').modal('show');
                });

            $(document).on('click','#receiver-detail', function() {   
                    $('.receiver-title').text('Receiver Detail');                    
                    $('#receiver_phone').html($(this).data('received_user_phone'));
                    $('#receiver_phone').attr('href', "tel:" + $(this).data('received_user_phone'));
                    $('#receiver_company').html($(this).data('received_user_name'));
                    $('#receiver_email').html($(this).data('received_user_email'));
                    $('#receiver_email').attr('href', "mailto:" + $(this).data('received_user_email'));
                    $('#received_company_status').html($(this).data('received_status'))
                var receiver_logo = $(this).data('received_logo');
                var logo = '<?php echo asset('/storage/company_logo/' ) ?>/'+receiver_logo;
                var html = '<img src="' + logo + '" />';               
                    $('#receiver_image').html(html);
                    $('#received_status').attr("received_status_id",$(this).data('received_id'));
                    $('#received_status').attr("user_id",$(this).data('user_id'));
                    $('#receiverModal').modal('show');
                });
                
             $(document).ready(function(){  
                      $('#table').on('change','.status_change',function(){ 
                        var getval = $(this).val();
                        var id = $(this).attr('id');
                        var received_user_id = $(this).attr('received_user_id');
                        var status = $(this).attr('status');
                       /* var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){ */
                            $.ajax({ 
                            url: "{{ URL::route('quotation.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"selectedvalue":getval,'status':status,'received_user_id':received_user_id},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                var message = data.success;
                                var url = window.location.href;
                                 callbackURL(message,url);
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
                
                  $('#received_status').change(function(){
                        var getval = $(this).val();
                        var id = $(this).attr('received_status_id');                     
                        var user_id =$(this).attr('user_id')
                        //var conf = confirm('Are you sure want to change status?'); 
                       // if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('quotation.updatereceivedstatus') }}",
                            type: 'POST',
                            data: {'id' : id,"selectedvalue":getval},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                //alert(data.success);
                                $('#received_company_status').html(data.received_status)
                                received_status
                            },
                            error:function(e)
                            {
                                console.log(e);

                            }
                            });
                        //}
                        //else{
                           // $(this).val(selectedvalue);
                           // $(this).bind('focus');
                          //  return false;
                       // }
                });

                    
        });
        </script>

@endsection