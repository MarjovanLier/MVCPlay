<?php

namespace Core;

class Router
{
    private array $routes = [];

    public function add($method, $path, $controller, $methodName): void
    {
        $this->routes[] = compact('method', 'path', 'controller', 'methodName');
    }

    public function dispatch()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = strtok($_SERVER['REQUEST_URI'], '?');

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $route['path'] === $requestUri) {
                if (is_callable([$route['controller'], $route['methodName']])) {
                    return call_user_func
                    (
                        [new $route['class'], $route['methodName']]
                    );
                }


                $controller =  $route['controller'];
                $method = $route['methodName'];

                if (class_exists($controller) && method_exists($controller, $method)) {
                    return (new $controller)->$method();
                }

            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
