<?php use JProjFinal\Includes\Views; ?>

<?php Views::renderPart('template/header'); ?>


<h1>Re: Add Routes</h1>


<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_INI']); ?>" method="post">
    <input type="hidden" name="addRoute_nonce" value="<?php \NoCSRF::generate('addRoute_nonce'); ?>" />

    <label class="form-required">Route Name
    <input type="text" class="route-name" name="route-name" required />
    </label>
    
      <select name="truck" class="form-required">
        <?php 
          /* Query may be incorrect */
          $result = dibi::fetchAll('SELECT id FROM truck');
          foreach($result as $row):
        ?>
           <option value = "<?php echo htmlspecialchars($row);?>"> <?php echo htmlspecialchars($row);?></option>
        <?php endforeach; ?>
      </select>
    
    <input name="submit" class="button form-button" type="submit" value="Submit" />
    <input name="reset" class="button form-button" type="reset" value="Clear" />
</form>

<?php
$result = dibi::fetchAll('SELECT * route','');
?>

<?php Views::renderPart('template/footer'); ?>
