<?php

require_once dirname(__FILE__, 3).'/vendor/autoload.php';
session_start();

$member = new MEMBER();
$login_member_type = $member->getLoginMemberTypeByCode();

if($login_member_type != "manager"){
    header('location: http://127.0.0.1/');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="../common/js/header.js"></script>

</head>
<div class="bg-secondary text-light">
    <div class="container">
        <div class="d-flex justify-content-between">
            <a href="/admin"><img src="../../../img/logo.png" height="100" width="150"/></a>
            <div class="align-self-center">
                <div class="dropdown">
                    <span class="me-3">관리자</span>
                    <span class="me-3" onclick="logout()">로그아웃</span>
                </div>
            </div>
        </div>
    </div>
</div>
</html>