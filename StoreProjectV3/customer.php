<?php

require_once './utilities/validate_admin_is_logged_in.php';

require_once './models/database.php'; // essentially copies the database.php file on top
require './models/customer_model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
    $action = filter_input(INPUT_GET, 'action');
    {
        if ($action == null) {
            $action = 'list_cusomters';
        }
    }
}

if ($action == 'list_cusomters') {

    try {
        $customers = get_customers();
        include './views/customer_list.php';
    } catch (Exception $ex) {
        $message = $ex->getMessage();
        include('./views/error.php');
    }
} else if ($action == 'add_customer') {
    $name = htmlspecialchars(filter_input(INPUT_POST, 'name'));

    if ($name == null) {
        $message = "Missing or invalid Name";
        include('./views/error.php');
    } else {
        try {
            add_customer($name);
            header("Location: customer.php");
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            include('./views/error.php');
        }
    }
} else if ($action == 'update_customer') {
    $id = htmlspecialchars(filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT));
    $name = htmlspecialchars(filter_input(INPUT_POST, 'name'));

    if ($id == 0 || $name == null) {
        $message = "Missing or invalid ID or Name";
        include('./views/error.php');
    } else {
        try {
            update_customer($id, $name);
            header("Location: customer.php");
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            include('./views/error.php');
        }
    }
} else if ($action == 'delete_customer') {
    $id = htmlspecialchars(filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT));

    if ($id == 0) {
        $message = "Missing or invalid ID";
        include('./views/error.php');
    } else {
        try {
            delete_customer($id);
            header("Location: customer.php");
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            include('./views/error.php');
        }
    }
}


