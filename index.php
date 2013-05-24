<?php
namespace JProjFinal;
use \JProjFinal\Includes\Views;
use \JProjFinal\Includes\Controllers;

session_start();
ob_start();
error_reporting(E_ALL);

require 'autoloader.php';
require 'pluggable.php';

// Get path in url

$path = trim(str_replace(SITE_PATH . '/', '', $_SERVER['REQUEST_URI']), '/');


// Remove query string
$queryStart = strpos($path, '?');
if ($queryStart !== false)
    $path = substr($path, 0, $queryStart);


Controllers::route($path);

ob_end_clean();