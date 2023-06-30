@extends('layouts.user')
@section('content')
<body class="freelancers">
    <style>
         th{
           text-align:center;   
         }
    </style>
    
<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
  <!--preloader end--> 
  <!--main-header start-->
   @include('element.header')
<!--main-header end--> 
  <!--main-header end--> 
   <section class="inner-heading" style="background-image: url('{{ asset('storage/member/'.$projectsetting->member_background_image)}}');">
    <div class="container">
    <h1>{{ Auth()->user()->name }}'s Requested Quotation List</h1>     
    </div>
  </section>
<section class="inner-wrap service_detail">
        <div class="container">
          <div class="row">
             <ul class="blog-grid">
               
                        <div class="col-md-9 col-sm-12">
                            <li>
                                  @if(count($quotations) > 0 )
                    <div class="row our_services">
                        <!--start-->
                @php $count=1;
                @endphp
                @foreach($quotations as $quotation)
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="quotation_hist_list">
                  <div class="row">
                    <div class="col-md-6 col-sm-9 col-xs-9">
                      <div class="row quote_detail">
                        
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <span><i class="fa fa-calendar" aria-hidden="true"></i> Requested Date  </span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <span>:  {{ $quotation->created_at }} </span>
                        </div>
                         <div class="col-md-6 col-sm-6 col-xs-6">
                          <span><i class="fa fa-home" aria-hidden="true"></i> Category  </span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <span>:  <?= $quotation->category->name ?></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-3 col-xs-3">
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
                                          <?php
                                          
                                         if($quotation->contact_email != NULL)
                                         {
                                             
                                       $contact_email= $quotation->contact_email;
                                 
                                         }else{
                                              
                                        $contact_email= $quotation->send_user->email;  
                                         }
                                          if($quotation->contact_person_name != NULL)
                                         {
                                             
                                       $contact_person_name= $quotation->contact_person_name;
                                 
                                         }else{
                                              
                                        $contact_person_name= $quotation->send_user->name;  
                                         }
                                          if($quotation->contact_phone != NULL)
                                         {
                                             
                                       $contact_phone= $quotation->contact_phone;
                                 
                                         }else{
                                              
                                        $contact_phone= $quotation->send_user->phone;  
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
                                        " data-created_at="{{ $quotation->created_at }}" data-updated_at="{{$quotation->updated_at}}">
                      <span class="pull-right"><i class="fa fa-eye" aria-hidden="true"></i> Detail</span></a>
                    </div>
                  </div>
           
                  <table class="table table-stripe" >
                  <thead>
                    <tr >
                      <th width="5%" style="text-align:left">No</th>
                      <th width="55%" style="text-align:left">Receiver</th>
                      <th width="20%" style="text-align:left">Received Status</th>
                      <th width="20%" style="text-align:left">Requested Status</th>
                    </tr>
                  </thead>
                  <tbody>
                       @php $count_item=1; @endphp
                      @foreach($quotation->received_company as $received)
                      @if($received->cate->category_id==1)
                    <?php $url='servicecompanydetail'; ?>
                     @elseif($received->cate->category_id==2)
                    <?php  $url='suppliercompanydetail'; ?>
                     @elseif($received->cate->category_id==3)
                    <?php $url='renobusinessdetail'; ?>
                     @endif
                    <tr>
                      <td>{{ $count_item }}</td>
                      <td><a href="{{ url('/'.$url.'/'.$received->cate->category_url.'/'.$received->company_url)}}" target="_blank"><u> @php echo (strlen($received->user->name)>25)?substr($received->user->name,0,25)."...":$received->user->name;
                                             @endphp</u></a></td>
                      <td>
                       
                     @php echo $received->pivot->received_status; @endphp
                                       
                      </td>
                       <td >
                          
                          <select company_id="{{$received->id}}" quotation_id="<?= $quotation->id ?>" name="requested_status" class="form-control status_change" status="requested">
                                        <?php
                                          foreach($quotation_statuses as $quotation_status){
                                              if($quotation_status ==   $received->pivot->requested_status)
                                                  $selected = "selected";
                                              else
                                                  $selected = "";
                                          ?>
                                          <option value="<?= $quotation_status?>" <?= $selected ?>><?= $quotation_status ?>
                                          </option>
                                          <?php }?>
                                        </select>
                                        
                      </td>
                    </tr>
                     @php $count_item++; @endphp
                    @endforeach
                    
                  </tbody>
                </table>
                </div>
               
              </div>
              @php $count++; @endphp
              @endforeach
              <!-end--->
            </div>
                              <div class="pagination-area">
                                <ul class="pagination">
                                   {{ $quotations->links() }}
                                </ul>
                              </div>
                <!--          </div>-->
                <!--</div>-->
             <!--</div>-->
             <!--                       </div>-->
             <!--                   </div>-->
             @else
               <div class="blog-inter" style="min-height:350px">
                  @include('element.404')
              </div>
             @endif
                                </li>
                                </div>
                                
                                 <li class="col-md-3 col-sm-12">
                                    <div class="side-bar" > 
            <!--  <div class="side-barBox"> -->
              <div class="side-barBox" >
                 <h5 class="side-barTitle" style="background:linear-gradient(90deg, {{ $projectsetting->freelancer_nav_first_background_and_icon }} 50%, {{ $projectsetting->freelancer_nav_second }}) !important;color:{{ $projectsetting->freelancer_nav_font_color}} !important">Summary</h5>
                     <table class="table">
                  <tbody>
                     
                    <tr>
                      <td colspan="3">Total Coin
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ Auth::user()->coin }}</td>
                    </tr>
                    <tr>
                      <td colspan="3">Left Coin
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ Auth::user()->left_coin }}</td>
                    </tr>
                    <tr>
                      <td colspan="3">Used Coin
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ Auth::user()->coin  -  Auth::user()->left_coin }}</td>
                    </tr>
                    
                     <tr>
                      <td colspan="3">Request Quotation
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ $quotations_request_count }}</td>
                    </tr>
                     <tr>
                      <td colspan="3">Approve Quotation
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ $quotations_success_count }}</td>
                    </tr>
                    
                    <tr>
                      <td colspan="3">Request Coin Plan
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ $usercoin_lists_count }}</td>
                    </tr>
                    
                    <tr>
                      <td colspan="3">Received Coin Plan
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ $usercoin_received }}</td>
                    </tr>
                    
                  </tbody>
                </table>
                </div>
             <!-- </div> -->
          </div>
                                    
                                </li>
                               
                                </ul>
                        </div>
                    </div>
                     </section>
  @include('admin.admin.elements.quotation_modal')
  <script type="text/javascript">
      //start
       $(document).ready(function(){ 
                  $('.status_change').on('change',function(){ 
                        var getval = $(this).val();
                        var quotation_id = $(this).attr('quotation_id');
                        var company_id = $(this).attr('company_id');
                        var status = $(this).attr('status');
                       /* var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){ */
                            $.ajax({ 
                            url: "{{ URL::route('quotation.updatestatus') }}",
                            type: 'POST',
                            data: {'quotation_id' : quotation_id,"selectedvalue":getval,'status':status,'company_id':company_id},
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
                      
                });
       });
                //end
  </script>
@endsection