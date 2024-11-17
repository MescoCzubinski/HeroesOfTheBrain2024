<?php
session_start();
$DB = new mysqli("localhost", "root", "", "heroes_of_the_brain");

if (isset($_GET['match_id']) && isset($_GET['image_number'])) {
    $match_id = intval($_GET['match_id']); 
    $image_number = intval($_GET['image_number']);

    $column_name = "1_meme_" . $image_number; 
    if ($stmt = $DB->prepare("SELECT $column_name FROM matches WHERE match_id = ?")) {
        $stmt->bind_param("i", $match_id);
        $stmt->execute();
        $stmt->bind_result($image_data);

        if ($stmt->fetch()) {
            header("Content-Type: image/png");
            echo $image_data;
        }
        $stmt->close();
    }

    $DB->close();
    exit; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotating Images</title>
    <link rel="stylesheet" href="./src/styles/output.css">
    <script>
        let imageNumber = 1;
        const matchId = 1; 

        function rotateImages() {
            const imgElement = document.getElementById('rotatingImage');
            imgElement.src = `?fetch_image=1&match_id=${matchId}&image_number=${imageNumber}`;
            imageNumber = (imageNumber % 5) + 1
        }
        setTimeout(rotateImages, 5000);
        window.onload = rotateImages;

        function loadDoc() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("demo").innerHTML ="aaa"
                this.responseText;
            }
            xhttp.open("GET", "ajax_info.txt");
            xhttp.send();
        }
    </script>
</head>
<body>
    <img id="rotatingImage" src="" alt="Match Image">
</body>
</html>
