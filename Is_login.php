<?php 
session_start();
if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true) {
    header("Location: ./users/userView.php");
    exit();
} else {
    header("Location: login.php");
    exit();
}
?>