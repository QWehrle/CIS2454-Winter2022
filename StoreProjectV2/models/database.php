<?php

$connection_string = 'mysql:host=localhost;dbname=store';
// this is bad, but we don't have time for the good things
$username = 'store';
$password = 'test'; // don't do this in real life

try {
    $database = new PDO($connection_string, $username, $password);
} catch (Exception $ex) {
    $error_message = $ex->getMessage();
    echo "<p>Database Error: $error_message</p>";
}

