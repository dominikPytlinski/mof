<?php

namespace Core\Classes;

class RouterCollection {

    public static function get($uri, $action)
    {
        self::setRoute(self::prepareGet($uri, $action), 'GET');
    }

    public static function post($uri, $action)
    {
        self::setRoute(self::preaprePost($uri, $action), 'POST');
    }

    public static function put($uri, $action)
    {

    }

    public static function delete($uri, $action)
    {

    }

    private static function preaprePost($uri, $action)
    {
        $url = explode('/', $uri);
        $actionControllerArray = explode('@', $action);
        $controller = $actionControllerArray[0];
        $action = $actionControllerArray[1];

        if((count($url) == 3 || count($url) == 2) && (strpos($uri, '{') === false && strpos($uri, '}') === false && !empty(end($url)))) {
            return [
                'uri'        => $uri,
                'controller' => $controller,
                'action'     => $action,
                'params'     => 0
            ];
        } else {
            return false;
        }
    }

    private static function prepareGet($uri, $action)
    {
        $url = explode('/', $uri);
        $actionControllerArray = explode('@', $action);
        $controller = $actionControllerArray[0];
        $action = $actionControllerArray[1];

        if (count($url) > 3 && strpos(end($url), '{') === false && strpos(end($url), '}') === false) {
            return [
                'uri'        => $uri,
                'controller' => $controller,
                'action'     => $action,
                'params'     => count($url) - 3
            ];
        } elseif (count($url) == 3 && strpos(end($url), '{') === false && strpos(end($url), '}') === false) {
            return [
                'uri'        => $uri,
                'controller' => $controller,
                'action'     => $action,
                'params'     => 0
            ];
        } elseif (count($url) == 3 && strpos(end($url), '{') !== false && strpos(end($url), '}') !== false) {
            return [
                'uri'        => $uri,
                'controller' => $controller,
                'action'     => $action,
                'params'     => 1
            ];
        } elseif (count($url) == 2 && (empty(end($url)) || (strpos(end($url), '{') === false && strpos(end($url), '}') === false) )) {
            return [
                'uri'        => $uri,
                'controller' => $controller,
                'action'     => $action,
                'params'     => 0
            ];
        } else {
            return false;
        }
    }

    private static function setRoute($data, $method)
    {
        if ($data != false) {
            array_push($GLOBALS['routes'], [
                'uri'        => $data['uri'],
                'controller' => $data['controller'],
                'action'     => $data['action'],
                'params'     => $data['params'],
                'method'     => $method
            ]);
        }
    }

}