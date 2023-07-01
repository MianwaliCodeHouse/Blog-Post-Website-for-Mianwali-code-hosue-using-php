<?php
include "db.php";
if(isset($_GET["id"])){
  $id=$_GET["id"];
  if(!empty($id)){
    $q="select img from posts where postid=$id;";
    $rq=mysqli_query($db,$q);
    $data=mysqli_fetch_assoc($rq);
    $imgLink=$data["img"];
    unlink($imgLink);
    $q="DELETE FROM posts WHERE postid=$id;";
    if(mysqli_query($db,$q)){
      echo 1;
    }
  }
}
?>