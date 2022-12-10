<?php

require_once dirname(__FILE__, 2).'/vendor/autoload.php';

try {
    if (empty($_POST['email'])) {
        throw new Exception("이메일이 빈칸입니다.");
    }

    if (empty($_POST['password'])) {
        throw new Exception("패스워드가 빈칸입니다.");
    }

    $member = DB_CONNECT::DB()->table('member');

     $member_data = $member->select()
        ->where('email', '=', $_POST['email']) ->limit(1)
        ->get();

    if(password_verify($_POST['password'], $member_data['password'] ?? "")){
        throw new Exception('200');
    }
    else{
        throw new Exception('일치하는 회원이 존재하지 않습니다.');
    }

} catch (Exception $e) {
    $msg = $e->getMessage();
    $result['msg'] = $msg;

    if ($msg == '200') {
        COMMON::setSession('member_code', $member_data['member_code']);
        if(empty($_POST['auto_login'])){
            $_POST['auto_login'] = '';
        }
        if($_POST['auto_login'] == 'y'){
            setcookie("member_code",$member_data['member_code'],(time()+3600*24*30),"/"); // 한달간 자동로그인 유지
        }

        echo '<script language="javascript">';
        echo "alert('로그인에 성공하였습니다.')";
        echo '</script>';
        echo "<script> location.href = '/' </script>";
    } else {
        echo '<script language="javascript">';
        echo "alert('$msg')";
        echo '</script>';
        echo "<script> location.href = '/' </script>";
    }
}
?>