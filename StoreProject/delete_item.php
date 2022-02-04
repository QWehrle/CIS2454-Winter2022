<?php

require_once './database.php';

// feels a little bad to delete stuff from a database
// ideally you mark it inactive or something else


try {
$sku = htmlspecialchars(filter_input(INPUT_POST, 'sku'));

// substitions to avoid SQL injection attacks
// allows you to do safe substitutions with named bindings later
$query = "delete from item WHERE sku = :sku";

$statement = $database->prepare($query);
$statement->bindValue(':sku', $sku);

$statement->execute();
}
catch (Exception $ex) {
    $error_message = $ex->getMessage();
    echo "<p>Database Error: $error_message</p>";
}

?>

<a href='index.php'>index</a>
