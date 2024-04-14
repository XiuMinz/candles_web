<?php
include_once 'connect.php';
session_start();
$_SESSION['ID'] = '1';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Sahar Store For Unique Candles">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CANDLES</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="img/sticker.jpg">
        <img id="brand" src="img/sticker.jpg" alt="logo" width="45" height="40">
      </a>
      <a class="navbar-brand text-light" href="index.php" style="font-family:Garamond,Serif;font-size:xx-large;">Candles</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link active " aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="about.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="addPosts.php?f=add">Add Post</a>
          </li>
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
  <!-- main html elements -->
  <div class="container">
    <!-- carousel -->
    <section>
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/carousel1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/carousel11.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/carousel12.jpg" class="d-block w-100" alt="...">
          </div>
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
            echo "
          <div class='col-lg-4 col-md-6 mb-4'>
            <div class='card'>
              <img src='img/posts/$post[img]' class='card-img-top'>
              <div class='card-body'>
                <h5 class='card-title'>$post[title]</h5>
                <p class='card-text'>$post[body]</p>";
            if ($_SESSION['ID'] == '1') {
              echo "<a href=addPosts.php?f=edit&postID=$post[id]>edit</a>";
            }
            echo "
              </div>
            </div>
          </div>
          ";
          }
        }
        ?>
      </div>
    </section>
  </div>
  <section>
    <footer class="bg-dark text-center py-3">
      <div class="container" style="margin-top:30px">
        <div class="row" id="row1">
          <div class="col-sm-4">
            <div class="footer-div">
              <ul class="footer-links">
                <li>
                  <a href="about.php">About Us</a>
                </li>
                <li>
                  <a href="contact.php">Contact Us</a>
                </li>
                <li>
                  <a href="#">Gallery</a>
                </li>
              </ul>
            </div>


            <hr class="d-sm-none">
          </div>

          <div class="col-sm-4">
            <div class="footer-div">
              <ul class="icons">
                <li>
                  <a class="icon-link" href="https://www.facebook.com/groups/501280138652327">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                      <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                    </svg>
                    Facebook
                  </a>
                </li>
                <li>
                  <a class="icon-link" href="https://www.instagram.com/candles4498/?igshid=ZDdkNTZiNTM%3D&fbclid=IwAR0s_X243HW3BDNnb3XjtwTKFB3pnKWxWux239y9RwhiKt0Kr7P0e7A2HRk">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                      <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                    </svg>
                    Instagram
                  </a>
                </li>
              </ul>
            </div>
            <hr class="d-sm-none">
          </div>
          <div class="col-sm-4" id="logo-footer">
            <div class="footer-div">
              <img class="circular-imge-footer" src="img/sticker.jpg" alt="candle logo">
              <br>
            </div>
          </div>
        </div>
        <div class="row" id="row2"></div>
        <span class="text-light" style="font-family:Garamond,Serif;font-size:x-large;">&copy; 2024 Sahar Candles by ENAS_BADR</span>
      </div>
    </footer>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script>
    $(document).ready(function() {
      $('.like-btn').click(function(e) {
        e.preventDefault();
        if ($(this).hasClass('like')) {
          $(this).removeClass('like');
          $(this).addClass('dislike');
          $(this).php('Dislike');
        } else {
          $(this).removeClass('dislike');
          $(this).addClass('like');
          $(this).php('Like');
        }
      });
    });
  </script>
</body>

</html>