<?php

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
    $action = filter_input(INPUT_GET, 'action'); {
        if ($action == null) {
            $action = 'login';
        }
    }
}


if ( $action == 'logout'){
    $_SESSION = array();
    session_destroy();
}

$user_name = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');


if ($user_name == '' || $password == '') {
    include 'views/login.php';
} else {
    
    
    require_once './models/database.php'; // essentially copies the database.php file on top
    require './models/login_model.php';  
    
    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    if ( does_user_exist_and_check_hash($user_name, $password) ){
        $_SESSION['is_logged_in_as_admin'] = true;
        $_SESSION['username'] = $user_name;
        header("Location: login.php");
    } else{
        $message = "invalid username or password";
        include 'views/login.php';
    }   
    
}