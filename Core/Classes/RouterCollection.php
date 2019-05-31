<?php

namespace Core\Classes;

class RouterCollection {

    public function add($method, $uri, $actions)
    {
       $route = [
           'method' => $method,
           'uri'    => $uri,
           'action' => $actions
       ];
       array_push($GLOBALS['routes'], $route);
    }

}