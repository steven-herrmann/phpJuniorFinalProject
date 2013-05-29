<?php use JProjFinal\Includes\Views; ?>

<?php Views::renderPart('template/header'); ?>

<h1>Re: Add Truck</h1>

<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
    <input type="hidden" name="addTruck_nonce" value="<?php echo \NoCSRF::generate('addTruck_nonce'); ?>" />

    <label class="form-required">Model:
    <input type="text" class="model" name="model" required/>
    </label>
    
    <label class="form-required">License:
    <input type="text" class="license" name="license" required/>
    </label>
    
    <label class="form-required">VIN:
    <input type="text" class="vin" name="vin" required/>
    </label>
    
    <label class="form-required">Date Purchased:
    <input type="text" class="date" name="date" required/>
    </label>
    
    <input name="submit" class="button form-button" type="submit" value="Submit" />
    <input name="reset" class="button form-button" type="reset" value="Clear" />
</form>

<?php Views::renderPart('template/footer'); ?>
