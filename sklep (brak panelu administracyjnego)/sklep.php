<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="price"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Dodaj produkt</h1>

    <form action="sklep.php" method="post" enctype="multipart/form-data">
        <label for="produkt">Produkt:</label>
        <input type="text" id="produkt" name="produkt">

        <label for="opis">Opis:</label>
        <input type="text" id="opis" name="opis">

        <label for="img">Dodaj zdjęcie:</label> 
        <input type="file" name="file" id="file">

        <label for="cena">Cena:</label>
        <input type="price" id="cena" name="cena">

        <input type="submit" value="Wyślij">
    </form>

    <?php
        $conn = mysqli_connect('localhost', 'root', '', 'sklep');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $produkt = $_POST['produkt'] ?? '';
            $opis = $_POST['opis'] ?? '';
            $cena = $_POST['cena'] ?? '';
            
            $img = ''; 
            if(isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    $img = $target_file;
                } else {
                    echo "<p class='message'>Wystąpił błąd podczas przesyłania pliku.</p>";
                }
            }

            if (empty($produkt) || empty($opis) || empty($cena)) {
                echo "<p class='message'>Proszę wypełnić wszystkie dane.</p>";
            } else {
                $sql = "INSERT INTO produkty (produkt, opis, zdjecie, cena) VALUES ('$produkt', '$opis', '$img', '$cena')";
                $query = mysqli_query($conn, $sql);
                if ($query) {
                    echo "<p class='message'>Produkt został dodany poprawnie!</p>";
                } else {
                    echo "<p class='message'>Błąd: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
                }
            }
        }

        mysqli_close($conn);
    ?>
</body>
</html>
