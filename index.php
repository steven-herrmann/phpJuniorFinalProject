<?php
namespace JProjFinal;
use \JProjFinal\Includes\Views;
use \JProjFinal\Includes\Controllers;

error_reporting(E_ALL);

require 'autoloader.php';
require 'pluggable.php';

// Get path in url
$scriptPath = trim(preg_replace('/index\.[a-z]+/i', '', $_SERVER['SCRIPT_NAME']), '/');

$path = trim(str_replace("$scriptPath/", '', $_SERVER['REQUEST_URI']), '/');

// Remove query string
$queryStart = strpos($path, '?');
if ($queryStart !== false)
    $path = substr($path, 0, $queryStart);


Controllers::route($path);