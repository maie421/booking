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
        if(empty($room_type)){
            $stmt = DB_CONNECT::ROW_QUERY()->prepare("SELECT r.room_code , r.price, r.img, r.member_code , b.bookmark_code, r.name FROM room as r left join bookmark as b on r.room_code = b.room_code and b.member_code = :member_code");
            $stmt->bindValue(":member_code", "m6377727b479e0");
        }else{
            $stmt = DB_CONNECT::ROW_QUERY()->prepare("SELECT r.room_code , r.price, r.img, r.member_code , b.bookmark_code ,r.name FROM room as r left join bookmark as b on r.room_code = b.room_code and b.member_code = :member_code where r.type = :type");
            $stmt->bindValue(":member_code", "m6377727b479e0");
            $stmt->bindValue(":type", $room_type);
        }
        $stmt->execute();

        return $stmt->fetchAll();
    }
}


?>