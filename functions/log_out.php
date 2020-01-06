<?php

session_start();
if (isset($_COOKIE["email"])) {
  setcookie("email", "");
}
if (isset($_COOKIE["password"])) {
  setcookie("password", "");
}
header("Location: /");
session_destroy();
