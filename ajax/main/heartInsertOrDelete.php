<?php
require_once dirname(__FILE__, 3).'/vendor/autoload.php';

try {
    $bookmark = DB_CONNECT::DB()->table('bookmark');
    $bookmark->insert(
        [
            'bookmark_code' => uniqid('b'),
            'member_code' => 'm6377727b479e0',
            'room_code' => $_POST['code'],
        ]
    )->execute();

    throw new Exception('200');
} catch(Exception $e){
    $msg = $e->getMessage();
    $result['msg'] = $msg;

    echo json_encode($result);
}
?>