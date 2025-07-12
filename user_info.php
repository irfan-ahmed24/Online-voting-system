<?php 
include 'config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_POST['username']) && isset($_POST['password'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM all_users WHERE (username='$username' OR email='$username') AND password='$password'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $user=mysqli_fetch_assoc($result);

        $_SESSION['user_name']=$user['Name'];
        $_SESSION['email']=$user['email'];
        $_SESSION['phone']=$user['phone'];
        $_SESSION['profile_pic']=$user['profilePic'];
        $_SESSION['dateOfBirth']=$user['dob'];
        $_SESSION['gender']=$user['gender'];
        $_SESSION['NID']=$user['nationalID'];
        $_SESSION['address']=$user['address'];
}
}
?>