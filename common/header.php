<?php
    require_once dirname(__FILE__,2).'/vendor/autoload.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


</head>
<body>
<div class="container">
    <div class="d-flex justify-content-between">
        <img src="../img/logo.png" height="100" width="150" />
        <div class="align-self-center">
            <div class="input-group  mx-sm-3">
                <input type="text" class="form-control" placeholder="검색 시작하기"
                       aria-label="검색 시작하기"
                       aria-describedby="basic-addon2">
                <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
            </div>
        </div>
        <div class="align-self-center">
            <div class="dropdown">
                <span class="me-3">관리자</span>
                <i class="bi bi-person-circle dropdown-toggle" data-bs-toggle="dropdown"></i>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item " data-bs-toggle="modal" data-bs-target="#LoginForm">로그인</a></li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#JoinForm">회원가입</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--로그인 모달-->
<div class="modal fade" id="LoginForm" tabindex="-1" aria-labelledby="LoginFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="myform">
                    <h1 class="text-center">로그인</h1>
                    <form>
                        <div class="mb-3 mt-4">
                            이메일
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            패스워드
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-light mt-3">LOGIN</button>
                        <p class="mt-3"><a data-bs-toggle="modal" data-bs-target="#JoinForm">회원가입</a></p>
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
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="myform">
                    <h1 class="text-center">회원가입</h1>
                    <form>
                        <div class="mb-3 mt-4">
                            이메일
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 mt-4">
                            닉네임
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            패스워드
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-light mt-3">확인</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
</body>
</html>