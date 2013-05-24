<?php use JProjFinal\Includes\Views; ?>

<?php Views::renderPart('template/header'); ?>


<h1>Re: Add Employee</h1>

<?php
if (isset($_POST))
{
    // Address
    // Route
    
    $errors = array();

    // Firstname
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
    
    //Route
    if(!isset($_POST['route']))
        $errors['route'][] = 'Route is required';
    
    $arr = array(
        'id' => 'null' ,
        'FirstName' => $firstname,
        'LastName' => $lastname,
        'Address' => $address,
        'Route' => $route
    )
    
    dibi::query("INSERT INTO employee", )
}

// Get routes
$routes = dibi::fetchAll('SELECT * FROM route');
?>


<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <input type="hidden" name="_nonce" value="<?php \NoCSRF::generate('addClient'); ?>" />

    <label class="form-required">Firstname:
    <input type="text" class="first-name" name="first-name" required />
    </label>

    <label class="form-required">Lastname:
    <input type="text" class="last-name" name="last-name" required />
    </label>

    <label class="form-required">Address:
    <input type="text" class="address" name="address" required />
    </label>

    <label class="form-required">Route:
        <select name="route" class="route">
            <?php if (count($routes) > 0) : ?>
                <?php foreach ($routes as $route) : ?>
                    <option value="<?php echo $route->ID; ?>"><?php htmlspecialchars($route->RouteName); ?></option>
                <?php endforeach; ?>
            <?php else: ?>
                <option>No Routes to choose from.</option>
            <?php endif; ?>
        </select>
    </label>


    <input name="submit" class="button form-button" type="submit" value="Submit" />
    <input name="reset" class="button form-button" type="reset" value="Clear" />
</form>

<?php
$result = dibi::fetchAll('SELECT *, manager.FirstName as ManagerFirstName, manager.LastName as ManagerLastName FROM employee RIGHT JOIN employee as manager ON manager.ID = employee.ManagerID');
?>

<?php Views::renderPart('template/footer'); ?>
