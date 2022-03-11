<?php

require_once './utilities/validate_admin_is_logged_in.php';

require_once './models/database.php'; // essentially copies the database.php file on top
require './models/transaction_model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
    $action = filter_input(INPUT_GET, 'action');
    {
        if ($action == null) {
            $action = 'list_transactions';
        }
    }
}

if ($action == 'list_transactions') {

    try {
        $transactions = get_transactions();
        include './views/transaction_list.php';
    } catch (Exception $ex) {
        $message = $ex->getMessage();
        include('./views/error.php');
    }
} else if ($action == 'add_transaction') {
    $customer_id = htmlspecialchars(filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT));

    if ($customer_id == 0) {
        $message = "Missing or invalid customer_id";
        include('./views/error.php');
    } else {
        try {
            add_transaction($customer_id);
            header("Location: transaction.php");
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            include('./views/error.php');
        }
    }
} else if ($action == 'update_transaction') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
    $date_time = htmlspecialchars(filter_input(INPUT_POST, 'date_time'));
    if ($id == 0 || $customer_id == 0 || $date_time == null) {
        $message = "Missing or invalid ID, Customer_ID, date_time";
        include('./views/error.php');
    } else {
        try {
            update_transaction($id, $customer_id, $date_time);
            header("Location: transaction.php");
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            include('./views/error.php');
        }
    }
} else if ($action == 'delete_transaction') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    if ($id == 0) {
        $message = "Missing or invalid ID";
        include('./views/error.php');
    } else {
        try {
            delete_transaction($id);
            header("Location: transaction.php");
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            include('./views/error.php');
        }
    }
}


