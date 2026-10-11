<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function check(): array
    {
        return $this->routes;
    }

    public function get(string $path, callable $handler)
    {
        $this->add("GET", $path, $handler);
    }

    public function post(string $path, callable $handler)
    {
        $this->add("POST", $path, $handler);
    }

    private function add(string $method, string $path, callable $handler)
    {
        $this->routes[] = [
            "method" => $method,
            "path" => $path,
            "handler" => $handler
        ];
    }

    public function dispatch()
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route["method"] === $method && $route["path"] === $url) {
                $route["handler"]();

                return;
            }
        }

        http_response_code(404);
        echo "404 NOT FOUND";
    }
}
