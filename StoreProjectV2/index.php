<?php

require_once './models/database.php'; // essentially copies the database.php file on top
require './models/item_model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
    $action = filter_input(INPUT_GET, 'action');
    {
        if ($action == null) {
            $action = 'list_items';
        }
    }
}

if ($action == 'list_items') {
    $items = get_items();
    include './views/item_list.php';
} else if ($action == 'add_item') {
    $sku = htmlspecialchars(filter_input(INPUT_POST, 'sku'));
    $name = htmlspecialchars(filter_input(INPUT_POST, 'name'));
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

    if ($sku == null || $name == null || $quantity == 0 || $price == 0) {
        $message = "Missing or invalid SKU, Name, Quantity, or Price";
        include('./views/error.php');
    } else {
        try {
            add_item($sku, $name, $quantity, $price);
            header("Location: .");
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            include('./views/error.php');
        }
    }
} else if ($action == 'update_item') {
    $sku = htmlspecialchars(filter_input(INPUT_POST, 'sku'));
    $name = htmlspecialchars(filter_input(INPUT_POST, 'name'));
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

    if ($sku == null || $name == null || $quantity == 0 || $price == 0) {
        $message = "Missing or invalid SKU, Name, Quantity, or Price";
        include('./views/error.php');
    } else {
        try {
            update_item($sku, $name, $quantity, $price);
            header("Location: .");
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            include('./views/error.php');
        }
    }
}else if ($action == 'delete_item') {
    $sku = htmlspecialchars(filter_input(INPUT_POST, 'sku'));
    
    if ($sku == null) {
        $message = "Missing or invalid SKU";
        include('./views/error.php');
    } else {
        try {
            delete_item($sku);
            header("Location: .");
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            include('./views/error.php');
        }
    }
}



