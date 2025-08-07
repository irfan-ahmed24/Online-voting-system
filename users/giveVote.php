<?php
    include './../config.php';
    if(isset($_GET['election_id']) && isset($_GET['candidate_id']) && isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        $election_id = $_GET['election_id'];
        $candidate_id = $_GET['candidate_id'];
        $sql = "UPDATE elections SET total_votes = total_votes + 1 WHERE election_ID = '$election_id'";
        $sql3="UPDATE vote_counts SET find_votes = find_votes + 1 WHERE election_ID = '$election_id' AND candidate_ID = '$candidate_id'";
        $sql2 ="INSERT INTO Is_voted (election_ID, user_ID, is_voted) 
                VALUES ('$election_id', $user_id, 1)
                ON DUPLICATE KEY UPDATE is_voted = IF(is_voted = 0, 1, 0)";
        if(mysqli_query($conn, $sql)) {
            header ("location: userView.php");
            exit();
        } else {
            echo "Error recording vote: " . mysqli_error($conn);
        }
    }
 ?>