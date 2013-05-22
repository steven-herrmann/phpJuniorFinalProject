<?php
namespace JProjFinal;
use \JProjFinal\Includes\Views;

require 'autoloader.php';

// Get path in url
$scriptPath = trim(preg_replace('/index\.[a-z]+/i', '', $_SERVER['SCRIPT_NAME']), '/');

$path = trim(str_replace("$scriptPath/", '', $_SERVER['REQUEST_URI']), '/');

if (empty($path))
    Views::render('index');

if (!preg_match('/^[a-z\/]+$/', $includePath))
    Views::render('404');

if (!Views::exists($path))
    Views::render($path);
else
    Views::render('404');