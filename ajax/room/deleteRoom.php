<?php
require_once dirname(__FILE__, 3).'/vendor/autoload.php';

try {
    $room = DB_CONNECT::DB()->table('room');
    $room->delete()
        ->where('room_code', $_GET['code'])
        ->execute();

    $book_mark = DB_CONNECT::DB()->table('bookmark');
    $book_mark->delete()
        ->where('room_code', $_GET['code'])
        ->execute();

    $comment = DB_CONNECT::DB()->table('comment');
    $comment->delete()
        ->where('room_code', $_GET['code'])
        ->execute();

    throw new Exception('200');
} catch(Exception $e){
    $msg = $e->getMessage();
    $result['msg'] = $msg;

    echo json_encode($result);
}
?>