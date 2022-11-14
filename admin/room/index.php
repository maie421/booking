<?php

require_once "../common/header.php";
?>
<body>
<div class="container">
    <div class="row flex-nowrap">
        <?php
        include_once "../common/navebar.php" ?>
        <div class="col py-3 bg-white">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="add.php" class="btn btn-primary me-md-2 mb-3" type="button">추가</a>
            </div>
            <div class="d-flex border p-3 mb-3">
                <img src="../../img/logo.png"
                     class="img-thumbnail" width="200">
                <div class="card-body ms-3">
                    <h5>해운대</h5>
                    <p class="card-text">최대 인원 : 5명 </p>
                    <p class="card-text">가격 : 3000 /박</p>
                    <button type="button" class="btn btn-outline-dark">수정</button>
                    <button type="button" class="btn btn-outline-dark">삭제</button>
                </div>
            </div>
            <div class="d-flex border p-3 mb-3">
                <img src="../../img/logo.png"
                     class="img-thumbnail" width="200">
                <div class="card-body ms-3">
                    <h5>해운대</h5>
                    <p class="card-text">최대 인원 : 5명 </p>
                    <p class="card-text">가격 : 3000 /박</p>
                    <button type="button" class="btn btn-outline-dark">수정</button>
                    <button type="button" class="btn btn-outline-dark">삭제</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php
require_once "./common/footer.php";
?>
