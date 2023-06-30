@extends('backend.layouts.user_panel')
@section('title','Myanbox | Change Password')
@section('content')
<div class="freelancers">
   <section class="inner-heading" style="background-image: url('{{ asset('storage/member/'.$projectsetting->member_background_image)}}');">
    <div class="container">
    <h1>{{ Auth()->user()->name }}'s Change Password</h1>
    </div>
  </section>

          <section class="inner-wrap">
            <div class="container">
                <div class="row">
                    @include('admin.element.success-message')
                      <ul class="blog-grid">
                        <div class="col-md-9 col-sm-12">
                            <li>
                    <div class="blog-inter" style="padding:40px">
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

                                                               <label>Old Password</label><span class="text-danger"> * </span>
                                                                <input type="password" class="form-control" placeholder="Old Password" value="" name="old_password">
                                                                 <div id="old_passwordError" class="error"></div>
                                                            </div>
                                                            <div class="form-group">
                                                              <label>New Password</label><span class="text-danger"> * </span>
                                                                <input type="password" class="form-control" placeholder="New Password" name="new_password" value="">
                                                                 <div id="new_passwordError" class="error"></div>
                                                            </div>
                                                            <div class="form-group">
                                                               <label>Confirm Password</label><span class="text-danger"> * </span>
                                                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" value="">
                                                                 <div id="confirm_passwordError" class="error"></div>
                                                            </div>
                                                            <input type="hidden" name="information_type" value="account">

                                                            <div class="row" style="padding-top:15px">
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
                            @include('backend.element.user_menu')
            </ul>
    </div>
</div>
</section>
</div>
@endsection
@section('script')
<!-- update account end -->
<script type="text/javascript">
$(document).ready(function() {
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
                    // var message = data.success;
                               var url = window.location.href;
                               window.location=url;
                               //  callbackURL(message,url);

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
