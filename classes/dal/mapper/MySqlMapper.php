<?php

namespace App\Mapper;

use PDO;

define("App\Mapper\DB", json_decode(file_get_contents(__DIR__.'/../../../config/db.json'),true));


abstract class MySqlMapper
{
    protected string $hostName = DB['HOST_NAME'];
    protected string $dbName = DB['DB_NAME'];
    protected string $userName = DB['USER_NAME'];
    protected string $password = DB['PASSWORD'];
    protected string $tableName;

    /**
     * @return PDO
     */
    protected function connect(): PDO
    {
        return new PDO("mysql:host=$this->hostName;dbname=$this->dbName", "$this->userName", "$this->password");
    }

    /**
     * @param $fieldName
     * @param $searchText
     * @return array
     */
    public function getList($fieldName, $searchText): array
    {
        $str = "'%$searchText%'";
        $query = sprintf("SELECT * FROM %s WHERE %s LIKE %s", $this->tableName, $fieldName, $str);

        $pdo = $this->connect();
        $sth = $pdo->prepare($query);
        $sth->execute();

        return $sth->fetchAll();
    }

    /**
     * @param array $arr
     * @return int
     */
    public function addElement(array $arr): int
    {
        $keys = implode(", ", array_keys($arr));
        $values = "'" . implode("','", $arr) . "'";
        $query = sprintf("INSERT INTO %s (%s) VALUES (%s)", $this->tableName, $keys, $values);

        $pdo = $this->connect();
        $sth = $pdo->prepare($query);
        $sth->execute();
        $id = $pdo->lastInsertId();

        $pdo = null;
        $sth = null;

        return $id;
    }

    /**
     * @param array $arr
     * @param int $id
     * @return void
     */
    public function updateElement(array $arr, int $id): void
    {
        $sql = implode(', ', array_map(
                function ($k, $v) {
                    return $k . " = '" . $v . "'";
                },
                array_keys($arr),
                array_values($arr)
            )
        );
        $query = sprintf("UPDATE %s  SET %s WHERE id = %s", $this->tableName, $sql, $id);

        $pdo = $this->connect();
        $sth = $pdo->prepare($query);
        $sth->execute();

        $pdo = null;
        $sth = null;
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteElement(int $id): void
    {
        $query = sprintf("DELETE FROM %s WHERE id = %s", $this->tableName, $id);

        $pdo = $this->connect();
        $sth = $pdo->prepare($query);
        $sth->execute();

        $pdo = null;
        $sth = null;
    }

    /**
     * @param int $id
     * @return array
     */
    public function getElementById(int $id): array
    {
        $query = sprintf("SELECT * FROM %s WHERE id = %s", $this->tableName, $id);

        $pdo = $this->connect();
        $sth = $pdo->prepare($query);

        $sth->execute();

        return $sth->fetchAll()[0];
    }
}