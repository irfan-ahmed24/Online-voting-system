<?php 
session_start();
$host = "localhost";
$user = "root";
$pass = "";   
$db = "login";
$conn = mysqli_connect($host, $user, $pass, $db);


if(isset($_POST['submit']) && isset($_FILES['profilePic'])){
   $name = $_POST['first_name'];
   $picture = $_FILES['profilePic']['name'];
   echo $name; // Fixed: removed extra $ sign
   echo "<br>Picture: " . $picture;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="first_name" placeholder="enter your first name..">
        <input type="file" name="profilePic">
        <button type="submit" name="submit">submit</button>
    </form>
</body>
</html>