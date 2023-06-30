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
                                <form action="{{ url('/about-us/header/update') }}"  method="post" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                           
                                                            <div class="form-group">
                                                              <label>Title</label>
                                                                <input type="text" class="form-control" placeholder="Blog Title" value="{{ old('header',$aboutusheader->header)}}" name="header">
                                                            </div>

                                                             <div class="form-group">
                                                                <label>Header Description</label>
                                                              <textarea name="header_description"  class="form-control" >
                                                                <?php echo $aboutusheader->header_description ?>
                                                              </textarea>  
                                                           </div>
                                                           
                                                            <div class="form-group">
               <label for="name">Header Background Color:</label>
               <input type="color" class="form-control"  name="header_background_color" value="{{ $aboutusheader->header_background_color }}">
            </div>
                                                       <div class="form-group">
               <label for="name">Header Font Color:</label>
               <input type="color" class="form-control"  name="header_font_color" value="{{ $aboutusheader->header_font_color }}">
            </div>     
                                                           
                                                           
                                                            
                                                            <div class="form-group">
                                                              <label>Video</label>
                                                                <input type="text" class="form-control" placeholder="Blog Title" value="{{ old('header',$aboutusheader->video)}}" name="video">
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