<?php 
include './../config.php';
$sql = "SELECT * FROM all_users"; // Adjusted to match the context of AllUsers.php
$result = mysqli_query($conn, $sql);
$users = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}
?>