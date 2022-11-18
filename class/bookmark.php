<?php

require_once dirname(__FILE__, 2).'/vendor/autoload.php';

class BOOKMARK
{
    function getBookmark(){
        $room = DB_CONNECT::DB()->table('bookmark');

        return $room->select()
            ->where('member_code', '=', 'm6377727b479e0')
            ->get();
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