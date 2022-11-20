<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
    <style>
        .fc-header-toolbar {
            padding-top: 1em;
            padding-left: 1em;
            padding-right: 1em;
        }
    </style>
</head>
<body>
<?php
$booking = new BOOKING();
$member = new MEMBER();

$date = $_GET['date'] ?? '';
if(!empty($date)){
    $booking_date = $booking->getBookingByDay($_GET['date']);
}
$booking_full = $booking->getBookingByRoomMemberCode( "m6377727b479e0");
?>
<div class="d-flex bd-highlight">
    <div class="p-2 bd-highligh" style="width:80%;" id="calendar"></div>
    <div class="d-flex flex-column bd-highlight mb-3">
        <?php
        foreach ($booking_date ?? [] as $value){
            $member_date = $member->getMemberByCode($value['member_code']);?>
        <div class="card mb-3" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title"><?=$value['name']?></h5>
                <p class="card-text"><?=$member_date['name']?></p>
                <p class="card-text"><?=$member_date['phone_number']?></p>
                <p class="card-text">예약 기간 : <?= date("Y-m-d", strtotime($value['start_date'])) ?> ~ <?= date("Y-m-d", strtotime($value['end_date'])) ?></p>
                <div class="d-flex bd-highlight">
                    <a href="/admin/order/modify.php?code=<?=$value['booking_code']?>" type="button" class="btn btn-outline-dark" style="margin-right: 5px">예약 수정</a>
                    <a type="button" class="btn btn-outline-dark mr-3">예약 취소</a>
                </div>
            </div>
        </div>
        <?php
        }?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
            editable:true,
            header:{
                left:'prev,next today',
                center:'title',
                right:'month'
            },
            // events: 'load.php',
            selectable:true,
            selectHelper:true,
            select: function(start)
            {
                location.href = `/admin/?date=${start.format()}`
            },
            editable:true,
            // 이벤트
            events:
                <?=json_encode($booking_full)?>


        });
    });

</script>
