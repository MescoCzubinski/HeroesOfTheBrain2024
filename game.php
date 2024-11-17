<?php
$DB = new mysqli('localhost', 'root', '', 'heroes_of_the_brain');

var_dump($_POST);


if (isset($_POST['SEARCHED'])) : ?>

    <?php
    if (isset($_COOKIE['user_id'])) {
        $user = $_COOKIE['user_id'];
    }

    // Ur session:
    $match = mysqli_fetch_assoc($DB->query("SELECT * FROM matches WHERE (user1='$user' OR user2='$user') AND (user1 != '' AND user2 != '') LIMIT 1"));
    var_dump($match);

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
            <?php
                if (isset($match)):
            ?>
            <!-- Gdy użytkownik jest w grze -->
            <form method="post" enctype="multipart/form-data" action="queries.php">
                <div>
                    <label for="image_uploads" id="label-choose-meme">Choose 5 memes</label>
                    <input
                        type="file"
                        id="image_uploads"
                        name="image_uploads[]"
                        accept=".jpg, .jpeg, .png"
                        class="hidden"
                        multiple />
                    <input type="hidden" name="form" value="send_meme">
                    <input type="hidden" name="match" value="<?php echo $match['match_id']?>">

                </div>
                <div class="preview">
                    <p></p>
                </div>
                <div>
                    <button id="button-atack-meme">Atack!</button>
                </div>
            </form>
            <span id="files-count-alert" class=" hidden text-alert text-xl flex justify-center">Choose 5 files</span>
            <style>
                body {
                    padding: 0;
                    margin: 0;
                }

                form {
                    margin: 10px;
                    padding: 20px;
                    border: 1px solid black;
                }

                #label-choose-meme {
                    width: 200px;
                    height: 50px;
                    margin-left: auto;
                    margin-right: auto;
                    display: flex;
                    font-size: 24px;
                    justify-content: center;
                    align-items: center;
                    cursor: pointer;
                }

                .preview {
                    display: flex;
                    justify-content: center;
                }

                #button-atack-meme {
                    width: 200px;
                    height: 50px;
                    margin-left: auto;
                    margin-right: auto;
                    display: flex;
                    font-size: 24px;
                    justify-content: center;
                    align-items: center;
                    margin-top: 25px;
                    cursor: pointer;
                }

                form ol {
                    display: flex;
                    justify-content: center;
                    gap: 10px;
                    margin: 0;
                    padding: 0;
                    width: 100%;
                }

                img {
                    width: 100%;
                }

                form li,
                div>p {
                    display: flex;
                    margin: 0;
                    padding: 0;
                    align-items: center;
                    justify-content: center;
                    min-height: 360px;
                    flex: 1;
                }

                form label,
                form button {
                    background-color: #7f9ccb;
                    border: 1px solid black;
                    height: auto;
                }
            </style>
            <!-- Gdy użytkownik jest w grze -->

            <?php
                endif;
            ?>

            <!-- Gdy użytkownik nie ma gry -->
             
            <?php if (!isset($match)): ?>

                <div class="box h-full flex-col">
                    <h1>Oczekiwanie na przeciwnika</h1>
                    <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                </div>

                <link rel="stylesheet" href="./src/styles/spinner.css">

            <?php endif; ?>

            <!-- Gdy użytkownik nie ma gry -->

        </body>
        <script src="./src/scripts/script.js"></script>
        <!-- Gdy użytkownik nie ma gry -->
        <?php if (!isset($match)): ?>
            <script>
                setTimeout(function() {
                    window.location.reload(1);
                }, 5000);
            </script>
        <?php endif; ?>
        <!-- Gdy użytkownik nie ma gry -->

        </html>

<?php

    endif;

$DB->close(); ?>