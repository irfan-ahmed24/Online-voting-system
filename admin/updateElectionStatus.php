<?php
include './../config.php';
header('Content-Type: application/json');

// Function to update election status based on current time
function updateElectionStatus($conn) {
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
    
    // Get updated election counts
    $active_count_query = "SELECT COUNT(*) as count FROM elections WHERE status = 'active'";
    $active_result = mysqli_query($conn, $active_count_query);
    $active_count = mysqli_fetch_assoc($active_result)['count'];
    
    $upcoming_count_query = "SELECT COUNT(*) as count FROM elections WHERE status = 'upcoming'";
    $upcoming_result = mysqli_query($conn, $upcoming_count_query);
    $upcoming_count = mysqli_fetch_assoc($upcoming_result)['count'];
    
    $completed_count_query = "SELECT COUNT(*) as count FROM elections WHERE status = 'completed'";
    $completed_result = mysqli_query($conn, $completed_count_query);
    $completed_count = mysqli_fetch_assoc($completed_result)['count'];
    
    return [
        'success' => true,
        'current_time' => $now,
        'active_elections' => $active_count,
        'upcoming_elections' => $upcoming_count,
        'completed_elections' => $completed_count,
        'total_elections' => $active_count + $upcoming_count + $completed_count
    ];
}

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'update_status') {
        $result = updateElectionStatus($conn);
        echo json_encode($result);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // For GET requests, just return current status
    $result = updateElectionStatus($conn);
    echo json_encode($result);
}
?>
