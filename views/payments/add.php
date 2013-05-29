<?php use JProjFinal\Includes\Views; ?>

<?php Views::renderPart('template/header'); ?>

<h1>Re: Add Payment</h1>

<form class="form" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
    <input type="hidden" name="addPayment_nonce" value="<?php echo \NoCSRF::generate('addPayment_nonce'); ?>" />

    <label class="form-required">Type:
        <select name="paymentType" required>
            <?php foreach ($paymentTypes as $type) : ?>
                <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
            <?php endforeach;?>
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

<?php Views::renderPart('template/footer'); ?>
