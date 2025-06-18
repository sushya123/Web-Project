<?php
session_start();

unset($_SESSION['sidx']); // Correct way to unset a specific session variable

session_destroy(); // Optional: use this to destroy the whole session

header("Location: index.php"); // Redirect to login or home page
exit();
?>
