<?php 
include './../config.php';
$sql = "SELECT * FROM candidate";

$result = mysqli_query($conn, $sql);
$totalcandidates = mysqli_num_rows($result);
$candidates = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $candidates[] = $row;
    }
}
?>