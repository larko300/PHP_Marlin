<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

session_start();
$user_log_name = $_SESSION['name_varify'];
$comment = $_POST['comment'];
$today = date("y.m.d");

if (!empty($comment))
     {
       $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "INSERT INTO comment_form (username, comment, date_comment)
       VALUES ('$user_log_name','$comment', '$today')";
       $conn->exec($sql);
       $_SESSION['flash_comment_succ'] = 'Комментарий успешно добавлен';
       header("location:http://localhost/Marlin_Materialy/index.php");
     }

else
    {
      $_SESSION['flash_comment'] = 'Введите комментарий';
      header("location:http://localhost/Marlin_Materialy/index.php");
    }

?>
