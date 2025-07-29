<?php 
include './../config.php';
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM candidate WHERE (username='$username' OR email='$username') AND password='$password'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        $candidate = mysqli_fetch_assoc($result);
        
        
        $_SESSION['firstName'] = $candidate['firstName'];
        $_SESSION['lastName'] = $candidate['lastName'];
    }
    else {
        $_SESSION['message'] = "Invalid username or password.";
        header("Location: login.php");
        exit();
    }
}
?>