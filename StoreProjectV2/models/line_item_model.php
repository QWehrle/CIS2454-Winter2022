<?php

function get_line_items() {
    global $database;

    $query = 'select * from line_item';

    $statement = $database->prepare($query);

    $statement->execute();

    $line_items = $statement->fetchAll();

    $statement->closeCursor();

    return $line_items;
}

function add_line_item($transaction_id, $item_sku, $quantity) {
    global $database;

    $query = 'select * from item where sku = :sku';

    $statement = $database->prepare($query);
    $statement->bindValue(':sku', $item_sku);
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
        return "There are not enough $item_name in stock to purchase $quantity";
    }
    $total_cost = $item_price * $quantity;

    $query = "INSERT INTO line_item (transaction_id, item_sku, quantity, total_cost) "
            . "VALUES (:transaction_id, :item_sku, :quantity, :total_cost)";

    $statement = $database->prepare($query);
    $statement->bindValue(':transaction_id', $transaction_id);
    $statement->bindValue(':item_sku', $item_sku);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':total_cost', $total_cost);

    $statement->execute();

    $query = "UPDATE item SET quantity = :quantity WHERE sku = :sku";

    $statement = $database->prepare($query);
    $statement->bindValue(':sku', $item_sku);
    $statement->bindValue(':quantity', $item_new_quantity);

    $statement->execute();

    $statement->closeCursor();
}

function delete_line_item($id) {
    global $database;

    $query = "delete from line_item WHERE id = :id";

    $statement = $database->prepare($query);
    $statement->bindValue(':id', $id);

    $statement->execute();

    $statement->closeCursor();
}

function update_line_item($id, $transaction_id, $item_sku, $quantity, $total_cost) {
    global $database;

    $query = "UPDATE line_item SET transaction_id = :transaction_id, "
            . " item_sku = :item_sku, quantity = :quantity, "
            . " total_cost = :total_cost "
            . " WHERE id = :id";

    $statement = $database->prepare($query);
    $statement->bindValue(':transaction_id', $transaction_id);
    $statement->bindValue(':item_sku', $item_sku);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':total_cost', $total_cost);
    
    $statement->bindValue(':id', $id);

    $statement->execute();

    $statement->closeCursor();
}
