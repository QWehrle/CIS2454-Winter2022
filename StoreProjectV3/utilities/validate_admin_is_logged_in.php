<?php
session_start();
if ( !isset($_SESSION['is_logged_in_as_admin']) ){
    header("Location: login.php");
}
