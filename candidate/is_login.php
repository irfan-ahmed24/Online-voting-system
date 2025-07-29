<?php 
session_start();

// Check if candidate is logged in
if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true && isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'candidate') {
    header("Location: profile.php");
    exit();
} else {
    header("Location: login.php");
    exit();
}
?>