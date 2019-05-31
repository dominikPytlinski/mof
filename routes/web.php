<?php

use Core\Classes\Router;

Router::get('/', 'HomeController@index');

Router::get('/index', 'HomeController@dupa');

Router::get('/index/{index}', 'HomeController@show');

Router::get('/index/{index}/index', 'HomeController@edit');