<?php

class Database
{
    private $servername = "localhost";
    private $username = "deyaa";
    private $password = "123456";
    private $dbname = "store";

    function connect()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "connected to database";
            return $conn;
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }
}