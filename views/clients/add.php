<?php use JProjFinal\Includes\Views; ?>

<?php Views::renderPart('template/header'); ?>


<h1>Re: Add Client</h1>


<?php av($errorMsgs, 'form'); ?>
<form class="form" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
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