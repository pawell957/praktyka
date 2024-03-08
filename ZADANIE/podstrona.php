<?php
$conn = mysqli_connect('localhost', 'root', '', 'kontakty');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $id1 = mysqli_real_escape_string($conn, $id);
    $sql = "DELETE FROM kontakt WHERE id = '$id1'";
    if (!mysqli_query($conn, $sql)) {
        echo "Błąd podczas usuwania wpisu: " . mysqli_error($conn);
    } else {
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
}
?>

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

<script>
    var tableData = [
        <?php 
        $result = mysqli_query($conn, "SELECT * FROM kontakt");
        if (!$result) {
            die("Błąd pobierania danych z bazy danych: " . mysqli_error($conn));
        }
        while ($row = mysqli_fetch_array($result)): ?>
            {
                imie: '<?= $row['imie'] ?>',
                nazwisko: '<?= $row['nazwisko'] ?>',
                email: '<?= $row['email'] ?>',
                nr_telefon: '<?= $row['nr_telefon'] ?>',
                id: '<?= $row['id'] ?>',
                img: '<?= $row['img'] ?>'
            },
        <?php endwhile; ?>
    ];

    var table = "<table border='1'>" +
        "<tr>" +
        "<th>Imię</th>" +
        "<th>Nazwisko</th>" +
        "<th>Email</th>" +
        "<th>Numer telefonu</th>" +
        "<th>id</th>" +
        "<th>img</th>" +
        "<th>usuń</th>" +
        "</tr>";

    for (var i = 0; i < tableData.length; i++) {
        table += "<tr>" +
            "<td>" + tableData[i].imie + "</td>" +
            "<td>" + tableData[i].nazwisko + "</td>" +
            "<td>" + tableData[i].email + "</td>" +
            "<td>" + tableData[i].nr_telefon + "</td>" +
            "<td>" + tableData[i].id + "</td>" +
            "<td><img src='" + tableData[i].img + "' alt='Zdjęcie'></td>" +
            "<td>" +
            "<form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>'>" +
            "<input type='hidden' name='delete' value='" + tableData[i].id + "'>" +
            "<button type='submit' name='submit'>Usuń</button>" +
            "</form>" +
            "</td>" +
            "</tr>";
    }

    table += "</table>";

    document.getElementById('tableContainer').innerHTML = table;
</script>

<?php 
mysqli_close($conn);
?>

</body>
</html>
