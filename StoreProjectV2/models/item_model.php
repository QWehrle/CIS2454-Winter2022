<?php

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

    $items = $statement->fetchAll();
    
    $statement->closeCursor();

    return $items;
}

function add_item($sku, $name, $quantity, $price) {
    global $database;

    // substitions to avoid SQL injection attacks
    // allows you to do safe substitutions with named bindings later
    $query = "INSERT INTO item (sku, name, quantity, price) "
            . " VALUES (:sku, :name, :quantity, :price)";

    // bad way - VERY dangerous
    //$query = "INSERT INTO item (sku, name, quantity, price) "
    //        . "VALUES ($sku, $name, $quantity, $price)";

    $statement = $database->prepare($query);
    $statement->bindValue(':sku', $sku);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':price', $price);

    $statement->execute();
    
    $statement->closeCursor();
}

function delete_item($sku) {
    global $database;

    // substitions to avoid SQL injection attacks
    // allows you to do safe substitutions with named bindings later
    $query = "delete from item WHERE sku = :sku";

    $statement = $database->prepare($query);
    $statement->bindValue(':sku', $sku);

    $statement->execute();
    
    $statement->closeCursor();
}

function update_item($sku, $name, $quantity, $price) {
    global $database;

    // substitions to avoid SQL injection attacks
    // allows you to do safe substitutions with named bindings later
    $query = "UPDATE item SET name = :name, quantity = :quantity, "
            . " price = :price WHERE sku = :sku";

    $statement = $database->prepare($query);
    $statement->bindValue(':sku', $sku);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':price', $price);

    $statement->execute();
    
    $statement->closeCursor();
}
