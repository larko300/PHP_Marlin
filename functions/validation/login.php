<?php

$user_email = $_POST['email'];
$user_password = $_POST['password'];
$checkbox = $_POST['remember'];

$queryBuilder = include __DIR__ . '/../../database/start.php';
$db_user_data = $queryBuilder->getAllByRow('users', 'email', $user_email);
$user_db_name = $db_user_data['username'];
$user_db_password = $db_user_data['password'];
$user_db_email = $db_user_data['email'];
$password_verify = password_verify($user_password, $user_db_password);
$email_check = filter_var($user_email, FILTER_VALIDATE_EMAIL);

session_start();

//validation flag
if ($password_verify==true&&$user_email==$user_db_email&&!empty($user_password)&&!empty($user_email)&&$email_check==true) {
    $success_validosion = 1;
}

if ($success_validosion == 1) {
  $_SESSION['email_varify'] = $user_db_email;
  $_SESSION['name_varify'] = $user_db_name;
  $_SESSION['user_id'] = $db_user_data['user_id'];
  if (strlen($checkbox) == 1) {
    setcookie("email", $user_db_email, time() + (10 * 24 * 365));
    setcookie("password", $user_password, time() + (10 * 24 * 365));
  }
  else {
    if (isset($_COOKIE["email"])) {
      setcookie("email", "");
    }
    if (isset($_COOKIE["password"])) {
      setcookie("password", "");
    }
  }
  header("Location: /");
}
elseif ($email_check==false) {
  $_SESSION['flash_login_email_form'] = 'Неправильный формат записи';
  header('Location: /login');
}
elseif (empty($user_email)) {
  $_SESSION['flash_verify_email_empty'] = 'Введите имейл';
  header('Location: /login');
}
elseif (empty($user_password)) {
  $_SESSION['flash_verify_password_empty'] = 'Введите пароль';
  header('Location: /login');
}
elseif ($user_email!==$user_db_email) {
  $_SESSION['flash_verify_email'] = 'Емайл указан неверно';
  header('Location: /login');
}
elseif ($password_verify==false) {
  $_SESSION['flash_verify_password'] = 'Пароль указан неверно';
  header('Location: /login');
}
