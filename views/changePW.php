<?php
include_once 'handlers/connect.php';
session_start();
if (isset($_SESSION['id'])) {
	$getUserInfo = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
	$userInfoRes = mysqli_query($conn, $getUserInfo);
	if ($userInfoRes->num_rows > 0) {
		$userInfo = mysqli_fetch_assoc($userInfoRes);
		$role = $userInfo['is_admin'];

	}
} else {
	header('location:index.php');
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
<form action="handlers/profileHandler.php" method="post">
            <input name="id" value="<?php echo $_SESSION['id'] ?>" hidden>
            <label>Current Password:</label>
            <input type="password" placeholder="**********" name="cPW">
            <br>
            <label>New Password:</label>
            <input type="password" name="nPW">
            <br>
            <label>Confirm Password:</label>
            <input type="password" name="rePW">
            <br>
            <input type="submit" value="Change" name="changePW">
        </form>
</body>
</html>