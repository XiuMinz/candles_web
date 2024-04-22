<?php
include_once 'handlers/connect.php';
session_start();
if (isset($_SESSION['id'])) {
    $getUserInfo = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
    $userInfoRes = mysqli_query($conn, $getUserInfo);
    if ($userInfoRes->num_rows > 0) {
        $userInfo = mysqli_fetch_assoc($userInfoRes);
        $name = explode(' ', $userInfo['name']);
        $fName = $userInfo['name'];
        $phoneNo = $userInfo['phone_number'];
        $email = $userInfo['email'];
        $imgName = $userInfo['img'];
        $memberSince = $userInfo['created_at'];
        $time_12hr_format = date("Y/m/d h:i:s A", strtotime($memberSince));
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
    <title>My Profile</title>
</head>

<body>
    <?php include_once 'navbar.php'; ?>
    <img src="../img/profiles/<?php echo $imgName ?>" alt="profile pic" ;>
    <h2>Name:</h2>
    <p><?php echo (count($name) >= 2) ? ucfirst($name[0]) . ' ' . ucfirst($name[1]) : ucfirst($name[0]); ?></p>
    <div><b>Member Since</b></div>
    <p><?php echo $time_12hr_format ?></p>
    <div><b>Membership Status</b></div>
    <p><?php echo ($role == '1') ? "Admin" : "Member"; ?></p>
    <div>
        <p>Edit Info</p>
        <form action="handlers/profileHandler.php" method="POST" enctype="multipart/form-data">
            <input name="id" value="<?php echo $_SESSION['id'] ?>" hidden>
            <label>Name:</label>
            <input type="text" placeholder="<?php echo $fName ?>" name="name">
            <br>
            <label>Phone Number:</label>
            <input type="text" placeholder="<?php echo $phoneNo ?>" name="phoneNo">
            <br>
            <label>Email Address:</label>
            <input placeholder="<?php echo $email ?>" disabled>
            <br>
            <label>Profile Picture</label>
            <input type="file" name="img" accept=".jpg, .png">
            <br>
            <input type="submit" value="Edit" name="edit">
        </form>
        <a href="changePW.php?f=c">Change Password?</a>
    </div>
    <?php include_once 'footer.php'; ?>
</body>

</html>