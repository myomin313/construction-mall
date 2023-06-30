<script>
    $('.project_type').on('input',function(e){
        var project  = $(this).val();
        var dataList = $("#project");
        var op ="";
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "{{ URL::route('getProjectType') }}",
            data:{'project':project},
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data)
            {

                op +="<option value='0' >Choose Project Type</option>";
                for(var i=0;i<data.length;i++)
                {
                    op +='<option value="'+data[i].project_type_name+'">'+data[i].project_type_name+'</option>';
                }
                $("#project").html(op);

            },
            error:function(e) {
                console.log(e);
            }
        });
    });
</script>
