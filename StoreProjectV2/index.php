<?php

require_once './models/database.php'; // essentially copies the database.php file on top
require './models/item_model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
    $action = filter_input(INPUT_GET, 'action'); {
        if ($action == null) {
            $action = 'list_items';
        }
    }
}

if ($action == 'list_items') {
    $name = htmlspecialchars(filter_input(INPUT_GET, 'name'));
    try {
        $items = get_items($name);
        include './views/item_list.php';
    } catch (Exception $ex) {
        $message = $ex->getMessage();
        include('./views/error.php');
    }
} else if ($action == 'add_or_update_item') {
    $sku = htmlspecialchars(filter_input(INPUT_POST, 'sku'));
    $name = htmlspecialchars(filter_input(INPUT_POST, 'name'));
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    
    $add_or_update = filter_input(INPUT_POST, 'add_or_update');

    if ($sku == null || $name == null || $quantity == 0 || $price == 0) {
        $message = "Missing or invalid SKU, Name, Quantity, or Price";
        include('./views/error.php');
    } else {
        try {
            if ( $add_or_update == 'add_item'){
                add_item($sku, $name, $quantity, $price);
            } else if ( $add_or_update == "update_item"){
                update_item($sku, $name, $quantity, $price);
            }
            
            // redirect back to the the index page with a GET, so refresh doesn't warn
            header("Location: .");
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            include('./views/error.php');
        }
    }
}  else if ($action == 'delete_item') {
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



