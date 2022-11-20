<?php
require_once dirname(__FILE__, 3).'/vendor/autoload.php';

try {
    $date = $_POST['date'];

    $booking = new BOOKING();
    $member = new MEMBER();
    $booking_date = $booking->getBookingByDay($date);

    $date = [];
    foreach ($booking_date as $value){
        $date[$value['booking_code']]['booking_code'] = $value['booking_code'];
        $date[$value['booking_code']]['name'] = $value['name'];
        $date[$value['booking_code']]['member_code'] = $value['member_code'];
        $date[$value['booking_code']]['start_date'] = $value['start_date'];
        $date[$value['booking_code']]['end_date'] = $value['end_date'];
        $member_date = $member->getMemberByCode($value['member_code']);
        $date[$value['booking_code']]['member_name'] = $member_date['name'];
        $date[$value['booking_code']]['member_phone_number'] = $member_date['phone_number'];

    }
//    var_dump($date);
    throw new Exception('200');
} catch(Exception $e){
    $msg = $e->getMessage();

    $result['msg'] = $msg;
    $result['data'] = $date;

    echo json_encode($result);
}
?>