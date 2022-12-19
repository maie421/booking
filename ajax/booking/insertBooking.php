<?php
require_once dirname(__FILE__, 3).'/vendor/autoload.php';

try {
    session_start();

    if(empty(COMMON::getSession('member_code'))){
        throw new Exception('로그인을 시도해 주세요.');
    }

    $start = new DateTime($_POST['start_date']);
    $end = new DateTime($_POST['end_date']);
    $gap = date_diff($start, $end);

    $room = new ROOM();
    $row = $room->getRoomByCode($_POST['room_code']);

    $booking = DB_CONNECT::DB()->table('booking');
    $booking->insert(
        [
            'booking_code' => uniqid('b'),
            'member_code' => COMMON::getSession('member_code'),
            'room_code' => $_POST['room_code'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'].' 23:59:59',
            'people' => $_POST['people'],
            'price' => $gap->days * floor($row['price']),
            'room_member_code' => $_POST['member_code'],
        ]
    )->execute();

    throw new Exception('200');
} catch(Exception $e){
    $msg = $e->getMessage();
    $result['msg'] = $msg;
    $result['data'] = $_POST['room_code'];

    echo json_encode($result);
}
?>