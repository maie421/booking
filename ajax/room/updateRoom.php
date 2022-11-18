<?php
require_once dirname(__FILE__, 3).'/vendor/autoload.php';

try {
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

    if(empty($_FILES)){
        $img_name = COMMON::FILE_UPLOAD($_FILES);
    }else{
        $img_name = $_POST['img'];
    }

    $room = DB_CONNECT::DB()->table('room');
    $room->update()
        ->set('name', $_POST['name'])
        ->set('address', $_POST['address_detail'])
        ->set('max_people', $_POST['people'])
        ->set('price', $_POST['price'])
        ->set('img', $_POST['img'])
        ->where('room_code', $_POST['room_code'])
        ->execute();

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