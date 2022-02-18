<?php include './views/header.php' ?>

<h2>Customers</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    
<?php foreach ($customers as $cusomter) : ?>
        <tr>
            <td> <?php echo $cusomter['id'] ?></td>
            <td> <?php echo $cusomter['name'] ?></td>
        </tr>
<?php endforeach ?>
</table>
<br>
<form action="customer.php" method="post">
    <label>Name to Add</label>
    <input type="text" name="name"/><br>
    
    <input type="hidden" name="action" value="add_customer"/>
    <input type="submit" value="Add Customer"/>
</form>
<br>
<form action="customer.php" method="post">
    <label>ID to update</label>
    <input type="text" name="id"/><br>
    <label>Name to update</label>
    <input type="text" name="name"/><br>
    
    <input type="hidden" name="action" value="update_customer"/>
    <input type="submit" value="Update Customer"/>
</form>

<br>
<form action="customer.php" method="post">
    <label>Customer to delete</label>
    <?php include './views/customer_id_select.php' ?>
    <input type="hidden" name="action" value="delete_customer"/>
    <input type="submit" value="Delete Item"/>
</form>
<br>
<?php include './views/footer.php' ?>
