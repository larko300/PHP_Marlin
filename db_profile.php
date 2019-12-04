<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

session_start();
$new_name_user = $_POST['name'];
$new_user_email = $_POST['email'];
$email_check = filter_var($new_user_email, FILTER_VALIDATE_EMAIL);
$user_id = $_SESSION['user_id'];
$user_image = $_FILES['image'];

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT email FROM users WHERE email = '$email_check'";
$statement = $conn->query($sql);
$recurrent_mail = $statement->fetch(PDO::FETCH_ASSOC);

if (!empty($new_name_user)&&!empty($new_user_email)&&$email_check==true&&empty($recurrent_mail)
&&$new_name_user!==$_SESSION['name_varify']&&$new_user_email!==$_SESSION['email_varify']&&!empty($user_image)) {
  $user_image['name'] = uniqid() . substr($user_image['name'], -4);
  $user_image_name = $user_image['name'];
  move_uploaded_file($_FILES['image']['tmp_name'],'img/'.$user_image['name']);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE users SET username = '$new_name_user', email = '$new_user_email',image = '$user_image_name' WHERE user_id = '$user_id'";
  $conn->exec($sql);
  $_SESSION['name_varify'] = $new_name_user;
  $_SESSION['email_varify'] = $new_user_email;
  $_SESSION['flash_succ_update'] = 'Профиль успешно обновлен';
  header ("location:http://localhost/Marlin_Materialy/profile.php");
}
elseif (!empty($new_name_user)&&$new_name_user!==$_SESSION['name_varify']&&!empty($user_image)) {
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE users SET username = '$new_name_user' WHERE user_id = '$user_id'";
  $conn->exec($sql);
  $user_image['name'] = uniqid() . substr($_FILES['image']['name'], -4);
  $_SESSION['user_image'] = $user_image['name'];
  move_uploaded_file($_FILES['image']['tmp_name'],'img/'.$user_image['name']);
  $_SESSION['name_varify'] = $new_name_user;
  $_SESSION['flash_succ_update'] = 'Профиль успешно обновлен';
  header ("location:http://localhost/Marlin_Materialy/profile.php");
}
if (!empty($new_user_email)&&$email_check==true&&empty($recurrent_mail)&&$new_user_email!==$_SESSION['email_varify']&&!empty($user_image)) {
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE users SET email = '$new_user_email' WHERE user_id = '$user_id'";
  $conn->exec($sql);
  $user_image['name'] = uniqid() . substr($_FILES['image']['name'], -4);
  $_SESSION['user_image'] = $user_image['name'];
  move_uploaded_file($_FILES['image']['tmp_name'],'img/'.$user_image['name']);
  $_SESSION['email_varify'] = $new_user_email;
  $_SESSION['flash_succ_update'] = 'Профиль успешно обновлен';
  header ("location:http://localhost/Marlin_Materialy/profile.php");
}
elseif (!empty($new_name_user)&&!empty($new_user_email)&&$email_check==true&&empty($recurrent_mail)
&&$new_name_user!==$_SESSION['name_varify']&&$new_user_email!==$_SESSION['email_varify']) {
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE users SET username = '$new_name_user', email = '$new_user_email' WHERE user_id = '$user_id'";
  $conn->exec($sql);
  $_SESSION['name_varify'] = $new_name_user;
  $_SESSION['email_varify'] = $new_user_email;
  $_SESSION['flash_succ_update'] = 'Профиль успешно обновлен';
  header ("location:http://localhost/Marlin_Materialy/profile.php");
}
elseif (!empty($user_image)) {
  $user_image['name'] = uniqid() . substr($_FILES['image']['name'], -4);
  $_SESSION['user_image'] = $user_image['name'];
  move_uploaded_file($_FILES['image']['tmp_name'],'img/'.$user_image['name']);
  $_SESSION['flash_succ_update'] = 'Профиль успешно обновлен';
  header ("location:http://localhost/Marlin_Materialy/profile.php");
}
elseif ($new_name_user!==$_SESSION['name_varify']) {
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE users SET username = '$new_name_user' WHERE user_id = '$user_id'";
  $conn->exec($sql);
  $_SESSION['name_varify'] = $new_name_user;
  $_SESSION['flash_succ_update'] = 'Профиль успешно обновлен';
  header ("location:http://localhost/Marlin_Materialy/profile.php");
}
elseif ($new_user_email!==$_SESSION['email_varify']) {
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE users SET username = '$new_name_user', email = '$new_user_email' WHERE user_id = '$user_id'";
  $conn->exec($sql);
  $_SESSION['email_varify'] = $new_user_email;
  $_SESSION['flash_succ_update'] = 'Профиль успешно обновлен';
  header ("location:http://localhost/Marlin_Materialy/profile.php");
}
if ($email_check==false&&$new_user_email!==$_SESSION['email_varify']) {
  $_SESSION['flash_profile_email_form'] = 'Неправильный формат записи';
  header ("location:http://localhost/Marlin_Materialy/profile.php");
}
elseif (!empty($recurrent_mail)&&$new_user_email!==$_SESSION['email_varify']) {
  $_SESSION['flash_profile_email_recurrent'] = 'Такой имейл существует';
  header ("location:http://localhost/Marlin_Materialy/profile.php");
}



 ?>
