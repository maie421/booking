<?php

require_once "common/header.php";
$type = $_GET['type'] ?? '';

$room = new ROOM();
$comment = new comment();
$row = $room->getRoomByType($type);
?>
    <head>
        <link rel="stylesheet" type="text/css" href="./common/css/card.css">
        <link rel="stylesheet" type="text/css" href="./common/css/star.css">
        <script src="common/js/main.js"></script>
    </head>
    <body>
    <div class="d-flex justify-content-center">
        <ul class="nav nav-tabs align-self-center">
            <li class="nav-item">
                <a class="nav-link <?= $type == "" ? 'active' : '' ?>" href="/">전체</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $type == "motel" ? 'active' : '' ?>" href="/?type=motel">모텔</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $type == "hotel" ? 'active' : '' ?>" href="/?type=hotel">호텔</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $type == "pension" ? 'active' : '' ?>" href="/?type=pension">펜션</a>
            </li>
        </ul>
    </div>

    <section class="main-content">
        <div class="container">
            <div class="row">
                <?php
                foreach ($row as $value){
                    $comment_count = $comment->getCountCommentByRoom($value['room_code']);
                ?>

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="food-card">
                            <div class="food-card_img">
                                <img src="./img/room/<?= $value['img'] ?>" width="720">
                                <?php if(empty($value['bookmark_code'])){?>
                                    <i class="bi bi-heart <?= $value['room_code'] ?>" style="color:red" onclick="heartClick('<?= $value['room_code'] ?>')"></i>
                                <?php }else{ ?>
                                    <i class="bi bi-suit-heart-fill <?= $value['room_code'] ?>" style="color:red" onclick="heartClick('<?= $value['room_code'] ?>')"></i>
                                <?php }?>

                                <!--                            <a href="#" ><i class="bi bi-suit-heart-fill" style="color:red"></i></i></a>-->
                            </div>
                            <div class="food-card_content">
                                <div class="food-card_title-section">
                                    <a href="/room?code=<?= $value['room_code'] ?>"
                                       class="food-card_title"> <?= $value['name'] ?> </a>
<!--                                    <i class="bi bi-star-fill"></i>-->
<!--                                    <i class="bi bi-star-fill"></i>-->
<!--                                    <i class="bi bi-star-fill"></i>-->
<!--                                    <i class="bi bi-star-half"></i>-->
<!--                                    <i class="bi bi-star"></i>-->
                                    <span>(<?=$comment_count?>)</span>
                                </div>
                                <div class="food-card_bottom-section">
                                    <div class="space-between">
                                        <div>
                                            <span class="fa fa-fire"></span> 판매가 <?= floor($value['price']) ?>
                                        </div>
                                        <div class="pull-right">
                                            <span class="badge badge-success">Veg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } ?>
            </div>
        </div>
    </section>
    </body>
<?php
require_once "common/footer.php";
?>