<?php
 session_start();
 $new_name_user = $_POST['name'];
 $new_user_email = $_POST['email'];
 $email_check = filter_var($new_user_email, FILTER_VALIDATE_EMAIL);
 $user_id = $_SESSION['user_id'];
 $user_image = $_FILES['image'];
 // database action
 $queryBuilder = include __DIR__ . '/../../database/start.php';
 $recurrent_mail = $queryBuilder->getOneByRow('users', 'email', 'email', $new_user_email);

 //validation flag for username email image
 if (!empty($new_name_user)&&!empty($new_user_email)&&$email_check==true&&empty($recurrent_mail)
 &&$new_name_user!==$_SESSION['name_varify']&&$new_user_email!==$_SESSION['email_varify']&&!empty($user_image['size'])) {
     $success_validation_all = 1;
 }

 //validation flag for username image
 if (!empty($new_name_user)&&$new_name_user!==$_SESSION['name_varify']&&!empty($user_image_name)) {
     $success_validation_name_image = 1;
 }

 //validation flag for email image
 if (!empty($new_user_email)&&$email_check==true&&empty($recurrent_mail)&&$new_user_email!==$_SESSION['email_varify']&&!empty($user_image['size'])) {
     $success_validation_email_image = 1;
 }

 if (isset($success_validation_all)) {
   $user_image['name'] = uniqid() . substr($user_image['name'], -4);
   $user_image_name = $user_image['name'];
   move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../../img/' . $user_image['name']);
   // database action
   $recurrent_mail = $queryBuilder->update('users', [
     'username' => $new_name_user,
     'email' => $new_user_email,
     'image' => $user_image_name
   ], 'user_id', $_SESSION['user_id']);
   $_SESSION['name_varify'] = $new_name_user;
   $_SESSION['email_varify'] = $new_user_email;
   $_SESSION['flash_succ_update'] = 'Профиль успешно обновлен';
   header("Location: /profile");
 }

 elseif (isset($success_validation_name_image)) {
   $user_image['name'] = uniqid() . substr($_FILES['image']['name'], -4);
   dd($user_image['name']);
   $_SESSION['user_image'] = $user_image['name'];
   move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../../img/' . $user_image['name']);
   // database action
   $recurrent_mail = $queryBuilder->update('users', [
     'username' => $new_name_user,
     'image' => $user_image_name
   ], 'user_id', $_SESSION['user_id']);
   $_SESSION['name_varify'] = $new_name_user;
   $_SESSION['flash_succ_update'] = 'Профиль успешно обновлен';
   header("Location: /profile");
 }

 if (isset($success_validation_email_image)) {
   $user_image['name'] = uniqid() . substr($_FILES['image']['name'], -4);
   $_SESSION['user_image'] = $user_image['name'];
   move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../../img/' . $user_image['name']);
   // database action
   $recurrent_mail = $queryBuilder->update('users', [
     'email' => $new_user_email,
     'image' => $user_image_name
   ], 'user_id', $_SESSION['user_id']);
   $_SESSION['email_varify'] = $new_user_email;
   $_SESSION['flash_succ_update'] = 'Профиль успешно обновлен';
   header("Location: /profile");
 }

 elseif (isset($success_validation_name_email)) {
   // database action
   $recurrent_mail = $queryBuilder->update('users', [
     'username' => "$new_name_user",
     'email' => "$new_user_email"
   ], 'user_id', $_SESSION['user_id']);
   $_SESSION['name_varify'] = $new_name_user;
   $_SESSION['email_varify'] = $new_user_email;
   $_SESSION['flash_succ_update'] = 'Профиль успешно обновлен';
   header("Location: /profile");
 }

 elseif (!empty($user_image['size'])) {
   $user_image['name'] = uniqid() . substr($_FILES['image']['name'], -4);
   $_SESSION['user_image'] = $user_image['name'];
   $user_image_name = $user_image['name'];
   move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../../img/'.$user_image['name']);
   // database action
   $recurrent_mail = $queryBuilder->update('users', [
     'image' => "$user_image_name"
   ], 'user_id', $_SESSION['user_id']);
   $_SESSION['flash_succ_update'] = 'Профиль успешно обновлен';
   header("Location: /profile");
 }

 elseif ($new_name_user!==$_SESSION['name_varify']) {
   // database action
   $recurrent_mail = $queryBuilder->update('users', [
     'username' => "$new_name_user"
   ], 'user_id', $_SESSION['user_id']);
   $_SESSION['name_varify'] = $new_name_user;
   $_SESSION['flash_succ_update'] = 'Профиль успешно обновлен';
   header("Location: /profile");
 }

 elseif ($new_user_email!==$_SESSION['email_varify']) {
   // database action
   $recurrent_mail = $queryBuilder->update('users', [
     'email' => "$new_user_email"
   ], 'user_id', $_SESSION['user_id']);
   $_SESSION['email_varify'] = $new_user_email;
   $_SESSION['flash_succ_update'] = 'Профиль успешно обновлен';
   header("Location: /profile");
 }

 elseif ($new_name_user==$_SESSION['name_varify']&&$new_user_email==$_SESSION['email_varify']&&empty($user_image['size'])) {
   $_SESSION['flash_profile_empty_messege'] = 'Зополните поле';
   header("Location: /profile");
 }

 if ($email_check==false&&$new_user_email!==$_SESSION['email_varify']) {
   $_SESSION['flash_profile_email_form'] = 'Неправильный формат записи';
   header("Location: /profile");
 }

 elseif (!empty($recurrent_mail)&&$new_user_email!==$_SESSION['email_varify']) {
   $_SESSION['flash_profile_email_recurrent'] = 'Такой имейл существует';
   header("Location: /profile");
 }
