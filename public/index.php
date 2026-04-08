<?php

// 🔹 Core
require_once __DIR__ . '/../src/Core/Router.php';
require_once __DIR__ . '/../src/Core/Request.php';

// 🔹 Container
require_once __DIR__ . '/../src/Container/AppFactory.php';

// 🔹 DAO
require_once __DIR__ . '/../src/Dao/DBConnection.php';
require_once __DIR__ . '/../src/Dao/AdminDao.php';
require_once __DIR__ . '/../src/Dao/EtudiantDao.php';

// 🔹 Security
require_once __DIR__ . '/../src/Security/Auth.php';
require_once __DIR__ . '/../src/Security/Middleware.php';
require_once __DIR__ . '/../src/Security/Csrf.php';

// 🔹 Controllers
require_once __DIR__ . '/../src/Controller/AuthController.php';
require_once __DIR__ . '/../src/Controller/EtudiantController.php';

use App\Container\AppFactory;


$app = new AppFactory();
list($router, $request) = $app->create();


$router->dispatch($request);
