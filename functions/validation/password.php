<?php
session_start();
$user_mail = $_SESSION['email_varify'];
// database action
$queryBuilder = include __DIR__ . '/../../database/start.php';
$recurrent_password = $queryBuilder->getOneByRow('users', 'password', 'email', $user_mail);

$current_password = $_POST['current'];
$user_password =$_POST['password'];
$user_password_hashed = password_hash($user_password, PASSWORD_DEFAULT);
$user_password_confirmation = $_POST['password_confirmation'];
$password_verify = password_verify($current_password, $recurrent_password['password']);
$length_password = strlen($user_password_confirmation) > 5;
if ($user_password_confirmation==$user_password&&!empty($current_password)&&!empty($user_password)&&!empty($user_password_confirmation)&&$password_verify==true&&$length_password==true) {
  // database action
  $recurrent_mail = $queryBuilder->update('users', [
    'password' => $user_password_hashed,
  ], 'email', $user_mail);
  $_SESSION['succ_update_pass'] = 'Пароль успешно обновлен';
  header("Location: /profile");
}
elseif (empty($current_password)||empty($user_password)||empty($user_password_confirmation)) {
  $_SESSION['empty_flash'] = 'Все поля должны быть заполнены';
  header("Location: /profile");
}
elseif ($password_verify!==true) {
  $_SESSION['password_verify_prof_flash'] = 'Пароль введен неверно';
  header("Location: /profile");
}
elseif ($user_password_confirmation!==$user_password) {
  $_SESSION['confirmation_prof_flash'] = 'Пароли должны совпадать';
  header("Location: /profile");
}
