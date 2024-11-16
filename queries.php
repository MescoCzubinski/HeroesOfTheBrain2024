<?php

var_dump($_POST);

session_start();
$DB = new mysqli("localhost", "root", "", "heroes_of_the_brain");


if (isset($_COOKIE['user_id'])) {
    $user = $_COOKIE['user_id'];
}

if (isset($_POST['form'])) {
    $form = $_POST['form'];
}

if (isset($_POST['user'])) {
    $user = $_POST['user'];
}




// Przetwarzanie formularza LOGOWANIA
if ($form == 'sign_in') {
    if(isset($user)){
        
        $user_info = mysqli_fetch_assoc($DB->query("SELECT id FROM users WHERE id='$user'"));
        
        setcookie('user_id', $user_info['id'], time() + (86400 * 30));
        var_dump($_COOKIE);
        header("Location: index.php");
        exit;
    }
}

// Przetwarzanie formularza REJESTRACJI
if ($form == "sign_up"){
    if (isset($user)) {
        $stmt = $DB->prepare("INSERT INTO users(id) VALUES (?)");
    
        $stmt->bind_param("s", $user);
    
        $stmt->execute();
        header("Location: index.php");
        exit;
    }
}

// Przetwarzanie WYLOGOWANIA
if ($form == "sign_out"){
    unset($_COOKIE['user_id']); 
    setcookie('user_id', '', -1);
    header("Location: index.php");
    exit;
}

// Przetwarzanie WYSZUKIWANIA GRY
if ($form == "is_active"){
    $stmt = $DB->prepare("UPDATE users SET is_active=1 WHERE id='$user'"); 

    $stmt->execute();
    header("Location: game.php");
    exit;
}

$DB->close();

?>