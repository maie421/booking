const addRoom = () => {
    var formValues = $(".roomFormArray").serializeArray();

    console.log(formValues);
    // formValues.push($(".form-control-file")[0].files[0])

    $.ajax({
        url: "/ajax/room/insertRoom.php",
        type: "POST",
        enctype: 'multipart/form-data',
        data: {formValues, 'file': $(".form-control-file")[0].files[0]},
        dataType: "JSON",
        success: function (data) {

        }
    });
}