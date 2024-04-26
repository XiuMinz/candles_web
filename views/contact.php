<?php
include_once 'handlers/connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['id'])) {
    $getUserInfo = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
    $userInfoRes = mysqli_query($conn, $getUserInfo);
    if ($userInfoRes->num_rows > 0) {
        $userInfo = mysqli_fetch_assoc($userInfoRes);
        $userID = $userInfo['id'];
    }
} else {
    $userID = '0';
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='Sahar Store For Unique Candles'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Contact Us</title>
    <style>
        .container {
            padding: 20px;
        }
    </style>
</head>

<body>
    <?php include_once 'navbar.php'; ?>
    <!--content-->
    <div class='container'>
        <section>
            <h1 style='font-family:Papyrus,Fantasy;'>Contact Us</h1>
            <?php
            if ($userID != '0') {
                echo "
                <form class='mb-3' id='submit_form' action='handlers/contactHandler.php' method='POST'>
                <input name = 'userID' value = '$userID' hidden>
                <div class='mb-3'>
                    <label class='form-label'>Subject</label>
                    <input class='form-control' name='subject' >
                </div>
                <div class='mb-3'>
                    <label class='form-label'>Message</label>
                    <textarea class='form-control' name='message' rows='5'></textarea>
                </div>
                <input type='submit' name='contactUser' value='Send'>
            </form>
                ";
            } else {
                echo "
                <form class='mb-3' id='submit_form' action='handlers/contactHandler.php' method='POST'>
                <input name = 'userID' value = '$userID' hidden>
                <div class='mb-3'>
                    <label class='form-label'>Name</label>
                    <input type='text' name='name' class='form-control'>
                </div>
                <div class='mb-3'>
                    <label class='form-label'>Email</label>
                    <input type='email' name='email' class='form-control'>
                </div>
                <div class='mb-3'>
                    <label class='form-label'>Phone</label>
                    <input type='phone' name='phone' class='form-control'>
                </div>
                <div class='mb-3'>
                    <label class='form-label'>Subject</label>
                    <input class='form-control' name='subject' >
                </div>
                <div class='mb-3'>
                    <label class='form-label'>Message</label>
                    <textarea class='form-control' name='message' rows='5'></textarea>
                </div>
                <input type='submit' name='contactUs' value='Send'>
            </form>
                ";
            }
            ?>
        </section>
    </div>
    <?php include_once 'footer.php'; ?>
</body>

</html>