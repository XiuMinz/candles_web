<?php
include_once 'connect.php';
session_start();

if (isset($_POST['add'])) {
    $title = trim(htmlspecialchars($_POST['title']));
    $body = trim(htmlspecialchars($_POST['body']));
    $img = $_FILES['img'];
    // Extract File info
    $imgName = $img['name'];
    $imgType = $img['type'];
    $imgTmpName = $img['tmp_name'];
    $imgSize = $img['size'];
    $imgErrors = $img['error'];

    // Validate File
    $imgExt = pathinfo($imgName, PATHINFO_EXTENSION);
    $allowedExt = ['jpg', 'png'];
    $imgSizeKB = $imgSize / 1024;
    $minSizeKB = 1;
    $maxSizeKB = 1000;

    if (!in_array($imgExt, $allowedExt)) {
        $errors[] = "Invalid File Format";
    } else if ($imgSizeKB < $minSizeKB || $imgSizeKB > $maxSizeKB) {
        $errors[] = "Invalid File Size";
    }
    if ($imgErrors != 0 || !empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p> <br>";
        }
        echo "Something went wrong, please try again";
        die();
    }
    // Save Image File
    $imgNewName = uniqid() . "." . $imgExt;
    move_uploaded_file($imgTmpName, "img/posts/$imgNewName");

    // Insert Data
    $insertPost = "INSERT INTO posts (user_id, title, body, img) VALUES ('1','$title','$body','$imgNewName')";
    $insertionRes = $conn->query($insertPost);
    if ($insertionRes) {
        header('location:addPosts.php');
    } else {
        echo "Something went wrong!";
    }
} else if (isset($_POST['edit'])) {
    $postID = trim(htmlspecialchars($_POST['postID']));
    $title = trim(htmlspecialchars($_POST['title']));
    $body = trim(htmlspecialchars($_POST['body']));
    $img = $_FILES['img'];
    // Extract File info
    $imgName = $img['name'];
    $imgType = $img['type'];
    $imgTmpName = $img['tmp_name'];
    $imgSize = $img['size'];
    $imgErrors = $img['error'];

    // Validate File
    $imgExt = pathinfo($imgName, PATHINFO_EXTENSION);
    $allowedExt = ['jpg', 'png'];
    $imgSizeKB = $imgSize / 1024;
    $minSizeKB = 1;
    $maxSizeKB = 1000;

    if (!in_array($imgExt, $allowedExt)) {
        $errors[] = "Invalid File Format";
    } else if ($imgSizeKB < $minSizeKB || $imgSizeKB > $maxSizeKB) {
        $errors[] = "Invalid File Size";
    }
    if ($imgErrors != 0 || !empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p> <br>";
        }
        echo "Something went wrong, please try again";
        die();
    }
    // Save Image File
    $imgNewName = uniqid() . "." . $imgExt;
    move_uploaded_file($imgTmpName, "img/posts/$imgNewName");
}
