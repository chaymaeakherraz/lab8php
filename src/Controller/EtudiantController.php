<?php
namespace App\Controller;

use App\Dao\EtudiantDao;
use App\Security\Middleware;

class EtudiantController
{
    private $dao;

    public function __construct(EtudiantDao $dao)
    {
        $this->dao = $dao;
    }

    public function index()
    {
        Middleware::auth();
        $etudiants = $this->dao->all();
        require __DIR__ . '/../../views/etudiant/index.php';
    }

    public function create()
    {
        Middleware::auth();
        require __DIR__ . '/../../views/etudiant/create.php';
    }

    public function store()
    {
        Middleware::auth();
        Middleware::csrf();

        $this->dao->create($_POST['nom'], $_POST['email']);

        header("Location: /etudiants");
        exit;
    }

    public function edit()
    {
        Middleware::auth();

        $id = $_GET['id'];
        $etudiant = $this->dao->find($id);

        require __DIR__ . '/../../views/etudiant/edit.php';
    }

    public function update()
    {
        Middleware::auth();
        Middleware::csrf();

        $this->dao->update($_POST['id'], $_POST['nom'], $_POST['email']);

        header("Location: /etudiants");
        exit;
    }

    public function delete()
    {
        Middleware::auth();

        $id = $_GET['id'];
        $this->dao->delete($id);

        header("Location: /etudiants");
        exit;
    }
}