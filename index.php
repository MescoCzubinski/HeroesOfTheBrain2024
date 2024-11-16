<?php

session_start();

if(!isset($_COOKIE['user'])){
  $DB = new mysqli("localhost", "root", "", "heroes_of_the_brain");
  


  $DB->close();
}

var_dump($_COOKIE);
?>


<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./src/styles/output.css" rel="stylesheet">
</head>
<body>
  <!-- Wygląd przy zalogowanym użytkowniku -->
<?php if (isset($_COOKIE['user_id'])):?>
  <header class="flex justify-end pt-12 pr-20 w-full">
    <form action="queries.php" method="post">
      <input type="hidden" name="form" value="sign_out">
      <button type="submit">Sign Out</button>
    </form>
  </header>
  <!-- Wygląd przy zalogowanym użytkowniku -->


  <!-- Wygląd bez użytkownika -->
  <?php else: ?>

    <header class="flex justify-end pt-12 pr-20 w-full">
    <form action="queries.php" method="post" class="flex flex-row items-center gap-3">
      <input type="hidden" name="form" value="sign_up">
      <label for="user">Register here:</label>
      <input type="text" name="user" id="user" class="text-primary-300 p-3">
      <button type="submit"></button>
    </form>
  </header>

  <!-- Wygląd bez użytkownika -->

  <?php endif ?>

  <div class="flex flex-col w-full h-full items-center justify-center gap-6">
    
    <?php if (!empty($_COOKIE['user_id'])):?>
    <!-- Wygląd przy zalogowanym użytkowniku -->
    <div class="container">
      <h1>Let's Play!</h1>

      <form action="game.php" method="POST" id="photoForm">
          <input type="file" id="photos" accept="image/*" multiple>
          <input type="submit" id="submit">Upload</button>
      </form>
      <span id="files-count-alert" class=" hidden">Choose 5 files</span>

    </div>

    <!-- Wygląd przy zalogowanym użytkowniku -->
    
    <?php else:?>
    
    <!-- Wygląd bez użytkownika -->
    
    <div class="container">
      <h1><i>Log in</i> to start playing</h1>
      <form action="./queries.php" method="post" class="flex flex-row items-center gap-3">
        <label for="username"><strong>Your Username:</strong></label>
        <input type="text" name="user" id="user" class="text-primary-300 p-3">
        <input type="hidden" name="form" value="sign_in">
      </form>
      
    </div>
    
    <?php endif ?>
    <!-- Wygląd bez użytkownika -->




  </div>
</body>
<script src="./src/scripts/script.js"></script>
</html>