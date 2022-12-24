<?php
require_once "../common/header.php";

$order_code = $_GET['order'];

$order = new ORDER();
$room = new ROOM();
$member = new MEMBER();
$order_code = COMMON::keyCrypt($order_code,'d');

$order_data = $order->getOrderByOrderCode($order_code);

if(empty($_COOKIE["order_code"])){
    echo "<script>alert('주문서가 만료되었습니다');</script>";
    echo "<script>location.href='/room/?code={$order_data['room_code']}'</script>";
}

$room_data = $room->getRoomByCode($order_data['room_code']);
$member_data = $member->getMemberByCode($order_data['member_code']);

?>
<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript"
            src="//dapi.kakao.com/v2/maps/sdk.js?appkey=f46752a8c9c6dab8ea123dad4de18c3e"></script>

    <script src="../common/js/detail.js"></script>
    <script src="../common/js/main.js"></script>
    <script src="../common/js/comment.js"></script>

</head>
<body>
<div class="container">
    <span><?=ROOM::ROOMTYPE[$room_data['type']]?></span>
    <h4><?=$room_data['name']?></h4>
    <div><?=date("Y-m-d", strtotime($order_data['start_date']))?> ~ <?=date("Y-m-d", strtotime($order_data['end_date']))?></div>
    <hr>
    <h4>예약자 정보</h4>
    <span>성명</span>
    <div><?=$member_data['name']?></div>
    <hr>
    <h4>금액 및 할인 정보</h4>
    총 예약 금액 <span style="font-weight:bold;"><?=floor($order_data['price'])?>원</span>
    <hr>
    <span style="font-size: 22px">쉽고 간편한 결제 <span style="font-weight:bold;">카카오페이</span></span>
    <div>
        <input type="radio" name="payment" checked/>
        카카오 페이
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <button type="submit" class="btn btn-primary">결제하기</button>
    </div>
</div>
</body>
<?php
require_once "../common/footer.php";
?>
