@extends('frontend.layouts.homeapp')
@section('title','Myanbox | Quotation')
@section('content')
<div class="company_services">

<section class="inner-heading" style="background-image: url('{{ asset('images/heading-bg.png')}}');">
    <div class="container">
      <h1>Get a quote</h1>
      <ul class="xs-breadcumb">
        <li><a href="{{url('/')}}"> Home  / </a>Get a quote</li>
      </ul>
    </div>
</section>
<section class="inner-wrap">
    <!--container start-->
    <div class="container">
       <div class="row send_quotation_history">
        <ul class="blog-grid">
          <div class="col-md-6 pr10 col-sm-6">
            <li>
              <div class="blog-inter">
                  @if(empty(Session::get('quotation_data')['company_id']))
                  <div class="panel">
                  <div class="panel-heading">
                    <form id="company_search" method="post">
                    {{csrf_field()}}
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <input class="project_type form-control" id="company" autocomplete="off" name="company_name" placeholder="Please Enter Company Name">
                         </div>
                        </div>

                      </div>
                   </form>
                  </div>
                
                @if(!empty($third_plan_companies) || !empty($second_plan_companies) || !empty($first_plan_companies))
                <form id="send_quotation">
                 <div class="panel-body">
                    <div class="row service">
                       <div class="col-md-12 overflow company_default_plan_list">
                          <div class="list-group">
                            @php
                              $third_plan = sizeof($third_plan_companies);
                              $second_plan = sizeof($second_plan_companies);
                              $first_plan  = sizeof($first_plan_companies);
                              $max = max($first_plan,$second_plan,$third_plan);
                            @endphp
                           
                            @if($max ==1)
                                @if(!empty($third_plan_companies[0]) && $third_plan == $max)
                                   @include('frontend.element.company_quotation_list',['datas'=>$third_plan_companies[0],'project_setting'=>$projectsetting])
                              @endif
                              @if(!empty($second_plan_companies[0]) && $second_plan == $max)
                                  @include('frontend.element.company_quotation_list',['datas'=>$second_plan_companies[0],'project_setting'=>$projectsetting])
                              @endif
                              @if(!empty($first_plan_companies[0]) && $first_plan_companies== $max)
                                  @include('frontend.element.company_quotation_list',['datas'=>$first_plan_companies[0],'project_setting'=>$projectsetting])
                              @endif
                         @else
                                @for($i=0; $i<=($max-1); $i++)
                                  @if(!empty($third_plan_companies[$i]))
                                   @include('frontend.element.company_quotation_list',['datas'=>$third_plan_companies[$i],'project_setting'=>$projectsetting])
                                  @endif
                                   @if(!empty($second_plan_companies[$i]))
                                      @include('frontend.element.company_quotation_list',['datas'=>$second_plan_companies[$i],'project_setting'=>$projectsetting])
                                  @endif
                                  @if(!empty($first_plan_companies[$i]))
                                      @include('frontend.element.company_quotation_list',['datas'=>$first_plan_companies[$i],'project_setting'=>$projectsetting])
                                  @endif
                              @endfor
                              
                            @endif
                          </div>
                       </div>
                      </div>
                    </div>
                    <div class="panel-footer">
                         <span class="text text-danger">*** Choose 5 maximum Company per request</span><br>
                         <input type="checkbox" name="privacy" id="privacy" value="1"><label for="privacy">  By continuing,you agree  <a href="{{ url('/privacy-policy')}}" target="_blank"><u><b>Privacy Policy </b></u></a> and <a href="{{ url('/terms-and-service')}}" target="_blank"><u><b> Terms of Service </u></b></a></label> 
                         <input type="submit" name="submit" value="Confirm" class="btn btn_get_quote pull-right">
                         <div class="clearfix"></div>
                    </div>
                   </form>
                    @else
                  <div class="panel-body">
                    <div class="row service">
                       <div class="col-md-12 overflow">
                         <div class="list-group">
                          <img src="{{ asset('images/not_found.png') }}" class="img-responsive">
                        </div>
                        </div>
                      </div>
                    </div>
                    <div class="panel-footer" style="padding: 15px;">
                      <span class="text-danger">Sorry! Not found that match with your selected company category type.Please try again by choosing another category type.</span>
                    </div>
                    @endif
                 </div>
                @else

                <div class="panel">
                  <div class="panel-heading">
                    <H1>{{$selectedCompany->user->name}}</H1>
                  </div>
                 <form id="send_quotation">
                  <input type="hidden" name="company_id[]" value="{{$selectedCompany->id}}">
                  <div class="panel-body">
                  <div class="row">
                    <div class="col-md-5 col-sm-4">
                      <figure class="style-greens-two green">
                         @if($selectedCompany->user->logo != null && $selectedCompany->user->logo !='undefined')
                           <img src="{{ asset('storage/company_logo/'.$selectedCompany->user->logo) }}" alt="{{$selectedCompany->user->name}}" class="img-responsive">
                           @else
                              @if($selectedCompany->categories == '1')
                                <img src="{{ asset('storage/company_logo/'.$projectsetting->service_default_logo) }}" alt="portfolio" class="img-responsive">
                              @elseif($selectedCompany->categories == '2')
                                 <img src="{{ asset('storage/company_logo/'.$projectsetting->supplier_default_logo) }}" alt="portfolio" class="img-responsive">
                              @else
                                <img src="{{ asset('storage/company_logo/'.$projectsetting->reno_default_logo) }}" alt="portfolio" class="img-responsive">
                              @endif
                           @endif

                          <div><i class="fa fa-plus"></i></div>
                       </figure>
                    </div>
                    <div class="col-md-7 col-sm-8">
                        <ul class="blogDate">
                          <li> <i class="fa fa-envelope" aria-hidden="true"></i> <span>{{ $selectedCompany->email }}</span> </li>
                          <li> <i class="fa fa-phone" aria-hidden="true"></i> <span>{{ $selectedCompany->phone }}</span> </li>
                        </ul>
                        <ul class="blogDate">
                          <li> <i class="fa fa-home" aria-hidden="true"></i><span> <?php
                                            $count =1; $category="";
                                               if(!empty($selectedCompany->categories))
                                               {
                                                 foreach($selectedCompany->child_categories as $child_category){
                                                      if(sizeof($selectedCompany->child_categories)==$count)
                                                          $category .= $child_category->name;
                                                      else
                                                          $category .=$child_category->name.",";
                                                  $count++;
                                                 }

                                                 echo (strlen($category) > 60)?substr($category, 0,60)."...":$category;
                                              }
                                              else{
                                                echo "-";
                                              }
                                              ?></span> </li>
                        </ul>
                    </div>
                  </div>
                  <div class="row send_quote">
                    <div class="col-md-12">
                      <h5>About Us</h5>
                       <p>
                         <?php  echo substr($selectedCompany->description,0,250).'...' ?>
                       </p>
                    </div>
                     <div class="col-md-12">
                      <h5>What We Do ?</h5>
                       <p>
                         <?php  echo substr($selectedCompany->service,0,250).'...' ?>
                       </p>
                    </div>
                  </div>
                </div>
                  <div class="panel-footer">
                         <input type="checkbox" name="privacy" id="privacy" value="1"> By continuing,you agree  <a href="{{ url('/privacy-policy')}}" target="_blank"><u><b>Privacy Policy </b></u></a> and <a href="{{ url('/terms-and-service')}}" target="_blank"><u><b> Terms of Service </u></b></a>
                         <input type="submit" name="submit" value="Confirm" class="btn btn_get_quote pull-right">
                         <div class="clearfix"></div>
                    </div>
              </div>
            </form>
             @endif
              </div>

            </li>
        </div>

          <div class="col-md-6 col-sm-12">
            <li>
              <div class="blog-inter">
                <div class="panel">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-md-8 col-sm-9 col-xs-12">
                        <H1>Requested Quote Detail</H1>
                      </div>
                      <div class="col-md-4 col-sm-3 col-xs-12">
                        <button data-dismiss="modal" aria-label="Close" data-toggle="modal"  class="btn edit-btn pull-right" style="background-color: #ffcc32"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="panel-body quote_detail_info">
              <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-6">
                  <label>Contact Person Name</label>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-6">
                  <span>{{ (!empty(Session::get('quotation_data')['contact_name']))?Session::get('quotation_data')['contact_name']:'-' }}</span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-6">
                  <label>Contact Phone</label>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-6">
                  <span>{{(!empty(Session::get('quotation_data')['contact_phone']))?Session::get('quotation_data')['contact_phone']:'-' }}</span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-6">
                  <label>Contact Email</label>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-6">
                  <span>{{(!empty(Session::get('quotation_data')['contact_email']))?Session::get('quotation_data')['contact_email']:'-' }}</span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-6">
                  <label>Project Type</label>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-6">
                  <span>
                      @if(!empty(Session::get('category_array')))
                       @php
                         $category_array =Session::get('category_array');
                         echo $category_array['parent']['name'];
                         if(!empty($category_array['child']))
                           foreach($category_array['child'] as $child_category)
                              echo ", ".$child_category['name'];

                       @endphp
                      @else
                        -
                      @endif

                  </span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-6">
                  <label>Building Type</label>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-6">
                  <span>
                   @php
                    echo (!empty(Session::get('quotation_data')['building_type']))?Session::get('quotation_data')['building_type']:'-'
                   @endphp
                  </span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-6">
                  <label>Expected Start Date</label>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-6">
                  <span>
                   @php
                    echo (!empty(Session::get('quotation_data')['project_expected_start_date']))?Session::get('quotation_data')['project_expected_start_date']:'-'
                   @endphp
                  </span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-6">
                  <label>Budget</label>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-6">
                  <span>
                      @if(!empty(Session::get('quotation_data')['budget']))
                       @php

                        foreach($ranges as $range)
                          if($range->id == Session::get('quotation_data')['budget'])
                              echo $range->minimum_price ."~".  $range->maximum_price;
                       @endphp
                      @else
                        -
                      @endif
                  </span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-6">
                  <label>Project Location</label>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-6">
                  <span>
                      @if(!empty(Session::get('location_array')))
                           @php
                           $location_array=Session::get('location_array');
                            echo $location_array['address'].", ".$location_array['city']['name'].", ".$location_array['township']['name'];
                           @endphp
                      @else
                        -
                      @endif
                  </span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-6">
                  <label>Uploaded File</label>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-6">
                  <span>
                      @if(!empty(unserialize(Session::get('quotation_data')['file'])))
                           @php
                              foreach(unserialize(Session::get('quotation_data')['file']) as $files){
                                  $path= asset('storage/quotation/'.$files);
                                echo "<a href='{{$path}}' download>".$files."</a><br>";
                              }
                           @endphp
                      @else
                        -
                      @endif
                  </span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-6">
                  <label>Prefer way to contact </label>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-6">
                  <span>
                       @if(!empty(unserialize(Session::get('quotation_data')['prefer_contact_way'])))
                          @php
                            $way_count = 0;
                            foreach(unserialize(Session::get('quotation_data')['prefer_contact_way']) as $way){
                              if($way_count == sizeof(unserialize(Session::get('quotation_data')['prefer_contact_way']) ))
                                echo $way;
                              else
                                echo $way.",";
                            $way_count++;
                            }
                          @endphp
                      @else
                        -
                      @endif
                </span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-6">
                  <label>Best Time to contact </label>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-6">
                  <span>
                      @if(!empty(unserialize(Session::get('quotation_data')['best_contact_time'])))
                          @php
                            $contact_count = 0;
                            foreach(unserialize(Session::get('quotation_data')['best_contact_time']) as $way){
                              if($contact_count == sizeof(unserialize(Session::get('quotation_data')['best_contact_time']) ))
                                echo $way;
                              else
                                echo $way.",";

                            $contact_count++;
                            }

                          @endphp
                      @else
                        -
                      @endif
                </span>
                </div>
              </div>
          </div>
        </div>
      </div>
    </li>
</div>
</ul>
</div>
</div>
</section>
@include('element.company_logo_slider')
<!--quote-modal start-->
<div class="modal fade bs-example-modal-md-2" tabindex="-1" role="dialog" id="edit_quote">
  <div class="modal-dialog modal-md-2" role="document">
    <div class="modal-content">
      <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
      <h2 class="modal-title text-uppercase">Change Requested Quote</h2>
      <form class="login-form edit_detail_next edit_next" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <fieldset>
          <div class="form-group project_type_div">
            @php
               $sub_category   = unserialize(Session::get('quotation_data')['subcategory_id']);
            @endphp
            <label>Project Type :</label>
            <label class="plr5">
                <input type="radio" name="category_id" id="service_category" class="company_category_id" value="1" <?php echo (Session::get('quotation_data')['category_id'] =="1")?"checked":''?>>  <span>Service</span>
            </label>
            <label class="plr5">
                <input type="radio" name="category_id" id="supplier_category" class="company_category_id" value="2" <?php echo (Session::get('quotation_data')['category_id'] =="2")?"checked":'' ?>>  <span>Supplier</span>
            </label>
            <label class="plr5">
                <input type="radio" name="category_id" id="reno_category" class="company_category_id" value="3" <?php echo (Session::get('quotation_data')['category_id'] =="3")?"checked":'' ?>>  <span>Reno Business</span>
            </label>
           
            </div>

            <div class="service_category" <?php echo (Session::get('quotation_data')['category_id'] !="1")?'style="display: none;"':'' ?>>
              @foreach($serviceCategories as $service_category)
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label>
                        <input class="company_subcategory_id" id="subcategory_id_{{$service_category->id}}" type="checkbox" name="subcategory_id[]" value="{{$service_category->id}}" <?php echo (!empty($sub_category)?(in_array($service_category->id,$sub_category)?"checked":''):'') ?>>  <span>{{$service_category->name}}</span>  
                  </label>
              </div>
              @endforeach
            </div>
            
            <div class="supplier_category" <?php echo (Session::get('quotation_data')['category_id'] !="2")?'style="display: none;"':'' ?>>
              @foreach($supplierCategories as $supplier_category)
              <div class="col-md-6 col-sm-6 col-xs-12">
                    <label>
                    <input class="company_subcategory_id" id="subcategory_id_{{$supplier_category->id}}" type="checkbox" name="subcategory_id[]" value="{{$supplier_category->id}}" <?php echo (!empty($sub_category)?(in_array($supplier_category->id,$sub_category)?"checked":''):'') ?>>  <span>{{$supplier_category->name}}</span>
                    </label>
              </div>
              @endforeach
            </div>
            <div class="reno_category" <?php echo (Session::get('quotation_data')['category_id'] !="3")?'style="display: none;"':'' ?>>
              @foreach($renobusinessCategories as $reno_category)
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label>
                    <input class="company_subcategory_id" id="subcategory_id_{{$reno_category->id}}" type="checkbox" name="subcategory_id[]" value="{{$reno_category->id}}" <?php echo (!empty($sub_category)?(in_array($reno_category->id,$sub_category)?"checked":''):'') ?>>  <span>{{$reno_category->name}}</span>
                  </label>
              </div>
              @endforeach
            </div>
            <br>
            <span class="text-danger pull-left" id="category_label">
            </span>
          <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                  <label>Budget<span class="text-danger"> * </span></label>
                  <select name="budget" class="form-control">
                      <option selected="selected" disabled="disabled">Budget</option>
                      @foreach($ranges as $range)
                       @php
                       if(Session::get('quotation_data')['budget'] == $range->id)
                          $res = "selected";
                        else
                          $res = "";
                        @endphp
                       <option value="{{ $range->id }}" <?php echo $res ?>>{{ $range->minimum_price }} ~ {{ $range->maximum_price }}</option>
                       @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Project Expected To Start Date</label>
                    <input type="date" name="project_expected_start_date" class="form-control" id="project_expected_start_date" min="<?php echo date("Y-m-d"); ?>" value="{{Session::get('quotation_data')['project_expected_start_date']}}">

                </div>
            </div>
            <small class="text-danger" id="budget_label">
             </small>
          </div>
          <div class="form-group">
            <label>Building Type <span class="text-danger"> * </span></label>
            <input type="text" name="building_type" class="form-control" id="building_type" placeholder="Building Type" value="{{Session::get('quotation_data')['building_type']}}">
            <small class="text-danger" id="building_type_label">
             </small>
          </div>
           <div class="form-group">
            <label>Project Information<span class="text-danger"> * </span></label>
            <textarea  rows="4" cols="50" name="project_information" class="form-control" id="project_information" placeholder="Please Ener Project Information" style="resize: none;">{{Session::get('quotation_data')['project_information']}}</textarea>
            <small class="text-danger" id="project_information_label">
             </small>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <label>City<span class="text-danger"> * </span></label>
                <select class="form-control" name="city" id="city">
                    <option value="">Select City</option>
                    @foreach($cities as $city)

                    <option value="{{$city->id}}" <?php echo(Session::get('quotation_data')['city'] == $city->id)?"selected":"" ?>>{{$city->name}}</option>
                    @endforeach
                </select>
                <small class="text-danger" id="city_label">
             </small>
              </div>
              <div class="col-md-6 col-sm-6">
                <label>Township<span class="text-danger"> * </span></label>
                <select class="form-control" name="township" id="township">
                    <option value="">Select Township</option>
                    <?php
                        foreach($townships as $township){
                          if($township->parent_id == Session::get('quotation_data')['city']){
                    ?>
                          <option value={{$township->id}}" <?php echo($township->id == Session::get('quotation_data')['township']) ?"selected":''?>>{{$township->name}}
                          </option>
                      <?php }} ?>
                </select>
                <small class="text-danger" id="township_label">
                </small>
              </div>
            </div>
          </div>
          <div class="form-group">
              <label>Street Address<span class="text-danger"> * </span></label>
              <input type="text" name="address" class="form-control" id="address" placeholder="Street Address" value="{{Session::get('quotation_data')['address']}}">
              <small class="text-danger" id="address_label">
             </small>
          </div>
          <div class="form-group">
              <label>Contact Person Name</label>
              <input type="text" name="contact_name" class="form-control" id="contact_name" placeholder="Contact Person Name" value="{{Session::get('quotation_data')['contact_name']}}" maxlength="50">
          </div>
         <div class="form-group" id="email_add_more_field">
            <label>Contact Email Address</label>
            <!-- //initially one field is set -->
      @php
        if(!empty(Session::get('quotation_data')['contact_email'])){
          $email_arr = explode(',',Session::get('quotation_data')['contact_email']);
          $email_count=1;
          foreach($email_arr as $email_list){
            if($email_count == sizeof($email_arr))
              continue;
         @endphp
            <div class="row meta-field">

              <div class="col-md-11">
                <div class="form-group">
                  <input class="form-control" id="edit_contact_email{{$email_count}}" name="contact_email" value="{{trim($email_list)}}" type="email" placeholder="Contact Email Address">
                </div>
              </div>
              @if($email_count == 1)
              <div class="col-md-1">
                <div class="bordered">
                   <a class="pull-right add_more"  href="#" ><i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                </div>
              </div>
              @else
              <div class="col-md-1">
                <a href="#" class="add_more_close"><i class="fa fa-minus" aria-hidden="true"></i></a>
              </div>
              @endif
            </div>
          @php
            $email_count++;
            }
          }
        else{ @endphp
         <div class="row meta-field">
              <div class="col-md-11">
                <div class="form-group">
                  <input class="form-control" id="edit_contact_email1" name="contact_email" value="" type="email" placeholder="Contact Email Address">
                </div>
              </div>
              <div class="col-md-1">
                <div class="bordered">
                   <a class="add_more pull-right"  href="#" ><i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                </div>
              </div>
            </div>
          @php
          }
          @endphp

        </div>
        <div class="form-group" id="phone_add_more_field">
            <label>Contact Phone Number<span class="text-danger"> * </span></label>
            <!-- //initially one field is set -->
        @php
        if(!empty(Session::get('quotation_data')['contact_phone'])){
          $phone_arr = explode(',',Session::get('quotation_data')['contact_phone']);
          $phone_count=1;
          foreach($phone_arr as $phone_list){
            if($phone_count == sizeof($phone_arr))
              continue;
         @endphp
            <div class="row meta-field1">
              <div class="col-md-11">
                <div class="form-group">
                  <input class="form-control" id="edit_contact_phone{{$phone_count}}" name="contact_phone" value="{{trim($phone_list)}}" type="number" placeholder="Contact Phone Number"  maxlength="11">
                  <small class="text-danger" id="contact_phone_label"></small>
                </div>
              </div>
            @if($phone_count == 1)
              <div class="col-md-1">
                <a class="add_more1" href="#" ><i class="fa fa-plus" aria-hidden="true"></i></a>
              </div>
            @else
              <div class="col-md-1">
                <a href="#" class="add_more_close"><i class="fa fa-minus" aria-hidden="true"></i></a>
              </div>
            @endif
        </div>
        @php
            $phone_count++;
          }
        }
        else{ @endphp
         <div class="row meta-field1">
              <div class="col-md-11">
                <div class="form-group">
                  <input class="form-control" id="edit_contact_phone1" name="contact_phone" value="" type="number" placeholder="Contact Phone">
                </div>
              </div>
              <div class="col-md-1">
                <div class="bordered">
                   <a class="add_more1 pull-right"  href="#" ><i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                </div>
              </div>
            </div>
          @php
          }
          @endphp
      </div>
           <div class="form-group">
              <div class="row">
                 <div class="col-md-12">
                     <label>Please Upload Files <small class="file_error">(Allowed file type :doc, docx,pdf,txt.)</small></label>
                </div>
                <div class="col-md-4">
                      <input type="file" name="quotation_file" class="form-control" id="quotation_file" title="No File" >

                </div>

                <div class="col-md-4">
                      <input type="file" name="quotation_file1" class="form-control" id="quotation_file1">
                </div>
                <div class="col-md-4">
                      <input type="file" name="quotation_file2" class="form-control" id="quotation_file2">
                </div>
              </div>

              @if(!empty(unserialize(Session::get('quotation_data')['file'])))
              <div class="row">

               @foreach(unserialize(Session::get('quotation_data')['file']) as $files)
                <div class="col-md-4">
                  <a href="{{ asset('storage/quotation/'.$files) }}" download>
                   <small> {{(strlen($files)>20)?substr($files,0,20).'...':$files}}</small>
                  </a>
                </div>
                @endforeach
              </div>
              @endif
          </div>
          <div class="form-group">
              <label class="plr5">
                   <input type="checkbox" id="contact_allow" name="contact_allow" value="1" <?php echo (Session::get('quotation_data')['contact_allow'] =="1")?'checked':''; ?>>  <span>Allow companies to contact regarding your project query<span class="text-danger"> * </span></span>
              </label>
                <br>
               <small class="text-danger" id="contact_allow_label">
                </small>
          </div>
          <div class="form-group">
              <label for="contact_way" class="pr-10">Prefer way to contact<span class="text-danger">*</span></label>
              @php
              $contact_way = unserialize(Session::get('quotation_data')['prefer_contact_way']);
              @endphp
              <label class="plr5">
                  <input type="checkbox" id="email_contact" name="prefer_contact_way[]"  value="email" <?php echo(in_array('email',$contact_way)?"checked":'')?'checked':''; ?>>  <span>By email</span>
              </label>
              <label class="plr5">
                   <input type="checkbox" id="phone_contact" name="prefer_contact_way[]" value="phone" <?php echo(in_array('phone',$contact_way)?"checked":'')?'checked':''; ?>>
                <span>By phone</span>
              </label>
              <div class="pull-left" style="width: 100%">
                <small class="text-danger pull-left" id="prefer_contact_way_label"></small>
              </div>
           </div>
            <div class="form-group">
              <label for="contact_way" class="pr-17">Best time to contact<span class="text-danger">*</span></label>
              @php
              $contact_time = unserialize(Session::get('quotation_data')['best_contact_time']);
              @endphp
              <label class="plr5">
                   <input type="checkbox" id="best_contact_time1" name="best_contact_time[]" value="8am-12pm" <?php echo(in_array('8am-12pm',$contact_time)?"checked":''); ?>>  <span>8am-12pm</span>
              </label>
              <label class="plr5">
                   <input type="checkbox" id="best_contact_time2" name="best_contact_time[]"  value="12pm-5pm" <?php echo(in_array('12pm-5pm',$contact_time)?"checked":''); ?>>  <span>12pm-5pm</span>
              </label>
              <label class="plr5">
                  <input type="checkbox" id="best_contact_time3" name="best_contact_time[]" value="5pm-9pm" <?php echo(in_array('5pm-9pm',$contact_time)?"checked":''); ?>>  <span>5pm-9pm</span>
              </label>
               <div class="pull-left" style="width: 100%">
                <small class="text-danger" id="best_contact_time_label"></small>
              </div>
           </div>
          <button class="tg-theme-btn tg-theme-btn-lg" type="submit">Change</button>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<!--quote-modal end-->
<!-- show success box-->
{{--<div class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog" id="show_success">--}}
{{--  <div class="modal-dialog modal-sm" role="document">--}}
{{--    <div class="modal-content" style="padding: 10px;">--}}
{{--      <div id="success_text">--}}
{{--        <p></p>--}}
{{--      </div>--}}
{{--      <div class="modal-footer">--}}
{{--      <a href="#" class="pull-left" id="home" onclick="clearData(this);">Home</a>--}}
{{--      @if(Auth::user()->role ==1)--}}
{{--        <a href="#" class="pull-right" id="user_profile" onclick="clearData(this)">Member Panel</a>--}}
{{--      @elseif(Auth::user()->role = 2)--}}
{{--        <a href="#" class="pull-right"  onclick="clearData(this)">Company Panel</a>--}}
{{--      @endif--}}
{{--    </div>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--</div>--}}
 <input type="hidden" id="role" value="{{Auth::user()->role}}">
</div>
</div>
@endsection
@section('script')
    <script>
        var company_list = [];
    var company_session_data =[];
    function clearData(e){
        localStorage.removeItem('company_session');
        localStorage.removeItem('search_company');
        localStorage.removeItem('message');
        // var id = $(e).attr('id');
        // if(id == "home")
        //     window.location = APP_URL;
        // else if(id == "user_profile")
        //     window.location = APP_URL + "/user/profile";
        // else if(id="company_dashboard")
        //     window.location = APP_URL + "/company";
    }
    function getCompanyList(company,e){
        var company = company;
        var dataList = $("#company_list");
        var op = "";
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "{{ URL::route('company.getCompany') }}",
            data: {'company_name': company},
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                localStorage.setItem("search_company", company);
                $('div.company_default_plan_list').html(data);
                $('input[name="company_id[]"]').each(function () {
                    if (jQuery.inArray($(this).val(), company_list) !== -1) {
                        $(this).prop('checked', true);
                    }
                });
                company_session_data = localStorage.getItem('company_session');
                company_session_data = JSON.parse(company_session_data);
                if (company_session_data.length >= 5) {
                    $('input[name="company_id[]"]:not(":checked")').attr("disabled", true);
                } else {
                    $('input[name="company_id[]"]:not(":checked")').attr("disabled", false);
                }
                $('input[name="company_id[]"]').change(function () {
                    if ($(this).prop('checked') == true) {
                        company_list.push($(this).val());
                    } else {
                        company_list = company_list.filter(item=>item !== $(this).val());
                    }
                    localStorage.setItem('company_session', JSON.stringify(company_list));
                    company_session_data = localStorage.getItem('company_session');
                    company_session_data = JSON.parse(company_session_data);
                    if (company_session_data.length >= 5) {
                        $('input[name="company_id[]"]:not(":checked")').attr("disabled", true);
                    } else {
                        $('input[name="company_id[]"]:not(":checked")').attr("disabled", false);
                    }
                });
            },
            error: function (e) {
                console.log(e);
            }
        });
    }
    function addItemToArray()
    {
        var company_session_data = localStorage.getItem('company_session');
        var company_session_data = JSON.parse(company_session_data);
        if(company_session_data.length >=5)
        {
            $('input[name="company_id[]"]:not(":checked")').attr("disabled",true);
        }
        else{
            $('input[name="company_id[]"]:not(":checked")').attr("disabled",false);
        }
    }
    window.unload = function(e){
        localStorage.clear();
    }

    window.onload = function (e) {
        var company_session_data = localStorage.getItem('company_session');
        var company_session_data = JSON.parse(company_session_data);

        company_list =(company_session_data !='' || company_session_data != null)?((company_session_data.length > 0) ? company_list.concat(company_session_data) : []):[];
        $('input[name="company_id[]"]').each(function () {
            if(jQuery.inArray($(this).val(), company_list) !== -1){
                $(this).prop('checked', true);
            }
        });
        if(company_session_data.length >=5)
        {
            $('input[name="company_id[]"]:not(":checked")').attr("disabled",true);
        }
        else{
            $('input[name="company_id[]"]:not(":checked")').attr("disabled",false);
        }
        var search_company = (localStorage.getItem('search_company') != null)?localStorage.getItem('search_company'):'';
        $('#company').val(search_company);

        getCompanyList(search_company,e);

        var message = localStorage.getItem("message");
        $('#success_text p').html(message);
        if(message != null){
            $('#show_success').modal('show');
        }
    };

 $(".add_more_close").click(function(){
  $(this).parents(".meta-field").remove();
  $(this).parents(".meta-field1").remove();
});
  function addField(field,name,placeholder,value,count)
  {
      $(field).append('<div class="row meta-field"><div class="col-md-11"><div class="form-group"><input class="form-control" id="'+name+count+'" type="'+value+'" name="'+name+'"  placeholder="'+placeholder+'"></div></div><div class="col-md-1"><a href="#" class="add_more_close"><i class="fa fa-minus" aria-hidden="true"></i></a></div></div>');

  }
  var email_edit_count = 1,phone_edit_count=1;
  $(".add_more").click(function(){
      addField('#email_add_more_field','edit_contact_email','Other Contact Email','email',++email_edit_count);
      $(".add_more_close").click(function(){
              $(this).parents(".meta-field").remove();
              return false;
         });
      return false;
  });
  $(".add_more1").click(function(){
      addField('#phone_add_more_field','edit_contact_phone','Other Contact Phone Number','number',++phone_edit_count);
      $(".add_more_close").click(function(){
              $(this).parents(".meta-field").remove();
              return false;
         });
      return false;
  });
  $('input[name="company_id[]"],.company_id').change(function() {
        if($(this).prop('checked') == true){
            company_list.push($(this).val());
        }
        else{
            company_list = company_list.filter(item=>item !== $(this).val());
        }
          localStorage.setItem('company_session',JSON.stringify(company_list));
        addItemToArray();
      });

  /* Edit Quote */

  $('.edit-btn').click(function(){
    if('<?php echo(Auth::user()) ?>' == ""){
        $('#edit_quote').modal('hide');
        var message = "Please login in";
        callbackError(message);
    }
     else
     {
        if('<?php echo(Auth::user()->role)?>' =='1' || '<?php echo(Auth::user()->role)?>' =='2'){
           var type="<?php echo Session::get('quotation_data')['type']; ?>";
           if(type ==2 || company_session_data.length>0){
            $('#edit_quote .project_type_div,#edit_quote .service_category,#edit_quote .supplier_category,#edit_quote .reno_category,#edit_quote .category_label').hide();
           }else{
                var old_category_id ="<?php echo Session::get('quotation_data')['category_id']?>";
                if(old_category_id == 1){
                    $('#edit_quote .project_type_div,#edit_quote .service_category,#edit_quote .category_label').show();
                }
                else if(old_category_id == 2){
                    $('#edit_quote .project_type_div,#edit_quote .supplier_category,#edit_quote .category_label').show();
                }else{
                    $('#edit_quote .project_type_div,#edit_quote .reno_category,#edit_quote .category_label').show();
                }
           }
            $('#edit_quote').modal('show');
        }
        else{
            $('#edit_quote').modal('hide');
            var message = "Sorry! You have no permission to request quote.";
            callbackError(message);
          }
     }


  });
  /*Edit Quote */
   $('.company_category_id').on('change',function(){
     var old_category_id ="<?php echo Session::get('quotation_data')['category_id']?>";
     if($(this).val() != old_category_id){
        $('[id*= subcategory_id_]').prop('checked',false);
     }
   })
   $('form.edit_detail_next').on('submit',function(e){
         e.preventDefault();
          var phone="";
          var email="";
          var phone_count = 1,email_count=1;
                $("[id*= contact_phone]").each(function() {
                    var name = $('#edit_contact_phone' +phone_count).val();
                    if(typeof(name) !== "undefined"){
                      phone +=name +", ";
                    }
                    phone_count++;
                });
                $("[id*= contact_email]").each(function() {
                    var name = $('#edit_contact_email' +email_count).val();
                    if(typeof(name) !== "undefined"){
                      email += name +", ";
                    }
                    email_count++;
                });
                /* Selected Company Only */
                var company_id="<?php echo isset($selectedCompany->id)?$selectedCompany->id:'' ?>";
                var category_id="<?php echo isset($selectedCompany->id)?$selectedCompany->child_categories[0]->id:'' ?>";
                data = new FormData(this);
                data.append('email', email);
                data.append('phone',phone);
                if(company_id !="")
                {
                  data.append('type',2); // 2 mean send quote from detail page
                  data.append('company_id',company_id);
                  data.append('category_id',category_id);
                }
                else{
                  data.append('type',1); // 1 mean send quote from home page
                }
                data.append('quotation_file',$('input[name=quotation_file]').val());
                data.append('quotation_file1',$('input[name=quotation_file1]').val());
                data.append('quotation_file2',$('input[name=quotation_file2]').val());
            $.ajax({
                type: "post",
                url: "{{ URL::route('company.send_quotation_data') }}",
                data:data,
                contentType:false,
                cache:false,
                processData:false,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data)
                {

                    if($.isEmptyObject(data.errors)){
                     if(data.type == 2){
                        window.location.href="{{route('company.send_quotation_detail_form')}}";
                     }
                     else{
                        window.location.href="{{route('company.send_quotation_form')}}";
                     }
                    }
                    else{
                       if(data.errors.category_id){
                                 $('#get_quote_detail #category_label').html(data.errors.category_id);
                            }else{
                                 $('#get_quote_detail #category_label').html("");
                            }
                            if(data.errors.building_type){
                            $('#get_quote_detail .building_type_label').html(data.errors.building_type);
                            }else{
                                $('#get_quote_detail .building_type_label').html("");
                            }
                            if(data.errors.city){
                            $('#get_quote_detail #city_label').html(data.errors.city);
                            }else{
                                $('#get_quote_detail #city_label').html(""); 
                            }
                            if(data.errors.township){
                            $('#get_quote_detail #township_label').html(data.errors.township);
                            }else{
                               $('#get_quote_detail #township_label').html(""); 
                            }
                            if(data.errors.address){
                                $('#get_quote_detail #address_label').html(data.errors.address);
                            }else{
                                $('#get_quote_detail #township_label').html("");
                            }
                            if(data.errors.project_information){
                            $('#get_quote_detail #project_information_label').html(data.errors.project_information);
                            }
                            if(data.errors.contact_phone){
                            $('#get_quote_detail #contact_phone_label').html(data.errors.contact_phone);
                            }
                            if(data.errors.budget){
                            $('#get_quote_detail #budget_label').html(data.errors.budget);
                            }else{
                               $('#get_quote_detail #budget_label').html(""); 
                            }
                            if(data.errors.budget){
                            $('#get_quote_detail #building_type_label').html(data.errors.building_type);
                            }else{
                                $('#get_quote_detail #budget_label').html("");
                            }
                            if(data.errors.contact_allow){
                            $('#get_quote_detail #contact_allow_label').html(data.errors.contact_allow);
                            }else{
                                $('#get_quote_detail #contact_allow_label').html(""); 
                            }
                            if(data.errors.prefer_contact_way){
                            $('#get_quote_detail #prefer_contact_way_label').html(data.errors.prefer_contact_way);
                            }else{
                                $('#get_quote_detail #prefer_contact_way_label').html(""); 
                            }
                            if(data.errors.best_contact_time){
                            $('#get_quote_detail #best_contact_time_label').html(data.errors.best_contact_time);
                            }else{
                            $('#get_quote_detail #best_contact_time_label').html("");
                            }
                    }
                 },
                error:function(e)
                {
                  console.log();
                  //alert('Something Wrong');
                 // location.reload();
                }
              });

      });

  /* Send Quotation */
  $('form#send_quotation').on('submit',function(e){
      e.preventDefault();
      Swal.fire({
          title: 'Are you sure?',
          text: "Do you want to request quote!",
          icon: 'info',
          showCancelButton: true,
          confirmButtonColor: '#ffcc32',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          reverseButtons: true,
      }).then((result) => {
          if (result.isConfirmed) {
              if($("#privacy").prop('checked') == true) {
                  var type ="<?php echo Session::get('quotation_data')['type']; ?>";
                  var count=0;
                  if(type == 1){
                      count =$('input[name="company_id[]"]:checked').length;
                  }
                  else{
                      count = "<?php echo Session::get('quotation_data')['company_id'] ?>";
                      company_list.push(count);
                  }

                  if(count >=1){
                      $.ajax({
                              type: "post",
                              url: "{{ URL::route('company.send_quotation') }}",
                              data: {data: company_list},
                              dataType: 'json',
                              headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              },
                              success:function(data)
                              {
                                  if($.isEmptyObject(data.errors)){
                                      var message = data.success;
                                      var home_url = "{{route('home')}}";
                                      var role = $('#role').val();
                                      if (role == 1){
                                          var path = "{{ route('user.received.user_quotation','requested') }}";
                                          var path_label = "Dashboard";
                                      }else if(role == 2){
                                          var path = "{{route('company.received.quotation','requested')}}";
                                          var path_label = "Dashboard";
                                      }
                                      // callbackURL(message,url);
                                      localStorage.setItem("message",data.success);
                                      
                                      Swal.fire({
                                          icon: 'info',
                                          title: 'Success',
                                          text:  data.success,
                                          showCancelButton: true,
                                          confirmButtonColor: '#ffcc32',
                                          cancelButtonColor: '#d33',
                                          confirmButtonText:
                                              '<a href="'+home_url+'" onclick="clearData(this)">Home</a>',
                                          cancelButtonText:
                                              '<a href="'+path+'" onclick="clearData(this)">'+path_label+'</a>',
                                      })
                                  }
                                  else{
                                      localStorage.setItem("message",data.errors);
                                      Swal.fire({
                                          icon: 'warning',
                                          title: 'Oops...',
                                          text: "Please choose at least one company.!"
                                      })
                                  }
                                  
                              },
                              error:function(data)
                              {
                                  if($.isEmptyObject(data.error)){
                                      {{--var message = "Please Login";--}}
                                      {{--callbackFailure(message) ;--}}
                                      {{--window.location="{{route('home')}}";--}}
                                  }
                              }
                          }
                      );
                  }
                  else{
                      Swal.fire({
                          icon: 'warning',
                          title: 'Oops...',
                          text: "Please choose at least one company.!"
                      })
                  }
              }
              else{
                  Swal.fire({
                      icon: 'warning',
                      title: 'Oops...',
                      text:  "Please check agree privacy and terms of service!"
                  })
              }
          }
      })

     });



   $('#company').on('input',function(e){
       if(e.which == 13 || e.which == 0) {
           var company = $(this).val();
           getCompanyList(company,e);
       }
       });



</script>

@endsection
