<?php

require_once dirname(__FILE__, 2).'/vendor/autoload.php';

class COMMENT
{
    function getCommentByRoom($room_code){
        $room = DB_CONNECT::DB()->table('comment');

        return $room->select()
            ->where('room_code', '=', $room_code)
            ->whereNull('parent_comment_code')
            ->orderBy('create_date', 'desc')
            ->get();
    }

    function getRplyByRoom($room_code, $parent_comment_code){
        $room = DB_CONNECT::DB()->table('comment');

        return $room->select()
            ->where('room_code', '=', $room_code)
            ->where('parent_comment_code', '=', $parent_comment_code)
            ->orderBy('create_date', 'desc')
            ->get();
    }

    function getCountCommentByRoom($room_code){
        $room = DB_CONNECT::DB()->table('comment');

        return $room->select()
            ->where('room_code', '=', $room_code)
            ->count();
    }
}


?>