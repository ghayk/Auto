<?php

namespace App\Mapper;

use PDO;

define("App\Mapper\DB", json_decode(file_get_contents(__DIR__ . '/../../../config/db.json'), true));


abstract class AbstractMySqlMapper
{
    protected string $hostName = DB['HOST_NAME'];
    protected string $dbName = DB['DB_NAME'];
    protected string $userName = DB['USER_NAME'];
    protected string $password = DB['PASSWORD'];
    protected string $tableName;

    private static string $ADD_ELEMENT = "INSERT INTO %s (%s) VALUES (%s)";
    private static string $GET_LIST = "SELECT * FROM %s WHERE %s LIKE %s";
    private static string $UPDATE_ELEMENT = "UPDATE %s  SET %s WHERE id = %s";
    private static string $DELETE_ELEMENT = "DELETE FROM %s WHERE id = %s";
    private static string $GET_ELEMENT = "SELECT * FROM %s WHERE id = %s";


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
        $query = sprintf(self::$GET_LIST, $this->tableName, $fieldName, $str);

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
        $query = sprintf(self::$ADD_ELEMENT, $this->tableName, $keys, $values);

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
        $query = sprintf(self::$UPDATE_ELEMENT, $this->tableName, $sql, $id);

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
        $query = sprintf(self::$DELETE_ELEMENT, $this->tableName, $id);

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
        $query = sprintf(self::$GET_ELEMENT, $this->tableName, $id);

        $pdo = $this->connect();
        $sth = $pdo->prepare($query);

        $sth->execute();

        return $sth->fetchAll()[0];
    }
}