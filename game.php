<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./src/styles/output.css">
</head>
<body>
    <form action="game.php" method="POST" id="photoForm">
        <input type="file" id="photos" accept="image/*" multiple>
        <button type="submit" id="submit">Upload</button>
    </form>
    <span id="files-count-alert" class="hidden text-alert">Choose 5 files</span>
</body>
<script src="./src/styles/script.js"></script>
</html>