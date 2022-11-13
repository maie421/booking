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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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
            <span class="me-3">관리자</span>
            <span><i class="bi bi-person-circle"></i></span>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>
</html>