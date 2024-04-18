<?php
include_once 'connect.php';
session_start();
if (isset($_SESSION['id'])) {
    $enteredID = trim(htmlspecialchars($_POST['id']));
    if ($_SESSION['id'] != $enteredID) {
        header('location:../signout.php');
        die();
    }
    if (isset($_POST['edit'])) {
        $nName = trim(htmlspecialchars($_POST['name']));
        $nPN = trim(htmlspecialchars($_POST['phoneNo']));
        $img = $_FILES['img'];
        if(empty($nName) && empty($nPN) && empty($img['name'])){
            header('location:../index.php');
            die();
        }
        if (filter_var($nPN, FILTER_VALIDATE_INT) === false) {
            echo "Invalid Phone Number, Try again <a href='../editProfile.php'>Try Again</a>";
            die();
        }
        $getUserInfo = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
        $userInfoRes = mysqli_query($conn, $getUserInfo);
        if ($userInfoRes->num_rows > 0) {
            $userInfo = mysqli_fetch_assoc($userInfoRes);
            $oName = $userInfo['name'];
            $oPN = $userInfo['phone_number'];
            $oImg = $userInfo['img'];
        }
        if (empty($nName)) {
            $nName = $oName;
        }
        if (empty($nPN)) {
            $nPN = $oPN;
        }
        if (!empty($img['name'])) {
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
            $maxSizeKB = 100;
            if (!in_array($imgExt, $allowedExt)) {
                $errors[] = "Invalid File Format, Must be jpg,png";
            }
            if ($imgSizeKB < $minSizeKB || $imgSizeKB > $maxSizeKB) {
                $errors[] = "Invalid File Size, Must be > $minSizeKB KB and < $maxSizeKB KB";
            }
            // if (filter_var($nPN, FILTER_VALIDATE_INT) === false) {
            //     $errors[] = "Invalid Phone Number!";
            // }
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo "<p>$error</p> <br>";
                }
                echo "Something went wrong, Try again later <a href='../editProfile.php'>Try Again</a>";
                die();
            }
            // Save Image File
            $imgNewName = uniqid() . "." . $imgExt;
            move_uploaded_file($imgTmpName, "img/profiles/$imgNewName");
        } else {
            $imgNewName = $oImg;
        }
        $updateProf = "UPDATE users SET name = '$nName', phone_number = '$nPN', img = '$imgNewName' WHERE id = '$enteredID'";
        $updateRes = $conn->query($updateProf);
        if ($updateRes) {
            header('location:../index.php');
            die();
        } else {
            header('location:../editProfile.php');
            die();
        }
    } else if (isset($_POST['changePW'])) {
        $currentPW = trim(htmlspecialchars($_POST['cPW']));
        $newPW = trim(htmlspecialchars($_POST['nPW']));
        $reNPW = trim(htmlspecialchars($_POST['rePW']));
        if ($newPW == $currentPW) {
            echo "New Password can't be the old one! <a href='changePW.php'>try again</a>";
            die();
        }
        if ($newPW != $reNPW) {
            echo "New Password doesn't match it self! <a href='changePW.php'>try again</a>";
            die();
        }
        $getPW = "SELECT password FROM users WHERE id = '$enteredID'";
        $pwRes = $conn->query($getPW);
        if ($pwRes->num_rows > 0) {
            $row = $pwRes->fetch_row();
            $userPW = $row['0'];
            // Verify PWs
            if (password_verify($currentPW, $userPW)) {
                $hashedPW = password_hash($newPW, PASSWORD_DEFAULT);
                $updatePW = "UPDATE users SET password='$hashedPW' WHERE id = '$enteredID'";
                $updateRes = $conn->query($updatePW);
                if ($updateRes) {
                    header('location:../index.php');
                    die();
                } else {
                    echo "Something went wrong, please try again <a href='changePW.php'> try again </a>";
                    die();
                }
            } else {
                echo "The password you entered is wrong, please try again <a href='changePW.php'> try again </a>";
                die();
            }
        } else {
            echo "Something went wrong, please contact the support!";
            die();
        }
    }
} else {
    header('location:../index.php');
    die();
}
