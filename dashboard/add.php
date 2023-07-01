<?php

if (isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["link"]) && isset($_POST["category"])) {
  include "db.php";
  $title = $_POST["title"];
  $description = $_POST["description"];
  $link = $_POST["link"];
  $category = $_POST["category"];

  if (isset($_FILES["img"])) {
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
      <h3>Post Title</h3>
      <input type="text" name="title" required>
      <h3>Post Short description</h3>
      <textarea name="description" id="" cols="30" rows="5" required></textarea>
      <h3>Add Link</h3>
      <input type="text" name="link" required>
      <h3>Post Image</h3>
      <input type="file" name="img" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
      <h3>Category</h3>
      <select name="category" id="" required>
        <option value="null">Choose Category</option>
        <option value="Course">Course</option>
        <option value="Project">Project</option>
        <option value="Video">Video</option>
      </select>
      <button>Add Post</button>
    </form>
  </div>
</body>

</html>