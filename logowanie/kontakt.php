<?php
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
    header("Location: logowanie.php");
    exit();
}
$username = $_SESSION['login'];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie</title>
</head>
<body>
<h2>Witaj, <?php echo $username; ?>!</h2>
    <form action="index.php" method="post">
        <label for="imie">Imię:</label>
        <input type="text" id="imie" name="imie"><br>

        <label for="nazwisko">Nazwisko:</label>
        <input type="text" id="nazwisko" name="nazwisko"><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email"><br>

        <label for="telefon">Numer telefonu:</label>
        <input type="tel" id="telefon" name="telefon"><br>

        <label for="id">id:</label>
        <input type="int" id="id" name="id"><br>

        <input type="submit" value="wyślij">
        <p><a href="logout.php">Wyloguj się</a></p>

        <?php
        $conn = mysqli_connect('localhost','root','','kontakty');
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $nr_tel = $_POST['telefon'];
        $email = $_POST['email'];
        $id = $_POST['id'];

        $sql = "INSERT INTO kontakt (`imie`, `nazwisko`, `email`, `nr_telefon`,`id`) VALUES ('$imie', '$nazwisko', '$email', '$nr_tel','$id')";
        $query = mysqli_query($conn,$sql);
        ?>
</body>
</html>