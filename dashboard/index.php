<?php
session_start();
include "db.php";
if (isset($_SESSION["name"]) && isset($_SESSION["pwd"])) {
  $name = $_SESSION["name"];
  $pwd = $_SESSION["pwd"];
  $q = "SELECT * FROM `admin` WHERE uname='$name' && pwd='$pwd'";
  $rq = mysqli_query($db, $q);
  if (mysqli_num_rows($rq) == 1) {
    $q = "SELECT * FROM `posts` ORDER BY postid DESC";
    $rq = mysqli_query($db, $q);
    $rows = mysqli_num_rows($rq);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin Panal</title>
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>

    <body>
      <header>
        <h1>Welcome to Dashboard</h1>
        <p>Here You can Add Blog Post , Delete Blog Post and Update Blog Post.</p>
      </header>
      <div class="container">
        <div class="s1">
          <div class="create">
            <a href="add.php">
              <i class="fa-solid fa-circle-plus"></i>
            </a>
            <a href="add.php" style="color: black; text-decoration: none;">
              <h2>Create New Post</h2>
            </a>

          </div>
          <div class="search">
            <input type="text" placeholder="Search Post" oninput="search(this.value)">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
        </div>
        <div class="posts" id="postsID">
          <?php
          if ($rows > 0) {
            while ($data = mysqli_fetch_assoc($rq)) {

          ?>
              <div class="post">
                <img src="<?= $data["img"] ?>" alt="img">
                <h1><?= $data["title"] ?> </h1>
                <p><?= $data["description"] ?></p>
                <p>
                  <big><b>Category: </b><?= $data["category"] ?></big>
                </p>

                <a href="update.php?id=<?= $data["postid"] ?>">Update</a>
                <a onclick="delete_post(<?= $data["postid"] ?>)" id="del">Delete</a>
              </div>
          <?php
            }
          }
          ?>

        </div>

      </div>
      </div>
    </body>
    <script src="js/script.js"></script>

    </html>

<?php

  } else {
    unset($_SESSION["name"]);
    unset($_SESSION["pwd"]);
    header("location: login.php");
  }
} else {
  header("location: login.php");
}

?>