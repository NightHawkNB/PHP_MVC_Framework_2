<?php

class Core {

    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->getURL();

        if(file_exists('../app/controllers/'.ucfirst($url[0]).'.php')) {
            $this->currentController = ucfirst($url[0]);
            unset($url[0]);

            require_once '../app/controllers/'.$this->currentController.'.php' ;
            $this->currentController = new $this->currentController;

            if(isset($url[1])) {
                if(method_exists($this->currentController, strtolower($url[1]))) {
                    $this->currentMethod = strtolower($url[1]);
                    unset($url[1]);
                }
            }

            $this->params = $url ? array_values($url) : [];

            call_user_func([$this->currentController, $this->currentMethod], $this->params);
        }
    }

    public function getURL() {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
    }

}