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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sahar Store For Unique Candles">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../img/favIcon/favicon.ico">
	
	<title>Home</title>
</head>

<body>
	<?php include_once 'navbar.php'; ?>
	<!-- main html elements -->
	<div class="container">
		<!-- carousel -->
		<section>
			<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="../img/carouselActive.jpg" class='d-block w-100' alt='...'>
					</div>
					<?php
					$directory = "../img/carousel";
					// Get all files and directories in the specified directory
					$files = scandir($directory);
					// Loop through each file and directory
					foreach ($files as $file) {
						// Check if it's a regular file (not . or ..)
						if (is_file($directory . '/' . $file)) {
							echo "<div class='carousel-item'><img src='$directory/$file' class='d-block w-100' alt='...'></div>";
						}
					}
					?>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</section>
		<!-- cards -->
		<section>
			<div class='row my-4'>
				<?php
				// get Posts
				$getPosts = "SELECT * FROM posts";
				$posts = mysqli_query($conn, $getPosts);
				if ($posts->num_rows > 0) {
					foreach ($posts as $post) {
						echo "<div class='col-lg-4 col-md-6 mb-4'>
								<div class='card'>
									<img src='../img/posts/$post[img]' class='card-img-top'>
										<div class='card-body'>
											<h5 class='card-title'>$post[title]</h5>
												<p class='card-text'>$post[body]</p>";
						if ($role == '1') {
							echo "<a href=addPosts.php?f=edit&postID=$post[id]>Edit Post</a>     ";
							echo "<a href=addPosts.php?f=delete&postID=$post[id]>Delete Post</a>";
						} else if ($role == '0') {
							echo "<a href=postsHandler.php?f=liked&postID=$post[id]>Browse</a>";
						}
						echo "
										</div>
								</div>
							</div>";
					}
				}
				?>
			</div>
		</section>
	</div>
	<?php include_once 'footer.php'; ?>
</body>

</html>
