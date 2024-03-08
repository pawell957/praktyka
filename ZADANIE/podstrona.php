<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <title>Wpisy</title>
</head>
<body>

<div id="banner">
    <a href="rejestracja.php">Rejestracja</a>
    <a href="logowanie.php">Logowanie</a>
    <a href="kontakt.php">Kontakt</a>
    <a href="edycja.php">Edycja</a>
</div>

<div id="tableContainer"></div>

<button id="refreshButton">Odśwież Tabelę</button>

<script>
document.getElementById("refreshButton").addEventListener("click", function() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableContainer").innerHTML = this.responseText;
        }
    };
    xhr.open("GET", "<?php echo $_SERVER['PHP_SELF']; ?>?generate_table=true", true);
    xhr.send();
});
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'kontakty');
    $id = $_POST['delete'];
    $id1 = mysqli_real_escape_string($conn, $id);
    $sql = "DELETE FROM kontakt WHERE id = '$id1'";
    if (!mysqli_query($conn, $sql)) {
        echo "<script>alert('Błąd podczas usuwania wpisu: " . mysqli_error($conn) . "');</script>";
    } else {
        echo "<script>window.location.href = '" . $_SERVER['PHP_SELF'] . "';</script>";
    }
    mysqli_close($conn);
}
?>

</body>
</html>

<?php
if (isset($_GET['generate_table']) && $_GET['generate_table'] == true) {
    $conn = mysqli_connect('localhost', 'root', '', 'kontakty');

    $table = "<table border='1'>" .
        "<tr>" .
        "<th>Imię</th>" .
        "<th>Nazwisko</th>" .
        "<th>Email</th>" .
        "<th>Numer telefonu</th>" .
        "<th>id</th>" .
        "<th>img</th>" .
        "<th>usuń</th>" .
        "</tr>";

    $result = mysqli_query($conn, "SELECT * FROM kontakt");
    if (!$result) {
        die("Błąd pobierania danych z bazy danych: " . mysqli_error($conn));
    }
    while ($row = mysqli_fetch_array($result)) {
        $table .= "<tr>" .
            "<td>" . $row['imie'] . "</td>" .
            "<td>" . $row['nazwisko'] . "</td>" .
            "<td>" . $row['email'] . "</td>" .
            "<td>" . $row['nr_telefon'] . "</td>" .
            "<td>" . $row['id'] . "</td>" .
            "<td><img src='" . $row['img'] . "' alt='Zdjęcie'></td>" .
            "<td>" .
            "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>" .
            "<input type='hidden' name='delete' value='" . $row['id'] . "'>" .
            "<button type='submit' name='submit'>Usuń</button>" .
            "</form>" .
            "</td>" .
            "</tr>";
    }

    $table .= "</table>";

    echo $table;

    mysqli_close($conn);
}
?>
