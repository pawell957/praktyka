<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>psy2</title>
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
            fetch('https://http.dog/100.jpg')
                .then(response => {
                    if (response.ok) {
                        return response.blob();
                    }
                    throw new Error('Network response was not ok.');
                })
                .then(blob => {
                    const imageUrl = URL.createObjectURL(blob);
                    image.src = imageUrl;
                })
                .catch(error => console.error('Wystąpił błąd:', error));
        }
    }
</script>
</body>
</html>
