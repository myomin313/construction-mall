@extends('layouts.admin_panel')
@section('content')
 <style>
  .hide {
    display: none;
}
/*.btn {*/
/*  display: inline-block;*/
/*  padding: 4px 12px;*/
/*  margin-bottom: 0;*/
/*  font-size: 14px;*/
/*  line-height: 20px;*/
  /*color: #333333;*/
/*  text-align: center;*/
/*  vertical-align: middle;*/
/*  cursor: pointer;*/
/*  border: 1px solid #ddd;*/
/*  box-shadow: 2px 2px 10px #eee;*/
/*  border-radius: 4px;*/
/*}*/

.btn-large {
  padding: 11px 19px;
  font-size: 17.5px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}

#imagePreview {
  margin: 15px 0 0 0;
  border: 2px solid #ddd;
}
 </style>

<!-- Single pro tab review Start-->
<div class="single-pro-review-area mg-t-30 mg-b-15">
  <div class="container-fluid">
      <div class="row"> 
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          @include('admin.element.breadcrumb')
          @include('admin.element.success-message')

            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Update Project Setting</h3>
                    </div>
                        
                  </div>
                </h4>
              </div>
              <div class="card-body">
          

         <form id="editProjectSettingForm"  method="post" enctype="multipart/form-data">
          {{csrf_field()}}
      <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="card">
              <div class="card-header">
                <h4><center>Service Company Setting</center></h4>
              </div>
              <div class="card-body">
                  <div class="form-group">
                   <label for="name">Service Navigation First Backgroud Color And Icon Color:</label><span class="text-error-danger"> * </span>
                   <input type="color" class="form-control" placeholder="service_nav_first_background_and_icon" name="service_nav_first_background_and_icon" value="{{ $setting->service_nav_first_background_and_icon }}">
                    @if($errors->has('service_nav_first_background_and_icon'))
                      <div class="error">{{ $errors->first('service_nav_first_background_and_icon') }}</div>
                    @endif
                </div>

                 <div class="form-group">
                   <label for="name">Service Navigation Second Backgroud Color:</label><span class="text-error-danger"> * </span>
                   <input type="color" class="form-control" placeholder="service_nav_second_background" name="service_nav_second_background" value="{{ $setting->service_nav_second_background }}">
                    @if($errors->has('service_nav_second_background'))
                      <div class="error">{{ $errors->first('service_nav_second_background') }}</div>
                    @endif
                </div>
                  <div class="form-group">
                   <label for="name">Service Navigation Font Color:</label><span class="text-error-danger"> * </span>
                   <input type="color" class="form-control" placeholder="service_nav_font_color" name="service_nav_font_color" value="{{ $setting->service_nav_font_color }}">
                    @if($errors->has('service_nav_font_color'))
                      <div class="error">{{ $errors->first('service_nav_font_color') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="photo">Service Company Default Logo</label>
                    <div>
                    <input type="file" id="service_logo_file" name="service_default_logo" accept="image/*" class="hide">
                    <label for="service_logo_file"  class="btn btn-primary">
                        Upload Service Default Logo</label>
                    <div id="current_service_default_logo"></div>
                  </div> 
                </div>
                 <div class="form-group">
                    <label for="photo">Service List Image</label>
                    <div>
                        <input type="file" id="service_list_file" name="service_list_image" accept="image/*" class="hide">
                    <label for="service_list_file"  class="btn btn-primary" data-toggle="modal" >Upload Service List Image
                    </label>
                    <div id="current_service_list_image"></div>
                  </div> 
                </div>
                <div class="form-group">
                    <label for="photo">Service Company Default Background Image</label>
                    <div>
                        <input type="file" id="service_background_image_file" name="service_default_background_image" accept="image/*" class="hide">
                    <label for="service_background_image_file" class="btn btn-primary" >
                        Upload Service Background Image</label>
                    <div id="current_service_default_background_image"></div>
                  </div> 
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4><center>Reno Business Setting</center></h4>
              </div>
              <div class="card-body">
                 <div class="form-group">
                   <label for="name">Reno Business Navigation First Backgroud Color And Icon Color:</label><span class="text-error-danger"> * </span>
                   <input type="color" class="form-control" placeholder="reno_nav_first_background_and_icon" name="reno_nav_first_background_and_icon" value="{{ $setting->reno_nav_first_background_and_icon }}">
                    @if($errors->has('reno_nav_first_background_and_icon'))
                      <div class="error">{{ $errors->first('reno_nav_first_background_and_icon') }}</div>
                    @endif
                </div>

                 <div class="form-group">
                   <label for="name">Reno Business Navigation Second Backgroud Color:</label><span class="text-error-danger"> * </span>
                   <input type="color" class="form-control" placeholder="reno_nav_second_background" name="reno_nav_second_background" value="{{ $setting->reno_nav_second_background }}">
                    @if($errors->has('reno_nav_second_background'))
                      <div class="error">{{ $errors->first('reno_nav_second_background') }}</div>
                    @endif
                </div>

                 <div class="form-group">
                   <label for="name">Reno Business Navigation Font Color:</label><span class="text-error-danger"> * </span>
                   <input type="color" class="form-control" placeholder="reno_nav_font_color" name="reno_nav_font_color" value="{{ $setting->reno_nav_font_color }}">
                    @if($errors->has('reno_nav_font_color'))
                      <div class="error">{{ $errors->first('reno_nav_font_color') }}</div>
                    @endif
                </div>
                 <div class="form-group">
                  <label for="photo">Reno Business  Default Logo</label>
                    <div>
                    <input type="file" id="reno_logo_file" name="reno_default_logo" accept="image/*" class="hide">
                    <label for="reno_logo_file" class="btn btn-primary">
                        Upload Reno Business  Default Logo
                    </label>
                    <div id="current_reno_default_logo"></div>
                  </div> 
                </div>
                <div class="form-group">
                    <label for="photo">Reno Business  Default Background Image</label>
                    <div>
                    <input type="file" id="reno_background_image_file" name="reno_default_background_image" accept="image/*" class="hide">
                    <label for="reno_background_image_file"  aria-label="Close" class="btn btn-primary" >Upload Reno Business Default Background Image</label>
                    <div id="current_reno_default_background_image"></div>
                  </div> 
                </div>
                <div class="form-group">
                    <label for="photo">Reno Business List Image</label>
                    <div>
                        <input type="file" id="reno_list_file" name="reno_list_image" accept="image/*" class="hide">
                    <label for="reno_list_file" class="btn btn-primary">
                        Upload Reno Business List Image</label>
                    <div id="current_reno_list_image"></div>
                  </div> 
                </div>

              </div>
            </div>
          <div class="card">
            <div class="card-header">
              <h4><center>Blog Setting</center></h4>
            </div>
            <div class="card-body">
                  <!-- start -->
                <div class="form-group">
                   <label for="name">Blog First Backgroud Color And Icon Color:</label><span class="text-error-danger"> * </span>
                   <input type="color" class="form-control" placeholder="blog nav first background and icon" name="blog_nav_first_background_and_icon" value="{{ $setting->blog_nav_first_background_and_icon }}">
                    @if($errors->has('blog_nav_first_background_and_icon'))
                      <div class="error">{{ $errors->first('blog_nav_first_background_and_icon') }}</div>
                    @endif
                </div>
                 <div class="form-group">
                   <label for="name">Blog Second Backgroud Color:</label><span class="text-error-danger"> * </span>
                   <input type="color" class="form-control" placeholder="blog nav second background" name="   blog_nav_second_background" value="{{ $setting->  blog_nav_second_background }}">
                    @if($errors->has('blog_nav_second_background'))
                      <div class="error">{{ $errors->first('blog_nav_second_background') }}</div>
                    @endif
                </div>
                <!-- end-->
                <div class="form-group">
                   <label for="name">Blog Font Color:</label><span class="text-error-danger"> * </span>
                   <input type="color" class="form-control" placeholder="blog_nav_font_color" name="blog_nav_font_color" value="{{ $setting->blog_nav_font_color}}">
                    @if($errors->has('blog_nav_font_color'))
                      <div class="error" style="color:red">{{ $errors->first('blog_nav_font_color') }}</div>
                    @endif
                </div>
                <div class="form-group">
                  <label for="photo">Blog List Image</label>
                  <div>
                  <input type="file" id="blog_list_file" name="blog_list_image" accept="image/*" class="hide">
                  <label for="blog_list_file"  class="btn btn-primary" >
                      Upload Blog List Image</label>
                  <div id="current_blog_list_image"></div>
                </div> 
              </div>
            </div>
          </div>




            <div class="card" style="padding-bottom:80px">
              <div class="card-header">
                <h4><center>Coin Setting</center></h4>
              </div>

              <div class="card-body">
                <div class="form-group">
               <label for="name">User Register Coin:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="User Register Coin" name="user_register_coin" value="{{ $setting->user_register_coin }}">
                @if($errors->has('user_register_coin'))
                  <div class="error" style="color:red">{{ $errors->first('user_register_coin') }}</div>
                @endif
            </div>
             <div class="form-group">
               <label for="name">Company Register Coin:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="coins when company login" name="company_register_coin" value="{{ $setting->company_register_coin }}">
               @if($errors->has('company_register_coin'))
                  <div class="error" style="color:red">{{ $errors->first('company_register_coin') }}</div>
                @endif
            </div>
                <div class="form-group">
               <label for="name">User Login Coin:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="coins when user one time login" name="user_login_coin" value="{{ $setting->user_login_coin }}">
                @if($errors->has('user_login_coin'))
                  <div class="error" style="color:red">{{ $errors->first('user_login_coin') }}</div>
                @endif
            </div>

            <div class="form-group">
               <label for="name">Quotation Coin:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="coins when user send quotaion" name="quotation_coin" value="{{ $setting->quotation_coin }}">
                @if($errors->has('quotation_coin'))
                  <div class="error" style="color:red">{{ $errors->first('quotation_coin') }}</div>
                @endif
            </div>
            <div class="form-group">
               <label for="name">Company Login Coin:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="coins when company login" name="company_login_coin" value="{{ $setting->company_login_coin }}">
                @if($errors->has('company_login_coin'))
                  <div class="error" style="color:red">{{ $errors->first('company_login_coin') }}</div>
                @endif
            </div>
              </div>
            </div>
          
        
           
           <!--start myo min start-->
           <div class="card">
            <div class="card-header">
              <h4><center>Myanbox Tube Setting</center></h4>
            </div>
            <div class="card-body">
            
               <div class="form-group">
                    <label for="photo">myanboxtube list Image </label>
                    <div>
                         <input type="file" id="myanboxtube_list_file" name="myanboxtube_list_image" accept="image/*" class="hide">
                    <label for="myanboxtube_list_file"  class="btn btn-primary" >
                        Upload Myanboxtube List Image</label>
                    <div id="current_myanboxtube_list_image"></div>
                  </div> 
                </div>
                 <div class="form-group">
                    <label for="photo">myanboxtube default Image</label>
                    <div>
                     <input type="file" id="myanboxtube_default_file" name="myanboxtube_default_image" accept="image/*" class="hide">
                    <label for="myanboxtube_default_file"  class="btn btn-primary">
                        Upload Myanboxtube Default  Image</label>
                    <div id="current_myanboxtube_default_image"></div>
                  </div> 
                </div> 
                
            </div>
          </div>
          <!--end myo min-->
           <div class="card" style="padding-bottom:80px;">
            <div class="card-header">
              <h4><center>Home Page Setting</center></h4>
            </div>
            <div class="card-body">
            
              <div class="form-group">
                 <label for="name">Home Navigation First Background Color:</label><span class="text-error-danger"> * </span>
                 <input type="color" class="form-control" placeholder="supplier_nav_background" name="home_nav_first_background" value="{{ $setting->home_nav_first_background }}">
                  @if($errors->has('home_nav_first_background'))
                    <div class="error">{{ $errors->first('home_nav_first_background') }}</div>
                  @endif
              </div>

              <div class="form-group">
                 <label for="name">Home Navigation Second Background Color:</label><span class="text-error-danger"> * </span>
                 <input type="color" class="form-control" placeholder="home_nav_second_background" name="home_nav_second_background" value="{{ $setting->home_nav_second_background }}">
                  @if($errors->has('home_nav_second_background'))
                    <div class="error">{{ $errors->first('home_nav_second_background') }}</div>
                  @endif
              </div>
              <div class="form-group">
                 <label for="name">Home Navigation Font Color:</label><span class="text-error-danger"> * </span>
                 <input type="color" class="form-control" placeholder="home_nav_font_color" name="home_nav_font_color" value="{{ $setting->home_nav_font_color }}">
                  @if($errors->has('home_nav_font_color'))
                    <div class="error">{{ $errors->first('home_nav_font_color') }}</div>
                  @endif
              </div>
            </div>
          </div>
          
            </div>
             <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="card">
                <div class="card-header">
                  <h4><center>Supplier Company Setting</center></h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                   <label for="name">Supplier Navigation First Backgroud Color And Icon Color:</label><span class="text-error-danger"> * </span>
                   <input type="color" class="form-control" placeholder="supplier_nav_first_background_and_icon" name="supplier_nav_first_background_and_icon" value="{{ $setting->supplier_nav_first_background_and_icon }}">
                    @if($errors->has('supplier_nav_first_background_and_icon'))
                      <div class="error">{{ $errors->first('supplier_nav_first_background_and_icon') }}</div>
                    @endif
                </div>

                <div class="form-group">
                   <label for="name">Supplier Navigation Second Backgroud Color :</label><span class="text-error-danger"> * </span>
                   <input type="color" class="form-control" placeholder="supplier_nav_second_background" name="supplier_nav_second_background" value="{{ $setting->supplier_nav_second_background }}">
                    @if($errors->has('supplier_nav_second_background'))
                      <div class="error">{{ $errors->first('supplier_nav_second_background') }}</div>
                    @endif
                </div>
                <div class="form-group">
                   <label for="name">Supplier Navigation Font Color:</label><span class="text-error-danger"> * </span>
                   <input type="color" class="form-control" placeholder="supplier_nav_font_color" name="supplier_nav_font_color" value="{{ $setting->supplier_nav_font_color }}">
                    @if($errors->has('supplier_nav_font_color'))
                      <div class="error">{{ $errors->first('supplier_nav_font_color') }}</div>
                    @endif
                </div>
                 <div class="form-group">
                    <label for="photo">Supplier Company Default Logo</label>
                    <div>
                    <input type="file" id="supplier_logo_file" name="supplier_default_logo" accept="image/*" class="hide">
                    <label for="supplier_logo_file"  class="btn btn-primary">
                        Upload Supplier Logo</label>
                    <div id="current_supplier_default_logo"></div>
                  </div> 
                </div>
                 <div class="form-group">
                    <label for="photo">Supplier List Image</label>
                    <div>
                         <input type="file" id="supplier_list_file" name="supplier_list_image" accept="image/*" class="hide">
                    <label for="supplier_list_file"  class="btn btn-primary">Upload Supplier List Image</label>
                    <div id="current_supplier_list_image"></div>
                  </div> 
                </div>
                 <div class="form-group">
                    <label for="photo">Supplier Company Default Background Image</label>
                    <div>
                     <input type="file" id="supplier_background_image_file" name="supplier_default_background_image" accept="image/*" class="hide">
                    <label for="supplier_background_image_file"  class="btn btn-primary">
                        Upload Supplier Default Background Image</label>
                    <div id="current_supplier_default_background_image"></div>
                  </div> 
                </div> 
                </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4><center>Freelancer Setting</center></h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                 <label for="name">Freelancer Navigation First Backgroud Color And Icon Color:</label><span class="text-error-danger"> * </span>
                 <input type="color" class="form-control" placeholder="freelancer_nav_first_background_and_icon" name="freelancer_nav_first_background_and_icon" value="{{ $setting->freelancer_nav_first_background_and_icon }}">
                  @if($errors->has('freelancer_nav_first_background_and_icon'))
                    <div class="error">{{ $errors->first('freelancer_nav_first_background_and_icon') }}</div>
                  @endif
              </div>

               <div class="form-group">
                 <label for="name">Freelancer Navigation Second Backgroud Color:</label><span class="text-error-danger"> * </span>
                 <input type="color" class="form-control" placeholder="freelancer_nav_second" name="freelancer_nav_second" value="{{ $setting->freelancer_nav_second }}">
                  @if($errors->has('freelancer_nav_second'))
                    <div class="error">{{ $errors->first('freelancer_nav_second') }}</div>
                  @endif
              </div>

               <div class="form-group">
                 <label for="name">Freelancer Navigation Font Color:</label><span class="text-error-danger"> * </span>
                 <input type="color" class="form-control" placeholder=" freelancer_nav_font_color" name="freelancer_nav_font_color" value="{{ $setting->freelancer_nav_font_color }}">
                  @if($errors->has('freelancer_nav_font_color'))
                    <div class="error">{{ $errors->first('freelancer_nav_font_color') }}</div>
                  @endif
              </div>
              <div class="form-group">
                <label for="photo">Freelancer Default Logo</label>
                <div>
                    <input type="file" id="freelancer_file" name="freelancer_default_logo" accept="image/*" class="hide">
                <label for="freelancer_file" class="btn btn-primary" >
                    Upload Freelancer Default Logo</label>
                <div id="current_freelancer_default_logo"></div>
              </div> 
            </div>
            <div class="form-group">
                <label for="photo">Freelancer List Image</label>
                <div>
                  <input type="file" id="freelancer_list_file" name="freelancer_list_image" accept="image/*" class="hide">
                <label for="freelancer_list_file"  class="btn btn-primary" >
                    Upload Freelancer List Image</label>
                <div id="current_freelancer_list_image"></div>
              </div> 
            </div>
            <div class="form-group">
                <label for="photo">Freelancer Detail Image</label>
                <div>
                <input type="file" id="freelancer_detail_file" name="freelancer_detail_image" accept="image/*" class="hide">
                <label for="freelancer_detail_file" class="btn btn-primary">
                    Upload Freelancer Detail Image</label>
                <div id="current_freelancer_detail_image"></div>
              </div> 
            </div>
            </div>
          </div>
            <div class="card" style="padding-bottom:30px;">
            <div class="card-header">
              <h4><center>Social Media Setting</center></h4>
            </div>
            <div class="card-body">
               <div class="form-group">
               <label for="name">Facebook Link:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="Facebook Link" name="facebook_link" value="{{ $setting->facebook_link }}">
                @if($errors->has('facebook_link'))
                  <div class="error">{{ $errors->first('facebook_link') }}</div>
                @endif
            </div>
            
            <div class="form-group">
               <label for="name">Youtube Link:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="Youtube Channel Link" name="youtube_link" value="{{ $setting->youtube_link }}">
                @if($errors->has('youtube_link'))
                  <div class="error" style="color:red">{{ $errors->first('youtube_link') }}</div>
                @endif
            </div>
            
            <div class="form-group">
               <label for="name">Linkedin Link:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="Linked Link" name="linkedin_link" value="{{ $setting->linkedin_link }}">
               @if($errors->has('linkedin_link'))
                  <div class="error" style="color:red">{{ $errors->first('linkedin_link') }}</div>
                @endif
            </div>

              <div class="form-group">
               <label for="name">Instagram Link:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="instagram link" name="instagram_link" value="{{ $setting->instagram_link }}">
                 @if($errors->has('instagram_link'))
                  <div class="error" style="color:red">{{ $errors->first('instagram_link') }}</div>
                @endif
            </div>

            <div class="form-group">
               <label for="name">Pinterest Link:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="pinterest link" name="pinterest_link" value="{{ $setting->pinterest_link }}">
                  @if($errors->has('pinterest_link'))
                  <div class="error" style="color:red">{{ $errors->first('pinterest_link') }}</div>
                @endif
            </div>
            <div class="form-group">
               <label for="name">Website Link:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="Website Link" name="website_name" value="{{ $setting->website_name }}">
               @if($errors->has('website_name'))
                  <div class="error" style="color:red">{{ $errors->first('website_name') }}</div>
                @endif
            </div>
            </div>
          </div>
          
          
            <div class="card">
              <div class="card-header">
                <h4><center>General Setting</center></h4>
              </div>
              <div class="card-body">
                 <div class="form-group">
               <label for="name">Phone(use comma(,) for each phone number):</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="Phone(use comma(,) for each phone number)" name="phone" value="{{ $setting->phone }}">
                @if($errors->has('phone'))
                  <div class="error" style="color:red">{{ $errors->first('phone') }}</div>
                @endif
            </div>
            <div class="form-group">
               <label for="name">Address:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="Address" name="address" value="{{ $setting->address }}">
               @if($errors->has('address'))
                  <div class="error" style="color:red">{{ $errors->first('address') }}</div>
                @endif
            </div>
            
            
            <div class="form-group">
               <label for="name">Website Mail:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="website mail" name="website_mail" value="{{ $setting->website_mail }}">
                  @if($errors->has('website_mail'))
                  <div class="error" style="color:red">{{ $errors->first('website_mail') }}</div>
                @endif
            </div>

            <div class="form-group">
               <label for="name">Other Mail:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control" placeholder="other mail" name="other_mail" value="{{ $setting->other_mail }}">
                @if($errors->has('other_mail'))
                  <div class="error" style="color:red">{{ $errors->first('other_mail') }}</div>
                @endif
            </div>

            
          
            <!-- <div class="form-group">-->
            <!--   <label for="name">Footer Font Color:</label><span class="text-error-danger"> * </span>-->
            <!--   <input type="color" class="form-control" placeholder="footer_font_color" name="footer_font_color" value="{{ $setting->footer_font_color }}">-->
            <!--    @if($errors->has('footer_font_color'))-->
            <!--      <div class="error" style="color:red">{{ $errors->first('footer_font_color') }}</div>-->
            <!--    @endif-->
            <!--</div>-->
            <div class="form-group">
               <label for="name">Copyright Font Color:</label><span class="text-error-danger"> * </span>
               <input type="color" class="form-control"  name="copyright_font_color" value="{{ $setting->copyright_font_color }}">
               @if($errors->has('copyright_font_color'))
                  <div class="error" style="color:red">{{ $errors->first('copyright_font_color') }}</div>
                @endif
            </div>
            <!--<div class="form-group">-->
            <!--     <label for="name">Footer Background Color:</label><span class="text-error-danger"> * </span>-->
            <!--     <input type="color" class="form-control" placeholder="supplier nav background" name="footer_background" value="{{ $setting->footer_background }}">-->
            <!--      @if($errors->has('footer_background'))-->
            <!--        <div class="error" style="color:red">{{ $errors->first('footer_background') }}</div>-->
            <!--      @endif-->
            <!--  </div>-->
              
              <div class="form-group">
                 <label for="name">Copyright Background Color:</label><span class="text-error-danger"> * </span>
                 <input type="color" class="form-control"  name="copyright background" value="{{ $setting->copyright_background }}">
                 @if($errors->has('copyright_background'))
                    <div class="error" style="color:red">{{ $errors->first('copyright_background') }}</div>
                  @endif
              </div>
              </div>
              </div>
             <div class="card">
              <div class="card-header">
                <h4><center>Default Logo Setting</center></h4>
              </div>
              <div class="card-body">
               <div class="form-group">
                  <label for="photo">Member Default Logo</label>
                  <div>
                      <input type="file" id="image_file" name="member_default_logo" accept="image/*" class="hide">
                      <label for="image_file"  class="btn btn-primary">
                      Upload Member Default Logo </label>
                  <div id="current_member_default_logo"></div>
                </div> 
              </div>
              
              <div class="form-group">
                  <label for="photo">Admin Default Logo</label>
                  <div>
                  <input type="file" id="admin_default_file" name="admin_default_logo" accept="image/*" class="hide">
                  <label for="admin_default_file" class="btn btn-primary">
                      Upload Admin Default Image</label>
                  <div id="current_admin_default_logo"></div>
                </div> 
              </div>
              
              <div class="form-group">
                  <label for="photo">Member Background Image</label>
                  <div>
                  <input type="file" id="member_background_file" name="member_background_image" accept="image/*" class="hide">
                  <label for="member_background_file" class="btn btn-primary">
                      Upload Member Background Image</label>
                  <div id="current_member_background_image"></div>
                </div> 
              </div>

            </div>
          </div>
        </div>
         <div class="row">
           <div class="col-lg-12 col-md-12">
            <div class="payment-adress">
             <button type="submit" id="basic_add_btn" class="btn btn-primary waves-effect waves-light">Update</button>
           </div>
         </div>
       </div>
     </form>                   
   </div>
 </div>
</div>
</div>
</div>


<!--image upload-modal start-->
<!--<div class="modal fade bs-example-modal-md-1 " tabindex="-1" role="dialog">-->
<!--  <div class="modal-dialog modal-md" role="document">-->
<!--    <div class="modal-content">-->
<!--      <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>-->
      
<!--      <p>-->
<!--        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-image" data-dismiss="modal" aria-label="Close">Upload</button>-->
<!--      </p>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!-- start image upload modal-->
  <!-- member  image upload-modal start-->
      <div class="modal bs-example-modal-md-1" id="member_default_logo" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="image_file" name="member_default_logo">-->
                        <!--</center>-->
                        <div id="member_logo"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!-- end image upload modal-->
<!--freelancer image upload-->
 <div class="modal bs-example-modal-md-1" id="freelancer_default_logo" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="freelancer_file" name="freelancer_default_logo">-->
                        <!--</center>-->
                        <div id="freelancer_logo"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-freelancer-logo" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!--freelnacer image upload-->
<!--admin default logo-->
 <div class="modal bs-example-modal-md-1" id="admin_default_logo_modal" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="freelancer_file" name="freelancer_default_logo">-->
                        <!--</center>-->
                        <div id="admin_logo"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-admin-logo" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!--freelnacer image upload-->

<!--admin default logo-->
 <div class="modal bs-example-modal-md-1" id="member_background_image_modal" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document" style="width: 100%">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="freelancer_file" name="freelancer_default_logo">-->
                        <!--</center>-->
                        <div id="member_background"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-member-background-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!--freelnacer image upload-->

<!--reno  log upload-->
 <div class="modal bs-example-modal-md-1" id="reno_default_logo" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="reno_logo_file" name="reno_default_logo">-->
                        <!--</center>-->
                        <div id="reno_logo"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-reno-logo" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!--reno logo image upload-->
<!--reno  log upload-->
 <div class="modal bs-example-modal-md-1" id="reno_default_background_image" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document" style="width: 100%">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="reno_background_image_file" name="reno_default_background_image">-->
                        <!--</center>-->
                        <div id="reno_background"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-reno-background" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!--reno logo image upload-->
<!--service default logo upload-->
 <div class="modal bs-example-modal-md-1" id="service_default_logo" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="service_logo_file" name="service_default_logo">-->
                        <!--</center>-->
                        <div id="service_logo"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-service-logo" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!--service default logo upload end-->
<!--service default logo upload-->
 <div class="modal bs-example-modal-md-1" id="supplier_default_logo" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="supplier_logo_file" name="supplier_default_logo">-->
                        <!--</center>-->
                        <div id="supplier_logo"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-supplier-logo" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!--service default logo upload end-->
<!--service default  log upload-->
 <div class="modal bs-example-modal-md-1" id="service_default_background_image" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document" style="width: 100%">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="service_background_image_file" name="service_default_background_image">-->
                        <!--</center>-->
                        <div id="service_background"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-service-background" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!--service default image upload-->
<!--service default  log upload-->
 <div class="modal bs-example-modal-md-1" id="supplier_default_background_image" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document" style="width: 100%">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="supplier_background_image_file" name="supplier_default_background_image">-->
                        <!--</center>-->
                        <div id="supplier_background"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-supplier-background" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!--service default image upload-->
<!--myanboxtube default  upload start-->
 <div class="modal bs-example-modal-md-1" id="myanboxtube_default_image" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="supplier_background_image_file" name="supplier_default_background_image">-->
                        <!--</center>-->
                        <div id="myanboxtube_default"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-myanboxtube-default" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!--myanboxtube default image upload end-->
<!--service default  log upload-->
 <div class="modal bs-example-modal-md-1" id="supplier_list_image" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document" style="width: 100%">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="supplier_list_file" name="supplier_list_image">-->
                        <!--</center>-->
                        <div id="supplier_list"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-supplier-list" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!--service default image upload-->
<!--service default  log upload-->
 <div class="modal bs-example-modal-md-1" id="service_list_image" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document" style="width: 100%">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="service_list_file" name="service_list_image">-->
                        <!--</center>-->
                        <div id="service_list"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-service-list" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!--service default image upload-->
<!--myanboxtube list image upload-->
 <div class="modal bs-example-modal-md-1" id="myanboxtube_list_image" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document" style="width: 100%">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="service_list_file" name="service_list_image">-->
                        <!--</center>-->
                        <div id="myanboxtube_list"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-myanboxtube-list" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!--myanboxtube list image upload-->
<!--reno list upload-->
 <div class="modal bs-example-modal-md-1" id="reno_list_image" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document" style="width: 100%">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="reno_list_file" name="reno_list_image">-->
                        <!--</center>-->
                        <div id="reno_list"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-reno-list" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!--reno list image upload-->
<!--freelancer list upload-->
 <div class="modal bs-example-modal-md-1" id="freelancer_list_image" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document" style="width: 100%">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="freelancer_list_file" name="freelancer_list_image">-->
                        <!--</center>-->
                        <div id="freelancer_list"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-freelancer-list" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!--freelancer image upload-->

<!--blog list upload-->
 <div class="modal bs-example-modal-md-1" id="blog_list_image" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document" style="width: 100%">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="blog_list_file" name="blog_list_image">-->
                        <!--</center>-->
                        <div id="blog_list"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-blog-list" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!--blog image upload-->
<!--freelancer detail upload-->
 <div class="modal bs-example-modal-md-1" id="freelancer_detail_image" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md" role="document" style="width: 100%">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                 <form id="coverphotoForm">
                   <div class="form-group">
                        <!--<center>-->
                        <!--  <input type="file" id="freelancer_detail_file" name="freelancer_detail_image">-->
                        <!--</center>-->
                        <div id="freelancer_detail"></div>
                    </div> 
               </form>
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-freelancer-detail-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
      </p>
    </div>
  </div>
</div>
<!--freelancer detail image-->
 <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 

   <script type="text/javascript">
       $(document).ready(function(){
           
        //   admin
         /* bind image */
               var img = '<?php echo asset('storage/admin_logo/'.$setting->admin_default_logo) ?>';
               var image_name = '<?php echo $setting->admin_default_logo ?>';

               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_admin_default_logo").html(html);

              /* image crop */
              var resize99 = $('#admin_logo').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 300,
                   height: 300,
                   type: 'circle' //square
               },
               boundary: {
                   width: 310,
                   height: 310
               }
           });
           $('#admin_default_file').on('change', function () { 

             var reader99 = new FileReader();
               reader99.onload = function (e) {
                 resize99.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader99.readAsDataURL(this.files[0]);
               $('#admin_default_logo_modal').modal('show');
           });
           $('.upload-admin-logo').on('click', function (ev) {
             resize99.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"admin_logo",'old_image':image_name},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_admin_default_logo").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
           
           // start member default background
           /* bind image */
               var member_background = '<?php echo asset('storage/member/'.$setting->member_background_image) ?>';
               var member_background_name = '<?php echo $setting->member_background_image ?>';

               html = '<img alt="'+member_background_name+'" src="' + member_background + '" />';
                $("#current_member_background_image").html(html);

              /* image crop */
              var resize109 = $('#member_background').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 800,
                   height: 330,
                   type: 'square' //square
               },
               boundary: {
                   width: 810,
                   height: 340
               }
           });
           $('#member_background_file').on('change', function () { 

             var reader109 = new FileReader();
               reader109.onload = function (e) {
                 resize109.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader109.readAsDataURL(this.files[0]);
               $('#member_background_image_modal').modal('show');
           });
           $('.upload-member-background-image').on('click', function (ev) {
             resize109.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"member",'old_image':image_name},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_member_background_image").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
           //member default background end
            
              /* bind image */
               var img = '<?php echo asset('storage/company_logo/'.$setting->reno_default_logo) ?>';
               var image_name = '<?php echo $setting->reno_default_logo ?>';

               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_reno_default_logo").html(html);

              /* image crop */
              var resize = $('#reno_logo').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 420,
                   height: 280,
                   type: 'square' //square
               },
               boundary: {
                   width: 430,
                   height: 290
               }
           });
           $('#reno_logo_file').on('change', function () { 

             var reader = new FileReader();
               reader.onload = function (e) {
                 resize.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader.readAsDataURL(this.files[0]);
               $('#reno_default_logo').modal('show');
           });


           $('.upload-reno-logo').on('click', function (ev) {
             resize.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"company_logo",'old_image':image_name},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_reno_default_logo").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
            
                // reno background
                 var reno_background = '<?php echo asset('storage/company_coverphoto/'.$setting->reno_default_background_image) ?>';
               var reno_default_background_image = '<?php echo $setting->reno_default_background_image ?>';

               html = '<img alt="'+reno_default_background_image+'" src="' + reno_background + '" />';
                $("#current_reno_default_background_image").html(html);

              /* image crop */
              var resize1 = $('#reno_background').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 800,
                   height: 330,
                   type: 'square' //square
               },
               boundary: {
                   width: 810,
                   height: 340
               }
           });
           $('#reno_background_image_file').on('change', function () { 

             var reader1 = new FileReader();
               reader1.onload = function (e) {
                 resize1.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader1.readAsDataURL(this.files[0]);
               $('#reno_default_background_image').modal('show');
           });


           $('.upload-reno-background').on('click', function (ev) {
             resize1.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"company_coverphoto","old_image":reno_default_background_image},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_reno_default_background_image").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
       
               
               //service logo start
                  // service logo 
          // reno background
                 var service_logo = '<?php echo asset('storage/company_logo/'.$setting->service_default_logo) ?>';
               var service_default_logo = '<?php echo $setting->service_default_logo ?>';

               html = '<img alt="'+service_default_logo+'" src="' + service_logo + '" />';
                $("#current_service_default_logo").html(html);

              /* image crop */
              var resize2 = $('#service_logo').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 420,
                   height: 280,
                   type: 'square' //square
               },
               boundary: {
                   width: 430,
                   height: 290
               }
           });
           $('#service_logo_file').on('change', function () { 

             var reader2 = new FileReader();
               reader2.onload = function (e) {
                 resize2.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader2.readAsDataURL(this.files[0]);
               $('#service_default_logo').modal('show');
           });


           $('.upload-service-logo').on('click', function (ev) {
             resize2.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"company_logo","old_image":service_default_logo},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_service_default_logo").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
           //service logo end
            // supplier background
                 var supplier_logo = '<?php echo asset('storage/company_logo/'.$setting->supplier_default_logo) ?>';
               var supplier_default_logo = '<?php echo $setting->supplier_default_logo ?>';

               html = '<img alt="'+supplier_default_logo+'" src="' + supplier_logo + '" />';
                $("#current_supplier_default_logo").html(html);

              /* image crop */
              var resize36 = $('#supplier_logo').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 420,
                   height: 280,
                   type: 'square' //square
               },
               boundary: {
                   width: 430,
                   height: 290
               }
           });
           $('#supplier_logo_file').on('change', function () { 
             var reader36 = new FileReader();
               reader36.onload = function (e) {
                 resize36.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader36.readAsDataURL(this.files[0]);
               $('#supplier_default_logo').modal('show');
           });


           $('.upload-supplier-logo').on('click', function (ev) {
             resize36.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"company_logo","old_image":supplier_default_logo},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_supplier_default_logo").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
            
            // start myanbox default default
             // supplier background
                 var myanboxtube_default = '<?php echo asset('storage/myanboxtube/'.$setting->myanboxtube_default_image ) ?>';
               var myanboxtube_default_image = '<?php echo $setting->myanboxtube_default_image ?>';

               html = '<img alt="'+myanboxtube_default_image+'" src="' + myanboxtube_default + '" />';
                $("#current_myanboxtube_default_image").html(html);

              /* image crop */
              var resize3 = $('#myanboxtube_default').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 420,
                   height: 280,
                   type: 'square' //square
               },
               boundary: {
                   width: 430,
                   height: 290
               }
           });
           $('#myanboxtube_default_file').on('change', function () { 
             var reader3 = new FileReader();
               reader3.onload = function (e) {
                 resize3.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader3.readAsDataURL(this.files[0]);
               $('#myanboxtube_default_image').modal('show');
           });


           $('.upload-myanboxtube-default').on('click', function (ev) {
             resize3.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"myanboxtube","old_image":myanboxtube_default_image},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_myanboxtube_default_image").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
            
           
             // service background
                 var service_background = '<?php echo asset('storage/company_coverphoto/'.$setting->service_default_background_image) ?>';
               var service_default_background_image = '<?php echo $setting->service_default_background_image ?>';

               html = '<img alt="'+service_default_background_image+'" src="' + service_background + '" />';
                $("#current_service_default_background_image").html(html);

              /* image crop */
              var resize4 = $('#service_background').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 800,
                   height: 330,
                   type: 'square' //square
               },
               boundary: {
                   width: 810,
                   height: 340
               }
           });
           $('#service_background_image_file').on('change', function () { 

             var reader4 = new FileReader();
               reader4.onload = function (e) {
                 resize4.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader4.readAsDataURL(this.files[0]);
               $('#service_default_background_image').modal('show');
           });


           $('.upload-service-background').on('click', function (ev) {
             resize4.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"company_coverphoto","old_image":service_default_background_image},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_service_default_background_image").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
           //service background end
             // supplier background
                 var supplier_background = '<?php echo asset('storage/company_coverphoto/'.$setting->supplier_default_background_image) ?>';
               var supplier_default_background_image = '<?php echo $setting->supplier_default_background_image ?>';

               html = '<img alt="'+supplier_default_background_image+'" src="' + supplier_background + '" />';
                $("#current_supplier_default_background_image").html(html);

              /* image crop */
              var resize5 = $('#supplier_background').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 800,
                   height: 330,
                   type: 'square' //square
               },
               boundary: {
                   width: 810,
                   height: 340
               }
           });
           $('#supplier_background_image_file').on('change', function () {
             var reader5 = new FileReader();
               reader5.onload = function (e) {
                 resize5.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader5.readAsDataURL(this.files[0]);
              $('#supplier_default_background_image').modal('show');
           });


           $('.upload-supplier-background').on('click', function (ev) {
             resize5.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"company_coverphoto","old_image":supplier_default_background_image},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_supplier_default_background_image").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
           //supplier background image
            // supplier background
                 var supplier_list = '<?php echo asset('storage/company_coverphoto/'.$setting->supplier_list_image) ?>';
               var supplier_list_image = '<?php echo $setting->supplier_list_image ?>';

               html = '<img alt="'+supplier_list_image+'" src="' + supplier_list + '" />';
                $("#current_supplier_list_image").html(html);

              /* image crop */
              var resize6 = $('#supplier_list').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 800,
                   height: 330,
                   type: 'square' //square
               },
               boundary: {
                   width: 810,
                   height: 340
               }
           });
           $('#supplier_list_file').on('change', function () {
             var reader6 = new FileReader();
               reader6.onload = function (e) {
                 resize6.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader6.readAsDataURL(this.files[0]);
               $('#supplier_list_image').modal('show');
           });


           $('.upload-supplier-list').on('click', function (ev) {
             resize6.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"company_coverphoto","old_image":supplier_list_image},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_supplier_list_image").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
           
             // service list
                 var service_list = '<?php echo asset('storage/company_coverphoto/'.$setting->service_list_image) ?>';
               var service_list_image = '<?php echo $setting->service_list_image ?>';

               html = '<img alt="'+service_list_image+'" src="' + supplier_list + '" />';
                $("#current_service_list_image").html(html);

              /* image crop */
              var resize7 = $('#service_list').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 800,
                   height: 330,
                   type: 'square' //square
               },
               boundary: {
                   width: 810,
                   height: 340
               }
           });
           $('#service_list_file').on('change', function () {
             var reader7 = new FileReader();
               reader7.onload = function (e) {
                 resize7.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader7.readAsDataURL(this.files[0]);
               $('#service_list_image').modal('show');
           });


           $('.upload-service-list').on('click', function (ev) {
             resize7.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"company_coverphoto","old_image":service_list_image},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_service_list_image").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
        //   service list end
        //  myanbox list
            var myanboxtube_list = '<?php echo asset('storage/myanboxtube/'.$setting->myanboxtube_list_image ) ?>';
            var myanboxtube_list_image = '<?php echo $setting->myanboxtube_list_image ?>';
                       
                      
                       
               html = '<img alt="'+myanboxtube_list_image+'" src="' + myanboxtube_list + '" />';
                $("#current_myanboxtube_list_image").html(html);

              /* image crop */
            var resize107 = $('#myanboxtube_list').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 800,
                   height: 330,
                   type: 'square' //square
               },
               boundary: {
                   width: 810,
                   height: 340
               }
           });   
           $('#myanboxtube_list_file').on('change', function () {
             var reader107 = new FileReader();
               reader107.onload = function (e) {
                 resize107.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader107.readAsDataURL(this.files[0]);
               $('#myanboxtube_list_image').modal('show');
           });


           $('.upload-myanboxtube-list').on('click', function (ev) {
             resize107.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"myanboxtube","old_image":myanboxtube_list_image},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_myanboxtube_list_image").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
        // myanbox list image end
                     // supplier background
                 var reno_list = '<?php echo asset('storage/company_coverphoto/'.$setting->reno_list_image) ?>';
               var reno_list_image = '<?php echo $setting->reno_list_image ?>';

               html = '<img alt="'+reno_list_image+'" src="' + reno_list + '" />';
                $("#current_reno_list_image").html(html);

              /* image crop */
              var resize8 = $('#reno_list').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 800,
                   height: 330,
                   type: 'square' //square
               },
               boundary: {
                   width: 810,
                   height: 340
               }
           });
           $('#reno_list_file').on('change', function () {
             var reader8= new FileReader();
               reader8.onload = function (e) {
                 resize8.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader8.readAsDataURL(this.files[0]);
               $('#reno_list_image').modal('show');
           });


           $('.upload-reno-list').on('click', function (ev) {
             resize8.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"company_coverphoto","old_image":reno_list_image},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_reno_list_image").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
        //   service list end
                // supplier background
                 var freelancer_list = '<?php echo asset('storage/freelancer/'.$setting->freelancer_list_image) ?>';
               var freelancer_list_image = '<?php echo $setting->freelancer_list_image ?>';

               html = '<img alt="'+freelancer_list_image+'" src="' + freelancer_list + '" />';
                $("#current_freelancer_list_image").html(html);

              /* image crop */
              var resize9 = $('#freelancer_list').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 800,
                   height: 330,
                   type: 'square' //square
               },
               boundary: {
                   width: 810,
                   height: 340
               }
           });
           $('#freelancer_list_file').on('change', function () {
             var reader9= new FileReader();
               reader9.onload = function (e) {
                 resize9.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader9.readAsDataURL(this.files[0]);
               $('#freelancer_list_image').modal('show');
           });


           $('.upload-freelancer-list').on('click', function (ev) {
             resize9.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"freelancer","old_image":freelancer_list_image},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_freelancer_list_image").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
        //   service list end
         
            
              // supplier background
                 var blog_list = '<?php echo asset('storage/blog/'.$setting->blog_list_image) ?>';
               var blog_list_image = '<?php echo $setting->blog_list_image ?>';

               html = '<img alt="'+blog_list_image+'" src="' + blog_list + '" />';
                $("#current_blog_list_image").html(html);
              /* image crop */
              var resize10 = $('#blog_list').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 800,
                   height: 330,
                   type: 'square' //square
               },
               boundary: {
                   width: 810,
                   height: 340
               }
           });
           $('#blog_list_file').on('change', function () {
             var reader10= new FileReader();
               reader10.onload = function (e) {
                 resize10.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader10.readAsDataURL(this.files[0]);
               $('#blog_list_image').modal('show');
           });


           $('.upload-blog-list').on('click', function (ev) {
             resize10.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"blog","old_image":blog_list_image},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_blog_list_image").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
        //   freelancer default list end
            var freelancer_logo = '<?php echo asset('storage/freelancer/'.$setting->freelancer_default_logo) ?>';
               var freelancer_default_logo = '<?php echo $setting->freelancer_default_logo ?>';

               html = '<img alt="'+freelancer_default_logo+'" src="' + freelancer_logo + '" />';
                $("#current_freelancer_default_logo").html(html);

              /* image crop */
              var resize11 = $('#freelancer_logo').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 300,
                   height: 300,
                   type: 'circle' //square
               },
               boundary: {
                   width: 310,
                   height: 310
               }
           });
           $('#freelancer_file').on('change', function () { 
             var reader11 = new FileReader();
               reader11.onload = function (e) {
                 resize11.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader11.readAsDataURL(this.files[0]);
               $('#freelancer_default_logo').modal('show');
           });


           $('.upload-freelancer-logo').on('click', function (ev) {
             resize11.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"freelancer",'old_image':freelancer_default_logo},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {
                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_freelancer_default_logo").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
           //freelancer default end
             var member_logo = '<?php echo asset('storage/user/'.$setting->member_default_logo) ?>';
               var member_default_logo = '<?php echo $setting->member_default_logo ?>';

               html = '<img alt="'+member_default_logo+'" src="' + member_logo + '" />';
                $("#current_member_default_logo").html(html);
              var resize12 = $('#member_logo').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 300,
                   height: 300,
                   type: 'circle' //square
               },
               boundary: {
                   width: 310,
                   height: 310
               }
           });
           $('#image_file').on('change', function () {
             var reader12 = new FileReader();
               reader12.onload = function (e) {
                 resize12.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader12.readAsDataURL(this.files[0]);
               $('#member_default_logo').modal('show');
           });
           
           $('.upload-image').on('click', function (ev) {
             resize12.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"user",'old_image':member_default_logo},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_member_default_logo").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
           
           var freelancer_detail = '<?php echo asset('storage/freelancer/'.$setting->freelancer_detail_image) ?>';
               var freelancer_detail_image = '<?php echo $setting->freelancer_detail_image ?>';

               html = '<img alt="'+freelancer_detail_image+'" src="' + freelancer_detail + '" />';
                $("#current_freelancer_detail_image").html(html);
              var resize13 = $('#freelancer_detail').croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 800,
                   height: 330,
                   type: 'square' //square
               },
               boundary: {
                   width: 810,
                   height: 340
               }
           });
           $('#freelancer_detail_file').on('change', function () { 

             var reader13 = new FileReader();
               reader13.onload = function (e) {
                 resize13.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader13.readAsDataURL(this.files[0]);
               $('#freelancer_detail_image').modal('show');
           });


           $('.upload-freelancer-detail-image').on('click', function (ev) {
             resize13.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"freelancer",'old_image':freelancer_detail_image},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {

                   html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                   $("#current_freelancer_detail_image").html(html);   
                       },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
            
            //  start form submit
             $('form#editProjectSettingForm').on('submit',function(e){
            //   var about_us = $('#about_us').summernote('code');
            //   var privacy  = $('#privacy').summernote('code');
            //   var terms_and_condition  = $('#terms_and_condition').summernote('code');
               var member_default_logo     = $('#current_member_default_logo img').attr('alt');
               var freelancer_default_logo      = $('#current_freelancer_default_logo  img').attr('alt');
               var service_default_logo      = $('#current_service_default_logo  img').attr('alt');
               var supplier_default_logo      = $('#current_supplier_default_logo  img').attr('alt');
               var reno_default_logo      = $('#current_reno_default_logo  img').attr('alt');
               var service_default_background_image     = $('#current_service_default_background_image   img').attr('alt');
               var freelancer_detail_image      = $('#current_freelancer_detail_image  img').attr('alt');
               var supplier_default_background_image    = $('#current_supplier_default_background_image  img').attr('alt');
               var reno_default_background_image       = $('#current_reno_default_background_image   img').attr('alt');
               var service_list_image  = $('#current_service_list_image img').attr('alt');
               var supplier_list_image  = $('#current_supplier_list_image img').attr('alt');
               var reno_list_image   = $('#current_reno_list_image img').attr('alt');
               var blog_list_image    = $('#current_blog_list_image img').attr('alt');
               var freelancer_list_image    = $('#current_freelancer_list_image img').attr('alt');
               var admin_default_logo    = $('#current_admin_default_logo img').attr('alt');
               var member_background_image    = $('#current_member_background_image img').attr('alt');
               var myanboxtube_list_image  = $('#current_myanboxtube_list_image img').attr('alt');
               var myanboxtube_default_image = $('#current_myanboxtube_default_image img').attr('alt');
               e.preventDefault();
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('projectsetting.update',$setting->id) }}",
                     data: $('#editProjectSettingForm').serialize()+"&member_default_logo="+member_default_logo
                     +"&freelancer_default_logo="+freelancer_default_logo+"&service_default_logo="+service_default_logo+"&supplier_default_logo="+supplier_default_logo+"&reno_default_logo="+reno_default_logo
                     +"&service_default_background_image="+service_default_background_image+"&freelancer_detail_image="+freelancer_detail_image+"&supplier_default_background_image="+supplier_default_background_image
                     +"&service_list_image="+service_list_image+"&supplier_list_image="+supplier_list_image+"&reno_list_image="+reno_list_image+"&blog_list_image="+blog_list_image+"&freelancer_list_image="+freelancer_list_image
                     +"&reno_default_background_image="+reno_default_background_image+"&admin_default_logo="+admin_default_logo+"&member_background_image="+member_background_image+'&myanboxtube_list_image='+myanboxtube_list_image+
                     "&myanboxtube_default_image="+myanboxtube_default_image,
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success:function(data)
                     {
                         if($.isEmptyObject(data.errors)){
                              //var message = "Successfully updated!";
                                var url = window.location.href;
                                window.location=url;
                               //  callbackURL(message,url);
                                 
                          /* alert('successfully updated');
                           location.reload();*/
                         }
                         else{
                             printErrorMsg(data.errors);
                         } 
                      },
                     error:function(e)
                     {
                        console.log(e);
                     }
                   });
               });

    
             // end form submit
           }); 
            //     function printErrorMsg (msg) {
            //     if($(msg).length >1){
            //       $.each(msg, function( key, value ) {
            //       message += '<span class="alert alert-danger">'+value+'</span>';
            //         $("#error").html(message);
            //     }); 
            //     }
            //     else{
            //                           message = '<span class="alert alert-danger">'+msg+'</span>';
            //         $("#error").html(message);               
            //       }   
            // }
  </script>

@endsection
