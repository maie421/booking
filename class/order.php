<?php

require_once dirname(__FILE__, 2).'/vendor/autoload.php';

class ORDER
{
    function getOrderByOrderCode($order_code){
        $room = DB_CONNECT::DB()->table('order');

        return $room->select()
            ->where('order_code', '=', $order_code)
            ->limit(1)
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