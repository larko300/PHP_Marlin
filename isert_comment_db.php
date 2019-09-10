<?php
$servername = "localhost";
$username = "larko3000";
$password = "07081997A";
$dbname = "blog";

$username_comment = $_POST['username'];
$comment = $_POST['comment'];
$today = date("y.m.d");


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO comment_form (username, comment, registrer_date)
    VALUES ('$username_comment', '$comment', '$today')";
    $conn->exec($sql);
    session_start();
    $_SESSION['flash'] = 'Комментарий успешно добавлен';
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

 header("location: http://localhost/Marlin_Materialy/");
?>
