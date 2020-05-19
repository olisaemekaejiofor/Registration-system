<?php
session_start();
if(isset($_SESSION['user_name'])){
    header("location: login.php");
    unset($_SESSION['user_name']);
}else{
    header("location: login.php");
}
?>