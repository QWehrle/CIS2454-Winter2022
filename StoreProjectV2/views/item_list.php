<?php include './views/header.php' ?>

<h2>Items</h2>
<?php
if ($name != null) {
    echo "searching for $name";
}
?>
<table>
    <tr>
        <th>SKU</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>
    <!-- loops over the collection as single item -->
<?php foreach ($items as $item) : ?>
        <tr>
            <td> <?php echo $item['sku'] ?></td>
            <td> <?php echo $item['name'] ?></td>
            <td> <?php echo $item['quantity'] ?></td>
            <td> <?php echo $item['price'] ?></td>
        </tr>
<?php endforeach ?>
</table>
<br>
<form action="index.php" method="get">
    <label>Name</label>
    <input type="text" name="name"/><br>
    <input type="hidden" name="action" value="list_items"/>
    <input type="submit" value="Search Items"/>
</form>
<br>
<form action="index.php" method="post">
    <label>Item SKU</label>
    <input type="text" name="sku"/><br>
    <label>Name</label>
    <input type="text" name="name"/><br>
    <label>Quantity</label>
    <input type="text" name="quantity"/><br>
    <label>Price</label>
    <input type="text" name="price"/><br>
    <input type="hidden" name="action" value="add_or_update_item"/>
    <input type="radio" name="add_or_update" value="add_item" checked>Add Item<br>
    <input type="radio" name="add_or_update" value="update_item">Update Item<br>
    <input type="submit" value="Submit"/>
</form>

<br>
<form action="index.php" method="post">
    <label>Item to delete</label>
    <?php include './views/item_sku_select.php' ?>
    <input type="hidden" name="action" value="delete_item"/>
    <input type="submit" value="Delete Item"/>
</form>
<br>
<h2>Transactions</h2>
<form action="add_transaction.php" method="post">
    <label>Customer ID</label>
    <input type="text" name="customer_id"/><br>
    <input type="submit" value="Add Transaction"/>
</form>
<br>
<h2>Line Item</h2>
<form action="add_line_item.php" method="post">
    <label>Transaction ID</label>
    <input type="text" name="transaction_id"/><br>
    <label>Item</label>
    <?php include './views/item_sku_select.php' ?>
    <label>Quantity</label>
    <input type="text" name="quantity"/><br>
    <input type="submit" value="Add Line Item"/>
</form>
<?php include './views/footer.php' ?>
