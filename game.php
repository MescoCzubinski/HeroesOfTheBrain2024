<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./src/styles/output.css">
</head>
<body>
    <form action="game.php" method="POST" id="photoForm">
        <input type="file" id="photos" accept="image/*" multiple>
        <button type="submit" id="submit">Upload</button>
    </form>
    <span id="files-count-alert" class=" hidden">Choose 5 files</span>
    <script>
        const elementPhotos = document.querySelector('#photos')
        const elementFilesCountAlert = document.querySelector('#files-count-alert')

        elementPhotos.addEventListener('change', function() {
            const fileCount = this.files.length;
            if(fileCount != 5){
                elementPhotos.value = ''
                elementFilesCountAlert.classList.remove('hidden')
            } else {
                elementFilesCountAlert.classList.add('hidden')
            }
        });
    </script>
</body>
</html>