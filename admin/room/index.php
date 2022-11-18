<?php

require_once "../common/header.php";

$room = new ROOM();
$row = $room->getRoom();
?>
<head>
    <script src="../../common/js/room.js"></script>
</head>
<body>
<div class="container">
    <div class="row flex-nowrap">
        <?php
        include_once "../common/navebar.php" ?>
        <div class="col py-3 bg-white">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="add.php" class="btn btn-primary me-md-2 mb-3" type="button">추가</a>
            </div>
            <?php
            foreach ($row as $key => $value) {
                ?>
                <div class="d-flex border p-3 mb-3">
                    <img src="../../img/room/<?= $value['img'] ?>" width="200" style="height: 150px"
                         class="img-thumbnail" >
                    <div class="card-body ms-3">
                        <h5><?= $value['name'] ?></h5>
                        <p class="card-text">최대 인원 : <?= $value['max_people'] ?>명 </p>
                        <p class="card-text">가격 : <?= floor($value['price']) ?> / 박</p>
                        <a href="edit.php/?code=<?=$value['room_code']?>" type="button" class="btn btn-outline-dark me-2">수정</a>
                        <a type="button" class="btn btn-outline-dark" onclick="deleteRoom('<?=$value['room_code']?>')">삭제</a>
                    </div>
                </div>
                <?php
            } ?>
        </div>
    </div>
</div>
</body>
<?php
require_once "../../common/footer.php";
?>
