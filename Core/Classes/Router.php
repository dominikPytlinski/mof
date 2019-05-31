<?php

namespace Core\Classes;

class Router {

    protected $actions;

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

}