<?php
namespace App\Dao;

use PDO;

class FiliereDao
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

   
    public function findAll(): array
    {
        return $this->pdo->query("SELECT * FROM filiere")->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function findById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM filiere WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}