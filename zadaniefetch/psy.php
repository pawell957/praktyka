<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>psy</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<button onclick="getEntry()">Pobierz</button>
<br/>
<img id="image" src=""/>
<script>
    function getEntry() {
        const image = document.getElementById('image');

        if (image) {
            fetch('http://shibe.online/api/shibes?count=1&urls=true&httpsUrls=true')
                .then(response => response.json())
                .then(data => {
                    image.src = data[0]; 
                })
                .catch(error => console.error('Wystąpił błąd:', error));
        }
    }
</script>
</body>
</html>
