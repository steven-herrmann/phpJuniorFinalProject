<?php use JProjFinal\Includes\Views; ?>

<?php Views::renderPart('template/header'); ?>


<h1>Re: Add Employee</h1>

<?php
if (isset($_POST))
{
    // Firstname
    // Lastname
    // Address
    // Route
}

// Get routes
$routes = dibi::fetchAll('SELECT * FROM route');
?>


<?php
$result = dibi::fetchAll('SELECT *, manager.FirstName as ManagerFirstName, manager.LastName as ManagerLastName FROM employee RIGHT JOIN employee as manager ON manager.ID = employee.ManagerID');
?>

<?php Views::renderPart('template/footer'); ?>