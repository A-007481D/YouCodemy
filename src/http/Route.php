<?php
namespace src\http;

class Route
{
    protected static array $routes = [];


    public static function get($route,$controller, $action): void {
        self::$routes['get'][$route] = [$controller,$action];
    }

    public static function post($route,$controller, $action): void{
        self::$routes['post'][$route] = [$controller,$action];
    }
    public function resolve($requestUri, $requestMethod):void
    {
        $path = parse_url($requestUri, PHP_URL_PATH);
        $method = strtolower($requestMethod);


        if (isset(self::$routes[$method][$path])) {

            $route = self::$routes[$method][$path];
            $controller = $route[0];
            $action = $route[1];

            $controllerPath = "app/controllers/{$controller}.php";

            if (file_exists($controllerPath)) {
                require_once $controllerPath;
                $controller = "App\\controllers\\{$controller}";

                if (class_exists($controller)) {
                    $controllerInstance = new $controller();

                    if (method_exists($controllerInstance, $action)) {
                        $controllerInstance->$action();
                        return;
                    }
                }
            }
        }
            $this->get404();
//        require_once 'app/views/404.php';
    }

    public function get404():void {
        require_once 'app/views/404.php';
    }




}