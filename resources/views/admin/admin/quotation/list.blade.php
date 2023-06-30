@extends('layouts.admin_panel')
@section('content')
@include('admin.element.success-message')
 <div class="content">
        <div class="container-fluid">
           <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     @include('admin.element.breadcrumb')
                    <div class="card">
                      <div class="card-body search_form">
                          @php 
                      if(isset($requested_user))
                          $requested_user = $requested_user;
                      else
                          $requested_user ="";
                          
                            if(isset($received_user))
                          $received_user =$received_user;
                      else
                          $received_user ="";
                          
                      if(isset($requested_status))
                          $requested_status = $requested_status;
                      else
                          $requested_status ="0";
                          
                        if(isset($received_status))
                          $received_status =$received_status;
                      else
                          $received_status ="0";
                     
                @endphp
                     <!--start-->
                        <form class="form-inline" action="{{ url('/admin/quotations/'.$status) }}" method="get">
                              {{csrf_field()}}
                           <div class="form-group col-md-3 col-sm-6 col-xs-12">
                              <label>Requester:</label>
                              <input value="{{$requested_user}}" type="text" class="form-control" name="requested_name" placeholder="Requested user">
                           </div>
                          <div class="form-group col-md-2 col-sm-6 col-xs-12">
                            <label>Requested:</label>
                             <select class="form-control" name="requested_status">
                                 <option value="" <?= ($requested_status==0)?"selected":""?>>Status</option>
                                 <option value="Pending" <?= ($requested_status=="Pending")?"selected":""?>>Pending</option>
                                 <option value="Received" <?= ($requested_status=="Received")?"selected":""?>>Received</option>
                               </select>
                          </div>
                           <div class="form-group col-md-3 col-sm-6 col-xs-12">
                              <label class="pr-11">Receiver:</label>
                              <input value="{{$received_user}}" type="text" class="form-control" name="receiver_name" placeholder="Received name">
                           </div>
                          <div class="form-group col-md-2 col-sm-6 col-xs-12">
                            <label class="pr-11">Received:</label>
                             <select class="form-control" name="received_status">
                                 <option value="" <?= ($received_status==0)?"selected":""?>>Status</option>
                                   <option value="Pending" <?= ($received_status=="Pending")?"selected":""?>>Pending</option>
                                 <option value="Received" <?= ($received_status=="Received")?"selected":""?>>Received</option>
                               </select>
                          </div>
                          <div class="form-group pt-2em col-md-2 col-sm-6 col-xs-12">
                            <button type="submit" class="btn btn-success">Search</button>
                            <a  class="btn btn-reset" href="{{ url('/admin/quotations/received') }}">Reset</a>
                          </div>
                         
                        </form>
                        <!--end-->
                      </div>
                    </div>
                  </div>
              </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title "> Quotation History List</h4>
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
                                   
                                     @foreach($quotation->received_company as $received)
                                     <!--echo "<p>";-->
                                     <!--echo (strlen($received->user->name)>25)?substr($received->user->name,0,25)."...":$received->user->name;-->
                                     <!--echo "</p>";-->
                                     <p>
                                
                                
                                  <a href="{{ url('companydetail/'.$received->cate->category_url.'/'.$received->company_url)}}" target="_blank"><u> @php echo (strlen($received->user->name)>25)?substr($received->user->name,0,25)."...":$received->user->name;
                                @endphp</u></a>
                                
                                </p>
                                
                                
                                  
                                     @endforeach
                                  
                                     
                                     
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
                            <div class="pull-right">
                            {{ $quotations->appends($data)->links() }}
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    
@include('admin.admin.elements.quotation_modal')
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
                 <span id="received_company_status"></span><br>
                 <select class="form-control"  name="received_status" id="received_status" received_status_id="" user_id="">
                    <option value="">Change Received Status</option>
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
@endsection