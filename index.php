<?php

require_once 'includes/autoloader.php';

spl_autoload_register('autoLoad');

$database = new Database();