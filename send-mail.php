  <?php

  $con = mysqli_connect('localhost', 'root', '12345');

  mysqli_select_db($con, 'memebook');
  $email = $_POST['email'];
  $q = " select * from signin where email='$email'";
  require 'includes/PHPMailer.php';
  require 'includes/SMTP.php';
  require 'includes/Exception.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  $q = " select * from signin where email='$email' ";
  $result = mysqli_query($con, $q);
  $num = mysqli_num_rows($result);
  if ($num == 1) {
    $userdata = mysqli_fetch_array($result);
    $username = $userdata['name'];
    $token = $userdata['token'];

    $mail = new PHPMailer();
    $mail->SMTPAuth = "true";
    $mail->SMTPSecure = 'tls';
    $mail->Port = "587";
    $mail->Username = "sumitbhawal1997@gmail.com";
    $mail->Password = "Roominthehouse@01";
    $mail->Subject = "Reset Password";
    $mail->setFrom("sumitbhawal1997@gmail.com");
    $mail->isHTML(true);
    $mail->Body = "<h1>Reset your password</h1><br><p>Hi, $username, To reset your password go to this link http://localhost/Meme-Book/reset?token=$token</p>";
    $mail->addAddress("$email");
    $mail->Send();
    header('location:login');
  } else {
    echo "Email ID not found";
  }



  ?>