<?php

require_once dirname(__FILE__, 2).'/vendor/autoload.php';

class BOOKMARK
{
    function getBookmark($page, $list_num){
        $last = $page * $list_num;
        $first = $last - $list_num;

        $room = DB_CONNECT::DB()->table('bookmark');

        return $room->select()
            ->where('member_code', '=', COMMON::getSession('member_code'))
            ->orderBy('idx', 'desc')
            ->limit($first, $list_num)
            ->get();
    }

    function getBookmarkCount(){
        $room = DB_CONNECT::DB()->table('bookmark');

        return $room->select()
            ->where('member_code', '=', COMMON::getSession('member_code'))
            ->count();
    }

    function getBookmarkByRoomCode(string $room_code, string $member_code){
        $room = DB_CONNECT::DB()->table('bookmark');

        return $room->select()
            ->where('room_code', '=', $room_code)
            ->where('member_code', '=', $member_code)
            ->limit(1)
            ->get();
    }

    function deleteBookmarkByRoomCode(string $room_code, string $member_code){
        $room = DB_CONNECT::DB()->table('bookmark');

        return $room->delete()
            ->where('room_code', '=', $room_code)
            ->where('member_code', '=', $member_code)
            ->execute();
    }
}

?>