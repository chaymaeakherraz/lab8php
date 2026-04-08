<?php
namespace App\Security;

use App\Dao\AdminDao;

class Auth
{
    private $dao;

    public function __construct(AdminDao $dao)
    {
        $this->dao = $dao;
    }

    public function startSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

   public function login($username, $password)
{
    $user = $this->dao->findByUsername($username);

    if ($user && password_verify($password, $user['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION['admin_id'] = $user['id'];
        return true;
    }
    return false;
}
        

    public function check()
    {
        return isset($_SESSION['admin_id']);
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
    }
}