<?php
namespace JProjFinal;

// Load composer autoloader
if (!file_exists('vendor/autoload.php'))
    die ('Composer has not been installed');
require 'vendor/autoload.php';

spl_autoload_register("\JProjFinal\autoloader");

function autoloader ($fullPath)
{
    $nsl = strlen(__NAMESPACE__);
    $classPath = trim(substr($fullPath, $nsl), '\\');

    if (substr($fullPath, 0, $nsl) != __NAMESPACE__) return;

    $parts = explode('\\', $classPath);
    $path = implode('/', $parts) . '.php';

    require $path;
}

// Load global items
require 'Includes/connect.php';
require 'constants.php';