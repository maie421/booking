<?php
require_once dirname(__FILE__, 3).'/vendor/autoload.php';

try {
    session_start();

    if (empty($_POST['name'])) {
        throw new Exception("이름이 빈칸입니다.");
    }

    if (empty($_POST['address_detail'])) {
        throw new Exception("주소가 빈칸입니다.");
    }

    if (empty($_POST['people'])) {
        throw new Exception("인원이 빈칸입니다.");
    }

    if (empty($_POST['price'])) {
        throw new Exception("가격이 빈칸입니다.");
    }

    $img_name = COMMON::FILE_UPLOAD($_FILES);

    $room = DB_CONNECT::DB()->table('room');
    $room->insert(
        [
            'room_code' => uniqid('r'),
            'name' => $_POST['name'],
            'address' => $_POST['address_detail'],
            'max_people' => $_POST['people'],
            'price' => $_POST['price'],
            'create_date' => date("Y-m-d H:i:s"),
            'img' => $img_name,
            'member_code' => COMMON::getSession('member_code'),22
            'type' => $_POST['type'],
        ]
    )->execute();

    throw new Exception('200');
} catch(Exception $e){
    $msg = $e->getMessage();
    $result['msg'] = $msg;

    if ($msg == '200') {
        echo '<script language="javascript">';
        echo "alert('성공하였습니다')";
        echo '</script>';
        echo "<script> location.href = '/admin/room' </script>";
    } else {
        echo '<script language="javascript">';
        echo "alert('$msg')";
        echo '</script>';
        echo "<script>history.go(-1)</script>";
    }
}
?>