<?php

namespace Jean\ControleClientes\Database;
use PDO, PDOException;

class Database {

    private static $conn;

    public static function setConn() {
        include_once __DIR__ . "/../config/db.php";
        
        $dsn = "mysql:host={$config['host']}; port={$config['port']}; dbname={$config['database']}";
        
        try{
            $conn = new PDO($dsn, $config['user'], $config['password']);    
            echo "Banco de dados conectado com sucesso!";
        } catch(PDOException $e){
            echo "Erro na conexão com o banco de dados: {$e->getMessage()}";
        }
    }

    public static function getConn(){
        return self::$conn;
    }

}