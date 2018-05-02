<?php
include 'db.php';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO testthai (name, price, date)
    VALUES ('$name','$price', NOW())";
    // use exec() because no results are returned
    $conn->exec($sql);
    header("Location:selectbootstrap.php");
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>