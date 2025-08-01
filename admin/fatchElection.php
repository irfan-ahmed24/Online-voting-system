<?php 
include './../config.php';
$sql = "SELECT * FROM elections"; 
$result = mysqli_query($conn, $sql);
$elections = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $elections[] = $row;
    }
}
?>