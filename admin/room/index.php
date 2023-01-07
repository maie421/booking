<?php
require_once "../common/header.php";

$room = new ROOM();

$page = $_GET['page'] ?? 1;
$type = $_GET['type'] ?? '';

$list_num = 6;
$page_num = 7;

$row = $room->getRoom($type,(int)$page, $list_num);
$num = $room->getRoomCount($type);

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
            <select class="form-select" aria-label="Default select example" onchange="location.href=this.value">
                <option value="/admin/room" selected>전체</option>
                <option value="?type=motel" <?=$type == 'motel' ? 'selected': '' ?>>모텔</option>
                <option value="?type=hotel" <?=$type == 'hotel' ? 'selected': '' ?>>호텔</option>
                <option value="?type=pension" <?=$type == 'pension' ? 'selected': '' ?>>펜션</option>
            </select>

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
<?php
require_once "../../common/footer.php";
?>
