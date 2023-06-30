@extends('layouts.freelancer_panel')
@section('content')
 
 <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mg-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                	 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pt-20 company_profile">
                        <h2 class="center">Freelancer Account</h2>  
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<!-- update account start --> <div class="product-tab-list pb-150" id="account">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                                                        <div class="devit-card-custom">
                                                              <form id="accountForm">
                                                            {{csrf_field()}}
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" placeholder="Old Password" value="" name="old_password">
                                                                 <div id="old_passwordError" class="error"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" placeholder="Password" name="new_password" value="">
                                                                 <div id="new_passwordError" class="error"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" value="">
                                                           <div id="confirm_passwordError" class="error"></div>
                                                            </div>
                                                            <input type="hidden" name="information_type" value="account">

                                                            <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button id="btn_freelancerupdatepassword" type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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
                            </div>
                        </div>
                    </div>
                </div>
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
                                             var message = data.success;
                                                  var url = window.location.href;
                                 callbackURL(message,url);
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