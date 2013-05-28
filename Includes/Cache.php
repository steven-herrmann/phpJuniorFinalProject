<?php
namespace JProjFinal\Includes;

class Cache
{
    private static $cache = array();

    static function has ($name)
    {
        return array_key_exists($name, self::$cache);
    }

    static function get ($name, &$found=null)
    {
        if (!self::has($name))
        {
            $found = false;
            return;
        }
        return self::$cache[$name];
    }
    static function store ($name, $value)
    {
        self::$cache[$name] = $value;
    }

    static function add ($name, $value)
    {
        if (self::has($name))
            return false;

        self::$cache[$name] = $value;
        return true;
    }
}