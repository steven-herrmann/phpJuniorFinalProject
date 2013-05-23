<?php use JProjFinal\Includes\Views; ?>

<?php Views::renderPart('template/header'); ?>


<h1>Re: Administrate</h1>
<p>Use these tools to do things!</p>

<?php
$row = dibi::fetch('SELECT * FROM client');
var_dump($row);
?>

<?php Views::renderPart('template/footer'); ?>