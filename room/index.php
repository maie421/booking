<?php

require_once "../common/header.php";
?>
<head>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
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
        <div class="card p-2" style="width: 25rem;">
            <div class="card-body">
                <!--                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>-->
                <!--                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                <!--                <a href="#" class="card-link">Card link</a>-->
                <!--                <a href="#" class="card-link">Another link</a>-->
                <h5>500,000 / 박</h5>
                <input type="text" placehoder="Start Date" id="datepicker" class="mb-3"/>
                <input type="text" placehoder="End Date" id="datepicker2" class="mb-3"/>
                <select class="form-select" aria-label="Default select example">
                    <option selected>인원</option>
                    <option value="1">1명</option>
                    <option value="2">2명</option>
                    <option value="3">3</option>
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
        $(document).ready(function () {

            $('#datepicker').datepicker({
                format: "yyyy-mm-dd",
                startDate: '-1y -1m',
                endDate: '+2m +10d'
            });

            $('#datepicker2').datepicker({
                format: "yyyy-mm-dd",
                startDate: '-1m',
                endDate: '+10d'
            });

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
