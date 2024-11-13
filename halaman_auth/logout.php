<?php 
session_start();
if($_SESSION['level'] == "ADMIN"){
    session_destroy();
    header('Location: ../index.php');
} else {
    session_destroy();
    header('Location: ../index.php');
}