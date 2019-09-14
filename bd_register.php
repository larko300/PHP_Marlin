<?php
$servername = "localhost";
$username = "larko3000";
$password = "07081997A";
$dbname = "blog";

$username_register = $_POST['name'];
$user_email = $_POST['email'];
$user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

if (!empty($username_register)&&!empty($user_email)&&!empty($user_password)) {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO register (username, email, password)
  VALUES ('$username_register', '$user_email', '$user_password')";
  $conn->exec($sql);
}
?>
