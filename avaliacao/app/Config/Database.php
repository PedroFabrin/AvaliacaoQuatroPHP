<?php
namespace App\Config;

use PDO;
use PDOException;

class Database {
    private static ?PDO $conn = null;

    public static function getConnection(): PDO {
        if(self::$conn) return self::$conn;

        $host = "127.0.0.1:3307";
        $dbname = "atividade_db";
        $user = "root";
        $pass = "";
        $charset = "utf8mb4";

        $dns = "mysql:host=$host;dbname=$dbname;charset=$charset";

        try {
            self::$conn = new PDO($dns, $user, $pass);
            return self::$conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}