const joinForm = () => {
    var formValues = $(".joinFormObject").serializeArray();

    $.ajax({
        url: "../ajax/join.php",
        type: "POST",
        data: formValues,
        dataType: "JSON",
        complete : function()
        {
            location.reload();
        }
    });
}

const logout = () => {
    $.ajax({
        url: "../ajax/logout.php",
        type: "POST",
        data: {},
        async: true,
        dataType: "JSON",
        complete : function()
        {
            location.reload();
        }
    });

}
