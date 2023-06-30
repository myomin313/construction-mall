<script type="text/javascript">
 $('.company_detail_quotation').click(function(){
     if('<?php echo(Auth::user()) ?>' == ""){
            $('#get_quote_detail').modal('hide');
             const message = "Please login in";
             $(this).attr("disabled", true);
             var url = window.location.href;
            callbackQuotationError(message,url);
        }
        else{
            if($(this).data('status') == 0){
                $('#get_quote_detail').modal('hide');
                const message = "Sorry! Quotation can't send your own company. Please try again by choosing another company.";
                $(this).attr("disabled", true);
                var url = window.location.href;
                callbackQuotationError(message,url);
            }else{
                 $('#company_id').val($(this).data('company'));
                 $('#category_id').val($(this).data('category'));
                 $('#get_quote_detail').modal('show');
            }
           
        }
  });
  
    /* City onchange event */
    $('#quote_detail_city').change(function(){
        getTownshipByCity($(this).val(),'#quote_detail_township');
    });
    
    
 $('form.detail_next').on('submit',function(e){
         e.preventDefault();

          var phone="";
          var email="";
          var phone_count = 1,email_count=1;
                $("[id*= detail_contact_phone]").each(function() {
                    var name = $('#detail_contact_phone' +phone_count).val();

                    if(typeof(name) !== "undefined"){
                      phone +=name +", ";
                    }
                    phone_count++;
                });
                $("[id*= detail_contact_email]").each(function() {
                    var name = $('#detail_contact_phone' +email_count).val();
                    if(typeof(name) !== "undefined"){
                      email += name +", ";
                    }
                    email_count++;
                });
                data = new FormData(this);
                data.append('email',email);
                data.append('phone',phone);
                data.append('type',2); // 2 mean send quote from detail page
                data.append('quotation_file',$('input[name=quotation_file]').val());
                data.append('quotation_file1',$('input[name=quotation_file1]').val());
                data.append('quotation_file2',$('input[name=quotation_file2]').val());
                data.append('category_id',$('input[name=category_id]').val());
                data.append('company_id',$('input[name=company_id]').val());
            $.ajax({
                type: "post",
                url: "{{ URL::route('company.send_quotation_data') }}",
                data:data,
                contentType:false,
                cache:false,
                processData:false,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data)
                {
                    if($.isEmptyObject(data.errors)){
                     var type = "<?php echo isset(Session::get('quotation_data')['type'])?Session::get('quotation_data')['type']:''?>";
                     if(data.type == 2){
                        window.location.href="{{route('company.send_quotation_detail_form')}}";
                     }
                     else{
                        window.location.href="{{route('company.send_quotation_form')}}";
                     }
                    }
                    else{
                            if(data.errors.category_id){
                                 $('#get_quote_detail #category_label').html(data.errors.category_id);
                            }else{
                                 $('#get_quote_detail #category_label').html("");
                            }
                            if(data.errors.building_type){
                            $('#get_quote_detail .building_type_label').html(data.errors.building_type);
                            }else{
                                $('#get_quote_detail .building_type_label').html("");
                            }
                            if(data.errors.city){
                            $('#get_quote_detail #city_label').html(data.errors.city);
                            }else{
                                $('#get_quote_detail #city_label').html(""); 
                            }
                            if(data.errors.township){
                            $('#get_quote_detail #township_label').html(data.errors.township);
                            }else{
                               $('#get_quote_detail #township_label').html(""); 
                            }
                            if(data.errors.address){
                                $('#get_quote_detail #address_label').html(data.errors.address);
                            }else{
                                $('#get_quote_detail #township_label').html("");
                            }
                            if(data.errors.project_information){
                            $('#get_quote_detail #project_information_label').html(data.errors.project_information);
                            }
                            if(data.errors.contact_phone){
                            $('#get_quote_detail #contact_phone_label').html(data.errors.contact_phone);
                            }
                            if(data.errors.budget){
                            $('#get_quote_detail #budget_label').html(data.errors.budget);
                            }else{
                               $('#get_quote_detail #budget_label').html(""); 
                            }
                            if(data.errors.budget){
                            $('#get_quote_detail #building_type_label').html(data.errors.building_type);
                            }else{
                                $('#get_quote_detail #budget_label').html("");
                            }
                            if(data.errors.contact_allow){
                            $('#get_quote_detail #contact_allow_label').html(data.errors.contact_allow);
                            }else{
                                $('#get_quote_detail #contact_allow_label').html(""); 
                            }
                            if(data.errors.prefer_contact_way){
                            $('#get_quote_detail #prefer_contact_way_label').html(data.errors.prefer_contact_way);
                            }else{
                                $('#get_quote_detail #prefer_contact_way_label').html(""); 
                            }
                            if(data.errors.best_contact_time){
                            $('#get_quote_detail #best_contact_time_label').html(data.errors.best_contact_time);
                            }else{
                            $('#get_quote_detail #best_contact_time_label').html("");
                            }
                    }
                 },
                error:function(e)
                {
                  console.log(e);
                  //alert('Something Wrong');
                 // location.reload();
                }
              });

      });
      </script>
