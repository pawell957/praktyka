<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Rejestracja</h2>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'sklep');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $login = $_POST['login'] ?? '';
            $haslo = $_POST['haslo'] ?? '';
            $nr_tel = $_POST['nr_tel'] ?? '';

            $sql = "INSERT INTO rejestracja (login, haslo, nr_tel) VALUES ('$login', '$haslo', '$nr_tel')";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "Rejestracja zakończona pomyślnie";
            } else {
                echo "Błąd: " . $sql . "<br>" . mysqli_error($conn);
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
            <div class="form-group">
                <label for="nr_tel">Numer telefonu:</label>
                <input type="tel" id="nr_tel" name="nr_tel" required>
            </div>
            <button type="submit">Zarejestruj</button>
        </form>
    </div>
</body>
</html>
