@extends('layouts.admin_panel')
@section('content')

 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title "> {{ $company->name }} @php echo ($status == "received")?"Received":"Requested" @endphp Quotation Lists in</h4>
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
                                        <th data-field="no" width="5%">No</th>
                                        <!-- <th data-field="range_id" data-editable="true">Range</th> -->
                                        <th data-field="category_id" width="10%" data-editable="true">Category</th>
                                        <!-- <th style="width:20px;" data-field="project_current_situation" data-editable="true">Project Situation</th> -->
                                        <!-- <th data-field="used_coin" data-editable="true">Used Coin</th> -->
                                        <th data-field="send_user_id" data-editable="true" width="20%%">Requester</th>
                                        <th data-field="requested_status" data-editable="true" width="10%">Requested Status</th>
                                        <th data-field="received_user_id" data-editable="true" width="20%">Receiver </th>
                                        <th data-field="received_status" data-editable="true" width="10%">Received Status</th>
                                        <th data-field="prefer_contact_way" data-editable="true" width="10%">Contact Way</th>
                                        <th data-field="prefer_contact_time" data-editable="true" width="10%">Contact Time</th>
                                        <th data-field="send_mail" width="5%" data-editable="true">Mail</th>
                                        <th data-field="send_mail_date" width="5%" data-editable="true">Send Mail Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                 @php $count=1;@endphp
                                 @foreach($quotations as $quotation)
                                 @php
                                            $id = $quotation->id;
                                            $id = \Crypt::encrypt($id);
                                            $page = $quotations->currentPage();
                                            $page =\Crypt::encrypt($page);
                                            @endphp
                                    <tr>
                                        <td><?= $count; ?></td>
                                        <!-- <td><?= $quotation->minimum_price ?> ~ <?= $quotation->maximum_price ?></td> -->
                                        <td><?= $quotation->category->name ?></td>
                                       <!--  <td><?= $quotation->project_current_situation ?></td> -->
                                        <!-- <td><?= $quotation->used_coin ?></td> -->
                                        <?php $file = unserialize($quotation->file);
                                              $contact_way = unserialize($quotation->prefer_contact_way);
                                              $best_time = unserialize($quotation->best_contact_time);
                                         ?>
                                    @php 
                                      $receiver_name ="";$received_count=1;
                                       foreach($quotation->received_company as $received){
                                       if($quotation->received_company->count() >1 && $received_count != sizeof($quotation->received_company))
                                          $receiver_name .=$received->user->name."<br>";
                                        else
                                          $receiver_name .=$received->user->name;
                                        $received_count++;
                                      }
                                       $address = $quotation->address.",";
                                       $address .= $quotation->location->name.",";
                                       foreach($cities as $city){
                                        if($quotation->location->parent_id == $city->id)
                                          $address .=$city->name;
                                     }
                                     if(empty($quotation->contact_email) || $quotation->contact_email ==','){
                                     $quotation->contact_email = $quotation->send_user->email;
                                   }
                                   if(empty($quotaiton->contact_phone) || $quotation->contact_phone ==','){
                                   $quotation->contact_phone = $quotation->send_user->phone;
                                    }
                                     @endphp

                                        <td><a class="show-modal" data-id="{{$quotation->id}}" data-contact_person_name="{{$quotation->contact_person_name}}" data-best_contact_time="{{ (!empty($best_time))?implode('|',$best_time):''}}" data-contact_email="{{$quotation->contact_email}}" data-contact_phone="{{$quotation->contact_phone}}" data-prefer_contact_way="{{ (!empty($contact_way))?implode('|',$contact_way):''}}" 
                                        data-address="{{$address}}"
                                        data-building_type="{{$quotation->building_type}}"
                                        data-minimum="{{$quotation->range->minimum_price}}" 
                                        data-maximum="{{$quotation->range->maximum_price}}"
                                        data-category="{{$quotation->category->name}}"
                                        data-project_expected_start_date="{{$quotation->project_expected_start_date}}"
                                        data-project_information="{{$quotation->project_information}}"
                                        data-file = "{{ (!empty($file))?implode('|',$file):''}}"
                                        data-used_coin="{{$quotation->used_coin}}"
                                        data-send_user_name="{{$quotation->send_user->name}}"
                                        data-received_company="{{ $receiver_name}}"
                                        data-created_by="{{ $quotation->creater }}"
                                        data-updated_by="{{ $quotation->updater }}
                                        " data-created_at="{{ $quotation->created_at }}" data-updated_at="{{$quotation->updated_at}}">
                                        <?= $quotation->send_user->name ?>
                                      </a>
                                      </td>
                                      <td>
                                    @foreach($quotation->received_company as $requested)
                                    <select company_id="{{$requested->id}}" quotation_id="<?= $quotation->id ?>" data-control="_requestedstatus" name="requested_status" class="form-control status_change" status="requested">
                                    <?php
                                      foreach($quotation_statuses as $quotation_status){
                                          if($quotation_status ==   $requested->pivot->requested_status)
                                              $selected = "selected";
                                          else
                                              $selected = "";
                                      ?>
                                      <option value="<?= $quotation_status?>" <?= $selected ?>><?= $quotation_status ?>
                                      </option>
                                      <?php }?>
                                    </select>
                                    @endforeach
                                   </td>  
                                     <td>
                                     @php 
                                     foreach($quotation->received_company as $received){
                                     echo "<p>";
                                     echo (strlen($received->user->name)>25)?substr($received->user->name,0,25)."...":$received->user->name;
                                     echo "</p>";
                                   }
                                     @endphp
                                   </td>
                                   <td>
                                  @foreach($quotation->received_company as $received)
                                    <select company_id="{{$received->id}}"quotation_id="<?= $quotation->id ?>" data-control="_receivedstatus" name="received_status" class="form-control status_change" status="received">
                                    <?php
                                      foreach($quotation_statuses as $quotation_status){
                                          if($quotation_status ==   $received->pivot->received_status)
                                              $selected = "selected";
                                          else
                                              $selected = "";
                                      ?>
                                      <option value="<?= $quotation_status?>" <?= $selected ?>><?= $quotation_status ?>
                                      </option>
                                      <?php }?>
                                    </select>
                                    @endforeach
                                    
                                   </td>  
                                   <td>@php
                                        if(!empty(unserialize ($quotation->prefer_contact_way))){
                                         $contact_count = 1;
                                         foreach(unserialize ($quotation->prefer_contact_way) as $way){
                                          if($contact_count>1)
                                            echo ",".$way;
                                          else
                                            echo $way;
                                          $contact_count++;
                                       }
                                     }else{
                                       echo "-";
                                     }
                                       @endphp
                                     </td> 
                                     <td>
                                       @php
                                        if(!empty(unserialize ($quotation->best_contact_time))){
                                         $time_count = 1;
                                         foreach(unserialize ($quotation->best_contact_time) as $way){
                                          if($time_count>1)
                                            echo ",".$way;
                                          else
                                            echo $way;
                                          $time_count++;
                                       }
                                     }else{
                                       echo "-";
                                     }
                                       @endphp
                                     </td> 
                                     <td>
                                       <a href="{{ url('quotation-mail-send/'.$quotation->id.'/'.$page) }}" class="btn btn-info btn-sm">Send Email</a>
                                     </td>
                                     <td>
                                       <p>
                                    <!--//  -->
                                    <!--//   if($quotation->mail_send_date != null ){-->
                                    <!--//       $mail_send_date=strtotime( $quotation->mail_send_date);-->
                                    <!--//         echo(date("d M Y g:i a", $mail_send_date));-->
                                    <!--//   }-->
                                 
                                    
                                       {{ $quotation->mail_send_date }}
                                      
                                       </p>
                                       @if( $quotation->mail_status == 'success')
                                      <span class="badge" style="background:green">{{ $quotation->mail_status }}</span>
                                      @endif
                                      @if( $quotation->mail_status == 'fail')
                                      <span class="badge" style="background:red">{{ $quotation->mail_status }}</span>
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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