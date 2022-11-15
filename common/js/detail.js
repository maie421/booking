const reserveForm = () => {
    var formValues = $(".reserveFormArray").serializeArray() ;

    $.ajax({
        url: "../ajax/detail/reserve.php",
        type: "POST",
        data: formValues,
        dataType: "JSON",
        success: function (data) {
        }
    });
}