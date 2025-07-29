<?php 
session_start();
include './../config.php';
include 'candidateInfo.php';
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM candidate WHERE (username='$username' OR email='$username') AND password='$password'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
       header("Location: profile.php");
       exit();
        
    }
    else {
        header("Location: login.php");
        exit();
    }
}
?>