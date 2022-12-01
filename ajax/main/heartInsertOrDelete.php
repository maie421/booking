<?php
require_once dirname(__FILE__, 3).'/vendor/autoload.php';

try {
    $bookmark = new BOOKMARK();

    if(empty(COMMON::getSession('member_code'))){
        throw new Exception('잘못된 접근입니다.');
    }

    if(empty($bookmark->getBookmarkByRoomCode($_POST['code'],COMMON::getSession('member_code')))){
        $bookmark = DB_CONNECT::DB()->table('bookmark');
        $bookmark->insert(
            [
                'bookmark_code' => uniqid('b'),
                'member_code' => COMMON::getSession('member_code'),
                'room_code' => $_POST['code'],
            ]
        )->execute();
    }else {
        $bookmark->deleteBookmarkByRoomCode($_POST['code'],COMMON::getSession('member_code'));
    }

    throw new Exception('200');
} catch(Exception $e){
    $msg = $e->getMessage();
    $result['msg'] = $msg;

    echo json_encode($result);
}
?>