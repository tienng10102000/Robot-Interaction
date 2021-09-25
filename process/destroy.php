<?php
session_start();
unset($_SESSION['user']);
session_destroy();
header("location: /Robot-Interaction-main/index.php?Message=" . "successfully logged out!!");
?>

