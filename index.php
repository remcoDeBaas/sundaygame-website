<?php

/* $config = require_once 'config.php';

function autoLoad($strClass) // autoloader voor classes
{
    require_once('classes/'. $strClass .'.php');
}
spl_autoload_register('autoLoad');

$database = new Database();

$database::connect($config['database']); */

// header('Location: pages/home/index.php');

$routes = [

    '' => 'controllers/home.php',

    'login' => 'controllers/login.php'

];