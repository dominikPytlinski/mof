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

    public function match($url, $method)
    {
        if($url == null) {
            foreach($GLOBALS['routes'] as $route) {
                if(
                    $route['uri'] == '/' && 
                    $route['method'] == 'GET'
                ) {
                    return [
                        'controller'    => $route['action']['controller'],
                        'action'        => $route['action']['action'],
                        'uri'           => $route['uri'],
                        'method'        => $route['method']
                    ];
                }
            }
        } else if(count($url) == 1) {
            foreach($GLOBALS['routes'] as $route) {
                if(
                    $route['uri'] == '/'.reset($url) && 
                    $route['method'] == 'GET'
                ) {
                    return [
                        'controller'    => $route['action']['controller'],
                        'action'        => $route['action']['action'],
                        'uri'           => $route['uri'],
                        'method'        => $route['method']
                    ];
                }
            }
        } else if(count($url) == 2) {
            foreach ($GLOBALS['routes'] as $route) {
                if(
                    $route['uri'] == $this->prepareUri($url) && 
                    $route['method'] == 'GET'
                ) {
                    return [
                        'controller'    => $route['action']['controller'],
                        'action'        => $route['action']['action'],
                        'uri'           => $route['uri'],
                        'method'        => $route['method']
                    ];
                }
            }
        } else if(count($url) > 2) {
            foreach($GLOBALS['routes'] as $route) {
                if(
                    $route['uri'] == $this->prepareUri($url, true) && 
                    $route['method'] == 'GET' && 
                    $route['action']['action'] == end($url)
                ) {
                    return [
                        'controller'    => $route['action']['controller'],
                        'action'        => $route['action']['action'],
                        'uri'           => $route['uri'],
                        'method'        => $route['method']
                    ];
                } else {
                    echo 'dupa';
                }
            }
        }
        return false;
    }

    protected function prepareUri($url, $mtt = false)
    {
        if($mtt) {
            $params = '';
            for($i = 1; $i <= count($url) - 2; $i++) {
                $params .= '/{'.reset($url).'}';
            }
            return '/'.reset($url).$params.'/'.reset($url);
        } else {
            return '/'.reset($url).'/{'.reset($url).'}';
        }
    }

}