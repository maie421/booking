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
}


?>