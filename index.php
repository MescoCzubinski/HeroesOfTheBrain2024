<?php

session_start();

if(!isset($_COOKIE['user'])){
  $DB = new mysqli("localhost", "root", "", "heroes_of_the_brain");
  


  $DB->close();
}

?>


<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./src/styles/output.css" rel="stylesheet">
</head>
<body class="h-full">
  <div class="flex flex-col w-full h-full items-center justify-center gap-6">
    <h1>Let's Play!</h1>

    <!-- Wygląd przy zalogowanym użytkowniku -->
    <div class="container">

      <form action="game.php" method="POST" id="photoForm">
          <input type="file" id="photos" accept="image/*" multiple>
          <button type="submit" id="submit">Upload</button>
      </form>
      <span id="files-count-alert" class=" hidden">Choose 5 files</span>

    </div>
    <!-- Wygląd przy zalogowanym użytkowniku -->



    <!-- Wygląd bez użytkownika -->

    <div class="container hidden">

      <form action="./queries.php" method="post">
        <label for="memes" class="text-alert">Add memes to begin!</label>
        <input type="file" id="memes" name="memes" accept="image/png, image/jpeg" />
      </form>

    </div>

    <!-- Wygląd bez użytkownika -->




  </div>
</body>
<script src="./src/scripts/script.js"></script>
</html>