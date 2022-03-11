<?php

function does_user_exist_and_check_hash($user_name, $password_hash) {
     global $database;
    
    $query = 'select * from user where username = :username';

    $statement = $database->prepare($query);
    $statement->bindValue(':username', $user_name);

    $statement->execute();

    $user = $statement->fetchAll();

    $statement->closeCursor();
    
    if ( count($user) == 0){
        return false;
    }
    
    return password_verify($password_hash, $user[0]['password_hash']);
}
