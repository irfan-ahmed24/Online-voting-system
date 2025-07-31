<?php
include 'fatchUsers.php';
include './../config.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM all_users WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
         echo "<script>
                alert('user deleted successfully');
                window.location.href = 'Admin.php';
              </script>";
        exit();
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>