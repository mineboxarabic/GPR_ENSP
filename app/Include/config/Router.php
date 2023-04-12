<?php

class Router{
    
        private $routes = [];
    //http://localhost/GPR_ENSP/public/Controller/method/params
    public function get($url, $view){
        $this->routes['GET'][$url] = $view;
    }
    public function post($url, $view){
        $this->routes['POST'][$url] = $view;
    }

    public function resolve(){
        $url = $this->parseUrl();
        $method = $_SERVER['REQUEST_METHOD'];
        $view = $this->routes[$method][$url] ?? false;
        if($view){
            $view = explode('@', $view);
            $this->callAction(...$view);
        }else{
            echo "Page not found";
        }
    }

    protected function callAction($controller, $action){
        $controller = "App\\Controllers\\$controller";
        $controller = new $controller;
        if(!method_exists($controller, $action)){
            echo "Method $action not found";
            return;
        }
        $controller->$action();
    }

    protected function parseUrl(){
        if(isset($_GET['url'])){
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

    

}