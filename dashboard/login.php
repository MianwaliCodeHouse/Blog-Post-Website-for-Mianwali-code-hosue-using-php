<?php
include "db.php";

if (isset($_POST["name"]) && isset($_POST["pwd"])) {
  $name = $_POST["name"];
  $pwd = $_POST["pwd"];

  if (!empty($name) && !empty($pwd)) {
    print_r($_POST);
    $q = "SELECT * FROM `admin` WHERE uname='$name' && pwd='$pwd'";
    $rq = mysqli_query($db, $q);
    if (mysqli_num_rows($rq) == 1) {
      session_start();
      $_SESSION["name"] = $name;
      $_SESSION["pwd"] = $pwd;
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
  <title>Document</title>
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <div class="container">
    <form action="" method="post" class="form card">
      <div class="card_header">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
          <path fill="none" d="M0 0h24v24H0z"></path>
          <path fill="currentColor" d="M4 15h2v5h12V4H6v5H4V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6zm6-4V8l5 4-5 4v-3H2v-2h8z"></path>
        </svg>
        <h1 class="form_heading">Sign in</h1>
      </div>
      <div class="field">
        <label for="username">Username</label>
        <input class="input" name="name" type="text" placeholder="Username" id="username">
      </div>
      <div class="field">
        <label for="password">Password</label>
        <input class="input" name="pwd" type="password" placeholder="Password" id="password">
      </div>
      <div class="field">
        <button class="button">Login</button>
      </div>
    </form>
  </div>
</body>

</html>