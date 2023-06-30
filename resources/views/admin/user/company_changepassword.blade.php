@extends('layouts.company_new_panel')
@section('content')
<body class="suppliers">
<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
  <!--preloader end--> 
  <!--main-header start-->
  @include('element.header')
  <!--main-header end--> 
     @if(Session::get('parent_category_id') == 1)
       @if(!empty($company->cover_photo))
  <section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->service_default_background_image) }}');">
  @endif
  @elseif(Session::get('parent_category_id') == 2)
   @if(!empty($company->cover_photo))
  <section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->supplier_default_background_image) }}');">
  @endif
  @elseif(Session::get('parent_category_id') == 3)
   @if(!empty($company->cover_photo))
  <section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->reno_default_background_image) }}');">
  @endif
  @endif
    <div class="container">
      <h1>Change Password</h1>
    </div>    
  </section>
<!--inner content start-->
  <div class="container-fluid" style="margin-top: -3em;z-index: 4;">
      <input type="file" id="cover_file" name="cover_photo" accept="image/*" class="hide">
       <label class="pull-right edit_btn" for="cover_file">
    <i class="fa fa-camera" style="color:white;padding:10px;background: #ffcc32;border-radius: 20px" aria-hidden="true"></i></label>
    </div>
  <section class="inner-wrap supplier_detail"> 
    <!--container start-->
    <div class="container">
      <div class="row">
          @include('admin.element.success-message')
      <!--row start-->
      <ul class="blog-grid">
         @include('element.company_menu')
         
        </div>
        <!--col start-->
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
      </ul>  
      </div>    
    </div>      
    <!--container end--> 
  </section>
 <!--inner content end--> 

<!--brand-section start-->
@include('element.company_logo_slider')
<!--brand-section end--> 

<!--footer-secn end--> 

<!--company-profile edit modal end--> 
  <!-- update account end -->
                                <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
                                <script type="text/javascript">
                               $(document).ready(function() {
                                    $('#btn_passwordupdate').on('click',function(){
	var $this=$(this);
   $this
         .attr('disabled','disabled');
          setTimeout(function() {
            $this.removeAttr('disabled');
        }, 3000);
});
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
 