<?php 
include './../config.php';

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM candidate WHERE (username='$username' OR email='$username') AND password='$password'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        $candidate = mysqli_fetch_assoc($result);
        
        // Store all candidate information in session
        $_SESSION['firstName'] = $candidate['firstName'];
        $_SESSION['lastName'] = $candidate['lastName'];
        $_SESSION['email'] = $candidate['email'];
        $_SESSION['phone'] = $candidate['phone'];
        $_SESSION['profile_pic'] = $candidate['profilePic'];
        $_SESSION['dateOfBirth'] = $candidate['dob'];
        $_SESSION['gender'] = $candidate['gender'];
        $_SESSION['NID'] = $candidate['nationalID'];
        $_SESSION['address'] = $candidate['address'];
        $_SESSION['politicalParty'] = $candidate['groupName'];
        $_SESSION['campaignMessage'] = $candidate['massage'];
        $_SESSION['username'] = $candidate['username'];
        $_SESSION['is_login'] = true;
        $_SESSION['user_type'] = 'candidate';
        
        // Clear any previous error messages
        unset($_SESSION['message']);
    }
    else {
        $_SESSION['message'] = "Invalid username or password.";
    }
}
?>