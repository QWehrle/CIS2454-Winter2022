<?php

function get_transactions() {
    global $database;

    $query = 'select * from transaction';

    $statement = $database->prepare($query);

    $statement->execute();

    $transactions = $statement->fetchAll();

    $statement->closeCursor();

    return $transactions;
}

function add_transaction($customer_id) {
    global $database;

    $query = "INSERT INTO transaction (customer_id, date_time) "
            . " VALUES (:customer_id, now())";

    $statement = $database->prepare($query);

    $statement->bindValue(':customer_id', $customer_id);

    $statement->execute();

    $statement->closeCursor();
}

function delete_transaction($id) {
    global $database;

    $query = "delete from transaction WHERE id = :id";

    $statement = $database->prepare($query);
    $statement->bindValue(':id', $id);

    $statement->execute();

    $statement->closeCursor();
}

function update_transaction($id, $customer_id, $date_time) {
    global $database;

    $query = "UPDATE transaction SET customer_id = :customer_id,"
            . " date_time = :date_time "
            . " WHERE id = :id";

    $statement = $database->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->bindValue(':date_time', $date_time);
    $statement->bindValue(':id', $id);

    $statement->execute();

    $statement->closeCursor();
}
