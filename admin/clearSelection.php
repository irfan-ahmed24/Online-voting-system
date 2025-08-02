<?php 
session_start();
session_destroy();
header("Location: createElection.php");
exit();
?>