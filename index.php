<?php
namespace JProjFinal;
use \JProjFinal\Includes\Views;

require 'autoloader.php';

// Get path in url
$scriptPath = trim(preg_replace('/index\.[a-z]+/i', '', $_SERVER['SCRIPT_NAME']), '/');

$path = trim(str_replace("$scriptPath/", '', $_SERVER['REQUEST_URI']), '/');

// Remove query string
$queryStart = strpos($path, '?');
if ($queryStart !== false)
    $path = substr($path, 0, $queryStart);

// Simple routing
if (empty($path))
    Views::render('index');

if (!preg_match('/^[a-z\/]+$/i', $path))
    Views::render('404');

if (!Views::exists($path))
    Views::render($path);
else
    Views::render('404');