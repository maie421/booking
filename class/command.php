<?php

require_once dirname(__FILE__, 2).'/vendor/autoload.php';

class COMMAND
{
    function getRoomByRoom($room_code){
        $room = DB_CONNECT::DB()->table('command');

        return $room->select()
            ->where('room_code', '=', $room_code)
            ->orderBy('create_date', 'desc')
            ->get();
    }

    function getCountRoomByRoom($room_code){
        $room = DB_CONNECT::DB()->table('command');

        return $room->select()
            ->where('room_code', '=', $room_code)
            ->count();
    }
}


?>