<?php

/**
 * 
 * Basic config file
 * 
 */

/**
 * 
 * Set GLOBAL database array
 * 
 */
$GLOBALS['database'] = [
    'dbhost'        => '',
    'dbname'        => $_ENV['DB_NAME'],
    'dbuser'        => '',
    'dbpassword'    => ''
];

/**
 * 
 * Set GLOBAL path array
 * 
 */
$GLOBALS['path'] = [
    'core'  => 'Core/',
    'app'   => 'App/'
];

/**
 * 
 * Define GLOBAL route array
 * Do not fill it
 * 
 */
$GLOBALS['routes'] = [];