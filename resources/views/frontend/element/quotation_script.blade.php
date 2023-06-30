<!--brand-section end--> 
<script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script>
<script type="text/javascript">
      $('form#detail_next').on('submit',function(e){
         e.preventDefault();   
          var phone=""; 
          var email=""; 
          var phone_count = 1,email_count=1;
                $("[id*= contact_phone]").each(function() {
                    var name = $('#contact_phone' +phone_count).val();
                    if(typeof(name) !== "undefined"){
                      phone +=name +", ";  
                    }
                    phone_count++;
                });
                $("[id*= contact_email]").each(function() {
                    var name = $('#contact_email' +email_count).val();
                    if(typeof(name) !== "undefined"){
                      email += name +", ";     
                    }
                    email_count++;
                });
                console.log(phone);
                console.log(email);
               
                data = new FormData(this);
                data.append('email', email);
                data.append('phone',phone);
                data.append('type',2); // 2 mean send quote from detail page
                data.append('quotation_file',$('input[name=quotation_file]').val());
                data.append('quotation_file1',$('input[name=quotation_file1]').val());
                data.append('quotation_file2',$('input[name=quotation_file2]').val());
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
                     if(data.type == 2){
                        window.location.href="{{route('company.send_quotation_detail_form')}}";
                     }
                     else{
                        window.location.href="{{route('company.send_quotation_form')}}";
                     }
                    }
                    else{
                      if(data.errors.category_id){
                       $('#category_label').html(data.errors.category_id);
                     }
                     if(data.errors.building_type){
                       $('#building_type_label').html(data.errors.building_type);
                     }
                     if(data.errors.city){
                       $('#city_label').html(data.errors.city);
                     }
                      if(data.errors.township){
                       $('#township_label').html(data.errors.township);
                     }
                      if(data.errors.address){
                       $('#address_label').html(data.errors.address);
                     }
                      if(data.errors.project_information){
                       $('#project_information_label').html(data.errors.project_information);
                     }
                      if(data.errors.budget){
                       $('#budget_label').html(data.errors.budget);
                     }
                     if(data.errors.contact_allow){
                      $('#contact_allow_label').html(data.errors.contact_allow);
                     }
                    }
                 },
                error:function(e)
                {
                  console.log();
                  //alert('Something Wrong');
                 // location.reload();
                }
              });
        
      });
  

              

              $('.company_detail_quotation').click(function(){
                if('<?php echo(Auth::user()) ?>' == ""){
                    $('#get_detail_quote').modal('hide');
                    var message = "You need to first login";
                    $(this).attr("disabled", true);
                    var url = window.location.href;
                     callbackQuotationError(message,url);
                }
                else{
                    $('#company_id').val($(this).data('company'));
                    $('#category_id').val($(this).data('category'));
                    $('#get_detail_quote').modal('show');
                }
              })        
</script>