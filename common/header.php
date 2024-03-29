<?php

require_once dirname(__FILE__, 2).'/vendor/autoload.php';
session_start();

 if(!empty($_COOKIE[ "member_code" ])){
     $_SESSION["member_code"] = COMMON::keyCrypt($_COOKIE['member_code'],'d');
 }

$self_url = $_SERVER["PHP_SELF"];
 if(!empty($_GET['code']) && $self_url == "/room/index.php" && empty($_COOKIE[ "room_view_{$_GET['code']}" ])){
     setcookie("room_view_{$_GET['code']}",'Y',(time()+3600*24),"room/?code={$_GET['code']}");
     $room = new ROOM();
     $row = $room->getRoomByCode($_GET['code']);
     $room->updateRoomViewByCode($_GET['code'], $row['views']);
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
<body>
<div class="container">
    <div class="d-flex justify-content-between">
        <a href="/"><img src="../img/logo.png" height="100" width="150"/></a>
        <div class="align-self-center">
            <div class="input-group  mx-sm-3">
                <!--                <input type="text" class="form-control" placeholder="검색"-->
                <!--                       aria-label="검색 시작하기"-->
                <!--                       aria-describedby="basic-addon2">-->
                <!--                <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>-->
            </div>
        </div>
        <div class="align-self-center">
            <div class="dropdown">
                <?php
                if (empty($_SESSION['member_code'])) { ?>
                    <i class="bi bi-person-circle dropdown-toggle" data-bs-toggle="dropdown"></i>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item " data-bs-toggle="modal" data-bs-target="#LoginForm">로그인</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#JoinForm">회원가입</a></li>
                    </ul>
                <?php
                } else {
                    $member = new MEMBER();
                    $login_member_type = $member->getLoginMemberTypeByCode();

                    ?>
                    <span class="me-3"><?=$login_member_type == 'basic' ? '일반회원':'관리자'?></span>
                    <i class="bi bi-person-circle dropdown-toggle" data-bs-toggle="dropdown"></i>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item " onclick="logout(); ">로그아웃</a></li>
                        <li><a class="dropdown-item " href="/mypage" ">마이페이지</a></li>
                        <?php if($login_member_type == 'manager'){?>
                            <li><a class="dropdown-item " href="/admin" ">관리자 페이지</a></li>
                         <?php } ?>
                    </ul>
                <?php
                } ?>
            </div>
        </div>
    </div>
</div>

<!--로그인 모달-->
<div class="modal fade" id="LoginForm" tabindex="-1" aria-labelledby="LoginFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                <div>
                    <h1 class="text-center">로그인</h1>
                    <form class="loginFormObject" method="post" action="../ajax/login.php">
                        <div class="mb-3 mt-4">
                            이메일
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            패스워드
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#JoinForm" onclick="$('.btn-close').trigger('click');">회원가입</a>
                        <input type="checkbox" id="auto_login" name="auto_login" value="y">
                        <label for="auto_login" class="" style="font-size: smaller;color: #333333"> 자동로그인</label>
                        <div class="d-grid gap-2 col-6 mx-auto mt-3">
                            <button type="submit" class="btn btn-primary mt-3">로그인</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!--회원가입 모달-->
<div class="modal fade" id="JoinForm" tabindex="-1" aria-labelledby="JoinFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                <div class="myform">
                    <h1 class="text-center">회원가입</h1>
                    <form class="joinFormObject" method="post">
                        <div class="mb-3 mt-4">
                            이메일
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" name="email" required>
                        </div>
                        <div class="mb-3 mt-4">
                            이름
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" name="name" required>
                        </div>
                        <div class="mb-3 mt-4">
                            휴대폰 번호
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" name="phone_number" required>
                        </div>
                        <div class="mb-3">
                            패스워드
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                   required>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto mt-3">
                            <button type="submit" class="btn btn-primary mt-3" onclick="joinForm()">확인</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
</body>
</html>