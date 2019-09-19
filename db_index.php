<?php
$servername = "localhost";
$username = "larko3000";
$password = "07081997A";
$dbname = "blog";

session_start();
$comment = $_POST['comment'];
$today = date("y.m.d");

if (!empty($comment))
     {
       $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "INSERT INTO comment_form ( comment, registrer_date)
       VALUES ('$comment', '$today')";
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
