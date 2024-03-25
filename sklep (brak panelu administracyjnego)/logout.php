<?php
session_start();
session_unset();
session_destroy();
header("location: logowanie.php");
exit;
?>
