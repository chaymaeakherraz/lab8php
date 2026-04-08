<?php
namespace App\Dao;

use PDO;

class AdminDao
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findByUsername(string $username): ?array
    {
        $stmt = $this->pdo->prepare(
            "SELECT id, username, password_hash 
             FROM admin WHERE username = ?"
        );
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->pdo->prepare(
            "SELECT id, username FROM admin WHERE id = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function create(string $username, string $password): bool
    {
        $hash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $this->pdo->prepare(
            "INSERT INTO admin (username, password_hash) VALUES (?, ?)"
        );
        return $stmt->execute([$username, $hash]);
    }
}