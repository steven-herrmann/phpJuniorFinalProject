<?php use JProjFinal\Includes\Views; ?>

<?php Views::renderPart('template/header'); ?>


<h1>Re: Add Client</h1>

<?php
// Get routes
$routes = dibi::fetchAll('SELECT * FROM route');


$errorMessages = array();
if (isset($_POST['submit']))
{    
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
        foreach ($routes as $r)
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
        if ($result)
        {
            echo 'Client Added.';
            flashMessage('clients/add', 'Client Added.');
        }
        else
            echo 'Error adding client.';
    }
}

?>

<?php av($errorMsgs, 'form'); ?>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
    <input type="hidden" name="addclient_nonce" value="<?php echo \NoCSRF::generate('addclient_nonce'); ?>" />

    <label class="form-required">Firstname:
    <input type="text" class="first-name" name="firstname" value="<?php av($_POST, 'firstname'); ?>" required />
    </label>
    <?php if (($msg = av($errorMsgs, 'firstname', false, false)) !== false) : ?>
        <p><?php echo htmlspecialchars($msg); ?>
    <?php endif; ?>

    <label class="form-required">Lastname:
    <input type="text" class="last-name" name="lastname" value="<?php av($_POST, 'lastname'); ?>" required />
    </label>
    <?php if (($msg = av($errorMsgs, 'lastname', false, false)) !== false) : ?>
        <p><?php echo htmlspecialchars($msg); ?>
    <?php endif; ?>

    <label class="form-required">Address:
    <input type="text" class="address" name="address" value="<?php av($_POST, 'address'); ?>" required />
    </label>
    <?php if (($msg = av($errorMsgs, 'address', false, false)) !== false) : ?>
        <p><?php echo htmlspecialchars($msg); ?>
    <?php endif; ?>

    <label>Route:
        <select name="route" class="route">
            <?php if (count($routes) > 0) : ?>
                <?php foreach ($routes as $route) : ?>
                    <?php $selected = av($_POST, 'route', '', false) == $route->ID ? ' selected':''; ?>
                    <option value="<?php echo $route->ID; ?>"<?php echo $selected; ?>><?php htmlspecialchars($route->RouteName); ?></option>
                <?php endforeach; ?>
            <?php else: ?>
                <option>No Routes to choose from.</option>
            <?php endif; ?>
        </select>
    </label>
    <?php if (($msg = av($errorMsgs, 'route', false, false)) !== false) : ?>
        <p><?php echo htmlspecialchars($msg); ?>
    <?php endif; ?>


    <input name="submit" class="button form-button" type="submit" value="Submit" />
    <input name="reset" class="button form-button" type="reset" value="Clear" />
</form>

<?php Views::renderPart('template/footer'); ?>