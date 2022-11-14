<script>
    function ajax(){


        var formValues = $("form[name=sampleForm]").serializeArray() ;
        console.log(formValues)
        $.ajax({
            type : 'post',
            url : '/test.jsp',
            data : formValues,
            dataType : 'json',
            error: function(xhr, status, error){
                alert(error);
            },
            success : function(json){
                alert(json)
            }
        });

    }


</script>

<form name="sampleForm" id="sampleForm">
    <input type="text" name="name" id="name" value="권정열" />
    <input type="text" name="email" id="email" value="passion@10cm.com" />
    <input type="text" name="phone" id="phone" value="01012345678" />
</form>