<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
include 'db.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    $sql = "DELETE FROM testthai WHERE id=$id";

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