<?php

/**
 * 
 * Require files defined in provider file
 * 
 */

/**
 * 
 * Require provider file
 * 
 */
require $GLOBALS['path']['core'].'Providers/app.provider.php';

/**
 * 
 * Loop trough providers array
 * Require files
 * 
 */
foreach($providers as $key => $value) {
    if($key == 'route') {
        require 'routes/'.$value.'.php';
    } else {
        require $GLOBALS['path']['core'].'Classes/'.$value.'.php';
    }
}