<?php

function autoLoad($strClass) // autoloader voor classes
{
    require_once('../classes/'. $strClass .'.php');
}
spl_autoload_register('autoLoad');