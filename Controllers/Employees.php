<?php
namespace JProjFinal\Controllers;
use JProjFinal\Includes\Views;

class Employees
{
    function index ()
    {
        Views::render('employees');
    }
}
?>