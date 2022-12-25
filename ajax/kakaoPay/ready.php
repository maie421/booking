<?php
require_once dirname(__FILE__, 3).'/vendor/autoload.php';

try {
    session_start();

    if(empty(COMMON::getSession('member_code'))){
        throw new Exception('로그인을 시도해 주세요.');
    }

    $order_code = COMMON::keyCrypt(COMMON::getSession('order_code'),'d');

    $order = new ORDER();
    $order_data = $order->getOrderByOrderCode($order_code);


    $kakao_pay = new KAKAOPAY();
    $kakao_pay_ready = $kakao_pay->kakaoPayReady($order_data);


    throw new Exception('200');
} catch(Exception $e){
    $msg = $e->getMessage();
    $result['msg'] = $msg;
    $result['data'] = $kakao_pay_ready['next_redirect_pc_url'];

    echo json_encode($result);
}
?>