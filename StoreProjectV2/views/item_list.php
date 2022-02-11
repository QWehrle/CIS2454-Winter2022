<?php include './views/header.php' ?>
        
        <h2>Items</h2>
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
        <form action="index.php" method="post">
            <label>Item SKU</label>
            <input type="text" name="sku"/><br>
            <label>Name</label>
            <input type="text" name="name"/><br>
            <label>Quantity</label>
            <input type="text" name="quantity"/><br>
            <label>Price</label>
            <input type="text" name="price"/><br>
            <input type="hidden" name="action" value="add_item"/>
            <input type="submit" value="Add Item"/>
        </form>
        <br>
        <form action="index.php" method="post">
            <label>Item SKU to update</label>
            <input type="text" name="sku"/><br>
            <label>new Name</label>
            <input type="text" name="name"/><br>
            <label>new Quantity</label>
            <input type="text" name="quantity"/><br>
            <label>new Price</label>
            <input type="text" name="price"/><br>
            <input type="hidden" name="action" value="update_item"/>
            <input type="submit" value="Update Item"/>
        </form>
        <br>
        <form action="index.php" method="post">
            <label>Item SKU to delete</label>
            <input type="text" name="sku"/><br>
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
            <label>Item SKU</label>
            <input type="text" name="sku"/><br>
            <label>Quantity</label>
            <input type="text" name="quantity"/><br>
            <label>Price</label>
            <input type="submit" value="Add Line Item"/>
        </form>
<?php include './views/footer.php' ?>
