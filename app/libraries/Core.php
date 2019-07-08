<?php
/*
 *  App Core Class
 *  Creates URL & loads Core Controller
 *  URL FORMAT - /controller/method/params
 */

class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
//        print_r($this->getUrl());
        $url = $this->getUrl();

        // Look in controllers for first value
        if(file_exists('../app/controllers/'. ucwords($url[0]). '.php')){
            // If exists, set as controller
            $this->currentController = ucwords($url[0]);
        }
    }

    public function getUrl(){
//        echo $_GET['url'];
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}