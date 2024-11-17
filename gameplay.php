<?php
if (isset($_COOKIE['user_id'])) {
    $user = $_COOKIE['user_id'];
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
$DB = new mysqli("localhost", "root", "", "heroes_of_the_brain");

$_POST['match_id'] = 1;

if (isset($_POST['match_id'])) {
    $match_id = $_POST['match_id']; 

    function get_user_id($user) {
        $DB = new mysqli("localhost", "root", "", "heroes_of_the_brain");
        $user_number_pointer = mysqli_fetch_assoc($DB->query("SELECT user1,user2 FROM matches WHERE user1='$user' OR user2='$user'"));
        if ($user_number_pointer['user1'] == $user) {
            return 1;
        } else {
            return 2;
        }
    }

    $user_id = get_user_id($user);
    $images = [];
    for ($i = 1; $i <= 5; $i++) {
        // Dynamically construct the column name
        $column_name = $user_id . "_meme_" . $i;
    
        if ($stmt = $DB->prepare("SELECT $column_name FROM matches WHERE match_id = ?")) {
            $stmt->bind_param("i", $match_id);
            $stmt->execute();
            $stmt->bind_result($image_data);
    
            // Fetch the result
            if ($stmt->fetch()) {
                $images[] = $image_data;
            } else {
                echo "No image found for meme $i.";
            }
    
            $stmt->close();
        }
    }
    
    // Debugging output to check the images array
    var_dump($images); // This will output the content of the images array
    
    // Return the images as a JSON response if any images are found
    if (!empty($images)) {
        header("Content-Type: application/json");
        echo json_encode($images);
    } else {
        echo "No images found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotating Images</title>
</head>
<body>
    <img id="rotatingImage" src="" alt="Match Image" />

    <script>
        fetch('http://localhost/PHP/gameplay.php', { method: 'POST', body: new URLSearchParams({ match_id: 1 }) })
    .then(response => response.json())
    .then(images => {
        console.log(images); // This will log the received images data in the console
        if (images.length > 0) {
            let currentIndex = 0;
            const rotatingImage = document.getElementById("rotatingImage");

            function getBlobUrl(binaryData) {
                const blob = new Blob([new Uint8Array(binaryData)], { type: 'image/png' });
                return URL.createObjectURL(blob);
            }

            rotatingImage.src = getBlobUrl(images[currentIndex]);

            setInterval(() => {
                currentIndex = (currentIndex + 1) % images.length;
                rotatingImage.src = getBlobUrl(images[currentIndex]);
            }, 5000);
        } else {
            console.error('No images found');
        }
    })
    .catch(error => {
        console.error('Error fetching images:', error);
    });

    </script>
</body>
</html>
