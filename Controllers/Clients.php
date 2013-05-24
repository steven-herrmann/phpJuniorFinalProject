<?php
namespace JProjFinal\Controllers;
use JProjFinal\Includes\Views;

class Clients
{
    function index ()
    {
        Views::render('clients/list');
    }

    function add ()
    {
        Views::render('clients/add');
    }

    function _404 ()
    {
        Views::render('404');
    }
}
?>