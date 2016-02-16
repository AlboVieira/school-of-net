<?php

/**
 * Created by PhpStorm.
 * User: albov
 * Date: 15/02/2016
 * Time: 21:27
 */
namespace SON\Dao\Database;
use PDO;

class Database
{
    public function connect(){

        $db = "teste_poo";
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(\PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();die;
        }
    }

    public function rawConnect(){

        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(\PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();die;
        }
    }


}