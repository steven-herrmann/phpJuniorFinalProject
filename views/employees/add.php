<?php use JProjFinal\Includes\Views; ?>

<?php Views::renderPart('template/header'); ?>


<h1>Re: Add Employee</h1>


<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <input type="hidden" name="_nonce" value="<?php \NoCSRF::generate('addEmployee'); ?>" />

    <label class="form-required">Firstname:
    <input type="text" class="first-name" name="first-name" required />
    </label>
    <?php if (($msg = av($errorMsgs, 'firstname', false, false)) !== false) : ?>
        <p><?php echo htmlspecialchars($msg); ?></p>
    <?php endif;?>

    <label class="form-required">Lastname:
    <input type="text" class="last-name" name="last-name" required />
    </label>
    <?php if(($msg = av($errorMsgs, 'lastname',false,false))!== false) : ?>
        <p><?php echo htmlspecialchars?></p>

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
    
    <label>Passenger:
        <input type="text" class="passenger" name="passenger"/>
    </label>
    
    <input name="submit" class="button form-button" type="submit" value="Submit" />
    <input name="reset" class="button form-button" type="reset" value="Clear" />
</form>

<?php
$result = dibi::fetchAll('SELECT *, manager.FirstName as ManagerFirstName, manager.LastName as ManagerLastName FROM employee RIGHT JOIN employee as manager ON manager.ID = employee.ManagerID');
?>

<?php Views::renderPart('template/footer'); ?>
