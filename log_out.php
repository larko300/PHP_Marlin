<?php
session_start();

if (isset($_COOKIE["email"])) {
  setcookie("email", "");
}
if (isset($_COOKIE["password"])) {
  setcookie("password", "");
}
header("location:http://localhost/Marlin_Materialy/index.php");

 session_destroy();

 ?>
