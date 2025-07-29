
<?php 
session_start();
include "../config.php";

if(isset($_POST['submit']) && isset($_FILES['profilePicture'])){
  $first_name = $_POST['firstName'];
  $last_name = $_POST['lastName'];
  $name = "$first_name $last_name";
  $username = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $dateOfBirth = $_POST['dateOfBirth'];
  $gender = $_POST['gender'];
  $nationalId = $_POST['nationalId'];
  $address = $_POST['address']; 
  $password = $_POST['password'];
  $picture = $_FILES['profilePicture']['name'];
  $campaignMessage=$_POST['campaignMessage'];
  $politicalParty=$_POST['politicalParty'];

  // Check for existing email or username
  $checkQuery = "SELECT * FROM candidate WHERE email='$email' OR username='$username'";
  $checkResult = mysqli_query($conn, $checkQuery);
  
  if(mysqli_num_rows($checkResult) > 0){
      echo "<script>
        alert('Email or Username already exists. Please try again with different credentials.');
        window.location.href = 'addCandidate.php';
      </script>";
  } else {
    // Validate file upload
    if($_FILES['profilePicture']['error'] == 0) {
      // Create images directory if it doesn't exist
      if (!file_exists("candidateImage")) {
          mkdir("candidateImage", 0777, true);
      }
      
      $fileDiv = "candidateImage/" . $picture;
      
      // Use prepared statement for security
      $query="INSERT INTO candidate(firstName,lastName, email, phone, dob, gender, national_id, address, profilePic,groupName,massage, username, password) 
      VALUES(' $first_name','$last_name' ,'$email', '$phone', '$dateOfBirth', '$gender', '$nationalId', '$address', '$picture','$politicalParty','$campaignMessage', '$username', '$password')";
      
      $result= mysqli_query($conn, $query);
      if($result){
          if(move_uploaded_file($_FILES['profilePicture']['tmp_name'], $fileDiv)){
              echo "<script>
                alert('Registration successful!');
                window.location.href = 'Admin.php';
              </script>";
              exit();
          } else {
              echo "<script>alert('File upload failed.');</script>";
          }
      } else {
          echo "<script>alert('Registration failed. Please try again.');</script>";
      }
      $stmt->close();
      
    } else {
      echo "<script>alert('please fill up all required field');</script>";
    }
  }
}
?>