<?php
require_once dirname(__FILE__, 2).'/vendor/autoload.php';

try {
    if (empty($_POST['email'])) {
        throw new Exception("이메일이 빈칸입니다.");
    }

    if (empty($_POST['name'])) {
        throw new Exception("이름이 빈칸입니다.");
    }

    if (empty($_POST['phone_number'])) {
        throw new Exception("휴대폰 번호가 빈칸입니다.");
    }

    if (empty($_POST['password'])) {
        throw new Exception("패스워드가 빈칸입니다.");
    }

    $member_code = uniqid('m');
    $member = DB_CONNECT::DB()->table('member');
    $member->insert(
        [
            'email' => $_POST['email'],
            'member_code' => $member_code,
            'name' => $_POST['name'],
            'phone_number' => $_POST['phone_number'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ]
    )->execute();

    throw new Exception('200');
} catch(Exception $e){
    $msg = $e->getMessage();
    $result['msg'] = $msg;

    if($msg == '200') {
        COMMON::setSession('member_code', $member_code);
    }

    echo json_encode($result);
}
?>