<?php
include_once 'handlers/connect.php';
session_start();
if (isset($_SESSION['id'])) {
	$getUserInfo = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
	$userInfoRes = mysqli_query($conn, $getUserInfo);
	if ($userInfoRes->num_rows > 0) {
		$userInfo = mysqli_fetch_assoc($userInfoRes);
		$role = $userInfo['is_admin'];
		if ($role != '1') {
			header('location:index.php');
			die();
		}
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
	<title>Posts</title>
</head>

<body>
	<?php include_once 'navbar.php'; ?>
	<div>
		<?php
		if (isset($_GET['f']) && $_GET['f'] == 'add') {
			echo "
        <form action='handlers/postsHandler.php' method='POST' enctype='multipart/form-data'>
        <label> Title </label>
        <input type='text' name='title'>
        <label> Body </label>
        <input type='text' name='body'>
        <label> Image </label>
        <input type='file' name='img'>
        <input type='submit' name='add' value='Add'>
        </form> ";
		} else if (isset($_GET['f']) && $_GET['f'] == 'edit') {
			$postID = $_GET['postID'];
			$getPostInfo = "SELECT * FROM posts WHERE id = '$postID'";
			$infoRes = mysqli_query($conn, $getPostInfo);
			if ($infoRes->num_rows > 0) {
				$postData = mysqli_fetch_assoc($infoRes);
				echo "
            <form action='handlers/postsHandler.php' method='POST' enctype='multipart/form-data'>
            <input type='hidden' name='postID' value='$postData[id]'>
            <label> Title </label>
            <input type='text' name='title' placeholder='$postData[title]'>
            <label> Body </label>
            <input type='text' name='body' placeholder='$postData[body]'>
            <label> Image </label>
            <input type='file' name='img'>
            <input type='submit' name='edit' value='Edit'>
            </form>
            ";
			} else {
				header('location:index.php');
				die();
			}
		} else if (isset($_GET['f']) && $_GET['f'] == 'delete') {
			$postID = $_GET['postID'];
			$getPostInfo = "SELECT * FROM posts WHERE id = '$postID'";
			$infoRes = mysqli_query($conn, $getPostInfo);
			if ($infoRes->num_rows > 0) {
				echo "<script> if(confirm ('are you sure you want to delete this POST?')){
				window.location.href = 'handlers/postsHandler.php?delete=$postID';
			} else {
				window.location.href = 'index.php';
			}</script>";
			} else {
				header('location:index.php');
				die();
			}
		}
		?>
	</div>
	<?php include_once 'footer.php'; ?>
</body>

</html>