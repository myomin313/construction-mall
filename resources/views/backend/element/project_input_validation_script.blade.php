<script>
    function inputValidationError(data){
        if(data.input_errors != undefined){
            if($.isEmptyObject(data.input_errors.errors.name)){
                $('#nameError').html("");
                $("input[name=name]").removeClass('error-messageborder');
            }else{
                $('#nameError').html(data.input_errors.errors.name);
                $("input[name=name]").addClass('error-messageborder');
            }

            if($.isEmptyObject(data.input_errors.errors.project_type)){
                $('#project_typeError').html("");
                $("input[name=project_type]").removeClass('error-messageborder');
            }else{
                $('#project_typeError').html(data.input_errors.errors.project_type);
                $("input[name=project_type]").addClass('error-messageborder');
            }
        }

        if(data.photo_errors != undefined){
            if($.isEmptyObject(data.photo_errors)){
                $('#project_typeError').html("");
                $("input[name=project_type]").removeClass('error-messageborder');
            }else{

                for(let key in data.photo_errors) {
                    var index = parseInt(key) + 1;
                    if($.isEmptyObject(data.photo_errors[key].errors.photo_name)){
                        $('#photo_name_error_'+index).html('');
                        $("input[id=photoname_"+index+"]").removeClass('error-messageborder');
                    }else{
                        $('#photo_name_error_'+index).html(data.photo_errors[key].errors.photo_name);
                        $("input[name=project_type]").addClass('error-messageborder');
                    }
                    if($.isEmptyObject(data.photo_errors[key].errors.photo)){
                        $('#current_photo_error_'+index).html("");
                        $("input[id=photoname_"+index+"]").removeClass('error-messageborder');
                    }else{
                        $('#current_photo_error_'+index).html(data.photo_errors[key].errors.photo);
                        $("input[name=project_type]").addClass('error-messageborder');
                    }
                }
            }
        }
    }
</script>
