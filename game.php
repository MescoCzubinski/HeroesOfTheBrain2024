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
</head>
<body>
<?php
$user = "player1";
$sql = "SELECT id, score, games FROM users ORDER BY score DESC";
$result = $DB->query(query: $sql);

while($row = $result->fetch_assoc()):?>
    <div class="">
        <div class=""><?php echo $row['id'] ?></div>
        <div class="">points: <?php echo $row['score'] ?></div>
        <div class="">played: <?php echo $row['games'] ?> game</div>
    </div>
<?php
endwhile;
$DB->close();
?> 
</body>
<script src="./src/scripts/script.js"></script>
</html>