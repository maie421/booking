<?php
require_once dirname(__FILE__, 3).'/vendor/autoload.php';

try {
    $room = DB_CONNECT::DB()->table('comment');
    $room->delete()
        ->where('comment_code', $_POST['code'])
        ->execute();

    throw new Exception('200');
} catch(Exception $e){
    $msg = $e->getMessage();
    $result['msg'] = $msg;

    echo json_encode($result);
}
?>