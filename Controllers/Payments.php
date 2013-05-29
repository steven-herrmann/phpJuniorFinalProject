<?php
namespace JProjFinal\Controllers;
use JProjFinal\Includes\Views;
use JProjFinal\Models\Routes;

class Payments
{
    private $paymentTypes = array('Debt','Credit','Cash','Check');
    function index ()
    {
        Views::render('payments/list', array('paymentTypes'=>$this->paymentTypes));
    }

    function add ()
    {
        Views::render('payments/add');
    }
}