<?php

/**
 * THIS IS AN AUTOLOADER FILE TEMPLATE
 */

function controllers_autoload($class)
{
    include 'controllers/' . $class . '.php';
}

spl_autoload_register('controllers_autoload');
