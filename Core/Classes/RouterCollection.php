<?php

namespace Core\Classes;

class RouterCollection {

    public static function get($uri, $action)
    {
        self::setRoute(self::prepare($uri, $action), 'GET');
    }

    public static function post($uri, $action)
    {

    }

    public static function put($uri, $action)
    {

    }

    public static function delete($uri, $action)
    {

    }

    private function prepare($uri, $action)
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