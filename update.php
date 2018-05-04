<?php
include 'db.php';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : ''; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE testthai SET name = '$name', price = '$price', date = NOW() WHERE id=  $id";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    
    //header("Location:selectbootstrap.php");
    echo "<script>
    alert('แก้ไขสำเร็จ');
    window.location.href='selectbootstrap.php';
    </script>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>