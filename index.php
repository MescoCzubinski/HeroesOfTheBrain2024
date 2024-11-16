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
    <div class="gap-6 flex flex-col items-center justify-center">

      <form action="./queries.php" method="post">
        <label for="memes" class="text-alert">Add memes to begin!</label>
        <input type="file" id="memes" name="memes" accept="image/png, image/jpeg" />
      </form>

    </div>
    <!-- Wygląd przy zalogowanym użytkowniku -->



    <!-- Wygląd bez użytkownika -->

    <div class="gap-6 flex flex-col items-center justify-center">

      <form action="./queries.php" method="post">
        <label for="memes" class="text-alert">Add memes to begin!</label>
        <input type="file" id="memes" name="memes" accept="image/png, image/jpeg" />
      </form>

    </div>

    <!-- Wygląd bez użytkownika -->




  </div>
</body>
</html>