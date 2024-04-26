<?php
include_once 'connect.php';
if (isset($_POST['contactUser'])) {
    $userID = trim(htmlspecialchars($_POST['userID']));
    $subject = trim(htmlspecialchars($_POST['subject']));
    $message = trim(htmlspecialchars($_POST['message']));
    if (empty($subject) || empty($message) || empty($userID)) {
        echo "Fields can't be empty! <a href='../contact.php'>go back</a>";
        die();
    }
    $getUserInfo = "SELECT * FROM users WHERE id = '$userID'";
    $resultUInfo = $conn->query($getUserInfo);
    if ($resultUInfo->num_rows > 0) {
        $resultArray = $resultUInfo->fetch_assoc();
        $userName = $resultArray['name'];
        $userEmail = $resultArray['email'];
        $userPhone = $resultArray['phone_number'];
        $insertData = "INSERT INTO emails (user_id, name, email_address, phone_number, subject, content) VALUES ('$userID', '$userName', '$userEmail', '$userPhone', '$subject', '$message')";
        $insertionResult = $conn->query($insertData);
        if ($insertionResult) {
            echo "Sent successfully <a href='../contact.php'>go back</a>";
            die();
        } else {
            echo "something went wrong <a href='../contact.php'>go back</a>";
            die();
        }
    } else {
        echo "There's no data for this field <a href='../contact.php'>go back</a>";
        die();
    }
} else if (isset($_POST['contactUs'])) {
    $userID = trim(htmlspecialchars($_POST['userID']));
    $userName = trim(htmlspecialchars($_POST['name']));
    $userEmail = trim(htmlspecialchars($_POST['email']));
    $userPhone = trim(htmlspecialchars($_POST['phone']));
    $subject = trim(htmlspecialchars($_POST['subject']));
    $message = trim(htmlspecialchars($_POST['message']));
    if ( $userID != '0' || empty($userName) || empty($userEmail) || empty($userPhone) || empty($subject) || empty($message)) {
        echo "Fields can't be empty! <a href='../contact.php'>go back</a>";
        die();
    }
    $insertData = "INSERT INTO emails (user_id, name, email_address, phone_number, subject, content) VALUES ('$userID', '$userName', '$userEmail', '$userPhone', '$subject', '$message')";
    $insertionResult = $conn->query($insertData);
    if ($insertionResult) {
        echo "Sent successfully <a href='../contact.php'>go back</a>";
        die();
    } else {
        echo "something went wrong <a href='../contact.php'>go back</a>";
        die();
    }
}
