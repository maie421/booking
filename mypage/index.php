<?php

require_once "../common/header.php";
?>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="bi bi-person"></i> <span class="ms-1 d-none d-sm-inline">정보수정</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="bi bi-heart"></i> <span class="ms-1 d-none d-sm-inline">찜</span> </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="bi bi-calendar-check"></i> <span class="ms-1 d-none d-sm-inline">예약 내역</span> </a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
        <div class="col py-3">
            <?php include_once "booking.php" ?>
        </div>
    </div>
</div>
</body>
<?php
require_once "../common/footer.php";
?>
