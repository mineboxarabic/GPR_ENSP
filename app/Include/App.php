<?php 

$GLOBALS['__DIR__'] = '/GPR_ENSP/public';
class App {

    protected $controller = '';
    protected $method = '';
    protected $params = [];

    protected $routes = [
            'home' => ['controller' => 'Home', 'method' => 'index'],
            'userFile' => ['controller' => 'UserC', 'method' => 'showProfile'],
    ];
    public function __construct() {
        $url = $this->parseUrl();



        if (isset($this->routes[$url[0]])) {
            $this->controller = $this->routes[$url[0]]['controller'];
            $this->method = $this->routes[$url[0]]['method'];
           // $this->params = $this->routes[$url[0]]['params'];

            require_once '../app/Controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;

            unset($url[0]);
            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->controller, $this->method], $this->params);
        } else
        {
            if (file_exists('../app/Controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }
    
    
            require_once '../app/Controllers/' . $this->controller . '.php';
            
            
    
            $this->controller = new $this->controller;
    
    
    
    
            if (isset($url[1])) {
                if (method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }
    
    
    
    
            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->controller, $this->method], $this->params);
        }

        
    }

    public function parseUrl() {
        
        if (isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}