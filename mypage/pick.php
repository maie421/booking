<head>
    <script src="../common/js/main.js"></script>
</head>
<?php
$bookmark = new BOOKMARK();
$room = new ROOM();

$page = $_GET['page'] ?? 1;
$list_num = 8;
$page_num = 5;

$booking_date = $bookmark->getBookmark($page, $list_num);
$num = $bookmark->getBookmarkCount();

$total_page = ceil($num / $list_num);
$total_block = ceil($total_page / $page_num);
$now_block = ceil($page / $page_num);
$s_pageNum = ($now_block - 1) * $page_num + 1;

if($s_pageNum <= 0){
    $s_pageNum = 1;
}

$e_pageNum = $now_block * $page_num;

if($e_pageNum > $total_page){
    $e_pageNum = $total_page;
}
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
<!--                        <i class="bi bi-star-fill"></i>-->
<!--                        <i class="bi bi-star-fill"></i>-->
<!--                        <i class="bi bi-star-fill"></i>-->
<!--                        <i class="bi bi-star-half"></i>-->
<!--                        <i class="bi bi-star"></i>-->
<!--                        <span">3.5 (3,000)</span>-->
                        <p class="card-text"><small class="text-muted">펜션</small></p>
                        <small class="text-muted">가격 : <?= floor($room_date['price']) ?></small>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <?php if($page <= 1){?>
                    <a class="page-link" href="?page=1<?=empty($type) ? '': "&type=$type" ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                <?php } else {?>
                    <a class="page-link" href="?page=<?=$page-1?><?=empty($type) ? '': "&type=$type" ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                <?php }?>
            </li>
            <?php
            for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++){?>
                <li class="page-item"><a class="page-link" href="?page=<?=$print_page?><?=empty($type) ? '': "&type=$type" ?>"><?=$print_page?></a></li>
            <?php } ?>
            <li class="page-item">
                <?php
                if($page >= $total_page){?>
                    <a class="page-link"  href="?page=<?=$total_page?><?=empty($type) ? '': "&type=$type" ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                <?php } else{ ?>
                    <a class="page-link"  href="?page=<?=$page+1?><?=empty($type) ? '': "&type=$type" ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                <?php } ?>
            </li>
        </ul>
    </nav>
</div>
</body>