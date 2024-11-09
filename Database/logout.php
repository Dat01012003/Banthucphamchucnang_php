<?php
session_start();
session_unset(); // Hủy tất cả session variables
session_destroy(); // Hủy session
header("Location: ../home/home.php");
exit();
?>