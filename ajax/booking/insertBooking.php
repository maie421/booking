<?php
require_once dirname(__FILE__, 3).'/vendor/autoload.php';

try {
    $booking = DB_CONNECT::DB()->table('booking');
    $booking->insert(
        [
            'booking_code' => uniqid('b'),
            'member_code' => 'm6377727b479e0',
            'room_code' => $_POST['room_code'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'].' 23:59:59',
            'people' => $_POST['people'],
        ]
    )->execute();
    throw new Exception('200');
} catch(Exception $e){
    $msg = $e->getMessage();
    $result['msg'] = $msg;

    echo json_encode($result);
}
?>