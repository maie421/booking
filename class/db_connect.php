<?php

require_once dirname(__FILE__, 2).'/vendor/autoload.php';

class DB_CONNECT
{
    public static function DB()
    {
        $connection = new PDO('mysql:host=host.docker.internal;dbname=booking;charset=utf8', 'root', '1234');

// create a new mysql query builder
        return $h = new \ClanCats\Hydrahon\Builder(
            'mysql',
            function ($query, $queryString, $queryParameters) use ($connection) {
                $statement = $connection->prepare($queryString);
                $statement->execute($queryParameters);

                // when the query is fetchable return all results and let hydrahon do the rest
                // (there's no results to be fetched for an update-query for example)
                if ($query instanceof \ClanCats\Hydrahon\Query\Sql\FetchableInterface) {
                    return $statement->fetchAll(\PDO::FETCH_ASSOC);
                } // when the query is a instance of a insert return the last inserted id
                elseif ($query instanceof \ClanCats\Hydrahon\Query\Sql\Insert) {
                    return $connection->lastInsertId();
                }
                // when the query is not a instance of insert or fetchable then
                // return the number os rows affected
                else {
                    return $statement->rowCount();
                }
            }
        );
    }

    public static function ROW_QUERY()
    {
        try {
            // 서버 이름, 데이터베이스 이름, 사용자명과 비밀번호를 전달하여 새로운 PDO 객체를 생성
            $pdo = new PDO('mysql:host=host.docker.internal;dbname=booking;charset=utf8', 'root', '1234');
            // 생성된 PDO 객체에 에러 모드(error mode)를 설정
            // 이렇게 에러 모드를 설정하면, PDO 생성자는 에러가 발생할 때마다 PDOException 예외를 던질 것이다.
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        } catch (PDOException $ex) {
            echo "서버와의 연결 실패! : ".$ex->getMessage()."<br>";
        }
    }
}


?>