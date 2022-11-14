<?php

require_once "../common/header.php";
?>
<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript"
            src="//dapi.kakao.com/v2/maps/sdk.js?appkey=f46752a8c9c6dab8ea123dad4de18c3e"></script

</head>
<body>
<div class="container">
    <h2 class="mt-2 mb-4">해운대</h2>
    <div class="mb-4">
        <i class="bi bi-star-fill"></i> 4.8 후기 500개 <i class="bi bi-heart ms-3" style="color:red"></i> 저장
    </div>
    <div class="d-flex">
        <div class="p-2">
            <img src="https://a0.muscache.com/im/pictures/94714109/66313f84_original.jpg?im_w=1200"
                 class="img-thumbnail">
        </div>
        <div class="card p-2" style="width: 40rem;">
            <div class="card-body">
                <h5>500,000 / 박</h5>
                <input type="text" id="datepicker1" class="mb-3">
                <input type="text" id="datepicker2" class="mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>인원</option>
                    <option value="1">1명</option>
                    <option value="2">2명</option>
                    <option value="3">3명</option>
                    <option value="3">4명</option>
                </select>
                <div class="d-grid gap-2 col-6 mx-auto mt-3">
                    <button class="btn btn-primary mb-5" type="button">예약하기</button>
                </div>
                <div class="d-flex">
                    <div class="p-2 w-100">500,000 x 5박</div>
                    <div class="p-2 flex-shrink-1">250000</div>
                </div>
                <hr>
                <div class="d-flex">
                    <div class="p-2 w-100"><h5>총 합계</h5></div>
                    <div class="p-2 flex-shrink-1">250000</div>
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
    <?php
    for ($i = 0; $i < 15; $i++) { ?>
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
            <?php
        } ?>
    </div>
    <script>
        $(function() {
            var disabledDays = ["2022-11-14","2022-11-15","2013-7-26"];

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

            $(function() {
                $("#datepicker1, #datepicker2").datepicker();
            });
// 특정일 선택막기
            function disableAllTheseDays(date) {
                var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
                for (i = 0; i < disabledDays.length; i++) {
                    if($.inArray(y + '-' +(m+1) + '-' + d,disabledDays) != -1) {
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
