<?php

class DB_CONNECT
{
    private $user = "yeongmi"; // DB 아이디
    private $password = "1234"; // DB 패스워드

    public $pdo;
    function __construct()
    {
        try {
            // 서버 이름, 데이터베이스 이름, 사용자명과 비밀번호를 전달하여 새로운 PDO 객체를 생성
            $this->pdo = new PDO('mysql:host=192.168.64.3', $this->user, $this->password);
            // 생성된 PDO 객체에 에러 모드(error mode)를 설정
            // 이렇게 에러 모드를 설정하면, PDO 생성자는 에러가 발생할 때마다 PDOException 예외를 던질 것이다.
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "서버와의 연결 성공!";
        } catch (PDOException $ex) {
            echo "서버와의 연결 실패! : ".$ex->getMessage()."<br>";
        }
    }
}


?>