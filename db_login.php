<?php
$servername = "localhost";
$username = "larko3000";
$password = "07081997A";
$dbname = "blog";

$user_email = $_POST['email'];
$user_password = $_POST['password'];

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM register WHERE email = '$user_email'";
$statement = $conn->query($sql);
$db_user_data = $statement->fetch(PDO::FETCH_ASSOC);
$user_db_name = $db_user_data['username'];
$user_db_password = $db_user_data['password'];
$user_db_email = $db_user_data['email'];
$password_verify = password_verify($user_password, $user_db_password);
session_start();

if ($password_verify==true&&$user_email==$user_db_email) {
  $_SESSION['email_varify'] = $user_db_email;
  $_SESSION['name_varify'] = $user_db_name;
  header("location:http://localhost/Marlin_Materialy/logined.php");
}
elseif ($user_email!==$user_db_email) {
  $_SESSION['flash_verify_email'] = 'Емайл указан неверно';
  header("location:http://localhost/Marlin_Materialy/login.php");
}
elseif ($password_verify==false) {
  $_SESSION['flash_verify_password'] = 'пароль указан неверно';
  header("location:http://localhost/Marlin_Materialy/login.php");
}



?>
