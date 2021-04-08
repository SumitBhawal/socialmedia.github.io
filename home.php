<?php

session_start();
if (!isset($_SESSION['username'])) {
  header('location:login');
} else {
  $_SESSION['is_logged_in'] = true;
  if (isset($_SESSION['is_logged_in'])) {
    $_SESSION['logged'] = "You are logged in already";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-light" style="background-color: #1a1a1d;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="color: #2682ab;">
        <img src="img/Logo.png" alt="" width="30" height="24" class="d-inline-block align-top">
        MeMeBook
      </a>
      <p class="text-white fs-3 fw-bold right">Hi, <?php echo $_SESSION['username']; ?></p>
      <a class="btn btn-primary" href="logout"> Logout </a>
  </nav>
  <div style="background: #010101;">
    <div>
      <img class="img-fluid" src="img/background-light.jpg" style="position: absolute;">
    </div>
    <div class="container" style="position: relative; padding-top: 5%;">
      <h2 class="text-center fs-1 fw-bold" style="color:#2682ab">
        Welcome to MeMe-Book <br> <?php echo $_SESSION['username']; ?>
      </h2>

    </div>
</body>

</html>