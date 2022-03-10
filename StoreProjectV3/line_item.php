<?php

require_once './models/database.php'; // essentially copies the database.php file on top
require './models/line_item_model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
    $action = filter_input(INPUT_GET, 'action'); {
        if ($action == null) {
            $action = 'list_line_items';
        }
    }
}

if ($action == 'list_line_items') {

    try {
        $line_items = get_line_items();
        include './views/line_item_list.php';
    } catch (Exception $ex) {
        $message = $ex->getMessage();
        include('./views/error.php');
    }
} else if ($action == 'add_line_item') {
    $transaction_id = filter_input(INPUT_POST, 'transaction_id', FILTER_VALIDATE_INT);
    $item_sku = filter_input(INPUT_POST, 'item_sku', FILTER_VALIDATE_INT);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

    if ($transaction_id == 0 || $item_sku == 0 || $quantity == 0) {
        $message = "Missing or invalid transaction id, item sku, or quantity";
        include('./views/error.php');
    } else {
        try {
            $message = add_line_item($transaction_id, $item_sku, $quantity);
            if ($message != "") {
                include('./views/error.php');
            } else {
                header("Location: line_item.php");
            }
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            include('./views/error.php');
        }
    }
} else if ($action == 'update_line_item') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $transaction_id = filter_input(INPUT_POST, 'transaction_id', FILTER_VALIDATE_INT);
    $item_sku = filter_input(INPUT_POST, 'item_sku', FILTER_VALIDATE_INT);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
    $total_cost = filter_input(INPUT_POST, 'total_cost', FILTER_VALIDATE_FLOAT);
    if ($id == 0 || $transaction_id == 0 || $item_sku == 0 || $quantity == 0 || $total_cost == 0) {
        $message = "Missing or invalid ID, transaction_id, item_sku, quantity, or total cost";
        include('./views/error.php');
    } else {
        try {
            update_line_item($id, $transaction_id, $item_sku, $quantity, $total_cost);
            header("Location: line_item.php");
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            include('./views/error.php');
        }
    }
} else if ($action == 'delete_line_item') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    if ($id == 0) {
        $message = "Missing or invalid ID";
        include('./views/error.php');
    } else {
        try {
            delete_line_item($id);
            header("Location: line_item.php");
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            include('./views/error.php');
        }
    }
}


