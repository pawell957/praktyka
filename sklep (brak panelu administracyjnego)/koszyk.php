<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        #container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        #cart {
            margin-bottom: 20px;
        }
        p {
            margin: 10px 0;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Koszyk</h1>

        <div id="cart">
            <!-- Tutaj zostaną wyświetlone produkty w koszyku -->
        </div>

        <h2>Dane do wysyłki</h2>
        <form action="zamowienie.php" method="post">
            <label for="adres">Adres:</label>
            <input type="text" id="adres" name="adres" required>

            <label for="dane_wysylki">Dane wysyłki:</label>
            <input type="text" id="dane_wysylki" name="dane_wysylki" required>

            <label for="imie">Imię:</label>
            <input type="text" id="imie" name="imie" required>

            <label for="nazwisko">Nazwisko:</label>
            <input type="text" id="nazwisko" name="nazwisko" required>

            <label for="nr_tel">Numer telefonu:</label>
            <input type="tel" id="nr_tel" name="nr_tel" required>

            <label for="platnosc">Metoda płatności:</label>
            <select id="platnosc" name="platnosc" required>
                <option value="gotowka">Gotówka</option>
                <option value="przelew">Przelew</option>
                <option value="karta">Karta</option>
            </select>

            <input type="submit" value="Złóż zamówienie">
        </form>

        <p><a href="produkty.php">Wróć do sklepu</a></p>
    </div>

    <script>
        function displayCart() {
            var cart = JSON.parse(localStorage.getItem('cart')) || [];
            var cartContainer = document.getElementById('cart');

            if (cart.length === 0) {
                cartContainer.innerHTML = "<p>Twój koszyk jest pusty.</p>";
            } else {
                var cartItems = '';

                cart.forEach(function(item) {
                    cartItems += "<p>Produkt ID: " + item.productId + ", Ilość: " + item.quantity + "</p>";
                });

                cartContainer.innerHTML = cartItems;
            }
        }

        displayCart();
    </script>
</body>
</html>
