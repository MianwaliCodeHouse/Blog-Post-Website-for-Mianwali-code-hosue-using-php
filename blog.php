<?php

include "dashboard/db.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MianwaliCodeHouse | Blog</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/blog.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
  <?php include "header.php" ?>


  <div class="articales container">
    <h1>YouTube Videos , Courses & Projects Posts</h1>
    <p>Join our community of like-minded individuals who are passionate about technology and subscribe to our channel today! <b><a href="">Subcribe us</a></b></p>

    <?php
    $q = "SELECT * FROM `posts` WHERE category='Course' ORDER BY postid DESC";
    $rq = mysqli_query($db, $q);
    if (mysqli_num_rows($rq) > 0) {


    ?>
      <h2>Courses</h2>
      <div class="posts container">
        <?php

        while ($data = mysqli_fetch_assoc($rq)) {


        ?>
          <div class="post">
            <img src="dashboard/<?= $data["img"] ?>" alt="img">
            <h1><?= $data["title"] ?></h1>
            <p><?= $data["description"] ?></p>
            <a href="<?= $data["link"] ?>" target="_blank">Start Now</a>
          </div>
      <?php
        }
        ?>
      </div>
        <?php
      }
      ?>
    <?php
    $q = "SELECT * FROM `posts` WHERE category='Project' ORDER BY postid DESC";
    $rq = mysqli_query($db, $q);
    if (mysqli_num_rows($rq) > 0) {


    ?>
      <h2>Project</h2>
      <div class="posts container">
        <?php

        while ($data = mysqli_fetch_assoc($rq)) {


        ?>
          <div class="post">
            <img src="dashboard/<?= $data["img"] ?>" alt="img">
            <h1><?= $data["title"] ?></h1>
            <p><?= $data["description"] ?></p>
            <a href="<?= $data["link"] ?>" target="_blank">Start Now</a>
          </div>
      <?php
        }
        ?>
      </div>
        <?php
      }
      ?>
    <?php
    $q = "SELECT * FROM `posts` WHERE category='Video' ORDER BY postid DESC";
    $rq = mysqli_query($db, $q);
    if (mysqli_num_rows($rq) > 0) {


    ?>
      <h2>Videos</h2>
      <div class="posts container">
        <?php

        while ($data = mysqli_fetch_assoc($rq)) {


        ?>
          <div class="post">
            <img src="dashboard/<?= $data["img"] ?>" alt="img">
            <h1><?= $data["title"] ?></h1>
            <p><?= $data["description"] ?></p>
            <a href="<?= $data["link"] ?>" target="_blank">Start Now</a>
          </div>
      <?php
        }
        ?>
      </div>
        <?php
      }
      ?>

      </div>
  </div>

  <div class="footer">
    <?php include "footer.php" ?>
  </div>
</body>

</html>