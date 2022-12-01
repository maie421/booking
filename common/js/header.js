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

const logout = () => {
    $.ajax({
        url: "../ajax/logout.php",
        type: "POST",
        data: {},
        async: true,
        dataType: "JSON",
        success: function () {
        }
    });
    new Promise(resolve => setTimeout(resolve, 1500));
    window.location.reload();
}
