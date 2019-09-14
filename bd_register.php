<?php
$servername = "localhost";
$username = "larko3000";
$password = "07081997A";
$dbname = "blog";

$username_register = $_POST['name'];
$user_email = $_POST['email'];
$user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$user_password_confirmation = $_POST['password_confirmation'];
$email_check = filter_var($user_email, FILTER_VALIDATE_EMAIL);
if (!empty($username_register)&&!empty($user_email)&&!empty($user_password)
    &&!empty($user_password_confirmation)&&$email_check!==false) {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO register (username, email, password)
  VALUES ('$username_register', '$user_email', '$user_password')";
  $conn->exec($sql);
}
elseif (empty($username_register)) {
  session_start();
  $_SESSION['flash_register_name'] = 'Введите имя';
  header ("location:http://localhost/Marlin_Materialy/register.php");
}
elseif (empty($user_email)) {
  session_start();
  $_SESSION['flash_register_email'] = 'Введите имейл';
  header ("location:http://localhost/Marlin_Materialy/register.php");
}
elseif ($email_check==false) {
  session_start();
  $_SESSION['flash_register_email_form'] = 'Неправильный формат записи';
  header ("location:http://localhost/Marlin_Materialy/register.php");
}
elseif (empty($user_password)||empty($user_password_confirmation)) {
  session_start();
  $_SESSION['flash_register_password'] = 'Введите пароль';
  header ("location:http://localhost/Marlin_Materialy/register.php");
}
?>
