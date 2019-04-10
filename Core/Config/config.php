<?php

/**
 * 
 * Basic config file
 * 
 * Other configutration in .env:
 * APP_NAME, APP_URL, APP_KEY, DB_HOST, DB_NAME, DB_USER, DB_PASS
 * 
 */

/**
 * 
 * Set GLOBAL path array
 * 
 */
$GLOBALS['path'] = [
    'core'  => 'Core/',
    'app'   => 'App/',
    'autoload'  => 'Core/autoload.php',
    'provider'  => 'Core/Providers/app.provider.php'
];

/**
 * 
 * Define GLOBAL route array
 * Do not fill it
 * 
 */
$GLOBALS['routes'] = [];