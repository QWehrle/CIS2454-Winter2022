<?php
require_once './database.php';

try {

    $sku = htmlspecialchars(filter_input(INPUT_POST, 'sku'));
    $transaction_id = filter_input(INPUT_POST, 'transaction_id', FILTER_VALIDATE_INT);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

    $query = 'select * from item where sku = :sku';

    $statement = $database->prepare($query);
    $statement->bindValue(':sku', $sku);
    $statement->execute();

    // gets just a single row
    $item = $statement->fetch();

    // gets the single item price
    $item_name = $item['name'];
    $item_price = $item['price'];
    $item_current_quantity = $item['quantity'];
    $item_new_quantity = $item_current_quantity - $quantity;

    // checking to ensure we have enough to sell
    if ($item_new_quantity < 0) {
        echo "There are not enough $item_name in stock to purchase $quantity";
    } else {
        $total_cost = $item_price * $quantity;

        $query = "INSERT INTO line_item (transaction_id, item_sku, quantity, total_cost) "
                . "VALUES (:transaction_id, :item_sku, :quantity, :total_cost)";

        $statement = $database->prepare($query);
        $statement->bindValue(':transaction_id', $transaction_id);
        $statement->bindValue(':item_sku', $sku);
        $statement->bindValue(':quantity', $quantity);
        $statement->bindValue(':total_cost', $total_cost);

        $statement->execute();

        $query = "UPDATE item SET quantity = :quantity WHERE sku = :sku";

        $statement = $database->prepare($query);
        $statement->bindValue(':sku', $sku);
        $statement->bindValue(':quantity', $item_new_quantity);

        $statement->execute();
    }
} catch (Exception $ex) {
    $error_message = $ex->getMessage();
    echo "<p>Database Error: $error_message</p>";
}
?>

<a href='index.php'>index</a>
