<?php
$servername = "localhost";
$username = "larko3000";
$password = "07081997A";
$dbname = "blog";

$username_comment = $_POST['username'];
$comment = $_POST['comment'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO comment_form (username, comment)
    VALUES ('$username_comment', '$comment')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>
