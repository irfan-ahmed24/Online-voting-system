<?php 
include '/../config.php';
if(isset($_GET['id'])) {
    $election_id = $_GET['id'];
    $sql = "DELETE FROM elections WHERE election_ID='$election_id'";
    if(mysqli_query($conn, $sql)) {
        header("Location: elections.php");
        exit();
    } else {
        header("Location: elections.php");
        exit();
    }
}
?>