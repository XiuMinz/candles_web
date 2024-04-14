<?php 
include_once 'connect.php';
session_start();
$_SESSION['ID'] = '1';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="img/sticker.jpg">
                <img id="brand" src="img/sticker.jpg" alt="logo" width="45" height="40">
            </a>
            <a class="navbar-brand text-light" href="index.php" style="font-family:Garamond,Serif;font-size:xx-large;">Candles</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="addPosts.php">Add Post</a>
                    </li>
                </ul>
                <div class="d-flex text-light">
                    <form id="bu1" class="d-flex">
                        <button class="btn btn-sm btn-outline-secondary" type="button">
                            <a class="nav-link active" href="https://www.facebook.com/groups/501280138652327/?ref=share_group_link"><i class="bi bi-facebook"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                                </svg> Order Now</a>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <?php
    if (isset($_GET['f']) && $_GET['f'] == 'add') {
        echo "
        <form action='postsHandler.php' method='post' enctype='multipart/form-data'>
        <label> Title </label>
        <input type='text' name='title'>
        <label> Body </label>
        <input type='text' name='body'>
        <label> Image </label>
        <input type='file' name='img'>
        <input type='submit' name='add' value='add'>
        </form> ";
    } else if  (isset($_GET['f']) && $_GET['f'] == 'edit') {
        $postID = $_GET['postID'];
        $getPostInfo = "SELECT * FROM posts WHERE id = '$postID'";
        $infoRes = mysqli_query($conn,$getPostInfo);
        if($infoRes->num_rows > 0 ){
            $postData = mysqli_fetch_assoc($infoRes);
            echo "
            <form action='postsHandler.php' method='post' enctype='multipart/form-data'>
            <input type='hidden' name='postID' value='$postData[id]'>
            <label> Title </label>
            <input type='text' name='title' placeholder='$postData[title]'>
            <label> Body </label>
            <input type='text' name='body' placeholder='$postData[body]'>
            <label> Image </label>
            <input type='file' name='img'>
            <input type='submit' name='edit' value='edit'>
            </form>
            ";
        } else {
            echo "get out!";
        }
    }
    ?>
</body>
</html>