<?php 

class Dbh {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbName = "education_db";
    protected static $mysqli;

    protected function dbconnect() {
        self::$mysqli = new mysqli($this->host,$this->username,$this->password,$this->dbName);
        return self::$mysqli;
    }
}