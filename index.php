<?php
include "dashboard/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MianwaliCodeHouse | Home</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
  <?php include "header.php" ?>
  <div class="intro container">
    <div class="s1">
      <h1>Welcome Here</h1>
      <p>Welcome to MianwaliCodeHouse, the YouTube channel owned by Muhammad Yasir Hussain that is dedicated to providing computer field students, programmers, web developers, and tech enthusiasts with valuable content. Our channel is an excellent resource for students who want to learn about programming languages like Python, C, C++, Java, HTML, CSS, JavaScript, PHP, WordPress, blogging, and more.</p>
      <a href="blog.php">Explore Articles</a>
    </div>
    <div class="s2">
      <img src="assets/side-img.jpg" alt="img">
    </div>
  </div>
  <div class="articales container">
    <h1>YouTube Video Posts</h1>
    <p>MianwaliCodeHouse is the perfect platform to enhance your skills and stay informed about the latest trends in the industry. Join our community of like-minded individuals who are passionate about technology and subscribe to our channel today!</p>
    <h2 style="font-weight: 400;">Recent Posts:</h2>
    <div class="posts container">
      <?php

      $q = "SELECT * FROM `posts` ORDER BY postid DESC";
      $rq = mysqli_query($db, $q);
      for ($i = 0; $i < 3; $i++) {
        $data = mysqli_fetch_assoc($rq);
      ?>
        <div class="post">
          <img src="dashboard/<?= $data["img"] ?>" alt="img">
          <h1><?= $data["title"] ?></h1>
          <p><?= $data["description"] ?></p>
          <p><big><b>Category: </b></big><?= $data["category"] ?></p>
          <a href="<?= $data["link"] ?>" target="_blank">Start Now</a>
        </div>

      <?php
      }
      ?>
    </div>
  </div>
  <h1 class="more"><a href="blog.php">Explore More</a></h1>
  <div class="about">
    <h1 id="about">About</h1>
    <p>The YouTube channel owned by Muhammad Yasir Hussain that is dedicated to providing computer field students, programmers, web developers, and tech enthusiasts with valuable content. Our channel is an excellent resource for students who want to learn about programming languages like Python, C, C++, Java, HTML, CSS, JavaScript, PHP, WordPress, blogging, and more. <br> <br>

      Our team of experienced professionals and experts is committed to delivering comprehensive tutorials, tips, and tricks on various computer-related topics. We also offer hands-on coding tutorials, lectures, and project demonstrations to help students better understand complex concepts. <br> <br>

      MianwaliCodeHouse is the perfect platform to enhance your skills and stay informed about the latest trends in the industry. Join our community of like-minded individuals who are passionate about technology and subscribe to our channel today!</p>
  </div>

  <?php include "footer.php" ?>
</body>

</html>