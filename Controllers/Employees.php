<?php
namespace JProjFinal\Controllers;
use JProjFinal\Includes\Views;
use JProjFinal\Models\Employees as EmployeesModel;

class Employees
{
    private $positions = array('Janitor','Salesman', 'Manager', 'CEO');

    function index ()
    {
        Views::render('employees/list');
    }

    function add ()
    {
        if (isset($_POST['submit']))
        {
            $insertResult = $this->insert();

            if ($insertResult === true)
                flashMessage('employees/add', 'Employee Added.');
        }
        else
            $insertResult = array();

        Views::render('employees/add', array('employees'=>EmployeesModel::getAll(), 'errorMsgs'=>$insertResult, 'positions'=>$this->positions));
    }

    private function insert ()
    {
        $errorMessages = array();

        $errors = array();

        // CSRF
        if (!\NoCSRF::check('addEmployee_nonce', $_POST, false, 60 * 10, false, true))
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

        // Position
        $position = null;
        if (!isset($_POST['position']))
            $errors['position'][] = 'Address is required.';
        else
        {
            $position = $_POST['position'];
            if (!in_array($position, $this->positions))
                $errors['position'][] = 'Invalid position type.';
        }

        // Salary
        $salary = null;
        if (!isset($_POST['salary']))
            $errors['salary'][] = 'Address is required.';
        else
        {
            $salary = $_POST['salary'];
            $salary = ltrim($salary, '$');

            if (!is_numeric($salary))
                $errors['salary'][] = 'Salary must be a number.';
            else if (strlen($salary) == 0)
                $errors['salary'][] = 'Salary cannot be empty.';
        }


        // Manager
        $manager = null;
        if (isset($_POST['manager']))
        {
            // If the route actually exists
            foreach (EmployeesModel::getAll() as $employee)
            {
                if ($employee->ID == $_POST['manager'])
                    $manager = $employee->ID;
            }
        }


        $errorMsgs = array();
        foreach ($errors as $name => $errorList)
            $errorMsgs[$name] = implode('  ', $errorList);

        if (count($errorMsgs) == 0)
        {
            $items = array('FirstName'=>$firstname, 'LastName'=>$lastname, 'Position'=>$position, 'Salary'=>$salary, 'ManagerID'=>$manager);
            $result = \dibi::query('INSERT INTO employee', $items);

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