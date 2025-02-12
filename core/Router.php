<?php 
// Dynamically maps URLs to controllers and actions

class Router {
    private $routes = [];

    //Define a Get route
    public function get($route ,$controllerAction){
        $this->routes['GET'][$this->normalize($route)] = $controllerAction;
    }

    // Handles requests
    public function dispatch($uri){
        $uri= $this->normalize($uri);
        $method =$_SERVER['REQUEST_METHOD'];

        foreach ($this->routes[$method] as $route => $controllerAction){
            $pattern = preg_replace('/\{(\w+)\}/', '(\w+)', $route);
            if (preg_match("#^$pattern$#", $uri, $matches)){
                array_shift($matches);
                list($controller, $action) = explode('@',$controllerAction);
                require_once "../app/controllers/$controller.php";
                $controllerInstance = new $controller();
                call_user_func_array([$controllerInstance, $action], $matches);
                return;
            }
        }
        http_response_code(404);
        echo "404 Not Found";



    }
    // Normalise the URL (remove query strings)
    private function normalize($uri){
        return strtok($uri, '?');
    }
}