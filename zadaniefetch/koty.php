<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<button onclick="getEntry()">koty</button>
<br/>
<img id="image" src=""/>
<script>
    function getEntry() {
        const image = document.getElementById('image');

        if (image) {
            image.src = 'https://cataas.com/cat';
        }
    }
</script>
</body>
</html>
