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
    <div class="w-32 text-left m-2">
        <div class=" text-secondary-100 text-center text-xl pb-2">Top players</div>
        <?php
            $sql = "SELECT id, score, games FROM users ORDER BY score/games DESC LIMIT 5";
            $result = $DB->query(query: $sql);

            $pleace = 0;
            while($row = $result->fetch_assoc()):
                $pleace += 1;
        ?>
        <div class=" border-t-2 mb-2 pt-1 border-primary-300 player">
            <div class=" flex justify-between">
                <div class=" text-2xl pl-1 player-place gap-3"> <?php echo $pleace."." ?></div>
                <div class=" text-2xl text-secondary-100 pr-1"><?php echo $row['id'] ?></div>
            </div>
            <div>
                <div class=" flex justify-between player-stats">
                    <div class=" pl-1">
                        <i class="demo-icon icon-crown"></i>
                    <?php echo $row['score'] ?></div>
                    <div class=" pr-1">
                        <i class="demo-icon icon-gamepad"></i>
                    <?php echo $row['games'] ?></div>
                </div>
            </div>
        </div>
        <?php
            endwhile;
            $DB->close();
        ?> 
    </div>
</body>
</html>