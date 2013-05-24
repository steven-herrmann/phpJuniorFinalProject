<?php
namespace JProjFinal\Controllers;
use JProjFinal\Includes\Views;

class Employees
{
    function index ()
    {
        Views::render('employees/list');
    }

    function add ()
    {
        Views::render('employees/add');
    }

    function _404 ()
    {
        Views::render('404');
    }
}
?>