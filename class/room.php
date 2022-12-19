<?php

require_once dirname(__FILE__, 2).'/vendor/autoload.php';

class ROOM
{
    function getRoom(){
        $room = DB_CONNECT::DB()->table('room');

        return $room->select()
            ->where('member_code', '=', COMMON::getSession('member_code'))
            ->get();
    }

    function getRoomByCode(string $room_code){
        $room = DB_CONNECT::DB()->table('room');

        return $room->select()
            ->where('room_code', '=', $room_code)
            ->limit(1)
            ->get();
    }

    function getRoomByType($room_type = '', $page = 1, $page_size = ''){
        $last = $page * $page_size;
        $first = $last - $page_size;

        if(empty($room_type)){
            $stmt = DB_CONNECT::ROW_QUERY()->prepare("SELECT r.room_code , r.price, r.img, r.member_code , b.bookmark_code, r.name FROM room as r left join bookmark as b on r.room_code = b.room_code and b.member_code = :member_code LIMIT :off, :lim");
            $stmt->bindValue(":member_code", COMMON::getSession('member_code'));
            $stmt->bindValue(':off', $first, PDO::PARAM_INT);
            $stmt->bindValue(':lim', $page_size, PDO::PARAM_INT);
        }else{
            $stmt = DB_CONNECT::ROW_QUERY()->prepare("SELECT r.room_code , r.price, r.img, r.member_code , b.bookmark_code ,r.name FROM room as r left join bookmark as b on r.room_code = b.room_code and b.member_code = :member_code where r.type = :type LIMIT :off, :lim");
            $stmt->bindValue(":member_code", COMMON::getSession('member_code'));
            $stmt->bindValue(":type", $room_type);
            $stmt->bindValue(':off', $first, PDO::PARAM_INT);
            $stmt->bindValue(':lim', $page_size, PDO::PARAM_INT);
        }

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getRoomByCount($room_type = ''){
        $room = DB_CONNECT::DB()->table('room');

        if(empty($room_type)){
            return $room->select()
                ->count();
        }else{
            return $room->select()
                ->where('type', '=', $room_type)
                ->count();
        }
    }

    function updateRoomViewByCode(string $room_code, int $count){
        $room = DB_CONNECT::DB()->table('room');
        $count+=1;
        return $room->update()
            ->set('views', $count)
            ->where('room_code', $room_code)
            ->execute();
    }
}


?>