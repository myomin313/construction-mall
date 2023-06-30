@extends('layouts.freelancer_panel')
@section('content')
  <body class="freelancers">
          <div class="page-wrapper">
             @include('element.header')
                <section class="inner-heading"  style="background: url('{{ asset('storage/freelancer/'.$projectsetting->freelancer_detail_image)}}') 100%;">
    <div class="container">
    <h1> Change Password</h1>
     
    </div>
  </section>
 <!-- Single pro tab review Start-->
   <section class="inner-wrap">
    <!-- start -->
    <!--container start-->
            <div class="container">
              <div class="row ">
                  @include('admin.element.success-message')
              <!--row start-->
              <ul class="blog-grid">        
                <!--col start-->
               
     <div class="col-md-9 col-sm-12">
         <li>
          <div class="blog-inter">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  
            <!--<div class="container-fluid" style="border: 2px solid #acacac;border-radius: 10px">-->
                <div class="row">
                    <div class="col-md-offset-1 col-sm-offset-1 col-md-10 col-sm-10 col-xs-12">
<!-- update account start -->
                         <!--<div class="product-tab-list" id="account">-->
                                    <!--<div class="row">-->
                                        <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
                                            <!--<div class="review-content-section">-->
                                                <!--<div class="row">-->
                                                    <!--<div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">-->
                                                        <!--<div class="devit-card-custom">-->
                                                              <form id="accountForm">
                                                            {{csrf_field()}}
                                                            <div class="form-group">
                                                                 <label>Current Password:</label><span class="text-danger">* </span>
                                                                <input type="password" class="form-control" placeholder="Old Password" value="" name="old_password">
                                                                 <div id="old_passwordError" class="error"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                 <label>New Password:</label><span class="text-danger">* </span>
                                                                <input type="password" class="form-control" placeholder="Password" name="new_password" value="">
                                                                 <div id="new_passwordError" class="error"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                  <label>Retype New Password:</label><span class="text-danger">* </span>
                                                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" value="">
                                                           <div id="confirm_passwordError" class="error"></div>
                                                            </div>
                                                            <input type="hidden" name="information_type" value="account">

                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="payment-adress">
                                                             <center>
                                                            <button id="btn_freelancerupdatepassword" type="submit" class="btn btn-standard">Submit</button>
                                                             </center>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- start -->
                                                <!-- <div class="row">-->
                                                <!--<div class="col-lg-12 col-md-12">-->
                                                <!--  <div class="payment-adress">-->
                                                <!--      <center>-->
                                                <!--            <button type="submit" id="btn_editblog" class="btn btn-standard">Update</button>-->
                                                <!--            </center>-->
                                                <!--        </div>-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                <!--  end -->
                                                </form>
                                                        <!--</div>-->
                                                    <!--</div>-->
                                                <!--</div>-->
                                            <!--</div>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    </li>
              </div>
               <!-- start change -->
                <li class="col-md-3 col-sm-12"> 
           @include('admin.freelancer.freelancer_menu')
          <!-- end advertising -->
            @foreach($advertisings as $advertising)
          <div class="side-bar"> 
              <div class="advertise">
                   <a href="{{ $advertising->link }}"><img src="{{ asset('storage/advertising/'.$advertising->photo) }}" alt="{{ $advertising->company_name }}" style="height:100%;width:100%"></a>
              </div> 
          </div>
           @endforeach 
        </li>
    <!-- end -->

            </ul>
          </div>
        </div>
              </section>
                                <!-- update account end -->
                                <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
                                <script type="text/javascript">
                                
                                      $('#btn_freelancerupdatepassword').on('click',function(){
	var $this=$(this);
   $this
         .attr('disabled','disabled');
          setTimeout(function() {
            $this.removeAttr('disabled');
        }, 3000);
});

                                	$(document).ready(function(){
                                	$('form#accountForm').on('submit',function(e){
                                     e.preventDefault();
                                     $.ajax({
                                          type: "post",
                                           url: "{{ URL::route('freelancer.update') }}",
                                           data: $('#accountForm').serialize(),
                                           dataType: 'json',
                                          headers: {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                          success:function(data)
                                          {                        
                                            if($.isEmptyObject(data.errors)){
                                             //var message = data.success;
                                                  var url = window.location.href;
                                                  window.location=url;
                                                //callbackURL(message,url);
                                           }
                                           else{
                                               // printErrorMsg(data.errors);
                                                console.log(data.errors);
                                                  if ($.isEmptyObject(data.errors.old_password)) {
                        $('#old_passwordError').html(""); 
                         $("input[name=old_password]").removeClass('error-messageborder');
                    } else {
                        $('#old_passwordError').html(data.errors.old_password);
                        $("input[name=old_password]").addClass('error-messageborder');
                    }
                    if ($.isEmptyObject(data.errors.new_password)) {
                        $('#new_passwordError').html(""); 
                         $("input[name=new_password]").removeClass('error-messageborder');
                    } else {
                        $('#new_passwordError').html(data.errors.new_password);
                        $("input[name=new_password]").addClass('error-messageborder');
                    }
                    if ($.isEmptyObject(data.errors.confirm_password)) {
                        $('#confirm_passwordError').html(""); 
                         $("input[name=confirm_password]").removeClass('error-messageborder');
                    } else {
                        $('#confirm_passwordError').html(data.errors.confirm_password);
                        $("input[name=confirm_password]").addClass('error-messageborder');
                    }
                                            } 
                                           },
                                          error:function(e)
                                          {
                                            var message = "Something Wrong!";
                                            callbackFailure(message) ;
                                          }
                                        });
                                   });
                                });
                                </script>
@endsection