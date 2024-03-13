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
    </style>
</head>
<body>
    <div id="container">
        <h1>Koszyk</h1>

        <div id="cart">
            <!-- Tutaj zostaną wyświetlone produkty w koszyku -->
        </div>

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