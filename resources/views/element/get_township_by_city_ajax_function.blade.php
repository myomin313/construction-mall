<script>
    /* City & Township Dynamic */
    /*function for get township id according to city */
    function getTownshipByCity(city_id,township_id){
    var option = "";
    $.ajax({
    type : 'get',
    url : "{{ URL :: route('location.getTownship')}}",
    data : {'city_id':city_id},
    success : function(data){
    option += '<option selected="selected" disabled="disabled">Select Township</option>';
    for(var i=0; i<data.length;i++){
    option += '<option value="'+ data[i].id+'">'+ data[i].name+'</option>';
    }
    $(township_id).html(option);
    },
    error:function(e)
    {
    console.log(e)
    }
    });
    }
</script>