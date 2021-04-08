<?php
session_start();
header('location:login');
$con = mysqli_connect('localhost', 'root', '12345');
if ($con) {
  echo "connection successful";
} else {
  echo "no connection";
}
mysqli_select_db($con, 'memebook');
$name = $_POST['user'];
$pass = $_POST['password'];
$email = $_POST['email'];
$token = bin2hex(random_bytes(15));

$q = " select * from signin where email='$email' ";

$result = mysqli_query($con, $q);
$num = mysqli_num_rows($result);
if ($num == 1) {
  echo " Email already registered";
} else {
  $qy = " insert into signin(name , password , email, token ) values('$name','$pass','$email','$token')";
  mysqli_query($con, $qy);
}
