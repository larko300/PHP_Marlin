<?php
session_start();

if (isset($_COOKIE["email"])) {
  setcookie("email", "");
}
if (isset($_COOKIE["password"])) {
  setcookie("password", "");
}
if (isset($_SESSION['email_varify'])) {
  unset($_SESSION['email_varify']);
}
if (isset($_SESSION['name_varify'])) {
  unset($_SESSION['name_varify']);
}
header("location:http://localhost/Marlin_Materialy/index.php");


 ?>
