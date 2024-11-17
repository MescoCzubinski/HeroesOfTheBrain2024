<?php
$DB = new mysqli('localhost', 'root', '', 'heroes_of_the_brain');

var_dump($_FILES);
if (isset($_POST['form'])) {
    $imageName = $_FILES['image']['name'];
    $imageType = $_FILES['image']['type'];
    $imageData = file_get_contents($_FILES['image']['tmp_name']);
    // var_dump($imageData);


    $stmt = $DB->prepare("UPDATE users SET meme1=(?) WHERE id='ukasz' ");
    $stmt->bind_param("s", $imageData);



    if ($stmt->execute()) {
        echo "Image uploaded successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $DB->close();
}
?>