<?php
session_start();
include 'dbcon.php';
if (!$con) {
  echo "Couldn't connect to database ";
} else {
  echo "Connected ";
}
if (isset($_GET['token'])) {
  $token = $_GET['token'];
  echo "$token ";
  if (isset($_POST['submit'])) {
    $newpassword = $_POST['newpassword'];
    $cpassword = $_POST['cpassword'];
    if ($newpassword == $cpassword) {
      $updatequery = " update signin set password='" . $newpassword . "' where token='" . $token . "'";
      $iquery = mysqli_query($con, $updatequery);
      if ($iquery) {
        header('location:login');
      }
    }
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recover Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>


<body>


  <nav class="navbar navbar-light" style="background-color: #1a1a1d;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="color: #2682ab;">
        <img src="img/Logo.png" alt="" width="30" height="24" class="d-inline-block align-top">
        MeMeBook
      </a>
  </nav>
  <div class="col-form-label-lg text-center pt-5">

    <h2>Reset your password</h2>
    <div class="row">
      <form class="form needs-validation" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" name="reset" novalidate>
        <div class="col-3 mx-auto">
          <p style="font-size: 1rem;">Please Enter your new password</p>
          <input class="form-control" type="text" name="newpassword" placeholder="Enter new password" required>
        </div>

        <div class="col-3 mx-auto">
          <p style="font-size: 1rem;">Confirm your password</p>
          <input class="form-control" type="text" name="cpassword" placeholder="Re-enter password" required>
        </div>

        <p style="font-size: 0.7rem;">Once you press the update password button <br> your password would be set to the new password</p>
        <button class="btn btn-primary" type="submit" name="submit">Update Password</button>
      </form>
    </div>

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