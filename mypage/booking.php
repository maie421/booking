<?php

require_once "../common/header.php";

$booking = new BOOKING();
$room = new ROOM();
$booking_data = $booking->getBookingByMemberCode("m6377727b479e0");
?>
<head>
    <script src="../common/js/booking.js"></script>
</head>
<body>
<div class="container">
    <div class="row flex-nowrap">
        <?php include_once "navebar.php" ?>
        <div class="col py-3">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php
                foreach ($booking_data ?? [] as $value) {
                    $room_date = $room->getRoomByCode($value['room_code']); ?>
                    <div class="card mb-3 me-3" style="max-width: 500px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../img/room/<?= $room_date['img'] ?>"
                                     class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $room_date['name'] ?></h5>
                                    <p class="card-text"><small class="text-muted"><?= $room_date['type'] ?></small></p>
                                    <p class="card-text"><?= date("Y-m-d", strtotime($value['start_date'])) ?>
                                        ~ <?= date("Y-m-d", strtotime($value['end_date'])) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <div class="d-flex bd-highlight">
                                <a href="/mypage/edit.php?code=<?= $value['booking_code'] ?>" type="button"
                                   class="btn btn-outline-dark" style="margin-right: 5px">예약 수정</a>
                                <a type="button" class="btn btn-outline-dark mr-3"
                                   onclick="deleteBooking('<?= $value['booking_code'] ?>')">예약 취소</a>
                            </div>
                        </div>
                    </div>
                    <?php
                } ?>
            </div>
        </div>
    </div>
</div>
</body>
<?php
require_once "../common/footer.php";
?>
