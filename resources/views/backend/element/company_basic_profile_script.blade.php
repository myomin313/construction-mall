<script>  
    $('#company_city').change(function(){
        getTownshipByCity($(this).val(),'#company_township');
        });
    
     $('input[id *="business_day"]').change(function () {
            var id = $(this).val();
            if ($(this).prop('checked') == true) {
                $('#from_label'+id).show();
                $('#to_label'+id).show();
                $('#opening_hour'+id).show();
                $('#closing_hour'+id).show();
            }else{
                $('#opening_hour'+id).val('');
                $('#closing_hour'+id).val('');
                $('#from_label'+id).hide();
                $('#to_label'+id).hide();
                $('#opening_hour'+id).hide();
                $('#closing_hour'+id).hide();
            }
        });

$(document).ready(function(){
        /* Business Day Show/Hide */
            $("input[id*= opening_hour],input[id*= closing_hour]").each(function(key,value) {
                var id = value.id;
                id= id.charAt(id.length-1);
                if($(value).val() !== ""){
                    $(value).show();
                    $('[id = from_label'+id).show();
                    $('[id = to_label'+id).show();
                }
                else{
                    $(value).hide();
                    $('[id = from_label'+id).hide();
                    $('[id = to_label'+id).hide();
                }
            });
        });
   $('form#basicForm').on('submit',function(e){
                e.preventDefault();
                var name    =$('#name').val();
                var phone   = $('#phone').val();
                var vission = $('#vission').summernote('code');
                vission = vission.replaceAll("&amp;", "and_char");
                var mission = $('#mission').summernote('code');
                mission = mission.replaceAll("&amp;", "and_char");
                var business_days = [];
                $("[id*= business_day]").each(function() {
                    var id = $(this).attr('id');
                    var id= id.charAt(id.length-1);
                    if(($('#opening_hour'+id).val() != undefined &&
                        $('#closing_hour'+id).val() != undefined) ||
                        ($('#opening_hour'+id).val() != '' &&
                        $('#closing_hour'+id).val() != '')){
                        var business_day_id = id;
                        var opening_hour = $('#opening_hour'+id).val();
                        var closing_hour = $('#closing_hour'+id).val();
                    } 
                    item = {};
                    item["business_day_id"] = id;
                    item ["opening_hour"] = opening_hour;
                    item ["closing_hour"] = closing_hour;
                    business_days.push(item);  
                });
                var description = $('#description').summernote('code');
                var service = $('#service').summernote('code');
                service = service.replaceAll("&amp;", "and_char");
                var business_days =JSON.stringify(business_days);
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('companies.profile_update',$company->id) }}",
                      data: $('#basicForm').serialize()+"&vission="+vission+"&service="+service+"&mission="+mission+"&business_days="+business_days,
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          if($.isEmptyObject(data.day_errors) && $.isEmptyObject(data.input_errors)){
                                $('#required_error').hide();
                               $("#basic_add_btn").attr('disabled','disabled');
                                setTimeout(function() {
                                  $(this).removeAttr('disabled');
                               }, 3000);
                             

                              if(window.location.href.indexOf('admin/company-edit') > -1){
                                  var company_id = data.company_id;
                                  var page_no = data.pageno;
                                  var url = window.location.origin+"/admin/company-profile/"+company_id+"/"+page_no;
                                  window.location = url;
                                }

                               else if(window.location.href.indexOf('company/edit') > -1){
                                   var url = '<?php echo route("companies.profile") ?>';
                                     var message = data.success;
                                    // callbackSuccess(message);
                                    callbackURL(message,url);
                                }
                                else{
                                    var url = window.location.href;
                                    window.location=url;
                                }

                                
                                
                          }
                          else{
                            $('#required_error').show();
                            if(data.day_errors != undefined){
                                 if($.isEmptyObject(data.day_errors)){
                                    $('#project_typeError').html("");
                                    $("input[name=project_type]").removeClass('error-messageborder');
                                }else{


                                    for(let key in data.day_errors) {
                                        var index = parseInt(key);
                                        if($.isEmptyObject(data.day_errors[index].errors.opening_hour)){
                                            $('#opening_hour_error_'+index).html('').hide();
                                        }else{
                                            $('#opening_hour_error_'+index).html(data.day_errors[index].errors.opening_hour).show();
                                        }
                                        if($.isEmptyObject(data.day_errors[index].errors.closing_hour)){
                                            $('#closing_hour_error_'+index).html("").hide();
                                        }else{
                                            $('#closing_hour_error_'+index).html(data.day_errors[index].errors.closing_hour).show();
                                        }

                                        if($.isEmptyObject(data.day_errors[index].errors.business_day)){
                                            $('#day_error').html("").hide();
                                        }else{
                                            $('#day_error').html(data.day_errors[index].errors.business_day).show();
                                        }

                                    }
                                }
                            }

                            if(data.input_errors != undefined){
                               if($.isEmptyObject(data.input_errors.errors.description)){ 
                                  $('#descriptionError').html("");
                                  $("textarea[name=description]").removeClass('error-messageborder');
                              }else{
                                   $('#descriptionError').html(data.input_errors.errors.description);
                                   $("textarea[name=description]").addClass('error-messageborder');
                              }
                               
                               
                               if($.isEmptyObject(data.input_errors.errors.email)){ 
                                  $('#emailError').html("");
                                  $("input[name=email]").removeClass('error-messageborder');
                              }else{
                                   $('#emailError').html(data.input_errors.errors.email);
                                   $("input[name=email]").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.input_errors.errors.name)){ 
                                  $('#nameError').html("");
                                  $("input[name=name]").removeClass('error-messageborder');
                              }else{
                                   $('#nameError').html(data.input_errors.errors.name);
                                   $("input[name=name]").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.input_errors.errors.township)){ 
                                  $('#townshipError').html("");
                                  $("select[name=township]").removeClass('error-messageborder');
                              }else{
                                   $('#townshipError').html(data.input_errors.errors.township);
                                   $("select[name=township]").addClass('error-messageborder');
                              }
                               if($.isEmptyObject(data.input_errors.errors.business_days)){ 
                                  $('#business_daysError').html("");
                                  $("input[name=business_days]").removeClass('error-messageborder');
                              }else{
                                   $('#business_daysError').html(data.input_errors.errors.business_days);
                                   $("input[name=business_days]").addClass('error-messageborder');
                              }
                                if($.isEmptyObject(data.input_errors.errors.city)){ 
                                  $('#cityError').html("");
                                  $("select[name=city]").removeClass('error-messageborder');
                              }else{
                                   $('#cityError').html(data.input_errors.errors.city);
                                   $("select[name=city]").addClass('error-messageborder');
                              }
                               if($.isEmptyObject(data.input_errors.errors.business_opening_hours)){ 
                                  $('#business_opening_hoursError').html("");
                                  $("input[name=business_opening_hours]").removeClass('error-messageborder');
                              }else{
                                   $('#business_opening_hoursError').html(data.input_errors.errors.business_opening_hours);
                                   $("input[name=business_opening_hours]").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.input_errors.errors.business_closing_hours)){ 
                                  $('#business_closing_hoursError').html("");
                                  $("input[name=business_closing_hours]").removeClass('error-messageborder');
                              }else{
                                  $('#business_closing_hoursError').html(data.input_errors.errors.business_closing_hours);
                                  $("input[name=business_closing_hours]").addClass('error-messageborder');
                              }
                              //start
                              if($.isEmptyObject(data.input_errors.errors.website)){ 
                                  $('#websiteError').html("");
                                  $("input[name=website]").removeClass('error-messageborder');
                              }else{
                                  $('#websiteError').html(data.input_errors.errors.website);
                                  $("input[name=website]").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.input_errors.errors.facebook)){ 
                                  $('#facebookError').html("");
                                  $("input[name=facebook]").removeClass('error-messageborder');
                              }else{
                                  $('#facebookError').html(data.input_errors.errors.facebook);
                                  $("input[name=facebook]").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.input_errors.errors.twitter)){ 
                                  $('#twitterError').html("");
                                  $("input[name=twitter]").removeClass('error-messageborder');
                              }else{
                                  $('#twitterError').html(data.input_errors.errors.twitter);
                                  $("input[name=twitter]").addClass('error-messageborder');
                              }
                              
                               if($.isEmptyObject(data.input_errors.errors.googleplus)){ 
                                  $('#googleplusError').html("");
                                  $("input[name=googleplus]").removeClass('error-messageborder');
                              }else{
                                  $('#googleplusError').html(data.input_errors.errors.googleplus);
                                  $("input[name=googleplus]").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.input_errors.errors.linkedin)){ 
                                  $('#linkedinError').html("");
                                  $("input[name=linkedin]").removeClass('error-messageborder');
                              }else{
                                  $('#linkedinError').html(data.input_errors.errors.linkedin);
                                  $("input[name=linkedin]").addClass('error-messageborder');
                              }
                            }
                              //end
                             // printErrorMsg(data.errors);
                          } 
                          
                       },
                      error:function(e)
                      {
                          var message = "Something Wrong!";
                                 callbackWarning(message);
                        // alert('something Wrong');

                      }
                    });
              });
</script>