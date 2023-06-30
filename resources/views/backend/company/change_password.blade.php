@extends('backend.layouts.company_panel')
@section('title','Change Password')
@section('content')

            <div class="col-md-9 col-sm-12">
                <li>
                    <div class="blog-inter">
                        <div class="row">
                            <div class="col-md-offset-1 col-sm-offset-1 col-md-10 col-sm-10 col-xs-12">
                                <form id="accountForm">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label>Current Password:</label><span class="text-danger">* </span>
                                        <input type="password" class="form-control" placeholder="Enter Current Password" value="" name="old_password">
                                        <div id="old_passwordError" class="error"></div>
                                    </div>
                                    <div class="form-group"><label>New Password:</label><span class="text-danger">* </span>
                                        <input type="password" class="form-control" placeholder="Enter New Password" name="new_password" value="">
                                        <div id="new_passwordError" class="error"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Retype New Password:</label><span class="text-danger">* </span>
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Retype New Password" value="">
                                        <div id="confirm_passwordError" class="error"></div>
                                    </div>
                                    <input type="hidden" name="information_type" value="account">
                                    <div class="row pt25 pb30">
                                        <div class="col-lg-12">
                                            <center>
                                                <button id="btn_passwordupdate" type="submit" class="btn btn-standard">Change Password</button>
                                            </center>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
    <!--container end-->



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
                            //callbackURL(message,url);

                            // callbackSuccess(message);

                        } else {

                            //printErrorMsg(data.errors);
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

