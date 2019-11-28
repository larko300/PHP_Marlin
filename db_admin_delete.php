<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$comment_id = $_GET['button_delete'];
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "DELETE FROM comment_form WHERE id_comment = '$comment_id'";
$conn->exec($sql);
 header("location:http://localhost/Marlin_Materialy/admin.php");
