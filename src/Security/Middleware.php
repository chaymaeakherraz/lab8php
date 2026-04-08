<?php
namespace App\Security;

class Middleware
{
    public static function auth()
    {
        if (!isset($_SESSION['admin_id'])) {
            header("Location: /login");
            exit;
        }
    }

    public static function csrf()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token'])) {
            die('403 CSRF');
        }

        if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die('403 CSRF');
        }
    }
}
}