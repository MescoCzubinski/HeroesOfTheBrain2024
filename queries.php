
<!DOCTYPE html>
<!-- style=" background-color:#011528" -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./src/styles/input.css">
</head>
<body class="bg-primary-100 w-screen h-screen">
    <div class="">

        <?php

// var_dump($_FILES);

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
if ($form == "is_active"):
    
    // UPDATE USERS STATUS
    $stmt = $DB->prepare("UPDATE users SET is_active=1 WHERE id='$user'"); 
    $stmt->execute();
    
    $existing_match = mysqli_fetch_assoc($DB->query("SELECT match_id FROM matches WHERE NOT user1='$user' LIMIT 1"));
    // CREATE A MATCH SESSION
    if(empty($existing_match)){
        $stmt = $DB->prepare("INSERT INTO matches(user1) VALUES (?)");
        $stmt->bind_param("s", $user);
        $stmt->execute();
    }
    
    
    if(!empty($existing_match)){
        $match = $existing_match['match_id'];
        $stmt = $DB->prepare("UPDATE matches SET user2='$user' WHERE match_id=$match"); 
        $stmt->execute();
    };
    ?>
    
    <!-- SPRAWDZAMY TUTAJ CZY UŻYTKOWNIK WYSZUKAŁ GRE -->
    <form action="game.php" method="post" id="SEARCHED">
        <input type="hidden" name="SEARCHED" value="1">
    </form>

    <script type="text/javascript">
        document.getElementById('SEARCHED').submit(); // SUBMIT FORM
        </script>

<?php
    exit;
    
endif;

// Przetwarzanie WSTAWIANIA MEMÓW
if ($form=="send_meme") {
    $image_uploads=$_FILES['image_uploads'];

    function get_user_id($user){
        $DB = new mysqli("localhost", "root", "", "heroes_of_the_brain");
        $user_number_pointer = mysqli_fetch_assoc($DB->query("SELECT user1,user2 FROM matches WHERE user1='$user' OR user2='$user'")); //its to dermine if he is a user1 or user2 (FOR DB PURPOSE)
        if($user_number_pointer['user1']==$user){
            return 1;
        }
        else{
            return 2;
        }
    }

    


    // var_dump($imageData);
    $match = $_POST['match'];
    for ($i=0; $i <= 4; $i++) { 
            $imageName = $image_uploads['name'][$i];
            $imageType = $image_uploads['type'][$i];
            $imageData = file_get_contents($image_uploads['tmp_name'][$i]);
            $indeks = $i+1;

            $final_meme_id = get_user_id($user).'_meme_'.$indeks;
            $ready_number = get_user_id($user).'_ready';
            // print_r($final_meme_id);
            $stmt = $DB->prepare("UPDATE matches SET $final_meme_id=(?), $ready_number=(?) WHERE match_id='$match' ");
            $stmt->bind_param("si", $imageData, '1');
            $stmt->execute();
        }
        // echo '<br>';
    }
    $DB->close();
    ?>
    <!-- SPRAWDZAMY TUTAJ CZY UŻYTKOWNIK WYSZUKAŁ GRE -->
    <form action="gameplay.php" method="post" id="meme_sent">
        <input type="hidden" name="match_id" value="<?php echo $match ?>">
    </form>

    <script type="text/javascript">
        document.getElementById('meme_sent').submit(); // SUBMIT FORM
        </script>


</div>
</body>
</html>