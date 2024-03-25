<?php
// Połączenie z bazą danych
$conn = mysqli_connect('localhost', 'root', '', 'sklep');

// Sprawdzenie czy udało się połączyć z bazą danych
if (!$conn) {
    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
}

// Pobranie danych z formularza
$adres = $_POST['adres'];
$dane_wysylki = $_POST['dane_wysylki'];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$nr_tel = $_POST['nr_tel'];
$platnosc = $_POST['platnosc'];

// Zapytanie SQL do zapisania danych do bazy danych
$sql = "INSERT INTO zamowienia (adres, dane_wysylki, imie, nazwisko, nr_tel, platnosc) 
        VALUES ('$adres', '$dane_wysylki', '$imie', '$nazwisko', '$nr_tel', '$platnosc')";

// Wykonanie zapytania SQL
if (mysqli_query($conn, $sql)) {
    echo "Zamówienie zostało złożone pomyślnie.";
} else {
    echo "Błąd podczas zapisywania zamówienia: " . mysqli_error($conn);
}

// Zamknięcie połączenia z bazą danych
mysqli_close($conn);
?>
