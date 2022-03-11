<?php

require "Item.php";

function get_items($name) {
    global $database;
    
    $query = 'select * from item';
    if ( $name != null ){
        // when using like % is a wildcard
        $query .= ' where name like :name';
        $name = '%' . $name . '%';
        $statement = $database->prepare($query);
        $statement->bindValue(':name', $name);
    } else{
        $statement = $database->prepare($query);
    }

    $statement->execute();

    $item_rows = $statement->fetchAll();
    
    $statement->closeCursor();
    
    $items = array();
    
    foreach ( $item_rows as $item_row ){
        $item = new Item($item_row['sku'], $item_row['name'],
                $item_row['quantity'], $item_row['price']);
        $items[] = $item;
    }

    return $items;
}

function add_item($item) {
    global $database;

    // substitions to avoid SQL injection attacks
    // allows you to do safe substitutions with named bindings later
    $query = "INSERT INTO item (sku, name, quantity, price) "
            . " VALUES (:sku, :name, :quantity, :price)";

    // bad way - VERY dangerous
    //$query = "INSERT INTO item (sku, name, quantity, price) "
    //        . "VALUES ($sku, $name, $quantity, $price)";

    $statement = $database->prepare($query);
    $statement->bindValue(':sku', $item->get_sku());
    $statement->bindValue(':name', $item->get_name());
    $statement->bindValue(':quantity', $item->get_quantity());
    $statement->bindValue(':price', $item->get_price());

    $statement->execute();
    
    $statement->closeCursor();
}

function delete_item($item) {
    global $database;

    // substitions to avoid SQL injection attacks
    // allows you to do safe substitutions with named bindings later
    $query = "delete from item WHERE sku = :sku";

    $statement = $database->prepare($query);
    $statement->bindValue(':sku', $item->get_sku());

    $statement->execute();
    
    $statement->closeCursor();
}

function update_item($item) {
    global $database;

    // substitions to avoid SQL injection attacks
    // allows you to do safe substitutions with named bindings later
    $query = "UPDATE item SET name = :name, quantity = :quantity, "
            . " price = :price WHERE sku = :sku";

    $statement = $database->prepare($query);
    $statement->bindValue(':sku', $item->get_sku());
    $statement->bindValue(':name', $item->get_name());
    $statement->bindValue(':quantity', $item->get_quantity());
    $statement->bindValue(':price', $item->get_price());

    $statement->execute();
    
    $statement->closeCursor();
}
