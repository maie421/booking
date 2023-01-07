<?php

require_once dirname(__FILE__, 2).'/vendor/autoload.php';

class ROOM
{
    public const ROOMTYPE = [
        'motel' => '모텔',
        'hotel' => '호텔',
        'pension' => '펜션'
    ];

    function getRoom($type, $page, $list_num)
    {
        $last = $page * $list_num;
        $first = $last - $list_num;

        $room = DB_CONNECT::DB()->table('room');

        if (empty($type)) {
            return $room->select()
                ->where('member_code', '=', COMMON::getSession('member_code'))
                ->orderBy('idx', 'desc')
                ->limit($first, $list_num)
                ->get();
        } else {
            return $room->select()
                ->where('member_code', '=', COMMON::getSession('member_code'))
                ->where('type', '=', $type)
                ->orderBy('idx', 'desc')
                ->limit($first, $list_num)
                ->get();
        }
    }

    function getRoomCount($type)
    {
        $room = DB_CONNECT::DB()->table('room');

        if (empty($type)) {
            return $room->select()
                ->where('member_code', '=', COMMON::getSession('member_code'))
                ->count();
        } else {
            return $room->select()
                ->where('member_code', '=', COMMON::getSession('member_code'))
                ->where('type', '=', $type)
                ->count();
        }

    }

    function getRoomByCode(string $room_code)
    {
        $room = DB_CONNECT::DB()->table('room');

        return $room->select()
            ->where('room_code', '=', $room_code)
            ->limit(1)
            ->get();
    }

    function getRoomByType($room_type = '', $page = 1, $page_size = '')
    {
        $last = $page * $page_size;
        $first = $last - $page_size;

        if (empty($room_type)) {
            $stmt = DB_CONNECT::ROW_QUERY()->prepare(
                "SELECT r.room_code , r.price, r.img, r.member_code , b.bookmark_code, r.name FROM room as r left join bookmark as b on r.room_code = b.room_code and b.member_code = :member_code ORDER BY r.idx desc LIMIT :off, :lim"
            );
            $stmt->bindValue(":member_code", COMMON::getSession('member_code'));
            $stmt->bindValue(':off', $first, PDO::PARAM_INT);
            $stmt->bindValue(':lim', $page_size, PDO::PARAM_INT);
        } else {
            $stmt = DB_CONNECT::ROW_QUERY()->prepare(
                "SELECT r.room_code , r.price, r.img, r.member_code , b.bookmark_code ,r.name FROM room as r left join bookmark as b on r.room_code = b.room_code and b.member_code = :member_code where r.type = :type ORDER BY r.idx desc LIMIT :off, :lim"
            );
            $stmt->bindValue(":member_code", COMMON::getSession('member_code'));
            $stmt->bindValue(":type", $room_type);
            $stmt->bindValue(':off', $first, PDO::PARAM_INT);
            $stmt->bindValue(':lim', $page_size, PDO::PARAM_INT);
        }

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getRoomByTypeCount($room_type = '')
    {
        $room = DB_CONNECT::DB()->table('room');

        if (empty($room_type)) {
            return $room->select()
                ->count();
        } else {
            return $room->select()
                ->where('type', '=', $room_type)
                ->count();
        }
    }

    function updateRoomViewByCode(string $room_code, int $count)
    {
        $room = DB_CONNECT::DB()->table('room');
        $count += 1;
        return $room->update()
            ->set('views', $count)
            ->where('room_code', $room_code)
            ->execute();
    }
}


?>