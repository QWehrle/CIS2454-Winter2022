<?php include './views/header.php' ?>

<h2>Transactions</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Customer ID</th>
        <th>Date Time</th>
    </tr>
    
<?php foreach ($transactions as $transaction) : ?>
        <tr>
            <td> <?php echo $transaction['id'] ?></td>
            <td> <?php echo $transaction['customer_id'] ?></td>
            <td> <?php echo $transaction['date_time'] ?></td>
        </tr>
<?php endforeach ?>
</table>
<br>
<form action="transaction.php" method="post">
    <label>Customer ID to Add</label>
    <input type="text" name="customer_id"/><br>
    
    <input type="hidden" name="action" value="add_transaction"/>
    <input type="submit" value="Add Transaction"/>
</form>
<br>
<form action="transaction.php" method="post">
    <label>ID to update</label>
    <input type="text" name="id"/><br>
    <label>Customer ID to update</label>
    <input type="text" name="customer_id"/><br>
    <label>Date Time update</label>
    <input type="text" name="date_time"/><br>
    
    <input type="hidden" name="action" value="update_transaction"/>
    <input type="submit" value="Update Transaction"/>
</form>

<br>
<form action="transaction.php" method="post">
    <label>Transaction to delete</label>
    <?php include './views/transaction_id_select.php' ?>
    <input type="hidden" name="action" value="delete_transaction"/>
    <input type="submit" value="Delete Transaction"/>
</form>
<br>
<?php include './views/footer.php' ?>
