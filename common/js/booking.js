const deleteBooking = (code) => {
    $.ajax({
        url: "/ajax/booking/deleteBooking.php",
        type: "post",
        data: {code},
        dataType: "JSON",
        success: function (data) {
            if (data.msg == 200){
                alert('성공하였습니다');
                location.reload();
            }else{
                alert('실패하였습니다.');
            }
        }
    });
}