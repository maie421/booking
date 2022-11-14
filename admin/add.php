<head>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
</head>
<body>
<form>
    <div class="form-group mb-3">
        <label for="exampleFormControlFile1">이미지 선택</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group mb-3">
        <label for="exampleFormControlInput1">room</label>
        <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="이름">
    </div>
    <div class="form-group mb-3">
        <label for="exampleFormControlInput1">주소</label>
        <input type="text" class="form-control" id="address_kakao" name="address_detail" readonly />
    </div>
    <div class="form-group  mb-3">
        <label for="exampleFormControlSelect1">최대 인원</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="최대 인원">
    </div>
    <div class="form-group  mb-3">
        <label for="exampleFormControlSelect1">가격</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="최대 인원">
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-primary">확인</button>
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