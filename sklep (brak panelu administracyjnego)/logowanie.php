<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Logowanie</h2>
        <?php
        session_start();
        $conn = mysqli_connect('localhost', 'root', '', 'sklep');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $login = $_POST['login'] ?? '';
            $haslo = $_POST['haslo'] ?? '';

            $sql = "SELECT * FROM rejestracja WHERE login='$login' AND haslo='$haslo'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['login'] = $login;
                header("location: produkty.php");
            } else {
                echo "Nieprawidłowy login lub hasło";
            }
        }

        mysqli_close($conn);
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" id="login" name="login" required>
            </div>
            <div class="form-group">
                <label for="haslo">Hasło:</label>
                <input type="password" id="haslo" name="haslo" required>
            </div>
            <button type="submit">Zaloguj</button>
        </form>
    </div>
</body>
</html>
