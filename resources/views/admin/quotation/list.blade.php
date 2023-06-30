@extends((Auth::user()->role == 2) ? 'layouts.company_panel' : ((Auth::user()->role == 4 || Auth::user()->role == 5)?'layouts.admin_panel': 'layouts.user'))
@section('content')
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title "> @php echo ($status == "received")?"Received":(($status == "success")?"Received Success":(($status=="pending")?"Received Pending":"Requested")) @endphp Quotation List</h4>
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
                                        @if($status=="received" || $status=="success"|| $status=="pending")
                                        <th data-field="send_user_id" data-editable="true">Sender</th>
                                        @elseif($status=="requested")
                                        <th data-field="received_user_id" data-editable="true">Receiver</th>
                                        @endif
                                        <th data-field="received_status" data-editable="true">Received Status</th>
                                        <th data-field="requested_status" data-editable="true">Requested Status</th>
                                        @if(Auth::user()->role != 1)
                                        <th data-field="prefer_contact_way" data-editable="true">Prefer Contact Way</th>
                                        <th data-field="prefer_contact_time" data-editable="true">Best Contact Time</th>
                                        <th data-field="used_coin" data-editable="true">Used Coin</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                 @php $count=1;  @endphp
                                 @foreach($quotations as $quotation):
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td> 
                                      <?php $file = unserialize($quotation->file);
                                          $contact_way = unserialize($quotation->prefer_contact_way);
                                          $best_time = unserialize($quotation->best_contact_time);
                                          $address = $quotation->address.",";
                                           $address .= $quotation->location->name.",";
                                            $receiver_name ="";$received_count=1;
                                           foreach($quotation->received_company as $received){
                                           if($quotation->received_company->count() >1 && $received_count != sizeof($quotation->received_company))
                                              $receiver_name .=$received->user->name."<br>";
                                            else
                                              $receiver_name .=$received->user->name;
                                            $received_count++;
                                          }
                                           foreach($cities as $city){
                                            if($quotation->location->parent_id == $city->id)
                                              $address .=$city->name;
                                           }
                                         ?>
                                        <a class="show-modal"
                                         data-id="{{$quotation->id}}"
                                         data-contact_person_name="{{$quotation->contact_person_name}}" data-best_contact_time="{{ (!empty($best_time))?implode('|',$best_time):''}}" data-contact_email="{{$quotation->contact_email}}" data-contact_phone="{{$quotation->contact_phone}}" data-prefer_contact_way="{{ (!empty($contact_way))?implode('|',$contact_way):''}}" 
                                        data-address="{{$address}}"
                                        data-building_type="{{$quotation->building_type}}"
                                         data-minimum="{{$quotation->range->minimum_price}}" 
                                        data-maximum="{{$quotation->range->maximum_price}}"
                                        data-category="{{$quotation->category->name}}"
                                        data-project_expected_start_date="{{$quotation->project_expected_start_date}}"
                                        data-project_information="{{$quotation->project_current_situation}}"
                                        data-file = "{{(!empty($file))?implode('|',$file):''}}"
                                        data-used_coin="{{$quotation->used_coin}}"
                                        data-send_user_name="{{$quotation->send_user->name}}"
                                        data-received_company="{{ $receiver_name}}"
                                        data-created_by="{{ $quotation->creater }}"
                                        data-updated_by="{{ $quotation->updater }}
                                        " data-created_at="{{ $quotation->created_at }}" data-updated_at="{{$quotation->updated_at}}"><?= $quotation->range->minimum_price ?> ~ <?= $quotation->range->maximum_price ?></a></td>
                                        <td><?= $quotation->category->name ?></td>                                        
                                       @if($status =="received" || $status =="success"||$status=="pending")
                                       <td>{{$quotation->send_user->name}}</td>
                                        <td>
                                            <select company_id="{{Session::get('login_company_id')}}" quotation_id="<?= $quotation->id ?>" id="<?= $quotation->id ?>" name="received_status" class="form-control status_change" status="received">
                                                <?php
                                                foreach($quotation_statuses as $quotation_status){
                                                    if($quotation_status == $quotation->received_company[0]->pivot->received_status)
                                                        $selected = "selected";
                                                    else
                                                        $selected = "";
                                                ?>
                                                <option value="<?= $quotation_status?>" <?= $selected ?>><?= $quotation_status ?>
                                                </option>
                                                <?php }?>
                                            </select>
                                            </td>
                                            @if(Auth::user()->role == 2)
                                                <td>{{ $quotation->received_company[0]->pivot->requested_status }}</td>
                                            @else
                                            <td>
                                            <select company_id="{{Session::get('login_company_id')}}" quotation_id="<?= $quotation->id ?>" id="<?= $quotation->id ?>" name="request_status" class="form-control status_change" status="request">
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
                                     @elseif($status=="requested")
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
                                          @php echo $received->pivot->received_status."<br><br>"; @endphp
                                        @endforeach
                                        </td>
                                        <td>
                                        @foreach($quotation->received_company as $requested)
                                        <select company_id="{{$requested->id}}" quotation_id="<?= $quotation->id ?>" name="requested_status" class="form-control status_change" status="requested">
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

                                     @endif
                                     @if(Auth::user()->role != 1)
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
                                         {{ $quotation->used_coin }}
                                     </td>
                                     @endif  
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
        @include('admin.admin.elements.quotation_modal')
@endsection