<?php
namespace App\Core;

class Router
{
    private $routes = [];

    public function get($path, $handler)
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post($path, $handler)
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch($request)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = strtok($_SERVER['REQUEST_URI'], '?');

        if (isset($this->routes[$method][$uri])) {
            $handler = $this->routes[$method][$uri];
            call_user_func($handler);
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}