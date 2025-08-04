<?php
    include './../config.php';
    $VodeSuccess = false;
    $successMessage = '';
    if(isset($_GET['election_id']) && isset($_GET['candidate_id'])) {
        $election_id = $_GET['election_id'];
        $candidate_id = $_GET['candidate_id'];
        $sql = "UPDATE elections SET total_votes = total_votes + 1 WHERE election_ID = '$election_id'";
        $result = mysqli_query($conn, $sql);
        $sql="UPDATE vote_counts SET find_votes = find_votes + 1 WHERE election_ID = '$election_id' AND candidate_ID = '$candidate_id'";
        if(mysqli_query($conn, $sql) && $result) {
            $VodeSuccess = true;
            $successMessage = "Vote recorded successfully!";
            header ("location: userView.php");
            exit();
        } else {
            echo "Error recording vote: " . mysqli_error($conn);
        }
    }
 ?>