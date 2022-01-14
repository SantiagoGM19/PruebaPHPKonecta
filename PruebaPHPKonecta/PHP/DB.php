<?php

class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host = 'localhost';
        $this->db = 'gestion_productos';
        $this->user = 'root';
        $this->password = '';
        $this->charset = 'utf8mb4';

    }

    function conectar(){
        try{
            $connection = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
            $pdo = new PDO($connection, $this->user, $this->password);
            return $pdo;
        }catch(PDOException $error){
            print_r('Error connection: '.$error->getMessage());
        }
    }
}
?>