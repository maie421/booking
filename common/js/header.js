const loginForm = () => {
    var formValues = $(".loginFormObject").serializeArray();

    $.ajax({
        url: "../ajax/login.php",
        type: "POST",
        data: formValues,
        dataType: "JSON",
        success: function (data) {
        }
    });
}

const joinForm = () => {
    var formValues = $(".joinFormObject").serializeArray();

    $.ajax({
        url: "../ajax/join.php",
        type: "POST",
        data: formValues,
        dataType: "JSON",
        success: function (data) {
        }
    });
}