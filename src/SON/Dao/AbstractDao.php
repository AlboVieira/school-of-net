<?php

/**
 * Created by PhpStorm.
 * User: albov
 * Date: 12/02/2016
 * Time: 21:50
 */
namespace SON\Dao;

use PDO;

class AbstractDao
{
    /** @var PDO $conn */
    private $conn;
    private $sql;

    const INSERT = 'insert';
    const UPDATE = 'update';
    const DELETE = 'delete';
    const SELECT = 'select';

    public function __construct(){
        if(!$this->conn){
            $db = "teste_poo";
            $servername = "localhost";
            $username = "root";
            $password = "";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn = $conn;
            }
            catch(\PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();die;
            }
        }
    }

    public function getConnection(){
        return $this->conn;
    }

    public function setSql($sql){
        $this->sql = $sql;
    }
    public function flush(){
        /** @var \PDOStatement $stmt */
        $stmt = $this->conn->prepare($this->sql);
        return $stmt->execute();
    }

    public function findAll(){
         $consulta = $this->conn->query($this->sql);
         return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
}