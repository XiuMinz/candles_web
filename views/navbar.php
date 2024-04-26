<?php
include_once 'handlers/connect.php';
if(session_status() == PHP_SESSION_NONE){
session_start();
}
if (isset($_SESSION['id'])) {
	$getUserInfo = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
	$userInfoRes = mysqli_query($conn, $getUserInfo);
	if ($userInfoRes->num_rows > 0) {
		$userInfo = mysqli_fetch_assoc($userInfoRes);
		$role = $userInfo['is_admin'];
	}
} else {
	$role = '2';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../img/favIcon/favicon.ico">
    <link rel="stylesheet" href="../CSS/normalize.css">
    <link rel="stylesheet" href="../CSS/all.min.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<style>
    <?php 
        if($role == '0'){
            echo "
            .admin{
                display:none;
            }
            .non-user{
                display:none;
            }";
        } else if ($role == '1'){
            echo ".non-user{ display:none; }";
        } else {
            echo ".user{ display:none; }";
        }
    ?>
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../img/sticker.jpg">
                <img id="brand" src="../img/sticker.jpg" alt="logo" width="45" height="40">
            </a>
            <a class="navbar-brand text-light" href="index.php" style="font-family:Garamond,Serif;font-size:xx-large;">Candles</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class='nav-item non-user'><a class='nav-link' href='signin.php'>Sign in</a></li>
                    <li class='nav-item'><a class='nav-link active' aria-current='page' href='index.php'>Home</a></li>
                    <li class='nav-item'><a class='nav-link' href='about.php'>About Us</a></li>
                    <li class='nav-item'><a class='nav-link' href='contact.php'>Contact Us</a></li>
                    <li class='nav-item user'><a class='nav-link' href='editProfile.php'>Edit Profile</a></li>
                    <li class='nav-item user admin'><a class='nav-link' href='addPosts.php?f=add'>Add Post</a></li>
                    <li class='nav-item user'><a class='nav-link' href='signout.php'>Sign Out</a></li>
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
<script src="../JS/all.min.js"></script>
<script src="../JS/bootstrap.bundle.min.js"></script>
</body>

</html>