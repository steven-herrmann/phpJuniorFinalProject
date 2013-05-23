<?php
namespace JProjFinal\Includes;
use JProjFinal\Configuration;

class Controllers
{
    private static $controller;

    static function route ($path)
    {
        $parts = explode('/', $path);

        $controller = isset($parts[0]) && !empty($parts[0]) ? $parts[0] : Configuration::defaultController;
        $method     = isset($parts[1]) && !empty($parts[0]) ? $parts[1] : 'index';

        if (!self::controllerExists($controller))
            self::runController(Configuration::defaultController, '404');
        
        self::runController($controller, $method);
    }

    static private function controllerExists ($controller)
    {
        return file_exists(CONTROLLER_PATH . '/' . $controller . '.php');
    }

    static private function runController ($controller, $method="index")
    {
        $controllerClassName = "\\JProjFinal\\Controllers\\" . $controller;

        $controller = new $controllerClassName;
        $controller->$method();

        exit;
    }
}