<?php

/**
 * 
 * Reaquire and load .env variables
 * 
 */

require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

/**
 * 
 * Include basic config file
 * 
 */
require 'Core/Config/config.php';

/**
 * 
 * Include autoload file
 * 
 */
require $GLOBALS['path']['core'].'autoload.php';