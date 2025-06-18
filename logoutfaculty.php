<?php
session_start();

// Unset the specific session variable for faculty
unset($_SESSION['fidx']);

// Optionally destroy the session completely
session_destroy();

// Redirect to login or homepage
header("Location: index.php");
exit();
?>
