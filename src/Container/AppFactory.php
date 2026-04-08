<?php
namespace App\Container;

use App\Core\Router;
use App\Core\Request;
use App\Dao\DBConnection;
use App\Dao\AdminDao;
use App\Dao\EtudiantDao;
use App\Security\Auth;
use App\Security\Csrf;
use App\Controller\AuthController;
use App\Controller\EtudiantController;

class AppFactory
{
    public function create()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        $pdo = DBConnection::connect();

        $adminDao = new AdminDao($pdo);
        $auth = new Auth($adminDao);
        $csrf = new Csrf();

        $authController = new AuthController($auth);
        $etudiantController = new EtudiantController(new EtudiantDao($pdo));

        $router = new Router();
        $request = new Request();

        // 🔐 AUTH
        $router->get('/login', [$authController, 'showLogin']);
        $router->post('/login', [$authController, 'login']);
        $router->get('/logout', [$authController, 'logout']);

        
        $router->get('/etudiants', [$etudiantController, 'index']);

        $router->get('/etudiants/create', [$etudiantController, 'create']);
        $router->post('/etudiants/store', [$etudiantController, 'store']);

        $router->get('/etudiants/edit', [$etudiantController, 'edit']);     
        $router->post('/etudiants/update', [$etudiantController, 'update']); 

        $router->get('/etudiants/delete', [$etudiantController, 'delete']);

        return [$router, $request];
    }
}
