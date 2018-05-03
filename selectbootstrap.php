<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
  <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
  <h2>Hover Rows</h2>
  <table class="table table-hover">
    <thead>
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <tr>
<?php
include 'db.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, name, price, date FROM testthai"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->FetchAll(PDO::FETCH_ASSOC); 

    foreach($result as $row){ 
        ?> <td> <?php echo $row['id']; ?> </td>
         <td> <?php echo $row['name']; ?> </td>
         <td> <?php echo $row['price']; ?> </td>
         <td> <?php echo $row['date']; ?> </td>
         <td><a href="#" class="btn btn-warning" role="button">แก้ไข</a>
         <a href="delete.php?id= <?php echo $row['id']; ?>" class="btn btn-danger" role="button" onclick="return confirm('ยืนยันที่จะลบ?')");>ลบ</a></td>
         </tr>

<?php 
}
    
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

</body>
</html>
