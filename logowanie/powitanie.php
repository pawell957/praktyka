<?php
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
    header("Location: logowanie.php");
    exit();
}
$username = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Witaj</title>
</head>
<body>
    <h2>Witaj, <?php echo $username; ?>!</h2>
    <p>To jest strona powitalna dla zalogowanych użytkowników.</p>
    <p><a href="logout.php">Wyloguj się</a></p>
</body>
</html>
