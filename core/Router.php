<?php

declare(strict_types=1);

namespace Core;

class Router
{
    private array $routes = [];

    /**
     * Adds a new route to the router.
     *
     * This method adds a new route to the internal routes array.
     * The route is defined by the HTTP method, path, and action.
     *
     * @param string $method The HTTP method (e.g., GET, POST).
     * @param string $path The URI path for the route.
     * @param callable $action The action to be executed when the route is matched.
     *
     * @return void
     */
    public function add(string $method, string $path, callable $action): void
    {
        $this->routes[] = compact('method', 'path', 'action');
    }


    /**
     * Dispatches the current request to the appropriate route.
     *
     * This method matches the current HTTP request method and URI to the defined routes.
     * If a matching route is found, it calls the corresponding controller method.
     * If no matching route is found, it returns a 404 Not Found response.
     *
     * @return mixed The result of the controller method call, or null if no matching route is found.
     */
    public function dispatch(): mixed
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = strtok($_SERVER['REQUEST_URI'], '?');

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod) {
                $pattern = preg_replace('#\{[^}]+\}#', '([^/]+)', $route['path']);
                if (preg_match('#^' . $pattern . '$#', $requestUri, $matches)) {
                    array_shift($matches);
                    return call_user_func_array($route['action'], $matches);
                }
            }
        }

        http_response_code(404);
        echo '404 Not Found';
        return null;
    }
}
