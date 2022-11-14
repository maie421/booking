<?php

require_once "./common/header.php";
?>
<body>
<div class="container">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start "
                    id="menu">
                    <li>
                        <a href="#" class="nav-link px-0 align-middle text-secondary">
                            <i class="bi bi-house"></i> <span class="ms-1 d-none d-sm-inline">객실 관리</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle text-secondary">
                            <i class="bi bi-calendar-check"></i> <span class="ms-1 d-none d-sm-inline">예약 관리</span> </a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
        <div class="col py-3 bg-white">
            <?php include_once "order.php" ?>
        </div>
    </div>
</div>
</body>
<?php
require_once "../common/footer.php";
?>
