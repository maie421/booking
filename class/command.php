<?php

require_once dirname(__FILE__, 2).'/vendor/autoload.php';

class COMMAND
{
    function getCommandByRoom($room_code){
        $room = DB_CONNECT::DB()->table('command');

        return $room->select()
            ->where('room_code', '=', $room_code)
            ->whereNull('parent_command_code')
            ->orderBy('create_date', 'desc')
            ->get();
    }

    function getRplyByRoom($room_code, $parent_command_code){
        $room = DB_CONNECT::DB()->table('command');

        return $room->select()
            ->where('room_code', '=', $room_code)
            ->where('parent_command_code', '=', $parent_command_code)
            ->orderBy('create_date', 'desc')
            ->get();
    }

    function getCountCommandByRoom($room_code){
        $room = DB_CONNECT::DB()->table('command');

        return $room->select()
            ->where('room_code', '=', $room_code)
            ->count();
    }
}


?>