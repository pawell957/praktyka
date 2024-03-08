<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column; /* Dodane dla responsywności */
            align-items: center;
            height: 100vh; /* Dodane, aby formularz był na środku strony */
            justify-content: center; /* Dodane, aby formularz był na środku strony */
        }

        #banner {
            background-color: #333;
            color: white;
            width: 100%;
            padding: 10px 0;
            text-align: center;
            position: fixed; /* Dodane, aby baner był widoczny zawsze na górze */
            top: 0; /* Dodane, aby baner był widoczny zawsze na górze */
            z-index: 1000; /* Dodane, aby baner był widoczny zawsze na górze */
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Dodane cień */
        }

        #banner a {
            color: white;
            text-decoration: none;
            margin: 0 15px; /* Zwiększony odstęp między linkami */
            padding: 5px 10px; /* Zwiększony padding linków */
            border-radius: 5px; /* Zaokrąglenie krawędzi */
        }

        #banner a:hover {
            text-decoration: underline;
            background-color: #555; /* Zmiana koloru tła po najechaniu myszką */
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px; /* Szerokość formularza */
        }

        form label {
            margin-bottom: 5px;
        }

        form input {
            margin-bottom: 10px;
            width: calc(100% - 20px); /* Ustawienie szerokości inputu */
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 10px;
            font-size: 14px;
        }

        p a {
            color: #4CAF50;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div id="banner">
    <a href="rejestracja.php">Rejestracja</a>
    <a href="logowanie.php">Logowanie</a>
    <a href="kontakt.php">Kontakt</a>
    <a href="edycja.php">Edycja</a>
    <a href="podstrona.php">Usuwanie</a>
</div>

<h2>Logowanie</h2>

<?php
    if(isset($error)) {
        echo "<div>$error</div>";
    }
?>

<form method="post" action="">
    <label for="login">Nazwa użytkownika:</label><br>
    <input type="text" id="login" name="login" required><br>
    <label for="haslo">Hasło:</label><br>
    <input type="password" id="haslo" name="haslo" required><br><br>
    <input type="submit" value="Zaloguj">
</form>

<p>Nie masz jeszcze konta? <a href="rejestracja.php">Zarejestruj się</a></p>

</body>
</html>
