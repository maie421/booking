<?php

require_once dirname(__FILE__, 2).'/vendor/autoload.php';

class BOOKING
{

    function getBookingByDay($date)
    {
        $stmt = DB_CONNECT::ROW_QUERY()->prepare(
            "SELECT  r.name, b.booking_code,b.member_code,b.start_date,b.end_date from booking as b inner join room as r on r.room_code = b.room_code where r.member_code = :member_code and b.start_date <= :date AND b.end_date >= :date"
        );

        $stmt->bindValue(":member_code", "m6377727b479e0");
        $stmt->bindValue(":date", $date);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getBookingByCode($booking_code){
        $booking = DB_CONNECT::DB()->table('booking');

        return $booking->select()
            ->where('booking_code', '=', $booking_code)
            ->limit(1)
            ->get();
    }
}

?>