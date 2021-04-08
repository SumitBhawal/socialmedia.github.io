<?php
session_start();
ob_start();
$con = mysqli_connect('localhost', 'root', '12345');
if (isset($_POST['submit'])) {
  mysqli_select_db($con, 'memebook');
  $name = $_POST['user'];
  $pass = $_POST['password'];
  $success = "Hi, $name";
  $fail = "Username or password incorrect";

  $q = " select * from signin where name ='$name' && password ='$pass' ";
  $result = mysqli_query($con, $q);
  $num = mysqli_num_rows($result);
  if ($num) {
    $_SESSION['username'] = $name;
    header('location:home');
  } else {
    header('location:fail-login');
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MeMEBook</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <nav class="navbar navbar-light" style="background-color: #1a1a1d;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="color: #2682ab;">
        <img src="img/Logo.png" alt="" width="30" height="24" class="d-inline-block align-top">
        MeMeBook
      </a>
      <?php $_SESSION['logged'] = '';
      if (isset($_SESSION['is_logged_in'])) { ?>
        <p class="text-white fs-3 fw-bold right">Hi, <?php echo $_SESSION['username']; ?></p>
        <a class="btn btn-primary" href="logout"> Logout </a>
      <?php } else { ?>
        <form class="row g-3 form needs-validation" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
          <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label text-white">Username</label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend">@</span>
              <input type="text" name="user" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
              <div class="valid-tooltip">
                Looks good!
              </div>
              <div class="invalid-tooltip">
                Please enter a username.
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="form-label text-white">Password</label>
            <input type="text" name="password" class="form-control" id="validationCustom01" required>
            <div class="valid-tooltip">
              Looks good!
            </div>
            <div class="invalid-tooltip">
              Please enter your password
            </div>
          </div>
          <div class="col mt-5">
            <button class="btn btn-primary btn-sm" name="submit" type="submit">Sign In</button>
            <a class="btn btn-primary-sm" style="color:white" href="mail">Forgot Password</a>
          </div>


        </form>
      <?php } ?>
  </nav>
  <div style="background: #010101;">
    <div>
      <img class="img-fluid" src="img/background-light.jpg" style="position: absolute;">
    </div>
    <?php if (isset($_SESSION['is_logged_in'])) { ?>
      <p class="container text-white fs-2 fw-bold right" style="position: relative; padding-top: 5%;">Hi, <?php echo $_SESSION['username']; ?> Welcome to MeMeBook</p>
      <p class="container text-white fs-4" style="position: relative;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam, odit repudiandae. Quisquam dolorum adipisci eius excepturi, fuga vero doloribus nobis veniam accusantium numquam ipsum harum, itaque repellendus! Quos minus vitae provident, modi voluptas atque saepe dolorum cum, nemo libero doloribus.</p>
    <?php } else { ?>
      <div class="container" style="position: relative; padding-top: 5%;">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Sorry!</strong> Email ID or Password Incorrect.
          <a href="recover" class="btn btn-primary">Forgot Password</a>
          <a href="login" class="btn btn-primary">Create a New account</a>
        </div>
      </div>
  </div>
<?php } ?>

</div>
<script>
  (function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
</script>
</body>

</html>