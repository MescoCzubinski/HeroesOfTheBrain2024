<?php

var_dump($_POST);


if (isset($_POST['SEARCHED'])) :?>
    
    <?php

    $DB = new mysqli("localhost", "root", "", "heroes_of_the_brain");

    // Users searching for a game
    $users = mysqli_fetch_all($DB->query("SELECT id FROM users WHERE is_active=1"));    
    
    
    
  ?>

    <!-- HTML Content -->

<?php 

endif;


$DB->close();
?>