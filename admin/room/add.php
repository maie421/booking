

<?php

require_once "../common/header.php";
?>
<head>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script src="../../common/js/room.js"></script>
</head>
<body>
<div class="container">
    <div class="row flex-nowrap">
        <?php include_once "../common/navebar.php" ?>
        <div class="col py-3 bg-white">

            <body>
            <form action="/ajax/room/insertRoom.php" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="exampleFormControlFile1">이미지 선택</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file" required>
                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormControlInput1">room</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="이름" name="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormControlInput1">주소</label>
                    <input type="text" class="form-control" id="address_kakao" name="address_detail" readonly required/>
                </div>
                <div class="form-group  mb-3">
                    <label for="exampleFormControlSelect1">최대 인원</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="people" placeholder="최대 인원" required>
                </div>
                <div class="form-group  mb-3">
                    <label for="exampleFormControlSelect1">가격</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="price" placeholder="가격" required>
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
