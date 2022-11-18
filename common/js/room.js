const deleteRoom = (code) => {
    $.ajax({
        url: "/ajax/room/deleteRoom.php",
        type: "get",
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