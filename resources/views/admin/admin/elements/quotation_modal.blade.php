     <!--image upload-modal start-->
      <style>
         .no-border>tbody>tr>td, .no-border>tbody>tr>th, .no-border>tfoot>tr>td, .no-border>tfoot>tr>th, .no-border>thead>tr>td, .no-border>thead>tr>th {
           border-top: 0px !important;
} 
      </style>
      <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="showModal">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                   <center><h4 class="modal-title"></h4></center>
                   <div class="row">
                       <div class="col-md-offset-1 col-md-10">
                         <table class="table table-hover no-border">
                            <tbody>
                                <tr>
                                    <td>Range</td>
                                    <td>
                                         <div class="range">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>
                                         <div class="category">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Building Type</td>
                                    <td>
                                         <div class="building_type">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Project Expected Start Date</td>
                                    <td>
                                         <div class="project_expected_start_date">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Project Information</td>
                                    <td>
                                         <div class="project_information">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Used Coin</td>
                                    <td>
                                         <div class="used_coin">
                                        </div>
                                    </td>
                                </tr>
                                @if(Auth::user()->role != 1 || Auth::user()->role != 2)
                                <tr>
                                    <td>Requested User</td>
                                    <td>
                                         <div class="send_user_name">
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                                <tr>
                                <td>Company Name</td>
                                    <td>
                                         <div class="received_user_name">
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td>Requested Date</td>
                                    <td>
                                         <div class="created_at">
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>File</td>
                                    <td>
                                         <div class="file">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="45%">Contact Person Name</td>
                                    <td>
                                         <div class="contact_person_name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contact Email</td>
                                    <td>
                                         <div class="contact_email">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contact Phone</td>
                                    <td>
                                         <div class="contact_phone">
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Prefer Contact Way</td>
                                    <td>
                                         <div class="prefer_contact_way">
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Best Contact Time</td>
                                    <td>
                                         <div class="best_contact_time">
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Address</td>
                                    <td>
                                         <div class="address">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                           </table>   
                       </div>
                   </div>
                  </div>
                </div>
      </div>
<!--image upload-modal end--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
     $(document).ready(function(){  
                      $('#table').on('change','.status_change',function(){ 
                        var getval = $(this).val();
                        var quotation_id = $(this).attr('quotation_id');
                        var company_id = $(this).attr('company_id');
                        var status = $(this).attr('status');
                       /* var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){ */
                            $.ajax({ 
                            url: "{{ URL::route('quotation.updatestatus') }}",
                            type: 'POST',
                            data: {'quotation_id' : quotation_id,"selectedvalue":getval,'status':status,'company_id':company_id},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                               // var message = data.success;
                               window.location.reload();
                                // var url = window.location.href;
                                // window.location=url;
                               //  callbackURL(message,url);
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                      /*  }
                        else{
                            $(this).val(selectedvalue);
                            $(this).bind('focus');
                            return false;
                        }*/
                });
        });
     $(document).on('click', '.show-modal', function() {   
                    $('.modal-title').text('QUOTATION DETAIL');
                    console.log($(this).data('project_information'));
                    if($(this).data('contact_person_name')== "")
                      $('.contact_person_name').html('-');
                    else
                      $('.contact_person_name').html($(this).data('contact_person_name'));
                    if($(this).data('contact_email') =="" ||$(this).data('contact_email') =="," )
                      $('.contact_email').html('-');
                    else
                      $('.contact_email').html($(this).data('contact_email'));
                    if($(this).data('contact_phone') =="" || $(this).data('contact_phone') ==",")
                      $('.contact_phone').html('-');
                    else
                      $('.contact_phone').html($(this).data('contact_phone'));
                    $('.prefer_contact_way').html($(this).data('prefer_contact_way'));
                    $('.best_contact_time').html($(this).data('best_contact_time'));
                    $('.address').html($(this).data('address'));
                    $('.building_type').html($(this).data('building_type'));
                    var range = $(this).data('minimum')+"~"+$(this).data('maximum')+'('+$(this).data('unit')+')';
                    $('.range').html(range);
                    $('.category').html($(this).data('category'));

                    if($(this).data('project_expected_start_date') =="")
                      $('.project_expected_start_date').html('-');
                    else
                      $('.project_expected_start_date').html($(this).data('project_expected_start_date'));
                    $('.project_information').html($(this).data('project_information'));
                    $('.used_coin').html($(this).data('used_coin'));
                     var file_list= $(this).data('file');
                    var files = file_list.split("|");
                    var file ="";
                    $.each( files, function( key, value ) {
                       var route = "<?php echo url('storage/quotation')?>"+"/"+value;
                       if(value != "")
                          file += "<span class='badge'>"+ ++key +"</span>"+"<a href='"+ route+"' download>"+value+"</a><br>";
                    });
                    $('.file').html(file);
                    $('.send_user_name').html($(this).data('send_user_name'));
                    $('.received_user_name').html($(this).data('received_company'));
                    $('.status').html($(this).data('received_status'));
                    $('.requested_status').html($(this).data('requested_status'));
                    $('.created_by').html($(this).data('created_at'));
                    $('.updated_by').html($(this).data('updated_by'));
                    $('.created_at').html($(this).data('created_at'));
                    $('.updated_at').html($(this).data('updated_at'));
                    $('#showModal').modal('show');
                });

            $(document).on('click','#receiver-detail', function() {   
                    $('.receiver-title').text('Receiver Detail'); 
                    $('#receiver_phone').html($(this).data('received_user_phone'));
                    $('#receiver_phone').attr('href', "tel:" + $(this).data('received_user_phone'));
                    $('#receiver_company').html($(this).data('received_user_name'));
                    $('#receiver_email').html($(this).data('received_user_email'));
                    $('#receiver_email').attr('href', "mailto:" + $(this).data('received_user_email'));
                    $('#received_company_status').html($(this).data('received_status'))
                var receiver_logo = $(this).data('received_logo');
                var logo = '<?php echo asset('/storage/company_logo/' ) ?>/'+receiver_logo;
                var html = '<img src="' + logo + '" />';               
                $('#receiver_image').html(html);
                $('#received_status').attr("received_status_id",$(this).data('received_id'));
                $('#received_status').attr("user_id",$(this).data('user_id'));
                $('#receiverModal').modal('show');
                });
</script>
