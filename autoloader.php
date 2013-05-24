<?php
namespace JProjFinal;

require 'constants.php';

// Load composer autoloader
if (!file_exists('vendor/autoload.php'))
    die ('Composer has not been installed');
require 'vendor/autoload.php';

spl_autoload_register("\JProjFinal\autoloader");

function autoloader ($fullPath)
{
    $nsl = strlen(__NAMESPACE__);
    $classPath = trim(substr($fullPath, $nsl), '\\');
    $classPath = ucfirst($classPath);

    if (substr($fullPath, 0, $nsl) != __NAMESPACE__) return;

    $parts = explode('\\', $classPath);
    array_walk($parts, function ($val) { return ucfirst($val); });
    $path = implode('/', $parts) . '.php';

    require ABSPATH . '/' . $path;
}

// Load global items
require 'Includes/connect.php';