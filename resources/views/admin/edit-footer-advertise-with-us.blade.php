@extends('layouts.admin_panel')
@section('content')
         <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mg-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pt-20 company_profile">
                        <h2 class="center">Freelancer Information</h2>  
                    </div> -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            
                             <div class="col-md-12 error">
                           </div>
                            <div id="myTabContent" class="tab-content custom-product-edit">


                                <!-- update account start -->
                                 <div class="product-tab-list tab-pane fade active in" id="profile">
                              <!--   <div class="product-tab-list tab-pane fade pb-150" id="account"> -->
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                                                        <div class="devit-card-custom">
                                                       <form action="{{ url('/advertise-with-us/footer/update') }}"  method="post" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                           
                                                            
                                                              <div class="form-group">
                                                                <input type="text" class="form-control"  value="{{ old('analyse_customer_data_header',$advertisewithusfooter->analyse_customer_data_header)}}"
                                                                name="analyse_customer_data_header">
                                                            </div>
                                                            
                                                            
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"  value="{{ old('btn_text',$advertisewithusfooter->btn_text )}}" name="btn_text">
                                                            </div>
                                                            
                                                              <div class="form-group">
                                                             
                                                                <input type="text" class="form-control"  value="{{ old('advertise_with_us',$advertisewithusfooter->advertise_with_us)}}" 
                                                                name="advertise_with_us">
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                             
                                                                <input type="text" class="form-control"  value="{{ old('call_now',$advertisewithusfooter->call_now )}}" 
                                                                name="call_now">
                                                            </div>

                                                             <div class="form-group">
                                                              
                                                              <textarea name="analyse_description"  class="form-control" value="{{ old('analyse_description',$advertisewithusfooter->analyse_description )}}">
                                                    {{ old('analyse_description',$advertisewithusfooter->analyse_description )}}
                                                              </textarea>  
                                                           </div>
                                                           
                                                           
                                                           
                                                            <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- update account end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- start profile image pop up -->
        <!--image upload-modal start-->
            <div class="modal fade bs-example-modal-md-1" id="joinaboutusmodal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Upload  Photo</h2>
                       <form id="profilephotoForm" enctype="multipart/form-data">
                         <div class="form-group">
                              <center>
                                <input type="file" id="aboutus_file" name="aboutus_photo" accept="image/*">
                              </center>
                              <div id="aboutus_photo"></div>
                          </div> 
                     </form>
            <p>
              <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-aboutus-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
            </p>
          </div>
        </div>
      </div>
        <!-- end profile image pop up -->
        <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
 
       @endsection