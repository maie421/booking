<?php

require_once dirname(__FILE__, 3).'/vendor/autoload.php';

try {
    session_start();

    if (empty(COMMON::getSession('member_code'))) {
        throw new Exception('로그인을 시도해 주세요.');
    }

    $order_code = COMMON::keyCrypt(COMMON::getSession('order_code'), 'd');

    $order = new ORDER();
    $order_data = $order->getOrderByOrderCode($order_code);

    $kakao_pay = new KAKAOPAY();
    $kakao_pay_request = $kakao_pay->approveRequest($order_data, $_GET['pg_token']);

    $room = new ROOM();
    $row = $room->getRoomByCode($order_data['room_code']);

    $booking = DB_CONNECT::DB()->table('booking');
    $booking->insert(
        [
            'booking_code' => uniqid('b'),
            'member_code' => COMMON::getSession('member_code'),
            'room_code' => $order_data['room_code'],
            'start_date' => $order_data['start_date'],
            'end_date' => $order_data['end_date'],
            'people' => $order_data['people'],
            'price' => $order_data['price'],
            'booking_status' => 'incomplete',
            'room_member_code' => $row['member_code'],
        ]
    )->execute();

    $room_code = $order_data['room_code'];
    throw new Exception('200');
} catch (Exception $e) {
    $msg = $e->getMessage();
    $result['msg'] = $msg;
//
    if ($msg == '200') {
        echo '<script language="javascript">';
        echo "window.opener.location.href='/room/?code=$room_code';";
        echo 'window.close();';
        echo '</script>';

    } else {
        echo '<script language="javascript">';
        echo "alert('$msg')";
        echo '</script>';
        echo "<script>history.go(-1)</script>";
    }

    echo json_encode($result);
}

?>