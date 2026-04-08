<?php
namespace App\Dao;

use PDO;

class EtudiantDao
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function all()
    {
        return $this->pdo->query("SELECT * FROM etudiant")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM etudiant WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nom, $email)
    {
        $stmt = $this->pdo->prepare("INSERT INTO etudiant (nom, email) VALUES (?, ?)");
        return $stmt->execute([$nom, $email]);
    }

    public function update($id, $nom, $email)
    {
        $stmt = $this->pdo->prepare("UPDATE etudiant SET nom=?, email=? WHERE id=?");
        return $stmt->execute([$nom, $email, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM etudiant WHERE id=?");
        return $stmt->execute([$id]);
    }
}