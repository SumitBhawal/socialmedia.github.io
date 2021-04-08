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
    <h2>Forgot Password?</h2>
    <p> No worries, we have got your back</p>
    <p>Just Enter your Emial-Id and we will send you a link to recover your Password</p>

    <div class="row">
      <form class="form needs-validation" action="send-mail.php" method="post" name="reset" novalidate>
        <div class="col-3 mx-auto">
          <p style="font-size: 1rem;">Please Enter your Email ID</p>
          <input class="form-control" type="email" name="email" placeholder="Email-ID" required>
          <button class="btn btn-primary btn-lg mt-3" action="send-mail" type="submit">Send link</button>
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