<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<form>
    <div class="form-group mb-3">
        <label for="exampleFormControlInput1">room</label>
        <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="이름">
    </div>
    <div class="form-group  mb-3">
        <label for="exampleFormControlSelect1">인원</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="인원">
    </div>
    <div class="form-group  mb-3">
        <label for="exampleFormControlSelect1">가간</label>
        <div class="form-group d-flex bd-highlight">
            <input type="text" class="form-control mb-3" id="datepicker1" placeholder="2022-11-14">
            <input type="text" class="form-control mb-3" id="datepicker2" placeholder="2022-11-14">
        </div>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-primary">확인</button>
    </div>
</form>
</body>
<script>
    $(function () {
        var disabledDays = ["2022-11-14", "2022-11-15", "2013-7-26"];

        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd',
            prevText: '이전 달',
            nextText: '다음 달',
            monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
            monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
            dayNames: ['일', '월', '화', '수', '목', '금', '토'],
            dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
            dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
            minDate: new Date(2022, 4 - 1, 1),
            maxDate: new Date(2022, 11 - 1, 31),
            showMonthAfterYear: true,
            yearSuffix: '년',
            beforeShowDay: disableAllTheseDays
        });

        $(function () {
            $("#datepicker1, #datepicker2").datepicker();
        });

// 특정일 선택막기
        function disableAllTheseDays(date) {
            var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
            for (i = 0; i < disabledDays.length; i++) {
                if ($.inArray(y + '-' + (m + 1) + '-' + d, disabledDays) != -1) {
                    return [false];
                }
            }
            return [true];
        }
    });
</script>