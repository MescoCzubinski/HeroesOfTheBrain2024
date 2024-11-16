<!-- szukanie na serwerze -->
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "heroes_of_the_brain";

$conn = new mysqli($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="index.php" method="post">
    <input type="text" name="fraza" placeholder="szukaj">
    <input type="submit" value="Wyślij">
</form>

<br>
<?php
$search = $_POST['fraza'];
$search = '%'.$search.'%';
$sql = "SELECT imie, nazwisko FROM osoby WHERE imie LIKE '$search'";
$result = $conn->query(query: $sql);

while($row = $result->fetch_assoc()) {
    echo "<p>".$row['imie']." ".$row['nazwisko']."<p>";
}
$conn->close();
?>
</body>
</html>