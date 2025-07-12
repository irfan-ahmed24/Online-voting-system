<?php 
include 'config.php';

session_start();
if(isset($_POST['username']) && isset($_POST['password'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM all_users WHERE (username='$username' OR email='$username') AND password='$password'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $user=mysqli_fetch_assoc($result);
        $_SESSION['user_name']=$user['Name'];
}
}
?>