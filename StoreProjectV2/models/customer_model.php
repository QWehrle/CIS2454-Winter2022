<?php

function get_customers() {
    global $database;

    $query = 'select * from customer';

    $statement = $database->prepare($query);

    $statement->execute();

    $customers = $statement->fetchAll();

    $statement->closeCursor();

    return $customers;
}

function add_customer($name) {
    global $database;

    $query = "INSERT INTO customer (name) VALUES (:name)";

    $statement = $database->prepare($query);

    $statement->bindValue(':name', $name);

    $statement->execute();

    $statement->closeCursor();
}

function delete_customer($id) {
    global $database;

    $query = "delete from customer WHERE id = :id";

    $statement = $database->prepare($query);
    $statement->bindValue(':id', $id);

    $statement->execute();

    $statement->closeCursor();
}

function update_customer($id, $name) {
    global $database;

    $query = "UPDATE customer SET name = :name WHERE id = :id";

    $statement = $database->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':id', $id);

    $statement->execute();

    $statement->closeCursor();
}
