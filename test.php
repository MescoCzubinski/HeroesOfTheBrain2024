<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="game.php" method="post" enctype="multipart/form-data">
        <button type="submit">
            Wyślij
        </button>
        <input type="file" name="image" id="image">
        <input type="hidden" name="form" value="image_send">
    </form>
</body>
</html>