<?php if (!isset($_SESSION)) session_start();
unset($_SESSION['_login']);
unset($_SESSION['_Level']);
session_destroy();
header('location:index.php');
?>