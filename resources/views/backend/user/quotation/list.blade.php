@extends('backend.layouts.user_panel')
@section('title','Myanbox | Requested Quotation List')
@section('extra_css')
    <style>
        th{
            text-align:center;
        }
    </style>
@endsection
@section('content')
<div class="freelancers">

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
                                              $receiver_name .='('.$received_count.'). '.$received->user->name.",<br>";
                                            else
                                              $receiver_name .='('.$received_count.'). '.$received->user->name;
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
                                         data-minimum="{{number_format($quotation->range->minimum_price)}}"
                                        data-maximum="{{number_format($quotation->range->maximum_price)}}"
                                        data-unit="{{$quotation->range->currency_unit->unit}}"
                                        data-category="{{$quotation->category->name}}"
                                        data-project_expected_start_date="{{$quotation->project_expected_start_date}}"
                                        data-project_information="{{$quotation->project_information}}"
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
                      <th width="40%" style="text-align:left">Company Name</th>
                      <th width="30%" style="text-align:left">Company's Approved Status</th>
                      <th width="25%" style="text-align:left">Email Received Status</th>
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

                          <select company_id="{{$received->id}}" quotation_id="<?= $quotation->id ?>" data-control="status" name="requested_status" class="form-control status_change" status="requested">
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
                    <tr>
                      <td colspan="4" class="text-center">
                      <small>* If you have received a quotation email from the requested company,please change the email received status to <B>Success</B>. *</small>
                      </td>
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
                              @else
                              <div class="blog-inter" style="min-height:350px">
                  @include('element.404')
              </div>
              @endif
                <!--          </div>-->
                <!--</div>-->
             <!--</div>-->
             <!--                       </div>-->
             <!--                   </div>-->
                                </li>
                                </div>

                             @include('backend.element.user_menu')


                                </ul>
                        </div>
                    </div>
                     </section>
  @include('admin.admin.elements.quotation_modal')
</div>
@endsection
@section('script')
  <script type="text/javascript">
      //start
       $(document).ready(function(){
                  $('.status_change').on('change',function(){
                       $("[data-control='status']").prop('disabled', true);
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
