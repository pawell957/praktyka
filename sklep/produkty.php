<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkty</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .product {
            display: inline-block;
            width: 30%;
            margin: 10px;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .product img {
            display: block;
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .product h2 {
            font-size: 18px;
            margin-bottom: 5px;
        }
        .product p {
            font-size: 14px;
            margin-bottom: 10px;
        }
        .product button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
        .product button:hover {
            background-color: #0056b3;
        }
        #cart-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        #cart-link a {
            text-decoration: none;
            color: #007bff;
        }
        #cart-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Produkty</h1>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'sklep');

    // Pobierz wszystkie produkty
    $sql = "SELECT * FROM produkty";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product'>";
            echo "<h2>" . $row['produkt'] . "</h2>";
            echo "<img src='" . $row['zdjecie'] . "' alt='" . $row['produkt'] . "'><br>";
            echo "<p>" . $row['opis'] . "</p>";
            echo "<p>Cena: " . $row['cena'] . "</p>";
            echo "<button onclick='addToCart(" . $row['id'] . ")'>Dodaj do koszyka</button>";
            echo "</div>";
        }
    } else {
        echo "Brak produktów.";
    }

    mysqli_close($conn);
    ?>

    <div id="cart-link">
        <a href="koszyk.php">Przejdź do koszyka</a>
    </div>

    <script>
        function addToCart(productId) {
            // Pobierz aktualną zawartość koszyka lub utwórz nowy koszyk, jeśli jest pusty
            var cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Sprawdź, czy produkt jest już w koszyku
            var found = cart.find(item => item.productId === productId);

            // Jeśli produkt jest już w koszyku, zwiększ jego ilość, w przeciwnym razie dodaj go do koszyka
            if (found) {
                found.quantity++;
            } else {
                cart.push({ productId: productId, quantity: 1 });
            }

            // Zapisz koszyk zaktualizowany w pamięci przeglądarki
            localStorage.setItem('cart', JSON.stringify(cart));

            // Powiadom użytkownika, że produkt został dodany do koszyka
            alert("Produkt dodany do koszyka!");
        }
    </script>
</body>
</html>
