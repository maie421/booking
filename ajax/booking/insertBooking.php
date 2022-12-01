<?php
require_once dirname(__FILE__, 3).'/vendor/autoload.php';

try {
    session_start();

    if(empty(COMMON::getSession('member_code'))){
        throw new Exception('로그인을 시도해 주세요.');
    }

    $booking = DB_CONNECT::DB()->table('booking');
    $booking->insert(
        [
            'booking_code' => uniqid('b'),
            'member_code' => COMMON::getSession('member_code'),
            'room_code' => $_POST['room_code'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'].' 23:59:59',
            'people' => $_POST['people'],
            'room_member_code' => $_POST['member_code'],
        ]
    )->execute();
    throw new Exception('200');
} catch(Exception $e){
    $msg = $e->getMessage();
    $result['msg'] = $msg;

    echo json_encode($result);
}
?>