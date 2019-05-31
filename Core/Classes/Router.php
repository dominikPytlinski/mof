<?php

namespace Core\Classes;

class Router {

    protected $actions;

    function __construct()
    {
        $this->setRoute($this->getUrl(), $RC = new RouterCollection());
    }

    public function get($uri, $action)
    {
        self::addRoute('GET', $uri, $action);
    }

    public function post($uri, $action)
    {
        self::addRoute('POST', $uri, $action);
    }

    public function put($uri, $action)
    {
        self::addRoute('PUT', $uri, $action);
    }

    public function delete($uri, $action)
    {
        self::addRoute('DELETE', $uri, $action);
    }

    protected function addRoute($method, $uri, $action)
    {
        $action = explode('@', $action);
        $actions['controller'] = substr(reset($action), 0, -10);
        $actions['action'] = end($action);

        $RC = new RouterCollection();
        $RC->add($method, $uri, $actions);
    }

    protected function getUrl()
    {
        return (empty($_REQUEST['url'])) ? null : explode('/', $_REQUEST['url']);
    }

    protected function setRoute($url, $RC)
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        
        switch ($requestMethod) {
            case 'GET':
                $data = $RC->match($url, 'GET');
                //var_dump($data);
                (!$data) ? http_response_code(404) : $this->loadControllerAndAction($data);
                break;
            
            case 'POST':
                echo 'post';
                break;
        }
    }

    protected function loadControllerAndAction($data)
    {
        print_r($data);
    }

}