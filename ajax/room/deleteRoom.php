<?php
require_once dirname(__FILE__, 3).'/vendor/autoload.php';

try {
    $room = DB_CONNECT::DB()->table('room');
    $room->delete()
        ->where('room_code', $_GET['code'])
        ->execute();

    throw new Exception('200');
} catch(Exception $e){
    $msg = $e->getMessage();
    $result['msg'] = $msg;

    echo json_encode($result);
}
?>