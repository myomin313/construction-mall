<script>
   
        

    $(document).ready(function(){
      


        $('#member_login_form').on('click',function(e){
            var $this=$(this);
            $this
                .attr('disabled','disabled');
            setTimeout(function() {
                $this.removeAttr('disabled');
            }, 3000);

            e.preventDefault();
            var formData = {
                email: $('#member_login_email').val(),
                password: $('#member_login_password').val(),
                role:$('#member_login_role').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url:APP_URL+"/login",
                data: formData,
                success: function (data) {
                    if(data.success === false){
                        var message = data.message;
                        callbackError(message);

                        //  $("#login_fail").html(data.message);
                    }else if(data.success == true){
                         var message = "Login successfully!";
                        var url = window.location.href;
                        // var url = APP_URL+"/freelancer/profile";
                        callbackURL(message,url);
                    }else{
                       var message = "Please logout currently loggedin account.";
                        var url = window.location.href;
                        // var url = APP_URL+"/freelancer/profile";
                        callbackErrorURL(message,url);
                    }
                },
                error: function (data) {
                    //  var message = data.message;
                    //  callbackError(message);
                    $("#login_fail").html(data.message);
                }
            });

        });
        $('#company_login_form').on('click',function(e){
            var $this=$(this);
            $this
                .attr('disabled','disabled');
            setTimeout(function() {
                $this.removeAttr('disabled');
            }, 3000);
            e.preventDefault();
            var formData = {
                email: $('#company_login_email').val(),
                password: $('#company_login_password').val(),
                role:$('#company_login_role').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url:APP_URL+"/login",
                data: formData,
                success: function (data) {
                    
                    if(data.success === false){
                        var message = data.message;
                        callbackError(message);

                        //  $("#login_fail").html(data.message);
                    }else if(data.success === true){
                        var message = "Login successfully!";
                        if(data.path != ""){
                            var url = APP_URL+data.path;
                        }else{
                            var url = window.location.href;
                        }
                        callbackURL(message,url);
                    }else{
                        var message = "Please logout currently loggedin account!";
                        var url = window.location.href;
                        // var url = APP_URL+"/freelancer/profile";
                        callbackErrorURL(message,url);
                    }
                },
                error: function (data) {
                    // var message = data.message;
                    //  callbackError(message);
                    $("#login_fail").html(data.message);
                }
            });

        });
        $('#freelancer_login_form').on('click',function(e){
            var $this=$(this);
            $this
                .attr('disabled','disabled');
            setTimeout(function() {
                $this.removeAttr('disabled');
            }, 3000);
            e.preventDefault();
            var formData = {
                email: $('#freelancer_login_email').val(),
                password: $('#freelancer_login_password').val(),
                role:$('#freelancer_login_role').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url:APP_URL+"/login",
                data: formData,
                success: function (data) {
                    

                    if(data.success === false){
                        var message = data.message;
                        callbackError(message);

                        //  $("#login_fail").html(data.message);
                    }else if(data.success === true){
                        var message = "Login successfully!";
                        if(data.path != ""){
                            var url = data.path;
                        }else{
                            var url = window.location.href;
                        }
                        callbackURL(message,url);
                    }else{
                        var message = "Please logout currently loggedin account";
                        var url = window.location.href;
                        callbackErrorURL(message,url);
                    }
                },
                error: function (data) {
                    // var message = data.message;
                    // callbackError(message);
                    $("#login_fail").html(data.message);
                }
            });

        });
        $('#member_reg_form').on('submit',function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url:APP_URL+"/register",
                data:  $('#member_reg_form').serialize(),
                success: function (data) {
                    console.log(data);
                    if(data.success === true){
                        var message = "You have successfully signed up! An Email is send to your email account to " +
                            "verify. Please check your email.";
                        var url = APP_URL;
                        callbackURL(message,url);

                    }else if(data.success === false){
                        if(data.errors.name){
                            $('#member_register_name_error').html(data.errors.name);
                        }
                        if(data.errors.email){
                            $('#member_register_email_error').html(data.errors.email);
                        }
                        if(data.errors.phone){
                            $('#member_register_phone_error').html(data.errors.phone);
                        }
                        if(data.errors.role){
                            $('#member_register_role_error').html(data.errors.role);
                        }
                        if(data.errors.password){
                            $('#member_register_password_error').html(data.errors.password);
                        }
                        if(data.errors.confirm_password){
                            $('#member_register_confirm_password_error').html(data.errors.confirm_password);
                        }
                    }else{
                       var message = "Please logout currently loggedin account.";
                        var url = window.location.href;
                        // var url = APP_URL+"/freelancer/profile";
                        callbackErrorURL(message,url);
                    }
                },
                error: function (data) {
                    var message = "You have error when register!";
                   // callbackError(message);
                    console.log(data);
                    /* alert('You have Error When Register');*/
                }
            });

        });

        $('#company_reg_form').on('submit',function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url:APP_URL+"/register",
                data:  $('#company_reg_form').serialize(),
                success: function (data) {
                    if(data.success === true){
                        var message = "You have successfully signed up! An Email is send to your email account to " +
                            "verify. Please check your email.";
                        var url = APP_URL;
                        callbackURL(message,url);

                        /* alert('You Have Successfully Signed Up');
                        window.location=APP_URL+"/company/dashboard"; */
                    }else if(data.success === false) {
                        console.log(data.errors);
                        if(data.errors.name){
                            $('#company_register_name_error').html(data.errors.name);
                        }
                        if(data.errors.email){
                            $('#company_register_email_error').html(data.errors.email);
                        }
                        if(data.errors.phone){
                            $('#company_register_phone_error').html(data.errors.phone);
                        }
                        if(data.errors.role){
                            $('#company_register_role_error').html(data.errors.role);
                        }
                        if(data.errors.password){
                            $('#company_register_password_error').html(data.errors.password);
                        }
                        if(data.errors.confirm_password){
                            $('#company_register_confirm_password_error').html(data.errors.confirm_password);
                        }
                    }else{
                       var message = "Please logout currently loggedin account.";
                        var url = window.location.href;
                        // var url = APP_URL+"/freelancer/profile";
                        callbackErrorURL(message,url);
                    }
                },
                error: function (data) {
                    var message = "You have error when register!";
                    callbackError(message);

                    //alert('You have Error When Register');
                }
            });

        });

        $('#freelancer_reg_form').on('submit',function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url:APP_URL+"/register",
                data:  $('#freelancer_reg_form').serialize(),
                success: function (data) {
                    if(data.success === true){
                        var message = "You have successfully signed up! An Email is send to your email account to " +
                            "verify. Please check your email.";
                        var url = APP_URL;
                        callbackURL(message,url);

                        // alert('You Have Successfully Signed Up');
                        // window.location=APP_URL+"/freelancer/profile";
                    }else if(data.success === false){
                        if(data.errors.name){
                            $('#freelancer_register_name_error').html(data.errors.name);
                        }
                        if(data.errors.email){
                            $('#freelancer_register_email_error').html(data.errors.email);
                        }
                        if(data.errors.phone){
                            $('#freelancer_register_phone_error').html(data.errors.phone);
                        }
                        if(data.errors.role){
                            $('#freelancer_register_role_error').html(data.errors.role);
                        }
                        if(data.errors.password){
                            $('#freelancer_register_password_error').html(data.errors.password);
                        }
                        if(data.errors.confirm_password){
                            $('#freelancer_register_confirm_password_error').html(data.errors.confirm_password);
                        }
                    }else{
                       var message = "Please logout currently loggedin account.";
                        var url = window.location.href;
                        // var url = APP_URL+"/freelancer/profile";
                        callbackErrorURL(message,url);
                    }
                },
                error: function (data) {
                    var message = "You have error when register!";
                    callbackError(message);

                    //alert('You have Error When Register');
                }
            });

        });
        function printErrorMsg (msg) {
            var message="";
            if($(msg).length >1){
                message +='<ul class="alert alert-danger">';
                $.each(msg, function( key, value ) {
                    message += '<li>'+value+'</li>';
                });
                message +='</ul>';
                $(".error").html(message);
            }
            else{
                message = '<span class="alert alert-danger">'+msg+'</span>';
                $(".error").html(message);

                setTimeout(function() {
                    $('.alert').fadeOut('fast');
                }, 5000);
            }
        }


    });

    
</script>
