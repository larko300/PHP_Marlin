<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

session_start();
$user_mail = $_SESSION['email_varify'];
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT password FROM users WHERE email = '$user_mail'";
$statement = $conn->query($sql);
$recurrent_password = $statement->fetch(PDO::FETCH_ASSOC);

$current_password = $_POST['current'];
$user_password =$_POST['password'];
$user_password_hashed = password_hash($user_password, PASSWORD_DEFAULT);
$user_password_confirmation = $_POST['password_confirmation'];
$password_verify = password_verify($current_password, $recurrent_password['password']);
$length_password = strlen($user_password_confirmation) > 5;

if ($user_password_confirmation==$user_password&&!empty($current_password)&&!empty($user_password)&&!empty($user_password_confirmation)&&$password_verify==true&&$length_password==true) {
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE users SET password = '$user_password_hashed' WHERE email = '$user_mail'";
  $conn->exec($sql);
  $_SESSION['succ_update_pass'] = 'Пароль успешно обновлен';
  header ("location:http://localhost/Marlin_Materialy/profile.php");
}

elseif (empty($current_password)||empty($user_password)||empty($user_password_confirmation)) {
  $_SESSION['empty_flash'] = 'Все поля должны быть заполнены';
  header ("location:http://localhost/Marlin_Materialy/profile.php");
}

elseif ($password_verify!==true) {
  $_SESSION['password_verify_prof_flash'] = 'Пароль введен неверно';
  header ("location:http://localhost/Marlin_Materialy/profile.php");
}

elseif ($user_password_confirmation!==$user_password) {
  $_SESSION['confirmation_prof_flash'] = 'Пароли должны совпадать';
  header ("location:http://localhost/Marlin_Materialy/profile.php");
}

 ?>
