<?php

session_start();

if (!isset($_COOKIE['user'])) {
  $DB = new mysqli("localhost", "root", "", "heroes_of_the_brain");


}

var_dump($_COOKIE);
?>


<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./src/styles/output.css" rel="stylesheet">

  <!-- IMPORTANT!!! -->
  <link rel="stylesheet" href="./css/fontello.css">
  <link rel="stylesheet" href="./css/fontello-codes.css">
</head>

<body>
  <main class="h-full w-full">
    <!-- Wygląd przy zalogowanym użytkowniku -->
    <?php if (isset($_COOKIE['user_id'])): ?>
      <header>
        <form action="queries.php" method="post">
          <input type="hidden" name="form" value="sign_out">
          <button type="submit">Sign Out</button>
        </form>
      </header>
      <!-- Wygląd przy zalogowanym użytkowniku -->


      <!-- Wygląd bez użytkownika -->
    <?php else: ?>

      <header>
        <form action="queries.php" method="post" class="flex flex-row items-center gap-3">
          <input type="hidden" name="form" value="sign_up">
          <label for="user">Register here:</label>
          <input type="text" name="user" id="user" class="text-primary-300 p-3">
          <button type="submit"></button>
        </form>
      </header>

      <!-- Wygląd bez użytkownika -->

    <?php endif ?>

    <div class="w-full h-full flex justify-center items-center ">

      <?php if (!empty($_COOKIE['user_id'])): ?>
        <!-- Wygląd przy zalogowanym użytkowniku -->
        <div class="box flex-col w-full">
          <h1>Let's Play!</h1>

          <form action="queries.php" method="post">
            <input type="submit" value="Graj!" class="cursor-pointer">
            <input type="hidden" name="form" value="is_active">
          </form>

        </div>

        <!-- Wygląd przy zalogowanym użytkowniku -->

      <?php else: ?>

        <!-- Wygląd bez użytkownika -->

        <div class="box flex-col w-full">
          <h1><i>Log in</i> to start playing</h1>
          <form action="./queries.php" method="post" class="flex flex-row items-center gap-3">
            <label for="username"><strong>Your Username:</strong></label>
            <input type="text" name="user" id="user" class="text-primary-300 p-3">
            <input type="hidden" name="form" value="sign_in">
          </form>

        </div>

      <?php endif ?>
      <!-- Wygląd bez użytkownika -->
      
          <menu class="">
              <?php @include './src/components/leaderboard.php' ?>
          </menu>

      <?php if (isset($_SESSION['is_active'])): ?>
        
      <?php endif ?>

    </div>
    
  </main>
</body>
<script src="./src/scripts/script.js"></script>
<?php $DB->close();?>
</html>