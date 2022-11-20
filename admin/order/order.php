<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
    <style>
        .fc h2 {
            font-size: 25px;
            font-weight:bold;
            margin-right:10px;
        }
        .fc .fc-toolbar>*>* {
            float: left;
            margin-left: 0.75em;
            display: -webkit-inline-box;
        }
        .fc-head {
            background-color: bisque;
            line-height: 50px;
            font-size: 15px;
            font-weight: bold;
        }
        .fc-content{font-size:18px; background-color:black;}
    </style>
</head>
<body>
<?php
$booking = new BOOKING();
$member = new MEMBER();

$date = $_GET['date'] ?? '';
$booking_date = $booking->getBookingByDay($_GET['date']);

?>
<div class="d-flex bd-highlight">
    <div class="p-2 bd-highligh" style="width:80%;" id="calendar"></div>
    <div class="d-flex flex-column bd-highlight mb-3">
        <?php
        foreach ($booking_date as $value){
            $member_date = $member->getMemberByCode($value['member_code']);?>
        <div class="card mb-3" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title"><?=$value['name']?></h5>
                <p class="card-text"><?=$member_date['name']?></p>
                <p class="card-text"><?=$member_date['phone_number']?></p>
                <p class="card-text">예약 기간 : <?=$value['start_date' ]?> ~ <?=$value['end_date']?></p>
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
            eventResize:function(event)
            {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                var title = event.title;
                var id = event.id;
                $.ajax({
                    url:"update.php",
                    type:"POST",
                    data:{title:title, start:start, end:end, id:id},
                    success:function(){
                        calendar.fullCalendar('refetchEvents');
                        alert('Event Update');
                    }
                })
            },

        });
    });

</script>
