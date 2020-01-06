<?php
session_start();
$username_register = $_POST['name'];
$user_email = $_POST['email'];
$user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$user_password_confirmation = $_POST['password_confirmation'];
$email_check = filter_var($user_email, FILTER_VALIDATE_EMAIL);
$password_verify = password_verify($user_password_confirmation, $user_password);
$length_password = strlen($user_password_confirmation) > 5;

// database action
$queryBuilder = include __DIR__ . '/../../database/start.php';
$recurrent_mail = $queryBuilder->getAllByRow('users', 'email', $email_check);

//validation flag
if (!empty($username_register)&&!empty($user_email)&&!empty($user_password)
    &&!empty($user_password_confirmation)&&$email_check!==false&&$password_verify==true&&$length_password==true) {
    $success_validosion = 1;
}

if (empty($username_register)) {
  $_SESSION['flash_register_name'] = 'Введите имя';
  header('Location: /register');
}
if (empty($user_email)) {
  $_SESSION['flash_register_email'] = 'Введите имейл';
  header('Location: /register');
}
elseif ($email_check==false) {
  $_SESSION['flash_register_email_form'] = 'Неправильный формат записи';
  header('Location: /register');
}
elseif (!empty($recurrent_mail)) {
  $_SESSION['flash_register_email_recurrent'] = 'Такой имейл существует';
  header('Location: /register');
}
if (empty($user_password)||empty($user_password_confirmation)) {
  $_SESSION['flash_register_password'] = 'Введите пароль';
  header('Location: /register');
}
elseif (!strlen($user_password_confirmation) > 5) {
  $_SESSION['flash_register_password_min'] = 'Пароль должен состоять из мин. 6 символов';
  header('Location: /register');
}
elseif (!password_verify($user_password_confirmation, $user_password)) {
  $_SESSION['flash_register_password_verify'] = 'Пароли должны совпадать';
  header('Location: /register');
}
elseif ($success_validosion == 1) {
  $queryBuilder->create('users', [
    'username' => $username_register,
    'email' => $user_email,
    'password' => $user_password
  ]);
  header('Location: /login');
}
