<?php

namespace App\Models;

use \PDO;

class Database
{
    const HOSTNAME = "127.0.0.1";
    const USERNAME = "lucas";
    const PASSWORD = "1046";
    const DBNAME = "db_ecommerce";

    private $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:dbname=" . Database::DBNAME . ";host=" . Database::HOSTNAME, Database::USERNAME, Database::PASSWORD);
    }

    private function setParams($statment, $parameters = array())
    {

        foreach ($parameters as $key => $value) {
            $this->setParam($statment, $key, $value);
        }
    }

    private function setParam($statment, $key, $value)
    {
        $statment->bindParam($key, $value);
    }

    private function setQuery($rawQuery, $params = array())
    {

        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt;
    }

    public function select($rawQuery, $params = array())
    {

        $stmt = $this->setQuery($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
