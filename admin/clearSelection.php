<?php 
include './../config.php';
session_start();

if (isset($_SESSION['selected_candidates_id'])) {
    $_SESSION['selected_candidates_id'] = [];
    
    // Update election status in database when clearing selection
    $now = date('Y-m-d H:i:s');
    
    // Update elections to 'active' if current time is between start and end dates
    $sql_active = "UPDATE elections SET status = 'active' 
                   WHERE starting_date <= '$now' 
                   AND ending_date >= '$now' 
                   AND status != 'active'";
    mysqli_query($conn, $sql_active);
    
    // Update elections to 'completed' if current time is past end date
    $sql_completed = "UPDATE elections SET status = 'completed' 
                      WHERE ending_date < '$now' 
                      AND status != 'completed'";
    mysqli_query($conn, $sql_completed);
    
    // Update elections to 'upcoming' if current time is before start date
    $sql_upcoming = "UPDATE elections SET status = 'upcoming' 
                     WHERE starting_date > '$now' 
                     AND status != 'upcoming'";
    mysqli_query($conn, $sql_upcoming);
}

header("Location: createElection.php");
exit();
?>