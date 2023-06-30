@extends('backend.layouts.company_panel')
@section('title','Company Profile')
@section('extra_css')
    <style>
        .what_we_do ul li{
            list-style-type:square !important;
        }
        .what_we_do ol li{
            list-style-type:roman !important;
        }
    </style>
@endsection
@section('content')
@php use Carbon\Carbon; @endphp

<div class="col-md-9 col-sm-12">
<div class="overflow">
<li>
<div class="blog-inter">
<div class="row" style="margin-bottom:10px;">
    <div class="col-md-12 col-sm-12">
        @if(empty(auth()->user()->logo))
        <p class="text-center">*Please upload profile picture in order to public your company.*</p>
        @endif
    </div>
</div>
<div class="row">
<div class="col-md-4 col-sm-4">
    <!--<img src="images/blog.jpg" alt="portfolio" class="img-responsive logo">-->
    <!-- <label class="pull-right logo_upload" for="image_file">-->
    <!-- <i class="fa fa-camera" style="color:white;padding:10px;background: #ffcc32;border-radius: 20px" aria-hidden="true"></i></label>-->

    <!--start-->
      @php
        if(auth()->user()->logo != null)
        $img=asset('storage/company_logo/'.Auth::user()->logo);
        else
        if(Session::get('parent_category_id') == 1)
        $img=asset('storage/company_logo/'.$projectsetting->service_default_logo);
        else if(Session::get('parent_category_id') == 2)
        $img=asset('storage/company_logo/'.$projectsetting->supplier_default_logo);
        else if(Session::get('parent_category_id') == 3)
        $img=asset('storage/company_logo/'.$projectsetting->reno_default_logo);
       @endphp
        <input type="file" id="image_file" name="profile_photo" accept="image/*" class="hide">
        <img  class="img-responsive logo" src="{{ $img }}" alt="" />
        <label   class="pull-right logo_upload" for="image_file">
            <i class="fa fa-camera" style="color:white;padding:10px;background: #ffcc32;border-radius: 20px" aria-hidden="true"></i></label>
<!--end-->
</div>
<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="post-tittle">
        <h4 class="title"><?= $company->user->name ?><span class="pull-right show_xs" style="display: none;float: right !important;"><a class="company_profile_edit"  data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target=".bs-example-modal-md-3">
<span class="pull-right"><i class="fa fa-pencil" aria-hidden="true" style="color:#fcb80b !important;"></i> Edit</span>
</a></span></h4>
    </div>

    <ul class="blogDate info">
        <li> <i class="fa fa-user" aria-hidden="true"></i><span><?= $company->categories[0]->name ?></span> </li>
        <li class="contact_mail"> <i class="fa fa-envelope" aria-hidden="true"></i> <span><a href="mailto:<?= $company->user->email ?>"><?= $company->user->email ?>, </a><a href="mailto:<?= $company->email ?>"><?= $company->email ?></a></span></li>
        @if(!empty($company->phone))
            <li> <i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:<?= $company->phone ?>"><span><?= $company->phone ?></span></a> </li>
        @endif
        @if(!empty($company->website))
            <li> <i class="fa fa-globe" aria-hidden="true"></i> <a href="<?= $company->website ?>"><span><?= $company->website ?></span></a> </li>
        @endif
    </ul>

    <ul class="blogDate">
        <li><i class="fa fa-home" aria-hidden="true"></i><span> <?php $count =1;                                              foreach($company->categories as $category){
                    if(sizeof($company->categories)==$count)
                        echo $category->name;
                    else
                        echo $category->name.", ";
                    $count++;
                }
                ?></span></li>
    </ul>
    <!--start-->
    <!--end-->
</div>
<div class="col-md-4 col-sm-4 col-xs-12">
    <a class="company_profile_edit hidden_xs"  data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target=".bs-example-modal-md-3">
        <span class="pull-right"><i class="fa fa-pencil" aria-hidden="true" style="color:#fcb80b !important;"></i> Edit</span>
    </a>
    <br>
    <div class="mt90">
<span class="pull-right supplier-social">
@if(!empty($company->facebook))
<a href="<?= $company->facebook ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
@endif
@if(!empty($company->twitter))
<a href="<?= $company->twitter ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
@endif
@if(!empty($company->googleplus))
<a href="<?= $company->googleplus ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
@endif
@if(!empty($company->linkedin))
<a href="<?= $company->linkedin ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
@endif
</span>
    </div>
</div>
</div>
@if(!empty($company->location->name))
<div class="row about_us">
    <div class="col-md-12 col-sm-12">
        <div class="post-tittle">
            <h5>About Us</h5>
        </div>
        <p><?= $company->description ?></p>
        @if(!empty($company->business_opening_hours))
            <ul  class="blogDate">
                <li><i class="fa fa-calendar" aria-hidden="true"></i><span> Opening  :
<?= $company->business_opening_hours ?> ~
<?= $company->business_closing_hours ?>
                        <?=  "(". $company->business_days .")" ?></span></li>
            </ul>
        @endif
        @if(!empty($company->location->name))
            <ul  class="blogDate">
                <li>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span> Address  :
<?= $company->address ?>
                        @if(!empty($company->location->name)),
                        <?= $company->location->name ?>
                        @endif
                        @if(!empty($city->name)),
                            <?=$city->name ?>
                        @endif</span></li>
            </ul>
        @endif
    </div>
</div>
@endif
@if(!empty($company->service))
<div class="row what_we_do">
    <div class="col-md-12 col-sm-12">
        <div class="post-tittle">
            <h5>What We Do?</h5>
        </div>
        <p>
        <p><?= $company->service ?></p>
        </p>
    </div>
</div>
@endif
@if(!empty($company->vission))
<div class="row what_we_do">
    <div class="col-md-12 col-sm-12">
        <div class="post-tittle">
            <h5>Our Vission</h5>
        </div>
        <p>
        <p><?= $company->vission ?></p>
        </p>
    </div>
</div>
@endif
@if(!empty($company->mission))
<div class="row what_we_do">
    <div class="col-md-12 col-sm-12">
        <div class="post-tittle">
            <h5>Our Mission</h5>
        </div>
        <p>


        <p><?= $company->mission ?></p>
        </p>
    </div>
</div>
@endif
<div class="row company_summary_count">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="post-tittle">
        <h5>Summary</h5>
    </div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12">
    <p>Total Coin<span class="pull-right"><?= Auth::user()->coin ?></span></p>
    <p>Total Viewer Count<span class="pull-right"><?= $company->view_count ?></span> </p>
</div>
<div class="col-md-4 col-sm-4 col-xs-12">
    <p>Used Coin<span class="pull-right"><?= $used_coin ?></span></p>
    <p>Active Package Plan <span class="pull-right"><?= Session::get('active_package_plan_name') ?></span></p>

</div>
<div class="col-md-4 col-sm-4 col-xs-12">
    <p>Available Coin <span class="pull-right"><?= Auth::user()->left_coin ?></span></p>
</div>
</div>
</div>

</li>
<!--added by myo min-->
<li>
<div class="blog-inter">
@if( Session::get('active_package_plan_id') != 1)
 @php
      
    $date = Carbon::parse(Session::get('package_end_date'));
    $now = Carbon::now();
    $diff = $date->diffInDays($now);

    @endphp
    
    @if($diff <= 7)
        <p>Your company's {{ Session::get('active_package_plan_name') }} package will expire soon.Please renew by buying <a href="{{ route('package.index') }}" style="color:#ffcc32;"> a new company package </a>.
            Your company's projects, products and services information will not see by the people who visit to our website  if you are late to renew it until <?php  echo date('d F, Y',strtotime(Session::get('package_end_date'))) ?>.</p>
    @else
      <p>Your company's package plan is <span style="color:#ffcc32 !important;text-weight:bold;">{{ Session::get('active_package_plan_name')}} </span>. This package will expire in <B> <?php  echo date('d F, Y',strtotime(Session::get('package_end_date'))) ?></B>. </p>
    @endif
@else
<p>
    Your Company Package is Free Package.Your company's projects, products and services information will not see by the people who visit to our website.Please Buy <a href="{{ route('package.index') }}" style="color:#ffcc32;">a new company package</a>
</p>
@endif
</div>
</li>
<!--end-->
@if(Session::get('active_package_plan_id') != 1)
@if(Session::get('parent_category_id') == 1)
<li>
<div class="row our_service">
    <div class="col-md-4 col-sm-4 col-xs-4">
        <div class="post-tittle">
            <h4 class="title">Our Services</h4>
        </div>
    </div>
    <div class="col-md-8 col-sm-8 col-xs-8">
        <a type="button" href="{{route('service.create')}}" class="pull-right editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
        <a type="button" class="pull-right deleteserviceitemall mr-10"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
    </div>
</div>
</li>

<li>
<div class="row our_services">
    @foreach($company_services as $company_service)
        <div class="col-md-4 col-sm-6">
            <div class="service_list">
                @php
                    $id = $company_service->id;
                    $id = \Crypt::encrypt($id);
                    $page = 1;
                    $page =\Crypt::encrypt($page);
                @endphp
                <a class="service-show-modal" data-id="{{$company_service->id}}" data-name="{{ $company_service->service_name}}"
                   data-description="{{$company_service->service_detail}}"
                   data-image="{{ $company_service->image_name }}"
                   data-created_at="{{$company_service->created_at}}" data-updated_at="{{$company_service->updated_at}}"
                   data-url="{{ url('service/'.$id.'/'.$page.'/edit') }}">
                    <img src="{{asset('storage/service/'.$company_service->image_name)}}" alt="portfolio" class="img-responsive">
                </a>
                <label>
                    <input name="company_serviceid" type="checkbox" data-id="{{ $company_service->id }}" value="{{ $company_service->id }}"> <?= $company_service->service_name ?>
                </label>
               
            </div>
        </div>
    @endforeach

</div>
</li>
@endif
@endif
@if(Session::get('active_package_plan_id') != 1)
<li>
<div class="row our_service">
<div class="col-md-4 col-sm-4 col-xs-4">
    <div class="post-tittle">
        <h4 class="title">Our Projects</h4>
    </div>
</div>
<div class="col-md-8 col-sm-8 col-xs-8">
    <a type="button" href="{{route('project.create')}}" class="pull-right editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
    <a type="button" class="pull-right  deleteprojectitemall mr-10"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
</div>
</div>
</li>

<li>
<div class="row our_services">
@php $count=1; @endphp
@foreach($company_projects as $company_project)
    @php
        $id = $company_project->id;
        $id = \Crypt::encrypt($id);
        $page = 1;
        $page =\Crypt::encrypt($page);
    @endphp
    <div class="col-md-4 col-sm-6">
        <div class="service_list">
            <a href="{{route('project.show',['id'=>$id,'page'=>$page])}}" >
                <img src="{{ asset('storage/project/'.$company_project->photo) }}" alt="portfolio" class="img-responsive">
            </a>
            <label>
                <input name="company_projectid" type="checkbox" data-id="{{ $company_project->id }}" value="{{ $company_project->id }}"> <?= $company_project->project_name ?>
            </label>
        </div>
    </div>
    @php $count +=1 @endphp
@endforeach
</div>
</li>
@endif
@if(Session::get('active_package_plan_id') != 1)
@if(Session::get('parent_category_id') == 2)
<li>
<div class="row our_service">
<div class="col-md-4 col-sm-4 col-xs-4">
    <div class="post-tittle">
        <h4 class="title">Our Products</h4>
    </div>
</div>
<div class="col-md-8 col-sm-8 col-xs-8 ">
    <a type="button" href="{{route('product.create')}}" class="pull-right editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
    <a type="button" class="pull-right  deleteproductitemall mr-10"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
</div>
</div>
</li>

<li>
<div class="row our_services">
@php $count=1; @endphp
@foreach($company_products as $company_product)
    <div class="col-md-4 col-sm-6">
        <div class="service_list">
            @php
                $id = $company_product->id;
                $id = \Crypt::encrypt($id);
                $page = 1;
                $page =\Crypt::encrypt($page);
            @endphp
            <a class="show-modal" data-id="{{$company_product->id}}" data-code="{{$company_product->code}}"
               data-product_name="{{$company_product->product_name}}"
               data-price="{{$company_product->price}}"
               data-size="{{$company_product->size}}"
               data-current_stock="{{$company_product->current_stock}}"
               data-photo="{{ $company_product->photo }}"
               data-product_description = "{{$company_product->product_description}}"
               data-created_at="{{$company_product->created_at}}" data-updated_at="{{$company_product->updated_at}}"
               data-url="{{ url('product/'.$id.'/'.$page.'/edit') }}">
                <img src="{{ asset('storage/product/'.$company_product->photo) }}" alt="portfolio" class="img-responsive">
            </a>
            <label>
                <input name="company_productid" type="checkbox" data-id="{{ $company_product->id }}" value="{{ $company_product->id }}"> <?= $company_product->product_name ?>
            </label>
        </div>
    </div>
    @php $count +=1 @endphp
@endforeach
</div>

</li>
@endif
@endif
</div>
</div>


    <!--company profile edit start-->
    <div class="modal fade bs-example-modal-md-3" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                <h2 class="modal-title text-uppercase">Change Basic Company Information</h2>
                <form class="company-profile-form"  id="basicForm" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <input type="hidden" name="information_type" value="basic">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="categories">Categories:</label><br>
                            <div class="row">
                                @foreach($categories as $category)
                                    <?php
                                    if(in_array($category->id, $category_arr))
                                        $checked = "checked";
                                    else
                                        $checked = "";
                                    ?>


                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <label>
                                           <input class="category" id="subcategory_id_<?= $category->id ?>" type="checkbox" name="category[]" value="<?= $category->id ?>" <?= $checked ?>>  <span><?= $category->name ?></span> 
                                        </label>
                                        
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="name">Name:</label><span class="text-danger"> * </span>
                            <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="<?= $company->user->name ?>">
                            <div id="nameError" class="error"></div>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="name">Contact Email:</label><span class="text-danger"> * </span>
                            <input type="text" name="email" class="form-control" placeholder="Email" value="<?= $company->email ?>" id="email">
                            <div id="emailError" class="error"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="phone">Contact Phone:</label>
                            <input type="text" class="form-control" placeholder="Phone" name="phone" id="phone" value=" <?= $company->phone ?>">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="website">Website:</label>
                            <input type="text" class="form-control" name="website" placeholder="https://myanbox.com.mm" value="<?= $company->website?>" id="website">
                            <div id="websiteError" class="error"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="city">City:</label><span class="text-danger"> * </span>
                            <select class="form-control" id="city" name="city">
                                <!--start-->

                                <?php
                                foreach($cities as $city){
                                if(!empty($company_city))
                                    if($company_city->id == $city->id)
                                        $selected ="selected";
                                    else
                                        $selected ="";
                                else
                                    $selected ="";                                    ?>
                                <option value={{$city->id}} <?=$selected?>>{{$city->name}}</option>
                            <?php } ?>
                            <!--end-->
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="city">Township</label><span class="text-danger"> * </span>
                            <select class="form-control" id="township" name="township">

                                <option>Township:</option>
                                <?php
                                foreach($townships as $township){

                                if(($company_city)){
                                    $company_city_id = $company_city->id;
                                }else{
                                    $company_city_id = 1;
                                }

                                if($township->parent_id == $company_city_id){                                                                           if($township->id == $company->location_id)
                                    $selected ="selected";
                                else
                                    $selected ="";
                                ?>
                                <option value={{$township->id}}" <?=$selected?>>{{$township->name}}
                                    </option>
<?php }} ?>
                                    </select>
                                  </div>
                                  </div>
                                  <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" name="address" id="address" value="<?= $company->address ?>">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="business_days">Business Days (Eg. monday ~ friday):</label><span class="text-danger"> * </span>
                                    <input type="text" class="form-control" name="business_days" id="business_days" value="<?= $company->business_days ?>">
                                    <div id="business_daysError" class="error"></div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="opening_hour">Opening hour (Eg. 08:00 AM):</label><span class="text-danger"> * </span>
                                <input type="time" class="form-control" name="business_opening_hours" id="business_opening_hours"
                                       value="<?= $company->business_opening_hours ?>">
                                <div id="business_opening_hoursError" class="error"></div>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="closing_hour">Closing hour (Eg. 05:00 PM):</label><span class="text-danger"> * </span>
                                <input type="time" class="form-control" name="business_closing_hours" id="business_closing_hours"
                                       value="<?= $company->business_closing_hours ?>">
                                <div id="business_closing_hoursError" class="error"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="Fackbook Link">Facebook Link:</label><span class="text-danger"> * </span>
                                <input type="text" class="form-control" placeholder="https://facebook.com" value="<?= $company->facebook ?>" name="facebook" id="facebook">
                                <div id="facebookError" class="error"></div>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="Twitter Link">Twitter Link:</label>
                                <input type="text" class="form-control" placeholder="https://twitter.com" value="<?= $company->twitter ?>" name="twitter" id="twitter">
                                <div id="twitterError" class="error"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="Google Plus Link">Google Plus Link:</label>
                                <input type="text" class="form-control" placeholder="https://myaccount.google.com/profile?" value="<?= $company->googleplus ?>" name="googleplus" id="googleplus">
                                <div id="googleplusError" class="error"></div>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="linkedin">Linkedin Link:</label>
                                <input type="text" class="form-control" placeholder="https://www.linkedin.com/in/yourname" value="<?= $company->linkedin ?>" name="linkedin" id="linkedin">
                                <div id="linkedinError" class="error"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="description">About Us:</label><span class="text-danger"> * </span>
                                <textarea name="description" class="form-control" style="resize: none;" value="<?= $company->description?>"> <?= $company->description?>                                                                   </textarea>
                                <div id="descriptionError" class="error"></div>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="service">What We Do:</label>
                                <textarea name="service" id="service" class="summernote" >
                                     <?= $company->service ?>
                                </textarea>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="vission">Vission:</label>
                                <textarea name="vission" id="vission" class="summernote" >
                                    <?= $company->vission ?>
                                </textarea>
                            </div>
                            
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="mission">Mission:</label>
                                <textarea name="mission" id="mission" class="summernote" >
                                    <?= $company->mission ?>
                                </textarea>
                            </div>
                            
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <center>
                                    <button class="btn btn-standard" type="submit" id="basic_add_btn" >Update</button>
                                </center>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!--company-profile edit modal end-->
    <!--image upload-modal start-->
    <div class="modal bs-example-modal-md-1 " tabindex="-1" role="dialog" id="uploadprofileModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                <h2 class="modal-title">Upload Profile Photo</h2>
                <form id="profilephotoForm" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <center>
                            <!--<input type="file" id="image_file" name="profile_photo" accept="image/*">-->
                        </center>
                        <div id="profile_photo"></div>
                    </div>
                    <!--<p>-->
                    <!--    <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-standard upload-image" data-dismiss="modal" aria-label="Close">Upload Image</button>-->

                    <!--</p>-->

                    <div class="row" style="padding:20px">
                        <div class="col-lg-12">
                            <center>
                                <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-standard upload-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
                            </center>
                        </div>
                    </div>

                </form>
                <p>
                    <!--  <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-image" data-dismiss="modal" aria-label="Close">Upload Image</button> -->
                </p>
            </div>
        </div>
    </div>
    <!-- image upload modal end -->
    <!-- delete service-->
@endsection
@section('script')
<script type="text/javascript">
           $(document).ready(function () {
        $('#table #checkall').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $("#table .checkbox").prop('checked', true);  
         } else {  
            $("#table .checkbox").prop('checked',false);  
         }  
        });

         $('#table .checkbox').on('click',function(){
            if($('#table .checkbox:checked').length == $('.checkbox').length){
                $('#table #checkall').prop('checked',true);
                
            }else{
                $('#table #checkall').prop('checked',false);
            }
         });
           });
         </script>
         <script type="text/javascript">
         $(document).ready(function () {
             $('.deleteserviceitemall').on('click',function(){
                 /*alert('hi');*/
            var company_serviceids = [];
                  $("input:checkbox[name=company_serviceid]:checked").each(function(){
                      company_serviceids.push($(this).val());
                       });
                       if (company_serviceids.length == 0) {
                            alert("please checked at least one service that you want to delete");
                       }else{
                     var conf = confirm('Are you sure want to delete?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('company.service.deleteall') }}",
                            type: 'POST',
                            data: {'ids' : company_serviceids},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                 /*  alert(data.success);
                                location.reload();*/
                                //  var message = data.success;
                                // var url = window.location.href;
                                //  callbackURL(message,url);
                                var url = window.location.href;
                                window.location=url;
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                        } 
                      }
               });
         });
         
         $(document).ready(function () {
             $('.deleteprojectitemall').on('click',function(){
                 /*alert('hi');*/
            var company_projectids = [];
                  $("input:checkbox[name=company_projectid]:checked").each(function(){
                      company_projectids.push($(this).val());
                       });
                       if (company_projectids.length == 0) {
                            alert("please checked at least one project that you want to delete");
                       }else{
                     var conf = confirm('Are you sure want to delete?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('company.project.deleteall') }}",
                            type: 'POST',
                            data: {'ids' : company_projectids},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                var url = window.location.href;
                                window.location=url;
                                //  var message = data.success;
                                // var url = window.location.href;
                                //  callbackURL(message,url);
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                        } 
                      }
               });
         });
         
          $(document).ready(function () {
             $('.deleteproductitemall').on('click',function(){
            var company_productids = [];
                  $("input:checkbox[name=company_productid]:checked").each(function(){
                      company_productids.push($(this).val());
                       });
                       
                       if (company_productids.length == 0) {
                            alert("please checked at least one product that you want to delete");
                       }else{
                           
                     var conf = confirm('Are you sure want to delete?');
                        if(conf == true){
                            $.ajax({ 
                          url: "{{ route('company.product.deleteall') }}",
                            type: 'POST',
                            data: {'ids' : company_productids},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                              /*  alert(data.success);
                                location.reload();*/
                                // var message = data.success;
                                var url = window.location.href;
                                window.location=url;
                                // callbackURL(message,url);
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                        } 
                        
                      }
               });
         });
         
         </script>
         <script src="{{ asset('admin/js/cropper/croppie.js')}}"></script>
    <script type="text/javascript">
       $(document).ready(function(){
        var img = '<?php echo asset('storage/company_logo/'.auth()->user()->logo) ?>';
                var image_name = '<?php echo auth()->user()->logo ?>';
                html = '<img alt="'+image_name+'" src="' + img + '" class="img-circle"/>';
                $("#current_profile_photo").html(html);
               //Image Cropping

               /* image crop */
               var resize22 = $('#profile_photo').croppie({
                enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 420,
                    height: 280,
                    type: 'square' //circle
                },
                boundary: {
                    width: 430,
                    height: 290
                }
            });             
            $('#image_file').on('change', function () { 
              var reader22 = new FileReader();
                reader22.onload = function (e) {
                  resize22.croppie('bind',{
                    url: e.target.result
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
                }
                reader22.readAsDataURL(this.files[0]);
                $('#uploadprofileModal').modal('show');
            });
            $('.upload-image').on('click', function (ev) {
              resize22.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
                html = '<img src="' + img + '" />';
                $("#profile_photo").html(html);
                 $.ajax({
                   url: "{{ route('user.croppie.upload-profile') }}",
                   type: "POST",
                   data: {"image":img,'path':'company_logo'},
                   dataType: 'json',
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success: function (data) {
                    window.location.href=window.location.href;   
                        },
                   error:function(e){
                    console.log(e)
                   }
                 });
               });
             });
             
            //  start
            
              function getTownshipByCity(city){
            var option = "";
               $.ajax({
                   type : 'get',
                   url : "{{ URL :: route('location.getTownship')}}",
                   data : {'city_id':city},
                   success : function(data){
                       for(var i=0; i<data.length;i++){
                           option += '<option value="'+ data[i].id+'">'+ data[i].name+'</option>';
                       }
                       $("#township").html(option);

                   },
                   error:function(e)
                   {
                       console.log(e)
                   }
               });
           }
         /* City onchange event */
           $('#city').change(function(){
              getTownshipByCity($(this).val());
           });

           $(document).ready(function(){    
              getHourMin('#business_opening_hours');
              getHourMin('#business_closing_hours');

              function getHourMin(time){
                  var business_hour=$(time).attr('value');
                  var business_hour_arr = business_hour.split(" ");
                  var am_pm = business_hour_arr[1];
                  var hour_min = business_hour_arr[0].split(':');
                  var hr = parseInt(hour_min[0]);
                  var min = hour_min[1];
                  if(am_pm =="PM")
                  {
                    hr += 12;
                  }
                  if(hr <12)
                  {
                    hr = "0"+hr;
                  }
                   $(time).each(function(){ 
                       $(time).attr({'value': hr + ':' + min});
                     });
              }
              /* Township data bind */
               var city_id = $('#city').val();
               if(city_id >=0){
                getTownshipByCity(city_id);
               }
               /* bind image */ 
               var img = '<?php echo url('storage/company_coverphoto/'.$company->cover_photo) ?>';
               var image_name = '<?php echo $company->cover_photo ?>';
               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_cover_photo").html(html);


               var logo = '<?php echo asset('storage/company_logo/'.$company->user->logo) ?>';
               var logo_name = '<?php echo $company->user->logo ?>';
               html = '<img alt="'+logo_name+'" src="' + logo + '" />';
                $("#current_logo_photo").html(html);

               //Image Cropping

               /* image crop */
               var resize1 = $('#logo_photo').croppie({
                enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 420,
                    height: 280,
                    type: 'square' //circle
                },
                boundary: {
                    width: 430,
                    height: 290
                }
            });


            $('#logo_image_file').on('change', function () { 
              var reader1 = new FileReader();
                reader1.onload = function (e) {
                  resize1.croppie('bind',{
                    url: e.target.result
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
                }
                reader1.readAsDataURL(this.files[0]);
            });

             $('.upload-logo').on('click', function (ev) {
              resize1.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
               // html = '<img src="' + img + '" />';
               // $("#logo_photo").html(html);
                 $.ajax({
                   url: "{{route('croppie.upload-image')}}",
                   type: "POST",
                   data: {"image":img,'path':"company_logo"},
                   dataType: 'json',
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success: function (data) {
                    html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                    $("#current_logo_photo").html(html);   
                   },
                   error:function(e){
                    console.log(e)
                   }
                 });
              });
            });
              /* image crop */
               var resize = $('#cover_photo').croppie({
                enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 1600,
                    height: 230,
                    type: 'square' //circle
                },
                boundary: {
                    width: 800,
                    height: 240
                }
            });


            $('#image_file').on('change', function () { 
              var reader = new FileReader();
                reader.onload = function (e) {
                  resize.croppie('bind',{
                    url: e.target.result
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('.upload-image').on('click', function (ev) {
              resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
               // html = '<img src="' + img + '" />';
               // $("#cover_photo").html(html);
                 $.ajax({
                   url: "{{route('croppie.upload-image')}}",
                   type: "POST",
                   data: {"image":img,"path":"company_coverphoto"},
                   dataType: 'json',
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success: function (data) {
                    html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                    $("#current_cover_photo").html(html);   
                        },
                   error:function(e){
                    console.log(e)
                   }
                 });
              });
            });
             
          }); 
          
             $('form#basicForm').on('submit',function(e){
                var name    =$('#name').val();
                var phone   = $('#phone').val();
                var vission = $('#vission').summernote('code');
                vission = vission.replaceAll("&amp;", "and_char");
                // var description = $('#description').summernote('code');
                var service = $('#service').summernote('code');
                service = service.replaceAll("&amp;", "and_char");
                
                var mission = $('#mission').summernote('code');
                mission = mission.replaceAll("&amp;", "and_char");
                
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('companies.profile_update',$company->id) }}",
                      data: $('#basicForm').serialize()+"&vission="+vission+"&service="+service+"&mission="+mission,
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          if($.isEmptyObject(data.errors)){
                               $("#basic_add_btn").attr('disabled','disabled');
                                setTimeout(function() {
                                  $this.removeAttr('disabled');
                               }, 3000);

                               // var message = data.success;
                                // callbackSuccess(message);
                                  var url = window.location.href;
                                  window.location=url;
                                // callbackURL(message,url);
                                //alert(data.success);
                          }
                          else{
                              console.log(data.errors); 
                              
                               if($.isEmptyObject(data.errors.description)){ 
                                  $('#descriptionError').html("");
                                  $("textarea[name=description]").removeClass('error-messageborder');
                              }else{
                                   $('#descriptionError').html(data.errors.description);
                                   $("textarea[name=description]").addClass('error-messageborder');
                              }
                               
                               
                               if($.isEmptyObject(data.errors.email)){ 
                                  $('#emailError').html("");
                                  $("input[name=email]").removeClass('error-messageborder');
                              }else{
                                   $('#emailError').html(data.errors.email);
                                   $("input[name=email]").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.name)){ 
                                  $('#nameError').html("");
                                  $("input[name=name]").removeClass('error-messageborder');
                              }else{
                                   $('#nameError').html(data.errors.name);
                                   $("input[name=name]").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.township)){ 
                                  $('#townshipError').html("");
                                  $("select[name=township]").removeClass('error-messageborder');
                              }else{
                                   $('#townshipError').html(data.errors.township);
                                   $("select[name=township]").addClass('error-messageborder');
                              }
                               if($.isEmptyObject(data.errors.business_days)){ 
                                  $('#business_daysError').html("");
                                  $("input[name=business_days]").removeClass('error-messageborder');
                              }else{
                                   $('#business_daysError').html(data.errors.business_days);
                                   $("input[name=business_days]").addClass('error-messageborder');
                              }
                                if($.isEmptyObject(data.errors.city)){ 
                                  $('#cityError').html("");
                                  $("select[name=city]").removeClass('error-messageborder');
                              }else{
                                   $('#cityError').html(data.errors.city);
                                   $("select[name=city]").addClass('error-messageborder');
                              }
                               if($.isEmptyObject(data.errors.business_opening_hours)){ 
                                  $('#business_opening_hoursError').html("");
                                  $("input[name=business_opening_hours]").removeClass('error-messageborder');
                              }else{
                                   $('#business_opening_hoursError').html(data.errors.business_opening_hours);
                                   $("input[name=business_opening_hours]").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.business_closing_hours)){ 
                                  $('#business_closing_hoursError').html("");
                                  $("input[name=business_closing_hours]").removeClass('error-messageborder');
                              }else{
                                  $('#business_closing_hoursError').html(data.errors.business_closing_hours);
                                  $("input[name=business_closing_hours]").addClass('error-messageborder');
                              }
                              //start
                              if($.isEmptyObject(data.errors.website)){ 
                                  $('#websiteError').html("");
                                  $("input[name=website]").removeClass('error-messageborder');
                              }else{
                                  $('#websiteError').html(data.errors.website);
                                  $("input[name=website]").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.facebook)){ 
                                  $('#facebookError').html("");
                                  $("input[name=facebook]").removeClass('error-messageborder');
                              }else{
                                  $('#facebookError').html(data.errors.facebook);
                                  $("input[name=facebook]").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.twitter)){ 
                                  $('#twitterError').html("");
                                  $("input[name=twitter]").removeClass('error-messageborder');
                              }else{
                                  $('#twitterError').html(data.errors.twitter);
                                  $("input[name=twitter]").addClass('error-messageborder');
                              }
                              
                               if($.isEmptyObject(data.errors.googleplus)){ 
                                  $('#googleplusError').html("");
                                  $("input[name=googleplus]").removeClass('error-messageborder');
                              }else{
                                  $('#googleplusError').html(data.errors.googleplus);
                                  $("input[name=googleplus]").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.linkedin)){ 
                                  $('#linkedinError').html("");
                                  $("input[name=linkedin]").removeClass('error-messageborder');
                              }else{
                                  $('#linkedinError').html(data.errors.linkedin);
                                  $("input[name=linkedin]").addClass('error-messageborder');
                              }
                              //end
                             // printErrorMsg(data.errors);
                          } 
                         // location.reload();
                          
                       },
                      error:function(e)
                      {
                          var message = "Something Wrong!";
                                 callbackWarning(message);
                        // alert('something Wrong');

                      }
                    });
              });
            
            // end
            }); 
    </script>
<!--delete service end-->
<!--start product show-->
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
                                    <td colspan="2">
                                        <center id="photo">
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>
                                         <div id="product_name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>
                                         <div id="price">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Code</td>
                                    <td>
                                         <div id="code">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size</td>
                                    <td>
                                         <div id="size">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Current Stock</td>
                                    <td>
                                         <div id="current_stock">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>
                                         <div id="product_description">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Created Date</td>
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
                                    <td></td>
                                    <td> 
                                      <a type="button" id="company_product-edit" href="" class="btn btn-standard editeducationBtn">Edit</a>
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
        <script type="text/javascript">
           /* Show Event  */
            $(document).on('click', '.show-modal', function() {   
                    $('.modal-title').text('Product Detail');
                    $('#product_name').html($(this).data('product_name'));
                     var APP_URL = '<?php echo url('/'); ?>';
                    if($(this).data('photo') !== ''){
                      var img='<img src="'+APP_URL+'/storage/product/'+$(this).data('photo')+'" style="width:50px;height:50px">';
                       $('#photo').html(img);
                    }else{
                       $('#photo').html('');
                    }
                    $('#code').html($(this).data('code'));
                    $('#product_description').html($(this).data('product_description'));
                    $('#price').html($(this).data('price'));
                    $('#size').html($(this).data('size'));
                    $('#current_stock').html($(this).data('current_stock'));
                    $('#created_at').html($(this).data('created_at'));
                    $('#updated_at').html($(this).data('updated_at'));
                    $("#company_product-edit").attr('href',$(this).data('url') );
                    $('#showModal').modal('show');
                });
        </script>
<!--end product show-->
<!--image upload-modal start-->
      <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="serviceshowModal">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                   <center><h4 class="modal-title"></h4></center>
                   <div class="row">
                       <div class="col-md-offset-1 col-md-10">
                         <table class="table table-hover no-border">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <center id="photo">
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>
                                         <div id="service_name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>
                                         <div id="service_description">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td>
                                         <div id="service_created_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Updated Date</td>
                                    <td>
                                         <div id="service_updated_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td> 
                                    
                                      <a type="button" id="company_service-edit" href="" class="btn btn-standard editeducationBtn">Edit</a>
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
<script type="text/javascript">
           /* Show Event  */
            $(document).on('click', '.service-show-modal', function() {   
                    $('.modal-title').text('Service Detail');
                    $('#service_name').html($(this).data('name'));
                      var APP_URL = '<?php echo url('/'); ?>';
                // $("#photo").attr('src', APP_URL+'storage/service/'+$(this).data('photo'));
                    if($(this).data('image') !== ''){
                      var img='<img src="'+APP_URL+'/storage/service/'+$(this).data('image')+'" style="width:50px;height:50px">';
                      $('#photo').html(img);
                    }else{
                      $('#photo').html('');
                    }
                    $('#service_description').html($(this).data('description'));
                    $('#service_created_at').html($(this).data('created_at'));
                    $('#service_updated_at').html($(this).data('updated_at'));
                    $("#company_service-edit").attr('href',$(this).data('url') );
                    $('#serviceshowModal').modal('show');
                });
        </script>
 @endsection