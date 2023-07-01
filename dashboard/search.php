<?php
include "db.php";
$search=$_GET["s"];
$q = "SELECT * FROM `posts` WHERE title LIKE '%$search%'";
$rq = mysqli_query($db, $q);
$rows = mysqli_num_rows($rq);
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