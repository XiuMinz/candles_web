<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
</head>

<body>
    <?php
    include_once 'navbar.php';
    $directory = "../img/gallery";
    // Get all files and directories in the specified directory
    $files = scandir($directory);
    // Loop through each file and directory
    foreach ($files as $file) {
        // Check if it's a regular file (not . or ..)
        if (is_file($directory . '/' . $file)) {
            echo "<img src='$directory/$file'> <a href=''>Browse</a>";
        }
    }
    include_once 'footer.php';
    ?>
</body>

</html>