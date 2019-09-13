<?php
$servername = "localhost";
$username = "larko3000";
$password = "07081997A";
$dbname = "blog";

$username_comment = $_POST['username'];
$comment = $_POST['comment'];
$today = date("y.m.d");
session_start();

if (!empty($username_comment) && !empty($comment))
     {
       $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "INSERT INTO comment_form (username, comment, registrer_date)
       VALUES ('$username_comment', '$comment', '$today')";
       $conn->exec($sql);
       $_SESSION['flash_comment_succ'] = 'Комментарий успешно добавлен';
       header("location: http://localhost/Marlin_Materialy/");
     }


elseif (empty($username_comment))
    {
      $_SESSION['flash_name_comment'] = 'Введите имя';
      header("location: http://localhost/Marlin_Materialy/");
    }
elseif (empty($comment))
    {
      $_SESSION['flash_comment'] = 'Введите комментарий';
      header("location: http://localhost/Marlin_Materialy/");
    }

?>
