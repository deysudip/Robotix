<?php
session_start();

if(isset($_SESSION['logged_user'])){
    $_SESSION['logged_user']='';
    $_SESSION['login_type']='';
    header('Location: ../index.php');
    session_destroy();
}
?>