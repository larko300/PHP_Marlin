<?php
$servername = "localhost";
$username = "larko3000";
$password = "07081997A";
$dbname = "blog";

$username_name_comment = $_POST['username'];
$comment_of_user = $_POST['comment'];
$today = date("y.m.d");
session_start();

if (!isset($username_name_comment)) {
  $_SESSION['flash_name_comment'] = 'Введите имя';
  header("location: http://localhost/Marlin_Materialy/");
  }

  elseif (!isset($comment_of_user)) {
    $_SESSION['flash_comment'] = 'Введите комментарий';
    header("location: http://localhost/Marlin_Materialy/");
    else {


        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO comment_form (username, comment, registrer_date) VALUES ('$username_comment', '$comment', '$today')";
        $conn->exec($sql);
        $_SESSION['flash_comment_succ'] = 'Комментарий успешно добавлен';

        header("location: http://localhost/Marlin_Materialy/");

     }

   }


?>
