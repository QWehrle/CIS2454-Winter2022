<?php

require_once './database.php';

try {

$customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);

// use null for fields that are auto incriment 
$query = "INSERT INTO transaction (id, customer_id, date_time) "
        . "VALUES (null, :customer_id, now())";

// or don't include the fields that are auto incriment
$query = "INSERT INTO transaction (customer_id, date_time) "
        . "VALUES (:customer_id, now())";

$statement = $database->prepare($query);
$statement->bindValue(':customer_id', $customer_id);

$statement->execute();
}
catch (Exception $ex) {
    $error_message = $ex->getMessage();
    echo "<p>Database Error: $error_message</p>";
}

?>

<a href='index.php'>index</a>
