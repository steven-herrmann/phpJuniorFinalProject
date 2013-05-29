<?php use JProjFinal\Includes\Views; ?>

<?php Views::renderPart('template/header'); ?>


<h1>Re: Employees</h1>
<p><a href="<?php siteUrl('payments/add'); ?>">Add new payment</a></p>

<table>
    <tr>
        <th>Client</th>
        <th>Type</th>
        <th>Stripe</th>
        <th>Added</th>
    </tr>
<?php
$result = dibi::fetchAll('SELECT * FROM payment LEFT JOIN client ON payment.ClientID = client.ID');

foreach ($result as $row)
{
    ?>
    <tr>
        <td><?php echo $row->FirstName . ' ' . $row->LastName; ?></td>
        <td><?php echo $row->Type; ?></td>
        <td><a href="javascript:alert('Would have opened client ID <?php echo $row->StripeClientID; ?> in Stripe');">Open in Stripe</a></td>
        <td><?php echo $row->DateAdded; ?></td>
    </tr>
    <?php
}
?>
</table>

<?php Views::renderPart('template/footer'); ?>