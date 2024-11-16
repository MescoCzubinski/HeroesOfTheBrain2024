<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "heroes_of_the_brain";

$DB = new mysqli($servername, $username, $password, $dbname);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./src/styles/output.css">
    <!-- IMPORTANT!!! -->
    <link rel="stylesheet" href="./css/fontello.css">
    <link rel="stylesheet" href="./css/fontello-codes.css">
</head>
<body>
    <div class=" box">
    <div class=" ">
        <form action="game.php" method="POST" id="photoForm" class=" flex">
            <label for="image_uploads">Choose images to upload (PNG, JPG)</label>
            <input type="file" id="photos" accept="image/*" multiple label="choose 5 memes">
            <div class="preview">
                <p>No files currently selected for upload</p>
            </div> 
            <input type="submit" id="submit" class=" "></button>
        </form>
        <span id="files-count-alert" class=" hidden text-alert text-xl flex justify-center">Choose 5 files</span>
    </div>
    </div>
</body>
<script src="./src/scripts/script.js"></script>
</html>