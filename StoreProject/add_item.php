<?php

require_once './database.php';

try {
$sku = htmlspecialchars(filter_input(INPUT_POST, 'sku'));
$name = htmlspecialchars(filter_input(INPUT_POST, 'name'));
$quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

// substitions to avoid SQL injection attacks
// allows you to do safe substitutions with named bindings later
$query = "INSERT INTO item (sku, name, quantity, price) "
        . "VALUES (:sku, :name, :quantity, :price)";

// bad way - VERY dangerous
//$query = "INSERT INTO item (sku, name, quantity, price) "
//        . "VALUES ($sku, $name, $quantity, $price)";

$statement = $database->prepare($query);
$statement->bindValue(':sku', $sku);
$statement->bindValue(':name', $name);
$statement->bindValue(':quantity', $quantity);
$statement->bindValue(':price', $price);

$statement->execute();
}
catch (Exception $ex) {
    $error_message = $ex->getMessage();
    echo "<p>Database Error: $error_message</p>";
}

?>

<a href='index.php'>index</a>
