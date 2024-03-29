<?php

require_once dirname(__FILE__, 2).'/vendor/autoload.php';

class BOOKING
{

    function getBookingByDay($date)
    {
        $stmt = DB_CONNECT::ROW_QUERY()->prepare(
            "SELECT  r.name, b.booking_code,b.member_code,b.start_date,b.end_date from booking as b inner join room as r on r.room_code = b.room_code where r.member_code = :member_code and b.start_date <= :date AND b.end_date >= :date"
        );

        $stmt->bindValue(":member_code", COMMON::getSession('member_code'));
        $stmt->bindValue(":date", $date);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getBookingByCode($booking_code)
    {
        $booking = DB_CONNECT::DB()->table('booking');

        return $booking->select()
            ->where('booking_code', '=', $booking_code)
            ->limit(1)
            ->get();
    }

    function getBookingByRoomMemberCode($member_code)
    {
        $booking = DB_CONNECT::DB()->table('booking');

        return $booking->select(['room_code', 'start_date as start', 'end_date as end'])
            ->where('room_member_code', '=', $member_code)
            ->get();
    }

    function getBookingByMemberCode($member_code, $type , $page , $list_num)
    {
        $last = $page * $list_num;
        $first = $last - $list_num;

        $booking = DB_CONNECT::DB()->table('booking');

        if(empty($type)){
            return $booking->select()
                ->where('member_code', '=', $member_code)
                ->orderBy('idx', 'desc')
                ->limit($first, $list_num)
                ->get();
        }else{
            return $booking->select()
                ->where('member_code', '=', $member_code)
                ->where('booking_status', '=', $type)
                ->limit($first, $list_num)
                ->orderBy('idx', 'desc')
                ->get();
        }
    }

    function getBookingByMemberCodeCount($member_code, $type = '')
    {
        $booking = DB_CONNECT::DB()->table('booking');

        if(empty($type)){
            return $booking->select()
                ->where('member_code', '=', $member_code)
                ->count();
        }else{
            return $booking->select()
                ->where('member_code', '=', $member_code)
                ->where('booking_status', '=', $type)
                ->count();
        }
    }

    function getBookingByRoomMemberCodeFilter($member_code, $page, $list_num, $type = '')
    {
        $last = $page * $list_num;
        $first = $last - $list_num;

        $booking = DB_CONNECT::DB()->table('booking');

        if(empty($type)){
            return $booking->select()
                ->where('room_member_code', '=', $member_code)
                ->orderBy('idx', 'desc')
                ->limit($first, $list_num)
                ->get();
        }else{
            return $booking->select()
                ->where('room_member_code', '=', $member_code)
                ->where('booking_status', '=', $type)
                ->orderBy('idx', 'desc')
                ->limit($first, $list_num)
                ->get();
        }

    }

    function getBookingByRoomMemberCodeFilterCount($member_code, $type)
    {
        $booking = DB_CONNECT::DB()->table('booking');

        if(empty($type)){
            return $booking->select()
                ->where('room_member_code', '=', $member_code)
                ->count();
        }else{
            return $booking->select()
                ->where('room_member_code', '=', $member_code)
                ->where('booking_status', '=', $type)
                ->count();
        }

    }

    function getBookingByRoomCode($room_code)
    {
        $booking = DB_CONNECT::DB()->table('booking');

        return $booking->select()
            ->where('room_code', '=', $room_code)
            ->get();
    }

    function getExceptBookingByRoom($room_code, $booking_code){
        $booking = DB_CONNECT::DB()->table('booking');

        return $booking->select()
            ->where('room_code', '=', $room_code)
            ->where('booking_code', '!=', $booking_code)
            ->get();
    }

    function getBookingByRoomMember($room_code){
        $booking = DB_CONNECT::DB()->table('booking');

        return $booking->select()
            ->where('room_code', '=', $room_code)
            ->where('member_code', '=', COMMON::getSession('member_code'))
            ->where('booking_status', '=', 'complete')
            ->count();
    }
}

?>