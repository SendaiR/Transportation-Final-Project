<?php

class App {
    protected $controller = 'VehicleController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        // Controller
        if (isset($url[0])) {
            $controllerName = ucfirst($url[0]) . 'Controller';
            if (file_exists('../app/Controller/' . $controllerName . '.php')) {
                $this->controller = $controllerName;
                unset($url[0]);
            } else {
                // Jika file controller tidak ditemukan, arahkan ke halaman error 404
                header("HTTP/1.0 404 Not Found");
                die('404 Not Found: Controller not found.');
            }
        }

        require_once '../app/Controller/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            } else {
                // Jika method tidak ditemukan, arahkan ke halaman error 404
                header("HTTP/1.0 404 Not Found");
                die('404 Not Found: Method not found.');
            }
        }

        // Parameters
        $this->params = $url ? array_values($url) : [];

        // Panggil method dari controller dengan parameter jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
