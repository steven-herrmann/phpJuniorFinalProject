<?php
namespace JProjFinal\Controllers;
use JProjFinal\Includes\Views;
use JProjFinal\Models\Routes;

class Clients
{
    function index ()
    {
        Views::render('clients/list');
    }

    function add ()
    {

        if (isset($_POST['submit']))
        {
            $insertResult = $this->insert();

            if ($insertResult === true)
                flashMessage('clients/add', 'Client Added.');
        }
        else
            $insertResult = array();

        Views::render('clients/add', array('errorMsgs'=>$insertResult, 'routes'=>Routes::getRoutes()));
    }

    private function insert ()
    {
        $errorMessages = array();

        $errors = array();

        // CSRF
        if (!\NoCSRF::check('addclient_nonce', $_POST, false, 60 * 10, false, true))
            $errors['form'][] = 'Error submitting, please try again.';

        // Firstname
        $firstname = null;
        if (!isset($_POST['firstname']))
            $errors['firstname'][] = 'Firstname is required.';
        else
        {
            $firstname = $_POST['firstname'];
            if (strlen($firstname) == 0)
                $errors['firstname'][] = 'Firstname cannot be empty.';
            else if (strlen($firstname) > 50)
                $errors['firstname'][] = 'Firstname is too long.';
        }

        // Lastname
        $lastname = null;
        if (!isset($_POST['lastname']))
            $errors['lastname'][] = 'Lastname is required.';
        else
        {
            $lastname = $_POST['lastname'];
            if (strlen($lastname) == 0)
                $errors['lastname'][] = 'Lastname cannot be empty.';
            else if (strlen($lastname) > 50)
                $errors['lastname'][] = 'Lastname is too long.';
        }

        // Address
        $address = null;
        if (!isset($_POST['address']))
            $errors['address'][] = 'Address is required.';
        else
        {
            $address = $_POST['address'];
            if (strlen($address) == 0)
                $errors['address'][] = 'Address cannot be empty.';
            else if (strlen($address) > 50)
                $errors['address'][] = 'Address is too long.';
        }


        // Route
        $route = null;
        if (isset($_POST['route']))
        {
            // If the route actually exists
            foreach (Routes::getRoutes() as $r)
            {
                if ($r->ID == $_POST['route'])
                    $route = $r->ID;
            }
        }


        $errorMsgs = array();
        foreach ($errors as $name => $errorList)
            $errorMsgs[$name] = implode('  ', $errorList);

        if (count($errorMsgs) == 0)
        {
            $items = array('FirstName'=>$firstname, 'LastName'=>$lastname, 'Address'=>$address, 'RouteID'=>$route);
            $result = dibi::query('INSERT INTO client', $items);

            return ($result) ? true : array();
        }
        return $errorMsgs;
    }

    function _404 ()
    {
        Views::render('404');
    }
}
?>