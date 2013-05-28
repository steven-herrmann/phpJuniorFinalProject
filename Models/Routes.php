<?php
namespace JProjFinal\Models;
use JProjFinal\Includes\Cache;

class Routes
{
    static function getRoutes ()
    {
        if (Cache::has('allRoutes'))
            return Cache::get('allRoutes');

        $routes = \dibi::fetchAll('SELECT * FROM `route`');
        Cache::store('allRoutes', $routes);

        return $routes;
    }
}

?>