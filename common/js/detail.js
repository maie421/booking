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

const getDateDiff = (d1, d2) => {
    const date1 = new Date(d1);
    const date2 = new Date(d2);

    const diffDate = date1.getTime() - date2.getTime();

    return Math.abs(diffDate / (1000 * 60 * 60 * 24)); // 밀리세컨 * 초 * 분 * 시 = 일
}

const selectDay = () => {
        const start = $('.datepicker1').val();
        const end = $('.datepicker2').val();

        const day = getDateDiff(start, end);
        $('._day').text(day);
        $('._pay').text(50000 * day);
}
