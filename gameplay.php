<?php
if (isset($_COOKIE['user_id'])) {
    $user = $_COOKIE['user_id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['fetchImages'])) {
    header("Content-Type: application/json");

    // Database credentials
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'heroes_of_the_brain';

    try {
        $conn = new mysqli($host, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            throw new Exception("Database connection failed: " . $conn->connect_error);
        }

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

        // Match ID and user-specific memes
        $matchId = 4; // Example: Adjust dynamically based on your logic
        $userColumnPrefix = get_user_id($user).'_meme_'; 

        // Query to fetch images for a specific user in a match
        $result = $conn->query("SELECT `$userColumnPrefix" . "1`, `$userColumnPrefix" . "2`, `$userColumnPrefix" . "3`, `$userColumnPrefix" . "4`, `$userColumnPrefix" . "5` 
                                FROM matches 
                                WHERE match_id = $matchId");
        if (!$result || $result->num_rows === 0) {
            throw new Exception("No match found for match ID $matchId");
        }

        $row = $result->fetch_assoc();
        $images = [];

        // Convert BLOBs to Base64
        foreach ($row as $blob) {
            $images[] = base64_encode($blob);
        }

        // Respond with JSON
        if (empty($images)) {
            echo json_encode([
                "success" => false,
                "message" => "No images found for user"
            ]);
        } else {
            echo json_encode([
                "success" => true,
                "images" => $images
            ]);
        }
    } catch (Exception $e) {
        echo json_encode([
            "success" => false,
            "message" => $e->getMessage()
        ]);
    }

    exit; // End script execution after responding with JSON
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meme Viewer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        img {
            max-width: 80%;
            max-height: 500px;
            margin: 20px 0;
            border: 2px solid #ccc;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
    <link rel="stylesheet" href="./src/styles/output.css">
</head>
<body class="bg-primary=100 flex justify-center flex-col">
    <h1 class=" opacity-80"><span class="text-alert">Opponent</span> <b><i>memes</i></b></h1>
    <div class="w-full flex justify-center">

        <img id="meme-image" class="w-fit" alt="Loading..." />
    </div>
    <p class="error" id="error-message"></p>

    <script>
        async function fetchImages() {
            try {
                // Fetch JSON data from the same file
                const response = await fetch('?fetchImages=true');
                const data = await response.json();

                if (data.success && data.images.length > 0) {
                    let currentIndex = 0;
                    const imgElement = document.getElementById('meme-image');

                    function showNextImage() {
                        if (currentIndex >= data.images.length) {
                            currentIndex = 0; // Loop back to the first image
                        }

                        imgElement.src = `data:image/jpeg;base64,${data.images[currentIndex]}`;
                        imgElement.alt = `Meme ${currentIndex + 1}`;
                        currentIndex++;
                    }

                    // Start showing images every 5 seconds
                    showNextImage();
                    setInterval(showNextImage, 5000);
                    infoAPI = curl_getinfo('http://localhost:5000/api/predict')
                    console.log(infoAPI);
                    
                } else {
                    document.getElementById('error-message').textContent = data.message || "No images found";
                }
            } catch (error) {
                console.error("Error fetching images:", error);
                document.getElementById('error-message').textContent = "Error fetching images. Check the console for details.";
            }
        }

        fetchImages();
    </script>
</body>
</html>
