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

    if (empty($title)) {
        $errors[] =  "Post must have Title!";
    }
    if (empty($body)) {
        $errors[] =  "Post must have Body!";
    }
    if (empty($img['name'])) {
        $errors[] = "Post must have an image!";
    }
    if (!in_array($imgExt, $allowedExt)) {
        $errors[] = "Invalid File Format!";
    }
    if ($imgSizeKB < $minSizeKB || $imgSizeKB > $maxSizeKB) {
        $errors[] = "Invalid File Size!";
    }
    if ($imgErrors != 0 || !empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        die();
    }
    // Save Image File
    $imgNewName = uniqid() . "." . $imgExt;
    move_uploaded_file($imgTmpName, "img/posts/$imgNewName");

    // Insert Data
    $insertPost = "INSERT INTO posts (user_id, title, body, img) VALUES ('1','$title','$body','$imgNewName')";
    $insertionRes = $conn->query($insertPost);
    if ($insertionRes) {
        header('location:../index.php');
    } else {
        echo "Something went wrong!";
    }
} else if (isset($_POST['edit'])) {
    $postID = trim(htmlspecialchars($_POST['postID']));
    // get old data
    $getOldData = "SELECT * FROM posts WHERE id = '$postID'";
    $result = mysqli_query($conn, $getOldData);
    if ($result->num_rows > 0) {
        $oldData = mysqli_fetch_assoc($result);
        $oldTitle = $oldData['title'];
        $oldBody = $oldData['body'];
        $oldImgName = $oldData['img'];
    }
    $title = trim(htmlspecialchars($_POST['title']));
    $body = trim(htmlspecialchars($_POST['body']));
    $img = $_FILES['img'];
    // Verify inputs
    if (empty($title)) {
        $title = $oldTitle;
    }
    if (empty($body)) {
        $body = $oldBody;
    }
    if (!empty($img['name'])) {
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
            die();
        }
        // Save Image File
        $imgNewName = $oldImgName;
        move_uploaded_file($imgTmpName, "img/posts/$imgNewName");
    } else {
        $imgNewName = $oldImgName;
    }
    // Save edit
    $updatePost = "UPDATE posts SET title = '$title', body = '$body', img = '$imgNewName' WHERE id = '$postID'";
    $result = mysqli_query($conn, $updatePost);
    if ($result) {
        header("Location:../index.php");
    } else {
        echo "something went wrong, try again later";
    }
} else if (isset($_GET['delete'])) {
    $postID = trim(htmlspecialchars($_GET['delete']));
    $getPosimg = "SELECT img FROM posts WHERE id = '$postID'";
    $result = $conn->query($getPosimg);
    $img = $result->fetch_assoc();
    $imgName = $img['img'];
    $deletePost = "DELETE FROM posts WHERE id = '$postID'";
    if(file_exists("img/posts/$imgName")){
        unlink("img/posts/$imgName");
    }
    $deleteRes = $conn->query($deletePost);
    if ($deleteRes) {
        header("Location:../index.php");
    }
}
