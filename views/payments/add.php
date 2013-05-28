<?php use JProjFinal\Includes\Views; ?>

<?php Views::renderPart('template/header'); ?>

<?php 
/* FOR VALIDATION*/


$paymentTypes = array('Debt','Credit','Cash','Check');
?>

<h1>Re: Add Payment</h1>


<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <input type="hidden" name="_nonce" value="<?php \NoCSRF::generate('addPayment'); ?>" />

    <label class="form-required">Type:
    <select name="paymentType" required>
      <?php for($i; $i < count($paymentTypes); $i++): ?>
        <option value="<?php echo $paymentTypes[$i];?>"><?php echo $paymentTypes[$i];?></option>
      <?php endfor;?>
    </select>
    </label>
    
    <label>Card Number:
    <input type="text" class="cardNumber" name="cardNumber"/>
    </label>
    
    <label class="form-required">Client:
    <input type="text" class="client" name="client" required/>
    </label>
    
    <input name="submit" class="button form-button" type="submit" value="Submit" />
    <input name="reset" class="button form-button" type="reset" value="Clear" />
</form>

<?php
$result = dibi::fetchAll('SELECT * payment','');
?>

<?php Views::renderPart('template/footer'); ?>
