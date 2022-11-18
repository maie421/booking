<?php

require_once "../common/header.php";

$room = new ROOM();
$bookmark = new BOOKMARK();

$row = $room->getRoomByCode($_GET['code']);

?>
<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript"
            src="//dapi.kakao.com/v2/maps/sdk.js?appkey=f46752a8c9c6dab8ea123dad4de18c3e"></script>

    <script src="../common/js/detail.js"></script>
    <script src="../common/js/main.js"></script>

</head>
<body>
<div class="container">
    <h2 class="mt-2 mb-4"><?=$row['name']?></h2>
    <div class="mb-4">
        <i class="bi bi-star-fill"></i> 4.8 후기 500개
        <?php if(!$bookmark->getBookmarkByRoomCode($row['room_code'],'m6377727b479e0')){?>
            <i class="bi bi-heart <?= $row['room_code'] ?>" style="color:red" onclick="heartClick('<?= $row['room_code'] ?>')"></i>
        <?php }else{ ?>
            <i class="bi bi-suit-heart-fill <?= $row['room_code'] ?>" style="color:red" onclick="heartClick('<?= $row['room_code'] ?>')"></i>
        <?php }?>
        저장
    </div>
    <div class="d-flex">
        <div class="p-2">
            <img src="../img/room/<?=$row['img']?>" width="300" height="150"
                 class="img-thumbnail">
        </div>
        <div class="card p-2" style="width: 40rem;">
            <div class="card-body">
                <h5><?=floor($row['price'])?> / 박</h5>
                <form class="reserveFormArray">
                    <input type="text" id="datepicker1" class="mb-3 datepicker1" name="start_date">
                    <input type="text" id="datepicker2" class="mb-3 datepicker2" name="end_date">
                    <select class="form-select" aria-label="Default select example" name="people" onclick="selectDay(<?=$row['price']?> );">
                        <?php for ($i = 1; $i <= $row['max_people']; $i++){?>
                            <option value="<?=$i?>"><?=$i?>명</option>
                        <?php }?>

                    </select>
                    <div class="d-grid gap-2 col-6 mx-auto mt-3">
                        <button class="btn btn-primary mb-5" type="button" onclick="reserveForm()">예약하기</button>
                    </div>
                </form>
                <div class="d-flex">
                    <div class="p-2 w-100"><?=floor($row['price'])?> x <span class="_day">0</span>박</div>
                    <div class="p-2 flex-shrink-1 _pay">0</div>
                </div>
                <hr>
                <div class="d-flex">
                    <div class="p-2 w-100"><h5>총 합계</h5></div>
                    <div class="p-2 flex-shrink-1 _pay">0</div>
                </div>
            </div>
        </div>
    </div>
    <h4 class="mt-5 mb-5">위치</h4>
    <div id="map" class="d-flex p-2 " style="height: 450px;"></div>
    <h4 class="mt-5 mb-5">후기</h4>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">후기 작성</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-outline-primary mt-3 ">작성하기</button>
        </div>
    </div>
    <?php for ($i = 0;$i < 15;$i++) { ?>
    <div class="mb-3 mt-3">
        <div class="col-md-4">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-half"></i>
            <i class="bi bi-star"></i>
        </div>
        <div class="col-md-8">
            <span>보송보송</span> |
            <span>2022.11.03</span>
        </div>
        <div>쉬다 갑니다~</div>
        <hr>
        <?php } ?>
    </div>
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
        var mapContainer = document.getElementById('map'), // 지도를 표시할 div
            mapOption = {
                center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
                level: 3 // 지도의 확대 레벨
            };

        // 지도를 표시할 div와  지도 옵션으로  지도를 생성합니다
        var map = new kakao.maps.Map(mapContainer, mapOption);

        // 마커가 표시될 위치입니다
        var markerPosition = new kakao.maps.LatLng(33.450701, 126.570667);

        // 마커를 생성합니다
        var marker = new kakao.maps.Marker({
            position: markerPosition
        });

        // 마커가 지도 위에 표시되도록 설정합니다
        marker.setMap(map);
    </script>

</div>
</body>
<?php
require_once "../common/footer.php";
?>
