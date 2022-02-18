<?php include './views/header.php' ?>

<h2>Line Items</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Transaction ID</th>
        <th>Item SKU</th>
        <th>Quantity</th>
        <th>Total Cost</th>
    </tr>
    <!-- loops over the collection as single item -->
<?php foreach ($line_items as $line_item) : ?>
        <tr>
            <td> <?php echo $line_item['id'] ?></td>
            <td> <?php echo $line_item['transaction_id'] ?></td>
            <td> <?php echo $line_item['item_sku'] ?></td>
            <td> <?php echo $line_item['quantity'] ?></td>
            <td> <?php echo $line_item['total_cost'] ?></td>
        </tr>
<?php endforeach ?>
</table>
<br>
<form action="line_item.php" method="post">
    <label>Transaction ID to Add</label>
    <input type="text" name="transaction_id"/><br>
    <label>Item SKU to Add</label>
    <input type="text" name="item_sku"/><br>
    <label>Quantity to Add</label>
    <input type="text" name="quantity"/><br>
    
    <input type="hidden" name="action" value="add_line_item"/>
    <input type="submit" value="Add Line Item"/>
</form>
<br>
<form action="line_item.php" method="post">
    <label>ID to update</label>
    <input type="text" name="id"/><br>
    <label>Transaction ID to Update</label>
    <input type="text" name="transaction_id"/><br>
    <label>Item SKU to Update</label>
    <input type="text" name="item_sku"/><br>
    <label>Quantity to Update</label>
    <input type="text" name="quantity"/><br>
    <label>Total Cost to Update</label>
    <input type="text" name="total_cost"/><br>
    
    <input type="hidden" name="action" value="update_line_item"/>
    <input type="submit" value="Update Line Item"/>
</form>

<br>
<form action="line_item.php" method="post">
    <label>Line Item to delete</label>
    <?php include './views/line_item_id_select.php' ?>
    <input type="hidden" name="action" value="delete_line_item"/>
    <input type="submit" value="Delete Line Item"/>
</form>
<br>
<?php include './views/footer.php' ?>