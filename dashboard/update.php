<?php
include "db.php";
if (isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["link"]) && isset($_POST["category"])) {

  $title = $_POST["title"];
  $description = $_POST["description"];
  $link = $_POST["link"];
  $category = $_POST["category"];

  $id = $_POST["id"];
  if (isset($_FILES["img"]["name"])) {
    if (!empty($id)) {
      $q = "select img from posts where postid=$id;";
      $rq = mysqli_query($db, $q);
      $data = mysqli_fetch_assoc($rq);
      $imgLink = $data["img"];
      unlink($imgLink);
      $q = "DELETE FROM posts WHERE postid=$id;";
      mysqli_query($db, $q);
    }
    $imgname = $_FILES["img"]["name"];
    $imgtmpname = $_FILES["img"]["tmp_name"];

    $img_explode = explode('.', $imgname);
    $img_ext = end($img_explode);
    $extensions = ["jpeg", "png", "jpg"];
    if (in_array($img_ext, $extensions) === true) {

      $time = time();
      $new_img_name = "mch" . $time . $imgname;
      if (move_uploaded_file($imgtmpname, "images/" . $new_img_name)) {

        $img_link = "images/" . $new_img_name;
        $q = "INSERT INTO `posts`(`title`, `description`, `link`, `img`, `category`) VALUES ('$title','$description','$link','$img_link','$category')";
        if (mysqli_query($db, $q)) {
          header("location: index.php");
        }
      }
    }
  } 
}



if (isset($_GET["id"])) {
  $id = $_GET["id"];
  if (!empty($id)) {
    $q = "select * from posts where postid=$id;";
    $rq = mysqli_query($db, $q);
    if (mysqli_num_rows($rq) == 1) {
      $data = mysqli_fetch_assoc($rq);
    } else {
      header("location: index.php");
    }
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Post</title>
  <link rel="stylesheet" href="css/form.css">
</head>

<body>
  <div class="form">
    <form action="" method="post" enctype="multipart/form-data">
      <h3>Title</h3>
      <input type="text" name="title" value="<?= $data["title"] ?>" required>
      <h3>Short description</h3>
      <textarea name="description" id="" cols="30" rows="5" required><?= $data["description"] ?></textarea>
      <h3>Link</h3>
      <input type="text" name="link" value="<?= $data["link"] ?>" required>
      <h3>Select Image</h3>
      <input type="file" name="img" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
      <h3>Category</h3>
      <input type="text" name="category" value="<?= $data["category"] ?>" required>
      <input type="number" name="id" value="<?= $_GET["id"] ?>" hidden>
      <button>Update Post</button>
    </form>
  </div>
</body>

</html>