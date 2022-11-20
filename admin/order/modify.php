<?php

require_once "../common/header.php";

$booking = new BOOKING();
$room = new ROOM();

$booking_date = $booking->getBookingByCode($_GET['code']);
$room_date = $room->getRoomByCode($booking_date['room_code']);
?>
<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<div class="container">
    <div class="row flex-nowrap">
        <?php
        include_once "../common/navebar.php" ?>
        <div class="col py-3 bg-white">
            <form>
                <div class="form-group mb-3">
                    <label for="exampleFormControlInput1">room</label>
                    <br><?=$room_date['name']?>
                </div>
                <div class="form-group  mb-3">
                    <label for="exampleFormControlSelect1">인원</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="인원" value="<?=$booking_date['people']?>">
                </div>
                <div class="form-group  mb-3">
                    <label for="exampleFormControlSelect1">가간</label>
                    <div class="form-group d-flex bd-highlight">
                        <input type="text" class="form-control mb-3" id="datepicker1" placeholder="<?=date("Y-m-d", strtotime($booking_date['start_date']))?>">
                        <input type="text" class="form-control mb-3" id="datepicker2" placeholder="<?=date("Y-m-d", strtotime($booking_date['end_date']))?>">
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-primary">확인</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
<?php
require_once "../../common/footer.php";
?>
