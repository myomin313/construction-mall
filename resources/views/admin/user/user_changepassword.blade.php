@extends('layouts.user')
@section('content')
<body class="freelancers">
    
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
    <h1>{{ Auth()->user()->name }}'s Change Password</h1>     
    </div>
  </section> 
 
          <section class="inner-wrap">
            <div class="container">
                <div class="row">
                      <ul class="blog-grid">
                        <div class="col-md-9 col-sm-12">
                            <li>
                    <div class="blog-inter" style="padding-bottom:40px">
                                  <div class="row">
                                      <div class="col-md-offset-1 col-sm-offset-1 col-md-10 col-sm-10 col-xs-12">
                  <!--<div class="product-tab-list pb-15" id="account">-->
                  <!--                  <div class="row">-->
                  <!--                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
                                           <div id="error">
                                         </div>
                                            <!--<div class="review-content-section">-->
                                            <!--    <div class="row">-->
                                            <!--        <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">-->
                                            <!--            <div class="devit-card-custom">-->
                                        <form id="accountForm">
                                                            {{csrf_field()}}
                                                            <div class="form-group">
                                                            
                                                               <label>Old Password</label><span class="text-error-danger"> * </span>
                                                                <input type="password" class="form-control" placeholder="Old Password" value="" name="old_password">
                                                                 <div id="old_passwordError" class="error"></div>
                                                            </div>
                                                            <div class="form-group">
                                                              <label>New Password</label><span class="text-error-danger"> * </span>
                                                                <input type="password" class="form-control" placeholder="New Password" name="new_password" value="">
                                                                 <div id="new_passwordError" class="error"></div>
                                                            </div>
                                                            <div class="form-group">
                                                               <label>Confirm Password</label><span class="text-error-danger"> * </span>
                                                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" value="">
                                                                 <div id="confirm_passwordError" class="error"></div>
                                                            </div>
                                                            <input type="hidden" name="information_type" value="account">

                                                            <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                             <center>
                                                            <button id="btn_passwordupdate" type="submit" class="btn btn-standard">Submit</button>
                                                             </center>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            <!--            </div>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                         </div>
                                    </div>
                                </div>
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
                                <!-- update account end -->
                                <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
                                <script type="text/javascript">
                               $(document).ready(function() {
//                                   $('#btn_passwordupdate').on('click',function(){
// 	var $this=$(this);
//   $this
//          .attr('disabled','disabled');
//           setTimeout(function() {
//             $this.removeAttr('disabled');
//         }, 3000);
// });
    $('form#accountForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "{{ URL::route('admin.account.update') }}",
            data: $('#accountForm').serialize(),
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if ($.isEmptyObject(data.errors)) {
                     var message = data.success;
                               var url = window.location.href;
                                 callbackURL(message,url); 
                    
                   // callbackSuccess(message);
                   
                } else {
                 
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
            error: function(e) {
                var message = "Something Wrong!";
                callbackFailure(message);
            }
        });
    });

    function printErrorMsg(msg) {
        if ($(msg).length > 1) {
            var message = "";
            $.each(msg, function(key, value) {
                message += '<span class="alert alert-danger">' + value + '</span>';
                $("#error").html(message);
            });
        } else {
            message = '<span class="alert alert-danger">' + msg + '</span>';
            $("#error").html(message);
        }
    }

});
                                </script>
@endsection