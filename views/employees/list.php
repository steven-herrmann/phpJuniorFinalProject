<?php use JProjFinal\Includes\Views; ?>

<?php Views::renderPart('template/header'); ?>


<h1>Re: Employees</h1>
<p><a href="<?php siteUrl('employees/add'); ?>">Add new employee</a></p>

<table>
    <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Salary</th>
        <th>Manager</th>
    </tr>
<?php
$result = dibi::fetchAll('SELECT *, manager.FirstName as ManagerFirstName, manager.LastName as ManagerLastName FROM employee RIGHT JOIN employee as manager ON manager.ID = employee.ManagerID');

foreach ($result as $row)
{
    ?>
    <tr>
        <td><?php echo $row->FirstName . ' ' . $row->LastName; ?></td>
        <td><?php echo $row->Position; ?></td>
        <td><?php echo $row->Salary; ?></td>
        <?php if ($row->ManagerID !== null) : ?>
            <td><?php echo $row->ManagerFirstName . ' ' . $row->ManagerLastName; ?></td>
        <?php else: ?>
            <td>No Manager</td>
        <?php endif; ?>
        <td><a href="<?php siteUrl('employees/delete'); ?>?id=<?php echo $row->ID; ?>"
    </tr>
    <?php
}
?>
</table>

<?php Views::renderPart('template/footer'); ?>
