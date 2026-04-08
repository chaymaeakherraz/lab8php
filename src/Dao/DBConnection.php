<?php
namespace App\Dao;

use PDO;
use PDOException;

class DBConnection
{
    public static function connect(): PDO
    {
        $host = "127.0.0.1";
        $db   = "gestion_etudiants_secure";
        $user = "root";
        $pass = "";
        $charset = "utf8mb4";

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        try {
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erreur DB: " . $e->getMessage());
        }
    }
}