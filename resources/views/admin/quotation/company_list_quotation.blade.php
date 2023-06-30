@extends('layouts.company_new_panel')
@section('title','Myanbox | Quotation')
@section('content')

<body class="suppliers">
<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
  <!--preloader end--> 
  <!--main-header start-->
   @include('element.header')
  <!--main-header end--> 
   @if(Session::get('parent_category_id') == 1)
       @if(!empty($company->cover_photo))
  <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->service_default_background_image) }}');">
  @endif
  @elseif(Session::get('parent_category_id') == 2)
   @if(!empty($company->cover_photo))
  <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->supplier_default_background_image) }}');">
  @endif
  @elseif(Session::get('parent_category_id') == 3)
   @if(!empty($company->cover_photo))
  <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->reno_default_background_image) }}');">
  @endif
  @endif
    <div class="container">
      <h1>Quotation History List</h1>
    </div>
  </section>
<!--inner content start-->
<div class="container-fluid" style="margin-top: -3em;z-index: 4;">
      <input type="file" id="cover_file" name="cover_photo" accept="image/*" class="hide">
       <label class="pull-right edit_btn" for="cover_file">
    <i class="fa fa-camera" style="color:white;padding:10px;background: #ffcc32;border-radius: 20px" aria-hidden="true"></i></label>
</div>
  
  <section class="inner-wrap service_detail"> 
    <!--container start-->
    <div class="container">
      <!--row start-->
      <ul class="blog-grid">
        
        <!--col start-->
        @include('element.company_menu')
       
           
        
         
        </div>
      <div class="col-md-9 col-sm-12">
                   <li>
              @if(count($quotations) > 0 )
            <div class="row our_services">
                @php $count=1; @endphp
                
                  
                   
                @foreach($quotations as $quotation) 
                 @if($status=="requested")
                 
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="quotation_hist_list">
                  <div class="row">
                    <div class="col-md-6 col-sm-9 col-xs-9">
                      <div class="row quote_detail">
                        <!--<div class="col-md-6 col-sm-6 col-xs-6">-->
                        <!--  <span><i class="fa fa-user" aria-hidden="true"></i> Requester</span>-->
                        <!--</div>-->
                        <!--<div class="col-md-6 col-sm-6 col-xs-6">-->
                        <!--  <span>: <a href="#"><u>{{ $company->user->name }}</u></a>  </span>-->
                        <!--</div>-->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <span><i class="fa fa-calendar" aria-hidden="true"></i> Requested Date  </span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <span>: {{ $quotation->created_at }} </span>
                        </div>
                         <div class="col-md-6 col-sm-6 col-xs-6">
                          <span><i class="fa fa-home" aria-hidden="true"></i> Category  </span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <span>: <?= $quotation->category->name ?> </span>
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
                                         data-contact_person_name="{{$contact_person_name}}" data-best_contact_time="{{ (!empty($best_time))?implode('|',$best_time):''}}" data-contact_email="{{ $contact_email }}" data-contact_phone="{{$contact_phone}}" data-prefer_contact_way="{{ (!empty($contact_way))?implode('|',$contact_way):''}}" 
                                        data-address="{{ $address }}"
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
                                        data-updated_by="{{ $quotation->updater }}" data-created_at="{{ $quotation->created_at }}" data-updated_at="{{$quotation->updated_at}}">
                      <span class="pull-right"><i class="fa fa-eye" aria-hidden="true"></i> Detail</span></a>
                    </div>
                  </div>
           
                  <table class="table table-stripe" >
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th width="55%">Receiver</th>
                      <th width="20%">Received Status</th>
                      <th width="20%">Requested Status</th>
                    </tr>
                  </thead>
                  <tbody>
                      <!--start-->
                      @php $count_item=1; @endphp
                      @foreach($quotation->received_company as $received)
                    <tr>
                      <td>{{ $count_item }}</td>
                      <td><a href="{{ url('companydetail/'.$received->cate->category_url.'/'.$received->company_url)}}" target="_blank"><u> @php echo (strlen($received->user->name)>25)?substr($received->user->name,0,25)."...":$received->user->name;
                                             @endphp</u></a></td>
                      <td>
                        <!--<select company_id="65" quotation_id="9" name="received_status" class="form-control status_change" status="received">-->
                        <!--  <option value="pending" selected="">pending</option>-->
                        <!--    <option value="received">received</option>-->
                        <!--  </select>-->
                            @php echo $received->pivot->received_status."<br><br>"; @endphp
                      </td>
                       <td >
                        <!--<select company_id="65" quotation_id="9" name="requested_status" class="form-control status_change" status="requested">-->
                        <!--  <option value="pending" selected="">pending</option>-->
                        <!--    <option value="received">received</option>-->
                        <!--  </select>-->
                         
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
               @elseif($status =="received")
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="quotation_hist_list">
                  <div class="row">
                    <div class="col-md-6 col-sm-9 col-xs-9">
                      <div class="row quote_detail">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <span><i class="fa fa-user" aria-hidden="true"></i> Requester</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                           @if($quotation->send_user->role == '2')
                             <span>: <a href="{{ url('companydetail/'.$quotation->main_category->category_url.'/'.$quotation->main_category->company_url)}}"><u>{{ $quotation->send_user->name }}</u></a>  </span>
                            @else
                            <span>: <a class="show-request-modal" data-id="{{$quotation->send_user->id}}" data-name="{{ $quotation->send_user->name }}" data-email="{{ $quotation->send_user->email }}" data-phone="{{ $quotation->send_user->phone }}"><u>{{ $quotation->send_user->name }}</u></a>  </span>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <span><i class="fa fa-calendar" aria-hidden="true"></i> Requested Date  </span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <span>: {{ $quotation->created_at }} </span>
                        </div>
                         <div class="col-md-6 col-sm-6 col-xs-6">
                          <span><i class="fa fa-home" aria-hidden="true"></i> Category  </span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <span>: <?= $quotation->category->name ?> </span>
                        </div>
                        <!--start-->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <span><i class="fa fa-home" aria-hidden="true"></i> Request Status  </span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                        <span>:{{ $quotation->received_company[0]->pivot->requested_status }}</span>
                        </div>
                        <!--end-->
                        <!--start-->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <span><i class="fa fa-home" aria-hidden="true"></i> Received Status : </span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
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
                        </div>
                        <!--end-->
                        
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
                                         if($quotation->contact_email != '' && $quotation->contact_email !=null)
                                         {
                                             $contact_email= $quotation->contact_email;
                                         }else{
                                          $contact_email= $quotation->send_user->email;  
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
                                         data-contact_person_name="{{ $contact_person_name }}" data-best_contact_time="{{ (!empty($best_time))?implode('|',$best_time):''}}" data-contact_email="{{ $contact_email }}" data-contact_phone="{{$contact_phone}}" data-prefer_contact_way="{{ (!empty($contact_way))?implode('|',$contact_way):''}}" 
                                        data-address="{{ $address }}"
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
                </div>
              </div>
                @endif
                @php $count++; @endphp
                @endforeach
             
            </div>
             <div class="pagination-area">
             <ul class="pagination">
                  {{ $quotations->links() }}
            <!--    <li class="active"><a href="#">1</a></li>-->
            <!--    <li><a href="#">2</a></li>-->
            <!--    <li><a href="#">3</a></li>-->
            <!--    <li><a href="#">4</a></li>-->
            <!--    <li><a href="#">5</a></li>-->
            <!--    <li><a href="#">6</a></li>-->
            <!--    <li><a href="#">7</a></li>-->
            <!--    <li><a href="#">8</a></li>-->
             </ul>
            </div>
            @else
             <div class="blog-inter" style="min-height:350px">
                  @include('element.404')
              </div>
            @endif
          </li>
          
      </div>
      </ul> 

      </div>    
    </div>      
    <!--container end--> 
  </section>
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
         <script  type="text/javascript">
            $(document).on('click','.show-request-modal', function() {
                    $('.sender-modal-title').text('Detail Information');
                    $('#sender_name').html($(this).data('name'));
                    $('#sender_email').html($(this).data('email'));
                    $('#sender_phone').html($(this).data('phone'));
                    $('#showrequestModal').modal('show');
                });
        </script>
  
  @include('admin.admin.elements.quotation_modal')
 <!--inner content end--> 
<!--brand-section start-->
@include('element.company_logo_slider')
<!--brand-section end--> 
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

