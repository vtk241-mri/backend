<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Файл не є зображенням.";
        $uploadOk = 0;
    }

    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedExtensions)) {
        echo "Тільки файли JPG, JPEG, PNG та GIF дозволені.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Вибачте, файл не було завантажено.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "Файл " . htmlspecialchars(basename($_FILES["image"]["name"])) . " був успішно завантажений.<br>";
            echo "<img src='$targetFile' alt='Uploaded Image' width='300'>";

        } else {
            echo "Сталася помилка при завантаженні файлу.";
        }
    }
    echo "<a href='upload.php'>Повернутись назад</a>";
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Завантаження зображення</title>
    </head>

    <body>
        <h2>Завантажте зображення на сервер</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label>Виберіть зображення:</label><br><br>
            <input type="file" name="image" accept="image/*" required><br><br>
            <button type="submit">Завантажити зображення</button>
        </form>
        <a href="index.php">Повернутись на головну</a>
    </body>

    </html>
    <?php
}
?>