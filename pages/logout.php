<!---Logout--->


<?php
session_start();
unset($_SESSION['lec_ID']);
unset($_SESSION['username']);
session_destroy();
header("Location: ../index.php");
?>

