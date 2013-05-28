<?php use JProjFinal\Includes\Views; ?>

<?php Views::renderPart('template/header'); ?>


<h1>Re: Add Employee</h1>


<?php av($errorMsgs, 'form'); ?>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
    <input type="hidden" name="addEmployee_nonce" value="<?php echo \NoCSRF::generate('addEmployee_nonce'); ?>" />

    <label class="form-required">Firstname:
    <input type="text" class="firstname" name="firstname" required />
    </label>
    <?php if (($msg = av($errorMsgs, 'firstname', false, false)) !== false) : ?>
        <p><?php echo htmlspecialchars($msg); ?></p>
    <?php endif;?>

    <label class="form-required">Lastname:
    <input type="text" class="lastname" name="lastname" required />
    </label>
    <?php if(($msg = av($errorMsgs, 'lastname', false, false)) !== false) : ?>
        <p><?php echo htmlspecialchars($msg); ?></p>
    <?php endif;?>

    <label class="form-required">Position:
        <select name="position" class="position">
            <?php if (count($positions) > 0) : ?>
                <?php foreach($positions as $position):?>
                    <option value="<?php echo htmlspecialchars($position); ?>"><?php echo htmlspecialchars($position); ?></option>
                <?php endforeach; ?>
            <?php else: ?>
                <option>No positions to choose from.</option>
            <?php endif; ?>
        </select>
    </label>
    <?php if(($msg = av($errorMsgs, 'position', false, false)) !== false) : ?>
        <p><?php echo htmlspecialchars($msg); ?></p>
    <?php endif;?>
    
    <label class="form-required">Salary:
        <input type="text" class="salary" name="salary" required/>
    </label>
    <?php if(($msg = av($errorMsgs, 'salary', false, false)) !== false) : ?>
        <p><?php echo htmlspecialchars($msg); ?></p>
    <?php endif;?>

    <label>Manager:
        <select name="manager">
            <?php if (count($employees) > 0) : ?>
                <?php foreach ($employees as $employee) : ?>
                    <?php $selected = av($_POST, 'employee', '', false) == $employee->ID ? ' selected':''; ?>
                    <option value="<?php echo $employee->ID; ?>"<?php echo $selected; ?>><?php echo htmlspecialchars($employee->FirstName . ' ' . $employee->LastName); ?></option>
                <?php endforeach; ?>
            <?php else: ?>
                <option>No Employees to choose from.</option>
            <?php endif; ?>
        </select>
    </label>
    <?php if(($msg = av($errorMsgs, 'manager', false, false)) !== false) : ?>
        <p><?php echo htmlspecialchars($msg); ?></p>
    <?php endif;?>
    
    <input name="submit" class="button form-button" type="submit" value="Submit" />
    <input name="reset" class="button form-button" type="reset" value="Clear" />
</form>

<?php Views::renderPart('template/footer'); ?>