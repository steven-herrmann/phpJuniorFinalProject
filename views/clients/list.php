<?php use JProjFinal\Includes\Views; ?>

<?php Views::renderPart('template/header'); ?>


<h1>Re: Clients</h1>
<p><a href="<?php siteUrl('clients/add'); ?>">Add new client</a></p>

<table>
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Route</th>
    </tr>
<?php

$result = dibi::fetchAll('SELECT * FROM `client` LEFT JOIN `route` ON client.routeID = route.ID');

foreach ($result as $row)
{
    ?>
    <tr>
        <td><?php echo $row->FirstName . ' ' . $row->LastName; ?></td>
        <td><?php echo $row->Address; ?></td>
        <?php if ($row->RouteName !== null) : ?>
            <td><?php echo $row->RouteName; ?></td>
        <?php else: ?>
            <td>No Route Assigned</td>
        <?php endif; ?>
    </tr>
    <?php
}
?>
</table>

<?php Views::renderPart('template/footer'); ?>