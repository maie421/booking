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
<div class="d-flex bd-highlight">
    <div class="p-2 bd-highligh" style="width:80%;" id="calendar"></div>
    <div class="d-flex flex-column bd-highlight mb-3">
        <?php for ($i = 0; $i < 3; $i++){?>
        <div class="card mb-3" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title">해운대</h5>
                <p class="card-text">윤영미</p>
                <p class="card-text">010-0000-0000</p>
                <p class="card-text">예약 기간 : 2022-11-14 ~ 2022-11-15</p>
                <div class="d-flex bd-highlight">
                    <button type="button" class="btn btn-outline-dark" style="margin-right: 5px">예약 수정</button>
                    <button type="button" class="btn btn-outline-dark mr-3">예약 취소</button>
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
            events: 'load.php',
            selectable:true,
            selectHelper:true,
            select: function(start, end, allDay)
            {
                // var title = prompt("Enter Event Title");
                // if(title)
                // {
                //     var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                //     var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                //     $.ajax({
                //         url:"insert.php",
                //         type:"POST",
                //         data:{title:title, start:start, end:end},
                //         success:function()
                //         {
                //             calendar.fullCalendar('refetchEvents');
                //             alert("Added Successfully");
                //         }
                //     })
                // }
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

            eventDrop:function(event)
            {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                var title = event.title;
                var id = event.id;
                $.ajax({
                    url:"update.php",
                    type:"POST",
                    data:{title:title, start:start, end:end, id:id},
                    success:function()
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Event Updated");
                    }
                });
            },

            eventClick:function(event)
            {
                if(confirm("Are you sure you want to remove it?"))
                {
                    var id = event.id;
                    $.ajax({
                        url:"delete.php",
                        type:"POST",
                        data:{id:id},
                        success:function()
                        {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Removed");
                        }
                    })
                }
            },

        });
    });

</script>
