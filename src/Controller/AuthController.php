<?php
namespace App\Controller;

use App\Security\Auth;

class AuthController
{
    private $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function showLogin()
    {
        require __DIR__ . '/../../views/auth/login.php';
    }

    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($this->auth->login($username, $password)) {
            header("Location: /etudiants");
        } else {
            echo "Login failed";
        }
    }

    public function logout()
    {
        $this->auth->logout();
        header("Location: /login");
    }
}