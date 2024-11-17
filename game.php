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
    <form method="post" enctype="multipart/form-data">
        <div>
          <label for="image_uploads" id="label-choose-meme">Choose 5 memes</label>
          <input
            type="file"
            id="image_uploads"
            name="image_uploads"
            accept=".jpg, .jpeg, .png"
            class="hidden"
            multiple
          />
        </div>
        <div class="preview">
          <p></p>
        </div>
        <div>
          <button id="button-atack-meme">Atack!</button>
        </div>
    </form>
    <span id="files-count-alert" class=" hidden text-alert text-xl flex justify-center">Choose 5 files</span>
<style>
body{
  padding: 0;
  margin: 0;
}
form {
  margin: 10px;
  padding: 20px; 
  border: 1px solid black;
}
#label-choose-meme{
  width: 200px;
  height: 50px;
  margin-left: auto;
  margin-right: auto;
  display: flex;
  font-size: 24px;
  justify-content: center;
  align-items: center;
}
.preview{
  display: flex;
  justify-content: center;
}
#button-atack-meme{
  width: 200px;
  height: 50px;
  margin-left: auto;
  margin-right: auto;
  display: flex;
  font-size: 24px;
  justify-content: center;
  align-items: center;
  margin-top: 25px;
}
form ol {
  display: flex;
  justify-content: center;
  gap: 10px;
  margin: 0;
  padding: 0;
  width: 100%;
}
img{
  width: 100%;
}
form li,
div > p {
  display: flex;
  margin: 0;
  padding: 0; 
  align-items: center;
  justify-content: center;
  min-height: 360px;
  flex: 1;
}
form label,
form button {
  background-color: #7f9ccb;
  border: 1px solid black;
  height: auto;
}
</style>
</body>
<script src="./src/scripts/script.js"></script>
</html>