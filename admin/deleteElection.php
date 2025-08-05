<?php 
include './../config.php';
if(isset($_GET['id'])) {
    $election_id = $_GET['id'];
    $sql = "DELETE FROM elections WHERE election_ID='$election_id'";
    $sql2 = "DELETE FROM vote_counts WHERE election_ID='$election_id'";
    $sql3 = "DELETE FROM Is_voted WHERE election_ID='$election_id'";
    mysqli_query($conn, $sql3);
    
    if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
        header("Location: Admin.php");
        exit();
    } else {
        header("Location: Admin.php");
        exit();
    }
}
?>