<head>
    <script src="../common/js/main.js"></script>
</head>
<?php
$bookmark = new BOOKMARK();
$room = new ROOM();
$booking_date = $bookmark->getBookmark();
?>
<body>
<div class="row row-cols-1 row-cols-md-2 g-4">
    <?php
    foreach ($booking_date ?? [] as $value) {
        $room_date = $room->getRoomByCode($value['room_code']);
        ?>
        <div class="card mb-3 me-3" style="max-width: 500px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../img/room/<?= $room_date['img'] ?>"
                         class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <i class="bi bi-suit-heart-fill <?= $value['room_code'] ?>" style="color:red"
                               onclick="heartClick('<?= $value['room_code'] ?>')"></i>
                        </div>
                        <h5 class="card-title"><?= $room_date['name'] ?></h5>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <i class="bi bi-star"></i>
                        <span">3.5 (3,000)</span>
                        <p class="card-text"><small class="text-muted">펜션</small></p>
                        <small class="text-muted">가격 : <?= floor($room_date['price']) ?></small>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } ?>
</div>
</body>