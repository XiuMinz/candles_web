<?php
include_once 'handlers/connect.php';
session_start();

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Change Password</title>
</head>

<body>
    <?php
    if (isset($_SESSION['id']) && isset($_GET['f']) && $_GET['f'] == 'c') {
        $getUserInfo = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
        $userInfoRes = mysqli_query($conn, $getUserInfo);
        if ($userInfoRes->num_rows > 0) {
            $userInfo = mysqli_fetch_assoc($userInfoRes);
            $role = $userInfo['is_admin'];
            echo "    
                <form action='handlers/profileHandler.php' method='POST'>
                    <input name='id' value='<?php echo $_SESSION[id] ?>' hidden>
                    <label>Current Password:</label>
                    <input type='password' placeholder='**********' name='cPW'>
                    <br>
                    <label>New Password:</label>
                    <input type='password' name='nPW'>
                    <br>
                    <label>Confirm Password:</label>
                    <input type='password' name='rePW'>
                    <br>
                    <input type='submit' value='Change' name='changePW'>
                </form>";
        }
    } else if (isset($_GET['f']) && $_GET['f'] == 'f') {
        echo "
            <form action='handlers/profileHandler.php' method='POST'>
                <label>Email Address</label>
                <input type='email' name='email'>
                <br>
                <label>User Name</label>
                <input type='text' name='userName'>
                <br>
                <label>New Password:</label>
                <input type='password' name='nPW'>
                <br>
                <label>Confirm Password:</label>
                <input type='password' name='rePW'>
                <br>
                <input type='submit' value='Change' name='forgotPW'>
            </form>
            <a href='signin.php'>Login?</a>";
    } else {
        header('location:index.php');
        die();
    }
    ?>

</body>

</html>