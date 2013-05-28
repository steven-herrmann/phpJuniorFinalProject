<?php use JProjFinal\Includes\Views; ?>

<?php Views::renderPart('template/header'); ?>


<h1>Re: Add Employee</h1>

<?php
if (isset($_POST))
{    
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
    
    //Position
    if(!isset($_POST['position']))
        $errors['position'][] = "Position is a required field";
    else
        $position = $_POST['position'];
    
    //Salary
    if(!isset($_POST['salary']))
        $errors['salary'][] = "Salary is a required field";
    else
    {
        $salary = $_POST['salary'];
        $replaceArr = array("$",",");
        $salary = str_replace();
    }
}

$posArr = array(
    "Manager",
    "Driver",
    "Retriever",
    "Clerk",
    "Cashier",
    "Sorter"
    );
// Get routes
?>


<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <input type="hidden" name="_nonce" value="<?php \NoCSRF::generate('addEmployee'); ?>" />

    <label class="form-required">Firstname:
    <input type="text" class="first-name" name="first-name" required />
    </label>

    <label class="form-required">Lastname:
    <input type="text" class="last-name" name="last-name" required />
    </label>

    <label class="form-required">Position:
        <select name="position" class="posiiton">
            <?php if (count($posArr) > 0) : ?>
                <?php for($i; $i < count($posArr); $i++):?>
                    <option value="<?php echo $posArr[$i]; ?>"><?php htmlspecialchars($posArr[$i]); ?></option>
                <?php endfor; ?>
            <?php else: ?>
                <option>No positions to choose from.</option>
            <?php endif; ?>
        </select>
    </label>
    
    <label class="form-required">Salary:
        <input type="text" class="salary" name="salary" required/>
    </label>
    
    <label>Manager:
        <input type="text" class="manager" name="manager" />
    </label>
    
    <input name="submit" class="button form-button" type="submit" value="Submit" />
    <input name="reset" class="button form-button" type="reset" value="Clear" />
</form>

<?php
$result = dibi::fetchAll('SELECT *, manager.FirstName as ManagerFirstName, manager.LastName as ManagerLastName FROM employee RIGHT JOIN employee as manager ON manager.ID = employee.ManagerID');
?>

<?php Views::renderPart('template/footer'); ?>
