<?php
require_once "../common/header.php";

$room_code =  $_GET['code'];

$room = new ROOM();
$row = $room->getRoomByCode($room_code);
?>
<head>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
</head>
<body>
<div class="container">
    <div class="row flex-nowrap">
        <?php include_once "../common/navebar.php" ?>
        <div class="col py-3 bg-white">
            <body>
            <form action="/ajax/room/updateRoom.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="room_code" value="<?=$row['room_code']?>" required>
                <input type="hidden" name="img" value="<?=$row['img']?>">
                <div class="form-group mb-3">
                    <label for="exampleFormControlFile1">이미지 선택</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file" value="<?=$row['img']?>" >
                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormControlInput1">room</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="이름" name="name" value="<?=$row['name']?>" required>
                </div>
                <div class="form-group mb-3">
                    <label>종류</label>
                    <select class="form-select" name="type">
                        <option value="hotel" <?=$row['type'] == 'hotel' ? 'selected': '' ?>>호텔</option>
                        <option value="motel" <?=$row['type'] == 'motel' ? 'selected': '' ?>>모텔</option>
                        <option value="pension" <?=$row['type'] == 'pension' ? 'selected': '' ?>>펜션</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormControlInput1">주소</label>
                    <input type="text" class="form-control" id="address_kakao" name="address_detail" readonly required value="<?=$row['address']?>"/>
                </div>
                <div class="form-group  mb-3">
                    <label for="exampleFormControlSelect1">최대 인원</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="people" placeholder="최대 인원" required  value="<?=$row['max_people']?>">
                </div>
                <div class="form-group  mb-3">
                    <label for="exampleFormControlSelect1">가격</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="price" placeholder="가격" required value="<?=floor($row['price'])?>">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary">확인</button>
                </div>
            </form>
            </body>
            <script>
                window.onload = function(){
                    document.getElementById("address_kakao").addEventListener("click", function(){ //주소입력칸을 클릭하면
                        //카카오 지도 발생
                        new daum.Postcode({
                            oncomplete: function(data) { //선택시 입력값 세팅
                                document.getElementById("address_kakao").value = data.address; // 주소 넣기
                                document.querySelector("input[name=address_detail]").focus(); //상세입력 포커싱
                            },
                            autoClose: true,
                            // initLayerPosition();
                        }).open();
                    });
                }
            </script>
        </div>
    </div>
</div>
</body>
<?php
require_once "../../common/footer.php";
?>
