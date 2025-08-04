<?php 
include './../config.php';
$sql = "SELECT * FROM elections ORDER BY ending_date DESC";
$totalElections= mysqli_num_rows(mysqli_query($conn, $sql));
$result = mysqli_query($conn, $sql);
$elections = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $elections[] = $row;
    }
}
$sql = "SELECT * FROM elections where status='active'";
$activeElectionnumber= mysqli_num_rows(mysqli_query($conn, $sql));
$result = mysqli_query($conn, $sql);
$activeElections = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $activeElections[] = $row;
    }
}
?>