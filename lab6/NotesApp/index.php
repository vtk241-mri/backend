<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Замітки</h1>

    <form id="noteForm">
        <input type="text" id="title" placeholder="Заголовок" required><br>
        <textarea id="content" placeholder="Текст" required></textarea><br>
        <button type="submit">Додати замітку</button>
    </form>

    <div id="notes"></div>

    <script src="js/main.js"></script>
</body>

</html>