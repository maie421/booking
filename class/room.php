<?php

require_once dirname(__FILE__, 2).'/vendor/autoload.php';

class ROOM
{
    function getRoom(){
        $room = DB_CONNECT::DB()->table('room');

        return $room->select()
            ->where('member_code', '=', 'm6377727b479e0')
            ->get();
    }

    function getRoomByCode(string $room_code){
        $room = DB_CONNECT::DB()->table('room');

        return $room->select()
            ->where('room_code', '=', $room_code)
            ->limit(1)
            ->get();
    }

    function getRoomByType($room_type = ''){
        $room = DB_CONNECT::DB()->table('room');

        if(empty($room_type)){
            return $room->select()
                ->get();
        }else{
            return $room->select()
                ->where('type', '=', $room_type)
                ->get();
        }

    }
}


?>