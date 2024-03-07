<?php

$conn = mysqli_connect('localhost', 'root', '', 'kontakty');



if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['delete'])) {
    $id = $_POST['delete'];

    $id1 = mysqli_real_escape_string($conn, $id);
    $sql = "DELETE FROM kontakt WHERE id = '$id';";
    if (!mysqli_query($conn, $sql)) {
        echo "Błąd podczas usuwania wpisu: " . mysqli_error($conn);
    } else {
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
}

$result = mysqli_query($conn, "SELECT * FROM kontakt");
if (!$result) {
    die("Błąd pobierania danych z bazy danych: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wpisy</title>
</head>
<body>

<h1>Wpisy z bazy danych:</h1>
<table border="1">
    <tr>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Email</th>
        <th>Numer telefonu</th>
        <th>id</th>
        <th>img</th>
        <th>usuń</th>
        
    </tr>
    <?php while ($row = mysqli_fetch_array($result)): ?>
        <tr>
            <td><?= $row['imie'] ?></td>
            <td><?= $row['nazwisko'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['nr_telefon'] ?></td>
            <td><?= $row['id'] ?></td>
            <td style="text-align: center;">
    <div style="display: flex; justify-content: center;">
        <img src="<?= $row['img'] ?>" alt="Zdjęcie" style="max-width: 100px; height: auto;">
    </div>
</td>
            <td>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="delete" value="<?= $row['id'] ?>">
                    <button type="submit" name="submit">Usuń</button>
                </form>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>

<?php mysqli_close($conn); ?>
