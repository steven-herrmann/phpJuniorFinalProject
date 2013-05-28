<?php
namespace JProjFinal\Models;
use JProjFinal\Includes\Cache;

class Employees
{
    static function getAll ()
    {
        if (Cache::has('allEmployees'))
            return Cache::get('allEmployees');

        $employees = \dibi::fetchAll('SELECT * FROM `employee`');
        Cache::store('allEmployees', $employees);

        return $employees;
    }
}

?>