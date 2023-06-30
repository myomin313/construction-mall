<script type="text/javascript">

    $('.navbar-btn,.get_quote_btn').click(function(){
        if(!('<?php echo(Auth::check()) ?>' )){
            var message = "Please login in";
              $(this).attr("disabled", true);
              var url = window.location.href;
              callbackQuotationError(message,url);
        }
        else{
             $('#get_quote').modal('show');
        }
    });
    $('.navbar-btn1,.get_quote_btn1').click(function(){
        if(!('<?php echo(Auth::check()) ?>' )){
            var message = "Please login in";
            $(this).attr("disabled", true);
            var url = window.location.href;
            callbackQuotationError(message,url);
        }
        else{
            var message = "Sorry! You have no permission to request quote.";
            $(this).attr("disabled", true);
            var url = window.location.href;
            callbackQuotationError(message,url);
        }
    });
    function addField(field,name,placeholder,value,count)
    {
    $(field).append('<div class="row meta-field"><div class="col-md-11 col-sm-10 col-xs-10"><div class="form-group"><input class="form-control" id="'+name+count+'" type="'+value+'" name="'+name+'"  placeholder="'+placeholder+'"></div></div><div class="col-md-1 col-sm-2 col-xs-2"><a href="#" class="add_more_close"><i class="fa fa-minus" aria-hidden="true"></i></a></div></div>');
    }
    var email_count = 1,phone_count=1;
    $("#get_quote .add_more,#get_quote_detail .add_more").click(function(){
    addField($(this).parents('[id *= add_more_field]'),'contact_email','Other Contact Email Address','email',++email_count);
    $("#get_quote .add_more_close,#get_quote_detail .add_more_close").click(function(){
    $(this).parents(".meta-field").remove();
    return false;
    });
    return false;
    });
    $("#get_quote .add_more1,#get_quote_detail .add_more1").click(function(){
    addField($(this).parents('[id *= add_more_field]'),'contact_phone','Other Contact Phone Number','number',++phone_count);
    $("#get_quote .add_more_close, #get_quote_detail .add_more_close").click(function(){
    $(this).parents(".meta-field").remove();
    return false;
    });
    return false;
    });

    /* Send Quotation start*/
    $('input[type=radio][name=category_id]').change(function(){

    var category_id = $(this).val();
    if(category_id == 1)
    {
    $('.service_category').show();
    $('.supplier_category').hide();
    $('.reno_category').hide();
    }
    else if(category_id == 2)
    {
    $('.supplier_category').show();
    $('.service_category').hide();
    $('.reno_category').hide();
    }
    else if (category_id == 3) {
    $('.reno_category').show();
    $('.supplier_category').hide();
    $('.service_category').hide();
    }
   


    //$("#default_company_subcategory_id").hide();
    $("input[name=category_id]").next().css('color', '#959595');
    $("input[name=category_id]:checked").next().css('color', '#000');
    // $.ajax({
    //           type : 'get',
    //           url : "{{ URL :: route('home.getChildCategory')}}",
    //           data : {id:$(this).val(),type:'category_id'},
    //           success : function(data){
    //               var subcategory= data[0].sub_category;
    //               var company    = data[0].company;
    //               var subcategory_list ="";
    //               if(subcategory.length >=1)
    //               {
    //                 for(var i=0; i<=subcategory.length;i++){

    //                   subcategory_list +='<div class="col-md-6"><input class="company_subcategory_id" id="subcategory_id_'+subcategory[i].id+'" type="checkbox" name="subcategory_id[]" value="'+subcategory[i].id+'"><span> '+subcategory[i].name+"</span></div> ";

    //                   $('#company_subcategory_id').html(subcategory_list);
    //               }
    //               }
    //           },
    //           error:function(e)
    //           {
    //               console.log(e)
    //           }
    //       });

    });
     $(document).ready(function(){
        console.log($('.edit_next .service_category input[type=checkbox][name*=subcategory_id]:checked').length);
        if($('.edit_next .service_category input[type=checkbox][name*=subcategory_id]:checked').length >= 1){
        $('.edit_next input[type=radio][id=supplier_category]').attr('disabled','disabled');
        $('.edit_next input[type=radio][id=reno_category]').attr('disabled','disabled'); 
     }
     if($('.edit_next .supplier_category input[type=checkbox][name*=subcategory_id]:checked').length >= 1){
        $('.edit_next input[type=radio][id=service_category]').attr('disabled','disabled');
        $('.edit_next input[type=radio][id=reno_category]').attr('disabled','disabled'); 
     }
      if($('.edit_next .reno_category input[type=checkbox][name*=subcategory_id]:checked').length >= 1){
        $('.edit_next input[type=radio][id=service_category]').attr('disabled','disabled');
        $('.edit_next input[type=radio][id=supplier_category]').attr('disabled','disabled'); 
     }
     });
     $('input[type=checkbox][name*=subcategory_id],.edit_next input[type=checkbox][name*=subcategory_id]').change(function(){


        var category = $(this).parent().parent().parent().attr('class');
        var element  = "";
        if($(this).parentsUntil().hasClass('edit_next')){
            element += '.edit_next';
        }
        else{
            element += '#next';
        }
        var count = $(element+" ."+category+" input[type=checkbox][name*=subcategory_id]:checked").length

        if(count >= 1){
            if(category == "service_category"){
            $(element +' input[type=radio][id=supplier_category]').attr('disabled','disabled');
            $(element+' input[type=radio][id=reno_category]').attr('disabled','disabled');            
            }
            else if(category == "supplier_category"){
                $(element +' input[type=radio][id=service_category]').attr('disabled','disabled');
                $(element+' input[type=radio][id=reno_category]').attr('disabled','disabled');
            }
            else if(category == "reno_category"){
                $(element+' input[type=radio][id=service_category]').attr('disabled','disabled');
                $(element+' input[type=radio][id=supplier_category]').attr('disabled','disabled');
            }
        }else{
            $(element+' input[type=radio][id=service_category]').removeAttr('disabled');
            $(element+' input[type=radio][id=supplier_category]').removeAttr('disabled');
            $(element+' input[type=radio][id=reno_category]').removeAttr('disabled');
        }
            
    });
    
    /* City onchange event */
    
    $('#quote_city').change(function(){
    getTownshipByCity($(this).val(),'#quote_township');
    });
    
    
    
    function checkFileType(file_pointer){
    var fileExtension = ['doc', 'docx', 'pdf', 'txt'];
    if ($.inArray($(file_pointer).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
    $(file_pointer).css('border','1px solid red');
    $('.file_error').css('color','red');
    $(file_pointer).val("");
    }else{
    $('.file_error').css('color','#acacac');
    $(file_pointer).css('border','1px solid #acacac');
    }
    }
    $('#quotation_file').change(function(){
    checkFileType('#quotation_file');
    });
    $('#quotation_file1').change(function(){
    checkFileType('#quotation_file1');
    });
    $('#quotation_file2').change(function(){
    checkFileType('#quotation_file2');
    });
    $('form#next').on('submit',function(e){
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


    data = new FormData(this);
    data.append('email', email);
    data.append('phone',phone);
    data.append('quotation_file',$('input[name=quotation_file]').val());
    data.append('quotation_file1',$('input[name=quotation_file1]').val());
    data.append('quotation_file2',$('input[name=quotation_file2]').val());
    data.append('type',1); // 1 mean send quote from home page
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
   ;
    if($.isEmptyObject(data.errors)){
    window.location.href="{{route('company.send_quotation_form')}}";
    }
    else{
    if(data.errors.category_id){
        $('#get_quote #category_label').html(data.errors.category_id);
    }else{
        $('#get_quote #category_label').html("");
    }
    if(data.errors.building_type){
        $('#get_quote .building_type_label').html(data.errors.building_type);
    }else{
        $('#get_quote .building_type_label').html("");
    }
    if(data.errors.city){
        $('#get_quote #city_label').html(data.errors.city);
    }else{
        $('#get_quote #city_label').html("");
    }
    if(data.errors.township){
        $('#get_quote #township_label').html(data.errors.township);
    }else{
        $('#get_quote #township_label').html("");
    }
    if(data.errors.address){
        $('#get_quote #address_label').html(data.errors.address);
    }else{
        $('#get_quote #address_label').html("");
    }
    if(data.errors.project_information){
        $('#get_quote #project_information_label').html(data.errors.project_information);
    }else{
        $('#get_quote #project_information_label').html("");
    }
    if(data.errors.contact_phone){
        $('#get_quote #contact_phone_label').html(data.errors.contact_phone);
    }else{
         $('#get_quote #contact_phone_label').html("");
    }
    if(data.errors.budget){
        $('#get_quote #budget_label').html(data.errors.budget);
    }else{
         $('#get_quote #budget_label').html("");
    }
    if(data.errors.budget){
        $('#get_quote #building_type_label').html(data.errors.building_type);
    }else{
        $('#get_quote #building_type_label').html("");
    }
    if(data.errors.contact_allow){
        $('#get_quote #contact_allow_label').html(data.errors.contact_allow);
    }else{
        $('#get_quote #contact_allow_label').html("");
    }
    if(data.errors.prefer_contact_way){
        $('#get_quote #prefer_contact_way_label').html(data.errors.prefer_contact_way);
    }else{
         $('#get_quote #prefer_contact_way_label').html("");
    }
    if(data.errors.best_contact_time){
        $('#get_quote #best_contact_time_label').html(data.errors.best_contact_time);
    }else{
        $('#get_quote #best_contact_time_label').html("");
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
    })

    $(".form-control").keyup(function(){

    if ($(this).val() !== ''){
    $(this).css('color', '#000');
    } else {
    $(this).css('color', '#959595');
    }
    });
    $('select,input[type=date]').change(function(){
    if ($(this).val() !== ''){
    $(this).css('color', '#000');
    } else {
    $(this).css('color', '#959595');
    }
    });
    $('#best_contact_time1,#best_contact_time2,#best_contact_time3,#email_contact,#phone_contact,#contact_allow,[id*=subcategory_id]').change(function(){
    if($(this).is(":checked"))
    $(this).next().css('color','#000');
    else
    $(this).next().css('color','#959595');
    })
    /* Send Quotation End */
    </script>

