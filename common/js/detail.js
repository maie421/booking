const reserveForm = () => {
    var formValues = $(".reserveFormArray").serializeArray();

    $.ajax({
        url: "../ajax/order/insertOrder.php",
        type: "POST",
        data: formValues,
        dataType: "JSON",
        success: function (data) {
            if (data.msg == 200){
                location.href =`http://`+window.location.host+`/order?order=${data.data}`
            }else{
                alert(data.msg);
            }
        }
    });
}

const getDateDiff = (d1, d2) => {
    const date1 = new Date(d1);
    const date2 = new Date(d2);

    const diffDate = date1.getTime() - date2.getTime();

    return Math.abs(diffDate / (1000 * 60 * 60 * 24)); // 밀리세컨 * 초 * 분 * 시 = 일
}

const selectDay = (price) => {
        const start = $('.datepicker1').val();
        const end = $('.datepicker2').val();

        const day = getDateDiff(start, end) + 1;
        $('._day').text(day);
        $('._pay').text(price * day);
}
