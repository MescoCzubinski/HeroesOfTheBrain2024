<?php

session_start();
$DB = new mysqli("localhost", "root", "", "heroes_of_the_brain");

if (isset($_POST['user'])) {
    $_COOKIE['user'] = $_POST['user'];
}

$DB->close();

?>