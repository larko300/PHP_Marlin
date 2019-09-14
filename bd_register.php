<?php
$servername = "localhost";
$username = "larko3000";
$password = "07081997A";
$dbname = "blog";

session_start();
$username_register = $_POST['name'];
$user_email = $_POST['email'];
$user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$user_password_confirmation = $_POST['password_confirmation'];
$email_check = filter_var($user_email, FILTER_VALIDATE_EMAIL);
$password_verify = password_verify($user_password_confirmation, $user_password);
$length_password = strlen($user_password_confirmation) > 5;

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM register WHERE email = '$email_check'";
$statement = $conn->query($sql);
$recurrent_mail = $statement->fetchAll(PDO::FETCH_ASSOC);

if (empty($username_register)) {
  $_SESSION['flash_register_name'] = 'Введите имя';
  header ("location:http://localhost/Marlin_Materialy/register.php");
}
elseif (empty($user_email)) {
  $_SESSION['flash_register_email'] = 'Введите имейл';
  header ("location:http://localhost/Marlin_Materialy/register.php");
}
elseif ($email_check==false) {
  $_SESSION['flash_register_email_form'] = 'Неправильный формат записи';
  header ("location:http://localhost/Marlin_Materialy/register.php");
}
elseif (strlen($recurrent_mail) !== 0) {
  $_SESSION['flash_register_email_recurrent'] = 'Такой имейл существует';
  header ("location:http://localhost/Marlin_Materialy/register.php");
}
elseif (empty($user_password)||empty($user_password_confirmation)) {
  $_SESSION['flash_register_password'] = 'Введите пароль';
  header ("location:http://localhost/Marlin_Materialy/register.php");
}
elseif (!strlen($user_password_confirmation) > 5) {
  $_SESSION['flash_register_password_min'] = 'Пароль должен состоять из мин. 6 символов';
  header ("location:http://localhost/Marlin_Materialy/register.php");
}elseif (!password_verify($user_password_confirmation, $user_password)) {
  $_SESSION['flash_register_password_verify'] = 'Пароли должны совпадать';
  header ("location:http://localhost/Marlin_Materialy/register.php");
}
elseif (!empty($username_register)&&!empty($user_email)&&!empty($user_password)
    &&!empty($user_password_confirmation)&&$email_check!==false&&$password_verify==true&&$length_password==true) {
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO register (username, email, password)
  VALUES ('$username_register', '$user_email', '$user_password')";
  $conn->exec($sql);
  header ("location:http://localhost/Marlin_Materialy/register.php");
}

?>
