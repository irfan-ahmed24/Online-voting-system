<?php
include 'fatchCandidate.php';
include './../config.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM candidate WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
         echo "<script>
                alert('candidate deleted successfully');
                window.location.href = 'Admin.php';
              </script>";
        exit();
    } else {
        echo "Error deleting candidate: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>