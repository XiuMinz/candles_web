<?php
include_once 'connect.php';
session_start();

if (isset($_POST['signup'])) {
    $email = trim(htmlspecialchars($_POST['email']));
    $uName = trim(htmlspecialchars($_POST['userName']));
    $pw = trim(htmlspecialchars($_POST['passWord']));

    // Validation
    // Check if empty
    if (empty($email) || empty($uName) || empty($pw)) {
        echo "Please fill all fields! <a href='../signup.php'>Try Again</a>";
        die();
    }
    // Check if email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo "Invalid Email! <a href='../signup.php'>Try Again</a>";
        die();
    }
    // Verify Uniqueness
    $emailChecker = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $emailChecker);
    if ($result->num_rows > 0) {
        echo "this email is already assigned <a href='../signin.php'>Login?</a>";
        die();
    } else {
        // Hash PW 
        $hashedPW = password_hash($pw, PASSWORD_DEFAULT);
        // Store user info
        $assignUser = "INSERT INTO users (email,name,password) VALUES ('$email','$uName','$hashedPW')";
        $assigningRes = $conn->query($assignUser);
        if ($assigningRes) {
            echo " <script>alert('User created successfully');</script> ";
            header('Refresh:1 ; URL = ../signin.php');
            die();
        } else {
            echo 'Error with the query,please try again later';
            die();
        }
    }
} else if (isset($_POST['signin'])) {
    $email = trim(htmlspecialchars($_POST['email']));
    $pw = trim(htmlspecialchars($_POST['passWord']));

    // Check if empty
    if (empty($email) || empty($pw)) {
        echo "Please fill all fields!<a href='../signin.php'>Try Again</a>";
        die();
    }
    // Validate Email
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo "Invalid Email! <a href='../signin.php'>Try Again</a>";
        die();
    }

    $getCred = "SELECT id,password FROM users WHERE email = '$email'";
    $credRes = mysqli_query($conn, $getCred);
    if ($credRes->num_rows > 0) {
        $userData = mysqli_fetch_assoc($credRes);
        // Verify PWs
        if (password_verify($pw, $userData['password'])) {
            $_SESSION['id'] = $userData['id'];
            header('location:../index.php');
            die();
        } else {
            echo "The password you entered is wrong, please try again <a href='../signin.php'> Login </a>";
            die();
        }
    } else {
        echo "This email is not assigned, <a href='../swignup.php'> Sign up? </a>";
        die();
    }
}
