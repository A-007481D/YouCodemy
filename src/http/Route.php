<?php
namespace src\http;

use App\models\UserModel;

namespace src\http;

class Route
{
    protected static array $routes = [];

    public static function get($route, $controller, $action): void
    {
        self::$routes['get'][$route] = [$controller, $action];
    }

    public static function post($route, $controller, $action): void
    {
        self::$routes['post'][$route] = [$controller, $action];
    }

    public function resolve($requestUri, $requestMethod): void
    {
        $path = parse_url($requestUri, PHP_URL_PATH);
        $method = strtolower($requestMethod);
                
        if (isset(self::$routes[$method][$path])) {
            $this->callAction(self::$routes[$method][$path]);
            return;
        }

        foreach (self::$routes[$method] as $route => $handler) {
            $pattern = $this->convertToRegex($route);
            if (preg_match($pattern, $path, $matches)) {
                $params = array_slice($matches, 1); 
                $this->callAction($handler, $params);
                return;
            }
        }

        $this->get404();
    }

    private function callAction(array $handler, array $params = []): void
    {
        [$controller, $action] = $handler;
        $controllerPath = "app/controllers/{$controller}.php";

        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $controller = "App\\controllers\\{$controller}";

            if (class_exists($controller)) {
                $controllerInstance = new $controller();

                if (method_exists($controllerInstance, $action)) {
                    $controllerInstance->$action(...$params);
                    return;
                }
            }
        }

        $this->get404();
    }

    private function convertToRegex(string $route): string
    {
        return '#^' . preg_replace('/\{(\w+)\}/', '(\d+)', $route) . '$#';
    }

    public function get404(): void
    {
        require_once 'app/views/404.php';
    }
}